<?php

/**
 * Front page section additions.
 */


if (!function_exists('kreeti_lite_full_width_upper_footer_section')) :
    /**
     *
     * @since Kreeti 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function kreeti_lite_full_width_upper_footer_section()
    {



        ?>

        <section class="aft-blocks above-footer-widget-section">
            <?php

            if (1 == kreeti_lite_get_option('frontpage_show_latest_posts')) {
                kreeti_lite_get_block('latest');
            }


            ?>
        </section>
        <?php

    }
endif;
add_action('kreeti_lite_action_full_width_upper_footer_section', 'kreeti_lite_full_width_upper_footer_section');
