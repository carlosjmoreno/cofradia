<?php

/*------------------------------------------*/
/* AcademiaThemes: Recent Posts             */
/*------------------------------------------*/
 
class academiathemes_widget_posts_section extends WP_Widget {
	
	public function __construct() {

		parent::__construct(
			'academia-widget-posts-section',
			esc_html__( 'Academia: Posts Section', 'city-hall' ),
			array(
				'classname'   => 'widget-posts-section',
				'description' => esc_html__( 'Displays a list of posts optionally filtered by category.', 'city-hall' )
			)
		);

	}
	
	public function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title 				= apply_filters( 'widget_title', empty($instance['widget_title']) ? '' : $instance['widget_title'], $instance );
		$category 			= isset($instance['category']) ? $instance['category'] : false;
		$show_num 			= isset($instance['show_num']) ? $instance['show_num'] : 3;
		$show_thumb 		= isset($instance['show_thumb']) ? $instance['show_thumb'] : false;
		$show_pagination 	= isset($instance['show_pagination']) ? $instance['show_pagination'] : false;
		$show_date 			= isset($instance['datetime']) ? $instance['datetime'] : false;
		$default_num_pp 	= get_option( 'posts_per_page' );

		if ( isset($category) ) {
			$categoryLink = get_category_link($category);
		}

		ob_start();

		$loop = new WP_Query( array( 'posts_per_page' => $show_num, 'orderby' => 'date', 'order' => 'DESC', 'cat' => $category ) );

		$i = 0; 

		if ( $loop->have_posts() ) { 

			/* Before widget (defined by themes). */
			echo $before_widget;

			if ( $args['id'] == 'homepage-content-widgets' || $args['id'] == 'prefooter-widgets-1' || $args['id'] == 'prefooter-widgets-2' ) {
				$thumb_name = 'thumb-featured-page';
			} else {
				if (current_user_can( 'manage_options' ) ) {
					if ( $title ) {
						echo $before_title;
						echo $title;
						echo $after_title;
					}				
					?><p><?php esc_html_e('The Academia: Posts Section widget cannot be displayed in this sidebar.','city-hall'); ?></p><?php
					echo $after_widget;
				}
				return;
			}

			echo '<div class="site-columns site-columns-2 clearfix';
			if ($show_thumb == 'on') { echo ' widget-with-thumbnails'; }
			echo '">';

			/* Title of widget (before and after defined by themes). */
			if ( $title ) {
				echo $before_title;
				echo $title;
				echo $after_title;
			}

			while ( $loop->have_posts() ) : $loop->the_post(); $i++;
			global $post;

			$classes = array('site-archive-post'); 
			
			if ( !has_post_thumbnail() || !$show_photo ) {
				$classes[] = 'post-nothumbnail';
			}

			if ( $i == 1 ) {
				echo '<div class="site-column site-column-1 site-archive-post">';
					echo '<div class="site-column-wrapper clearfix">';

						if ( has_post_thumbnail() ) { ?>
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
						</div><!-- .entry-thumbnail --><?php } ?>
						<?php echo academiathemes_helper_display_entry_title($post);
						echo academiathemes_helper_display_excerpt($post);

					echo '</div><!-- .site-column .site-column-wrapper .clearfix -->';
				echo '</div><!-- .site-column .site-column-1 -->';
				echo '<div class="site-column site-column-2">';
					echo '<div class="site-column-wrapper clearfix">';
						echo '<ul class="widget-posts-list">';
						} else {
							?><li <?php post_class($classes); ?>><?php

							if ( has_post_thumbnail() && $show_thumb == 'on' ) { ?>
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

								?></div><!-- .entry-thumbnail-wrapper -->
							</div><!-- .entry-thumbnail --><?php } ?><!-- ws fix
							--><div class="entry-preview">
								<div class="entry-preview-wrapper clearfix">
									<?php 
									echo academiathemes_helper_display_entry_title($post);
									if ($show_date == 'on') { echo academiathemes_helper_display_datetime($post); }
									?>
									
								</div><!-- .entry-preview-wrapper .clearfix -->
							</div><!-- .entry-preview -->

							<?php echo '</li>';
						}

						endwhile;

						echo '</ul><!-- .widget-posts-list -->';
						if ($show_pagination == 'on' && $category == 0) { the_posts_pagination(); }

					echo '</div><!-- .site-column .site-column-wrapper .clearfix -->';
				echo '</div><!-- .site-column .site-column-1 -->';

			echo '</div><!-- .site-columns .site-columns-2 .clearfix -->';

			/* After widget (defined by themes). */
			echo $after_widget;

			//Reset query_posts
			wp_reset_query();			

		}

