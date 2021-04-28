<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kreeti
 */

get_header(); ?>
    <section class="section-block-upper">

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <!--<div class="af-container-row">-->

                <?php
                if (have_posts()) :

                    if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>

                    <?php
                    endif; ?>

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

                    ?>
                    <?php do_action('kreeti_lite_archive_layout_after_loop'); ?>

                <?php

                else :
                    get_template_part('template-parts/content', 'none');

                endif; ?>

                <!--</div>-->
            </main><!-- #main -->
            <div class="col col-ten">
                <div class="kreeti-pagination">
                    <?php kreeti_lite_numeric_pagination(); ?>
                </div>
            </div>
        </div><!-- #primary -->

        <?php
        get_sidebar();
        ?>

    </section>
<?php
get_footer();
