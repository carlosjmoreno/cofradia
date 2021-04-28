<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Kreeti
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function kreeti_lite_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    $first_post_full = kreeti_lite_get_option('archive_layout_first_post_full');
    if ($first_post_full) {
        $classes[] = 'archive-first-post-full';
    }


    $global_site_mode_setting = kreeti_lite_get_option('global_site_mode_setting');
    if (!empty($global_site_mode_setting)) {
        $classes[] = $global_site_mode_setting;
    }

    $secondary_color_mode = kreeti_lite_get_option('secondary_color_mode');
    if (!empty($secondary_color_mode)) {
        $classes[] = 'aft-secondary-' . $secondary_color_mode;
    }

    $header_layout = kreeti_lite_get_option('header_layout');
    if (!empty($header_layout)) {
        $classes[] = 'aft-' . $header_layout;
    }

    $remove_gaps = kreeti_lite_get_option('remove_gaps_between_thumbs');
    if ($remove_gaps) {
        $classes[] = 'aft-no-thumbs-gap';
    }

    $global_widget_title_border = kreeti_lite_get_option('global_widget_title_border');
    if (!empty($global_widget_title_border)) {
        $classes[] = $global_widget_title_border;
    }


    global $post;

    $global_layout = kreeti_lite_get_option('global_content_layout');
    if (!empty($global_layout)) {
        $classes[] = $global_layout;
    }


    $global_alignment = kreeti_lite_get_option('global_content_alignment');
    $page_layout = $global_alignment;
    $disable_class = '';
    $frontpage_content_status = kreeti_lite_get_option('frontpage_content_status');
    if (1 != $frontpage_content_status) {
        $disable_class = 'disable-default-home-content';
    }

    // Check if single.
    if ($post && is_singular()) {
        $post_options = get_post_meta($post->ID, 'kreeti-meta-content-alignment', true);
        if (!empty($post_options)) {
            $page_layout = $post_options;
        } else {
            $page_layout = $global_alignment;
        }
    }


    if (is_front_page() || is_home()) {
        $frontpage_layout = kreeti_lite_get_option('frontpage_content_alignment');

        if (!empty($frontpage_layout)) {
            $page_layout = $frontpage_layout;
        } else {
            $page_layout = $global_alignment;
        }

    }

    if ($page_layout == 'align-content-right') {
        if (is_front_page()) {
            if (is_page_template('tmpl-front-page.php')) {
                if (is_active_sidebar('home-sidebar-widgets')) {
                    $classes[] = 'align-content-right';
                } else {
                    $classes[] = 'full-width-content';
                }
            } else {
                if (is_active_sidebar('sidebar-1') || is_active_sidebar('aft-sidebar-2')) {
                    $classes[] = 'align-content-right';
                } else {
                    $classes[] = 'full-width-content';
                }
            }
        } else {
            if (is_active_sidebar('sidebar-1') || is_active_sidebar('aft-sidebar-2')) {
                $classes[] = 'align-content-right';
            } else {
                $classes[] = 'full-width-content';
            }
        }
    } elseif ($page_layout == 'full-width-content') {
        $classes[] = 'full-width-content';
    } else {
        if (is_front_page()) {
            if (is_page_template('tmpl-front-page.php')) {
                if (is_active_sidebar('home-sidebar-widgets')) {
                    $classes[] = 'align-content-left';
                } else {
                    $classes[] = 'full-width-content';
                }
            } else {
                if (is_active_sidebar('sidebar-1') || is_active_sidebar('aft-sidebar-2')) {
                    $classes[] = 'align-content-left';
                } else {
                    $classes[] = 'full-width-content';
                }
            }

        } else {
            if (is_active_sidebar('sidebar-1') || is_active_sidebar('aft-sidebar-2')) {
                $classes[] = 'align-content-left';
            } else {
                $classes[] = 'full-width-content';
            }
        }
    }

    $banner_layout = kreeti_lite_get_option('global_site_layout_setting');

    if ($banner_layout == 'boxed') {
        $classes[] = 'af-boxed-layout';
    } elseif ($banner_layout == 'wide') {
        $classes[] = 'af-wide-layout';
    } else {
        $classes[] = '';
    }


    return $classes;


}

