<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kreeti
 */

?>


<?php if (is_singular()) : ?>
    <div class="color-pad">
        <div class="entry-content read-details pad ptb-10">
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'kreeti-lite'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )); ?>
            <?php if (is_single()): ?>
                <div class="post-item-metadata entry-meta">
                    <?php kreeti_lite_post_item_tag(); ?>
                </div>
            <?php endif; ?>
            <?php
            the_post_navigation(array(
                'prev_text' => __('<span class="em-post-navigation">Previous:</span> %title', 'kreeti-lite'),
                'next_text' => __('<span class="em-post-navigation">Next:</span> %title', 'kreeti-lite'),
                'in_same_term' => true,
                'taxonomy' => __('category', 'kreeti-lite'),
                'screen_reader_text' => __('Continue Reading', 'kreeti-lite'),
            ));
            ?>
            <?php wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'kreeti-lite'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    </div>
<?php else:



    do_action('kreeti_lite_action_archive_layout');

endif;
