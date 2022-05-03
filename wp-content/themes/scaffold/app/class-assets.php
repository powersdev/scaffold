<?php
/**
 * Enqueue the assets.
 *
 * @package scaffold
 */

namespace Scaffold;

use Scaffold\Traits\Singleton;

/**
 * Assets Class
 */
class Assets {

	use Singleton;

	/**
	 * Class Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'wp_head', array( $this, 'load_manifest' ) );
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function scripts(): void {
		wp_enqueue_style(
			'scaffold-css',
			get_template_directory_uri() . '/public/app.css',
			array(),
			Theme::VERSION
		);

		wp_enqueue_script(
			'scaffold-js',
			get_template_directory_uri() . '/public/app.js',
			array(),
			Theme::VERSION,
			true
		);
	}

	/**
	 * Echo the manifest meta tag.
	 *
	 * @return void
	 */
	public function load_manifest(): void {
		$manifest_url = get_template_directory_uri() . '/public/manifest.json';
		?>
		<link rel="manifest" href="<?php echo esc_url( $manifest_url ); ?>">
		<?php
	}
}