add_filter('body_class', 'kreeti_lite_body_classes');


function kreeti_lite_is_elementor()
{
    global $post;
    return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function kreeti_lite_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'kreeti_lite_pingback_header');


/**
 * Returns posts.
 *
 * @since Kreeti 1.0.0
 */
if (!function_exists('kreeti_lite_get_posts')):
    function kreeti_lite_get_posts($number_of_posts, $tax_id = '0', $filterby = 'cat')
    {

        $ins_args = array(
            'post_type' => 'post',
            'posts_per_page' => absint($number_of_posts),
            'post_status' => 'publish',
            'order' => 'DESC',
            'ignore_sticky_posts' => true
        );

        $tax_id = isset($tax_id) ? $tax_id : '0';

        if ((absint($tax_id) > 0) && ($filterby == 'tag')) {
            $ins_args['tag_id'] = absint($tax_id);
            $ins_args['orderby'] = 'date';
        } elseif (($filterby == 'view')) {
            $ins_args['orderby'] = 'meta_value_num';
            $ins_args['meta_key'] = 'af_post_views_count';
        } elseif (($filterby == 'popular')) {
            $ins_args['orderby'] = 'comment_count';
        } elseif ((absint($tax_id) > 0) && ($filterby == 'cat')) {
            $ins_args['cat'] = absint($tax_id);
            $ins_args['orderby'] = 'date';
        } else {
            $ins_args['orderby'] = 'date';
        }

        $all_posts = new WP_Query($ins_args);

        return $all_posts;
    }

endif;


/**
 * Returns no image url.
 *
 * @since  Kreeti 1.0.0
 */
if (!function_exists('kreeti_lite_post_format')):
    function kreeti_lite_post_format($post_id)
    {
        $post_format = get_post_format($post_id);
        switch ($post_format) {
            case "image":
                $post_format = "<div class='af-post-format em-post-format'><i class='fa fa-camera'></i></div>";
                break;
            case "video":
                $post_format = "<div class='af-post-format em-post-format'><i class='fa fa-video-camera'></i></div>";

                break;
            case "gallery":
                $post_format = "<div class='af-post-format em-post-format'><i class='fa fa-camera'></i></div>";
                break;
            default:
                $post_format = "";
        }

        echo wp_kses_post($post_format);
    }

endif;


if (!function_exists('kreeti_lite_get_block')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('inc/hooks/blocks/block-' . $section, $block);

    }
endif;

if (!function_exists('kreeti_lite_archive_title')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Kreeti 1.0.0
     *
     */

    function kreeti_lite_archive_title($title)
    {
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } elseif (is_tax()) {
            $title = single_term_title('', false);
        }

        return $title;
    }

endif;
add_filter('get_the_archive_title', 'kreeti_lite_archive_title');


/* Display Breadcrumbs */
if (!function_exists('kreeti_get_breadcrumb')) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     */
    function kreeti_lite_get_breadcrumb()
    {

        $enable_breadcrumbs = kreeti_lite_get_option('enable_breadcrumb');

        if (1 != $enable_breadcrumbs) {
            return;
        }
        // Bail if Home Page.
        if (is_front_page() || is_home()) {
            return;
        }

        $select_breadcrumbs = kreeti_lite_get_option('select_breadcrumb_mode');

        ?>
        <div class="af-breadcrumbs font-family-1 color-pad">

            <?php
            if ((function_exists('yoast_breadcrumb')) && ($select_breadcrumbs == 'yoast')) {
                yoast_breadcrumb();
            } elseif ((function_exists('rank_math_the_breadcrumbs')) && ($select_breadcrumbs == 'rankmath')) {
                rank_math_the_breadcrumbs();
            } elseif ((function_exists('bcn_display')) && ($select_breadcrumbs == 'bcn')) {
                bcn_display();
            } else {
                kreeti_lite_get_breadcrumb_trail();
            }
            ?>

        </div>
        <?php


    }

endif;
add_action('kreeti_lite_action_get_breadcrumb', 'kreeti_lite_get_breadcrumb');

