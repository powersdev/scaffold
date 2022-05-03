<?php
/**
 * Singleton Implementation
 *
 * @package powersdev
 * @subpackage debug
 */

namespace Powersdev\Debug\Traits;

trait Singleton {

	/**
	 * Class instance.
	 *
	 * @var array
	 */
	protected static array $instance = array();

	/**
	 * Class constructor. Should be overridden. Will only be called once.
	 */
	protected function __construct() {
	}

	/**
	 * This method returns a new or existing Singleton instance.
	 * Should not be overridden.
	 *
	 * @return self Instance of the class.
	 */
	final public static function get_instance(): self {
		$called_class = static::class;

		if ( ! isset( static::$instance[ $called_class ] ) ) {

			static::$instance[ $called_class ] = new $called_class();

			/**
			 * Allow other code to do something after this class is initialized.
			 */
			do_action( 'singleton_init_' . $called_class );
		}

		return static::$instance[ $called_class ];
	}

	/**
	 * Prevents object cloning.
	 */
	final protected function __clone() {
	}
}
