<?php
/**
* Enqueue scripts and styles
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function easywp_scripts() {
    wp_enqueue_style('easywp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('easywp-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700&amp;subset=latin-ext', array(), NULL);
    wp_enqueue_script('fitvids', get_template_directory_uri() .'/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);

    $easywp_primary_menu_active = FALSE;
    if ( !easywp_get_option('disable_primary_menu') ) {
        $easywp_primary_menu_active = TRUE;
    }
    $easywp_backtotop_active = FALSE;

    $easywp_sticky_menu = FALSE;
    $easywp_sticky_mobile_menu = TRUE;
    if ( !easywp_get_option('disable_sticky_menu') ) {
        $easywp_sticky_menu = TRUE;
    }
    if ( !easywp_get_option('enable_sticky_mobile_menu') ) {
        $easywp_sticky_mobile_menu = FALSE;
    }

    $easywp_sticky_sidebar = TRUE;
    if( is_singular() ) {
        if ( is_page_template( array( 'template-full-width.php', 'template-full-width-page.php', 'template-full-width-post.php', 'template-sitemap.php' ) ) ) {
           $easywp_sticky_sidebar = FALSE;
        }
    } else {
        if ( is_404() ) {
            $easywp_sticky_sidebar = FALSE;
        }
    }
    if ( $easywp_sticky_sidebar ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    wp_enqueue_script('easywp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('easywp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('easywp-customjs', get_template_directory_uri() .'/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'easywp-customjs', 'easywp_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'primary_menu_active' => $easywp_primary_menu_active,
            'sticky_menu' => $easywp_sticky_menu,
            'sticky_menu_mobile' => $easywp_sticky_mobile_menu,
            'sticky_sidebar' => $easywp_sticky_sidebar,
            'backtotop' => $easywp_backtotop_active,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'easywp_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function easywp_ie_scripts() {
    wp_enqueue_script( 'easywp-html5shiv', get_template_directory_uri(). '/js/html5shiv.js', array(), NULL, false);
    wp_script_add_data( 'easywp-html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'easywp-respond', get_template_directory_uri(). '/js/respond.js', array(), NULL, false );
    wp_script_add_data( 'easywp-respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'easywp_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function easywp_enqueue_customizer_styles() {
    wp_enqueue_style( 'easywp-customizer-styles', get_template_directory_uri() . '/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome-customizer', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'easywp_enqueue_customizer_styles' );