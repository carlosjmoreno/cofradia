<?php
/**
* Post meta functions
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'easywp_top_postmeta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function easywp_top_postmeta() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    $byline = sprintf(
        /* translators: %s: post author. */ _x( '<span class="fa fa-user" aria-hidden="true"></span> by %s', 'post author', 'easywp' ),
        '<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>&nbsp;&nbsp;&nbsp;&nbsp;'
    );

    $posted_on = sprintf(
        /* translators: %s: post date. */ _x( '<span class="fa fa-calendar" aria-hidden="true"></span> Posted on %s', 'post date', 'easywp' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>&nbsp;&nbsp;&nbsp;&nbsp;'
    );

    if ( !(easywp_get_option('hide_posted_date')) ) {
        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
    if ( !(easywp_get_option('hide_post_author')) ) {
        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    if ( !(easywp_get_option('hide_comments_link')) ) {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link"><span class="fa fa-comments" aria-hidden="true"></span> ';
            comments_popup_link(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: post title */
                                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'easywp' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            )
                        );
            echo '</span>';
        }
    }

}
endif;


if ( ! function_exists( 'easywp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function easywp_entry_footer() {
    if ( 'post' == get_post_type() ) {
        if ( !(easywp_get_option('hide_post_categories')) ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'easywp' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */ printf( '<span class="cat-links">' . __( '<span class="fa fa-folder-open" aria-hidden="true"></span> Posted in %1$s', 'easywp' ) . '&nbsp;&nbsp;&nbsp;</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
        if ( !(easywp_get_option('hide_post_tags')) ) {
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'easywp' ) );
            if ( $tags_list ) {
                /* translators: 1: list of tags. */ printf( '<span class="tags-links">' . __( '<span class="fa fa-tags" aria-hidden="true"></span> Tagged %1$s', 'easywp' ) . '&nbsp;&nbsp;&nbsp;</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Edit <span class="screen-reader-text">%s</span>', 'easywp' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link">&nbsp;&nbsp;<span class="fa fa-pencil" aria-hidden="true"></span> ',
        '</span>'
    );
}
endif;