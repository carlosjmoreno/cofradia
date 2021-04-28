<?php
    if (!class_exists('Kreeti_author_info')) :
        /**
         * Adds Kreeti_author_info widget.
         */
        class Kreeti_author_info extends Kreeti_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array('kreeti-author-info-title', 'kreeti-author-info-subtitle', 'kreeti-author-info-image', 'kreeti-author-info-name', 'kreeti-author-info-desc', 'kreeti-author-info-phone', 'kreeti-author-info-email');
                $this->url_fields = array('kreeti-author-info-facebook', 'kreeti-author-info-twitter', 'kreeti-author-info-linkedin', 'kreeti-author-info-instagram', 'kreeti-author-info-vk', 'kreeti-author-info-youtube');
                
                $widget_ops = array(
                    'classname' => 'kreeti_author_info_widget aft-widget',
                    'description' => __('Displays author info.', 'kreeti-lite'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('kreeti_author_info', __('AFTK Author Info', 'kreeti-lite'), $widget_ops);
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
    
                $kreeti_featured_news_title = apply_filters('widget_title', $instance['kreeti-author-info-title'], $instance, $this->id_base);
               
                
                $profile_image = isset($instance['kreeti-author-info-image']) ? ($instance['kreeti-author-info-image']) : '';
                
                if ($profile_image) {
                    $image_attributes = wp_get_attachment_image_src($profile_image, 'large');
                    $image_src = $image_attributes[0];
                    $image_class = 'data-bg data-bg-hover';
                    
                } else {
                    $image_src = '';
                    $image_class = 'no-bg';
                }
                
                $name = isset($instance['kreeti-author-info-name']) ? ($instance['kreeti-author-info-name']) : '';
                
                $desc = isset($instance['kreeti-author-info-desc']) ? ($instance['kreeti-author-info-desc']) : '';
                $facebook = isset($instance['kreeti-author-info-facebook']) ? ($instance['kreeti-author-info-facebook']) : '';
                $twitter = isset($instance['kreeti-author-info-twitter']) ? ($instance['kreeti-author-info-twitter']) : '';
                $instagram = isset($instance['kreeti-author-info-instagram']) ? ($instance['kreeti-author-info-instagram']) : '';
                
                echo $args['before_widget'];
                ?>
                <section class="aft-blocks af-author-info pad-v">
                    <div class="af-author-info-wrap">
                        <?php if (!empty($kreeti_featured_news_title)): ?>
                            <div class="af-title-subtitle-wrap">
                                <h4 class="widget-title header-after1 ">
                                    <span class="heading-line-before"></span>
                                    <?php echo esc_html($kreeti_featured_news_title); ?>
                                    <span class="heading-line-after"></span>
                                </h4>
                            </div>
                        <?php endif; ?>
                    <div class="widget-block widget-wrapper af-widget-body">
                        <div class="posts-author-wrapper">
                            
                            <?php if (!empty($image_src)) : ?>


                                <figure class="read-img af-author-img">
                                    <img src="<?php echo esc_attr($image_src); ?>" alt=""/>
                                </figure>
                            
                            <?php endif; ?>
                            <div class="af-author-details">
                                <?php if (!empty($name)) : ?>
                                    <h4 class="af-author-display-name"><?php echo esc_html($name); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($desc)) : ?>
                                    <p class="af-author-display-name"><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                                
                                <?php if (!empty($facebook) || !empty($twitter) || !empty($linkedin) || !empty($youtube) || !empty($instagram) || !empty($vk)) : ?>
                                    <div class="social-navigation aft-small-social-menu">
                                        <ul>
                                            <?php if (!empty($facebook)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($facebook); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($instagram)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($instagram); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($twitter)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>


                                        </ul>
                                    </div>
                                <?php endif; ?>
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
                    echo parent::kreeti_generate_text_input('kreeti-author-info-title', __('About Author', 'kreeti-lite'), __('Title', 'kreeti-lite'));
                    
                    echo parent::kreeti_generate_image_upload('kreeti-author-info-image', __('Profile image', 'kreeti-lite'), __('Profile image', 'kreeti-lite'));
                    echo parent::kreeti_generate_text_input('kreeti-author-info-name', __('Name', 'kreeti-lite'), __('Name', 'kreeti-lite'));
                    echo parent::kreeti_generate_text_input('kreeti-author-info-desc', __('Descriptions', 'kreeti-lite'), '');
                    echo parent::kreeti_generate_text_input('kreeti-author-info-facebook', __('Facebook', 'kreeti-lite'), '');
                    echo parent::kreeti_generate_text_input('kreeti-author-info-instagram', __('Instagram', 'kreeti-lite'), '');
                    echo parent::kreeti_generate_text_input('kreeti-author-info-twitter', __('Twitter', 'kreeti-lite'), '');
                    
                    
                    
                }
            }
        }
    endif;