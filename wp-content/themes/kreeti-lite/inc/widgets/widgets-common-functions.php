<?php


/**
 * Returns all categories.
 *
 * @since CoverNews 1.0.0
 */
if (!function_exists('kreeti_get_terms')):
function kreeti_get_terms( $category_id = 0, $taxonomy='category', $default='' ){
    $taxonomy = !empty($taxonomy) ? $taxonomy : 'category';

    if ( $category_id > 0 ) {
            $term = get_term_by('id', absint($category_id), $taxonomy );
            if($term)
                return esc_html($term->name);


    } else {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => true,
        ));


        if (isset($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                if( $default != 'first' ){
                    $array['0'] = __('Select Category', 'kreeti-lite');
                }
                $array[$term->term_id] = esc_html($term->name);
            }

            return $array;
        }
    }
}
endif;

