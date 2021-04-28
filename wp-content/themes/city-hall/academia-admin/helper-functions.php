<?php

// Get Header Style
if( ! function_exists( 'academiathemes_helper_get_header_style' ) ) {
	function academiathemes_helper_get_header_style() {

		$themeoptions_header_style = esc_attr(get_theme_mod( 'theme-header-style', 'left' ));

		if ( $themeoptions_header_style == 'left' ) {
			$default_style = 'page-header-left';
		} elseif ( $themeoptions_header_style == 'centered' ) {
			$default_style = 'page-header-centered';
		}

		return $default_style;
	}
}

// Get Menu Style
if( ! function_exists( 'academiathemes_helper_get_menu_style' ) ) {
	function academiathemes_helper_get_menu_style() {

		$default_style = '';
		$themeoptions_menu_style = esc_attr(get_theme_mod( 'theme-menu-style', 'standard' ));

		if ( $themeoptions_menu_style == 'standard' ) {
			$default_style = 'page-menu-standard';
		} elseif ( $themeoptions_menu_style == 'overlaid' ) {
			$default_style = 'page-menu-overlaid';
		}

		return $default_style;
	}
}

// Get Global Sidebar Position
if( ! function_exists( 'academiathemes_helper_get_sidebar_position' ) ) {
	function academiathemes_helper_get_sidebar_position() {

		$return_sidebar = '';
		$display_sidebar = esc_attr(get_theme_mod( 'theme-sidebar-position', 'both' ));

		if ( $display_sidebar == 'both' ) {
			$return_sidebar = 'page-sidebar-both';
		} elseif ( $display_sidebar == 'none' ) {
			$return_sidebar = 'page-sidebar-none';
		} elseif ( $display_sidebar == 'left' ) {
			$return_sidebar = 'page-sidebar-primary';
		} elseif ( $display_sidebar == 'right' ) {
			$return_sidebar = 'page-sidebar-secondary';
		}

		return $return_sidebar;
	}
}

// Find out if this page should display a hero image
if( ! function_exists( 'academiathemes_helper_get_page_hero_status' ) ) {
	function academiathemes_helper_get_page_hero_status() {

		$default_style = '';
		$hero_class = 'page-with-hero-featured-image';
		$inside_class = 'page-with-inside-featured-image';

		if ( is_front_page() || is_home() ) {
			if ( has_custom_header() ) {
				$default_style = $hero_class;
			}
		} 
		elseif ( is_singular() ) {
			$themeoptions_display_post_featured_image = esc_attr(get_theme_mod( 'theme-display-post-featured-image', 'none' ));

			if ( has_post_thumbnail() && $themeoptions_display_post_featured_image == 'wide' ) {
				$default_style = $hero_class;
			}
			if ( has_post_thumbnail() && $themeoptions_display_post_featured_image == 'inside' ) {
				$default_style = $inside_class;
			}
		}

		return $default_style;

	}
}

if( ! function_exists( 'academiathemes_helper_display_breadcrumbs' ) ) {
	function academiathemes_helper_display_breadcrumbs() {

		// CONDITIONAL FOR "Breadcrumb NavXT" plugin OR Yoast SEO Breadcrumbs
		// https://wordpress.org/plugins/breadcrumb-navxt/

		if ( function_exists('bcn_display') ) { ?>
		<div class="site-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<p class="site-breadcrumbs-p"><?php bcn_display(); ?></p>
		</div><!-- .site-breadcrumbs--><?php }

		// CONDITIONAL FOR "Yoast SEO" plugin, Breadcrumbs feature
		// https://wordpress.org/plugins/wordpress-seo/
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="site-breadcrumbs"><p class="site-breadcrumbs-p">','</p></div>');
		}

	}
}

if( ! function_exists( 'academiathemes_helper_display_title' ) ) {
	function academiathemes_helper_display_title($post) {

		if( ! is_object( $post ) ) return;
		the_title( '<h1 class="page-title">', '</h1>' );
	}
}


if( ! function_exists( 'academiathemes_helper_display_entry_title' ) ) {
	function academiathemes_helper_display_entry_title($post) {

		if( ! is_object( $post ) ) return;
		return the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>', 0 );

	}
}

if( ! function_exists( 'academiathemes_helper_display_entry_title_custom' ) ) {
	function academiathemes_helper_display_entry_title_custom($post,$title) {

		if( ! is_object( $post ) ) return;
		return '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">' . esc_html($title) . '</a></h2>';
		return the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>', 0 );

	}
}

