<?php
/**
* Template part for displaying single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php easywp_before_single_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('easywp-post easywp-post-singular'); ?>>

    <?php easywp_before_single_post_title(); ?>

    <header class="entry-header">
        <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <?php if ( !(easywp_get_option('hide_entry_meta')) ) { ?>
            <div class="entry-meta">
                    <?php easywp_top_postmeta(); ?>
            </div><!-- .entry-meta -->
            <?php } ?>
    </header><!-- .entry-header -->

    <?php easywp_after_single_post_title(); ?>

    <div class="entry-content clearfix">
            <?php
            if ( has_post_thumbnail() ) {
                if ( !(easywp_get_option('hide_thumbnail')) ) {
                    if ( !(easywp_get_option('hide_thumbnail_single')) ) {
                        if ( easywp_get_option('thumbnail_link') == 'no' ) {
                            if ( is_page_template( array( 'template-full-width.php', 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
                                the_post_thumbnail('easywp-singular-wide-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block'));
                            } else {
                                the_post_thumbnail('easywp-singular-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block'));
                            }
                        } else {
                            if ( is_page_template( array( 'template-full-width.php', 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) { ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('easywp-singular-wide-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block')); ?></a>
                            <?php } else { ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('easywp-singular-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block')); ?></a>
                            <?php }
                        }
                    }
                }
            }

            the_content( /* translators: %s: post title. */ sprintf(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'easywp' ), the_title( '<span class="screen-reader-text">"', '"</span>', false )) );

            wp_link_pages( array(
             'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'easywp' ) . '</span>',
             'after'       => '</div>',
             'link_before' => '<span>',
             'link_after'  => '</span>',
             ) );
             ?>
    </div><!-- .entry-content -->

    <?php easywp_after_single_post_content(); ?>

    <footer class="entry-footer">
        <?php easywp_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article>

<?php easywp_after_single_post(); ?>