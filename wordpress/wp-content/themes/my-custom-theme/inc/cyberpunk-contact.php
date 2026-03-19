<?php

if (!defined('ABSPATH')) {
    exit;
}

function cyberpunk_register_message_post_type(): void {
    register_post_type('cyberpunk_message', [
        'labels' => [
            'name' => 'Заявки Cyberpunk',
            'singular_name' => 'Заявка Cyberpunk',
            'menu_name' => 'Заявки Cyberpunk',
            'not_found' => 'Заявок пока нет',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-email-alt2',
        'supports' => ['title'],
    ]);
}
add_action('init', 'cyberpunk_register_message_post_type');

function cyberpunk_register_message_columns(array $columns): array {
    $columns['cyberpunk_email'] = 'Email';
    $columns['cyberpunk_mail_status'] = 'Письмо';

    return $columns;
}
add_filter('manage_cyberpunk_message_posts_columns', 'cyberpunk_register_message_columns');

function cyberpunk_render_message_column(string $column, int $post_id): void {
    if ($column === 'cyberpunk_email') {
        echo esc_html((string) get_post_meta($post_id, '_cyberpunk_sender_email', true));
    }

    if ($column === 'cyberpunk_mail_status') {
        echo get_post_meta($post_id, '_cyberpunk_mail_status', true) === 'sent' ? 'Отправлено' : 'Ошибка';
    }
}
add_action('manage_cyberpunk_message_posts_custom_column', 'cyberpunk_render_message_column', 10, 2);

function cyberpunk_resolve_form_page_id(int $page_id): int {
    if ($page_id > 0) {
        return $page_id;
    }

    $referer = wp_get_referer();
    if ($referer) {
        $resolved_from_referer = url_to_postid($referer);
        if ($resolved_from_referer > 0) {
            return $resolved_from_referer;
        }
    }

    return cyberpunk_landing_page_id();
}

function cyberpunk_handle_form_submission(): void {
    check_ajax_referer('cyberpunk_contact_form', 'nonce');

    $page_id = isset($_POST['page_id']) ? (int) $_POST['page_id'] : 0;
    $page_id = cyberpunk_resolve_form_page_id($page_id);
    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $agreement = isset($_POST['agreement']) ? sanitize_text_field(wp_unslash($_POST['agreement'])) : '';
    $file = $_FILES['screenshot'] ?? null;

    $errors = [];

    if ($page_id <= 0) {
        $errors[] = 'Не удалось определить страницу формы.';
    }

    if (mb_strlen($name) < 2) {
        $errors[] = 'Имя должно быть не короче 2 символов.';
    }

    if (!is_email($email)) {
        $errors[] = 'Укажи корректный email.';
    }

    if ($agreement !== 'yes') {
        $errors[] = 'Нужно согласиться на обработку персональных данных.';
    }

    if (!is_array($file) || empty($file['tmp_name'])) {
        $errors[] = 'Прикрепи файл.';
    }

    if ($errors !== []) {
        wp_send_json_error(['errors' => $errors], 422);
    }

    $allowed_mimes = [
        'png' => 'image/png',
        'jpg|jpeg|jpe' => 'image/jpeg',
        'pdf' => 'application/pdf',
    ];

    $detected_type = wp_check_filetype_and_ext((string) $file['tmp_name'], (string) $file['name']);
    $mime_type = (string) ($detected_type['type'] ?? '');
    $file_size = (int) ($file['size'] ?? 0);

    if (!in_array($mime_type, $allowed_mimes, true)) {
        wp_send_json_error(['errors' => ['Можно загружать только PNG, JPG или PDF.']], 422);
    }

    if ($file_size > 5 * 1024 * 1024) {
        wp_send_json_error(['errors' => ['Файл не должен превышать 5 МБ.']], 422);
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    $uploaded = wp_handle_upload($file, [
        'test_form' => false,
        'mimes' => $allowed_mimes,
    ]);

    if (!is_array($uploaded) || isset($uploaded['error'])) {
        error_log(
            sprintf(
                'Cyberpunk upload failed: %s',
                is_array($uploaded) && isset($uploaded['error']) ? (string) $uploaded['error'] : 'unknown upload error'
            )
        );
        wp_send_json_error(['errors' => ['Не удалось загрузить файл.']], 500);
    }

    $attachment_id = wp_insert_attachment([
        'guid' => $uploaded['url'],
        'post_mime_type' => $uploaded['type'],
        'post_title' => sanitize_file_name((string) $file['name']),
        'post_status' => 'inherit',
    ], $uploaded['file']);

    if (!is_wp_error($attachment_id) && $attachment_id) {
        $metadata = wp_generate_attachment_metadata($attachment_id, $uploaded['file']);
        if (!empty($metadata)) {
            wp_update_attachment_metadata($attachment_id, $metadata);
        }
    }

    $message_post_id = wp_insert_post([
        'post_type' => 'cyberpunk_message',
        'post_status' => 'publish',
        'post_title' => sprintf('%s — %s', $name, current_time('d.m.Y H:i')),
    ]);

    $recipient = (string) cyberpunk_get_landing_field($page_id, 'contact_recipient_email', get_option('admin_email'));
    $recipient = is_email($recipient) ? $recipient : (string) get_option('admin_email');

    $message_lines = [
        'Новая заявка с лендинга Cyberpunk.',
        '',
        'Имя: ' . $name,
        'Email: ' . $email,
        'Страница: ' . get_the_title($page_id),
        'Время: ' . current_time('mysql'),
    ];

    $mail_sent = wp_mail(
        $recipient,
        sprintf('Новая заявка Cyberpunk от %s', $name),
        implode("\n", $message_lines),
        ['Reply-To: ' . $name . ' <' . $email . '>'],
        [$uploaded['file']]
    );

    if ($message_post_id && !is_wp_error($message_post_id)) {
        update_post_meta($message_post_id, '_cyberpunk_sender_name', $name);
        update_post_meta($message_post_id, '_cyberpunk_sender_email', $email);
        update_post_meta($message_post_id, '_cyberpunk_page_id', $page_id);
        update_post_meta($message_post_id, '_cyberpunk_attachment_id', (int) $attachment_id);
        update_post_meta($message_post_id, '_cyberpunk_attachment_url', esc_url_raw((string) $uploaded['url']));
        update_post_meta($message_post_id, '_cyberpunk_mail_status', $mail_sent ? 'sent' : 'failed');
    }

    if (!$mail_sent) {
        wp_send_json_success([
            'message' => 'Заявка сохранена. Письмо сейчас недоступно, но данные уже получены.',
            'warning' => 'Письмо не отправилось — проверь почтовую конфигурацию WordPress/SMTP.',
        ]);
    }

    wp_send_json_success([
        'message' => 'Заявка отправлена.',
    ]);
}
add_action('wp_ajax_cyberpunk_submit_form', 'cyberpunk_handle_form_submission');
add_action('wp_ajax_nopriv_cyberpunk_submit_form', 'cyberpunk_handle_form_submission');
