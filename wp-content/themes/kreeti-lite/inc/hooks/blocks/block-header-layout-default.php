<?php
    /**
     * List block part for displaying header content in page.php
     *
     * @package Kreeti
     */
    
    $kreeti_lite_class = '';
    $kreeti_lite_background = '';
    if (has_header_image()) {
        $kreeti_lite_class = 'af-header-image data-bg';
        $kreeti_lite_background = get_header_image();
    }
?>
<div class="top-header">
    <div class="container-wrapper">
        <div class="top-bar-flex">
            <div class="top-bar-left col-2">
                <div class="date-bar-left">
                    <?php do_action('kreeti_lite_load_date'); ?>
                </div>
            </div>
            <div class="top-bar-right col-2">
                <div class="aft-small-social-menu">
                    <?php do_action('kreeti_lite_load_social_menu'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="af-middle-header <?php echo esc_attr($kreeti_lite_class); ?>"
     data-background="<?php echo esc_attr($kreeti_lite_background); ?>">
    <div class="container-wrapper">
        <div class="af-middle-container">
            <div class="logo">
                <?php do_action('kreeti_lite_load_site_branding'); ?>
            </div>
            <?php
                $kreeti_lite_banner_advertisement_scope = kreeti_lite_get_option('banner_advertisement_scope');
                if ($kreeti_lite_banner_advertisement_scope == 'front-page-only'):
                    if (is_home() || is_front_page()):?>
                        <div class="header-advertise">
                            <?php do_action('kreeti_lite_action_banner_advertisement'); ?>
                        </div>
                    <?php endif;
                else: ?>
                    <div class="header-advertise">
                        <?php do_action('kreeti_lite_action_banner_advertisement'); ?>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<div id="main-navigation-bar" class="af-bottom-header">
    <div class="container-wrapper">
        <div class="bottom-bar-flex">
            <div class="offcanvas-navigaiton">
                <?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
                    <div class="off-cancas-panel">
                        <?php do_action('kreeti_lite_load_off_canvas'); ?>
                    </div>
                    <div id="sidr" class="primary-background">
                        <a class="sidr-class-sidr-button-close" href="#sidr-nav"><i class="fa fa-window-close"></i></a>
                        <?php dynamic_sidebar('express-off-canvas-panel'); ?>
                    </div>
                <?php endif; ?>
                <div class="af-bottom-head-nav">
                    <?php do_action('kreeti_lite_action_main_menu_nav'); ?>
                </div>
            </div>
            <div class="search-watch">
                <?php do_action('kreeti_lite_load_search_form'); ?>
                <?php do_action('kreeti_lite_load_watch_online'); ?>
            </div>
        </div>
    </div>
</div>
    
