<div class="af-main-banner-thumb-posts">
    <div class="section-wrapper">
        <div class="small-grid-style clearfix">
            <?php
                

            $kreeti_lite_editors_pick_category = kreeti_lite_get_option('select_editors_picks_news_category');
            $kreeti_lite_filterby = 'cat';
                $kreeti_lite_featured_posts = kreeti_lite_get_posts(3, $kreeti_lite_editors_pick_category, $kreeti_lite_filterby);
                if ($kreeti_lite_featured_posts->have_posts()) :
                    $kreeti_lite_count = 1;
                    while ($kreeti_lite_featured_posts->have_posts()) :
                        $kreeti_lite_featured_posts->the_post();
                        global $post;
                        $kreeti_lite_first_section_class = '';
                        if ($kreeti_lite_count == 1) {
                            $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                            $kreeti_lite_first_section_class = 'af-cat-widget-carousel';
                        } else {
                            
                            $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                        }
                        $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                        ?>
                        <div class="af-sec-post">
                            <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_lite_first_section_class); ?>">
                                <div class="col-40 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                     data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                    <a class="aft-post-image-link"
                                       href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php if (!empty($kreeti_lite_img_url)): ?>
                                        <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                             alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                    <?php endif; ?>
                                    <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                </div>
                                <div class="col-1 pad float-l read-details color-tp-pad">
                                    <div class="post-format-and-min-read-wrap">
                                        <?php kreeti_lite_post_format($post->ID); ?>
                                        <?php kreeti_lite_count_content_words($post->ID); ?>
                                    </div>
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
                        $kreeti_lite_count++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
        </div>
    </div>
</div>
<!-- Editors Pick line END -->
