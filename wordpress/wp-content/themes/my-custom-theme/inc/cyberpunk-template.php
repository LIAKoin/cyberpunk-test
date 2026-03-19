<?php

if (!defined('ABSPATH')) {
    exit;
}

function cyberpunk_landing_page_id(): int {
    $page_id = get_queried_object_id();

    if ($page_id > 0) {
        return $page_id;
    }

    $front_page_id = (int) get_option('page_on_front');
    if ($front_page_id > 0) {
        return $front_page_id;
    }

    $posts_page_id = (int) get_option('page_for_posts');

    return $posts_page_id > 0 ? $posts_page_id : 0;
}

function cyberpunk_get_landing_image_sources(int $page_id, string $base_key): array {
    $mobile = (string) cyberpunk_get_landing_field($page_id, $base_key . '_mobile');
    $tablet = (string) cyberpunk_get_landing_field($page_id, $base_key . '_tablet', $mobile);
    $desktop = (string) cyberpunk_get_landing_field($page_id, $base_key . '_desktop', $tablet ?: $mobile);

    return [
        'mobile' => $mobile ?: $desktop,
        'tablet' => $tablet ?: $desktop,
        'desktop' => $desktop ?: $tablet ?: $mobile,
    ];
}

function cyberpunk_render_responsive_picture(int $page_id, string $base_key, string $class, string $alt, string $sizes, array $attributes = []): void {
    $sources = cyberpunk_get_landing_image_sources($page_id, $base_key);
    $attrs = '';

    foreach ($attributes as $attribute => $value) {
        $attrs .= sprintf(' %s="%s"', esc_attr($attribute), esc_attr((string) $value));
    }
    ?>
    <picture>
        <source media="(max-width: 767px)" srcset="<?php echo esc_url($sources['mobile']); ?>" />
        <source media="(max-width: 1280px)" srcset="<?php echo esc_url($sources['tablet']); ?>" />
        <img class="<?php echo esc_attr($class); ?>" src="<?php echo esc_url($sources['desktop']); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>"<?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> />
    </picture>
    <?php
}
