<?php
if (!function_exists('kreeti_lite_archive_layout_selection')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_archive_layout_selection($kreeti_lite_archive_layout = 'default')
    {

        switch ($kreeti_lite_archive_layout) {

            case "archive-layout-full":
                kreeti_lite_get_block('full', 'archive');
                break;
            default:
                kreeti_lite_get_block('grid', 'archive');
        }
    }
endif;

if (!function_exists('kreeti_lite_archive_layout')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Kreeti 1.0.0
     *
     */
    function kreeti_lite_archive_layout($cat_slug = ''){

        $kreeti_lite_archive_args = kreeti_lite_archive_layout_class($cat_slug);
        if (!empty($kreeti_lite_archive_args['data_mh'])): ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($kreeti_lite_archive_args['add_archive_class']); ?>
                 data-mh="<?php echo esc_attr($kreeti_lite_archive_args['data_mh']); ?>">
            <?php kreeti_lite_archive_layout_selection($kreeti_lite_archive_args['archive_layout']); ?>
        </article>
    <?php else: ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($kreeti_lite_archive_args['add_archive_class']); ?> >
            <?php kreeti_lite_archive_layout_selection($kreeti_lite_archive_args['archive_layout']); ?>
        </article>
    <?php endif; ?>

        <?php

    }

    add_action('kreeti_lite_action_archive_layout', 'kreeti_lite_archive_layout', 10, 1);
endif;

function kreeti_lite_archive_layout_class($kreeti_lite_cat_slug)
{
    $kreeti_lite_archive_class = kreeti_lite_get_option('archive_layout');
    $kreeti_lite_archive_layout_grid = kreeti_lite_get_option('archive_image_alignment_grid');

    if ($kreeti_lite_archive_class == 'archive-layout-grid') {
        $kreeti_lite_archive_args['archive_layout'] = 'archive-layout-grid';
        $kreeti_lite_archive_args['add_archive_class'] = 'af-sec-post latest-posts-grid col-3 float-l pad ';
        $kreeti_lite_archive_layout_mode = $kreeti_lite_archive_layout_grid;
        if ($kreeti_lite_archive_layout_mode == 'archive-image-full-alternate' || $kreeti_lite_archive_layout_mode == 'archive-image-list-alternate') {
            $kreeti_lite_archive_args['data_mh'] = '';
        } else {
            $kreeti_lite_archive_args['data_mh'] = 'archive-layout-grid';
        }
        $kreeti_lite_image_align_class = $kreeti_lite_archive_layout_grid;
        $kreeti_lite_archive_args['add_archive_class'] .= ' ' . $kreeti_lite_archive_class . ' ' . $kreeti_lite_image_align_class;

    } else {
        $kreeti_lite_archive_args['archive_layout'] = 'archive-layout-full';
        $kreeti_lite_archive_args['add_archive_class'] = 'latest-posts-full col-1 float-l pad';
        $kreeti_lite_archive_args['data_mh'] = '';
    }

    return $kreeti_lite_archive_args;

}

//Archive div wrap before loop

if (!function_exists('kreeti_lite_archive_layout_before_loop')) :

    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Kreeti 1.0.0
     *
     */

    function kreeti_lite_archive_layout_before_loop()
    {

        if (is_category()) {

            //check is category
            $kreeti_lite_archive_class = '';
            $kreeti_lite_archive_mode = kreeti_lite_get_option('archive_layout');
            $kreeti_queried_object = get_queried_object();
            $kreeti_t_id = $kreeti_queried_object->term_id;
            $kreeti_term_meta = get_option("category_layout_".$kreeti_t_id);
            $kreeti_term_meta_masonry = get_option("category_layout_masonry_".$kreeti_t_id);
            $kreeti_term_meta_full = get_option("category_layout_full_".$kreeti_t_id);
            $kreeti_term_meta_grid_column = get_option("category_layout_grid_column_".$kreeti_t_id);

            if (!empty($kreeti_term_meta)) {
                $kreeti_term_meta = $kreeti_term_meta['archive_layout_term_meta'];
                // grid  column layout
                if ($kreeti_term_meta == 'archive-layout-grid') {

                    if ($kreeti_term_meta_grid_column['archive_layout_grid'] == 'grid-layout-two') {
                        $kreeti_col_grid = 'two-col-masonry';

                    }  else {
                        $kreeti_col_grid = 'three-col-masonry';

                    }

                    $kreeti_lite_archive_class .= $kreeti_lite_archive_mode . " " . $kreeti_col_grid;
                }//full layout option
                else if ($kreeti_term_meta == 'archive-layout-full') {
                    if ($kreeti_term_meta_full['archive_layout_full'] == 'full-image-first') {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-image-first';
                    } else if ($kreeti_term_meta_full['archive_layout_full'] == 'full-title-first') {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-title-first';
                    } else if ($kreeti_term_meta_full['archive_layout_full'] == 'archive-full-grid') {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . "full-with-grid";
                    } else {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-title-first';
                    }
                } else {
                    $kreeti_lite_archive_class = $kreeti_term_meta;
                }


            } else {
                //grid layout option
                if ($kreeti_lite_archive_mode == 'archive-layout-grid') {
                    $kreeti_lite_archive_layout_grid = kreeti_lite_get_option('archive_grid_column_layout');
                    if ($kreeti_lite_archive_layout_grid == 'grid-layout-two') {
                        $kreeti_col_grid = $kreeti_lite_archive_mode . " " . 'two-col-masonry';
                    }  else {
                        $kreeti_col_grid = $kreeti_lite_archive_mode . " " . 'three-col-masonry';
                    }
                    $kreeti_lite_archive_class = $kreeti_col_grid;
                }  //full layout option
                elseif ($kreeti_lite_archive_mode == 'archive-layout-full') {
                    $kreeti_lite_archive_layout_full = kreeti_lite_get_option('archive_layout_full');
                    if ($kreeti_lite_archive_layout_full == 'full-image-first') {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-image-first';
                    } else if ($kreeti_lite_archive_layout_full == 'full-title-first') {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-title-first';
                    } else if ($kreeti_lite_archive_layout_full == 'archive-full-grid') {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . "full-with-grid";
                    } else {
                        $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-title-first';
                    }
                } else {
                    $kreeti_lite_archive_class = $kreeti_lite_archive_mode;
                }
            }
        } else {
            //grid layout option
            $kreeti_lite_archive_mode = kreeti_lite_get_option('archive_layout');
            if ($kreeti_lite_archive_mode == 'archive-layout-grid') {
                $kreeti_lite_archive_layout_grid = kreeti_lite_get_option('archive_grid_column_layout');
                if ($kreeti_lite_archive_layout_grid == 'grid-layout-two') {
                    $kreeti_col_grid = $kreeti_lite_archive_mode . " " . 'two-col-masonry';
                } else if ($kreeti_lite_archive_layout_grid == 'grid-layout-four') {
                    $kreeti_col_grid = $kreeti_lite_archive_mode . " " . 'four-col-masonry';
                } else {
                    $kreeti_col_grid = $kreeti_lite_archive_mode . " " . 'three-col-masonry';
                }
                $kreeti_lite_archive_class = $kreeti_col_grid;
            }//full layout option
            elseif ($kreeti_lite_archive_mode == 'archive-layout-full') {
                $kreeti_lite_archive_layout_full = kreeti_lite_get_option('archive_layout_full');
                if ($kreeti_lite_archive_layout_full == 'full-image-first') {
                    $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'full-image-first';
                } else if ($kreeti_lite_archive_layout_full == 'full-title-first') {
                    $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . 'archive-title-first';
                } else if ($kreeti_lite_archive_layout_full == 'archive-full-grid') {
                    $kreeti_lite_archive_class = $kreeti_lite_archive_mode . " " . "full-with-grid";
                } else {
                    $kreeti_lite_archive_class = $kreeti_lite_archive_mode;
                }
            } else {

                $kreeti_lite_archive_class = $kreeti_lite_archive_mode;
            }
        }
        ?>
        <div class="af-container-row aft-archive-wrapper kreeti-customizer clearfix <?php echo esc_attr($kreeti_lite_archive_class); ?>">
        <?php

    }

    add_action('kreeti_lite_archive_layout_before_loop', 'kreeti_lite_archive_layout_before_loop');
endif;

if (!function_exists('kreeti_lite_archive_layout_after_loop')):

    function kreeti_lite_archive_layout_after_loop()
    {
        ?>
        </div>
    <?php }

    add_action('kreeti_lite_archive_layout_after_loop', 'kreeti_lite_archive_layout_after_loop');

endif;