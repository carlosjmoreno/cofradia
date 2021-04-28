<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package Kreeti
     */
    
    $kreeti_lite_trending_posts_title = kreeti_lite_get_option('main_trending_news_section_title');
    $kreeti_lite_main_posts_title = kreeti_lite_get_option('main_banner_news_section_title');
    $kreeti_lite_editors_picks_posts_title = kreeti_lite_get_option('main_editors_picks_section_title');

?>

<div class="aft-main-banner-part af-container-row-5 clearfix">
    <div class="aft-thumb-part col-4 pad-5 float-l">

        <div class="widget-title-section">
            <?php if (!empty($kreeti_lite_editors_picks_posts_title)): ?>
                <h4 class="widget-title header-after1">
                    <span class="heading-line-before"></span>
                    <?php echo esc_html($kreeti_lite_editors_picks_posts_title); ?>
                    <span class="heading-line-after"></span>
                </h4>
            <?php endif; ?>

        </div>
        <?php kreeti_lite_get_block('thumb', 'banner'); ?>
    </div>


    <div class="aft-slider-part col-2 pad-5 float-l ">

        <div class="widget-title-section">
            <?php if (!empty($kreeti_lite_main_posts_title)): ?>
                <h4 class="widget-title header-after1">
                    <span class="heading-line-before"></span>
                    <?php echo esc_html($kreeti_lite_main_posts_title); ?>
                    <span class="heading-line-after"></span>
                </h4>
            <?php endif; ?>

        </div>
        <?php kreeti_lite_get_block('carousel', 'banner'); ?>
    </div>

    <div class="aft-trending-part col-4 pad-5 float-l ">
        <div class="widget-title-section">
            <?php if (!empty($kreeti_lite_trending_posts_title)): ?>
                <h4 class="widget-title header-after1">
                    <span class="heading-line-before"></span>
                    <?php echo esc_html($kreeti_lite_trending_posts_title); ?>
                    <span class="heading-line-after"></span>
                </h4>
            <?php endif; ?>

        </div>
        <?php kreeti_lite_get_block('trending', 'banner'); ?>
    </div>


</div>