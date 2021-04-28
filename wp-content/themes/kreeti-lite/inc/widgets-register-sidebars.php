<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kreeti_widgets_init()
{


    register_sidebar(array(
        'name' => esc_html__('Main Sidebar - Upper Section', 'kreeti-lite'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Main Sidebar - Lower Section', 'kreeti-lite'),
        'id' => 'aft-sidebar-2',
        'description' => esc_html__('Add widgets for main sidebar.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front-page Content Section', 'kreeti-lite'),
        'id' => 'home-content-widgets',
        'description' => esc_html__('Add widgets to front-page contents section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front-page Sidebar Section', 'kreeti-lite'),
        'id' => 'home-sidebar-widgets',
        'description' => esc_html__('Add widgets to front-page sidebar section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Banner Ad Section', 'kreeti-lite'),
        'id'            => 'home-advertisement-widgets',
        'description'   => esc_html__('Add widgets for frontpage banner section advertisement.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Prime News Section', 'kreeti-lite'),
        'id'            => 'home-prime-news-widgets',
        'description'   => esc_html__('Add widgets for frontpage prime news section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Off Canvas', 'kreeti-lite'),
        'id'            => 'express-off-canvas-panel',
        'description'   => esc_html__('Add widgets for off-canvas section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Above Main Banner Section', 'kreeti-lite'),
        'id'            => 'home-above-main-banner-widgets',
        'description'   => esc_html__('Add widgets for above main banner section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Below Main Banner Section', 'kreeti-lite'),
        'id'            => 'home-below-main-banner-widgets',
        'description'   => esc_html__('Add widgets for below main banner section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));




    register_sidebar(array(
        'name'          => esc_html__('Below Featured Section', 'kreeti-lite'),
        'id'            => 'home-below-featured-posts-widgets',
        'description'   => esc_html__('Add widgets for below featured section.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));




    register_sidebar(array(
        'name' => esc_html__('Footer First Section', 'kreeti-lite'),
        'id' => 'footer-first-widgets-section',
        'description' => esc_html__('Displays items on footer first column.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer Second Section', 'kreeti-lite'),
        'id' => 'footer-second-widgets-section',
        'description' => esc_html__('Displays items on footer second column.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Third Section', 'kreeti-lite'),
        'id' => 'footer-third-widgets-section',
        'description' => esc_html__('Displays items on footer third column.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));


    register_sidebar(array(
        'name'          => esc_html__('Below Posts Title Ad Section', 'kreeti-lite'),
        'id'            => 'single-below-posts-title-advertisement-widgets',
        'description'   => esc_html__('Add widgets for single below posts title advertisement.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Below Posts Content Ad Section', 'kreeti-lite'),
        'id'            => 'single-below-posts-content-advertisement-widgets',
        'description'   => esc_html__('Add widgets for single posts advertisement.', 'kreeti-lite'),
        'before_widget' => '<div id="%1$s" class="widget kreeti-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span>',
        'after_title' => '<span class="heading-line-after"></span></h2>',
    ));


}

add_action('widgets_init', 'kreeti_widgets_init');