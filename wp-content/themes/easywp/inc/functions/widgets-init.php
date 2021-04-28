<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function easywp_widgets_init() {

register_sidebar(array(
    'id' => 'easywp-header-banner',
    'name' => esc_html__( 'Header Banner', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-left-sidebar',
    'name' => esc_html__( 'Left Sidebar', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the left-hand side of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="side-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-right-sidebar',
    'name' => esc_html__( 'Right Sidebar', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the right-hand side of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="side-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-1',
    'name' => esc_html__( 'Footer 1', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-2',
    'name' => esc_html__( 'Footer 2', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-3',
    'name' => esc_html__( 'Footer 3', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-4',
    'name' => esc_html__( 'Footer 4', 'easywp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

}
add_action( 'widgets_init', 'easywp_widgets_init' );