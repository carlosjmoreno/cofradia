<?php
    $kreeti_show_in_frontpage = kreeti_lite_get_option('show_sidebar_trending_post_in_frontpage');
    $kreeti_show_in_archive = kreeti_lite_get_option('show_sidebar_trending_post_in_archive');
    $kreeti_show_in_single = kreeti_lite_get_option('show_sidebar_trending_post_in_single');

    if ($kreeti_show_in_frontpage == false) {
        if (is_front_page() || is_home()) {
            return;
        }
    }

    if ($kreeti_show_in_archive == false) {
        if (is_archive()) {
            return;
        }
    }

    if ($kreeti_show_in_single == false) {
        if (is_single()) {
            return;
        }
    }



    $kreeti_editors_pick_category = kreeti_lite_get_option('select_sidebar_trending_post_category');
    $kreeti_filterby = 'cat';

    $kreeti_all_posts_vertical = kreeti_lite_get_posts(5, $kreeti_editors_pick_category, $kreeti_filterby);

?>

<div class="full-wid-resp widget kreeti-widget">
    <?php
        $kreeti_trending_posts_title = kreeti_lite_get_option('sidebar_trending_post_title');
        if (!empty($kreeti_trending_posts_title)) { ?>
            <h4 class="trending-title widget-title header-after1">
                <span class="heading-line-before"></span>
                <?php echo esc_html($kreeti_trending_posts_title); ?>
                <span class="heading-line-after"></span>
            </h4>
        <?php }
    ?>
    <div class="slick-wrapper banner-vertical-slider af-widget-carousel">
        <?php
            $kreeti_count = 1;
            if ($kreeti_all_posts_vertical->have_posts()) :
                while ($kreeti_all_posts_vertical->have_posts()) : $kreeti_all_posts_vertical->the_post();
                    global $post;
                    $kreeti_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                    $kreeti_img_thumb_id = get_post_thumbnail_id($post->ID);
                    ?>
                    <div class="slick-item">
                        <div class="aft-trending-posts list-part af-sec-post">
                            <div class="af-double-column list-style clearfix">
                                <div class="read-single color-pad">
                                    <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                         data-background="<?php echo esc_url($kreeti_img_url); ?>">
                                        <a class="aft-post-image-link"
                                           href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <?php if (!empty($kreeti_img_url)): ?>
                                            <img src="<?php echo esc_url($kreeti_img_url); ?>"
                                                 alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_img_thumb_id)); ?>">
                                        <?php endif; ?>
                                        <span class="trending-no">
                                                <?php echo esc_html($kreeti_count); ?>
                                        </span>
                                    </div>
                                    <div class="col-75 read-details float-l pad color-tp-pad">
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
                        </div>
                    </div>
                    <?php
                    $kreeti_count++;
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
</div>
