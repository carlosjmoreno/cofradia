<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package flash_blog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() ); ?>
			<!-- related post -->
            <div class="united-related-post">
            	<?php if (!empty(flash_blog_get_option('related_post_title'))) { ?>
	                <div class="related-post-header">
	                    <h2 class="related-post-title">
                            <?php echo esc_html(flash_blog_get_option('related_post_title')); ?>
                        </h2>
	                </div>
            	<?php } ?>
                <?php if (1 == flash_blog_get_option('related_post')) {
                    global $post;
                    $category_ids = array();
                    $categories = get_the_category(get_the_ID());
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }
                    }
                    if(!empty($category_ids)){
                        $args = array(
                            'posts_per_page' => 3,
                            'category__in' => $category_ids,
                            'post__not_in' => array(get_the_ID()),
                            'order' => 'ASC',
                            'orderby' => 'rand'
                        );
                        $related_posts = new WP_Query($args);
                        if($related_posts->have_posts()):
                            while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="related-post-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                                <div class="related-post-details">
                                    <header class="entry-header">
                                        <?php
                                            the_title( '<h4 class="entry-title entry-title-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                                        ?>
                                        <div class="entry-meta">
                                            <?php
                                                flash_blog_posted_on();
                                                flash_blog_posted_by();
                                            ?>
                                        </div><!-- .entry-meta -->
                                    </header><!-- .entry-header -->
                                </div>
                            </article><!-- #post-<?php the_ID(); ?> -->
                            <?php
                            wp_reset_postdata();
                        endwhile; ?>
                        <?php endif;
                    }
                } ?>
            </div>
			<!-- end of related post -->
			<?php 
			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
