<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package Kreeti
     */
    
    global $post;
    $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-featured');
    $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
    $kreeti_lite_show_excerpt = kreeti_lite_get_option('archive_content_view');
?>

<div class="archive-grid-post">
    <div class="read-single color-pad">
        <div class="data-bg read-img pos-rel read-bg-img"
             data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
            <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                 alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
            <a class="aft-post-image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php kreeti_lite_post_format($post->ID); ?>
            <?php kreeti_lite_count_content_words($post->ID); ?>
            <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
        </div>
        <div class="read-details pad ptb-10">

            <div class="read-categories">
                <?php kreeti_lite_post_categories(); ?>
            </div>
            <div class="read-title">
                <h4>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
            </div>

            <div class="entry-meta">
                <?php kreeti_lite_post_item_meta(); ?>
                <?php kreeti_lite_get_comments_views_share($post->ID); ?>
            </div>
            <?php if ($kreeti_lite_show_excerpt != 'archive-content-none'): ?>
                <div class="read-descprition full-item-discription">
                    <div class="post-description">
                        <?php
                            if ($kreeti_lite_show_excerpt == 'archive-content-excerpt') {
                                echo wp_kses_post(kreeti_lite_get_the_excerpt($post->ID));
                            } else {
                                the_content();
                            }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'kreeti-lite'),
            'after' => '</div>',
        ));
    ?>
</div>








