<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kreeti
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            if (have_posts()) : ?>

                <header class="header-title-wrapper1 entry-header-details">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .header-title-wrapper -->

                    <?php do_action('kreeti_lite_archive_layout_before_loop'); ?>
                    <?php


                    $count = 1;
                    $set_full_first = kreeti_lite_get_option('archive_layout_first_post_full');
                    $applied_archive = true;


                    while (have_posts()) : the_post();

                        if (($count == 1) && ($set_full_first == true) && ($applied_archive == true)) :

                            ?>

                            <article
                                    id="post-<?php the_ID(); ?>" <?php post_class('aft-first-post-full latest-posts-full col-1 float-l pad'); ?> >
                                <?php kreeti_lite_get_block('full', 'archive'); ?>
                            </article>
                        <?php

                        else:
                            /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */

                            get_template_part('template-parts/content', get_post_format());
                        endif;


                        $count++;
                    endwhile;

                    //div wrap end
                    ?>
                <?php do_action('kreeti_lite_archive_layout_after_loop'); ?>
            <?php

            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

            <div class="col col-ten">
                <div class="kreeti-pagination">
                    <?php kreeti_lite_numeric_pagination(); ?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
?>
<?php
get_footer();
