<?php

if (!defined('ABSPATH')) {
    exit;
}

function cyberpunk_theme_asset_path(string $relative_path): string {
    return get_template_directory() . '/' . ltrim($relative_path, '/');
}

function cyberpunk_theme_asset_uri(string $relative_path): string {
    return get_template_directory_uri() . '/' . ltrim($relative_path, '/');
}

function cyberpunk_theme_file_version(string $relative_path): int {
    $path = cyberpunk_theme_asset_path($relative_path);

    return file_exists($path) ? (int) filemtime($path) : time();
}

function cyberpunk_register_theme_support(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'cyberpunk_register_theme_support');

function cyberpunk_cleanup_wp_head(): void {
    remove_action('wp_head', 'print_emoji_detection_scripts', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    wp_deregister_script('wp-embed');
}
add_action('init', 'cyberpunk_cleanup_wp_head');

function cyberpunk_dequeue_block_styles(): void {
    if (is_admin()) {
        return;
    }

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'cyberpunk_dequeue_block_styles', 100);

function cyberpunk_add_defer_strategy(string $handle): void {
    if (function_exists('wp_script_add_data')) {
        wp_script_add_data($handle, 'strategy', 'defer');
    }
}

function cyberpunk_filter_deferred_script_tag(string $tag, string $handle, string $src): string {
    $deferred_handles = ['cyberpunk-frontend', 'cyberpunk-admin-meta'];

    if (!in_array($handle, $deferred_handles, true) || str_contains($tag, ' defer')) {
        return $tag;
    }

    return str_replace('<script ', '<script defer ', $tag);
}
add_filter('script_loader_tag', 'cyberpunk_filter_deferred_script_tag', 10, 3);

function cyberpunk_enqueue_assets(): void {
    if (is_admin()) {
        return;
    }

    $style_relative_path = 'assets/main-Bq4jlzNx.css';
    $script_relative_path = 'assets/cyberpunk-frontend.js';

    wp_enqueue_style(
        'cyberpunk-main',
        cyberpunk_theme_asset_uri($style_relative_path),
        [],
        cyberpunk_theme_file_version($style_relative_path)
    );

    wp_enqueue_script(
        'cyberpunk-frontend',
        cyberpunk_theme_asset_uri($script_relative_path),
        [],
        cyberpunk_theme_file_version($script_relative_path),
        true
    );
    cyberpunk_add_defer_strategy('cyberpunk-frontend');

    if (is_singular('page')) {
        $page_id = get_queried_object_id();
        wp_localize_script('cyberpunk-frontend', 'cyberpunkFormConfig', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('cyberpunk_contact_form'),
            'pageId' => $page_id,
            'sendingText' => __('Отправляем...', 'my-custom-theme'),
            'defaultSubmitText' => cyberpunk_get_landing_field($page_id, 'contest_submit_text'),
        ]);
    }
}
add_action('wp_enqueue_scripts', 'cyberpunk_enqueue_assets');

function cyberpunk_preload_assets(): void {
    if (is_admin()) {
        return;
    }
    ?>
    <link rel="preload" as="font" href="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/fonts/archangelsk.woff2')); ?>" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/fonts/roboto.woff2')); ?>" type="font/woff2" crossorigin>
    <?php
}
add_action('wp_head', 'cyberpunk_preload_assets', 1);

function cyberpunk_enqueue_admin_assets(string $hook_suffix): void {
    if (!in_array($hook_suffix, ['post.php', 'post-new.php'], true)) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'page') {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script(
        'cyberpunk-admin-meta',
        cyberpunk_theme_asset_uri('assets/admin-meta.js'),
        ['jquery'],
        cyberpunk_theme_file_version('assets/admin-meta.js'),
        true
    );
    cyberpunk_add_defer_strategy('cyberpunk-admin-meta');
}
add_action('admin_enqueue_scripts', 'cyberpunk_enqueue_admin_assets');
