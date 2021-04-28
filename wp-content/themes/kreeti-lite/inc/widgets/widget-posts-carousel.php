<?php
    if (!class_exists('Kreeti_Posts_Carousel')) :
        /**
         * Adds Kreeti_Posts_Carousel widget.
         */
        class Kreeti_Posts_Carousel extends Kreeti_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array('kreeti-posts-slider-title', 'kreeti-posts-slider-number');
                $this->select_fields = array('kreeti-select-category');
                
                $widget_ops = array(
                    'classname' => 'kreeti_posts_carousel_widget carousel-layout',
                    'description' => __('Displays posts carousel from selected category.', 'kreeti-lite'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('kreeti_posts_carousel', __('AFTK Posts Carousel', 'kreeti-lite'), $widget_ops);
            }
            
            /**
             * Front-end display of widget.
             *
             * @see WP_Widget::widget()
             *
             * @param array $args Widget arguments.
             * @param array $instance Saved values from database.
             */
            
            public function widget($args, $instance)
            {
                $instance = parent::kreeti_sanitize_data($instance, $instance);
                /** This filter is documented in wp-includes/default-widgets.php */
    
                $kreeti_featured_news_title = apply_filters('widget_title', $instance['kreeti-posts-slider-title'], $instance, $this->id_base);
    
                $kreeti_no_of_post = 5;
                $kreeti_category_id = !empty($instance['kreeti-select-category']) ? $instance['kreeti-select-category'] : '0';
    
                $kreeti_featured_posts = kreeti_lite_get_posts($kreeti_no_of_post, $kreeti_category_id);
                // open the widget container
                echo $args['before_widget'];
                ?>
                <div class="af-main-banner-categorized-posts express-carousel pad-v">
                <div class="section-wrapper">
                    <?php if (!empty($kreeti_featured_news_title)): ?>
                        <div class="af-title-subtitle-wrap">
                            <h4 class="widget-title header-after1 ">
                                <span class="heading-line-before"></span>
                                <?php echo esc_html($kreeti_featured_news_title); ?>
                                <span class="heading-line-after"></span>
                            </h4>
                        </div>
                    <?php endif; ?>
                    <div class="slick-wrapper af-post-carousel af-widget-post-carousel clearfix af-cat-widget-carousel af-widget-carousel af-widget-body">
                        <?php
                            
                
                            if ($kreeti_featured_posts->have_posts()) :
                                $kreeti_count = 1;
                                while ($kreeti_featured_posts->have_posts()) :
                                    $kreeti_featured_posts->the_post();
                                    global $post;
                                    $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    $kreeti_first_section_class = '';
                                    $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                                    ?>
                                    <div class="slick-item pad float-l af-sec-post">
                                        <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_first_section_class); ?>">
                                            <div class="read-img pos-rel read-img read-bg-img data-bg"
                                                 data-background="<?php echo esc_url($kreeti_img_url); ?>">
                                                <a class="aft-post-image-link"
                                                   href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <?php if (!empty($kreeti_img_url)): ?>
                                                    <img src="<?php echo esc_url($kreeti_img_url); ?>"
                                                         alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_img_thumb_id)); ?>">
                                                <?php endif; ?>
                                                <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                            </div>
                                            <div class="col-75 pad float-l read-details color-tp-pad">
                                                <div class="post-format-and-min-read-wrap">
                                                    <?php kreeti_lite_post_format($post->ID); ?>
                                                    <?php kreeti_lite_count_content_words($post->ID); ?>
                                                </div>
                                                <div class="banner-carousel read-categories">
                                                    <?php kreeti_lite_post_categories(); ?>
                                                </div>
                                                <div class="read-title">
                                                    <h4>
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $kreeti_count++;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            <?php endif; ?>
                    </div>
                </div>
                </div>
                
                <?php
                //print_pre($all_posts);
                
                // close the widget container
                echo $args['after_widget'];
            }
            
            /**
             * Back-end widget form.
             *
             * @see WP_Widget::form()
             *
             * @param array $instance Previously saved values from database.
             */
            public function form($instance)
            {
                $this->form_instance = $instance;
                $categories = kreeti_get_terms();
                if (isset($categories) && !empty($categories)) {
                    // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                    echo parent::kreeti_generate_text_input('kreeti-posts-slider-title', 'Title', 'Posts Carousel');
                    echo parent::kreeti_generate_select_options('kreeti-select-category', __('Select category', 'kreeti-lite'), $categories);
                    
                }
            }
        }
    endif;