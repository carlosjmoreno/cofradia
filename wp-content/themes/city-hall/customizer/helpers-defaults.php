<?php

function academiathemes_option_defaults() {
    $defaults = array(

        /**
         * Color Scheme
         */
        // General
        'color-body-text'                     => '#111111',
        'color-link'                          => '#013B93',
        'color-link-hover'                    => '#B00000',

        // Sidebar Navigation Menu Widget
        'color-sidebar-menu-background'       => '#aa0000',

        // Sidebar Dynamic Menu
        'color-sidebar-dynamic-menu-background-inactive'    => '#ffffff',
        'color-sidebar-dynamic-menu-background-active'      => '#f3f3f3',
        'color-sidebar-dynamic-menu-inactive'               => '#111111',
        'color-sidebar-dynamic-menu-active'                 => '#B00000',
        'color-sidebar-dynamic-menu-border'                 => '#dddddd',

        // Mobile Menu
        'color-mobile-menu-toggle-background'         => '#013B93',
        'color-mobile-menu-toggle-background-hover'   => '#B00000',
        'color-mobile-menu-toggle'                    => '#ffffff',
        'color-mobile-menu-toggle-hover'              => '#ffffff',
        'color-mobile-menu-container-background'      => '#111111',
        'color-mobile-menu-link-border'               => '#333333',
        'color-mobile-menu-link'                      => '#ffffff',
        'color-mobile-menu-link-hover'                => '#f0c030',

        // Sidebar
        'color-sidebar-widget-title'                  => '#111111',

        // Pre-Footer Row 1
        'color-prefooter-row1-background'             => '#bb0000',
        'color-prefooter-row1-text'                   => '#ffffff',
        'color-prefooter-row1-link'                   => '#ffffff',
        'color-prefooter-row1-link-hover'             => '#ffffff',

        // Pre-Footer Row 2
        'color-prefooter-row2-background'             => '#ffffff',
        'color-prefooter-row2-text'                   => '',
        'color-prefooter-row2-link'                   => '',
        'color-prefooter-row2-link-hover'             => '',

        // Footer
        'color-footer-background'             => '#080808',
        'color-footer-text'                   => '#aaaaaa',
        'color-footer-widget-title'           => '#ffffff',
        'color-footer-link'                   => '#ffffff',
        'color-footer-link-hover'             => '#9ec0ff',
        'color-footer-copyright-divider'      => '#222222',

        /* translators: This is the copyright notice that appears in the footer of the website. */
        'theme-homepage-posts-heading'        => __('Recent Posts','city-hall'),
        'city_hall_copyright_text'            => sprintf( esc_html__( 'Copyright &copy; %1$s %2$s.', 'city-hall' ), date( 'Y' ), get_bloginfo( 'name' ) ),
    );

    return $defaults;
}

function academiathemes_get_default( $option ) {
    $defaults = academiathemes_option_defaults();
    $default  = ( isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : false;

    return $default;
}