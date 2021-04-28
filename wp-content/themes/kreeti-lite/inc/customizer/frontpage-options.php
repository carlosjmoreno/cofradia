<?php

/**
 * Option Panel
 *
 * @package Kreeti
 */

$kreeti_lite_default = kreeti_lite_get_default_theme_options();

/**
 * Frontpage options section
 *
 * @package Kreeti
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel('frontpage_option_panel',
    array(
        'title' => esc_html__('Frontpage Options', 'kreeti-lite'),
        'priority' => 199,
        'capability' => 'edit_theme_options',
    )
);


// Advertisement Section.
$wp_customize->add_section('frontpage_advertisement_settings',
    array(
        'title' => esc_html__('Banner Advertisement', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('banner_advertisement_section',
    array(
        'default' => $kreeti_lite_default['banner_advertisement_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);




$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_advertisement_section',
        array(
            'label' => esc_html__('Banner Section Advertisement', 'kreeti-lite'),
            'description' => sprintf(esc_html('Recommended Size %1$s px X %2$s px', 'kreeti-lite'), 930, 110),
            'section' => 'frontpage_advertisement_settings',
            'width' => 930,
            'height' => 110,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 120,
        )
    )
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting('banner_advertisement_section_url',
    array(
        'default' => $kreeti_lite_default['banner_advertisement_section_url'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('banner_advertisement_section_url',
    array(
        'label' => esc_html__('URL Link', 'kreeti-lite'),
        'section' => 'frontpage_advertisement_settings',
        'type' => 'text',
        'priority' => 130,
    )
);




//Popular Tags
    // Advertisement Section.
    $wp_customize->add_section('frontpage_popular_tags_settings',
        array(
            'title' => esc_html__('Popular Tags', 'kreeti-lite'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );


// Setting banner_advertisement_section.
    $wp_customize->add_setting('frontpage_popular_tags_settings',
        array(
            'default' => $kreeti_lite_default['frontpage_popular_tags_settings'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting('show_popular_tags_section',
        array(
            'default' => $kreeti_lite_default['show_popular_tags_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('show_popular_tags_section',
        array(
            'label' => esc_html__('Enable Poplular Tags', 'kreeti-lite'),
            'section' => 'frontpage_popular_tags_settings',
            'type' => 'checkbox',
            'priority' => 100,
        )
    );


    $wp_customize->add_setting('frontpage_popular_tags_section_title',
        array(
            'default' => $kreeti_lite_default['frontpage_popular_tags_section_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('frontpage_popular_tags_section_title',
        array(
            'label' => esc_html__('Section Title ', 'kreeti-lite'),
            'section' => 'frontpage_popular_tags_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'kreeti_lite_popular_tags_section_status'

        )

    );


    //Flash news
    $wp_customize->add_section('frontpage_flash_news_settings',
        array(
            'title' => esc_html__('Breaking News', 'kreeti-lite'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );


// Setting banner_advertisement_section.
    $wp_customize->add_setting('frontpage_flash_news_settings',
        array(
            'default' => $kreeti_lite_default['frontpage_flash_news_settings'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting('show_flash_news_section',
        array(
            'default' => $kreeti_lite_default['show_flash_news_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('show_flash_news_section',
        array(
            'label' => esc_html__('Enable Flash News', 'kreeti-lite'),
            'section' => 'frontpage_flash_news_settings',
            'type' => 'checkbox',
            'priority' => 100,
        )
    );


    $wp_customize->add_setting('flash_news_title',
        array(
            'default' => $kreeti_lite_default['flash_news_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('flash_news_title',
        array(
            'label' => esc_html__('Section Title ', 'kreeti-lite'),
            'section' => 'frontpage_flash_news_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'kreeti_lite_flash_posts_section_status'

        )

    );

    $wp_customize->add_setting('select_flash_news_category',
        array(
            'default'           => $kreeti_lite_default['select_flash_news_category'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_control(new kreeti_lite_Dropdown_Taxonomies_Control($wp_customize, 'select_flash_news_category',
        array(
            'label'       => esc_html__('Flash Posts Category', 'kreeti-lite'),
            'description' => esc_html__('Select category to be shown on trending posts ', 'kreeti-lite'),
            'section'     => 'frontpage_flash_news_settings',
            'type'        => 'dropdown-taxonomies',
            'taxonomy'    => 'category',
            'priority'    => 100,
            'active_callback' => 'kreeti_lite_flash_posts_section_status'
        )));





    /*
     * Prime News
     */


    $wp_customize->add_section('frontpage_prime_news_settings',
        array(
            'title' => esc_html__('Prime News', 'kreeti-lite'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );


    $wp_customize->add_setting('frontpage_prime_news_settings',
        array(
            'default' => $kreeti_lite_default['frontpage_prime_news_settings'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_setting('show_prime_news',
        array(
            'default' => $kreeti_lite_default['show_prime_news'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('show_prime_news',
        array(
            'label' => esc_html__('Show Prime News', 'kreeti-lite'),
            'section' => 'frontpage_prime_news_settings',
            'type' => 'checkbox',
            'priority' => 100,
        )
    );

    $wp_customize->add_setting('frontpage_prime_news_section_title',
        array(
            'default' => $kreeti_lite_default['frontpage_prime_news_section_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('frontpage_prime_news_section_title',
        array(
            'label' => esc_html__('Section Title ', 'kreeti-lite'),
            'section' => 'frontpage_prime_news_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'kreeti_lite_prime_news_section_status'

        )

    );




    // Setting - drop down category for slider.
    $wp_customize->add_setting('select_prime_news_category',
        array(
            'default' => $kreeti_lite_default['select_prime_news_category'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_prime_news_category',
        array(
            'label' => esc_html__('Select Category', 'kreeti-lite'),
            'description' => esc_html__('Select category to be shown on main slider section', 'kreeti-lite'),
            'section' => 'frontpage_prime_news_settings',
            'type' => 'dropdown-taxonomies',
            'taxonomy' => 'category',
            'priority' => 100,
            'active_callback' => function ($control) {
                return (
                    kreeti_lite_prime_news_section_status($control)
                );
            },

        )));




    /**
 * Main Banner Slider Section
 * */

// Main banner Sider Section.
$wp_customize->add_section('frontpage_main_banner_section_settings',
    array(
        'title' => esc_html__('Main Banner', 'kreeti-lite'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


// Setting - show_main_news_section.
$wp_customize->add_setting('show_main_news_section',
    array(
        'default' => $kreeti_lite_default['show_main_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_main_news_section',
    array(
        'label' => esc_html__('Enable Main Banner Section', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);


/**
 * Editor's Picks Post Section
 * */

//section title
$wp_customize->add_setting('editors_picks_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'editors_picks_panel_section_title',
        array(
            'label' => esc_html__("Editor's Picks Section", 'kreeti-lite'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => function($control){
                return(
                    kreeti_lite_main_banner_section_status($control)

                );
            },
        )
    )
);

$wp_customize->add_setting('main_editors_picks_section_title',
    array(
        'default' => $kreeti_lite_default['main_editors_picks_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('main_editors_picks_section_title',
    array(
        'label' => esc_html__('Section Title ', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => function($control){
            return(kreeti_lite_main_banner_section_status($control)

            );
        },

    )

);



// Setting - drop down category for slider.
$wp_customize->add_setting('select_editors_picks_news_category',
    array(
        'default' => $kreeti_lite_default['select_editors_picks_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_editors_picks_news_category',
    array(
        'label' => esc_html__('Select Category', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                kreeti_lite_main_banner_section_status($control)

            );
        },

    )));





//section title
$wp_customize->add_setting('main_banner_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'main_banner_panel_section_title',
        array(
            'label' => esc_html__('Main News Section ', 'kreeti-lite'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => 'kreeti_lite_main_banner_section_status',
        )
    )
);

$wp_customize->add_setting('main_banner_news_section_title',
    array(
        'default' => $kreeti_lite_default['main_banner_news_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('main_banner_news_section_title',
    array(
        'label' => esc_html__('Section Title ', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'kreeti_lite_main_banner_section_status'

    )

);



// Setting - drop down category for slider.
$wp_customize->add_setting('select_slider_news_category',
    array(
        'default' => $kreeti_lite_default['select_slider_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_slider_news_category',
    array(
        'label' => esc_html__('Select Category', 'kreeti-lite'),
        'description' => esc_html__('Select category to be shown on main slider section', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                kreeti_lite_main_banner_section_status($control)

            );
        },

    )));




/**
 * Trending Post Section
 * */

//section title
$wp_customize->add_setting('trending_post_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Kreeti_Lite_Section_Title(
        $wp_customize,
        'trending_post_panel_section_title',
        array(
            'label' => esc_html__("Trending Now Section", 'kreeti-lite'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => function ($control) {
                return (
                    kreeti_lite_main_banner_section_status($control)

                );
            },
        )
    )
);



$wp_customize->add_setting('main_trending_news_section_title',
    array(
        'default' => $kreeti_lite_default['main_trending_news_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('main_trending_news_section_title',
    array(
        'label' => esc_html__('Section Title ', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                kreeti_lite_main_banner_section_status($control)

            );
        },

    )

);



// Setting - drop down category for slider.
$wp_customize->add_setting('select_trending_post_category',
    array(
        'default' => $kreeti_lite_default['select_trending_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_trending_post_category',
    array(
        'label' => esc_html__('Select Category', 'kreeti-lite'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                kreeti_lite_main_banner_section_status($control)

            );
        },

    )));






/**
 * Featured Post Section
 * */

    $wp_customize->add_section('frontpage_featured_posts_settings',
        array(
            'title' => esc_html__('Featured Posts', 'kreeti-lite'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );




// Setting - show_featured_posts_section.
    $wp_customize->add_setting('show_featured_posts_section',
        array(
            'default' => $kreeti_lite_default['show_featured_posts_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('show_featured_posts_section',
        array(
            'label' => esc_html__('Enable Featured Post Section', 'kreeti-lite'),
            'section' => 'frontpage_featured_posts_settings',
            'type' => 'checkbox',
            'priority' => 22,


        )
    );

    $wp_customize->add_setting('featured_news_section_title',
        array(
            'default' => $kreeti_lite_default['featured_news_section_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('featured_news_section_title',
        array(
            'label' => esc_html__('Section Title ', 'kreeti-lite'),
            'section' => 'frontpage_featured_posts_settings',
            'type' => 'text',
            'priority' => 130,
            'active_callback' => 'kreeti_lite_featured_posts_section'

        )

    );

    //List of categories

    $wp_customize->add_setting('select_featured_news_category',
        array(
            'default' => $kreeti_lite_default['select_featured_news_category'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_featured_news_category',
        array(
            'label' => sprintf(__('Select Category ', 'kreeti-lite')),
            'description' => esc_html__('Select category to be shown on featured section ', 'kreeti-lite'),
            'section' => 'frontpage_featured_posts_settings',
            'type' => 'dropdown-taxonomies',
            'taxonomy' => 'category',
            'priority' => 130,
            'active_callback' => 'kreeti_lite_featured_posts_section',


        )));





    /*
     * Express post section
     */


    $wp_customize->add_section('frontpage_express_section_settings',
        array(
            'title' => esc_html__('Express Posts', 'kreeti-lite'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );


    $wp_customize->add_setting('frontpage_express_section_settings',
        array(
            'default' => $kreeti_lite_default['frontpage_express_section_settings'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_setting('show_express_post_section',
        array(
            'default' => $kreeti_lite_default['show_express_post_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('show_express_post_section',
        array(
            'label' => esc_html__('Show Express Post Section', 'kreeti-lite'),
            'section' => 'frontpage_express_section_settings',
            'type' => 'checkbox',
            'priority' => 100,
        )
    );



    //section title
    $wp_customize->add_setting('express_posts_panel_section_title_1',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Kreeti_Lite_Section_Title(
            $wp_customize,
            'express_posts_panel_section_title_1',
            array(
                'label' => esc_html__("Section 1", 'kreeti-lite'),
                'section' => 'frontpage_express_section_settings',
                'priority' => 130,
                'active_callback' => 'kreeti_lite_express_posts_section_status'
            )
        )
    );

    $wp_customize->add_setting('frontpage_express_post_section_title_1',
        array(
            'default' => $kreeti_lite_default['frontpage_express_post_section_title_1'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('frontpage_express_post_section_title_1',
        array(
            'label' => esc_html__('Section Title ', 'kreeti-lite'),
            'section' => 'frontpage_express_section_settings',
            'type' => 'text',
            'priority' => 130,
            'active_callback' => 'kreeti_lite_express_posts_section_status'

        )

    );




        // Setting - featured  category1.
        $wp_customize->add_setting('select_express_post_category_1',
            array(
                'default' => $kreeti_lite_default['select_express_post_category_1'],
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_express_post_category_1',
            array(
                'label' => esc_html__('Category', 'kreeti-lite'),
                'description' => esc_html__('Select category to be shown on express post section ', 'kreeti-lite'),
                'section' => 'frontpage_express_section_settings',
                'type' => 'dropdown-taxonomies',
                'taxonomy' => 'category',
                'priority' => 130,
                'active_callback' => 'kreeti_lite_express_posts_section_status'
            )));


            //section title
            $wp_customize->add_setting('express_posts_panel_section_title_2',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                new Kreeti_Lite_Section_Title(
                    $wp_customize,
                    'express_posts_panel_section_title_2',
                    array(
                        'label' => esc_html__("Section 2", 'kreeti-lite'),
                        'section' => 'frontpage_express_section_settings',
                        'priority' => 130,
                        'active_callback' => 'kreeti_lite_express_posts_section_status'
                    )
                )
            );




$wp_customize->add_setting('frontpage_express_post_section_title_2',
        array(
            'default' => $kreeti_lite_default['frontpage_express_post_section_title_2'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('frontpage_express_post_section_title_2',
        array(
            'label' => esc_html__('Section Title', 'kreeti-lite'),
            'section' => 'frontpage_express_section_settings',
            'type' => 'text',
            'priority' => 130,
            'active_callback' => 'kreeti_lite_express_posts_section_status'

        )

    );
    // Setting - featured  category1.
    $wp_customize->add_setting('select_express_post_category_2',
        array(
            'default' => $kreeti_lite_default['select_express_post_category_2'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(new Kreeti_Lite_Dropdown_Taxonomies_Control($wp_customize, 'select_express_post_category_2',
        array(
            'label' => esc_html__('Category', 'kreeti-lite'),
            'description' => esc_html__('Select category to be shown on express post section ', 'kreeti-lite'),
            'section' => 'frontpage_express_section_settings',
            'type' => 'dropdown-taxonomies',
            'taxonomy' => 'category',
            'priority' => 130,
            'active_callback' => 'kreeti_lite_express_posts_section_status'
        )));

    /*
     * End Express post Section
     */



// Frontpage Layout Section.
$wp_customize->add_section('frontpage_layout_settings',
    array(
        'title' => esc_html__('Frontpage Layout Settings', 'kreeti-lite'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


// Setting - show_main_news_section.
$wp_customize->add_setting('frontpage_content_alignment',
    array(
        'default' => $kreeti_lite_default['frontpage_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_select',
    )
);

$wp_customize->add_control('frontpage_content_alignment',
    array(
        'label' => esc_html__('Frontpage Content Alignment', 'kreeti-lite'),
        'description' => esc_html__('Select frontpage content alignment', 'kreeti-lite'),
        'section' => 'frontpage_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Home Content - Home Sidebar', 'kreeti-lite'),
            'align-content-right' => esc_html__('Home Sidebar - Home Content', 'kreeti-lite'),
            'full-width-content' => esc_html__('Only Home Content', 'kreeti-lite')
        ),
        'priority' => 10,
    ));

// Setting - frontpage_sticky_sidebar.
$wp_customize->add_setting('frontpage_sticky_sidebar',
    array(
        'default' => $kreeti_lite_default['frontpage_sticky_sidebar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'kreeti_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_sticky_sidebar',
    array(
        'label' => esc_html__('Make Frontpage Sidebar Sticky', 'kreeti-lite'),
        'section' => 'frontpage_layout_settings',
        'type' => 'checkbox',
        'priority' => 24,
        'active_callback' => 'kreeti_lite_frontpage_content_alignment_status'
    )
);