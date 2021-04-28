<?php


function academia_get_css_rules(){
    return array(

        'color-rules' => array(
            array(
                'id' => 'color-body-text',
                'selector' => 'body',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-link',
                'selector' => 'a, .academia-featured-page .title-post a',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-link-hover',
                'selector' => 'a:hover, a:focus, .academia-featured-page .title-post a:hover, .academia-featured-page .title-post a:focus, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus, #logo a:hover, #logo a:focus, #useful-menu .current-menu-item a, #useful-menu a:hover, #useful-menu a:focus, #lectura-menu-main .sub-menu .current-menu-item > a, #lectura-menu-main .sub-menu a:hover, .academia-column-aside .widget_nav_menu .current-menu-item > a, .academia-column-aside .widget_nav_menu a:hover, .academia-column-aside .widget_nav_menu a:focus, .academia-related-pages .current-menu-item a, .academia-related-pages .academia-related-page a:hover, .academia-related-pages .academia-related-page a:focus, #academia-slideshow .title-post a:hover, #academia-slideshow .title-post a:focus, #lectura-menu-main .sub-menu .current-menu-item > a', 
                'rule' => 'color'
            ),

            array(
                'id' => 'color-link-hover',
                'selector' => '.flex-control-paging li a.flex-active', 
                'rule' => 'background-color'
            ),

            // Mobile Menu

            array(
                'id' => 'color-mobile-menu-toggle-background',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-mobile-menu-toggle-background-hover',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor:hover, #site-mobile-menu-toggle .site-toggle-anchor:focus',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-mobile-menu-toggle',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-toggle-hover',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor:hover, #site-mobile-menu-toggle .site-toggle-anchor:focus',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-container-background',
                'selector' => '#site-mobile-menu',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-mobile-menu-link-border',
                'selector' => '#site-mobile-menu .menu li, #site-mobile-menu .sub-menu-toggle',
                'rule' => 'border-color'
            ),

            array(
                'id' => 'color-mobile-menu-link',
                'selector' => '#site-mobile-menu a, #site-mobile-menu .sub-menu-toggle',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-link-hover',
                'selector' => '#site-mobile-menu a:hover, #site-mobile-menu a:focus',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-link-hover',
                'selector' => '#site-mobile-menu .sub-menu-toggle:hover, #site-mobile-menu .sub-menu-toggle:focus',
                'rule' => 'background-color'
            ),
            
			// Sidebar Navigation Menu Widget

            array(
                'id' => 'color-sidebar-menu-background',
                'selector' => '.site-column-aside .widget_nav_menu .current-menu-ancestor > a, .site-column-aside .widget_nav_menu .current-menu-item > a',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-sidebar-menu-background',
                'selector' => '.site-column-aside .widget_nav_menu .menu-item-has-children .menu-item > a:hover, .site-column-aside .widget_nav_menu .menu-item-has-children .menu-item > a:focus, .site-column-aside .widget_nav_menu .sub-menu .current-menu-item > a',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-sidebar-menu-background',
                'selector' => '.site-column-aside .widget_nav_menu .current-menu-ancestor > a, .site-column-aside .widget_nav_menu .current-menu-item > a, .site-column-aside .widget_nav_menu .sub-menu .current-menu-item > a',
                'rule' => 'border-left-color'
            ),

            array(
                'id' => 'color-sidebar-menu-background',
                'selector' => '.site-column-aside .widget_nav_menu .current-menu-ancestor > a, .site-column-aside .widget_nav_menu .current-menu-item > a, #site-aside-secondary .widget_nav_menu .sub-menu .current-menu-item > a',
                'rule' => 'border-right-color'
            ),

            // Sidebar Dynamic Menu

            array(
                'id' => 'color-sidebar-dynamic-menu-background-inactive',
                'selector' => '.academia-related-pages .academia-related-page a',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-sidebar-dynamic-menu-inactive',
                'selector' => '.academia-related-pages .academia-related-page:not(.current-menu-item) a',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-sidebar-dynamic-menu-background-active',
                'selector' => '.academia-related-pages .current-menu-item a, .academia-related-pages .academia-related-page a:hover, .academia-related-pages .academia-related-page a:focus',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-sidebar-dynamic-menu-active',
                'selector' => '.academia-related-pages .current-menu-item a, .academia-related-pages .academia-related-page a:hover, .academia-related-pages .academia-related-page a:focus',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-sidebar-dynamic-menu-border',
                'selector' => '.academia-related-pages .academia-related-page + .academia-related-page',
                'rule' => 'border-top-color'
            ),

            // Sidebar

            array(
                'id' => 'color-sidebar-widget-title',
                'selector' => '.site-column-aside .widget-title',
                'rule' => 'color'
            ),

            // Pre-Footer Row 1

            array(
                'id' => 'color-prefooter-row1-background',
                'selector' => '#site-footer-identity',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-prefooter-row1-text',
                'selector' => '#site-footer-identity',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-prefooter-row1-link',
                'selector' => '#site-footer-identity a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-prefooter-row1-link-hover',
                'selector' => '#site-footer-identity a:hover, #site-footer-identity a:focus',
                'rule' => 'color'
            ),

            // Pre-Footer Row 2

            array(
                'id' => 'color-prefooter-row2-background',
                'selector' => '#site-prefooter',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-prefooter-row2-text',
                'selector' => '#site-prefooter',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-prefooter-row2-link',
                'selector' => '#site-prefooter a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-prefooter-row2-link-hover',
                'selector' => '#site-prefooter a:hover, #site-prefooter a:focus',
                'rule' => 'color'
            ),

            // Footer

            array(
                'id' => 'color-footer-background',
                'selector' => '#site-footer',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-footer-text',
                'selector' => '#site-footer',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-widget-title',
                'selector' => '#site-footer .widget-title',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-link',
                'selector' => '#site-footer a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-link-hover',
                'selector' => '#site-footer .current-menu-item a, #site-footer a:hover, #site-footer a:focus',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-copyright-divider',
                'selector' => '#site-footer-credit',
                'rule' => 'border-top-color'
            ),

        ),

    );
}
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * This function reads in the options from theme mods and determines whether a CSS rule is needed to implement an
 * option. CSS is only written for choices that are non-default in order to avoid adding unnecessary CSS. All options
 * are also filterable allowing for more precise control via a child theme or plugin.
 *
 * Note that all CSS for options is present in this function except for the CSS for fonts and the logo, which require
 * a lot more code to implement.
 *
 * @return void
 */
function academia_css_add_rules() {
    /**
     * Colors section
     */

    $rules = academia_get_css_rules();
    
    foreach($rules['color-rules'] as $color_rule) {
		academia_css_add_simple_color_rule($color_rule['id'], $color_rule['selector'], $color_rule['rule']);
    }
}

add_action( 'academia_css', 'academia_css_add_rules' );

function academia_css_add_simple_color_rule( $setting_id, $selectors, $declarations ) {
    $value = academiathemes_maybe_hash_hex_color( get_theme_mod( $setting_id, academiathemes_get_default( $setting_id ) ) );

    if ( $value === academiathemes_get_default( $setting_id ) ) {
        return;
    }
    
    if ( strtolower( $value ) === strtolower( academiathemes_get_default( $setting_id ) ) ) {
        return;
    }

    if ( is_string( $selectors ) ) {
        $selectors = array( $selectors );
    }

    if ( is_string( $declarations ) ) {
        $declarations = array(
            $declarations => $value
        );
    }

    academia_get_css()->add( array(
        'selectors'    => $selectors,
        'declarations' => $declarations
    ) );
}
