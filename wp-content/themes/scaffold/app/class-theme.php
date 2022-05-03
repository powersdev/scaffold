<?php
/**
 * Initialize theme functionality and manage other theme classes.
 *
 * @package Scaffold
 */

namespace Scaffold;

use Scaffold\Traits\Singleton;

/**
 * Theme Class
 */
class Theme {

	use Singleton;

	/**
	 * Theme Version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Class Constructor
	 */
	public function __construct() {
		Setup::get_instance();
		Assets::get_instance();
		Page::get_instance();
		Partial::get_instance();
	}
}
