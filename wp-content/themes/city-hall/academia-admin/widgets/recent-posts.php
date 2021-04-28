<?php

/*------------------------------------------*/
/* AcademiaThemes: Recent Posts             */
/*------------------------------------------*/
 
class academiathemes_widget_recent_posts extends WP_Widget {
	
	public function __construct() {

		parent::__construct(
			'academia-widget-recent-posts',
			esc_html__( 'Academia: Recent Posts', 'city-hall' ),
			array(
				'classname'   => 'widget-recent-posts',
				'description' => esc_html__( 'Displays the most recent blog posts, optionally filtered by category.', 'city-hall' )
			)
		);

	}
	
	public function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title 			= apply_filters( 'widget_title', empty($instance['widget_title']) ? '' : $instance['widget_title'], $instance );
		$category 		= isset($instance['category']) ? $instance['category'] : 1;
		$show_num 		= isset($instance['show_num']) ? $instance['show_num'] : 3;
		$show_photo 	= isset($instance['show_photo']) ? $instance['show_photo'] : false;
		$show_button 	= isset($instance['show_button']) ? $instance['show_button'] : false;
		$show_date 		= isset($instance['datetime']) ? $instance['datetime'] : false;
		$show_excerpt 	= isset($instance['show_excerpt']) ? $instance['show_excerpt'] : false;

		if ( !isset($show_num) && ( $show_num != 2 && $show_num != 3 && $show_num != 4 ) ) {
			$show_num = 3;
		}

		if ( isset($category) ) {
			$categoryLink = get_category_link($category);
		}

		if ( $args['id'] == 'homepage-content-widgets' ) {
			$thumb_name = 'thumb-featured-page';
		} else {
			$thumb_name = 'post-thumbnail';
		}

		ob_start();
		
		$loop = new WP_Query( array( 'posts_per_page' => absint($show_num), 'orderby' => 'date', 'order' => 'DESC', 'cat' => absint($category) ) );

		$i = 0; 

		if ( $loop->have_posts() ) { 

			/* Before widget (defined by themes). */
			echo $before_widget;
			
			/* Title of widget (before and after defined by themes). */
			if ( $title ) {
				echo $before_title;
				echo $title;
				echo $after_title;
			}

			echo '<div class="academiathemes-custom-widget widget-featured-posts';
			if ($show_photo == 'on') { echo ' widget-with-thumbnails'; }
			echo '">';
			echo '<ul class="widget-columns widget-columns-' . esc_attr( $show_num ) . ' clearfix">';

			while ( $loop->have_posts() ) : $loop->the_post(); $i++;

			global $post;

			$classes = array('widget-column', 'widget-column-' . esc_attr($i), 'widget-column-widget', 'site-archive-post'); 
			
			if ( !has_post_thumbnail() || !$show_photo ) {
				$classes[] = 'post-nothumbnail';
			}

		?><li <?php post_class($classes); ?>>

			<div class="widget-column-widget-wrapper clearfix">
				<?php if ( has_post_thumbnail() && $show_photo == 'on' ) { ?>
				<div class="entry-thumbnail">
					<div class="entry-thumbnail-wrapper"><?php 

						// CREATE A PROPER ALT ATTRIBUTE FOR THE THUMBNAIL
						$image_alt_attribute = get_post_meta(get_post_thumbnail_id( ), '_wp_attachment_image_alt', true);
						if ( empty($image_alt_attribute) ) {
							$image_alt_attribute = __('Thumbnail for the post titled: ','city-hall') . the_title_attribute( 'echo=0' );
						}

						echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
						the_post_thumbnail($thumb_name, array('alt' => $image_alt_attribute));
						echo '</a>';

						if ($show_date == 'on') { echo academiathemes_helper_display_datetime($post); }

					?></div><!-- .entry-thumbnail-wrapper -->
				</div><!-- .entry-thumbnail --><!-- ws fix
				--><?php } ?><div class="entry-preview">
					<div class="entry-preview-wrapper clearfix">
						<?php 
						if ( ( !has_post_thumbnail() || $show_photo != 'on' ) && $show_date == 'on' ) { echo academiathemes_helper_display_datetime($post); }
						echo academiathemes_helper_display_entry_title($post);
						if ($show_excerpt == 'on') { echo academiathemes_helper_display_excerpt($post); }
						if ($show_button == 'on') { echo academiathemes_helper_display_button_readmore($post); } 
						?>
						
					</div><!-- .entry-preview-wrapper .clearfix -->
				</div><!-- .entry-preview -->
			</div><!-- .widget-column-widget-wrapper .clearfix -->

			</li><!-- .widget-column .widget-column-<?php echo esc_attr($i); ?> .widget-column-widget .site-archive-post --><?php

			endwhile;

			//Reset query_posts
			wp_reset_query();			
			echo '</ul><!-- .widget-columns .widget-columns-' . esc_attr( $show_num ) . ' .clearfix -->';

			echo '</div><!-- .custom-widget-featured-pages -->';

			/* After widget (defined by themes). */
			echo $after_widget;

		}
			
