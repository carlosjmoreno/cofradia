<?php
/**
 * Template Name: Homepage: Only Widgets
 */

get_header();

if ( is_front_page() && is_active_sidebar('homepage-content-widgets') ) { ?>
	<div id="site-homepage-widgets">
		<div class="site-section-wrapper wrapper-homepage-content-widgets">
	
			<?php dynamic_sidebar( 'homepage-content-widgets' ); ?>

		</div><!-- .site-section-wrapper .wrapper-homepage-content-widgets -->

	</div><!-- #site-homepage-widgets -->

<?php } 
get_footer(); ?>