<?php
/**
 * The template used for displaying featured pages on the Front Page.
 *
 * @package City Hall
 */

$page_ids = array();
if ( absint(get_theme_mod( 'city-hall-featured-page-1', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'city-hall-featured-page-1', false )); }
if ( absint(get_theme_mod( 'city-hall-featured-page-2', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'city-hall-featured-page-2', false )); }
if ( absint(get_theme_mod( 'city-hall-featured-page-3', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'city-hall-featured-page-3', false )); }
if ( absint(get_theme_mod( 'city-hall-featured-page-4', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'city-hall-featured-page-4', false )); }
if ( absint(get_theme_mod( 'city-hall-featured-page-5', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'city-hall-featured-page-5', false )); }
$page_count = 0;
$page_count = count($page_ids);

if ( $page_count > 0 ) {
	$custom_loop = new WP_Query( array( 'post_type' => 'page', 'post__in' => $page_ids, 'orderby' => 'post__in' ) );

	if ( $custom_loop->have_posts() ) : ?>

	<div class="site-section-wrapper site-section-wrapper-slideshow site-section-wrapper-slideshow-large">
		<div id="site-section-slideshow" class="site-section-slideshow-withimage site-flexslider">
			<ul class="site-slideshow-list academia-slideshow">
				<?php 
				while ( $custom_loop->have_posts() ) : $custom_loop->the_post();
				if ( has_post_thumbnail() ) {
					$large_image_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'thumb-academia-slideshow' );
				}
				?>
				<li class="site-slideshow-item">
					<div class="slideshow-hero-wrapper"<?php if ( isset($large_image_url) ) { echo ' style="background-image: url( ' . esc_url($large_image_url) . ');"'; } ?>>
						<div class="site-section-wrapper-slide">
							<div class="content-wrapper">
								<div class="content-aligner">
									<?php the_title( sprintf( '<h1 class="hero-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
									<p class="hero-description"><?php echo wp_kses_post(get_the_excerpt()); ?></p>
									<span class="hero-button-span"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="hero-button-anchor"><?php esc_html_e('Read More','city-hall'); ?></a></span>
								</div><!-- .content-aligner -->
							</div><!-- .content-wrapper -->
						</div><!-- .site-section-wrapper-slide -->
					</div><!-- .slideshow-hero-wrapper -->
				</li><!-- .site-slideshow-item -->
				<?php 
				if ( isset($large_image_url) ) { unset($large_image_url); }
				endwhile; 
				?>
			</ul><!-- .site-slideshow-list .academia-slideshow -->
		</div><!-- #site-section-slideshow -->
	</div><!-- .site-section-wrapper .site-section-wrapper-slideshow -->

<?php else : ?>

 <?php if ( current_user_can( 'publish_posts' ) && is_customize_preview() ) : ?>

	<div class="site-section-wrapper site-section-wrapper-slideshow site-section-wrapper-slideshow-large">
		<div id="site-section-slideshow">

			<div class="city-hall-page-intro city-hall-nofeatured">
				<h1 class="title-page"><?php esc_html_e( 'No Featured Pages Found', 'city-hall' ); ?></h1>
				<div class="taxonomy-description">

					<p><?php printf( esc_html__( 'This section will display your featured pages. Configure (or disable) it via the Customizer.', 'city-hall' ) ); ?></p>
					<p><strong><?php printf( esc_html__( 'Important: This message is NOT visible to site visitors, only to admins and editors.', 'city-hall' ) ); ?></strong></p>

				</div><!-- .taxonomy-description -->
			</div><!-- .city-hall-page-intro .city-hall-nofeatured -->

		</div><!-- #site-section-slideshow -->
	</div><!-- .site-section-wrapper .site-section-wrapper-slideshow -->

<?php endif; ?>

<?php
	endif;
}