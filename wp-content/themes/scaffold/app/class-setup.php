<?php
/**
 * Set up the theme.
 *
 * @package scaffold
 */

namespace Scaffold;

use Scaffold\Traits\Singleton;

/**
 * Setup Class
 */
class Setup {

	use Singleton;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
		add_action( 'after_setup_theme', array( $this, 'navigation_menus' ) );
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Designate Theme Support.
	 */
	public function theme_support(): void {

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}

	/**
	 * Register site navigation menus.
	 *
	 * @return void
	 */
	public function navigation_menus(): void {
		register_nav_menus(
			array(
				'primary-navigation' => esc_html__( 'Primary', 'scaffold' ),
			)
		);
	}


	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function content_width(): void {
		$GLOBALS['content_width'] = apply_filters( 'scaffold_content_width', 640 );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	public function widgets_init(): void {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'scaffold' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'scaffold' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}