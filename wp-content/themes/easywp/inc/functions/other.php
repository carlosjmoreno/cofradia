<?php
/**
* More Custom Functions
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function easywp_blog_post_style() {
    if ( easywp_get_option('blogpoststyle') ) :
        if ( easywp_get_option('blogpoststyle') == 'excerpt' ) :
            if ( has_post_thumbnail() ) {
                if ( !(easywp_get_option('hide_thumbnail')) ) { ?>
                <?php if ( easywp_get_option('thumbnail_link') == 'no' ) { ?>
                    <?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail')); ?>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail')); ?></a>
                <?php }
                }
            }
            the_excerpt();
        else :
            if ( has_post_thumbnail() ) {
                if ( !(easywp_get_option('hide_thumbnail')) ) { ?>
                <?php if ( easywp_get_option('thumbnail_link') == 'no' ) { ?>
                    <?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block')); ?>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block')); ?></a>
                <?php }
                }
            }
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span> <span class="meta-nav">&rarr;</span>', 'easywp' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );
        endif;
    else :
        if ( has_post_thumbnail() ) {
                if ( !(easywp_get_option('hide_thumbnail')) ) { ?>
                <?php if ( easywp_get_option('thumbnail_link') == 'no' ) { ?>
                        <?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail')); ?>
                <?php } else { ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail')); ?></a>
                <?php }
                }
        }
        the_excerpt();
    endif;
}

// Get custom-logo URL
function easywp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $easywp_custom_logo_id = get_theme_mod( 'custom_logo' );
    $easywp_logo = wp_get_attachment_image_src( $easywp_custom_logo_id , 'full' );
    return $easywp_logo[0];
}

// Site Title
function easywp_site_title() {
    if ( is_front_page() && is_home() ) { ?>
            <h1 class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_home() ) { ?>
            <h1 class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_singular() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_category() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_tag() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_author() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_search() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } elseif ( is_404() ) { ?>
            <p class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php } else { ?>
            <h1 class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="easywp-site-description"><span><?php bloginfo( 'description' ); ?></span></p>
    <?php }
}

// Category ids in post class
function easywp_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category)
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
            return $classes;
}
add_filter('post_class', 'easywp_category_id_class');


// Change excerpt length
function easywp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    return 45;
}
add_filter('excerpt_length', 'easywp_excerpt_length');


// Change excerpt more word
function easywp_excerpt_more($more) {
        if ( is_admin() ) {
            return $more;
        }
        global $post;
        $readmoretext = esc_html__( 'Continue Reading...', 'easywp' );
        if ( easywp_get_option('read_more_text') ) {
                $readmoretext = easywp_get_option('read_more_text');
        }
        if ( !(easywp_get_option('hide_read_more_button')) ) {
            return '...<div class="easywp-readmore"><a class="read-more-link" href="'. esc_url( get_permalink($post->ID) ) . '">'.esc_html($readmoretext).'<span class="screen-reader-text">  '.get_the_title().'</span></a></div>';
        } else {
            return '...';
        }
}
add_filter('excerpt_more', 'easywp_excerpt_more');


// Adds custom classes to the array of body classes.
function easywp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }
    if ( get_header_image() ) {
        $classes[] = 'easywp-header-image-active';
    }
    if ( has_custom_logo() ) {
        $classes[] = 'easywp-custom-logo-active';
    }

    if( is_singular() ) {
        if ( is_page_template( array( 'template-full-width.php', 'template-full-width-page.php', 'template-full-width-post.php', 'template-sitemap.php' ) ) ) {
           $classes[] = 'easywp-body-full-width';
        }
    } else {
        if ( is_404() ) {
            $classes[] = 'easywp-body-full-width';
        }
    }

    return $classes;
}
add_filter( 'body_class', 'easywp_body_classes' );


function easywp_footer_grid_cols() {
       $footer_column = 'easywp-footer-4-col';
       return $footer_column;
}


if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;