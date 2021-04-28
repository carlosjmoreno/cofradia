<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kreeti
 */

if (!function_exists('kreeti_lite_post_categories')) :
    function kreeti_lite_post_categories($separator = '&nbsp')
    {
        $kreeti_lite_global_show_categories = kreeti_lite_get_option('global_show_categories');
        if ($kreeti_lite_global_show_categories == 'no') {
            return;
        }

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            global $post;

            $kreeti_lite_post_categories = get_the_category($post->ID);
            if ($kreeti_lite_post_categories) {
                $kreeti_lite_output = '<ul class="cat-links">';
                foreach ($kreeti_lite_post_categories as $post_category) {
                    $kreeti_lite_t_id = $post_category->term_id;
                    $kreeti_lite_color_id = "category_color_" . $kreeti_lite_t_id;

                    // retrieve the existing value(s) for this meta field. This returns an array
                    $kreeti_lite_term_meta = get_option($kreeti_lite_color_id);
                    $kreeti_lite_color_class = ($kreeti_lite_term_meta) ? $kreeti_lite_term_meta['color_class_term_meta'] : 'category-color-1';

                    $kreeti_lite_output .= '<li class="meta-category">
                             <a class="kreeti-categories ' . esc_attr($kreeti_lite_color_class) . '" href="' . esc_url(get_category_link($post_category)) . '">
                                 ' . esc_html($post_category->name) . '
                             </a>
                        </li>';
                }
                $kreeti_lite_output .= '</ul>';
                echo wp_kses_post($kreeti_lite_output);

            }
        }
    }
endif;


if (!function_exists('kreeti_lite_get_category_color_class')) :

    function kreeti_lite_get_category_color_class($term_id)
    {

        $kreeti_lite_color_id = "category_color_" . $term_id;
        // retrieve the existing value(s) for this meta field. This returns an array
        $kreeti_lite_term_meta = get_option($kreeti_lite_color_id);
        $kreeti_lite_color_class = ($kreeti_lite_term_meta) ? $kreeti_lite_term_meta['color_class_term_meta'] : '';
        return $kreeti_lite_color_class;


    }
endif;

if (!function_exists('kreeti_lite_post_item_meta')) :

    function kreeti_lite_post_item_meta()
    {

        global $post;
        if ('post' == get_post_type($post->ID)):

            $kreeti_lite_author_id = $post->post_author;
            $kreeti_lite_display_setting = kreeti_lite_get_option('global_post_date_author_setting');
            $kreeti_lite_date_display_setting = kreeti_lite_get_option('global_date_display_setting');

            ?>

            <span class="author-links">

                <?php if ($kreeti_lite_display_setting == 'show-date-author' || $kreeti_lite_display_setting == 'show-author-only'): ?>

                    <span class="item-metadata posts-author byline">

            <a href="<?php echo esc_url(get_author_posts_url($kreeti_lite_author_id)) ?>">
                <?php echo esc_html(get_the_author_meta('display_name', $kreeti_lite_author_id)); ?>
            </a>
        </span>
                <?php endif; ?>

                <?php

                if ($kreeti_lite_display_setting == 'show-date-author' || $kreeti_lite_display_setting == 'show-date-only'): ?>
                    <span class="item-metadata posts-date">

                        <?php
                        if ($kreeti_lite_date_display_setting == 'default-date') {
                            the_time(get_option('date_format'));
                        } else {
                            echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'kreeti-lite'));
                        }

                        ?>
            </span>
                <?php endif; ?>

        </span>
        <?php
        endif;

    }
endif;




if (!function_exists('kreeti_lite_post_item_tag')) :

    function kreeti_lite_post_item_tag($view = 'default')
    {
        global $post;

        if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator','kreeti-lite'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html('Tags: %1$s') . '</span>', $tags_list);
            }
        }

        if (is_single()) {
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'kreeti-lite'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }

    }
endif;