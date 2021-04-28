<?php
if (!class_exists('Kreeti_Social_Contacts')) :
    /**
     * Adds Kreeti_Social_Contacts widget.
     */
    class Kreeti_Social_Contacts extends Kreeti_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('kreeti-social-contacts-title');
            $this->select_fields = array('kreeti-select-background', 'kreeti-select-background-type');

            $widget_ops = array(
                'classname' => 'kreeti_social_contacts_widget aft-widget',
                'description' => __('Displays social contacts lists from selected settings.', 'kreeti-lite'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('kreeti_social_contacts', __('AFTK Social Contacts', 'kreeti-lite'), $widget_ops);
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
            $kreeti_section_title = apply_filters('widget_title', $instance['kreeti-social-contacts-title'], $instance, $this->id_base);
            $kreeti_section_title = isset($kreeti_section_title) ? $kreeti_section_title : __('Connect with Us', 'kreeti-lite');
            
            
            // open the widget container
            echo $args['before_widget'];
            ?>
                <div  class="widget-social-contancts-area af-social-contacts pad-v">


                    <?php
                        if (!empty($kreeti_section_title)) { ?>
                            <div class="af-title-subtitle-wrap">
                                <h4 class="trending-title widget-title header-after1">
                                    <span class="heading-line-before"></span>
                                    <?php echo esc_html($kreeti_section_title); ?>
                                    <span class="heading-line-after"></span>
                                </h4>
                            </div>
                        <?php }
                    ?>
                    <div class="social-widget-menu af-widget-body">
                        <?php
                            if (has_nav_menu('aft-social-nav')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-social-nav',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                ));
                            } ?>
                    </div>
                    <?php if (!has_nav_menu('aft-social-nav')) : ?>
                        <p>
                            <?php esc_html_e('Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'kreeti-lite'); ?>
                        </p>
                    <?php endif; ?>

                </div>

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



            // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
            echo parent::kreeti_generate_text_input('kreeti-social-contacts-title', 'Title', 'Connect with Us');


        }


    }
endif;