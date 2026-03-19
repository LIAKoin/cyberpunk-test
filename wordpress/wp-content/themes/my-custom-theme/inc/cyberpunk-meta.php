<?php

if (!defined('ABSPATH')) {
    exit;
}

function cyberpunk_landing_text_defaults(): array {
    return [
        'hero_title' => 'Доступно на всех платформах',
        'hero_button_text' => 'Узнать больше',
        'about_title' => 'Найт-Сити изменит тебя навсегда!',
        'about_text' => 'Cyberpunk 2077 — приключенческая ролевая игра, действие которой происходит в мегаполисе Найт-Сити, где власть, роскошь и модификации тела ценятся выше всего. Ты играешь за V, наёмника в поисках устройства, позволяющего обрести бессмертие. Ты сможешь менять киберимпланты, навыки и стиль игры своего персонажа, исследуя открытый мир, где твои поступки влияют на ход сюжета и всё, что тебя окружает.',
        'contest_title' => 'Играй и выигрывай!',
        'contest_text' => 'Играй в Cyberpunk 2077 и получи возможность выиграть консоль Xbox Series X или Sony PlayStation 5! Заполни форму ниже и приложи скриншот о покупке игры. Итоги розыгрыша будут подведены 1 февраля. Удачи! ;)',
        'contest_submit_text' => 'Отправить',
        'contest_agreement_text' => 'Согласен на обработку персональных данных',
        'contact_recipient_email' => get_option('admin_email'),
        'immersion_title' => 'Полное погружение вместе с HP',
        'immersion_text' => 'Погрузись в современные экшен-игры с реалистичным изображением с помощью монитора с диагональю 23,8 дюйма, созданном для отображения максимально насыщенных цветов. Успевай реагировать на любые события с временем отклика 1 мс и частотой в 144 Гц!',
        'immersion_feature_1' => 'Яркие насыщенные цвета',
        'immersion_feature_2' => 'Кристальная четкость изображения',
        'immersion_feature_3' => 'Быстрые движения и плавный геймплей',
        'immersion_button_text' => 'Подробнее',
        'purchase_title' => 'Купить игру Cyberpunk 2077',
        'purchase_bundle_title' => 'В комплект входит:',
        'purchase_bundle_item_1' => 'Футляр с игровыми дисками',
        'purchase_bundle_item_2' => 'Футляр с кодом для загрузки игры и дисками (pc)',
        'purchase_bundle_item_3' => 'Справочник с информацией об игровом мире',
        'purchase_platform_title' => 'Выберите платформу:',
        'footer_license_text' => 'Лицензия',
        'footer_license_url' => '#',
        'footer_privacy_text' => 'Политика конфиденциальности',
        'footer_privacy_url' => '#',
        'footer_copyright' => 'CD PROJEKT®, Cyberpunk®, Cyberpunk 2077®',
        'modal_title' => 'Всё пучком!',
        'modal_message' => 'Форма заполнена верно. Сообщение уже отправлено.',
        'modal_button_text' => 'Ок, жду',
    ];
}

