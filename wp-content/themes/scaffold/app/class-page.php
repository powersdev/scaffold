<?php
/**
 * Page-related functionality.
 *
 * @package scaffold
 */

namespace Scaffold;

use Scaffold\Traits\Singleton;

/**
 * Page Class
 */
class Page {

	use Singleton;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		add_action(
			'template_redirect',
			function () {
				Partial::render( 'layouts.app' );
				exit();
			}
		);
	}

	/**
	 * Return list of possible template options.
	 *
	 * @return array
	 */
	public function templates(): array {
		$templates = array();

		if ( is_front_page() ) {
			$templates[] = 'front-page';
		} elseif ( is_home() ) {
			$templates[] = 'home';
		} elseif ( is_search() ) {
			$templates[] = 'search';
		} elseif ( is_404() ) {
			$templates[] = '404';
		} elseif ( is_singular() ) {
			if ( 'page' === get_post_type() ) {
				$templates[] = 'page-' . get_post()->post_name;
				$templates[] = 'page';
			} else {
				$templates[] = 'single-' . get_post_type();
				$templates[] = 'single';
			}
		} elseif ( is_archive() ) {
			if ( is_author() ) {
				$templates[] = 'author';
			} elseif ( is_category() ) {
				$templates[] = 'category';
			} elseif ( is_tag() ) {
				$templates[] = 'tag';
			} else {
				$templates[] = 'archive-' . get_post_type();
				$templates[] = 'archive';
			}
		}

		$templates[] = 'index';

		return $templates;
	}

	/**
	 * Render chosen template.
	 *
	 * @param array $templates List of possible template options.
	 *
	 * @return void
	 */
	public function template_include( string $template ): string {
		foreach ( $this->templates() as $template ) {
			$file = get_template_directory() . '/templates/' . $template . '.twig';
			if ( file_exists( $file ) ) {
				$context = $this->load_context( $template );
			}
		}

		// bdump( $template );

		return $template . '.php';
	}

	/**
	 * Load context.
	 *
	 * @param string $template Template file name.
	 *
	 * @return void
	 */
	private function load_context( $template ) {
		$file = get_template_directory() . '/context/' . $template . '.php';
	}
}
