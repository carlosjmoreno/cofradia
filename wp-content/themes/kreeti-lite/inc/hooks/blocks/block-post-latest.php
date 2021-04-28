<?php
    /**
     * List block part for displaying latest posts in footer.php
     *
     * @package Kreeti
     */
    
    $kreeti_lite_latest_posts_title = kreeti_lite_get_option('frontpage_latest_posts_section_title');
    $kreeti_lite_latest_posts_subtitle = kreeti_lite_get_option('frontpage_latest_posts_section_subtitle');
    $kreeti_lite_number_of_posts = kreeti_lite_get_option('number_of_frontpage_latest_posts');
    $kreeti_lite_all_posts = kreeti_lite_get_posts($kreeti_lite_number_of_posts);
?>
<div class="af-main-banner-latest-posts grid-layout kreeti-customizer">
    <div class="container-wrapper">
        <div class="widget-title-section">
            <?php if (!empty($kreeti_lite_latest_posts_title)): ?>
                <h4 class="widget-title header-after1">
                    <span class="heading-line-before"></span>
                    <?php echo esc_html($kreeti_lite_latest_posts_title); ?>
                    <span class="heading-line-after"></span>
                </h4>
            <?php endif; ?>
        </div>
        <div class="af-container-row clearfix">
            <?php
                if ($kreeti_lite_all_posts->have_posts()) :
                    while ($kreeti_lite_all_posts->have_posts()) : $kreeti_lite_all_posts->the_post();
                        global $post;
                        $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                        $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                        ?>
                        <div class="col-4 pad float-l " data-mh="af-feat-list">
                            <div class="read-single color-pad">
                                <div class="data-bg read-img pos-rel read-bg-img"
                                     data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                    <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                         alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                    <a class="aft-post-image-link"
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
                    <?php
                    endwhile; ?>
                <?php
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
