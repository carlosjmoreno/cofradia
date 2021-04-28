<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Kreeti
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses kreeti_lite_header_style()
 */
function kreeti_lite_custom_header_setup()
{
    add_theme_support('custom-header', apply_filters('kreeti_lite_custom_header_args', array(
        'default-image' => '',
        'default-text-color' => '000000',
        'width' => 1500,
        'height' => 400,
        'flex-height' => true,
        'wp-head-callback' => 'kreeti_lite_header_style',
    )));
}

add_action('after_setup_theme', 'kreeti_lite_custom_header_setup');

if (!function_exists('kreeti_lite_header_style')) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see kreeti_lite_custom_header_setup().
     */
    function kreeti_lite_header_style()
    {
        $kreeti_lite_header_image_tint_overlay = kreeti_lite_get_option('disable_header_image_tint_overlay');
        $kreeti_lite_site_title_font_size = kreeti_lite_get_option('site_title_font_size');
        $kreeti_lite_header_text_color = get_header_textcolor();



        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php

            if($kreeti_lite_header_image_tint_overlay):
                ?>

            body .af-header-image.data-bg:before{
                opacity:0;
            }
            <?php
            endif;
            // Has the text been hidden?
            if ( ! display_header_text() ) :
            ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                display: none;
            }

            <?php
                // If the user has set a custom color for the text use that.
                else :
            ?>
            .site-title a,
            .site-header .site-branding .site-title a:visited,
            .site-header .site-branding .site-title a:hover,
            .site-description {
                color: #<?php echo esc_attr( $kreeti_lite_header_text_color ); ?>;
            }

            .header-layout-3 .site-header .site-branding .site-title,
            .site-branding .site-title {
                font-size: <?php echo esc_attr( $kreeti_lite_site_title_font_size ); ?>px;
            }

            @media only screen and (max-width: 640px) {
                .site-branding .site-title {
                    font-size: 40px;

                }
              }   

           @media only screen and (max-width: 375px) {
                    .site-branding .site-title {
                        font-size: 32px;

                    }
                }

            <?php endif; ?>


        </style>
        <?php
    }
endif;