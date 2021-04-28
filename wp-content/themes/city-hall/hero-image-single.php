<?php 
if ( is_single() || is_page() || is_page_template() ) {

	$meta_target_id = $post->ID;

	if ( $post->ID == 0 ) {
		global $wp_query;
		if ( isset( $wp_query->queried_object->ID ) ) { $meta_target_id = $wp_query->queried_object->ID; }
	}

	$themeoptions_display_post_featured_image = esc_attr(get_theme_mod( 'theme-display-post-featured-image', 'none' ));

	if ( has_post_thumbnail() && $themeoptions_display_post_featured_image != 'none' ) {

		?>
		<div class="entry-thumbnail site-section-wrapper site-section-wrapper-slideshow-large site-section-wrapper-slideshow">
			<div id="site-section-slideshow" class="site-section-slideshow">
				<?php the_post_thumbnail('thumb-academia-slideshow'); ?>
			</div><!-- #site-section-slideshow .site-section-slideshow -->
		</div><!-- .entry-thumbnail .site-section-wrapper .site-section-wrapper-slideshow-large .site-section-wrapper-slideshow --><?php

	}

} 