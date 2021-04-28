<?php
if (!function_exists('kreeti_lite_front_page_main_section')) :
    /**
     * Banner Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_front_page_main_section()
    {
        $kreeti_lite_enable_main_slider = kreeti_lite_get_option('show_main_news_section');

        do_action('kreeti_lite_action_banner_exclusive_posts');


        do_action('kreeti_lite_action_prime_news_section');


        if ($kreeti_lite_enable_main_slider):


                $kreeti_lite_layout_class = 'aft-banner-layout-1';


            ?>

            <section
                    class="aft-blocks aft-main-banner-section banner-carousel-1-wrap bg-fixed  kreeti-customizer  <?php echo esc_attr($kreeti_lite_layout_class); ?>">
                <div class="container-wrapper">

                    <div class="aft-main-banner-wrapper">
                        <?php

                            kreeti_lite_get_block('main', 'banner');

                        ?>
                    </div>


                </div>
            </section>


        <?php endif;
    }
endif;
add_action('kreeti_lite_action_front_page_main_section', 'kreeti_lite_front_page_main_section', 40);