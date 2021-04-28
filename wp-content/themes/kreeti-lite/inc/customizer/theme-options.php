<?php

/**
 * Option Panel
 *
 * @package Kreeti
 */

$kreeti_lite_default = kreeti_lite_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/customizer/frontpage-options.php';


// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'kreeti-lite'),
        'priority' => 200,
        'capability' => 'edit_theme_options',
    )
);


// Preloader Section.
$wp_customize->add_section('site_preloader_settings',
    array(
        'title' => esc_html__('Preloader Options', 'kreeti-lite'),
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - preloader.
$wp_customize->add_setting('enable_site_preloader',
    array(
        'default' => $kreeti_lite_default['enable_site_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_site_preloader',
    array(
        'label' => esc_html__('Enable Preloader', 'kreeti-lite'),
        'section' => 'site_preloader_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);


/**
 * Header section
 *
 * @package Kreeti
 */

// Frontpage Section.
$wp_customize->add_section('header_options_settings',
    array(
        'title' => esc_html__('Header Options', 'kreeti-lite'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);




// Setting - show_site_title_section.
$wp_customize->add_setting('show_date_section',
    array(
        'default' => $kreeti_lite_default['show_date_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_date_section',
    array(
        'label' => esc_html__('Show Date on Header', 'kreeti-lite'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,

    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('show_social_menu_section',
    array(
        'default' => $kreeti_lite_default['show_social_menu_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_social_menu_section',
    array(
        'label' => esc_html__('Show Social Menu on Header', 'kreeti-lite'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 11,
        //'active_callback' => 'kreeti_lite_top_header_status'
    )
);


// Breadcrumb Section.
$wp_customize->add_section('site_breadcrumb_settings',
    array(
        'title'      => esc_html__('Breadcrumb Options', 'kreeti-lite'),
        'priority'   => 49,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);


// Setting - breadcrumb.
$wp_customize->add_setting('enable_breadcrumb',
    array(
        'default' => $kreeti_lite_default['enable_breadcrumb'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_breadcrumb',
    array(
        'label' => esc_html__('Show breadcrumbs', 'kreeti-lite'),
        'section' => 'site_breadcrumb_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('select_breadcrumb_mode',
    array(
        'default'           => $default['select_breadcrumb_mode'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control( 'select_breadcrumb_mode',
    array(
        'label'       => esc_html__('Select Breadcrumbs', 'kreeti-lite'),
        'description' => esc_html__("Please ensure that you have enabled the plugin's breadcrumbs before choosing other than Default", 'kreeti-lite'),
        'section'     => 'site_breadcrumb_settings',
        'type'        => 'select',
        'choices'               => array(
            'default' => esc_html__( 'Default', 'kreeti-lite' ),
            'yoast' => esc_html__( 'Yoast SEO', 'kreeti-lite' ),
            'rankmath' => esc_html__( 'Rank Math', 'kreeti-lite' ),
            'bcn' => esc_html__( 'NavXT', 'kreeti-lite' ),
        ),
        'priority'    => 100,
    ));






/**
 * Layout options section
 *
 * @package Kreeti
 */

// Layout Section.
$wp_customize->add_section('site_layout_settings',
    array(
        'title' => esc_html__('Global Settings', 'kreeti-lite'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);







// Setting - global content alignment of news.
$wp_customize->add_setting('global_content_alignment',
    array(
        'default' => $kreeti_lite_default['global_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('global_content_alignment',
    array(
        'label' => esc_html__('Global Content Alignment', 'kreeti-lite'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Content - Primary sidebar', 'kreeti-lite'),
            'align-content-right' => esc_html__('Primary sidebar - Content', 'kreeti-lite'),
            'full-width-content' => esc_html__('Full width content', 'kreeti-lite')
        ),
        'priority' => 130,
    ));






// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_comment_count',
    array(
        'default' => $kreeti_lite_default['global_show_comment_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('global_show_comment_count',
    array(
        'label' => esc_html__('Comment Count', 'kreeti-lite'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'kreeti-lite'),
            'no' => esc_html__('Hide', 'kreeti-lite'),

        ),
        'priority' => 130,
    ));

//========== minutes read count options ===============

// Global Section.
$wp_customize->add_section('site_min_read_settings',
    array(
        'title' => esc_html__('Minutes Read Count', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_min_read',
    array(
        'default' => $kreeti_lite_default['global_show_min_read'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('global_show_min_read',
    array(
        'label' => esc_html__('Minutes Read Count', 'kreeti-lite'),
        'section' => 'site_min_read_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'kreeti-lite'),
            'no' => esc_html__('Hide', 'kreeti-lite'),

        ),
        'priority' => 130,
    ));




// Setting - global content alignment of news.
$wp_customize->add_setting('global_post_date_author_setting',
    array(
        'default' => $kreeti_lite_default['global_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('global_post_date_author_setting',
    array(
        'label' => esc_html__('Date and Author', 'kreeti-lite'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => esc_html__('Show Date and Author', 'kreeti-lite'),
            'hide-date-author' => esc_html__('Hide All', 'kreeti-lite'),
        ),
        'priority' => 130,
    ));


// Setting - global content alignment of news.
$wp_customize->add_setting('global_date_display_setting',
    array(
        'default' => $kreeti_lite_default['global_date_display_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('global_date_display_setting',
    array(
        'label' => esc_html__('Date Format', 'kreeti-lite'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'theme-date' => esc_html__('Date Format by Theme', 'kreeti-lite'),
            'default-date' => esc_html__('WordPress Default Date Format', 'kreeti-lite'),

        ),
        'priority' => 130,
        'active_callback' => 'kreeti_lite_display_date_status'
    ));

//============= Watch Online Section ==========
//section title
$wp_customize->add_setting('show_watch_online_section_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'show_watch_online_section_section_title',
        array(
            'label' => esc_html__("Custom Menu Section", 'kreeti-lite'),
            'section' => 'header_options_settings',
            'priority' => 100,
            'active_callback' => 'kreeti_lite_express_posts_section_status'
        )
    )
);

$wp_customize->add_setting('show_watch_online_section',
    array(
        'default' => $kreeti_lite_default['show_watch_online_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_watch_online_section',
    array(
        'label' => esc_html__('Enable Custom Menu Section', 'kreeti-lite'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);



// Setting - related posts.
$wp_customize->add_setting('aft_custom_link',
    array(
        'default' => $kreeti_lite_default['aft_custom_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('aft_custom_link',
    array(
        'label' => __('Link', 'kreeti-lite'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'kreeti_lite_show_watch_online_section_status'
    )
);


//========== single posts options ===============

// Single Section.
$wp_customize->add_section('site_single_posts_settings',
    array(
        'title' => esc_html__('Single Post', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_show_featured_image',
    array(
        'default' => $kreeti_lite_default['single_show_featured_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('single_show_featured_image',
    array(
        'label' => __('Show Featured Image', 'kreeti-lite'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);




    

//========== related posts  options ===============

// Single Section.
$wp_customize->add_section('site_single_related_posts_settings',
    array(
        'title' => esc_html__('Related Posts', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_show_related_posts',
    array(
        'default' => $kreeti_lite_default['single_show_related_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('single_show_related_posts',
    array(
        'label' => __('Show On Single Posts', 'kreeti-lite'),
        'section' => 'site_single_related_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_related_posts_title',
    array(
        'default' => $kreeti_lite_default['single_related_posts_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('single_related_posts_title',
    array(
        'label' => __('Title', 'kreeti-lite'),
        'section' => 'site_single_related_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'kreeti_lite_related_posts_status'
    )
);

/**
 * Archive options section
 *
 * @package Kreeti
 */

// Archive Section.
$wp_customize->add_section('site_archive_settings',
    array(
        'title' => esc_html__('Archive Settings', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

//Setting - archive content view of news.
$wp_customize->add_setting('archive_layout',
    array(
        'default' => $kreeti_lite_default['archive_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('archive_layout',
    array(
        'label' => esc_html__('Archive layout', 'kreeti-lite'),
        'description' => esc_html__('Select layout for archive', 'kreeti-lite'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-layout-grid' => esc_html__('Grid', 'kreeti-lite'),
            'archive-layout-full' => esc_html__('Full', 'kreeti-lite'),

        ),
        'priority' => 130,
    ));

// Setting - latest blog carousel.
$wp_customize->add_setting('archive_layout_first_post_full',
    array(
        'default' => $kreeti_lite_default['archive_layout_first_post_full'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('archive_layout_first_post_full',
    array(
        'label' => __('Make First Post Full', 'kreeti-lite'),
        'section' => 'site_archive_settings',
        'type' => 'checkbox',
        'priority' => 130,
        'active_callback' => 'kreeti_lite_archive_layout_first_post_full_status'
    )
);


$wp_customize->add_control('archive_content_view',
    array(
        'label' => esc_html__('Content View', 'kreeti-lite'),
        'description' => esc_html__('Select content view for archive', 'kreeti-lite'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-content-excerpt' => esc_html__('Post Excerpt', 'kreeti-lite'),
            'archive-content-full' => esc_html__('Full Content', 'kreeti-lite'),
            'archive-content-none' => esc_html__('None', 'kreeti-lite'),

        ),
        'priority' => 130,
    ));

//========== sidebar blocks options ===============

// Trending Section.
$wp_customize->add_section('sidebar_block_settings',
    array(
        'title' => esc_html__('Sidebar Block Options', 'kreeti-lite'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Trending Section.
$wp_customize->add_setting('sidebar_global_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'sidebar_global_section_title',
        array(
            'label' => esc_html__("General Settings", 'kreeti-lite'),
            'section' => 'sidebar_block_settings',
            'priority' => 100,

        )
    )
);


// Setting - frontpage_sticky_sidebar.
$wp_customize->add_setting('frontpage_sticky_sidebar',
    array(
        'default'           => $default['frontpage_sticky_sidebar'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_sticky_sidebar',
    array(
        'label'    => esc_html__('Make Sidebar Sticky', 'kreeti-lite'),
        'section'  => 'sidebar_block_settings',
        'type'     => 'checkbox',
        'priority' => 100,

    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('frontpage_sticky_sidebar_position',
    array(
        'default'           => $default['frontpage_sticky_sidebar_position'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_sanitize_select',
    )
);

$wp_customize->add_control( 'frontpage_sticky_sidebar_position',
    array(
        'label'       => esc_html__('Sidebar Sticky Position', 'kreeti-lite'),
        'section'     => 'sidebar_block_settings',
        'type'        => 'select',
        'choices'               => array(
            'sidebar-sticky-top' => esc_html__( 'Top', 'kreeti-lite' ),
            'sidebar-sticky-bottom' => esc_html__( 'Bottom', 'kreeti-lite' ),
        ),
        'priority'    => 100,
        'active_callback' => 'frontpage_sticky_sidebar_status'
    ));

// Trending Section.
$wp_customize->add_setting('sidebar_trending_post_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'sidebar_trending_post_section_title',
        array(
            'label' => esc_html__("Trending Now Section", 'kreeti-lite'),
            'section' => 'sidebar_block_settings',
            'priority' => 100,

        )
    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('sidebar_trending_post_title',
    array(
        'default' => $kreeti_lite_default['sidebar_trending_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('sidebar_trending_post_title',
    array(
        'label' => esc_html__('Title', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'text',
        'priority' => 100,


    )
);


// Setting - show_featured_posts_section.
$wp_customize->add_setting('show_sidebar_trending_post_in_frontpage',
    array(
        'default' => $kreeti_lite_default['show_sidebar_trending_post_in_frontpage'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_sidebar_trending_post_in_frontpage',
    array(
        'label' => esc_html__('Show on Latest Posts Sidebar', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,


    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('show_sidebar_trending_post_in_archive',
    array(
        'default' => $kreeti_lite_default['show_sidebar_trending_post_in_archive'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_sidebar_trending_post_in_archive',
    array(
        'label' => esc_html__('Show on Archive Sidebar', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,


    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('show_sidebar_trending_post_in_single',
    array(
        'default' => $kreeti_lite_default['show_sidebar_trending_post_in_single'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_sidebar_trending_post_in_single',
    array(
        'label' => esc_html__('Show on Single Sidebar', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,


    )
);

// Setting - drop down category for slider.
$wp_customize->add_setting('select_sidebar_trending_post_category',
    array(
        'default' => $kreeti_lite_default['select_sidebar_trending_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_sidebar_trending_post_category',
    array(
        'label' => esc_html__('Select Category', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,


    )));


// Social Contact Section.

//section title
$wp_customize->add_setting('sidebar_social_contact_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'sidebar_social_contact_section_title',
        array(
            'label' => esc_html__("Social Contacts Section", 'kreeti-lite'),
            'section' => 'sidebar_block_settings',
            'priority' => 100,

        )
    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('sidebar_social_contacts_section_title',
    array(
        'default' => $kreeti_lite_default['sidebar_social_contacts_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('sidebar_social_contacts_section_title',
    array(
        'label' => esc_html__('Title', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'text',
        'priority' => 100,


    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('show_sidebar_social_contacts_in_frontpage',
    array(
        'default' => $kreeti_lite_default['show_sidebar_social_contacts_in_frontpage'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_sidebar_social_contacts_in_frontpage',
    array(
        'label' => esc_html__('Show on Latest Posts Sidebar', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,


    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('show_sidebar_social_contacts_in_archive',
    array(
        'default' => $kreeti_lite_default['show_sidebar_social_contacts_in_archive'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_sidebar_social_contacts_in_archive',
    array(
        'label' => esc_html__('Show on Archive Sidebar', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,


    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting('show_sidebar_social_contacts_in_single',
    array(
        'default' => $kreeti_lite_default['show_sidebar_social_contacts_in_single'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_sidebar_social_contacts_in_single',
    array(
        'label' => esc_html__('Show on Single Sidebar', 'kreeti-lite'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,


    )
);






//========== footer latest blog carousel options ===============

// Footer Section.
$wp_customize->add_section('frontpage_latest_posts_settings',
    array(
        'title' => esc_html__('You May Have Missed', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);
// Setting - latest blog carousel.
$wp_customize->add_setting('frontpage_show_latest_posts',
    array(
        'default' => $kreeti_lite_default['frontpage_show_latest_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_show_latest_posts',
    array(
        'label' => __('Show Above Footer', 'kreeti-lite'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


// Setting - featured_news_section_title.
$wp_customize->add_setting('frontpage_latest_posts_section_title',
    array(
        'default' => $kreeti_lite_default['frontpage_latest_posts_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('frontpage_latest_posts_section_title',
    array(
        'label' => esc_html__('Posts Section Title', 'kreeti-lite'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'kreeti_lite_latest_news_section_status'

    )
);




//========== footer section options ===============
// Footer Section.
$wp_customize->add_section('site_footer_settings',
    array(
        'title' => esc_html__('Footer', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('footer_copyright_text',
    array(
        'default' => $kreeti_lite_default['footer_copyright_text'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('footer_copyright_text',
    array(
        'label' => __('Copyright Text', 'kreeti-lite'),
        'section' => 'site_footer_settings',
        'type' => 'text',
        'priority' => 100,
    )
);