/* Display Breadcrumbs */
if (!function_exists('kreeti_lite_get_breadcrumb_trail')) :

    /**
     * Simple excerpt length.
     *
     * @since 1.0.0
     */

    function kreeti_lite_get_breadcrumb_trail()
    {

        if (!function_exists('breadcrumb_trail')) {

            /**
             * Load libraries.
             */

            require_once get_template_directory() . '/lib/breadcrumb-trail/breadcrumb-trail.php';
        }

        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false,
        );

        breadcrumb_trail($breadcrumb_args);

    }

endif;

/**
 * Front-page main banner section layout
 */
if (!function_exists('kreeti_lite_front_page_main_section_scope')) {

    function kreeti_lite_front_page_main_section_scope()
    {
        
        $kreeti_lite_hide_on_blog = kreeti_lite_get_option('disable_main_banner_on_blog_archive');

        if ($kreeti_lite_hide_on_blog) {
            if (is_front_page()) {
                do_action('kreeti_lite_action_front_page_main_section');
            }
        } else {
            if (is_front_page() || is_home()) {
                do_action('kreeti_lite_action_front_page_main_section');
            }
        }

    }
}
add_action('kreeti_lite_action_front_page_main_section_scope', 'kreeti_lite_front_page_main_section_scope');


/* Display Breadcrumbs */
if (!function_exists('kreeti_lite_excerpt_length')) :

    /**
     * Simple excerpt length.
     *
     * @since 1.0.0
     */

    function kreeti_lite_excerpt_length($length)
    {

        $kreeti_lite_global_excerpt_length = kreeti_lite_get_option('global_excerpt_length');
        if (is_admin()) {
            return $length;
        }
        return $kreeti_lite_global_excerpt_length;
    }

endif;
add_filter('excerpt_length', 'kreeti_lite_excerpt_length', 999);


/* Display Breadcrumbs */
if (!function_exists('kreeti_lite_excerpt_more')) :

    /**
     * Simple excerpt more.
     *
     * @since 1.0.0
     */
    function kreeti_lite_excerpt_more($more)
    {
        if (is_admin()) {
            return $more;
        }
        global $post;
        $kreeti_lite_global_read_more_texts = kreeti_lite_get_option('global_read_more_texts');
        //return $kreeti_lite_global_read_more_texts;
        return '';
    }

endif;
add_filter('excerpt_more', 'kreeti_lite_excerpt_more');


/* Display Breadcrumbs */
if (!function_exists('kreeti_lite_get_the_excerpt')) :

    /**
     * Simple excerpt more.
     *
     * @since 1.0.0
     */
    function kreeti_lite_get_the_excerpt($post_id)
    {


        if(empty($post_id))
            return;

        $kreeti_default_excerpt = get_the_excerpt($post_id);
        $kreeti_global_read_more_texts = kreeti_lite_get_option('global_read_more_texts');

        $kreeti_read_more = '<div class="aft-readmore-wrapper"><a href="' . get_permalink($post_id) . '" class="aft-readmore">' . $kreeti_global_read_more_texts . '</a></div>';

        $kreeti_global_excerpt_length = kreeti_lite_get_option('global_excerpt_length');
        $excerpt = explode(' ', $kreeti_default_excerpt, $kreeti_global_excerpt_length);
        if (count($excerpt)>=$kreeti_global_excerpt_length) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        $excerpt = $excerpt.$kreeti_read_more;
        return $excerpt;

    }

endif;


/* Display Pagination */
if (!function_exists('kreeti_lite_numeric_pagination')) :

    /**
     * Simple excerpt more.
     *
     * @since 1.0.0
     */
    function kreeti_lite_numeric_pagination()
    {

        the_posts_pagination(array(
            'mid_size' => 3,
            'prev_text' => __('Previous', 'kreeti-lite'),
            'next_text' => __('Next', 'kreeti-lite'),
        ));

        return;
    }

endif;


