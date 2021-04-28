<?php
if (!function_exists('kreeti_lite_banner_featured_posts')):
    /**
     * Ticker Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_banner_featured_posts()
    {

        $kreeti_lite_enable_featured_news = kreeti_lite_get_option('show_featured_posts_section');

        if ($kreeti_lite_enable_featured_news):
            $kreeti_lite_featured_news_title = kreeti_lite_get_option('featured_news_section_title');
            ?>
            <div class="af-main-banner-featured-posts featured-posts kreeti-customizer">
                <div class="af-title-subtitle-wrap">
                <?php if (!empty($kreeti_lite_featured_news_title)): ?>
                    <h4 class="widget-title header-after1 ">
                        <span class="heading-line-before"></span>
                                    <?php echo esc_html($kreeti_lite_featured_news_title); ?>
                        <span class="heading-line-after"></span>
                    </h4>
                <?php endif; ?>
                </div>


                <div class="section-wrapper af-widget-body">
                    <div class="af-container-row clearfix">
                        <?php
                        $kreeti_lite_featured_category = kreeti_lite_get_option('select_featured_news_category');
                        $kreeti_lite_number_of_featured_news = kreeti_lite_get_option('number_of_featured_news');
                        $kreeti_lite_featured_posts = kreeti_lite_get_posts($kreeti_lite_number_of_featured_news, $kreeti_lite_featured_category);
                        if ($kreeti_lite_featured_posts->have_posts()) :
                            while ($kreeti_lite_featured_posts->have_posts()) :
                                $kreeti_lite_featured_posts->the_post();

                                global $post;
                                $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                                $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                                ?>

                                <div class="col-4 pad float-l " data-mh="af-feat-list">
                                    <div class="read-single color-pad">
                                        <div class="data-bg read-img pos-rel read-bg-img"
                                             data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                            <img src="<?php echo esc_url($kreeti_lite_img_url); ?>" alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id));?>">
                                            <a class="aft-post-image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <?php kreeti_lite_post_format($post->ID); ?>
                                            <?php kreeti_lite_count_content_words($post->ID);   ?>
                                            <?php kreeti_lite_archive_social_share_icons($post->ID); ?>

                                        </div>
                                        <div class="read-details color-tp-pad pad ptb-10">

                                            <div class="read-categories">
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

                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <!-- Trending line END -->
        <?php

    }
endif;

add_action('kreeti_lite_action_banner_featured_posts', 'kreeti_lite_banner_featured_posts', 10);