function cyberpunk_landing_image_defaults(): array {
    return [
        'hero_bg_1_mobile' => cyberpunk_theme_asset_uri('assets/images/bg1-mobile-Ci_eqyqE.webp'),
        'hero_bg_1_tablet' => cyberpunk_theme_asset_uri('assets/images/bg1-pc-CGw3xEIy.webp'),
        'hero_bg_1_desktop' => cyberpunk_theme_asset_uri('assets/images/bg1-pc-CGw3xEIy.webp'),
        'hero_bg_2_mobile' => cyberpunk_theme_asset_uri('assets/images/bg2-mobile-BF3qshKb.webp'),
        'hero_bg_2_tablet' => cyberpunk_theme_asset_uri('assets/images/bg2-pc-CSTvuywZ.webp'),
        'hero_bg_2_desktop' => cyberpunk_theme_asset_uri('assets/images/bg2-pc-CSTvuywZ.webp'),
        'hero_bg_3_mobile' => cyberpunk_theme_asset_uri('assets/images/bg3-mobile-duhSRaxP.webp'),
        'hero_bg_3_tablet' => cyberpunk_theme_asset_uri('assets/images/bg3-pc-BHV7x0sM.webp'),
        'hero_bg_3_desktop' => cyberpunk_theme_asset_uri('assets/images/bg3-pc-BHV7x0sM.webp'),
        'gallery_image_1_mobile' => cyberpunk_theme_asset_uri('assets/images/photo1-mobile-Ct6ld2Pc.webp'),
        'gallery_image_1_tablet' => cyberpunk_theme_asset_uri('assets/images/photo1-tablet-BB-Q5wpF.webp'),
        'gallery_image_1_desktop' => cyberpunk_theme_asset_uri('assets/images/photo1-pc-fyDYtGGI.webp'),
        'gallery_image_2_mobile' => cyberpunk_theme_asset_uri('assets/images/photo2-mobile-CrbrSPIR.webp'),
        'gallery_image_2_tablet' => cyberpunk_theme_asset_uri('assets/images/photo2-tablet-Cljq_Eml.webp'),
        'gallery_image_2_desktop' => cyberpunk_theme_asset_uri('assets/images/photo2-pc--Xi9hIDD.webp'),
        'gallery_image_3_mobile' => cyberpunk_theme_asset_uri('assets/images/photo3-mobile-B7kPniBR.webp'),
        'gallery_image_3_tablet' => cyberpunk_theme_asset_uri('assets/images/photo3-tablet-DC4HI3EJ.webp'),
        'gallery_image_3_desktop' => cyberpunk_theme_asset_uri('assets/images/photo3-pc-DEB8TItd.webp'),
        'contest_image_mobile' => cyberpunk_theme_asset_uri('assets/images/image1-mobile-xv-97F8G.webp'),
        'contest_image_tablet' => cyberpunk_theme_asset_uri('assets/images/image1-tablet-DZauvNuS.webp'),
        'contest_image_desktop' => cyberpunk_theme_asset_uri('assets/images/image1-pc-DVFhp-_v.webp'),
        'immersion_image_1_mobile' => cyberpunk_theme_asset_uri('assets/images/image2-mobile-8JWH7V8g.webp'),
        'immersion_image_1_tablet' => cyberpunk_theme_asset_uri('assets/images/image2-tablet-BOCS3DYT.webp'),
        'immersion_image_1_desktop' => cyberpunk_theme_asset_uri('assets/images/image2-pc-CWrQWtdY.webp'),
        'immersion_image_2_mobile' => cyberpunk_theme_asset_uri('assets/images/image3-mobile-jkW-4J_R.webp'),
        'immersion_image_2_tablet' => cyberpunk_theme_asset_uri('assets/images/image3-tablet-BCrZf2Dc.webp'),
        'immersion_image_2_desktop' => cyberpunk_theme_asset_uri('assets/images/image3-pc-BClEDF72.webp'),
        'purchase_image_mobile' => cyberpunk_theme_asset_uri('assets/images/image4-mobile-C-KRRtnq.webp'),
        'purchase_image_tablet' => cyberpunk_theme_asset_uri('assets/images/image4-pc-BQjVYcS3.webp'),
        'purchase_image_desktop' => cyberpunk_theme_asset_uri('assets/images/image4-pc-BQjVYcS3.webp'),
    ];
}

function cyberpunk_landing_text_fields(): array {
    return [
        'hero' => [
            'title' => 'Hero',
            'fields' => [
                'hero_title' => 'Главный заголовок',
                'hero_button_text' => 'Текст кнопки hero',
            ],
        ],
        'about' => [
            'title' => 'Блок About',
            'fields' => [
                'about_title' => 'Заголовок блока',
                'about_text' => 'Текст блока',
            ],
        ],
        'contest' => [
            'title' => 'Блок Играй и выигрывай',
            'fields' => [
                'contest_title' => 'Заголовок блока',
                'contest_text' => 'Описание блока',
                'contest_submit_text' => 'Текст кнопки отправки',
                'contest_agreement_text' => 'Текст согласия',
                'contact_recipient_email' => 'Email получателя заявок',
            ],
        ],
        'immersion' => [
            'title' => 'Блок HP / Immersion',
            'fields' => [
                'immersion_title' => 'Заголовок блока',
                'immersion_text' => 'Текст блока',
                'immersion_feature_1' => 'Преимущество 1',
                'immersion_feature_2' => 'Преимущество 2',
                'immersion_feature_3' => 'Преимущество 3',
                'immersion_button_text' => 'Текст кнопки',
            ],
        ],
        'purchase' => [
            'title' => 'Блок Purchase',
            'fields' => [
                'purchase_title' => 'Заголовок блока',
                'purchase_bundle_title' => 'Подзаголовок комплекта',
                'purchase_bundle_item_1' => 'Пункт комплекта 1',
                'purchase_bundle_item_2' => 'Пункт комплекта 2',
                'purchase_bundle_item_3' => 'Пункт комплекта 3',
                'purchase_platform_title' => 'Подзаголовок платформ',
            ],
        ],
        'footer' => [
            'title' => 'Футер и модалка',
            'fields' => [
                'footer_license_text' => 'Текст ссылки Лицензия',
                'footer_license_url' => 'URL ссылки Лицензия',
                'footer_privacy_text' => 'Текст ссылки Политика',
                'footer_privacy_url' => 'URL ссылки Политика',
                'footer_copyright' => 'Копирайт',
                'modal_title' => 'Заголовок модалки',
                'modal_message' => 'Текст модалки',
                'modal_button_text' => 'Текст кнопки модалки',
            ],
        ],
    ];
}

