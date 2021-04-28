<?php
/**
* EasyWP Theme Customizer.
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! class_exists( 'WP_Customize_Control' ) ) {return NULL;}

class EasyWP_Customize_Button_Control extends WP_Customize_Control {
        public $type = 'button';
        protected $button_tag = 'button';
        protected $button_class = 'button button-primary';
        protected $button_href = 'javascript:void(0)';
        protected $button_target = '';
        protected $button_onclick = '';
        protected $button_tag_id = '';

        public function render_content() {
        ?>
        <span class="center">
        <?php
        echo '<' . esc_html($this->button_tag);
        if (!empty($this->button_class)) {
            echo ' class="' . esc_attr($this->button_class) . '"';
        }
        if ('button' == $this->button_tag) {
            echo ' type="button"';
        }
        else {
            echo ' href="' . esc_url($this->button_href) . '"' . (empty($this->button_tag) ? '' : ' target="' . esc_attr($this->button_target) . '"');
        }
        if (!empty($this->button_onclick)) {
            echo ' onclick="' . esc_js($this->button_onclick) . '"';
        }
        if (!empty($this->button_tag_id)) {
            echo ' id="' . esc_attr($this->button_tag_id) . '"';
        }
        echo '>';
        echo esc_html($this->label);
        echo '</' . esc_html($this->button_tag) . '>';
        ?>
        </span>
        <?php
        }
}

class EasyWP_Customize_Static_Text_Control extends WP_Customize_Control {
    public $type = 'easywp-static-text';

    public function __construct( $manager, $id, $args = array() ) {
        parent::__construct( $manager, $id, $args );
    }

    protected function render_content() {
        if ( ! empty( $this->label ) ) :
            ?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
        endif;

        if ( ! empty( $this->description ) ) :
            ?><div class="description customize-control-description"><?php

        echo wp_kses_post( $this->description );

            ?></div><?php
        endif;

    }
}

class EasyWP_Customize_Recommended_Plugins extends WP_Customize_Control {
    public $type = 'easywp-recommended-wpplugins';

    public function render_content() {
        $plugins = array(
        'wp-pagenavi' => array(
            'link'  => esc_url( admin_url('plugin-install.php?tab=plugin-information&plugin=wp-pagenavi' ) ),
            'text'  => esc_html__( 'WP-PageNavi', 'easywp' ),
            'desc'  => esc_html__( 'WP-PageNavi plugin helps to display numbered page navigation of this theme. Just install and activate the plugin.', 'easywp' ),
            ),
        'regenerate-thumbnails' => array(
            'link'  => esc_url( admin_url('plugin-install.php?tab=plugin-information&plugin=regenerate-thumbnails' ) ),
            'text'  => esc_html__( 'Regenerate Thumbnails', 'easywp' ),
            'desc'  => esc_html__( 'Regenerate Thumbnails plugin helps you to regenerate your thumbnails to match with this theme. Install and activate the plugin. From the left hand navigation menu, click Tools &gt; Regen. Thumbnails. On the next screen, click Regenerate All Thumbnails.', 'easywp' ),
            ),
        );
        foreach ( $plugins as $plugin) {
            echo wp_kses_post( force_balance_tags( '<p>'.$plugin['desc'].'</p>' ) );
            echo wp_kses_post( force_balance_tags( '<p style="background:#fff;border:1px solid #ddd;color:#000;padding:10px;font-size:120%;font-style:normal;font-weight:bold;"><a style="margin-left:8px;font-weight:bold;color:#000;text-decoration:none;" href="' . esc_url($plugin['link']) .'" target="_blank"><i class="fa fa-wordpress" aria-hidden="true"></i> ' . esc_attr($plugin['text']) .' </a></p>' ) );
        }
    }
}

function easywp_register_theme_customizer( $wp_customize ) {

    if(method_exists('WP_Customize_Manager', 'add_panel')):
    $wp_customize->add_panel('easywp_main_options_panel', array( 'title' => esc_html__('Theme Options', 'easywp'), 'priority' => 10, ));
    endif;

    $wp_customize->get_section( 'title_tagline' )->panel = 'easywp_main_options_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = 20;
    $wp_customize->get_section( 'colors' )->panel = 'easywp_main_options_panel';
    $wp_customize->get_section( 'colors' )->priority = 40;

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    $wp_customize->add_section( 'easywp_section_getting_started', array( 'title' => esc_html__( 'Getting Started', 'easywp' ), 'description' => esc_html__( 'Thanks for your interest in EasyWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'easywp' ), 'panel' => 'easywp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'easywp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new EasyWP_Customize_Button_Control( $wp_customize, 'easywp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'easywp' ), 'section' => 'easywp_section_getting_started', 'settings' => 'easywp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/easywp-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'easywp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new EasyWP_Customize_Button_Control( $wp_customize, 'easywp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'easywp' ), 'section' => 'easywp_section_getting_started', 'settings' => 'easywp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_section( 'easywp_section_posts', array( 'title' => esc_html__( 'Post Options', 'easywp' ), 'panel' => 'easywp_main_options_panel', 'priority' => 260 ) );

    $wp_customize->add_setting( 'easywp_options[hide_entry_meta]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_entry_meta_control', array( 'label' => esc_html__( 'Hide Entry Meta', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_entry_meta]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_thumbnail_control', array( 'label' => esc_html__( 'Hide Thumbnails from Every Page', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_thumbnail_single]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_thumbnail_single_control', array( 'label' => esc_html__( 'Hide Thumbnails from Posts/Pages', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_thumbnail_single]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_read_more_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_read_more_button_control', array( 'label' => esc_html__( 'Hide Read More Button', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_read_more_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[thumbnail_link]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'easywp_thumbnail_link_control', array( 'label' => esc_html__( 'Thumbnail Link', 'easywp' ), 'description' => esc_html__('Do you want thumbnails to be linked to their post?', 'easywp'), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[thumbnail_link]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'easywp'), 'no' => esc_html__('No', 'easywp') ) ) );

    $wp_customize->add_setting( 'easywp_options[blogpoststyle]', array( 'default' => 'excerpt', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_blogpost_style' ) );

    $wp_customize->add_control( 'easywp_blogpoststyle_control', array( 'label' => esc_html__( 'Post Content', 'easywp' ), 'description' => esc_html__('Show content: will show the whole post content while Show excerpt: will only show the first few lines', 'easywp'), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[blogpoststyle]', 'type' => 'select', 'choices' => array( 'excerpt' => esc_html__('Show excerpt', 'easywp'), 'content' => esc_html__('Show content', 'easywp') ) ) );

    $wp_customize->add_setting( 'easywp_options[read_more_text]', array( 'default' => 'Continue Reading...', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'easywp_read_more_text_control', array( 'label' => esc_html__( 'Read More Text', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[read_more_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'easywp_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[hide_post_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_post_navigation_control', array( 'label' => esc_html__( 'Hide Post Navigation', 'easywp' ), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[hide_post_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[posts_navigation_type]', array( 'default' => 'numberednavi', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_posts_navigation_type' ) );

    $wp_customize->add_control( 'easywp_posts_navigation_type_control', array( 'label' => esc_html__( 'Posts Navigation Type', 'easywp' ), 'description' => esc_html__('Select posts navigation type you need. If you activate WP-PageNavi plugin, this navigation will be replaced by WP-PageNavi navigation.', 'easywp'), 'section' => 'easywp_section_posts', 'settings' => 'easywp_options[posts_navigation_type]', 'type' => 'select', 'choices' => array( 'normalnavi' => esc_html__('Normal Navigation', 'easywp'), 'numberednavi' => esc_html__('Numbered Navigation', 'easywp') ) ) );

    $wp_customize->add_section( 'easywp_section_sociallinks', array( 'title' => esc_html__( 'Social Links', 'easywp' ), 'panel' => 'easywp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'easywp_options[hide_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_hide_social_buttons_control', array( 'label' => esc_html__( 'Hide Social Buttons', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[hide_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[pinterestlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'easywp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_email' ) );

    $wp_customize->add_control( 'easywp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'easywp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'easywp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'easywp' ), 'section' => 'easywp_section_sociallinks', 'settings' => 'easywp_options[rsslink]', 'type' => 'text' ) );

    $wp_customize->add_section( 'easywp_section_footer', array( 'title' => esc_html__( 'Footer', 'easywp' ), 'panel' => 'easywp_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'easywp_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_html', ) );

    $wp_customize->add_control( 'easywp_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'easywp' ), 'section' => 'easywp_section_footer', 'settings' => 'easywp_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_section( 'easywp_section_other', array( 'title' => esc_html__( 'Other Options', 'easywp' ), 'panel' => 'easywp_main_options_panel', 'priority' => 460 ) );

    $wp_customize->add_setting( 'easywp_options[disable_sticky_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_disable_sticky_menu_control', array( 'label' => esc_html__( 'Disable Sticky Menu', 'easywp' ), 'section' => 'easywp_section_other', 'settings' => 'easywp_options[disable_sticky_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[enable_sticky_mobile_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_enable_sticky_mobile_menu_control', array( 'label' => esc_html__( 'Enable Sticky Menu on Small Screen', 'easywp' ), 'section' => 'easywp_section_other', 'settings' => 'easywp_options[enable_sticky_mobile_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'easywp_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'easywp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'easywp_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'easywp' ), 'section' => 'easywp_section_other', 'settings' => 'easywp_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'easywp_section_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'easywp' ), 'panel' => 'easywp_main_options_panel', 'priority' => 880 ));

    $wp_customize->add_setting( 'easywp_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'install_plugins', 'sanitize_callback' => 'easywp_sanitize_recommended_plugins' ) );

    $wp_customize->add_control( new EasyWP_Customize_Recommended_Plugins( $wp_customize, 'easywp_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'easywp' ), 'section' => 'easywp_section_recommended_plugins', 'settings' => 'easywp_options[recommended_plugins]', 'type' => 'easywp-recommended-wpplugins', 'capability' => 'install_plugins' ) ) );

    $wp_customize->add_section( 'easywp_section_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'easywp' ), 'priority' => 400 ) );

    $wp_customize->add_setting( 'easywp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new EasyWP_Customize_Static_Text_Control( $wp_customize, 'easywp_upgrade_text_control', array(
        'label'       => esc_html__( 'EasyWP Pro', 'easywp' ),
        'section'     => 'easywp_section_upgrade',
        'settings' => 'easywp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy EasyWP? Upgrade to EasyWP Pro now and get:', 'easywp' ).
            '<ul class="easywp-customizer-pro-features">' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Color Options', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Font Options', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Featured Posts Widget(It can display recent/popular/random posts or posts from a given category or tag.)', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Related Posts with thumbnails', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Footer with Layout Options (1/2/3/4 columns)', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Search Engine Optimized', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Post Share Buttons', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Author Bio Box with Social Buttons', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'WooCommerce Compatibility', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'More Customizer options', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'More Features...', 'easywp' ) . '</li>' .
                '<li><span class="fa fa-check" aria-hidden="true"></span> ' . esc_html__( 'Priority Support', 'easywp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.EASYWP_PROURL.'" class="button button-primary" target="_blank"><span class="fa fa-shopping-cart" aria-hidden="true"></span> ' . esc_html__( 'Upgrade To EasyWP PRO', 'easywp' ) . '</a></strong>'
    ) ) );

}

function easywp_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && ( true == $input ) ) ? true : false );
}

function easywp_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function easywp_sanitize_thumbnail_link( $input, $setting ) {
    $valid = array('yes','no');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function easywp_sanitize_blogpost_style( $input, $setting ) {
    $valid = array('excerpt','content');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function easywp_sanitize_email( $input, $setting ) {
    if ( '' != $input && is_email( $input ) ) {
        $input = sanitize_email( $input );
        return $input;
    } else {
        return $setting->default;
    }
}

function easywp_sanitize_posts_navigation_type( $input, $setting ) {
    $valid = array('normalnavi','numberednavi');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function easywp_sanitize_positive_integer( $input, $setting ) {
    $input = absint( $input ); // Force the value into non-negative integer.
    return ( 0 < $input ) ? $input : $setting->default;
}

add_action( 'customize_register', 'easywp_register_theme_customizer' );

function easywp_customizer_js_scripts() {
    wp_enqueue_script('easywp-theme-customizer-js', get_template_directory_uri() . '/admin/js/customizer.js', array( 'jquery', 'customize-preview' ), NULL, true);
}
add_action( 'customize_preview_init', 'easywp_customizer_js_scripts' );