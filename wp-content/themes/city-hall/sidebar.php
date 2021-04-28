<?php 
if (is_active_sidebar('sidebar-primary')) {
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar: Primary') ) : ?> <?php endif;
}