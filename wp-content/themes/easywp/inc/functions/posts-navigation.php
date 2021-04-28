<?php
/**
* Posts navigation functions
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'easywp_wp_pagenavi' ) ) :
function easywp_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;


if ( ! function_exists( 'easywp_posts_navigation' ) ) :
function easywp_posts_navigation() {
    if ( function_exists( 'wp_pagenavi' ) ) {
        easywp_wp_pagenavi();
    } else {
        if ( easywp_get_option('posts_navigation_type') === 'normalnavi' ) {
            the_posts_navigation(array('prev_text' => esc_html__( '&larr; Older posts', 'easywp' ), 'next_text' => esc_html__( 'Newer posts &rarr;', 'easywp' )));
        } else {
            the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__( '&larr; Older posts', 'easywp' ), 'next_text' => esc_html__( 'Newer posts &rarr;', 'easywp' )));
        }
    }
}
endif;