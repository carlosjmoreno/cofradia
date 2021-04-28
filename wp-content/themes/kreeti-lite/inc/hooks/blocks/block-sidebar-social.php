<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package Kreeti
     */
    
    $kreeti_show_in_frontpage = kreeti_lite_get_option('show_sidebar_social_contacts_in_frontpage');
    $kreeti_show_in_archive = kreeti_lite_get_option('show_sidebar_social_contacts_in_archive');
    $kreeti_show_in_single = kreeti_lite_get_option('show_sidebar_social_contacts_in_single');
    
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
?>

<div class="promotionspace enable-promotionspace">
    <div class="af-social-contacts widget kreeti-widget">
        <?php
            $kreeti_section_title = kreeti_lite_get_option('sidebar_social_contacts_section_title');
            if (!empty($kreeti_section_title)) { ?>
                <h4 class="trending-title widget-title header-after1">
                    <span class="heading-line-before"></span>
                    <?php echo esc_html($kreeti_section_title); ?>
                    <span class="heading-line-after"></span>
                </h4>
            <?php }
        ?>
        <div class="social-widget-menu">
            <?php
                if (has_nav_menu('aft-social-nav')) {
                    wp_nav_menu(array(
                        'theme_location' => 'aft-social-nav',
                        'link_before' => '<span class="screen-reader-text">',
                        'link_after' => '</span>',
                    ));
                } ?>
        </div>
        <?php if (!has_nav_menu('aft-social-nav')) : ?>
            <p>
                <?php esc_html_e('Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'kreeti-lite'); ?>
            </p>
        <?php endif; ?>
    </div>
</div>


