<?php

/*------------------------------------------*/
/* AcademiaThemes: Widgets Container	    */
/*------------------------------------------*/
 
class academiathemes_widget_widget_columns extends WP_Widget {
	
	public function __construct() {

		parent::__construct(
			'academia-widget-widget-columns',
			esc_html__( 'Academia: Widgets Container', 'city-hall' ),
			array(
				'classname'   => 'widget-widgets-container',
				'description' => esc_html__( 'Displays the three Homepage: Widget Column widgetized areas. Add it to the Homepage: Content Widgets widgetized area.', 'city-hall' )
			)
		);

	}

	public function widget( $args, $instance ) {
		
		extract( $args );

		$valid_color_options = $this->get_valid_color_options();

		$instance['column_border_color_1'] = isset($instance['column_border_color_1']) ? $instance['column_border_color_1'] : $valid_color_options['black'];
		$instance['column_border_color_2'] = isset($instance['column_border_color_2']) ? $instance['column_border_color_2'] : $valid_color_options['black'];
		$instance['column_border_color_3'] = isset($instance['column_border_color_3']) ? $instance['column_border_color_3'] : $valid_color_options['black'];

		$custom_color_1 = isset($instance['column_border_custom_color_1']) ? academiathemes_helper_verify_hexcolor ( $instance['column_border_custom_color_1']) : '';
		$custom_color_2 = isset($instance['column_border_custom_color_2']) ? academiathemes_helper_verify_hexcolor ( $instance['column_border_custom_color_2']) : '';
		$custom_color_3 = isset($instance['column_border_custom_color_3']) ? academiathemes_helper_verify_hexcolor ( $instance['column_border_custom_color_3']) : '';

		/* Before widget (defined by themes). */
		echo $before_widget;

		if ( $args['id'] == 'homepage-content-widgets' || $args['id'] == 'prefooter-widgets-2' ) {
			$thumb_name = 'thumb-featured-page';
		} else {
			if (current_user_can( 'manage_options' ) ) {
				?><p><?php esc_html_e('The Academia: Widgets Container widget cannot be displayed in this sidebar.','city-hall'); ?></p><?php
				echo $after_widget;
			}
			return;
		}

		$columns_count = 0;
		if ( is_active_sidebar('homepage-content-column-1') ) { $columns_count++; }
		if ( is_active_sidebar('homepage-content-column-2') ) { $columns_count++; }
		if ( is_active_sidebar('homepage-content-column-3') ) { $columns_count++; }

		if ( $columns_count == 0 ) { return; }
		
?>
		<div class="academiathemes-custom-widget widget-special-blocks">

			<div class="widget-columns widget-columns-<?php echo esc_attr($columns_count); ?> clearfix">
				<?php
				$i = 0;
				while ( $i < 3 ) {
					$i++;

					$color_var_name 		= 'column_border_color_' . $i;
					$custom_color_var_name 	= 'column_border_custom_color_' . $i;
					$sidebar_var_name 		= 'homepage-content-column-' . $i;

					if ( !is_active_sidebar($sidebar_var_name) ) { continue; }

					?><div class="widget-column widget-column-<?php echo esc_attr($i); ?> widget-column-<?php echo esc_attr($instance[$color_var_name]); ?>"<?php
					if ( $instance[$color_var_name] == 'custom' && isset($instance[$custom_color_var_name]) ) { echo ' style="border-top-color: '. $instance[$custom_color_var_name] .';"'; }
					?>>

					<div class="widget-column-wrapper clearfix">
					
						<?php if ( !dynamic_sidebar($sidebar_var_name) ) : ?> <?php endif; ?>
					
					</div><!-- .widget-column-wrapper .clearfix -->
					
				</div><!-- .widget-column .widget-column-<?php echo esc_attr($i); ?> --><!-- ws fix
				--><?php
				}
				?>
			</div><!-- .widget-columns .widget-columns-<?php echo esc_attr($columns_count); ?> .clearfix -->

		</div><!-- .academiathemes-custom-widget .widget-special-blocks -->
<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$valid_color_options = $this->get_valid_color_options();

		/* Strip tags (if needed) and update the widget settings. */
		$instance['column_border_color_1'] = $this->sanitize_border_color_field ( $new_instance['column_border_color_1'], $valid_color_options );
		$instance['column_border_color_2'] = $this->sanitize_border_color_field ( $new_instance['column_border_color_2'], $valid_color_options );
		$instance['column_border_color_3'] = $this->sanitize_border_color_field ( $new_instance['column_border_color_3'], $valid_color_options );

		$instance['column_border_custom_color_1'] = academiathemes_helper_verify_hexcolor (trim ( strtolower($new_instance['column_border_custom_color_1']) ) );
		$instance['column_border_custom_color_2'] = academiathemes_helper_verify_hexcolor (trim ( strtolower($new_instance['column_border_custom_color_2']) ) );
		$instance['column_border_custom_color_3'] = academiathemes_helper_verify_hexcolor (trim ( strtolower($new_instance['column_border_custom_color_3']) ) );

		return $instance;
	}
	
	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
			'column_border_color_1' => null, 
			'column_border_color_2' => null, 
			'column_border_color_3' => null, 
			'column_border_custom_color_1' => null, 
			'column_border_custom_color_2' => null, 
			'column_border_custom_color_3' => null
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$valid_color_options = $this->get_valid_color_options();

