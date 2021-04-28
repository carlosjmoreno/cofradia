<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class city_hall_notice_welcome extends city_hall_notice {

	public function __construct() {
		
		add_action( 'wp_loaded', array( $this, 'welcome_notice' ), 20 );
		add_action( 'wp_loaded', array( $this, 'hide_notices' ), 15 );

	}

	public function welcome_notice() {
		
		$this_notice_was_dismissed = $this->get_notice_status('welcome');
		
		if ( !$this_notice_was_dismissed ) {
			if ( isset($_GET['page']) && 'city-hall-doc' == $_GET['page'] ) {
				return;
			}

			add_action( 'admin_notices', array( $this, 'welcome_notice_markup' ) ); // Display this notice.
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice_markup() {
		
		$dismiss_url = wp_nonce_url(
			remove_query_arg( array( 'activated' ), add_query_arg( 'city-hall-hide-notice', 'welcome' ) ),
			'city_hall_hide_notices_nonce',
			'_city_hall_notice_nonce'
		);

		$theme_data	 = wp_get_theme();

		?>
		<div id="message" class="notice notice-success academiathemes-notice academiathemes-welcome-notice">
			<a class="academiathemes-message-close notice-dismiss" href="<?php echo esc_url( $dismiss_url ); ?>"></a>

			<div class="academiathemes-message-content">
				<div class="academiathemes-message-image">
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=city-hall-doc' ) ); ?>"><img class="academiathemes-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e( 'City Hall Lite', 'city-hall' ); ?>" /></a>
				</div><!-- ws fix
				--><div class="academiathemes-message-text">
					<h2 class="academiathemes-message-heading"><?php esc_html_e( 'Thank you for choosing City Hall Lite Theme!', 'city-hall' ); ?></h2>
					<?php
					echo '<p>';
						/* translators: %1$s: theme name, %2$s link */
						printf( __( 'To take advantage of everything that this theme can offer, please take a look at the <a href="%2$s">Get Started with %1$s</a> page.', 'city-hall' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=city-hall-doc' ) ) );
					echo '</p>';

					echo '<p class="notice-buttons"><a href="'. esc_url( admin_url( 'themes.php?page=city-hall-doc' ) ) .'" class="button button-primary">';
						/* translators: %s theme name */
						printf( esc_html__( 'Get started with %s', 'city-hall' ), esc_html( $theme_data->Name ) );
					echo '</a>';
					echo ' <a href="'. esc_url( 'https://youtu.be/jz3TNlXgH48' ) .'" target="_blank" rel="noopener" class="button button-primary academiathemes-button"><span class="dashicons dashicons-youtube"></span> ';
						/* translators: %s theme name */
						printf( esc_html__( '%s Video Guide', 'city-hall' ), esc_html( $theme_data->Name ) );
					echo '</a></p>';
					?>
				</div><!-- .academiathemes-message-text -->
			</div><!-- .academiathemes-message-content -->
		</div><!-- #message -->
		<?php
	}

}

new city_hall_notice_welcome();