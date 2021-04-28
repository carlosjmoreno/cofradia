<?php
/**
 * Implement theme metabox.
 *
 * @package Kreeti
 */

if (!function_exists('kreeti_lite_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function kreeti_lite_add_theme_meta_box()
    {

        $kreeti_lite_screens = array('post', 'page');

        foreach ($kreeti_lite_screens as $screen) {
            add_meta_box(
                'kreeti-theme-settings',
                esc_html__('Layout Options', 'kreeti-lite'),
                'kreeti_lite_render_layout_options_metabox',
                $screen,
                'side',
                'low'


            );
        }

    }

endif;

add_action('add_meta_boxes', 'kreeti_lite_add_theme_meta_box');

if (!function_exists('kreeti_lite_render_layout_options_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function kreeti_lite_render_layout_options_metabox($post, $metabox)
    {

        $kreeti_lite_post_id = $post->ID;

        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'kreeti_lite_meta_box_nonce');
        // Fetch Options list.
        $kreeti_lite_content_layout = get_post_meta($kreeti_lite_post_id, 'kreeti-meta-content-alignment', true);

        if (empty($kreeti_lite_content_layout)) {
            $kreeti_lite_content_layout = kreeti_lite_get_option('global_content_alignment');
        }


        ?>
        <div id="kreeti-settings-metabox-container" class="kreeti-settings-metabox-container">
            <div id="kreeti-settings-metabox-tab-layout">
                <div class="kreeti-row-content">
                    <!-- Select Field-->
                    <p>
                        <select name="kreeti-meta-content-alignment" id="kreeti-meta-content-alignment">

                            <option value="" <?php selected('', $kreeti_lite_content_layout); ?>>
                                <?php esc_html_e('Set as global layout', 'kreeti-lite') ?>
                            </option>
                            <option value="align-content-left" <?php selected('align-content-left', $kreeti_lite_content_layout); ?>>
                                <?php esc_html_e('Content - Primary Sidebar', 'kreeti-lite') ?>
                            </option>
                            <option value="align-content-right" <?php selected('align-content-right', $kreeti_lite_content_layout); ?>>
                                <?php esc_html_e('Primary Sidebar - Content', 'kreeti-lite') ?>
                            </option>
                            <option value="full-width-content" <?php selected('full-width-content', $kreeti_lite_content_layout); ?>>
                                <?php esc_html_e('No Sidebar', 'kreeti-lite') ?>
                            </option>
                        </select>
                    </p>
                    <small><?php esc_html_e('Please go to Customize> Frontpage Options for Homepage.', 'kreeti-lite')?></small>

                </div><!-- .kreeti-row-content -->
            </div><!-- #kreeti-settings-metabox-tab-layout -->
        </div><!-- #kreeti-settings-metabox-container -->

        <?php
    }

endif;


if (!function_exists('kreeti_lite_save_layout_options_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $kreeti_lite_post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function kreeti_lite_save_layout_options_meta($kreeti_lite_post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['kreeti_lite_meta_box_nonce']) || !wp_verify_nonce($_POST['kreeti_lite_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $kreeti_lite_post_id to prevent triggering this call for other save_post events.
        if (empty($_POST['post_ID']) || $_POST['post_ID'] != $kreeti_lite_post_id) {
            return;
        }

        // Check permission.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $kreeti_lite_post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $kreeti_lite_post_id)) {
            return;
        }

        $kreeti_lite_content_layout = isset($_POST['kreeti-meta-content-alignment']) ? $_POST['kreeti-meta-content-alignment'] : '';
        update_post_meta($kreeti_lite_post_id, 'kreeti-meta-content-alignment', sanitize_text_field($kreeti_lite_content_layout));


    }

endif;

add_action('save_post', 'kreeti_lite_save_layout_options_meta', 10, 2);


//Category fields meta starts


if (!function_exists('kreeti_lite_taxonomy_add_new_meta_field')) :
// Add term page
    function kreeti_lite_taxonomy_add_new_meta_field()
    {
        // this will add the custom meta field to the add new term page

        $kreeti_lite_cat_color = array(
            'category-color-1' => __('Category Color 1', 'kreeti-lite'),
            'category-color-2' => __('Category Color 2', 'kreeti-lite'),
            'category-color-3' => __('Category Color 3', 'kreeti-lite'),


        );
        ?>
        <div class="form-field">
            <label for="term_meta[color_class_term_meta]"><?php esc_html_e('Color Class', 'kreeti-lite'); ?></label>
            <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                <?php foreach ($kreeti_lite_cat_color as $key => $value): ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="description"><?php esc_html_e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'kreeti-lite'); ?></p>
        </div>
        <?php
    }
endif;
add_action('category_add_form_fields', 'kreeti_lite_taxonomy_add_new_meta_field', 10, 2);


if (!function_exists('kreeti_lite_taxonomy_edit_meta_field')) :
// Edit term page
    function kreeti_lite_taxonomy_edit_meta_field($term)
    {

        // put the term ID into a variable
        $kreeti_lite_t_id = $term->term_id;

        // retrieve the existing value(s) for this meta field. This returns an array
        $kreeti_lite_term_meta = get_option("category_color_$kreeti_lite_t_id");

        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label
                        for="term_meta[color_class_term_meta]"><?php esc_html_e('Color Class', 'kreeti-lite'); ?></label></th>
            <td>
                <?php
                $kreeti_lite_cat_color = array(
                    'category-color-1' => __('Category Color 1', 'kreeti-lite'),
                    'category-color-2' => __('Category Color 2', 'kreeti-lite'),
                    'category-color-3' => __('Category Color 3', 'kreeti-lite'),


                );
                ?>
                <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                    <?php foreach ($kreeti_lite_cat_color as $key => $value): ?>
                        <option value="<?php echo esc_attr($key); ?>"<?php selected($kreeti_lite_term_meta['color_class_term_meta'], $key); ?> ><?php echo esc_html($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php esc_html_e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'kreeti-lite'); ?></p>
            </td>
        </tr>
        <?php
    }
endif;
add_action('category_edit_form_fields', 'kreeti_lite_taxonomy_edit_meta_field', 10, 2);