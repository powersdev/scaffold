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

	const VERSION = '1.0.0';

	use Singleton;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Setup Theme
	 */
	function theme_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on scaffold, use a find and replace
		 * to change 'scaffold' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'scaffold', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
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
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'scaffold' ),
			)
		);

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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'scaffold_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
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
	function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'scaffold_content_width', 640 );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function widgets_init() {
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

	/**
	 * Enqueue scripts and styles.
	 */
	function scripts() {
		wp_enqueue_style( 'scaffold-style', get_stylesheet_uri(), array(), self::VERSION );
		wp_style_add_data( 'scaffold-style', 'rtl', 'replace' );

		wp_enqueue_script( 'scaffold-navigation', get_template_directory_uri() . '/js/navigation.js', array(), self::VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
