<?php
if (!class_exists('Kreeti_Posts_lists')) :
    /**
     * Adds Kreeti_Posts_lists widget.
     */
    class Kreeti_Posts_lists extends Kreeti_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'kreeti-posts-list-title',
                'kreeti-posts-slider-number'
                
            );
            $this->select_fields = array(

                'kreeti-select-category',
                
            );

            $widget_ops = array(
                'classname' => 'kreeti_posts_lists_widget',
                'description' => __('Displays grid from selected categories.', 'kreeti-lite'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('kreeti_posts_list', __('AFTK Post List', 'kreeti-lite'), $widget_ops);
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

            $title_1 = apply_filters('widget_title', $instance['kreeti-posts-list-title'], $instance, $this->id_base);
    
            $kreeti_no_of_post = 6;
            $category_1 = !empty($instance['kreeti-select-category']) ? $instance['kreeti-select-category'] : '0';
            




            // open the widget container
            echo $args['before_widget'];
            ?>
                <section class="aft-blocks aft-featured-category-section af-list-post featured-cate-sec pad-v">
                    <?php if (!empty($title_1)): ?>
                        <div class="af-title-subtitle-wrap">
                            <h4 class="widget-title header-after1 ">
                                <span class="heading-line-before"></span>
                                <?php echo esc_html($title_1); ?>
                                <span class="heading-line-after"></span>
                            </h4>
                        </div>
                    <?php endif; ?>
                    <?php $kreeti_all_posts_vertical = kreeti_lite_get_posts($kreeti_no_of_post, $category_1); ?>

                    <div class="full-wid-resp af-widget-body af-container-row clearfix">
                        <?php
                            if ($kreeti_all_posts_vertical->have_posts()) :
                                while ($kreeti_all_posts_vertical->have_posts()) : $kreeti_all_posts_vertical->the_post();
                                    global $post;
                                    $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                                    $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    ?>
                                    <div class="af-double-column list-style pad float-l col-3">
                                        <div class="read-single color-pad">
                                            <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                                data-background="<?php echo esc_url($kreeti_img_url); ?>">
                                                <a class="aft-post-image-link"
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <?php if (!empty($kreeti_img_url)): ?>
                                                    <img src="<?php echo esc_url($kreeti_img_url); ?>"
                                                        alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_img_thumb_id)); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-75 pad float-l read-details color-tp-pad">
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
                                <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
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
                echo parent::kreeti_generate_text_input('kreeti-posts-list-title', __('Title', 'kreeti-lite'), 'Posts List');
                echo parent::kreeti_generate_select_options('kreeti-select-category', __('Select Category', 'kreeti-lite'), $categories);


            }

            //print_pre($terms);


        }

    }
endif;