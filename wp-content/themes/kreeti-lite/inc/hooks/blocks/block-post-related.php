<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package Kreeti
     */
?>

<div class="promotionspace enable-promotionspace">
    <div class="af-reated-posts kreeti-customizer">
        <?php
            global $post;
            $kreeti_lite_categories = get_the_category($post->ID);
            $kreeti_lite_related_section_title = esc_attr(kreeti_lite_get_option('single_related_posts_title'));
            $kreeti_lite_number_of_related_posts = esc_attr(kreeti_lite_get_option('single_number_of_related_posts'));
            
            if ($kreeti_lite_categories) {
            $kreeti_lite_cat_ids = array();
            foreach ($kreeti_lite_categories as $kreeti_lite_category) $kreeti_lite_cat_ids[] = $kreeti_lite_category->term_id;
            $kreeti_lite_args = array(
                'category__in' => $kreeti_lite_cat_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $kreeti_lite_number_of_related_posts, // Number of related posts to display.
                'ignore_sticky_posts' => 1
            );
            $kreeti_lite_related_posts = new wp_query($kreeti_lite_args);
            
            if (!empty($kreeti_lite_related_posts)) { ?>
                <h4 class="related-title widget-title header-after1">
                    <span class="heading-line-before"></span>
                    <?php echo esc_html($kreeti_lite_related_section_title); ?>
                    <span class="heading-line-after"></span>
                </h4>
            <?php }
        ?>
        <div class="af-container-row clearfix">
            <?php
                while ($kreeti_lite_related_posts->have_posts()) {
                    $kreeti_lite_related_posts->the_post();
                    global $post;
                    $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                    $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                    if (!empty($kreeti_lite_img_url)) {
                        $kreeti_lite_col_class = 'col-five';
                    } else {
                        $kreeti_lite_col_class = 'col-ten';
                    }
                    ?>
                    <div class="col-3 float-l pad latest-posts-grid af-sec-post" data-mh="latest-posts-grid">
                        <div class="read-single color-pad">
                            <div class="data-bg read-img pos-rel read-bg-img"
                                 data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                     alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>"> <a
                                        class="aft-post-image-link"
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php kreeti_lite_post_format($post->ID); ?>
                                <?php kreeti_lite_count_content_words($post->ID); ?>
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
                <?php }
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>


