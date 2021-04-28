<?php

function academiathemes_customizer_define_general_sections( $sections ) {
    $panel           = 'academiathemes' . '_general';
    $general_sections = array();

    $theme_header_style = array(
        'left' => esc_html__('Left', 'city-hall'),
        'centered' => esc_html__('Centered', 'city-hall')
    );

    $theme_menu_style = array(
        'standard' => esc_html__('Standard', 'city-hall'),
        'overlaid' => esc_html__('Overlaid', 'city-hall')
    );

    $theme_sidebar_positions = array(
        'both'      => esc_html__('Both Sidebars', 'city-hall'),
        'left'      => esc_html__('Only Primary (left) Sidebar', 'city-hall'),
        'right'     => esc_html__('Only Secondary (right) Sidebar', 'city-hall'),
        'none'      => esc_html__('No sidebars', 'city-hall')
    );

    $theme_dynamic_menu_positions = array(
        'primary'   => esc_html__('In the Primary (left) Sidebar', 'city-hall'),
        'secondary' => esc_html__('In the Secondary (right) Sidebar', 'city-hall'),
        'none'      => esc_html__("Don't display", 'city-hall')
    );

    $theme_page_thumbnail_size = array(
        'wide'      => esc_html__('Full Width', 'city-hall'),
        'inside'      => esc_html__('Boxed', 'city-hall'),
        'none'      => esc_html__("Don't display", 'city-hall')
    );

    $general_sections['general'] = array(
        'panel'     => $panel,
        'title'     => esc_html__( 'General Settings', 'city-hall' ),
        'priority'  => 4900,
        'options'   => array(

            'theme-header-style'     => array(
                'setting' => array(
                    'default' => 'left',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control' => array(
                    'label' => esc_html__( 'Header Layout', 'city-hall' ),
                    'type'  => 'radio',
                    'choices' => $theme_header_style
                ),
            ),

            'theme-menu-style'     => array(
                'setting' => array(
                    'default' => 'standard',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control' => array(
                    'label' => esc_html__( 'Main Menu Style', 'city-hall' ),
                    'type'  => 'radio',
                    'choices' => $theme_menu_style
                ),
            ),

            'theme-sidebar-position'    => array(
                'setting'               => array(
                    'default'           => 'both',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control'           => array(
                    'label'         => esc_html__( 'Display Sidebar(s)', 'city-hall' ),
                    'type'          => 'radio',
                    'choices'       => $theme_sidebar_positions
                ),
            ),

            'theme-dynamic-menu-position'    => array(
                'setting'               => array(
                    'default'           => 'secondary',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control'           => array(
                    'label'         => esc_html__( 'Display the Dynamic Menu', 'city-hall' ),
                    'type'          => 'radio',
                    'choices'       => $theme_dynamic_menu_positions
                ),
            ),

            'theme-display-post-featured-image'    => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control'           => array(
                    'label'         => esc_html__( 'Display Featured Images in Posts and Pages', 'city-hall' ),
                    'type'          => 'radio',
                    'choices'       => $theme_page_thumbnail_size
                ),
            ),

        ),
    );

    $general_sections['posts'] = array(
        'panel'     => $panel,
        'title'   => esc_html__( 'Posts', 'city-hall' ),
        'priority' => 4910,
        'options' => array(

            'theme-display-published-archives' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display post published date on archive pages', 'city-hall' ),
                    'type'              => 'checkbox'
                )
            ),

            'theme-display-published' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display post published date on single pages', 'city-hall' ),
                    'type'              => 'checkbox'
                )
            ),

            'theme-display-category' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display post category on single pages', 'city-hall' ),
                    'type'              => 'checkbox'
                )
            ),

            'theme-display-tags' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display post tags on single pages', 'city-hall' ),
                    'type'              => 'checkbox'
                )
            ),

            'theme-display-post-authorbio' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 0
                ),
                'control'               => array(
                    'label'             => __( 'Display author bio at the end of posts', 'city-hall' ),
                    'type'              => 'checkbox'
                )
            ),

        ),
    );

    $general_sections['homepage'] = array(
        'panel'     => $panel,
        'title'   => esc_html__( 'Homepage', 'city-hall' ),
        'priority' => 4910,
        'options' => array(

            'theme-homepage-posts-heading' => array(
                'setting' => array(
                    'default'           => __('Recent Posts','city-hall'),
                    'sanitize_callback' => 'sanitize_text_field',
                ),
                'control' => array(
                    'label'             => esc_html__( 'Blog Section Heading', 'city-hall' ),
                    'type'              => 'text',
                ),
            ),

        ),
    );

    $general_sections['footer'] = array(
        'panel'     => $panel,
        'title'   => esc_html__( 'Footer', 'city-hall' ),
        'priority' => 4910,
        'options' => array(

            'city_hall_copyright_text' => array(
                'setting' => array(
                    'default'           => __('Copyright &copy; ','city-hall') . date("Y",time()) . ' ' . get_bloginfo('name'),
                    'sanitize_callback' => 'sanitize_text_field',
                ),
                'control' => array(
                    'label'             => esc_html__( 'Copyright Text', 'city-hall' ),
                    'type'              => 'text',
                ),
            ),

            'theme-display-footer-credit' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display "Theme by AcademiaThemes"', 'city-hall' ),
                    'type'              => 'checkbox'
                )
            ),

        ),
    );

    return array_merge( $sections, $general_sections );
}

add_filter( 'academiathemes_customizer_sections', 'academiathemes_customizer_define_general_sections' );
