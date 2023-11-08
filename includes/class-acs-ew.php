<?php
/**
 * ACS EW Loader.
 *
 * @package SSF
 */

/**
 * Class ACS_EW.
 *
 * @since 1.0.0
 */
class ACS_EW {

	/**
	 * Enqueue scripts handle constant.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	const ENQUEUE_SCRIPTS_HANDLE = 'acs-ew';

	/**
	 * Enqueue scripts minified handle constant.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public string $min = '.min';

	/**
	 * Plugin constructor.
	 *
	 * Sets up all the appropriate hooks and actions within our plugin.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks.
	 *
	 * @since 1.0.0
	 */
	public function hooks() {
		add_action( 'init', array( $this, 'load_textdomain' ) );
		add_action( 'wp_footer', array( $this, 'markup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Load textdomain.
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'acs-ew', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Markup for the frontend.
	 *
	 * @since 1.0.0
	 */
	public function markup() {
		?>
		<div id="acs-ew-wrapper">
			<div class="acs-ew-content">
				<div class="acs-ew-overlay-outer">
					<div class="acs-ew-overlay"></div>
				</div>
				<div class="acs-ew-content-inner">
					<div class="acs-ew-content-left">
						<div class="acs-ew-content-left-inner">
							<p class="acs-ew-top-h"><?php esc_html_e( 'FREE GUIDE', 'acs-ew' ); ?></p>
							<h2 class="acs-ew-sub-h"><?php esc_html_e( '100K+ Campaigns Studied. Here Are the 5 Popup Ideas Driving Ecom Revenue in 2023.', 'acs-ew' ); ?></h2>
							<h3><?php esc_html_e( 'Get access to our free guide to see how top DTC brands are using popups to drive revenue.', 'acs-ew' ); ?></h3>
							<form action="" method="post">
								<input type="email" name="email" placeholder="<?php esc_html_e( 'Enter your email', 'acs-ew' ); ?>">
								<input type="submit" value="<?php esc_attr_e( 'Start Reading →', 'acs-ew' ); ?>">
							</form>
							<p class="acs-ew-policy"><?php esc_html_e( 'The info provided will be used to deliver this content,', 'acs-ew' ); ?></p>
							<?php
								printf(
									'<p class="acs-ew-policy">%s. <a href="%s"><u>%s</u></a>.</p>',
									esc_html__( 'plus other similar content', 'acs-ew' ),
									esc_url( '#' ),
									esc_html__( 'Privacy Policy', 'acs-ew' )
								);
							?>
						</div>
					</div>
					<div class="acs-ew-content-right">
						<div class="acs-ew-content-right-inner">
							<img src="https://uploads.convertflow.co/production/websites/3/jeco8mJSQgSnAcZIg4Q3_guide-popup-image-2.png" draggable="false">
						</div>
					</div>
					<div id="acs-ew-close">
						<svg fill="#676f84" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
							<path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z">
							</path>
						</svg>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
			$this->min = '';
		}

		wp_enqueue_style(
			self::ENQUEUE_SCRIPTS_HANDLE,
			ACS_EW_PLUGIN_URL . 'assets/css/main' . $this->min . '.css',
			array(),
			'1.0.0',
		);

		wp_enqueue_script(
			self::ENQUEUE_SCRIPTS_HANDLE,
			ACS_EW_PLUGIN_URL . 'assets/js/main' . $this->min . '.js',
			array(),
			'1.0.0',
		);
	}
}

new ACS_EW();
