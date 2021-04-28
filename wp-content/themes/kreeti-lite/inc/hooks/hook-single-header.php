<?php
if (!function_exists('kreeti_lite_single_header')) :
    /**
     * Banner Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_single_header()
    {
        global $post;
        $kreeti_lite_post_id = $post->ID;
        ?>
        <header class="entry-header pos-rel">
            <div class="read-details">
                <div class="entry-header-details af-cat-widget-carousel">
                    <?php if ('post' === get_post_type()) : ?>

                        <div class="figure-categories read-categories figure-categories-bg ">
                            <?php kreeti_lite_post_format($post->ID); ?>
                            <?php kreeti_lite_post_categories(); ?>
                        </div>
                    <?php endif; ?>
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                    <?php if (is_active_sidebar('single-below-posts-title-advertisement-widgets')): ?>
                        <div class="single-posts-promotions">
                            <?php dynamic_sidebar('single-below-posts-title-advertisement-widgets'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="aft-post-excerpt-and-meta color-pad">
                        <?php if ('post' === get_post_type($kreeti_lite_post_id)) :
                            if (has_excerpt($kreeti_lite_post_id)):

                                ?>
                                <div class="post-excerpt">
                                    <?php echo wp_kses_post(get_the_excerpt($post->ID)); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="entry-meta">

                            <?php kreeti_lite_post_item_meta(); ?>
                            <?php kreeti_lite_count_content_words($post->ID); ?>
                            <?php kreeti_lite_single_post_commtents_view($post->ID); ?>
                            <?php
                            $kreeti_lite_social_share_icon_opt = kreeti_lite_get_option('single_post_social_share_view');
                            if($kreeti_lite_social_share_icon_opt == 'after-title-default'){
                                kreeti_lite_single_post_social_share_icons($post->ID);
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>



        </header><!-- .entry-header -->




        <!-- end slider-section -->
        <?php
    }
endif;
add_action('kreeti_lite_action_single_header', 'kreeti_lite_single_header', 40);