<?php
if (!function_exists('kreeti_lite_banner_exclusive_posts')):
    /**
     * Ticker Slider
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_banner_exclusive_posts()  {



        if ( false != kreeti_lite_get_option('show_popular_tags_section')) : ?>
            <div class="aft-popular-tags">
                <div class="container-wrapper">
                    <?php

                    $kreeti_lite_show_popular_tags_title = kreeti_lite_get_option('frontpage_popular_tags_section_title');
                    $kreeti_lite_select_popular_tags_mode = kreeti_lite_get_option('select_popular_tags_mode');
                    $kreeti_lite_number_of_popular_tags = kreeti_lite_get_option('number_of_popular_tags');


                    kreeti_lite_list_popular_taxonomies($kreeti_lite_select_popular_tags_mode, $kreeti_lite_show_popular_tags_title, $kreeti_lite_number_of_popular_tags);


                    ?>
                </div>
            </div>
        <?php endif;



        ?>
        <?php if (false != kreeti_lite_get_option('show_flash_news_section')) :
		    
            $kreeti_lite_em_ticker_news_mode = 'aft-flash-slide left';
            $kreeti_lite_dir = 'left';
            if(is_rtl()){
                $kreeti_lite_em_ticker_news_mode = 'aft-flash-slide right';
                $kreeti_lite_dir = 'right';
		    }
            ?>
            <div class="banner-exclusive-posts-wrapper">

                <?php
                $kreeti_lite_categories = kreeti_lite_get_option('select_flash_news_category');
                $kreeti_lite_number_of_posts = kreeti_lite_get_option('number_of_flash_news');
                $kreeti_lite_em_ticker_news_title = kreeti_lite_get_option('flash_news_title');

                $kreeti_lite_all_posts = kreeti_lite_get_posts($kreeti_lite_number_of_posts, $kreeti_lite_categories);
                $kreeti_lite_show_trending = true;
                $kreeti_lite_count = 1;
                ?>

                <div class="container-wrapper">
                    <div class="exclusive-posts">
                        <div class="exclusive-now primary-color">
                            <div class="aft-ripple">
                                <div></div>
                                <div></div>
                            </div>
                            <?php if (!empty($kreeti_lite_em_ticker_news_title)): ?>
                                <span><?php echo esc_html($kreeti_lite_em_ticker_news_title); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="exclusive-slides" dir="ltr">
                            <?php
                            if ($kreeti_lite_all_posts->have_posts()) : ?>
                            <div class='marquee <?php echo esc_attr($kreeti_lite_em_ticker_news_mode); ?>' data-speed='80000'
                                 data-gap='0' data-duplicated='true' data-direction="<?php echo esc_attr($kreeti_lite_dir); ?>" >
                                <?php
                                while ($kreeti_lite_all_posts->have_posts()) : $kreeti_lite_all_posts->the_post();
                                    global $post;
                                    $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'thumbnail');
                                    $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($kreeti_lite_show_trending == true): ?>

                                        <?php endif; ?>

                                        <span class="circle-marq">
                                            <span class="trending-no">
                                                <?php echo esc_html( $kreeti_lite_count); ?>
                                            </span>
                                            <?php if ($kreeti_lite_img_url) { ?>
                                                <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                                     alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                            <?php } ?>
                                    </span>

                                        <?php the_title(); ?>
                                    </a>
                                    <?php
                                    $kreeti_lite_count++;
                                endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluive line END -->
            <?php

        endif;
    }
endif;

add_action('kreeti_lite_action_banner_exclusive_posts', 'kreeti_lite_banner_exclusive_posts', 10);