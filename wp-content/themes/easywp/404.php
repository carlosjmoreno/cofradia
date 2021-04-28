<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div id="easywp-content-wrapper" class="clearfix">

<div id="easywp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">

<?php easywp_before_main_content(); ?>

<header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'easywp' ); ?></h1>
</header><!-- .page-header -->

<div class="page-content">

    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'easywp' ); ?></p>

    <?php get_search_form( array(
        'echo'       => true,
        'aria_label' => esc_attr__('404 Page Search Box','easywp'),
    ) ); ?>

    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

    <div>
        <h2><?php esc_html_e( 'Most Used Categories', 'easywp' ); ?></h2>
        <ul>
        <?php
                wp_list_categories( array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                ) );
        ?>
        </ul>
    </div>

    <?php
        /* translators: %1$s: smiley */
        $easywp_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'easywp' ), convert_smilies( ':)' ) ) . '</p>';
        the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$easywp_archive_content" );
    ?>

    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

</div>

<?php easywp_after_main_content(); ?>

</div>
</div>

</div><!-- #easywp-content-wrapper -->

<?php get_footer(); ?>