		$instance['column_border_color_1'] = $this->sanitize_border_color_field( $instance['column_border_color_1'], $valid_color_options );
		$instance['column_border_color_2'] = $this->sanitize_border_color_field( $instance['column_border_color_2'], $valid_color_options );
		$instance['column_border_color_3'] = $this->sanitize_border_color_field( $instance['column_border_color_3'], $valid_color_options );

		$instance['column_border_custom_color_1'] = isset( $instance['column_border_custom_color_1'] ) ? $instance['column_border_custom_color_1'] : '';
		$instance['column_border_custom_color_2'] = isset( $instance['column_border_custom_color_2'] ) ? $instance['column_border_custom_color_2'] : '';
		$instance['column_border_custom_color_3'] = isset( $instance['column_border_custom_color_3'] ) ? $instance['column_border_custom_color_3'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'column_border_color_1' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Column 1 Border Color', 'city-hall'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'column_border_color_1' ); ?>" name="<?php echo $this->get_field_name( 'column_border_color_1' ); ?>" class="widefat">
				
				<?php
				foreach ($valid_color_options as $color_key => $color_name) {
					?><option value="<?php echo esc_attr($color_key); ?>"<?php if ($instance['column_border_color_1'] == $color_key) { echo ' selected="selected"';} ?>><?php echo esc_html($color_name); ?></option><?php
				}
				?>
			</select>
		</p>

		<p class="academiathemes_hidden_option academiathemes_hidden_option_1 <?php echo $instance['column_border_color_1']; ?>"<?php if ( $instance['column_border_color_1'] != 'custom' ) { echo' style="display: none; "'; } ?>>
			<label for="<?php echo $this->get_field_id( 'column_border_custom_color_1' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Custom Color', 'city-hall'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'column_border_custom_color_1' ); ?>" name="<?php echo $this->get_field_name( 'column_border_custom_color_1' ); ?>" value="<?php echo esc_attr($instance['column_border_custom_color_1']); ?>" class="academia-color-picker" type="text" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'column_border_color_2' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Column 2 Border Color', 'city-hall'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'column_border_color_2' ); ?>" name="<?php echo $this->get_field_name( 'column_border_color_2' ); ?>" class="widefat">
				
				<?php
				foreach ($valid_color_options as $color_key => $color_name) {
					?><option value="<?php echo esc_attr($color_key); ?>"<?php if ($instance['column_border_color_2'] == $color_key) { echo ' selected="selected"';} ?>><?php echo esc_html($color_name); ?></option><?php
				}
				?>
			</select>
		</p>

		<p class="academiathemes_hidden_option academiathemes_hidden_option_2 <?php echo $instance['column_border_color_2']; ?>"<?php if ( $instance['column_border_color_2'] != 'custom' ) { echo' style="display: none; "'; } ?>>
			<label for="<?php echo $this->get_field_id( 'column_border_custom_color_2' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Custom Color', 'city-hall'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'column_border_custom_color_2' ); ?>" name="<?php echo $this->get_field_name( 'column_border_custom_color_2' ); ?>" value="<?php echo esc_attr($instance['column_border_custom_color_2']); ?>" class="academia-color-picker" type="text" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'column_border_color_3' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Column 3 Border Color', 'city-hall'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'column_border_color_3' ); ?>" name="<?php echo $this->get_field_name( 'column_border_color_3' ); ?>" class="widefat">
				
				<?php
				foreach ($valid_color_options as $color_key => $color_name) {
					?><option value="<?php echo esc_attr($color_key); ?>"<?php if ($instance['column_border_color_3'] == $color_key) { echo ' selected="selected"';} ?>><?php echo esc_html($color_name); ?></option><?php
				}
				?>
			</select>
		</p>

		<p class="academiathemes_hidden_option academiathemes_hidden_option_3 <?php echo $instance['column_border_color_3']; ?>"<?php if ( $instance['column_border_color_3'] != 'custom' ) { echo' style="display: none; "'; } ?>>
			<label for="<?php echo $this->get_field_id( 'column_border_custom_color_3' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 6px;"><?php esc_html_e('Custom Color', 'city-hall'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'column_border_custom_color_3' ); ?>" name="<?php echo $this->get_field_name( 'column_border_custom_color_3' ); ?>" value="<?php echo esc_attr($instance['column_border_custom_color_3']); ?>" class="academia-color-picker" type="text" />
		</p>

<script>

jQuery(document).ready(function ($) {
    
    // Activate color picker
    $('.academia-color-picker').wpColorPicker({
		change: function(e, ui) {
			$(e.target).val(ui.color.toString());
			$(e.target).trigger('change');
		},
		clear: function(e, ui) {
			$(e.target).trigger('change');
		},
    });

    // Show/Hide custom color fields

    if ($("<?php echo $this->get_field_id( 'column_border_color_1' ); ?> option:selected").val() == "custom") { $('.academiathemes_hidden_option_1').show(); }

    $('#<?php echo $this->get_field_id( 'column_border_color_1' ); ?>').change(function () {

        $("select[name='<?php echo $this->get_field_name( 'column_border_color_1' ); ?>'] option:selected").each(function () {
            if ($(this).val() == "custom") {
                $('.academiathemes_hidden_option_1').show(200);
            } else {
            	$('.academiathemes_hidden_option_1').hide(200);
            }

        });
    });

    if ($("<?php echo $this->get_field_id( 'column_border_color_2' ); ?> option:selected").val() == "custom") { $('.academiathemes_hidden_option_2').show(); }

    $('#<?php echo $this->get_field_id( 'column_border_color_2' ); ?>').change(function () {

        $("select[name='<?php echo $this->get_field_name( 'column_border_color_2' ); ?>'] option:selected").each(function () {
            if ($(this).val() == "custom") {
                $('.academiathemes_hidden_option_2').show(200);
            } else {
            	$('.academiathemes_hidden_option_2').hide(200);
            }

        });
    });

    if ($("<?php echo $this->get_field_id( 'column_border_color_3' ); ?> option:selected").val() == "custom") { $('.academiathemes_hidden_option_3').show(); }

    $('#<?php echo $this->get_field_id( 'column_border_color_3' ); ?>').change(function () {

        $("select[name='<?php echo $this->get_field_name( 'column_border_color_3' ); ?>'] option:selected").each(function () {
            if ($(this).val() == "custom") {
                $('.academiathemes_hidden_option_3').show(200);
            } else {
            	$('.academiathemes_hidden_option_3').hide(200);
            }

        });
    });
});
</script>

		<?php
	}

	function get_valid_color_options () {

		$color_options = array(
			'black' => __('Black', 'city-hall'), 
			'blue' => __('Blue', 'city-hall'), 
			'green' => __('Green', 'city-hall'), 
			'orange' => __('Orange', 'city-hall'), 
			'red' => __('Red', 'city-hall'),
			'yellow' => __('Yellow', 'city-hall'),
			'custom' => __('Custom (choose below)', 'city-hall')
		);
		return $color_options;

	}

	function sanitize_border_color_field ($value, $valid_values) {
		
		if( array_key_exists( $value, $valid_values ) ) {
			return $value;
		} else {
			return $valid_values['black'];
		}
	}

}
?>