<?php
/**
 * Full block part for displaying page content in page.php
 *
 * @package Kreeti
 */


$kreeti_lite_slider_category = kreeti_lite_get_option('select_slider_news_category');
$kreeti_lite_filterby = 'cat';
$kreeti_lite_number_of_slides = kreeti_lite_get_option('number_of_slides');
$kreeti_lite_slider_mode = kreeti_lite_get_option('select_main_banner_section_mode');

$kreeti_lite_centerPadding = '';
$kreeti_lite_break_point_1_centerPadding = '';
$kreeti_lite_break_point_2_centerPadding = '';
$kreeti_lite_break_point_3_centerPadding = '';
$kreeti_lite_centerMode = false;
$kreeti_lite_slidesToShow = 1;
$kreeti_lite_slidesToScroll = 1;
$kreeti_lite_carousel_class = 'af-carousel-default';
$kreeti_lite_break_point_1_slidesToShow = 1;
$kreeti_lite_break_point_1_slidesToScroll = 1;
$kreeti_lite_break_point_2_slidesToShow = 1;
$kreeti_lite_break_point_2_slidesToScroll = 1;
$kreeti_lite_break_point_3_slidesToShow = 1;
$kreeti_lite_break_point_3_slidesToScroll = 1;

$kreeti_lite_carousel_args = array(
    'slidesToShow' => $kreeti_lite_slidesToShow,
    'slidesToScroll' => $kreeti_lite_slidesToScroll,
    'centerMode' => $kreeti_lite_centerMode,
    'centerPadding' => $kreeti_lite_centerPadding,
    'responsive' => array(
        array(
            'breakpoint' => 1025,
            'settings' => array(
                'slidesToShow' => $kreeti_lite_break_point_2_slidesToShow,
                'slidesToScroll' => $kreeti_lite_break_point_3_slidesToScroll,
                'infinite' => true,
                'centerPadding' => $kreeti_lite_break_point_1_centerPadding,
            ),
        ),
        array(
            'breakpoint' => 600,
            'settings' => array(
                'slidesToShow' => $kreeti_lite_break_point_2_slidesToShow,
                'slidesToScroll' => $kreeti_lite_break_point_2_slidesToScroll,
                'infinite' => true,
                'centerPadding' => $kreeti_lite_break_point_2_centerPadding,
            ),
        ),
        array(
            'breakpoint' => 480,
            'settings' => array(
                'slidesToShow' => $kreeti_lite_break_point_3_slidesToShow,
                'slidesToScroll' => $kreeti_lite_break_point_3_slidesToScroll,
                'infinite' => true,
                'centerPadding' => $kreeti_lite_break_point_3_centerPadding,
            ),
        ),
    ),
);

$kreeti_lite_carousel_args_encoded = wp_json_encode($kreeti_lite_carousel_args);
?>

<div class="af-widget-carousel aft-carousel">
    <div class="slick-wrapper af-banner-carousel af-banner-carousel-1 common-carousel af-cat-widget-carousel <?php echo esc_html($kreeti_lite_carousel_class); ?>"
         data-slick='<?php echo wp_kses_post($kreeti_lite_carousel_args_encoded); ?>'>
        <?php
        $kreeti_lite_slider_posts = kreeti_lite_get_posts($kreeti_lite_number_of_slides, $kreeti_lite_slider_category, $kreeti_lite_filterby);
        if ($kreeti_lite_slider_posts->have_posts()) :
            while ($kreeti_lite_slider_posts->have_posts()) : $kreeti_lite_slider_posts->the_post();

                global $post;
                $kreeti_lite_img_url = kreeti_lite_get_freatured_image_url($post->ID, 'kreeti-slider-full');
                $kreeti_lite_img_thumb_id = get_post_thumbnail_id($post->ID);
                ?>
                <div class="slick-item">
                    <div class="read-single color-pad pos-rel">
                        <div class="read-img pos-rel read-img read-bg-img data-bg"
                             data-background="<?php echo esc_url($kreeti_lite_img_url); ?>">
                            <a class="aft-post-image-link"
                               href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php if (!empty($kreeti_lite_img_url)): ?>
                                <img src="<?php echo esc_url($kreeti_lite_img_url); ?>"
                                     alt="<?php echo esc_attr(kreeti_lite_get_img_alt($kreeti_lite_img_thumb_id)); ?>">
                            <?php endif; ?>
                            <?php kreeti_lite_archive_social_share_icons($post->ID); ?>
                        </div>
                        <div class="read-details color-tp-pad pad ptb-10 pad">
                            <div class="post-format-and-min-read-wrap">
                                <?php kreeti_lite_post_format($post->ID); ?>
                                <?php kreeti_lite_count_content_words($post->ID); ?>
                            </div>
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
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>