if( ! function_exists( 'academiathemes_helper_display_datetime' ) ) {
	function academiathemes_helper_display_datetime($post) {
		
		if( ! is_object( $post ) ) return;

		return '<p class="entry-descriptor"><span class="entry-descriptor-span"><time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . get_the_date() . '</time></span></p>';

	}
}


if( ! function_exists( 'academiathemes_helper_display_excerpt' ) ) {
	function academiathemes_helper_display_excerpt($post) {

		if( ! is_object( $post ) ) return;

		return '<p class="entry-excerpt">' . get_the_excerpt() . '</p>';

	}
}


if( ! function_exists( 'academiathemes_helper_display_button_readmore' ) ) {
	function academiathemes_helper_display_button_readmore($post) {

		if( ! is_object( $post ) ) return;

		return '<p class="entry-actions"><span class="site-readmore-span"><a href="' . esc_url( get_permalink() ) . '" title="' . sprintf( /* translators: %s: Link tittle attribute */ esc_attr__( 'Continue Reading: %s', 'city-hall' ), the_title_attribute( 'echo=0' ) ) . '" class="site-readmore-anchor">' . __('Read More','city-hall') . '</a></span></p>';
		
	}
}


if( ! function_exists( 'academiathemes_helper_display_comments' ) ) {
	function academiathemes_helper_display_comments($post) {

		if( ! is_object( $post ) ) return;

		if ( comments_open() || get_comments_number() ) :

			echo '<hr /><div id="academia-comments"">';
			comments_template();
			echo '</div><!-- #academia-comments -->';

		endif;

	}
}


if( ! function_exists( 'academiathemes_helper_display_content' ) ) {
	function academiathemes_helper_display_content($post) {

		if( ! is_object( $post ) ) return;

		echo '<div class="entry-content">';
			
			the_content();
			
			wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'city-hall').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));

		echo '</div><!-- .entry-content -->';

	}
}


if( ! function_exists( 'academiathemes_helper_display_tags' ) ) {
	function academiathemes_helper_display_tags($post) {

		if( ! is_object( $post ) ) return;

		$themeoptions_display_post_tags 	= esc_attr(get_theme_mod( 'theme-display-tags', 1 ));

		if ( $themeoptions_display_post_tags != 1 ) { return; }

		if ( get_post_type($post->ID) == 'post' ) { 
			the_tags( '<p class="post-meta post-tags"><strong>'.__('Tags', 'city-hall').':</strong> ', '', '</p>');
		}

	}
}


if( ! function_exists( 'academiathemes_helper_display_postmeta' ) ) {
	function academiathemes_helper_display_postmeta($post) {

		if( ! is_object( $post ) ) return;

		if ( get_post_type($post->ID) == 'post' ) { 

			if ( is_singular() ) {

				$themeoptions_display_post_published 	= esc_attr(get_theme_mod( 'theme-display-published', 1 ));
				$themeoptions_display_post_category 	= esc_attr(get_theme_mod( 'theme-display-category', 1 ));

				echo '<p class="entry-tagline">';
				
				if ( $themeoptions_display_post_published == 1 ) { echo '<span class="post-meta-span"><time datetime="' . esc_attr(get_the_time("Y-m-d")) . '" pubdate>' . esc_html(get_the_time(get_option('date_format'))) . '</time></span>'; }
				if ( $themeoptions_display_post_category == 1 ) { echo '<span class="post-meta-span category">'; the_category(', '); echo '</span>'; }
				echo '</p><!-- .entry-tagline -->';

			} else {
				echo '<p class="entry-tagline">';
				echo '<span class="post-meta-span"><time datetime="' . esc_attr(get_the_time("Y-m-d")) . '" pubdate>' . esc_html(get_the_time(get_option('date_format'))) . '</time></span>';
				echo '<span class="post-meta-span category">'; the_category(', '); echo '</span>';
				echo '</p><!-- .entry-tagline -->';				
			}

		}

	}
}

if( ! function_exists( 'academiathemes_helper_display_page_sidebar_column' ) ) {
	function academiathemes_helper_display_page_sidebar_column() {

		$display_sidebar_position = academiathemes_helper_get_sidebar_position();
		$related_pages_position = esc_attr(get_theme_mod( 'theme-dynamic-menu-position', 'secondary' ));

		if ( isset($display_sidebar_position) && ( $display_sidebar_position == 'page-sidebar-primary' || $display_sidebar_position == 'page-sidebar-both' ) ) {

		?><div id="site-aside-primary" class="site-column site-column-aside">
			<div class="site-column-wrapper site-aside-wrapper clearfix">

				<?php 
				if ( $related_pages_position == 'primary' ) { if ( is_page() || is_page_template() ) { get_template_part('related-pages'); } }
				get_sidebar();
				?>

			</div><!-- .site-column-wrapper .site-aside-wrapper .clearfix -->
		</div><!-- #site-aside-primary .site-column site-column-aside --><?php
		}

	}
}


