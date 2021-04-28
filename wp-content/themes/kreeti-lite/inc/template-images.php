<?php
/**
 * Custom template images for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kreeti
 */


if ( ! function_exists( 'kreeti_lite_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function kreeti_lite_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        global $post;

        if ( is_singular() ) :

            $kreeti_lite_theme_class = kreeti_lite_get_option('global_image_alignment');
            $kreeti_lite_post_image_alignment = get_post_meta($post->ID, 'kreeti-meta-image-options', true);
            $kreeti_lite_post_class = !empty($kreeti_lite_post_image_alignment) ? $kreeti_lite_post_image_alignment : $kreeti_lite_theme_class;

            if ( $kreeti_lite_post_class != 'no-image' ):
                ?>
                <div class="post-thumbnail <?php echo esc_attr($kreeti_lite_post_class); ?>">
                    <?php the_post_thumbnail('kreeti-featured'); ?>
                </div>
            <?php endif; ?>

        <?php else :
            $kreeti_lite_archive_layout = kreeti_lite_get_option('archive_layout');
            $kreeti_lite_archive_layout = $kreeti_lite_archive_layout;
            $kreeti_lite_archive_class = '';
            if ($kreeti_lite_archive_layout == 'archive-layout-list') {
                $kreeti_lite_archive_image_alignment = kreeti_lite_get_option('archive_image_alignment');
                $kreeti_lite_archive_class = $kreeti_lite_archive_image_alignment;
                $kreeti_lite_archive_image = 'medium';
            } elseif ($kreeti_lite_archive_layout == 'archive-layout-full') {
                $kreeti_lite_archive_image = 'kreeti-medium';
            } else {
                $kreeti_lite_archive_image = 'post-thumbnail';
            }

            ?>
            <div class="post-thumbnail <?php echo esc_attr($kreeti_lite_archive_class); ?>">
                <a href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php
                    the_post_thumbnail( $kreeti_lite_archive_image, array(
                        'alt' => the_title_attribute( array(
                            'echo' => false,
                        ) ),
                    ) );
                    ?>
                </a>
            </div>

        <?php endif; // End is_singular().
    }
endif;
