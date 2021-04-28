<?php
if (!function_exists('kreeti_lite_banner_advertisement')):
    /**
     * Ticker Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_banner_advertisement()
    {


        $kreeti_lite_banner_advertisement = kreeti_lite_get_option('banner_advertisement_section');

        if (('' != $kreeti_lite_banner_advertisement) ) { ?>
            <div class="banner-promotions-wrapper">
                <?php if (('' != $kreeti_lite_banner_advertisement)):
                    $kreeti_lite_banner_advertisement = absint($kreeti_lite_banner_advertisement);
                    $kreeti_lite_banner_advertisement = wp_get_attachment_image($kreeti_lite_banner_advertisement, 'full');
                    $kreeti_lite_banner_advertisement_url = kreeti_lite_get_option('banner_advertisement_section_url');
                    $kreeti_lite_banner_advertisement_url = isset($kreeti_lite_banner_advertisement_url) ? esc_url($kreeti_lite_banner_advertisement_url) : '#';
                    $kreeti_lite_open_on_new_tab = kreeti_lite_get_option('banner_advertisement_open_on_new_tab');
                    $kreeti_lite_open_on_new_tab = ('' != $kreeti_lite_open_on_new_tab) ? '_blank' : '';

                    ?>
                    <div class="promotion-section">
                        <a href="<?php echo esc_url($kreeti_lite_banner_advertisement_url); ?>" target="<?php echo esc_attr($kreeti_lite_open_on_new_tab); ?>">
                            <?php echo wp_kses_post($kreeti_lite_banner_advertisement); ?>
                        </a>
                    </div>
                <?php endif; ?>                

            </div>
            <!-- Trending line END -->
            <?php
        }

         if (is_active_sidebar('home-advertisement-widgets')): ?>
                     <div class="banner-promotions-wrapper">
                    <div class="promotion-section">
                        <?php dynamic_sidebar('home-advertisement-widgets'); ?>
                    </div>
                </div>
                <?php endif;
    }
endif;

add_action('kreeti_lite_action_banner_advertisement', 'kreeti_lite_banner_advertisement', 10);