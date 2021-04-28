<?php 

if ( 'posts' == get_option( 'show_on_front' ) ) {

	get_template_part( 'index' );

} else {

get_header(); ?>

<main id="site-main">

	<div class="site-section-wrapper site-section-wrapper-main">

		<div id="site-page-columns">

			<?php 
			// Function to display the SIDEBAR (if not hidden)
			academiathemes_helper_display_page_sidebar_column(); ?><!-- ws fix

			--><div id="site-column-main" class="site-column site-column-main">
				
				<div class="site-column-main-wrapper clearfix">

					<?php

					// Function to display the START of the content column markup
					academiathemes_helper_display_page_content_wrapper_start(); ?>

					<?php 
					the_archive_title( '<h1 class="page-title archives-title">', '</h1>' );
					the_archive_description( '<div class="archives-content clearfix">', '</div>' );
					
					get_template_part('loop');

					// Function to display the END of the content column markup
					academiathemes_helper_display_page_content_wrapper_end();

					// Function to display the SECONDARY SIDEBAR (if not hidden)
					academiathemes_helper_display_page_sidebar_secondary(); ?>

				</div><!-- .site-column-wrapper .site-content-wrapper .clearfix -->
			</div><!-- #site-column-main .site-column .site-column-main -->

		</div><!-- #site-page-columns -->

	</div><!-- .site-section-wrapper .site-section-wrapper-main -->

</main><!-- #site-main -->
	
<?php get_footer();

}
?>