<?php
/**
* Author bio box
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/* This code adds new profile fields to the user profile editor */
function easywp_modify_contact_methods($profile_fields) {

    // Remove old fields
    unset($profile_fields['aim']);
    unset($profile_fields['yim']);
    unset($profile_fields['jabber']);

    return $profile_fields;
}
add_filter('user_contactmethods', 'easywp_modify_contact_methods');


// Author bio box
function easywp_add_author_bio_box() {
    $content='';
    if (is_single()) {
        $content .= '
            <div class="easywp-author-bio">
            <div class="easywp-author-bio-top">
            <div class="easywp-author-bio-gravatar">
                '. get_avatar( get_the_author_meta('email') , 80 ) .'
            </div>
            <div class="easywp-author-bio-text">
                <h2>'.esc_html__( 'Author: ', 'easywp' ).'<span>'. get_the_author_link() .'</span></h2><div class="easywp-author-bio-text-description">'. get_the_author_meta('description',get_query_var('author') ) .'</div>
            </div>
            </div>
            </div>
        ';
    }
    return $content;
}