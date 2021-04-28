<?php
    $kreeti_lite_show_excerpt = 'archive-content-excerpt';
    $kreeti_lite_category_id = kreeti_lite_get_option('select_express_post_category_1');
    $kreeti_lite_express_section_title = kreeti_lite_get_option('frontpage_express_post_section_title_1');
    $kreeti_lite_featured_express_posts_one = kreeti_lite_get_posts(5, $kreeti_lite_category_id);
?>

<div class="af-main-banner-categorized-posts express-posts layout-1">
    <div class="section-wrapper clearfix">
        <div class="col-66 pad float-l small-grid-style clearfix">
            <?php
                
                if ($kreeti_lite_featured_express_posts_one->have_posts()) :
                    ?>
                    <div class="af-title-subtitle-wrap">
                        <?php if (!empty($kreeti_lite_express_section_title)): ?>
                            <h4 class="widget-title header-after1 ">
                                <span class="heading-line-before"></span>
                                <?php echo esc_html($kreeti_lite_express_section_title); ?>
                                <span class="heading-line-after"></span>
                            </h4>
                        <?php endif; ?>
                    </div>
                    <div class="featured-post-items-wrap clearfix af-container-row af-widget-body">
                        <?php
                            $kreeti_lite_count = 1;
                            while ($kreeti_lite_featured_express_posts_one->have_posts()) :
                                $kreeti_lite_featured_express_posts_one->the_post();
                                global $post;
                                $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                                $kreeti_lite_first_section_class = '';
                                if ($kreeti_lite_count == 1):
                                    $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium');
                                    ?>
                                    <div class="col-2 pad float-l af-sec-post">
                                        <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_lite_first_section_class); ?>">
                                            <div class="read-img pos-rel read-img read-bg-img data-bg"
                                                 data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                                <a class="aft-post-image-link"
                                                   href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <?php if (!empty($kreeti_lite_img_url)): ?>
                                                    <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                                         alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                                <?php endif; ?>
                                                <?php kreeti_lite_post_format($post->ID); ?>
                                                <?php kreeti_lite_count_content_words($post->ID); ?>
                                                <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                            </div>
                                            <div class="read-details pad ptb-10">
                                                <div class="banner-carousel read-categories">
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
                                        </div>
                                    </div>
                                <?php else:
                                    $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                                    
                                    ?>
                                    <div class="col-2 pad float-l list-part af-sec-post">
                                        <div class="af-double-column list-style clearfix">
                                            <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_lite_first_section_class); ?>">
                                                <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                                     data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                                    <a class="aft-post-image-link"
                                                       href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    <?php if (!empty($kreeti_lite_img_url)): ?>
                                                        <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                                             alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                                    <?php endif; ?>
                                                    <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                                </div>
                                                <div class="col-75 pad float-l read-details color-tp-pad">
                                                    <div class="banner-carousel read-categories">
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
                                <?php endif; ?>
                                <?php
                                $kreeti_lite_count++;
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php endif;
            ?>
        </div>
        <div class="col-3 pad float-l small-grid-style clearfix">
            <?php
                $kreeti_lite_category_id_two = kreeti_lite_get_option('select_express_post_category_2');
                $kreeti_lite_express_section_name_two = kreeti_lite_get_option('frontpage_express_post_section_title_2');
                $kreeti_lite_featured_express_posts_two = kreeti_lite_get_posts(4, $kreeti_lite_category_id_two);
            ?>

            <div class="af-main-banner-categorized-posts layout-1">
                <div class="section-wrapper">
                    <div class="small-grid-style clearfix">
                        <?php
                            if ($kreeti_lite_featured_express_posts_two->have_posts()) :?>
                                <div class="af-title-subtitle-wrap">
                                    <?php if (!empty($kreeti_lite_express_section_name_two)): ?>
                                        <h4 class="widget-title header-after1 ">
                                            <span class="heading-line-before"></span>
                                            <?php echo esc_html($kreeti_lite_express_section_name_two); ?>
                                            <span class="heading-line-after"></span>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="af-widget-body">
                                    <?php
                                        $kreeti_lite_count = 1;
                                        while ($kreeti_lite_featured_express_posts_two->have_posts()) :
                                            $kreeti_lite_featured_express_posts_two->the_post();
                                            global $post;
                                            $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                                            $kreeti_lite_first_section_class = '';
                                            $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-medium-square');
                                            ?>
                                            <div class="list-part af-sec-post">
                                                <div class="af-double-column list-style clearfix">
                                                    <div class="pos-rel read-single color-pad clearfix <?php echo esc_html($kreeti_lite_first_section_class); ?>">
                                                        <div class="col-4 pad float-l read-img pos-rel read-img read-bg-img data-bg"
                                                             data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                                                            <a class="aft-post-image-link"
                                                               href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            <?php if (!empty($kreeti_lite_img_url)): ?>
                                                                <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                                                     alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                                                            <?php endif; ?>
                                                            <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                                                        </div>
                                                        <div class="col-75 pad float-l read-details color-tp-pad">
                                                            <div class="banner-carousel read-categories">
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
                                            
                                            <?php
                                            $kreeti_lite_count++;
                                        endwhile;
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Editors Pick line END -->
