<?php
    
    if (!class_exists('Kreeti_Trending_Posts')) :
        /**
         * Adds Kreeti_Prime_News widget.
         */
        class Kreeti_Trending_Posts extends Kreeti_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array(
                    'kreeti-trending-news-title',
                    'kreeti-number-of-posts',
                
                );
                $this->select_fields = array(
                    
                    'kreeti-news_filter-by',
                    'kreeti-select-category',
                
                );
                
                $widget_ops = array(
                    'classname' => 'kreeti_trending_news_widget',
                    'description' => __('Displays grid from selected categories.', 'kreeti-lite'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('kreeti_trending_news', __('AFTK Trending News', 'kreeti-lite'), $widget_ops);
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
                
                $kreeti_trending_news_section_title = apply_filters('widget_title', $instance['kreeti-trending-news-title'], $instance, $this->id_base);
                
                $kreeti_no_of_post = 7;
                $kreeti_trending_news_category = !empty($instance['kreeti-select-category']) ? $instance['kreeti-select-category'] : '0';
                $kreeti_posts_filter_by = !empty($instance['kreeti-news_filter-by']) ? $instance['kreeti-news_filter-by'] : 'cat';
                
                
                // open the widget container
                echo $args['before_widget'];?>
                <div class="full-wid-resp pad-v">
                <?php
                
                if (!empty($kreeti_trending_news_section_title)) { ?>
                    <div class="af-title-subtitle-wrap">
                        <h4 class="trending-title widget-title header-after1">
                            <span class="heading-line-before"></span>
                            <?php echo esc_html($kreeti_trending_news_section_title); ?>
                            <span class="heading-line-after"></span>
                        </h4>
                    </div>
                <?php }
                ?>
                <div class="slick-wrapper af-post-carousel-list banner-vertical-slider af-widget-carousel af-widget-body">
                        
                        <?php
                            
                            if ($kreeti_posts_filter_by == 'tag') {
                                $kreeti_trending_news_category = $kreeti_trending_news_category;
                                $kreeti_filterby = 'tag';
                            } else {
                                
                                $kreeti_trending_news_category = $kreeti_trending_news_category;
                                $kreeti_filterby = 'cat';
                            }
                            
                            $kreeti_number_of_posts = 1;
                            if ($kreeti_no_of_post) {
                                $kreeti_number_of_posts = $kreeti_no_of_post;
                            }
                            $kreeti_featured_posts = kreeti_lite_get_posts($kreeti_number_of_posts, $kreeti_trending_news_category, $kreeti_filterby);
                            if ($kreeti_featured_posts->have_posts()) :
                                $kreeti_count = 1;
                                while ($kreeti_featured_posts->have_posts()) :
                                    $kreeti_featured_posts->the_post();
                                    global $post;
                                    
                                    $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-slider-full');
                                    
                                    $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    
                                    ?>
                                    <div class="slick-item pad">
                                        <div class="aft-trending-posts list-part af-sec-post">
                                            <div class="af-double-column list-style clearfix">
                                                <div class="read-single color-pad">
                                                    <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                                         data-background="<?php echo esc_url($kreeti_img_url); ?>">
                                                        <a class="aft-post-image-link"
                                                           href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        <?php if (!empty($kreeti_img_url)): ?>
                                                            <img src="<?php echo esc_url($kreeti_img_url); ?>"
                                                                 alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_img_thumb_id)); ?>">
                                                        <?php endif; ?>
                                                        <span class="trending-no">
                                                <?php echo esc_html($kreeti_count); ?>
                                        </span>
                                                    </div>
                                                    <div class="col-75 read-details float-l pad color-tp-pad">
                                                        <div class="read-categories">
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
                <?php echo $args['after_widget'];
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
                
                

                $trending_news_filterby = array(
                    'cat'=>"Category",
                    'tag'=>"Tag"
                );

                $categories = kreeti_get_terms();
                
                echo parent::kreeti_generate_text_input('kreeti-trending-news-title', __('Title', 'kreeti-lite'), 'Trending News');
                echo parent::kreeti_generate_select_options('kreeti-news_filter-by', __('Filter Posts By', 'kreeti-lite'), $trending_news_filterby);
                echo parent::kreeti_generate_select_options('kreeti-select-category', __('Select Category', 'kreeti-lite'), $categories);

            }
            
        }
    
    endif;