<?php
if (!function_exists('kreeti_lite_banner_featured_section')):
    /**
     * Ticker Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_banner_featured_section()
    {
        ?>
        <div class="aft-frontpage-feature-section-wrapper">

            <?php $kreeti_lite_show_featured_section = kreeti_lite_get_option('show_featured_posts_section');
            if ($kreeti_lite_show_featured_section): ?>
                <section class="aft-blocks af-main-banner-featured-posts">
                    <div class="container-wrapper">
                        <?php do_action('kreeti_lite_action_banner_featured_posts'); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php

            $kreeti_lite_show_express_post_section = kreeti_lite_get_option('show_express_post_section');

            ?>



            <?php if ($kreeti_lite_show_express_post_section) { ?>
                <section class="aft-blocks aft-featured-category-section featured-cate-sec kreeti-customizer">
                    <div class="container-wrapper">
                        <div class="af-container-row">
                            <?php kreeti_lite_get_block('express-post', 'featured'); ?>
                        </div>
                    </div>
                </section>
            <?php } ?>

        </div>
    <?php }
endif;


add_action('kreeti_lite_action_banner_featured_section', 'kreeti_lite_banner_featured_section', 10);