function cyberpunk_landing_image_groups(): array {
    return [
        'hero_bg_1' => 'Hero background 1',
        'hero_bg_2' => 'Hero background 2',
        'hero_bg_3' => 'Hero background 3',
        'gallery_image_1' => 'Галерея 1',
        'gallery_image_2' => 'Галерея 2',
        'gallery_image_3' => 'Галерея 3',
        'contest_image' => 'Картинка блока конкурса',
        'immersion_image_1' => 'Immersion image 1',
        'immersion_image_2' => 'Immersion image 2',
        'purchase_image' => 'Картинка блока покупки',
    ];
}

function cyberpunk_landing_default_meta(): array {
    return cyberpunk_landing_text_defaults() + cyberpunk_landing_image_defaults();
}

function cyberpunk_ensure_landing_page(): void {
    $page = get_page_by_path('cyberpunk-landing');
    $page_id = $page instanceof WP_Post ? (int) $page->ID : 0;

    if ($page_id === 0) {
        $page_id = wp_insert_post([
            'post_type' => 'page',
            'post_status' => 'publish',
            'post_name' => 'cyberpunk-landing',
            'post_title' => 'Cyberpunk Landing',
        ]);
    }

    if (!$page_id || is_wp_error($page_id)) {
        return;
    }

    update_post_meta($page_id, '_wp_page_template', 'page-templates/cyberpunk-landing.php');

    foreach (cyberpunk_landing_default_meta() as $key => $value) {
        $meta_key = '_cyberpunk_' . $key;
        $existing = get_post_meta($page_id, $meta_key, true);
        if ($existing === '' || $existing === null) {
            update_post_meta($page_id, $meta_key, $value);
        }
    }

    if ((int) get_option('page_on_front') === 0) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_id);
    }

    update_option('cyberpunk_landing_page_id', $page_id);
}
add_action('init', 'cyberpunk_ensure_landing_page', 20);

