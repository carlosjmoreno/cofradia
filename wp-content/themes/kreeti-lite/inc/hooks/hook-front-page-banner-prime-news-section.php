<?php

if (!function_exists('kreeti_lite_prime_news_section')):
    /**
     * Ticker Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_prime_news_section()
    {
        $kreeti_lite_prime_news = kreeti_lite_get_option('show_prime_news');
        $kreeti_lite_prime_news_layout = kreeti_lite_get_option('select_prime_news_layout_section_mode');
        if ($kreeti_lite_prime_news) {
            $kreeti_lite_prime_news_section_title = kreeti_lite_get_option('frontpage_prime_news_section_title');
            ?>
            <section class="aft-blocks af-main-banner-prime-news kreeti-customizer <?php echo esc_attr($prime_news_layout); ?>">
                <div class="container-wrapper">
                    <div class="widget-title-section">
                        <?php if (!empty($kreeti_lite_prime_news_section_title)): ?>
                            <h4 class="widget-title header-after1">
                                <span class="heading-line-before"></span>
                                <?php echo esc_html($kreeti_lite_prime_news_section_title); ?>
                                <span class="heading-line-after"></span>
                            </h4>
                        <?php endif; ?>
                    </div>


                    <?php

                    $kreeti_lite_posts_filter_by = kreeti_lite_get_option('select_prime_news_filterby');
                    $kreeti_lite_no_of_post = kreeti_lite_get_option('number_of_prime_news');

                    if ($kreeti_lite_posts_filter_by == 'tag') {
                        $kreeti_lite_prime_news_category = kreeti_lite_get_option('select_prime_news_tag');
                        $kreeti_lite_filterby = 'tag';
                    } else {

                        $kreeti_lite_prime_news_category = kreeti_lite_get_option('select_prime_news_category');
                        $kreeti_lite_filterby = 'cat';
                    }

                    $kreeti_lite_number_of_posts = 1;
                    if ($kreeti_lite_no_of_post) {
                        $kreeti_lite_number_of_posts = $kreeti_lite_no_of_post;
                    }
                    $kreeti_lite_featured_posts = kreeti_lite_get_posts($kreeti_lite_number_of_posts, $kreeti_lite_prime_news_category, $kreeti_lite_filterby);
                    if ($kreeti_lite_featured_posts->have_posts()) :

                        while ($kreeti_lite_featured_posts->have_posts()) :
                            $kreeti_lite_featured_posts->the_post();
                            global $post;

                            $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-slider-full');

                            $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                            $kreeti_lite_hide_featured_image = kreeti_lite_get_option('hide_prime_news_featured_image');
                            $kreeti_lite_class = '';
                            if ($kreeti_lite_hide_featured_image) {
                                $kreeti_lite_class = 'no-featured-image';
                            }
                            ?>
                            <div class="af-sec-post <?php echo esc_html($kreeti_lite_class); ?>">
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

                                        <?php if ($kreeti_lite_hide_featured_image != true): ?>
                                            <div class="col-2 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                                 data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                                <a class="aft-post-image-link"
                                                   href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <?php

                                                    if (!empty($kreeti_lite_img_url)): ?>
                                                        <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                                             alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
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
                </div>
            </section>
            <!-- Prime news END -->
            <?php
        }

    }
endif;
add_action('kreeti_lite_action_prime_news_section', 'kreeti_lite_prime_news_section', 10);