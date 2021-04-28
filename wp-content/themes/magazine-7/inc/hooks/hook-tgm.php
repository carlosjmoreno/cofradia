<?php
/**
 * Recommended plugins
 *
 * @package Magazine 7
 */

if ( ! function_exists( 'magazine_7_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function magazine_7_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Blockspare - Beautiful Page Building Blocks for WordPress', 'magazine-7' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Latest Posts Block Lite', 'kreeti-lite' ),
                'slug'     => 'latest-posts-block-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Magic Content Box Lite', 'kreeti-lite' ),
                'slug'     => 'magic-content-box-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'magazine-7' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Woo Product Showcase', 'magazine-7' ),
                'slug'     => 'woo-product-showcase',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'magazine-7' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),           
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'magazine_7_recommended_plugins' );
