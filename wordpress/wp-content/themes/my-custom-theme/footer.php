<?php
$page_id = is_singular('page') ? get_queried_object_id() : 0;
$license_text = $page_id ? cyberpunk_get_landing_field($page_id, 'footer_license_text') : 'Лицензия';
$license_url = $page_id ? cyberpunk_get_landing_field($page_id, 'footer_license_url') : '#';
$privacy_text = $page_id ? cyberpunk_get_landing_field($page_id, 'footer_privacy_text') : 'Политика конфиденциальности';
$privacy_url = $page_id ? cyberpunk_get_landing_field($page_id, 'footer_privacy_url') : '#';
$copyright = $page_id ? cyberpunk_get_landing_field($page_id, 'footer_copyright') : 'CD PROJEKT®, Cyberpunk®, Cyberpunk 2077®';
$modal_title = $page_id ? cyberpunk_get_landing_field($page_id, 'modal_title') : 'Всё пучком!';
$modal_message = $page_id ? cyberpunk_get_landing_field($page_id, 'modal_message') : 'Форма заполнена верно. Сообщение уже отправлено.';
$modal_button_text = $page_id ? cyberpunk_get_landing_field($page_id, 'modal_button_text') : 'Ок, жду';
?>
<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="footer__brand">
                <img
                    src="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/images/CyberpunkLogo-B32yKEEV.svg')); ?>"
                    alt="Cyberpunk 2077"
                    width="296"
                    height="74"
                />
            </div>
            <div class="footer__partner">
                <img
                    src="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/images/cdprLogo-8bS0yDW2.svg')); ?>"
                    alt="CD Projekt Red"
                    width="172"
                    height="74"
                />
            </div>
            <div class="footer__links">
                <a href="<?php echo esc_url((string) $license_url); ?>" class="footer__link"><?php echo esc_html((string) $license_text); ?></a>
                <a href="<?php echo esc_url((string) $privacy_url); ?>" class="footer__link"><?php echo esc_html((string) $privacy_text); ?></a>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom-inner">
                <div class="footer__copyright"><?php echo esc_html((string) $copyright); ?></div>
            </div>
        </div>
    </div>
</footer>

<div id="success-modal" class="modal">
    <div class="modal__overlay"></div>
    <div class="modal__content">
        <button class="modal__close" aria-label="Закрыть">×</button>
        <div class="modal__icon">✅</div>
        <h3 class="modal__title"><?php echo esc_html((string) $modal_title); ?></h3>
        <p class="modal__message"><?php echo esc_html((string) $modal_message); ?></p>
        <button class="modal__button"><?php echo esc_html((string) $modal_button_text); ?></button>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
