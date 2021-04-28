<?php
/**
 * Recommended plugins
 *
 * @package Kreeti
 */

if ( ! function_exists( 'kreeti_lite_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function kreeti_lite_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Blockspare - Beautiful Page Building Gutenberg Blocks for WordPress', 'kreeti-lite' ),
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
                'name'     => esc_html__( 'WP Post Author', 'kreeti-lite' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'kreeti-lite' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            )
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'kreeti_lite_recommended_plugins' );
