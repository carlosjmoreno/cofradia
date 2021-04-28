<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)																			 */
/*-----------------------------------------------------------------------------------*/

/*----------------------------------*/
/* Sidebar							*/
/*----------------------------------*/

function cityhall_widgets_init() {

	register_sidebar(array(
		'name' => __('Sidebar: Primary','city-hall'),
		'id' => 'sidebar-primary',
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Sidebar: Secondary','city-hall'),
		'id' => 'sidebar-secondary',
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Homepage: Content Widgets (Full)','city-hall'),
		'id' => 'homepage-content-widgets',
		'description' => __('Recommended widgets: [Academia: Featured Pages]','city-hall'),
		'before_widget' => '<div class="site-section"><div class="site-section-wrapper site-section-wrapper-widget"><div class="%2$s clearfix" id="%1$s">',
		'after_widget' => '</div></div><!-- .site-section-wrapper .site-section-wrapper-widget .clearfix --></div><!-- .site-section -->',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Homepage: Widgets Column 1','city-hall'),
		'id' => 'homepage-content-column-1',
		'description' => __('Works best with Text and Custom HTML widgets.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Homepage: Widgets Column 2','city-hall'),
		'id' => 'homepage-content-column-2',
		'description' => __('Works best with Text and Custom HTML widgets.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Homepage: Widgets Column 3','city-hall'),
		'id' => 'homepage-content-column-3',
		'description' => __('Works best with Text and Custom HTML widgets.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Header: Secondary Widgets','city-hall'),
		'id' => 'header-widgets',
		'description' => __('These widgets will appear in the header to the right of the primary website logo. Recommended widgets: Academia: Call to Action, Social Icons, etc.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Pre-Footer: Row 1, Left Side','city-hall'),
		'id' => 'prefooter-widgets-1-left',
		'description' => __('Recommended widgets: Academia: Call to Action, Social Icons, etc.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Pre-Footer: Row 1, Right Side','city-hall'),
		'id' => 'prefooter-widgets-1-right',
		'description' => __('Recommended widgets: Academia: Call to Action, Social Icons, etc.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Pre-Footer: Row 2','city-hall'),
		'id' => 'prefooter-widgets-2',
		'description' => __('These widgets will appear in the footer above the main widget columns.','city-hall'),
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 1', 'city-hall' ),
		'id'            => 'footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 2', 'city-hall' ),
		'id'            => 'footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 3', 'city-hall' ),
		'id'            => 'footer-col-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

} 

add_action( 'widgets_init', 'cityhall_widgets_init' );