function cyberpunk_add_landing_metaboxes(): void {
    add_meta_box(
        'cyberpunk-landing-content',
        'Cyberpunk Landing — контент',
        'cyberpunk_render_landing_content_metabox',
        'page',
        'normal',
        'high'
    );

    add_meta_box(
        'cyberpunk-landing-media',
        'Cyberpunk Landing — адаптивные изображения',
        'cyberpunk_render_landing_media_metabox',
        'page',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes_page', 'cyberpunk_add_landing_metaboxes');

function cyberpunk_render_landing_content_metabox(WP_Post $post): void {
    wp_nonce_field('cyberpunk_save_landing_meta', 'cyberpunk_landing_nonce');
    ?>
    <p><strong>Поле сохраняется прямо в страницу. Для нового клона репозитория базовая страница и значения создаются автоматически.</strong></p>
    <?php foreach (cyberpunk_landing_text_fields() as $group) : ?>
        <h3><?php echo esc_html($group['title']); ?></h3>
        <table class="form-table" role="presentation">
            <tbody>
                <?php foreach ($group['fields'] as $key => $label) : ?>
                    <?php $value = cyberpunk_get_landing_field($post->ID, $key); ?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></label></th>
                        <td>
                            <?php if (in_array($key, ['about_text', 'contest_text', 'immersion_text', 'modal_message'], true)) : ?>
                                <textarea class="large-text" rows="4" id="<?php echo esc_attr($key); ?>" name="cyberpunk_meta[<?php echo esc_attr($key); ?>]"><?php echo esc_textarea((string) $value); ?></textarea>
                            <?php else : ?>
                                <input class="regular-text" type="text" id="<?php echo esc_attr($key); ?>" name="cyberpunk_meta[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr((string) $value); ?>" />
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach;
}

function cyberpunk_normalize_media_value(string $value): string {
    $value = trim($value);

    if ($value == '') {
        return '';
    }

    if (is_numeric($value)) {
        $attachment_url = wp_get_attachment_url((int) $value);
        return $attachment_url ? esc_url_raw($attachment_url) : '';
    }

    return esc_url_raw($value);
}

function cyberpunk_render_landing_media_metabox(WP_Post $post): void {
    ?>
    <p>Во всех полях уже лежат стартовые картинки. Можно заменить отдельно mobile / tablet / desktop для каждого блока.</p>
    <?php foreach (cyberpunk_landing_image_groups() as $base_key => $label) : ?>
        <h3><?php echo esc_html($label); ?></h3>
        <table class="form-table" role="presentation">
            <tbody>
                <?php foreach (['mobile' => 'Mobile', 'tablet' => 'Tablet', 'desktop' => 'Desktop'] as $suffix => $suffix_label) : ?>
                    <?php
                    $key = $base_key . '_' . $suffix;
                    $value = (string) cyberpunk_get_landing_field($post->ID, $key);
                    $preview_url = cyberpunk_normalize_media_value($value);
                    ?>
                    <tr>
                        <th scope="row"><?php echo esc_html($suffix_label); ?></th>
                        <td>
                            <input type="text" class="regular-text cyberpunk-media-input" name="cyberpunk_meta[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($preview_url ?: $value); ?>" />
                            <div class="cyberpunk-media-preview" style="margin:12px 0;">
                                <?php if ($preview_url !== '') : ?>
                                    <img src="<?php echo esc_url($preview_url); ?>" alt="" style="max-width:240px;height:auto;display:block;" />
                                <?php endif; ?>
                            </div>
                            <button type="button" class="button cyberpunk-media-select"><?php esc_html_e('Выбрать изображение', 'my-custom-theme'); ?></button>
                            <button type="button" class="button cyberpunk-media-clear"><?php esc_html_e('Очистить', 'my-custom-theme'); ?></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach;
}

function cyberpunk_save_landing_meta(int $post_id): void {
    if (!isset($_POST['cyberpunk_landing_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['cyberpunk_landing_nonce'])), 'cyberpunk_save_landing_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $meta = isset($_POST['cyberpunk_meta']) && is_array($_POST['cyberpunk_meta']) ? wp_unslash($_POST['cyberpunk_meta']) : [];

    foreach (cyberpunk_landing_text_defaults() as $key => $default) {
        if (!array_key_exists($key, $meta)) {
            continue;
        }

        $value = (string) $meta[$key];

        if (str_contains($key, '_url')) {
            update_post_meta($post_id, '_cyberpunk_' . $key, esc_url_raw($value));
            continue;
        }

        if ($key === 'contact_recipient_email') {
            update_post_meta($post_id, '_cyberpunk_' . $key, sanitize_email($value));
            continue;
        }

        update_post_meta($post_id, '_cyberpunk_' . $key, sanitize_textarea_field($value));
    }

    foreach (cyberpunk_landing_image_defaults() as $key => $default) {
        if (!array_key_exists($key, $meta)) {
            continue;
        }

        update_post_meta($post_id, '_cyberpunk_' . $key, cyberpunk_normalize_media_value((string) $meta[$key]));
    }
}
add_action('save_post_page', 'cyberpunk_save_landing_meta');

function cyberpunk_get_landing_field(int $post_id, string $key, $fallback = '') {
    $value = get_post_meta($post_id, '_cyberpunk_' . $key, true);

    if ($value === '' || $value === null) {
        $defaults = cyberpunk_landing_default_meta();
        return $defaults[$key] ?? $fallback;
    }

    if (array_key_exists($key, cyberpunk_landing_image_defaults())) {
        return cyberpunk_normalize_media_value((string) $value) ?: $fallback;
    }

    return $value;
}
