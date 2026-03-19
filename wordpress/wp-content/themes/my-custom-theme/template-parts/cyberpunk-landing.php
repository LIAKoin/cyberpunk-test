<?php
$page_id = cyberpunk_landing_page_id();
?>
<main>
    <section class="hero">
        <div class="hero__media" aria-hidden="true">
            <?php foreach (['hero_bg_1', 'hero_bg_2', 'hero_bg_3'] as $index => $base_key) : ?>
                <?php $sources = cyberpunk_get_landing_image_sources($page_id, $base_key); ?>
                <img
                    class="hero__background<?php echo $index === 0 ? ' is-active' : ''; ?>"
                    src="<?php echo esc_url($sources['desktop']); ?>"
                    alt=""
                    sizes="100vw"
                    srcset="<?php echo esc_attr($sources['mobile'] . ' 767w, ' . $sources['tablet'] . ' 1280w, ' . $sources['desktop'] . ' 1281w'); ?>"
                    data-srcset="<?php echo esc_attr($sources['mobile'] . ' 767w, ' . $sources['tablet'] . ' 1280w, ' . $sources['desktop'] . ' 1281w'); ?>"
                    data-pc="<?php echo esc_url($sources['desktop']); ?>"
                    loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>"
                    decoding="async"
                    fetchpriority="<?php echo $index === 0 ? 'high' : 'auto'; ?>"
                />
            <?php endforeach; ?>
        </div>
        <div class="container">
            <div class="hero__content cropped">
                <h1 class="hero__title"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'hero_title')); ?></h1>
                <button class="hero__action button button--dark" type="button"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'hero_button_text')); ?></button>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="about__body">
                <div class="about__content section-stack">
                    <h2 class="section-title"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'about_title')); ?></h2>
                    <p class="section-text"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'about_text')); ?></p>
                </div>
                <div class="galery">
                    <div class="galery__picture galery__picture--small"><?php cyberpunk_render_responsive_picture($page_id, 'gallery_image_1', 'galery__item cropped', 'Фрагмент игрового мира Cyberpunk 2077', '(max-width: 767px) calc(100vw - 24px), (max-width: 1280px) 50vw, 31vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div>
                    <div class="galery__picture galery__picture--small"><?php cyberpunk_render_responsive_picture($page_id, 'gallery_image_2', 'galery__item cropped', 'Неоновый городской пейзаж Cyberpunk 2077', '(max-width: 767px) calc(100vw - 24px), (max-width: 1280px) 50vw, 31vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div>
                    <div class="galery__picture galery__picture--large"><?php cyberpunk_render_responsive_picture($page_id, 'gallery_image_3', 'galery__item cropped', 'Персонажи Cyberpunk 2077', '(max-width: 767px) calc(100vw - 24px), (max-width: 1280px) 100vw, 66vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="contest">
        <div class="contest__transition section-transition" aria-hidden="true"></div>
        <div class="container">
            <div class="contest__body">
                <div class="contest__layout">
                    <div class="contest__intro section-stack">
                        <h2 class="contest__title section-title">
                            <img src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='132'%20height='132'%20fill='none'%20viewBox='0%200%20132%20132'%3e%3cpath%20stroke='%23f8f200'%20stroke-width='4'%20d='m65.18%2011.001.82.37.82-.37%2018.735-8.428%2010.443%2018.524.429.76.85.203%2019.979%204.754-1.888%2021.474-.073.822.529.634L129.395%2066l-13.571%2016.256-.529.634.073.822%201.888%2021.474-19.979%204.754-.848.202-.43.759-10.442%2018.463-18.737-8.427-.823-.372-.822.373-18.735%208.485L36%20110.964l-.43-.759-.848-.202-19.98-4.755%201.89-21.536.071-.822-.528-.634L2.603%2065.997%2016.178%2049.68l.526-.633-.071-.82-1.89-21.533%2019.975-4.695.852-.2.431-.762L46.442%202.572z'/%3e%3cpath%20fill='%23f8f200'%20d='m54.304%2090.084-5.833-5.834q-3.5-3.5-7%200l-5.41%205.41%202.334%202.333%205.409-5.41q1.167-1.166%202.312-.02l.021.02-4.073%204.074q-2.926%202.927-.063%205.791%202.97%202.97%205.897.042zm-9.927%204.073q-.573-.572.02-1.167l4.074-4.073%201.167%201.167-4.073%204.073q-.594.594-1.188%200m21.7-15.846-3.33%203.33-7.17.17-1.167%201.167%203.5%203.5-2.333%202.333-9.334-9.334%202.334-2.333%203.5%203.5%201.167-1.167.19-7.19%203.31-3.31-.106%209.44zM64.39%2061.33l7%207.001-3.5%203.5q-1.167%201.167-2.333%200L59.722%2066l-2.333%202.333%205.833%205.834q3.5%203.5%207%200L74.89%2069.5l2.333%202.333%202.44-2.44-4.667-4.666L73.723%2066l-7-7zm22.916-4.248-2.334%202.334-.996-.997q-.594%203.012-2.291%204.71-3.5%203.5-7%200l-6.047-6.047%202.334-2.333%206.046%206.046q1.145%201.145%202.333%200%202.037-2.63%201.273-5.728l-4.985-4.985%202.333-2.333zm-5.091-7.636q-2.97-2.97-.043-5.898l6.407-6.406%209.334%209.334-2.334%202.333-3.5-3.5-1.04%201.04.573%206.427-3.033%203.034-.573-6.428q-2.928%202.928-5.791.064m6.364-7.637-4.073%204.073q-.594.594.042%201.23.531.531%201.125-.063l4.073-4.073z'/%3e%3c/svg%3e" alt="Bonus" width="132" height="132" />
                            <span><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'contest_title')); ?></span>
                        </h2>
                        <p class="section-text"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'contest_text')); ?></p>
                    </div>
                    <div class="contest__content section-stack">
                        <form action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" class="contest-form" id="feedback-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="cyberpunk_submit_form" />
                            <input type="hidden" name="page_id" value="<?php echo esc_attr((string) $page_id); ?>" />
                            <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('cyberpunk_contact_form')); ?>" />
                            <input class="contest-form__input" type="text" name="name" placeholder="Как тебя зовут?" aria-label="Как тебя зовут?" required />
                            <input class="contest-form__input" type="email" name="email" placeholder="Твой e-mail" aria-label="Твой e-mail" required />
                            <label class="contest-form__file" aria-label="Прикрепить скриншот" for="myFile">
                                <span class="contest-form__file-title">Прикрепить скриншот</span>
                                <span class="contest-form__file-rules">.png / .jpg / .pdf</span>
                                <input type="file" id="myFile" name="screenshot" accept=".png,.jpg,.jpeg,.pdf" required />
                            </label>
                            <button class="contest-form__button button button--light" type="submit" aria-label="Отправить"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'contest_submit_text')); ?></button>
                            <div class="contest-form__checkbox">
                                <input class="contest-form__checkbox-input" type="checkbox" name="agreement" value="yes" id="agreement" required />
                                <label class="contest-form__checkbox-label" for="agreement"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'contest_agreement_text')); ?></label>
                            </div>
                        </form>
                        <div id="form-errors" class="contest-form__errors"></div>
                    </div>
                    <div class="contest__picture"><?php cyberpunk_render_responsive_picture($page_id, 'contest_image', 'contest__image', 'Призы Xbox Series X и PlayStation 5', '(max-width: 767px) calc(100vw - 24px), (max-width: 1280px) 50vw, 36vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="immersion">
        <div class="immersion__transition section-transition" aria-hidden="true"></div>
        <div class="container">
            <div class="immersion__body">
                <div class="immersion__media section-stack">
                    <div class="immersion__picture"><?php cyberpunk_render_responsive_picture($page_id, 'immersion_image_1', 'immersion__image', 'HP x Cyberpunk 2077', '(max-width: 767px) calc(100vw - 24px), (max-width: 1280px) 100vw, 49vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div>
                    <div class="immersion__picture"><?php cyberpunk_render_responsive_picture($page_id, 'immersion_image_2', 'immersion__image', 'Монитор HP', '(max-width: 767px) calc(100vw - 24px), (max-width: 1280px) 100vw, 49vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div>
                </div>
                <div class="immersion__content section-stack">
                    <h2 class="section-title"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'immersion_title')); ?></h2>
                    <p class="section-text"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'immersion_text')); ?></p>
                    <ul class="feature-list" role="list">
                        <li class="feature-list__item feature-list__item--stars"><p><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'immersion_feature_1')); ?></p></li>
                        <li class="feature-list__item feature-list__item--paint"><p><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'immersion_feature_2')); ?></p></li>
                        <li class="feature-list__item feature-list__item--motion"><p><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'immersion_feature_3')); ?></p></li>
                    </ul>
                    <button class="immersion__button button button--dark" type="button"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'immersion_button_text')); ?></button>
                </div>
            </div>
        </div>
    </section>

    <section class="purchase" id="purchase">
        <div class="purchase__layout">
            <div class="purchase__media"><div class="purchase__picture"><?php cyberpunk_render_responsive_picture($page_id, 'purchase_image', 'purchase__image', 'HP monitor', '(max-width: 767px) 100vw, (max-width: 1280px) 100vw, 50vw', ['loading' => 'lazy', 'decoding' => 'async']); ?></div></div>
            <div class="purchase__content">
                <div class="purchase__content-inner section-stack">
                    <h2 class="section-title"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'purchase_title')); ?></h2>
                    <div class="purchase__lists">
                        <h3 class="purchase__list-title text-accent"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'purchase_bundle_title')); ?></h3>
                        <ul class="feature-list purchase__list">
                            <li class="feature-list__item feature-list__item--disk"><p><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'purchase_bundle_item_1')); ?></p></li>
                            <li class="feature-list__item feature-list__item--collections"><p><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'purchase_bundle_item_2')); ?></p></li>
                            <li class="feature-list__item feature-list__item--booklet"><p><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'purchase_bundle_item_3')); ?></p></li>
                        </ul>
                        <h3 class="purchase__list-title text-accent"><?php echo esc_html(cyberpunk_get_landing_field($page_id, 'purchase_platform_title')); ?></h3>
                        <ul class="purchase__platforms">
                            <li class="purchase__platform-card">
                                <img class="purchase__platform-icon purchase__platform-icon--pc" src="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/icons/PC.svg')); ?>" alt="PC" />
                            </li>
                            <li class="purchase__platform-card">
                                <img class="purchase__platform-icon purchase__platform-icon--xbox" src="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/icons/XboxLogo.svg')); ?>" alt="Xbox" />
                            </li>
                            <li class="purchase__platform-card">
                                <img class="purchase__platform-icon purchase__platform-icon--stadia" src="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/icons/StadiaLogo.svg')); ?>" alt="Stadia" />
                            </li>
                            <li class="purchase__platform-card">
                                <img class="purchase__platform-icon purchase__platform-icon--playstation" src="<?php echo esc_url(cyberpunk_theme_asset_uri('assets/icons/PlaystationLogo.svg')); ?>" alt="PlayStation" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