/* Word read count Pagination */
if (!function_exists('kreeti_lite_count_content_words')) :
    /**
     * @param $content
     *
     * @return string
     */
    function kreeti_lite_count_content_words($post_id)
    {
        $kreeti_lite_show_read_mins = kreeti_lite_get_option('global_show_min_read');
        if ($kreeti_lite_show_read_mins == 'yes') {
            $content = apply_filters('the_content', get_post_field('post_content', $post_id));
            $kreeti_lite_read_words = kreeti_lite_get_option('global_show_min_read_number');
            $kreeti_lite_decode_content = html_entity_decode($content);
            $kreeti_lite_filter_shortcode = do_shortcode($kreeti_lite_decode_content);
            $kreeti_lite_strip_tags = wp_strip_all_tags($kreeti_lite_filter_shortcode, true);
            $kreeti_lite_count = str_word_count($kreeti_lite_strip_tags);
            $kreeti_lite_word_per_min = (absint($kreeti_lite_count) / $kreeti_lite_read_words);
            $kreeti_lite_word_per_min = ceil($kreeti_lite_word_per_min);

            if (absint($kreeti_lite_word_per_min) > 0) {
                $word_count_strings = sprintf(esc_html('%s min read', '%s min read', number_format_i18n($kreeti_lite_word_per_min), 'kreeti-lite'), number_format_i18n($kreeti_lite_word_per_min));
                if ('post' == get_post_type($post_id)):

                    echo '<span class="min-read">';
                    echo esc_html($word_count_strings);
                    echo '</span>';
                endif;
            }

        }
    }

endif;


/**
 * Check if given term has child terms
 *
 * @param Integer $term_id
 * @param String $taxonomy
 *
 * @return Boolean
 */
function kreeti_lite_list_popular_taxonomies($taxonomy = 'post_tag', $title = "Popular Tags", $number = 5)
{
    $popular_taxonomies = get_terms(array(
        'taxonomy' => $taxonomy,
        'number' => absint($number),
        'orderby' => 'count',
        'order' => 'DESC',
        'hide_empty' => true,
    ));

    $html = '';

    if (isset($popular_taxonomies) && !empty($popular_taxonomies)):
        $html .= '<div class="aft-popular-taxonomies-lists clearfix">';
        if (!empty($title)):
            $html .= '<strong>';
            $html .= esc_html($title);
            $html .= '</strong>';
        endif;
        $html .= '<ul>';
        foreach ($popular_taxonomies as $tax_term):
            $html .= '<li>';
            $html .= '<a href="' . esc_url(get_term_link($tax_term)) . '">';
            $html .= $tax_term->name;
            $html .= '</a>';
            $html .= '</li>';
        endforeach;
        $html .= '</ul>';
        $html .= '</div>';
    endif;

    echo wp_kses_post($html);
}


/**
 * @param $post_id
 * @param string $size
 *
 * @return mixed|string
 */
function kreeti_lite_get_freatured_image_url($post_id, $size = 'kreeti-featured')
{
    if (has_post_thumbnail($post_id)) {
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);
        $url = $thumb['0'];
    } else {
        $url = '';
    }

    return $url;
}


//Get attachment alt tag

if (!function_exists('kreeti_lite_get_img_alt')):
    function kreeti_lite_get_img_alt($attachment_ID)
    {
        // Get ALT
        $thumb_alt = get_post_meta($attachment_ID, '_wp_attachment_image_alt', true);

        // No ALT supplied get attachment info
        if (empty($thumb_alt))
            $attachment = get_post($attachment_ID);

        // Use caption if no ALT supplied
        if (empty($thumb_alt))
            $thumb_alt = $attachment->post_excerpt;

        // Use title if no caption supplied either
        if (empty($thumb_alt))
            $thumb_alt = $attachment->post_title;

        // Return ALT
        return trim(strip_tags($thumb_alt));
    }
endif;

// Move Jetpack from the_content / the_excerpt to another position

function kreeti_lite_jptweak_remove_share()
{
    remove_filter('the_content', 'sharing_display', 19);
    remove_filter('the_excerpt', 'sharing_display', 19);

}

add_action('loop_start', 'kreeti_lite_jptweak_remove_share');


/**
 * @param $post_id
 */
function kreeti_lite_get_comments_views_share($post_id)
{

    $aft_post_type = get_post_type($post_id);

    if ($aft_post_type !== 'post') {
        return;
    }

    ?>
    <span class="aft-comment-view-share">
        <?php
        $show_comment_count = $section_mode = kreeti_lite_get_option('global_show_comment_count');
        if ($show_comment_count == 'yes'):
            $comment_count = get_comments_number($post_id);
            if (absint($comment_count) > 1):
                ?>
                <span class="aft-comment-count">
        <a href="<?php the_permalink(); ?>">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            <span class="aft-show-hover">
            <?php echo wp_kses_post(get_comments_number($post_id)); ?>
            </span>
        </a>
        </span>
            <?php endif;
        endif;
        ?>
    </span>
    <?php
}


