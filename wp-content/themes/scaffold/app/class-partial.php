<?php
/**
 * Render Twig templates.
 *
 * @package scaffold
 */

namespace Scaffold;

use Exception;
use Scaffold\Context\Base;
use Scaffold\Traits\Singleton;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

/**
 * Partial Class
 */
class Partial {

	use Singleton;

	/**
	 * Twig Environment instance.
	 *
	 * @var Environment
	 */
	public Environment $twig;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		$loader = new FilesystemLoader( get_template_directory() . '/resources/views' );

		$this->twig = new Environment(
			$loader,
			array(
				'cache'       => get_template_directory() . '/public/storage/cache',
				'auto_reload' => true,
			)
		);

		$this->register_functions();
	}

	/**
	 * Render a template.
	 *
	 * @param string $template Partial file name.
	 * @param array  $args Optional arguments.
	 *
	 * @return void
	 */
	public static function render( string $template, array $args = array() ): void {
		// phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_error_log -- Only runs when debug is enabled.

		$context  = self::get_context( $template );
		$template = str_replace( '.', '/', $template );

		if ( ! str_contains( $template, '.twig' ) ) {
			$template .= '.twig';
		}

		try {
			// phpcs:ignore -- Sanitize in twig templates.
			echo self::get_instance()->twig->render( $template, array_merge( $context, $args ) );
		} catch ( LoaderError | SyntaxError | RuntimeError $e ) {
			error_log( $e );
		}
	}

	/**
	 * Register custom twig functions.
	 *
	 * @return void
	 */
	private function register_functions(): void {
		$function = new TwigFunction(
			'fn',
			function ( $name, $args = array() ) {
				try {
					call_user_func_array( $name, $args );
				} catch ( Exception $e ) {
					bdump( $e );
				}
			},
			array(
				'is_safe' => array( 'html' ),
			)
		);

		$this->twig->addFunction( $function );
	}

	/**
	 * Returns template context.
	 *
	 * @param string $template Template name.
	 *
	 * @return array
	 */
	private static function get_context( string $template ): array {
		$context = array( Base::get_instance()->data );
		$class   = ucwords( str_replace( '-', '_', $template ) );

		if ( class_exists( $class ) ) {
			$context[] = $class::get_instance()->data;
		}

		return array_merge( ...$context );
	}
}
