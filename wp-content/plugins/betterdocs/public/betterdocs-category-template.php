<?php

/**
 * Template archive docs
 *
 * @link       https://wpdeveloper.net
 * @since      1.0.0
 *
 * @package    BetterDocs
 * @subpackage BetterDocs/public
 */

get_header();

$alphabetic_order = BetterDocs_DB::get_settings('alphabetically_order_post');
$nested_subcategory = BetterDocs_DB::get_settings('nested_subcategory');

global $wp_query;
$term_slug = $wp_query->query['doc_category'];
$term = get_term_by('slug', $wp_query->query['doc_category'], 'doc_category');
?>

<div class="betterdocs-category-wraper betterdocs-single-wraper">
	<?php
	$live_search = BetterDocs_DB::get_settings('live_search');
	if ($live_search == 1) {
		?>
		<div class="betterdocs-search-form-wrap">
			<?php echo do_shortcode('[betterdocs_search_form]'); ?>
		</div>
	<?php } ?>
	<div class="betterdocs-content-area">
		<?php
		$enable_archive_sidebar = BetterDocs_DB::get_settings('enable_archive_sidebar');
		if ($enable_archive_sidebar == 1) {
			?>
			<aside id="betterdocs-sidebar">
				<div class="betterdocs-sidebar-content">
					<?php
						$shortcode = do_shortcode('[betterdocs_category_grid sidebar_list="true" posts_per_grid="-1"]');
						echo apply_filters('betterdocs_sidebar_category_shortcode', $shortcode);
					?>
				</div>
			</aside><!-- #sidebar -->
		<?php } ?>

		<div id="main" class="docs-listing-main">
			<div class="docs-category-listing">
				<?php
				$enable_breadcrumb = BetterDocs_DB::get_settings('enable_breadcrumb');

				if ($enable_breadcrumb == 1) {
					betterdocs_breadcrumbs();
				}
				?>
				<div class="docs-cat-title">
					<?php printf('<h3>%s </h3>', $term->name); ?>
					<?php printf('<p>%s </p>', wpautop($term->description)); ?>
				</div>
				<div class="docs-list">
					<?php
					$multikb = apply_filters('betterdocs_cat_template_multikb', false);
					$args = BetterDocs_Helper::list_query_arg('docs', $multikb, $term->slug, -1, $alphabetic_order);
					$args = apply_filters('betterdocs_articles_args', $args, $term->term_id);
					$post_query = new WP_Query($args);

					if ($post_query->have_posts()) :
						echo '<ul>';
						while ($post_query->have_posts()) : $post_query->the_post();
							echo '<li>' . BetterDocs_Helper::list_svg() . '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
						endwhile;
						echo '</ul>';
					endif;
					wp_reset_query();

					// Sub category query
					if ($nested_subcategory == 1) {
						nested_category_list(
							$term->term_id,
							$multikb,
							'',
							'docs',
							$alphabetic_order,
							''
						);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