if( ! function_exists( 'academiathemes_helper_display_page_sidebar_secondary' ) ) {
	function academiathemes_helper_display_page_sidebar_secondary() {

		$display_sidebar_position = academiathemes_helper_get_sidebar_position();
		$related_pages_position = esc_attr(get_theme_mod( 'theme-dynamic-menu-position', 'secondary' ));

		if ( isset($display_sidebar_position) && ( $display_sidebar_position == 'page-sidebar-secondary' || $display_sidebar_position == 'page-sidebar-both' ) ) {

		?><div id="site-aside-secondary" class="site-column site-column-aside">
			<div class="site-column-wrapper site-aside-wrapper clearfix">

				<?php 

				if ( $related_pages_position == 'secondary' ) { if ( is_page() || is_page_template() ) { get_template_part('related-pages'); } }

				if (is_active_sidebar('sidebar-secondary')) {
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar: Secondary') ) : ?> <?php endif;
				}
				?>

			</div><!-- .site-column-wrapper .site-aside-wrapper .clearfix -->
		</div><!-- #site-aside-secondary .site-column site-column-aside --><?php
		}

	}
}

// Content Column Wrapper Start
if( ! function_exists( 'academiathemes_helper_display_page_content_wrapper_start' ) ) {
	function academiathemes_helper_display_page_content_wrapper_start() {

		?><div id="site-column-content" class="site-column site-column-content"><div class="site-column-wrapper site-column-content-wrapper"><?php

	}
}

// Content Column Wrapper End
if( ! function_exists( 'academiathemes_helper_display_page_content_wrapper_end' ) ) {
	function academiathemes_helper_display_page_content_wrapper_end() {

		?></div><!-- .site-column-wrapper .site-column-content-wrapper --></div><!-- .#site-column-content .site-column .site-column-content --><?php

	}
}

// Author Bio for posts 
if( ! function_exists( 'academiathemes_helper_display_authorbio' ) ) {
	function academiathemes_helper_display_authorbio($post) {

		if( ! is_object( $post ) ) return;

		if ( get_post_type($post->ID) == 'post' ) { 

			$themeoptions_display_post_authorbio = esc_attr(get_theme_mod( 'theme-display-post-authorbio', 0 ));

			if ( $themeoptions_display_post_authorbio == 0 ) {
				return;
			}

			?><div class="entry-authorbio-wrapper clearfix">
				
				<?php echo get_avatar( get_the_author_meta( 'ID' ) , 80 ); ?><div class="author-description clearfix">

					<h3 class="author-title"><?php the_author_posts_link(); ?></h3>

					<?php if ( get_the_author_meta( 'user_url' ) || get_the_author_meta( 'facebook_url' ) || get_the_author_meta( 'twitter' ) || get_the_author_meta( 'instagram_url' ) ) {
					?><div class="author-links"><?php 
					if ( get_the_author_meta( 'user_url' ) ) { ?><a rel="external nofollow noopener" class="author_website" href="<?php the_author_meta( 'user_url' ); ?>" target="_blank"><span class="fa fa-link"></span></a><?php } 
					if ( get_the_author_meta( 'facebook_url' ) ) { ?><a rel="external nofollow noopener" class="author_facebook" href="<?php the_author_meta( 'facebook_url' ); ?>" target="_blank"><span class="fa fa-facebook-square"></span></a><?php } 
					if ( get_the_author_meta( 'twitter' ) ) { ?><a rel="external nofollow noopener" class="author_twitter" href="https://twitter.com/<?php the_author_meta( 'twitter' ); ?>" target="_blank"><span class="fa fa-twitter"></span></a><?php } 
					if ( get_the_author_meta( 'instagram_url' ) ) { ?><a rel="external nofollow noopener" class="author_instagram" href="https://instagram.com/<?php the_author_meta( 'instagram_url' ); ?>" target="_blank"><span class="fa fa-instagram"></span></a><?php } ?></div><!-- .author-links --><?php } ?>

					<div class="author-bio"><?php the_author_meta( 'description' ); ?></div>

				</div><!-- .author-description -->

			</div><!-- .entry-authorbio-wrapper .clearfix --><?php

		}

	}
}

