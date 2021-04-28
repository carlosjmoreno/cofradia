<?php
/**
* The template for displaying full-width post.
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar(s)
* Template Post Type: post
*/

get_header(); ?>

<div id="easywp-content-wrapper" class="clearfix">

<div id="easywp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">

<?php easywp_before_main_content(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'single' ); ?>

    <?php if ( !(easywp_get_option('hide_post_navigation')) ) { the_post_navigation(array('prev_text' =>  esc_html__( '&larr; %title', 'easywp' ), 'next_text' =>  esc_html__( '%title &rarr;', 'easywp' ))); } ?>

    <?php if ( !(easywp_get_option('hide_author_bio_box')) ) { echo wp_kses_post( force_balance_tags( easywp_add_author_bio_box() ) ); } ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

<?php easywp_after_main_content(); ?>

</div>
</div>

</div><!-- #easywp-content-wrapper -->

<?php get_footer(); ?>