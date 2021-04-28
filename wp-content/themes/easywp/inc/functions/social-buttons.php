<?php
/**
* Social buttons
*
* @package EasyWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function easywp_social_buttons() { ?>

<div class="easywp-social-icons clearfix">
<div class="easywp-social-icons-inner clearfix">
    <?php if ( easywp_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('twitterlink') ); ?>" class="easywp-social-twitter" aria-label="<?php esc_attr_e('Twitter Button','easywp'); ?>" title="<?php esc_attr_e('Twitter','easywp'); ?>"><span class="fa fa-twitter" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('facebooklink') ); ?>" class="easywp-social-facebook" aria-label="<?php esc_attr_e('Facebook Button','easywp'); ?>" title="<?php esc_attr_e('Facebook','easywp'); ?>"><span class="fa fa-facebook" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('googlelink') ); ?>" class="easywp-social-googleplus" aria-label="<?php esc_attr_e('Google Plus Button','easywp'); ?>" title="<?php esc_attr_e('Google Plus','easywp'); ?>"><span class="fa fa-google-plus" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('pinterestlink') ); ?>" class="easywp-social-pinterest" aria-label="<?php esc_attr_e('Pinterest Button','easywp'); ?>" title="<?php esc_attr_e('Pinterest','easywp'); ?>"><span class="fa fa-pinterest" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('linkedinlink') ); ?>" class="easywp-social-linkedin" aria-label="<?php esc_attr_e('Linkedin Button','easywp'); ?>" title="<?php esc_attr_e('Linkedin','easywp'); ?>"><span class="fa fa-linkedin" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('instagramlink') ); ?>" class="easywp-social-instagram" aria-label="<?php esc_attr_e('Instagram Button','easywp'); ?>" title="<?php esc_attr_e('Instagram','easywp'); ?>"><span class="fa fa-instagram" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('flickrlink') ); ?>" class="easywp-social-flickr" aria-label="<?php esc_attr_e('Flickr Button','easywp'); ?>" title="<?php esc_attr_e('Flickr','easywp'); ?>"><span class="fa fa-flickr" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('youtubelink') ); ?>" class="easywp-social-youtube" aria-label="<?php esc_attr_e('Youtube Button','easywp'); ?>" title="<?php esc_attr_e('Youtube','easywp'); ?>"><span class="fa fa-youtube" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('vimeolink') ); ?>" class="easywp-social-vimeo" aria-label="<?php esc_attr_e('Vimeo Button','easywp'); ?>" title="<?php esc_attr_e('Vimeo','easywp'); ?>"><span class="fa fa-vimeo" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('soundcloudlink') ); ?>" class="easywp-social-soundcloud" aria-label="<?php esc_attr_e('SoundCloud Button','easywp'); ?>" title="<?php esc_attr_e('SoundCloud','easywp'); ?>"><span class="fa fa-soundcloud" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('lastfmlink') ); ?>" class="easywp-social-lastfm" aria-label="<?php esc_attr_e('Lastfm Button','easywp'); ?>" title="<?php esc_attr_e('Lastfm','easywp'); ?>"><span class="fa fa-lastfm" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('githublink') ); ?>" class="easywp-social-github" aria-label="<?php esc_attr_e('Github Button','easywp'); ?>" title="<?php esc_attr_e('Github','easywp'); ?>"><span class="fa fa-github" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('bitbucketlink') ); ?>" class="easywp-social-bitbucket" aria-label="<?php esc_attr_e('Bitbucket Button','easywp'); ?>" title="<?php esc_attr_e('Bitbucket','easywp'); ?>"><span class="fa fa-bitbucket" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('tumblrlink') ); ?>" class="easywp-social-tumblr" aria-label="<?php esc_attr_e('Tumblr Button','easywp'); ?>" title="<?php esc_attr_e('Tumblr','easywp'); ?>"><span class="fa fa-tumblr" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('digglink') ); ?>" class="easywp-social-digg" aria-label="<?php esc_attr_e('Digg Button','easywp'); ?>" title="<?php esc_attr_e('Digg','easywp'); ?>"><span class="fa fa-digg" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('deliciouslink') ); ?>" class="easywp-social-delicious" aria-label="<?php esc_attr_e('Delicious Button','easywp'); ?>" title="<?php esc_attr_e('Delicious','easywp'); ?>"><span class="fa fa-delicious" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('stumblelink') ); ?>" class="easywp-social-stumbleupon" aria-label="<?php esc_attr_e('Stumbleupon Button','easywp'); ?>" title="<?php esc_attr_e('Stumbleupon','easywp'); ?>"><span class="fa fa-stumbleupon" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('redditlink') ); ?>" class="easywp-social-reddit" aria-label="<?php esc_attr_e('Reddit Button','easywp'); ?>" title="<?php esc_attr_e('Reddit','easywp'); ?>"><span class="fa fa-reddit" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('dribbblelink') ); ?>" class="easywp-social-dribbble" aria-label="<?php esc_attr_e('Dribbble Button','easywp'); ?>" title="<?php esc_attr_e('Dribbble','easywp'); ?>"><span class="fa fa-dribbble" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('behancelink') ); ?>" class="easywp-social-behance" aria-label="<?php esc_attr_e('Behance Button','easywp'); ?>" title="<?php esc_attr_e('Behance','easywp'); ?>"><span class="fa fa-behance" aria-hidden="true"></span></a><?php endif; ?>
            <?php if ( easywp_get_option('vklink') ) : ?>
                <a href="<?php echo esc_url( easywp_get_option('vklink') ); ?>" class="easywp-social-vk" aria-label="<?php esc_attr_e('VK Button','easywp'); ?>" title="<?php esc_attr_e('VK','easywp'); ?>"><span class="fa fa-vk" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('codepenlink') ); ?>" class="easywp-social-codepen" aria-label="<?php esc_attr_e('Codepen Button','easywp'); ?>" title="<?php esc_attr_e('Codepen','easywp'); ?>"><span class="fa fa-codepen" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('jsfiddlelink') ); ?>" class="easywp-social-jsfiddle" aria-label="<?php esc_attr_e('JSFiddle Button','easywp'); ?>" title="<?php esc_attr_e('JSFiddle','easywp'); ?>"><span class="fa fa-jsfiddle" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('stackoverflowlink') ); ?>" class="easywp-social-stackoverflow" aria-label="<?php esc_attr_e('Stack Overflow Button','easywp'); ?>" title="<?php esc_attr_e('Stack Overflow','easywp'); ?>"><span class="fa fa-stack-overflow" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('stackexchangelink') ); ?>" class="easywp-social-stackexchange" aria-label="<?php esc_attr_e('Stack Exchange Button','easywp'); ?>" title="<?php esc_attr_e('Stack Exchange','easywp'); ?>"><span class="fa fa-stack-exchange" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('bsalink') ); ?>" class="easywp-social-buysellads" aria-label="<?php esc_attr_e('BuySellAds Button','easywp'); ?>" title="<?php esc_attr_e('BuySellAds','easywp'); ?>"><span class="fa fa-buysellads" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('slidesharelink') ); ?>" class="easywp-social-slideshare" aria-label="<?php esc_attr_e('SlideShare Button','easywp'); ?>" title="<?php esc_attr_e('SlideShare','easywp'); ?>"><span class="fa fa-slideshare" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( easywp_get_option('skypeusername') ); ?>?chat" class="social-skype" aria-label="<?php esc_attr_e('Skype Button','easywp'); ?>" title="<?php esc_attr_e('Skype','easywp'); ?>"><span class="fa fa-skype" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( easywp_get_option('emailaddress') ); ?>" class="easywp-social-email" aria-label="<?php esc_attr_e('Email Us Button','easywp'); ?>" title="<?php esc_attr_e('Email Us','easywp'); ?>"><span class="fa fa-envelope" aria-hidden="true"></span></a><?php endif; ?>
    <?php if ( easywp_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('rsslink') ); ?>" class="easywp-social-rss" aria-label="<?php esc_attr_e('RSS Button','easywp'); ?>" title="<?php esc_attr_e('RSS','easywp'); ?>"><span class="fa fa-rss" aria-hidden="true"></span></a><?php endif; ?>
</div>
</div>

<?php }