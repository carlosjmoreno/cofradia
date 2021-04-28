<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('easywp-post'); ?>>

    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <?php if ( 'post' == get_post_type() ) : ?>
            <?php if ( !(easywp_get_option('hide_entry_meta')) ) { ?>
            <div class="entry-meta">
                    <?php easywp_top_postmeta(); ?>
            </div><!-- .entry-meta -->
            <?php } ?>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-summary clearfix">
            <?php easywp_blog_post_style();

            wp_link_pages( array(
             'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'easywp' ) . '</span>',
             'after'       => '</div>',
             'link_before' => '<span>',
             'link_after'  => '</span>',
             ) );
             ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php easywp_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article>