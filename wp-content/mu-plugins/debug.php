<?php
/**
 * Plugin Name: Debug Mu-Plugin
 * Plugin Description: Load Debug Functionality.
 *
 * @package powersdev
 * @subpackage debug
 */

if ( ! class_exists( 'Powersdev\Debug\Plugin' ) ) {
	require_once __DIR__ . '/debug/debug.php';
}