		ob_end_flush();
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['widget_title'] 		= sanitize_text_field ( $new_instance['widget_title'] );
		$instance['category'] 			= (int) $new_instance['category'];
		$instance['show_num'] 			= (int) $new_instance['show_num'];
		$instance['show_photo'] 		= isset( $new_instance['show_photo'] ) ? (bool) $new_instance['show_photo'] : false;
		$instance['show_button'] 		= isset( $new_instance['show_button'] ) ? (bool) $new_instance['show_button'] : false;
		$instance['datetime'] 			= isset( $new_instance['datetime'] ) ? (bool) $new_instance['datetime'] : false;
		$instance['show_excerpt'] 		= isset( $new_instance['show_excerpt'] ) ? (bool) $new_instance['show_excerpt'] : false;

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
			'widget_title' 		=> __('Widget Title','city-hall'), 
			'category' 			=> 0, 
			'show_num' 			=> 3, 
			'show_photo' 		=> 1, 
			'show_excerpt' 		=> 1, 
			'show_button' 		=> 1, 
			'datetime' 			=> 1
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Widget Title', 'city-hall'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" value="<?php echo esc_attr($instance['widget_title']); ?>" type="text" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Category of posts', 'city-hall'); ?>:</label>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat">
					<option value="0"><?php esc_html_e('- show from all categories -', 'city-hall'); ?></option>
					<?php
					
					$cats = get_categories('hide_empty=0');
					foreach ($cats as $cat) {
						$option = '<option value="'.esc_attr($cat->term_id);
						if ($cat->term_id == $instance['category']) { $option .='" selected="selected';}
						$option .= '">';
						$option .= esc_html($cat->cat_name);
						$option .= ' (' . esc_html($cat->category_count) . ')';
						$option .= '</option>';
						echo $option;
					}
				?>
				</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Number of posts to display', 'city-hall'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" class="widefat">
				<option value="2"<?php if (!$instance['show_num'] || $instance['show_num'] == 2) { echo ' selected="selected"';} ?>><?php esc_html_e('2', 'city-hall'); ?></option>
				<option value="3"<?php if ($instance['show_num'] == 3) { echo ' selected="selected"';} ?>><?php esc_html_e('3', 'city-hall'); ?></option>
				<option value="4"<?php if ($instance['show_num'] == 4) { echo ' selected="selected"';} ?>><?php esc_html_e('4', 'city-hall'); ?></option>
			</select>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['show_photo'] ); ?> id="<?php echo $this->get_field_id('show_photo'); ?>" name="<?php echo $this->get_field_name('show_photo'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_photo'); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display thumbnail', 'city-hall'); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['show_excerpt'] ); ?> id="<?php echo $this->get_field_id('show_excerpt'); ?>" name="<?php echo $this->get_field_name('show_excerpt'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_excerpt'); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display excerpt', 'city-hall'); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['show_button'] ); ?> id="<?php echo $this->get_field_id('show_button'); ?>" name="<?php echo $this->get_field_name('show_button'); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_button' ); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display a Read More button', 'city-hall'); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['datetime'] ); ?> id="<?php echo $this->get_field_id('datetime'); ?>" name="<?php echo $this->get_field_name('datetime'); ?>" /> 
			<label for="<?php echo $this->get_field_id('datetime'); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display date', 'city-hall'); ?></label>
		</p>
		
		<?php
	}
}