<?php
/**
 * Default theme options.
 *
 * @package Sports Blog
 */

if (!function_exists('sports_blog_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function sports_blog_get_default_theme_options() {

	$defaults = array();

	// Slider Section.
	$defaults['show_slider_section']           = 1;
	$defaults['number_of_home_slider']         = 5;
	$defaults['show_slider_content_section']         = 0;
	$defaults['number_of_content_home_slider'] = 30;
	$defaults['select_slider_from']            = 'from-category';
    $defaults['select-page-for-slider']        = 0;
    $defaults['select_category_for_slider']    = 1;

    $defaults['enable_featured_page_section'] = 0;
    $defaults['select_featured_page'] = 0;
    $defaults['featured_page_button_text'] = esc_html__('VIEW MORE', 'sports-blog');
    $defaults['featured_page_additional_button_text'] = esc_html__('BUY NOW', 'sports-blog');
    $defaults['featured_page_additional_button_link'] = '';

    $defaults['enable_featured_blog'] = 0;
    $defaults['featured_blog_title'] = esc_html__('Featured Blog', 'sports-blog');
    $defaults['select_category_for_featured_blog'] = 1;

    $defaults['show_ticker_section'] = 1;
    $defaults['home_top_ticker'] = 8;
    $defaults['select_category_for_ticker'] = 1;
    /*layout*/
	$defaults['enable_overlay_option']    = 0;
	$defaults['enable_preloader']    = 1;
	$defaults['read_more_button_text']    = esc_html__('Continue Reading', 'sports-blog');
	$defaults['global_layout']            = 'right-sidebar';
	$defaults['excerpt_length_global']    = 25;
	$defaults['pagination_type']          = 'default';
	$defaults['copyright_text']           = esc_html__('Copyright All rights reserved', 'sports-blog');

	// Pass through filter.
	$defaults = apply_filters('sports_blog_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;