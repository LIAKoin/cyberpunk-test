<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();

        if (is_page_template('page-templates/cyberpunk-landing.php')) {
            get_template_part('template-parts/cyberpunk-landing');
        } else {
            ?>
            <main class="container" style="padding: 140px 20px 80px;">
                <?php the_content(); ?>
            </main>
            <?php
        }
    }
}

get_footer();