// Include the hero featured image
if( ! function_exists( 'academiathemes_hero_image_full' ) ) {
	function academiathemes_hero_image_full($post) {

		if( ! is_object( $post ) ) return;

		$themeoptions_display_post_featured_image = esc_attr(get_theme_mod( 'theme-display-post-featured-image', 'none' ));

		if ( has_post_thumbnail() && $themeoptions_display_post_featured_image == 'wide' ) {
			get_template_part('hero-image','single');
		}

	}
}

// Include the inside featured image
if( ! function_exists( 'academiathemes_hero_image_inside' ) ) {
	function academiathemes_hero_image_inside($post) {

		if( ! is_object( $post ) ) return;

		$themeoptions_display_post_featured_image = esc_attr(get_theme_mod( 'theme-display-post-featured-image', 'none' ));

		if ( has_post_thumbnail() && $themeoptions_display_post_featured_image == 'inside' ) {
			get_template_part('hero-image','single');
		}

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_child_pages' ) ) {
	function academiathemes_helper_display_child_pages($post) {

		if( ! is_object( $post ) ) return;

		$child_of = $post->ID;
		$thumb_name = 'thumb-featured-page';

		$loop = new WP_Query( array( 'post_parent' => absint($child_of), 'child_of' => absint($child_of), 'post_type' => 'page', 'nopaging' => 1, 'orderby' => 'menu_order title', 'order' => 'ASC' ) );

		if ($loop->have_posts()) {
			$i = 0;
			?>
			<div class="site-section-directory">
			<ul class="site-directory-items clearfix"><?php 

			while ( $loop->have_posts() ) : $loop->the_post(); $i++; 
				?><li class="site-directory-item site-directory-item-<?php echo esc_attr($i); if ( has_post_thumbnail() ) { echo ' has-post-thumbnail'; } ?> site-archive-post">
					<div class="site-column-widget-wrapper clearfix">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="entry-thumbnail">
							<div class="entry-thumbnail-wrapper">
								<?php
								// CREATE A PROPER ALT ATTRIBUTE FOR THE THUMBNAIL
								$image_alt_attribute = get_post_meta(get_post_thumbnail_id( ), '_wp_attachment_image_alt', true);
								if ( empty($image_alt_attribute) ) {
									$image_alt_attribute = __('Thumbnail for the post titled: ','city-hall') . the_title_attribute( 'echo=0' );
								}

								echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
								the_post_thumbnail($thumb_name, array('alt' => $image_alt_attribute));
								echo '</a>';
								?>
							</div><!-- .entry-thumbnail-wrapper -->
						</div><!-- .entry-thumbnail --><?php } ?><div class="entry-preview">
							<div class="entry-preview-wrapper clearfix"><?php 
								echo academiathemes_helper_display_entry_title($post);
								echo academiathemes_helper_display_excerpt($post);
								echo academiathemes_helper_display_button_readmore($post);
								?>
							</div><!-- .entry-preview-wrapper .clearfix -->
						</div><!-- .entry-preview -->
					</div><!-- .site-column-widget-wrapper .clearfix -->
				</li><!-- .site-directory-item .site-directory-item-<?php echo esc_attr($i); ?> --><?php endwhile; ?>
			</ul><!-- .site-directory-items .clearfix --></div><!-- .site-section-directory --><?php 
		} // if there are pages

		wp_reset_postdata();

	}
}

if( ! function_exists( 'academiathemes_helper_verify_hexcolor' ) ) {
	function academiathemes_helper_verify_hexcolor($color) {

		//Check for a hex color string '#123456'
		if (preg_match('/^#[a-f0-9]{6}$/i', $color)) {
			return $color;
		} elseif (preg_match('/^[a-f0-9]{6}$/i', $color)) //hex color is valid
		{
			return '#' . trim(strtolower($color));
		}
	}
}

/* Convert HEX color to RGB value (for the customizer)						
==================================== */

if( ! function_exists( 'academiathemes_hex2rgb' ) ) {
	function academiathemes_hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);
		
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = "$r, $g, $b";
		return $rgb; // returns an array with the rgb values
	}
}

/**
 * Adds a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 * @return stdClass An object of wp_nav_menu() arguments.
 */
function city_hall_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		$args->after  = '';

		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$args->after .= '<button class="sub-menu-toggle toggle-anchor"><span class="screen-reader-text">' . __( 'Show sub menu', 'city-hall' ) . '</span><span class="dashicons dashicons-arrow-down-alt2"></span></span></button>';

		}
	} 

	return $args;

}

add_filter( 'nav_menu_item_args', 'city_hall_add_sub_toggles_to_main_menu', 10, 3 );