		ob_end_flush();

	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['widget_title'] 		= sanitize_text_field ( $new_instance['widget_title'] );
		$instance['category'] 			= (int) $new_instance['category'];
		$instance['show_num'] 			= (int) $new_instance['show_num'];
		$instance['show_thumb'] 		= isset( $new_instance['show_thumb'] ) ? (bool) $new_instance['show_thumb'] : false;
		$instance['datetime'] 			= isset( $new_instance['datetime'] ) ? (bool) $new_instance['datetime'] : false;
		$instance['show_pagination'] 	= isset( $new_instance['show_pagination'] ) ? (bool) $new_instance['show_pagination'] : false;

		return $instance;
	}
	
	function form( $instance ) {

		$default_num_pp = get_option( 'posts_per_page' );

		/* Set up some default widget settings. */
		$defaults = array( 
			'widget_title' 		=> __('Recent Posts','city-hall'), 
			'category' 			=> 0, 
			'show_num' 			=> $default_num_pp, 
			'show_thumb' 		=> 1, 
			'datetime' 			=> 1, 
			'show_pagination' 	=> 1
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Widget Title', 'city-hall'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" value="<?php echo esc_attr($instance['widget_title']); ?>" type="text" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php _e('Category of posts', 'city-hall'); ?>:</label>
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
				<?php 
				$i = 0;
				while ($i < 10) {
					$i++;
					?><option value="<?php echo esc_attr($i); ?>"<?php if ($instance['show_num'] == $i) { echo ' selected="selected"';} ?>><?php echo esc_html($i); if ( $i == $default_num_pp ) { echo ' - '; esc_html_e('current posts per page setting','city-hall'); } ?></option><?php
				}
				if ( $default_num_pp > 10 ) {
					?><option value="<?php echo esc_attr($default_num_pp); ?>"<?php if ($instance['show_num'] == $default_num_pp) { echo ' selected="selected"';} ?>><?php echo esc_html($default_num_pp); ?></option><?php
				}
				?>
			</select>
			<span style="display: block; margin: 8px 0 0; "><?php echo sprintf( 
					/* translators: Theme name and version */
					__( 'You can change the current Posts per Page value on the <a href="%1$s">Settings > Reading</a> page.', 'city-hall' ), 
					get_admin_url() . 'options-reading.php'
					); ?></span>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['show_thumb'] ); ?>  id="<?php echo $this->get_field_id('show_thumb'); ?>" name="<?php echo $this->get_field_name('show_thumb'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_thumb'); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display thumbnails in the posts list', 'city-hall'); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['datetime'] ); ?>  id="<?php echo $this->get_field_id('datetime'); ?>" name="<?php echo $this->get_field_name('datetime'); ?>" /> 
			<label for="<?php echo $this->get_field_id('datetime'); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display date', 'city-hall'); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['show_pagination'] ); ?> id="<?php echo $this->get_field_id('show_pagination'); ?>" name="<?php echo $this->get_field_name('show_pagination'); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_pagination' ); ?>" style="font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Display Blog Archives pagination', 'city-hall'); ?></label>
			<span style="display: block; margin: 8px 0 0; "><?php esc_html_e('Pagination can be displayed only if no category is selected.', 'city-hall'); ?></span>
		</p>
		
		<?php
	}
}