/**
 * @param $post_id
 */
function kreeti_lite_archive_social_share_icons($post_id)
{
    if (class_exists('Jetpack') && Jetpack::is_module_active('sharedaddy')):
        if (function_exists('sharing_display')):
            $sharer = new Sharing_Service();
            $global = $sharer->get_global_options();
            if (in_array('index', $global['show']) && (is_home() || is_front_page() || is_archive() || is_search() || in_array(get_post_type(), $global['show']))):
                ?>
                <div class="aft-comment-view-share">
            <span class="aft-jpshare">
                <i class="fa fa-share-alt" aria-hidden="true"></i>
                <?php sharing_display('', true); ?>
        </span>
                </div>
            <?php
            endif;
        endif;
    endif;


}

//Social share icons and comments view for single page

function kreeti_lite_single_post_social_share_icons()
{
    if (class_exists('Jetpack') && Jetpack::is_module_active('sharedaddy')):

        $social_share_icon_opt = kreeti_lite_get_option('single_post_social_share_view');

        if ($social_share_icon_opt == 'side') {
            echo '<div class="vertical-left-right">';
        }
        ?>
        <div class="aft-social-share">
            <?php
            if (function_exists('sharing_display')) {
                sharing_display('', true);
            }
            ?>

        </div>
        <?php
        if ($social_share_icon_opt == 'side') {
            echo '</div>';
        }
    endif;

}

function kreeti_lite_single_post_commtents_view($post_id)
{
    ?>
    <div class="aft-comment-view-share">
        <?php
        $show_comment_count = $section_mode = kreeti_lite_get_option('global_show_comment_count');
        if ($show_comment_count == 'yes'):
            $comment_count = get_comments_number($post_id);
            if (absint($comment_count) > 1):
                ?>
                <span class="aft-comment-count">
                <a href="<?php the_permalink(); ?>">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <span class="aft-show-hover">
                        <?php echo esc_html(get_comments_number($post_id)); ?>
                    </span>
                </a>
            </span>
            <?php endif;
        endif;
        ?>
    </div>
    <?php
}


/*
 * Enqueue and localization for pagination js
 *
 */
if (!function_exists('kreeti_lite_pagination_scripts_args')):
    function kreeti_lite_pagination_scripts_args()
    {


        //Ajax load
        $args['nonce'] = wp_create_nonce('kreeti-load-more-nonce');
        $args['ajaxurl'] = admin_url('admin-ajax.php');
        $view_count_onscroll = kreeti_lite_get_option('single_post_view_count');
        if ($view_count_onscroll == 'count-content-scroll') {
            $args['view_count'] = true;
        } else {
            $args['view_count'] = false;
        }


        if (is_front_page()) {
            $args['post_type'] = 'post';
        }

        //Custom post types
        if (is_post_type_archive()) {
            $args['post_type'] = get_queried_object()->name;
        }

        //Search
        if (is_search()) {
            $args['search'] = get_search_query();
        }


        //Author
        if (is_author()) {
            $args['author'] = get_the_author_meta('user_nicename');
        }


        //Date archive
        if (is_date()) {
            $args['year'] = get_query_var('year');
            $args['month'] = get_query_var('monthnum');
            $args['day'] = get_query_var('day');
        }

        /*
         *  Categories and taxonomies
         *  Get the affiliated post type for custom taxonomy
         */

        if (is_category() || is_tag() || is_tax()) {
            $args['cat'] = get_queried_object()->slug;
            $args['taxonomy'] = get_queried_object()->taxonomy;
            if (is_tax()) {
                global $wp_taxonomies;
                $tax_object = isset($wp_taxonomies[$args['taxonomy']]) ? $wp_taxonomies[$args['taxonomy']]->object_type : array();
                $args['post_type'] = array_pop($tax_object);
            }

        }

        return $args;


    }
endif;
