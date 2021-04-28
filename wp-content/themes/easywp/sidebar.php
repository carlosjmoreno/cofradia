<?php
/**
* The file for displaying the sidebars.
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="easywp-left-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary" aria-label="<?php esc_attr_e( 'Left Sidebar', 'easywp' ); ?>">
<div class="theiaStickySidebar">
<div class="easywp-sidebar">

  <?php easywp_before_sidebar_left(); ?>

  <?php dynamic_sidebar( 'easywp-left-sidebar' ); ?>

  <?php easywp_after_sidebar_left(); ?>

</div>
</div>
</div>

<div id="easywp-right-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary" aria-label="<?php esc_attr_e( 'Right Sidebar', 'easywp' ); ?>">
<div class="theiaStickySidebar">
<div class="easywp-sidebar">

  <?php easywp_before_sidebar_right(); ?>

  <?php dynamic_sidebar( 'easywp-right-sidebar' ); ?>

  <?php easywp_after_sidebar_right(); ?>

</div>
</div>
</div>