<?php get_header(); ?>

<main id="site-main">

	<div class="site-section-wrapper site-section-wrapper-main">

	<?php
	while (have_posts()) : the_post();

	academiathemes_hero_image_inside($post);
	
	// Function to display Breadcrumbs
	academiathemes_helper_display_breadcrumbs($post);

	?>
		<div id="site-page-columns">

			<?php 
			// Function to display the SIDEBAR (if not hidden)
			academiathemes_helper_display_page_sidebar_column(); ?><!-- ws fix

			--><div id="site-column-main" class="site-column site-column-main">
				
				<div class="site-column-main-wrapper clearfix">

					<?php // Function to display the START of the content column markup

					academiathemes_helper_display_page_content_wrapper_start();

						academiathemes_helper_display_title($post);
						academiathemes_helper_display_content($post);
						academiathemes_helper_display_comments($post);

					// Function to display the END of the content column markup
					academiathemes_helper_display_page_content_wrapper_end();

					// Function to display the SECONDARY SIDEBAR (if not hidden)
					academiathemes_helper_display_page_sidebar_secondary(); ?>

				</div><!-- .site-column-wrapper .site-content-wrapper .clearfix -->
			</div><!-- #site-column-main .site-column .site-column-main -->

		</div><!-- #site-page-columns -->
	<?php
	endwhile;
	?>

	</div><!-- .site-section-wrapper .site-section-wrapper-main -->

</main><!-- #site-main -->
	
<?php get_footer(); ?>