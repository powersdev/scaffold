<?php
/**
 * Initialize the Theme.
 *
 * @package scaffold
 */

if ( ! class_exists( 'Scaffold\Theme' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';

	Scaffold\Theme::get_instance();
}
