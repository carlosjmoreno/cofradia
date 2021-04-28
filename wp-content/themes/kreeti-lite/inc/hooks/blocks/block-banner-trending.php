<?php

$kreeti_lite_editors_pick_category = kreeti_lite_get_option('select_trending_post_category');
$kreeti_lite_filterby = 'cat';
$kreeti_lite_trending_post_number_of_slides = 5;
$kreeti_lite_all_posts_vertical = kreeti_lite_get_posts($kreeti_lite_trending_post_number_of_slides, $kreeti_lite_editors_pick_category, $kreeti_lite_filterby);

?>
<div class="full-wid-resp">
    <div class="slick-wrapper banner-vertical-slider af-widget-carousel">
        <?php
        $kreeti_lite_count = 1;
        if ($kreeti_lite_all_posts_vertical->have_posts()) :
            while ($kreeti_lite_all_posts_vertical->have_posts()) : $kreeti_lite_all_posts_vertical->the_post();

                global $post;
                $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                ?>
                <div class="slick-item">
                    <div class="aft-trending-posts list-part af-sec-post">
                        <div class="af-double-column list-style clearfix">
                            <div class="read-single color-pad">
                                <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                     data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                    <a class="aft-post-image-link"
                                       href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php if (!empty($kreeti_lite_img_url)): ?>
                                        <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                             alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                    <?php endif; ?>
                                    <span class="trending-no">
                                                <?php echo esc_html($kreeti_lite_count); ?>
                                            </span>
                                </div>

                                <div class="col-75 read-details float-l pad color-tp-pad">

                                    <div class="read-title">
                                        <h4>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $kreeti_lite_count++;
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>
