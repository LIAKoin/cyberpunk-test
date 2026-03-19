<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <link rel="preload" as="font" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/archangelsk.woff2" crossorigin="anonymous" />
        <style>
            @font-face {
                font-family: "Archangelsk";
                src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/archangelsk.woff2") format("woff2");
                font-weight: normal;
                font-style: normal;
                font-display: swap;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: system-ui, -apple-system, sans-serif;
                line-height: 1.5;
            }

            .container {
                max-width: 1280px;
                margin: 0 auto;
                height: 100%;
            }

            .header {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 2;
            }

            .header__inner {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                padding: 20px 0;
            }

            .header__socials {
                display: flex;
                flex-direction: row;
                gap: 40px;
            }

            .header__link {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .header__link img {
                width: 30px;
                height: 30px;
            }

            .header__logo {
                display: block;
                width: 296px;
                height: auto;
            }

            .hero {
                position: relative;
                isolation: isolate;
                min-height: 1000px;
                background: #000;
                overflow: hidden;
            }

            .hero__media {
                position: absolute;
                inset: 0;
                z-index: -1;
            }

            .hero__background {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0;
                transition: opacity 800ms ease;
                will-change: opacity;
            }

            .hero__background.is-active {
                opacity: 1;
            }

            .hero > .container {
                display: flex;
                justify-content: flex-end;
                align-items: flex-end;
                min-height: inherit;
            }

            .hero__content {
                max-width: 624px;
                padding: 70px;
                margin-bottom: 0;
                background: #f8f200;
            }

            .hero__title {
                font-family: "Archangelsk";
                font-weight: 400;
                font-size: 62px;
                line-height: 100%;
            }

            .hero__action {
                font-size: 24px;
                line-height: 40px;
                padding: 20px 50px;
                margin-top: 25px;
            }

            @media (max-width: 767px) {
                .header__inner {
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: center;
                    gap: 24px;
                    padding: 20px 0 30px;
                }

                .header__socials {
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 28px;
                }

                .header__logo {
                    width: min(100%, 200px);
                }

                .hero {
                    min-height: 763px;
                    overflow: visible;
                    margin-bottom: 50px;
                }

                .hero > .container {
                    justify-content: center;
                    padding: 0;
                }

                .hero__content {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    max-width: none;
                    width: 100%;
                    padding: 30px 20px;
                    margin-bottom: -50px;
                }

                .hero__title {
                    font-size: 30px;
                    text-align: center;
                }

                .hero__action {
                    font-size: 20px;
                    line-height: 1;
                    padding: 18px 36px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .hero__background {
                    transition: none;
                }
            }
        </style>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cyberpunk WP</title>
        <meta
            name="description"
            content="Cyberpunk 2077 - игра доступна на всех платформах. Розыгрыш Xbox Series X и PS5, полное погружение с HP, комплекты игры"
        />
        <meta property="og:title" content="Cyberpunk 2077 - Доступно на всех платформах" />
        <meta property="og:description" content="Играй и выигрывай консоли" />
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/image1-pc-DVFhp-_v.webp" />
        <meta property="og:type" content="website" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <img
                        class="header__logo"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/CyberpunkLogo-B32yKEEV.svg"
                        alt="Cyberpunk 2077"
                        width="296"
                        height="74"
                    />
                    <nav class="header__socials">
                        <a
                            href="https://www.youtube.com/"
                            class="header__link"
                            aria-label="YouTube"
                        >
                            <img
                                src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='30'%20height='30'%20fill='none'%20viewBox='0%200%2030%2030'%3e%3cg%20clip-path='url(%23clip0_12_220)'%3e%3cpath%20fill='%23000'%20d='M23.658%2022.383h-1.545l.007-.904a.73.73%200%200%201%20.728-.73h.098c.401%200%20.73.328.73.73zm-5.794-1.937c-.392%200-.713.265-.713.59v4.397c0%20.325.32.59.713.59s.714-.265.714-.59v-4.397c0-.325-.32-.59-.714-.59m9.409-2.46v8.366c0%202.006-1.727%203.648-3.837%203.648H7.656c-2.112%200-3.838-1.642-3.838-3.648v-8.366c0-2.007%201.726-3.649%203.838-3.649h15.78c2.11%200%203.837%201.643%203.837%203.65M8.708%2027.26v-8.812h1.955v-1.305l-5.214-.008v1.284l1.628.004v8.837zm5.864-7.5h-1.63v4.706c0%20.68.04%201.021-.003%201.141-.133.365-.729.752-.961.04-.04-.125-.005-.502-.006-1.149l-.006-4.738h-1.622l.005%204.664c.001.715-.016%201.248.006%201.49.04.428.025.927.419%201.211.734.533%202.14-.08%202.492-.84l-.003.971%201.31.002zm5.217%205.389-.003-3.916c-.002-1.493-1.11-2.387-2.614-1.18l.007-2.911-1.63.002-.007%2010.05%201.34-.02.121-.625c1.713%201.583%202.789.498%202.786-1.4m5.104-.52-1.223.007-.003.167v.688a.67.67%200%200%201-.668.667h-.24a.67.67%200%200%201-.668-.667v-1.809h2.8V22.62c0-.776-.02-1.552-.083-1.996-.2-1.403-2.156-1.626-3.143-.908a1.86%201.86%200%200%200-.685.929q-.209.604-.208%201.656v2.335c0%203.881%204.68%203.333%204.121-.006m-6.272-12.677q.125.31.392.5.264.185.667.186.353.001.625-.196.27-.197.457-.59l-.03.645h1.817V4.706h-1.43v6.064a.6.6%200%200%201-.597.597.6.6%200%200%201-.595-.598V4.707h-1.494V9.96q.001%201.003.032%201.342.03.336.156.649m-5.51-4.4q.001-1.122.185-1.753.186-.63.669-1.011.481-.384%201.232-.384.63.001%201.082.246.455.246.698.64.246.395.336.81.091.421.091%201.277v1.97q0%201.085-.084%201.592a2.5%202.5%200%200%201-.358.946%201.7%201.7%200%200%201-.7.648q-.43.21-.987.21-.62.001-1.05-.179-.434-.18-.671-.54a2.4%202.4%200%200%201-.342-.873q-.101-.512-.1-1.537zm1.424%203.095c0%20.44.326.801.723.801s.722-.36.722-.802V6.5c0-.44-.325-.8-.722-.8s-.723.36-.723.8zm-5.03%202.094h1.714l.002-5.976%202.027-5.118h-1.876l-1.078%203.802-1.092-3.813H7.345l2.156%205.132z'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_12_220'%3e%3cpath%20fill='%23fff'%20d='M0%200h30v30H0z'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
                                alt="YouTube"
                                width="30"
                                height="30"
                            />
                        </a>
                        <a href="https://vk.com/" class="header__link" aria-label="VK">
                            <img
                                src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='30'%20height='30'%20fill='none'%20viewBox='0%200%2030%2030'%3e%3cg%20clip-path='url(%23clip0_12_222)'%3e%3cpath%20fill='%23000'%20d='M19.605%200h-9.21C1.99%200%200%201.99%200%2010.395v9.21C0%2028.01%201.99%2030%2010.395%2030h9.21C28.01%2030%2030%2028.01%2030%2019.605v-9.21C30%201.99%2027.989%200%2019.605%200m4.615%2021.404h-2.18c-.825%200-1.08-.657-2.562-2.159-1.292-1.25-1.863-1.419-2.18-1.419-.445%200-.573.128-.573.741v1.97c0%20.53-.169.847-1.566.847-2.308%200-4.87-1.398-6.669-4.003-2.71-3.81-3.453-6.668-3.453-7.261%200-.317.128-.614.742-.614h2.18c.55%200%20.762.254.975.846%201.079%203.113%202.879%205.844%203.62%205.844.275%200%20.402-.127.402-.825v-3.22c-.085-1.482-.868-1.608-.868-2.137%200-.255.212-.509.55-.509h3.43c.466%200%20.634.254.634.804v4.341c0%20.465.213.635.34.635.274%200%20.508-.17%201.015-.678%201.568-1.757%202.69-4.467%202.69-4.467.148-.318.402-.614.953-.614h2.18c.656%200%20.805.338.656.804-.275%201.271-2.942%205.039-2.942%205.039-.233.381-.318.55%200%20.975.232.317.995.973%201.503%201.566.932%201.059%201.65%201.948%201.842%202.563.212.612-.107.93-.72.93z'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_12_222'%3e%3cpath%20fill='%23fff'%20d='M0%200h30v30H0z'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
                                alt="VK"
                                width="30"
                                height="30"
                            />
                        </a>
                        <a
                            href="https://www.facebook.com/"
                            class="header__link"
                            aria-label="Facebook"
                        >
                            <img
                                src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='30'%20height='30'%20fill='none'%20viewBox='0%200%2030%2030'%3e%3cg%20clip-path='url(%23clip0_12_224)'%3e%3cpath%20fill='%23000'%20d='M5.478%200A5.466%205.466%200%200%200%200%205.478v19.044A5.466%205.466%200%200%200%205.478%2030H15.8V18.272h-3.102v-4.223H15.8v-3.607c0-2.834%201.832-5.437%206.053-5.437%201.71%200%202.973.164%202.973.164l-.1%203.944S23.439%209.1%2022.032%209.1c-1.522%200-1.766.702-1.766%201.866v3.083h4.583l-.2%204.223h-4.383V30h4.257A5.466%205.466%200%200%200%2030%2024.522V5.478A5.466%205.466%200%200%200%2024.522%200z'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_12_224'%3e%3cpath%20fill='%23fff'%20d='M0%200h30v30H0z'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
                                alt="Facebook"
                                width="30"
                                height="30"
                            />
                        </a>
                        <a href="https://x.com/" class="header__link" aria-label="X">
                            <img
                                src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='30'%20height='30'%20fill='none'%20viewBox='0%200%2030%2030'%3e%3cg%20clip-path='url(%23clip0_12_226)'%3e%3cpath%20fill='%23000'%20d='M26.786%200H3.214A3.215%203.215%200%200%200%200%203.214v23.572A3.215%203.215%200%200%200%203.214%2030h23.572A3.215%203.215%200%200%200%2030%2026.786V3.214A3.215%203.215%200%200%200%2026.786%200M23.51%2010.634c.014.187.014.382.014.57%200%205.805-4.42%2012.495-12.496%2012.495-2.491%200-4.801-.724-6.743-1.97.355.041.696.055%201.058.055a8.8%208.8%200%200%200%205.45-1.875%204.4%204.4%200%200%201-4.104-3.047c.676.1%201.285.1%201.982-.08a4.39%204.39%200%200%201-3.516-4.313v-.054a4.4%204.4%200%200%200%201.982.556%204.38%204.38%200%200%201-1.955-3.656c0-.817.214-1.567.596-2.217a12.47%2012.47%200%200%200%209.054%204.594c-.623-2.98%201.607-5.397%204.285-5.397%201.266%200%202.404.529%203.208%201.386a8.6%208.6%200%200%200%202.786-1.058%204.38%204.38%200%200%201-1.929%202.417%208.7%208.7%200%200%200%202.531-.683%209.2%209.2%200%200%201-2.203%202.277'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_12_226'%3e%3cpath%20fill='%23fff'%20d='M0%200h30v30H0z'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
                                alt="X"
                                width="30"
                                height="30"
                            />
                        </a>
                        <a href="https://www.twitch.tv/" class="header__link" aria-label="Twitch">
                            <img
                                src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='29'%20height='30'%20fill='none'%20viewBox='0%200%2029%2030'%3e%3cg%20clip-path='url(%23clip0_12_228)'%3e%3cpath%20fill='%23000'%20d='m1.991-.005-1.995%205.15v21.047h7.091v3.803h3.99l3.764-3.803h5.765l7.754-7.835V-.005zm23.711%2017.016-4.433%204.48h-7.091l-3.764%203.803v-3.803H4.43V2.68h21.272zM21.27%207.83v7.828h-2.657V7.83zm-7.091%200v7.828h-2.657V7.83z'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_12_228'%3e%3cpath%20fill='%23fff'%20d='M0%200h28.364v30H0z'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
                                alt="Twitch"
                                width="30"
                                height="30"
                            />
                        </a>
                        <a
                            href="https://www.instagram.com/"
                            class="header__link"
                            aria-label="Instagram"
                        >
                            <img
                                src="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20width='30'%20height='30'%20fill='none'%20viewBox='0%200%2030%2030'%3e%3cg%20clip-path='url(%23clip0_12_230)'%3e%3cpath%20fill='%23000'%20d='M15%2011.428a3.573%203.573%200%201%200%20.003%207.146A3.573%203.573%200%200%200%2015%2011.428m8.351-2.745a3.62%203.62%200%200%200-2.036-2.037c-1.407-.555-4.755-.43-6.315-.43s-4.905-.13-6.315.43a3.62%203.62%200%200%200-2.037%202.037c-.554%201.406-.43%204.757-.43%206.316s-.124%204.907.433%206.318a3.62%203.62%200%200%200%202.036%202.036c1.407.555%204.755.43%206.316.43s4.904.13%206.314-.43a3.62%203.62%200%200%200%202.037-2.036c.559-1.407.43-4.758.43-6.317s.129-4.906-.43-6.317zM15%2020.49a5.492%205.492%200%201%201%200-10.983%205.492%205.492%200%200%201%200%2010.983m5.717-9.93a1.282%201.282%200%201%201%201.186-.791%201.28%201.28%200%200%201-1.183.793zM26.786%200H3.214A3.214%203.214%200%200%200%200%203.214v23.572A3.214%203.214%200%200%200%203.214%2030h23.572A3.214%203.214%200%200%200%2030%2026.786V3.214A3.214%203.214%200%200%200%2026.786%200m-1.147%2019.42c-.086%201.716-.478%203.237-1.73%204.486-1.254%201.25-2.773%201.65-4.487%201.731-1.769.1-7.071.1-8.84%200-1.716-.086-3.231-.479-4.486-1.73-1.255-1.253-1.65-2.774-1.731-4.487-.1-1.77-.1-7.073%200-8.84.086-1.716.473-3.237%201.73-4.486%201.258-1.25%202.778-1.645%204.487-1.727%201.769-.1%207.071-.1%208.84%200%201.716.087%203.236.48%204.486%201.731%201.25%201.253%201.65%202.774%201.731%204.49.1%201.763.1%207.061%200%208.832'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_12_230'%3e%3cpath%20fill='%23fff'%20d='M0%200h30v30H0z'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
                                alt="Instagram"
                                width="30"
                                height="30"
                            />
                        </a>
                    </nav>
                </div>
            </div>
        </header>
