<?php

if (!function_exists('kreeti_lite_front_page_widgets_section')) :
    /**
     *
     * @param null
     * @return null
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_front_page_widgets_section()
    {
        $frontpage_layout = kreeti_lite_get_option('frontpage_content_alignment');

        ?>

        <section class="section-block-upper">
                <?php if (is_active_sidebar('home-content-widgets')): ?>

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php dynamic_sidebar('home-content-widgets'); ?>
                        </main>
                    </div>

                <?php endif; ?>

                <?php if (is_active_sidebar('home-sidebar-widgets') && $frontpage_layout != 'full-width-content'): ?>

                    <?php
                    $sticky_sidebar_class = '';
                    $sticky_sidebar = kreeti_lite_get_option('frontpage_sticky_sidebar');
                    if ($sticky_sidebar) {
                        $sticky_sidebar_class = kreeti_lite_get_option('frontpage_sticky_sidebar_position');
                    }
                    ?>


                    <div id="secondary" class="sidebar-area <?php echo esc_attr($sticky_sidebar_class); ?>">
                        <aside class="widget-area color-pad">
                                <?php dynamic_sidebar('home-sidebar-widgets'); ?>
                        </aside>
                    </div>
                <?php endif; ?>
        </section>

        <?php
    }
endif;
add_action('kreeti_front_page_section', 'kreeti_lite_front_page_widgets_section', 50);