<?php
/**
* The header for EasyWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="easywp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#easywp-main-wrapper"><?php esc_html_e( 'Skip to content', 'easywp' ); ?></a>

<div id="easywp-body-wrapper">
<div id="easywp-outer-wrapper">

<div id="easywp-header-wrapper" class="clearfix" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div id="easywp-header-inner" class="clearfix">

<?php if ( get_header_image() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="easywp-header-image-link">
        <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="easywp-header-image"/>
    </a>
    </div>
<?php endif; // End header image check. ?>

<div id="easywp-header-content" class="clearfix">
<div id="easywp-header-left">
    <?php if ( has_custom_logo() ) : ?>
        <div class="site-branding">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="easywp-header-image-link">
            <img src="<?php echo esc_url( easywp_custom_logo() ); ?>" alt="" class="easywp-logo-image"/>
        </a>
        </div>
    <?php else: ?>
        <div class="site-branding">
          <?php easywp_site_title(); ?>
        </div>
    <?php endif; ?>
</div>

<div id="easywp-header-right">
<?php dynamic_sidebar( 'easywp-header-banner' ); ?>
</div>
</div>

</div>
</div>

<?php if ( !(easywp_get_option('disable_primary_menu')) ) { ?>
<div class="easywp-container easywp-primary-menu-container clearfix">
<div class="easywp-outer-wrapper">
<div class="easywp-primary-menu-container-inside clearfix">
<nav class="easywp-nav-primary" id="easywp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'easywp' ); ?>">
<button class="easywp-primary-responsive-menu-icon" aria-controls="easywp-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'easywp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'easywp-menu-primary-navigation', 'menu_class' => 'easywp-primary-nav-menu easywp-menu-primary', 'fallback_cb' => 'easywp_fallback_menu', 'container' => '', ) ); ?>
</nav>
</div>
</div>
</div>
<?php } ?>

<?php if ( !(easywp_get_option('hide_social_buttons')) ) { easywp_social_buttons(); } ?>