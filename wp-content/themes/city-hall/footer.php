	</div><!-- .site-wrapper-frame -->

	<?php if ( is_active_sidebar('prefooter-widgets-1-left') || is_active_sidebar('prefooter-widgets-1-right') ) { ?>
	<div id="site-footer-identity">
		<div class="site-section-wrapper site-wrapper-width site-section-wrapper-footer">
			<div id="site-prefooter-widgets-column-1">
				<?php if ( is_active_sidebar('prefooter-widgets-1-left') ) {
					dynamic_sidebar( 'prefooter-widgets-1-left' );
				} ?>
			</div><!-- #site-prefooter-widgets-column-1 --><!-- ws fix
			--><?php if ( is_active_sidebar('prefooter-widgets-1-right') ) { ?><div id="site-prefooter-widgets-column-2">
				<div class="site-prefooter-widgets-wrapper">
					<?php dynamic_sidebar( 'prefooter-widgets-1-right' ); ?>
				</div><!-- .site-prefooter-widgets-wrapper -->
			</div><!-- #site-prefooter-widgets-column-2 --><?php } ?>
		</div><!-- .site-section-wrapper .site-section-wrapper-footer -->
	</div><!-- #site-prefooter-identity -->
	<?php } 

	if ( is_active_sidebar('prefooter-widgets-2') ) { ?>
	<div id="site-prefooter">
		<div class="site-section-wrapper site-wrapper-width site-section-wrapper-footer">
			<?php dynamic_sidebar( 'prefooter-widgets-2' ); ?>
		</div><!-- .site-section-wrapper .site-section-wrapper-footer -->
	</div><!-- #site-prefooter --><?php
	} ?>

	<footer id="site-footer" class="site-section site-section-footer">
		<div class="site-section-wrapper site-wrapper-width site-section-wrapper-footer">

			<div class="site-columns site-columns-footer site-columns-3 clearfix">

				<div class="site-column site-column-1">
					<?php
					if ( !dynamic_sidebar('footer-col-1') ) : ?> <?php endif;
					?>
				</div><!-- .site-column .site-column-1 --><!-- ws fix
	
				--><div class="site-column site-column-2">
					<?php
					if ( !dynamic_sidebar('footer-col-2') ) : ?> <?php endif;
					?>
				</div><!-- .site-column .site-column-2 --><!-- ws fix
	
				--><div class="site-column site-column-3">
					<?php
					if ( !dynamic_sidebar('footer-col-3') ) : ?> <?php endif;
					?>

					<?php if ( has_nav_menu( 'footer' ) ) { ?><nav id="site-footer-menu">
					
						<?php 
						wp_nav_menu( array(
							'container' => '', 
							'container_class' => '', 
							'menu_class' => '', 
							'menu_id' => '', 
							'depth' => '1', 
							'sort_column' => 'menu_order', 
							'theme_location' => 'footer'
						) ); ?>
					
					</nav><!-- #site-footer-menu --><?php } ?>						

					<div id="site-footer-credit">
						<?php $copyright_default = __('Copyright &copy; ','city-hall') . date("Y",time()) . ' ' . get_bloginfo('name'); ?><p class="site-credit"><?php echo esc_html(get_theme_mod( 'city_hall_copyright_text', $copyright_default )); ?></p>
						<?php if ( get_theme_mod('theme-display-footer-credit', 1 ) == 1) { ?><p class="academia-credit"><?php esc_html_e('Theme by', 'city-hall'); ?> <a href="https://www.academiathemes.com/" rel="nofollow designer noopener" target="_blank">AcademiaThemes</a></p><?php } ?>
					</div><!-- #site-footer-credit -->

				</div><!-- .site-column .site-column-3 -->

			</div><!-- .site-columns .site-columns-footer .site-columns-3 .clearfix -->

		</div><!-- .site-section-wrapper .site-section-wrapper-footer -->

	</footer><!-- #site-footer .site-section-footer -->

</div><!-- #container -->

<?php 
wp_footer(); 
?>
</body>
</html>