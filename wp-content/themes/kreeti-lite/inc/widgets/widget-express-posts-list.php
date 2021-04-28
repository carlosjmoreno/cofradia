<?php
if (!class_exists('Kreeti_Express_Posts_List')) :
    /**
     * Adds Kreeti_Express_Posts_List widget.
     */
    class Kreeti_Express_Posts_List extends Kreeti_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'kreeti-express-posts-section-title',
                'kreeti-number-of-posts',
                
            );
            $this->select_fields = array(

                'kreeti-select-category',
                
            );

            $widget_ops = array(
                'classname' => 'kreeti_express_posts_list_widget',
                'description' => __('Displays Express Posts from selected categories.', 'kreeti-lite'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('kreeti_express_posts_list', __('AFTK Express Posts List', 'kreeti-lite'), $widget_ops);
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
    
            $kreeti_express_section_title = apply_filters('widget_title', $instance['kreeti-express-posts-section-title'], $instance, $this->id_base);
            $kreeti_express_section_title = $kreeti_express_section_title?$kreeti_express_section_title:"Express Post";
    
            $kreeti_no_of_post = 5;
            $kreeti_category = !empty($instance['kreeti-select-category']) ? $instance['kreeti-select-category'] : '0';
            $kreeti_show_excerpt = 'archive-content-excerpt';


            // open the widget container
            echo $args['before_widget'];
            ?>
                <section class="aft-blocks aft-featured-category-section af-list-post featured-cate-sec pad-v">
                    <?php $kreeti_featured_express_posts_one = kreeti_lite_get_posts($kreeti_no_of_post, $kreeti_category); ?>

                    <div class="af-main-banner-categorized-posts express-posts layout-1">
                        <div class="section-wrapper clearfix">
                            <div class="small-grid-style clearfix">
                                <?php
                
                                    if ($kreeti_featured_express_posts_one->have_posts()) :
                                        ?>
                                        <?php if (!empty($kreeti_express_section_title)): ?>
                                            <div class="af-title-subtitle-wrap">
                                                <h4 class="widget-title header-after1 ">
                                                    <span class="heading-line-before"></span>
                                                    <?php echo esc_html($kreeti_express_section_title); ?>
                                                    <span class="heading-line-after"></span>
                                                </h4>
                                            </div>
                                        <?php endif; ?>
                                        <div class="featured-post-items-wrap clearfix af-container-row af-widget-body">
                                            <?php
                                                $kreeti_count = 1;
                                                while ($kreeti_featured_express_posts_one->have_posts()) :
                                                    $kreeti_featured_express_posts_one->the_post();
                                                    global $post;
                                                    $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                                                    $kreeti_first_section_class = '';
                                                    if ($kreeti_count == 1):
                                                        $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                                                        ?>
                                                        <div class="col-2 pad float-l af-sec-post">
                                                            <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_first_section_class); ?>">
                                                                <div class="read-img pos-rel read-img read-bg-img data-bg"
                                                                        data-background="<?php echo esc_url($kreeti_img_url); ?>">
                                                                    <a class="aft-post-image-link"
                                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                    <?php if (!empty($kreeti_img_url)): ?>
                                                                        <img src="<?php echo esc_url($kreeti_img_url); ?>"
                                                                                alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_img_thumb_id)); ?>">
                                                                    <?php endif; ?>
                                                                    <?php kreeti_lite_post_format($post->ID); ?>
                                                                    <?php kreeti_lite_count_content_words($post->ID); ?>
                                                                    <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                                                </div>
                                                                <div class="read-details pad ptb-10">
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
                                                                    <div class="post-description">
                                                                        <?php
                                                                            if ($kreeti_show_excerpt == 'archive-content-excerpt') {
                                                                                echo wp_kses_post(kreeti_lite_get_the_excerpt($post->ID));
                                                                            } else {
                                                                                the_content();
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php else:
                                                        $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                                    
                                                        ?>
                                                        <div class="col-2 pad float-l list-part af-sec-post">
                                                            <div class="af-double-column list-style clearfix">
                                                                <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_first_section_class); ?>">
                                                                    <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
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
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php
                                                    $kreeti_count++;
                                                endwhile;
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    <?php endif;
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


            //print_pre($terms);
            $categories = kreeti_get_terms();
            


            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::kreeti_generate_text_input('kreeti-express-posts-section-title', __('Title', 'kreeti-lite'), 'Express Posts List');
                echo parent::kreeti_generate_select_options('kreeti-select-category', __('Select Category', 'kreeti-lite'), $categories);


            }

            //print_pre($terms);


        }

    }
endif;