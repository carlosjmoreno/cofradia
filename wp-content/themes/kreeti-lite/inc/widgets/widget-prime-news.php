<?php
    
    if (!class_exists('Kreeti_Prime_News')) :
        /**
         * Adds Kreeti_Prime_News widget.
         */
        class Kreeti_Prime_News extends Kreeti_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array(
                    'kreeti-prime-news-title',
                    'kreeti-number-of-posts',
        
                );
                $this->select_fields = array(
            
                    'kreeti-prime-news-layout',
                    'kreeti-news_filter-by',
                    'kreeti-select-category',
                    'kreeti-hide-featured-image'
        
                );
        
                $widget_ops = array(
                    'classname' => 'kreeti_prime_news_widget',
                    'description' => __('Displays grid from selected categories.', 'kreeti-lite'),
                    'customize_selective_refresh' => false,
                );
        
                parent::__construct('kreeti_prime_news', __('AFTK Prime News', 'kreeti-lite'), $widget_ops);
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
    
                    $kreeti_prime_news_section_title = apply_filters('widget_title', $instance['kreeti-prime-news-title'], $instance, $this->id_base);
    
                    $kreeti_no_of_post = 1;
                    $kreeti_prime_news_category = !empty($instance['kreeti-select-category']) ? $instance['kreeti-select-category'] : '0';

                    $prime_news_layout = 'layout-1';
                    $kreeti_hide_featured_image = !empty($instance['kreeti-hide-featured-image']) ? $instance['kreeti-hide-featured-image'] : 'yes';
    
                    // open the widget container
                    echo $args['before_widget'];?>
    
                    <section class="aft-blocks af-main-banner-prime-news kreeti-customizer pad-v <?php echo esc_attr($prime_news_layout); ?>">
                        <?php if (!empty($kreeti_prime_news_section_title)): ?>
                            <div class="af-title-subtitle-wrap">
                                <h4 class="widget-title header-after1">
                                    <span class="heading-line-before"></span>
                                    <?php echo esc_html($kreeti_prime_news_section_title); ?>
                                    <span class="heading-line-after"></span>
                                </h4>
                            </div>
                        <?php endif; ?>
        
                        <?php

            
                            $kreeti_number_of_posts = 1;
                            if ($kreeti_no_of_post) {
                                $kreeti_number_of_posts = $kreeti_no_of_post;
                            }
                            $kreeti_featured_posts = kreeti_lite_get_posts($kreeti_number_of_posts, $kreeti_prime_news_category, 'cat');
                            if ($kreeti_featured_posts->have_posts()) :
                
                                while ($kreeti_featured_posts->have_posts()) :
                                    $kreeti_featured_posts->the_post();
                                    global $post;
                    
                                    $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-slider-full');
                    
                                    $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    
                                    $kreeti_class = '';
                                    if ($kreeti_hide_featured_image) {
                                        $kreeti_class = 'no-featured-image';
                                    }
                                    ?>
                                    <div class="af-sec-post af-widget-body <?php echo esc_html($kreeti_class); ?>">
                                        <div class="read-single clearfix">
                                            <div class="col-1 pad read-details marg-btm-lr">
                                                <div class="read-title">
                                                    <h2>
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                </div>
                                
                                                <div class="entry-meta">
                                                    <?php kreeti_lite_post_item_meta(); ?>
                                                    <?php kreeti_lite_get_comments_views_share($post->ID); ?>
                                                </div>
                                            </div>
                                            <div class="prime-img-desp clearfix">
                                
                                                <?php if ($kreeti_hide_featured_image != 'yes'): ?>
                                                    <div class="col-2 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                                            data-background="<?php echo esc_url($kreeti_img_url); ?>">
                                                        <a class="aft-post-image-link"
                                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        <?php
                                            
                                                            if (!empty($kreeti_img_url)): ?>
                                                                <img src="<?php echo esc_url($kreeti_img_url); ?>"
                                                                        alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_img_thumb_id)); ?>">
                                                            <?php endif;
                                                        ?>
                                                        <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                                    </div>
                                                <?php endif; ?>
                                
                                                <div class="col-2 pad float-l read-descprition full-item-discription">
                                                    <div class="prime-category-and-discription">
                                                        <div class="post-format-and-min-read-wrap">
                                                            <?php kreeti_lite_post_format($post->ID); ?>
                                                            <?php kreeti_lite_count_content_words($post->ID); ?>
                                                        </div>
                                                        <div class="read-categories">
                                                            <?php kreeti_lite_post_categories(); ?>
                                                        </div>
                                                        <div class="post-description">
                                                            <?php
                                                
                                                                echo wp_kses_post(kreeti_lite_get_the_excerpt($post->ID));
                                            
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            <?php endif; ?>
                    </section>
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
    

                $featured_image = array(
                    'yes'=>'Yes',
                    'no'=>'No'
                );
                $categories = kreeti_get_terms();
    
                echo parent::kreeti_generate_text_input('kreeti-prime-news-title', __('Title', 'kreeti-lite'), 'Prime News');
                echo parent::kreeti_generate_select_options('kreeti-select-category', __('Select Category', 'kreeti-lite'), $categories);
                echo parent::kreeti_generate_select_options('kreeti-hide-featured-image', __('Hide Prime News Featured Image', 'kreeti-lite'), $featured_image);

            }
                
        }
        
        endif;