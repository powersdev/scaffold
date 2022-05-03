<?php
/**
 * Debug Plugin Class.
 *
 * @package powersdev
 * @subpackage debug
 */

namespace Powersdev\Debug;

use Powersdev\Debug\Traits\Singleton;

/**
 * Plugin Class
 */
class Plugin {

	use Singleton;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'configure' ), 1 );
	}

	/**
	 * Configure debugger.
	 *
	 * @return void
	 */
	public function configure(): void {
		define( 'WP_TRACY_ADMIN_DISABLED', false );
		define( 'WP_TRACY_CHECK_IS_USER_LOGGED_IN', 'off' );
		define( 'WP_TRACY_ENABLE_MODE', 'development' );
	}
}
