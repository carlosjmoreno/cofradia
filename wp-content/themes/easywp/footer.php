<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php if ( is_active_sidebar( 'easywp-footer-1' ) || is_active_sidebar( 'easywp-footer-2' ) || is_active_sidebar( 'easywp-footer-3' ) || is_active_sidebar( 'easywp-footer-4' ) ) : ?>
<div id="easywp-footer-widgets-container" class="clearfix" itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo" aria-label="<?php esc_attr_e( 'Footer Widgets', 'easywp' ); ?>">
<div id="easywp-footer-widgets" class="clearfix">

<div class='easywp-footer-block-cols clearfix'>

<div class="easywp-footer-block-col <?php echo esc_attr( easywp_footer_grid_cols() ); ?>" id="easywp-footer-block-1">
<?php dynamic_sidebar( 'easywp-footer-1' ); ?>
</div>

<div class="easywp-footer-block-col <?php echo esc_attr( easywp_footer_grid_cols() ); ?>" id="easywp-footer-block-2">
<?php dynamic_sidebar( 'easywp-footer-2' ); ?>
</div>

<div class="easywp-footer-block-col <?php echo esc_attr( easywp_footer_grid_cols() ); ?>" id="easywp-footer-block-3">
<?php dynamic_sidebar( 'easywp-footer-3' ); ?>
</div>

<div class="easywp-footer-block-col <?php echo esc_attr( easywp_footer_grid_cols() ); ?>" id="easywp-footer-block-4">
<?php dynamic_sidebar( 'easywp-footer-4' ); ?>
</div>

</div>

</div>
</div>
<?php endif; ?>

<div id="easywp-site-info-container" class="clearfix">
<div id="easywp-site-info">
<div id="easywp-copyrights">
<?php if ( easywp_get_option('footer_text') ) : ?>
  <?php echo esc_html(easywp_get_option('footer_text')); ?>
<?php else : ?>
  <?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'easywp' ), esc_html(date_i18n(__('Y','easywp'))) . ' ' . esc_html(get_bloginfo( 'name' )) ); ?>
<?php endif; ?>
</div>
<div id="easywp-credits"><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'easywp' ), 'ThemesDNA.com' ); ?></a></div>
</div><!-- #easywp-site-info -->
</div>

</div><!-- #easywp-outer-wrapper -->
</div><!-- #easywp-body-wrapper -->

<button class="easywp-scroll-top" aria-label="<?php esc_attr_e( 'Scroll to Top', 'easywp' ); ?>"><span class="fa fa-arrow-up" aria-hidden="true"></span></button>

<?php wp_footer(); ?>
</body>
</html>