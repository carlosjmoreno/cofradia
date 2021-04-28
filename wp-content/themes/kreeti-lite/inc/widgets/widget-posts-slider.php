<?php
if (!class_exists('Kreeti_Posts_Slider')) :
    /**
     * Adds Kreeti_Posts_Slider widget.
     */
    class Kreeti_Posts_Slider extends Kreeti_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('kreeti-posts-slider-title','kreeti-number-of-posts');
            $this->select_fields = array('kreeti-select-category');

            $widget_ops = array(
                'classname' => 'kreeti_posts_slider_widget aft-widget',
                'description' => __('Displays posts slider from selected category.', 'kreeti-lite'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('kreeti_posts_slider', __('AFTK Posts Slider', 'kreeti-lite'), $widget_ops);
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
            $kreeti_posts_slider_title = apply_filters('widget_title', $instance['kreeti-posts-slider-title'], $instance, $this->id_base);
            $category = isset($instance['kreeti-select-category']) ? $instance['kreeti-select-category'] : 0;
            $number_of_posts = 5;
           

          
            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php
            
            ?>
            <section class="aft-blocks pad-v">
                <div class="af-slider-wrap">
    
                    <?php if (!empty($kreeti_posts_slider_title)): ?>
                        <div class="af-title-subtitle-wrap">
                            <h4 class="widget-title header-after1 ">
                                <span class="heading-line-before"></span>
                                <?php echo esc_html($kreeti_posts_slider_title); ?>
                                <span class="heading-line-after"></span>
                            </h4>
                        </div>
                    <?php endif; ?>
                    <div class="widget-block widget-wrapper af-widget-body">
                        <div class="af-posts-slider posts-slider banner-slider-2  af-posts-slider af-widget-carousel af-cat-widget-carousel slick-wrapper">
                            <?php
                                $kreeti_slider_posts = kreeti_lite_get_posts($number_of_posts, $category);
                                if ($kreeti_slider_posts->have_posts()) :
                                    while ($kreeti_slider_posts->have_posts()) : $kreeti_slider_posts->the_post();
            
                                        global $post;
                                        $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-slider-full');
                                        $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                                        ?>
                                        <div class="slick-item">
                                            <div class="read-single color-pad pos-rel">
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
                                                <div class="read-details color-tp-pad pad ptb-10 pad">
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
                                                    <div class="entry-meta">
                                                        <?php kreeti_lite_post_item_meta(); ?>
                                                        <?php kreeti_lite_get_comments_views_share($post->ID); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php
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
                echo parent::kreeti_generate_text_input('kreeti-posts-slider-title', __('Title', 'kreeti-lite'), 'Posts Slider');
                echo parent::kreeti_generate_select_options('kreeti-select-category', __('Select category', 'kreeti-lite'), $categories);


            }
        }
    }
endif;