<?php

function academiathemes_customizer_define_color_scheme_sections( $sections ) {
    $panel           = 'academiathemes' . '_color-scheme';
    $colors_sections = array();

    $colors_sections['color'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'General', 'city-hall' ),
        'options' => array(

            'color-body-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Body Text', 'city-hall' ),
                ),
            ),

            'color-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color', 'city-hall' ),
                ),
            ),

            'color-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color on Hover', 'city-hall' ),
                ),
            ),

            'color-sidebar-widget-title' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Sidebar Widget Title Color', 'city-hall' ),
                ),
            ),

        )
    );

    $colors_sections['color-mobile-menu'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Mobile Menu', 'city-hall' ),
        'options' => array(

            'color-mobile-menu-toggle-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Background', 'city-hall' ),
                ),
            ),

            'color-mobile-menu-toggle-background-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Background :hover', 'city-hall' ),
                ),
            ),

            'color-mobile-menu-toggle' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Color', 'city-hall' ),
                ),
            ),

            'color-mobile-menu-toggle-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Color :hover', 'city-hall' ),
                ),
            ),
            'color-mobile-menu-container-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Background', 'city-hall' ),
                ),
            ),
            'color-mobile-menu-link-border' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Border Color', 'city-hall' ),
                ),
            ),
            'color-mobile-menu-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color', 'city-hall' ),
                ),
            ),
            'color-mobile-menu-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color :hover', 'city-hall' ),
                ),
            ),

        )
    );

    $colors_sections['color-sidebar-navigation-menu-widget'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Sidebar Navigation Menu Widget', 'city-hall' ),
        'options' => array(

            'color-sidebar-menu-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Highlight Color', 'city-hall' ),
                ),
            ),

        )
    );

    $colors_sections['color-sidebar-dynamic-menu-widget'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Sidebar Dynamic Menu', 'city-hall' ),
        'options' => array(

            'color-sidebar-dynamic-menu-background-inactive' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background Color', 'city-hall' ),
                ),
            ),

            'color-sidebar-dynamic-menu-background-active' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background Color of Current Page', 'city-hall' ),
                ),
            ),

            'color-sidebar-dynamic-menu-inactive' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text Color', 'city-hall' ),
                ),
            ),

            'color-sidebar-dynamic-menu-active' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text Color of Current Page', 'city-hall' ),
                ),
            ),

            'color-sidebar-dynamic-menu-border' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Border Color', 'city-hall' ),
                ),
            ),

        )
    );

    $colors_sections['color-prefooter-row1'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Pre-Footer Row 1', 'city-hall' ),
        'options' => array(

            'color-prefooter-row1-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background', 'city-hall' ),
                ),
            ),

            'color-prefooter-row1-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text', 'city-hall' ),
                ),
            ),

            'color-prefooter-row1-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link', 'city-hall' ),
                ),
            ),

            'color-prefooter-row1-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link on Hover', 'city-hall' ),
                ),
            ),

        )
    );

    $colors_sections['color-prefooter-row2'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Pre-Footer Row 2', 'city-hall' ),
        'options' => array(

            'color-prefooter-row2-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background', 'city-hall' ),
                ),
            ),

            'color-prefooter-row2-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text', 'city-hall' ),
                ),
            ),

            'color-prefooter-row2-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link', 'city-hall' ),
                ),
            ),

            'color-prefooter-row2-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link on Hover', 'city-hall' ),
                ),
            ),

        )
    );

    $colors_sections['color-footer'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Footer', 'city-hall' ),
        'options' => array(

            'color-footer-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background', 'city-hall' ),
                ),
            ),

            'color-footer-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text', 'city-hall' ),
                ),
            ),

            'color-footer-widget-title' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Widget Title', 'city-hall' ),
                ),
            ),

            'color-footer-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link', 'city-hall' ),
                ),
            ),

            'color-footer-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link on Hover', 'city-hall' ),
                ),
            ),

            'color-footer-copyright-divider' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Copyright text border color', 'city-hall' ),
                ),
            ),

        )
    );

    return array_merge( $sections, $colors_sections );
}

add_filter( 'academiathemes_customizer_sections', 'academiathemes_customizer_define_color_scheme_sections' );
