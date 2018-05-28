<?php
/**
 * Controlled Chaos Theme functions.
 *
 * @package    WordPress
 * @subpackage Controlled_Chaos
 * @author     Greg Sweet <greg@ccdzine.com>
 * @copyright  Copyright (c) 2017 - 2018, Greg Sweet
 * @link       https://github.com/ControlledChaos/controlled-chaos-theme
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @since      Controlled Chaos 1.0.0
 */

namespace CCTheme\Functions;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

// Get plugins path to check for active plugins.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Theme functions class.
 *
 * @since  1.0.0
 * @access public
 */
class CCTheme_Functions {

	/**
	 * Initialize the class.
	 * 
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		// Swap html 'no-js' class with 'js'.
		add_action( 'wp_head', [ $this, 'js_detect' ], 0 );

		// Get dependencies.
		$this -> dependencies();

		// Theme setup.
		add_action( 'after_setup_theme', [ $this, 'setup' ] );

		// Remove unpopular meta tags.
		add_action( 'init', [ $this, 'head_cleanup' ] );

		// Frontend scripts.
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ] );

		// Admin scripts.
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );

		// Frontend styles.
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_styles' ] );

		/**
		 * Admin styles.
		 *
		 * Call late to override plugin styles.
		 */
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_styles' ], 99 );

		// Gutenberg backend styles.
		add_action( 'enqueue_block_editor_assets', [ $this, 'gutenberg_styles' ] );

		// Login styles.
		add_action( 'login_enqueue_scripts', [ $this, 'login_styles' ] );

		// jQuery UI fallback for HTML5 Contact Form 7 form fields.
		add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

		// Remove WooCommerce styles.
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );

		// Gutenberg title placeholder.
		add_filter( 'enter_title_here', [ $this, 'gutenberg_title_placeholder' ] );

		// Gutenberg body placeholder.
		add_filter( 'write_your_story', [ $this, 'gutenberg_body_placeholder' ] );

	}

	/**
	 * Replace 'no-js' class with 'js' in the <html> element when JavaScript is detected.
	 * 
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function js_detect() {

		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

	}

	/**
	 * Theme dependencies.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Theme customizer.
		require_once get_theme_file_path( '/includes/customizer/class-customizer.php' );

		// Set up the <head> element.
		require_once get_theme_file_path( '/includes/head/class-head.php' );

		// Set up Scema attributes for the <body> element.
		require_once get_theme_file_path( '/includes/template-tags/class-body-schema.php' );

		// Get template filters.
		include get_theme_file_path( '/includes/filters/class-template-filters.php' );

		// Register sidebars.
		require get_theme_file_path( '/includes/widgets/register-sidebars.php' );

		// Blog navigation.
		if ( ! is_singular() ) {
			require get_theme_file_path( '/template-parts/navigation/class-blog-nav.php' );
		}

	}

	/**
	 * Theme setup.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function setup() {

		/**
		 * Load domain for translation.
		 *
		 * @since 1.0.0
		 */
		load_theme_textdomain( 'controlled-chaos' );

		/**
		 * Add theme support.
		 *
		 * @since 1.0.0
		 */

		// Browser title tag support.
		add_theme_support( 'title-tag' );

		// Background color & image support.
		add_theme_support( 'custom-background' );

		// RSS feed links support.
		add_theme_support( 'automatic-feed-links' );

		// HTML 5 tags support.
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gscreenery',
			'caption'
		 ] );

		// Register post formats.
		add_theme_support( 'post-formats', [
			'aside',
			'gscreenery',
			'video',
			'image',
			'audio',
			'link',
			'quote',
			'status',
			'chat'
		 ] );

		/**
		 * Add Gutenberg support.
		 *
		 * @since 1.0.0
		 */
		
		add_theme_support( 'align-wide' );
		// add_theme_support( 'disable-custom-colors' );

		// Default color choices.
		$gutenberg_colors = apply_filters( 'cctheme_gutenberg_colors', [
			[
				'name'  => __( 'Blue-Black', 'controlled-chaos' ),
				'color' => '#23282d'
			],
			[
				'name'  => __( 'Blue-Gray', 'controlled-chaos' ),
				'color' => '#32373c'
			],
			[
				'name'  => __( 'Blue', 'controlled-chaos' ),
				'color' => '#0073aa'
			],
			[
				'name'  => __( 'Light Blue', 'controlled-chaos' ),
				'color' => '#00a0d2'
			],
			[
				'name'  => __( 'Gray', 'controlled-chaos' ),
				'color' => '#444'
			],
			[
				'name'  => __( 'Light Grey', 'controlled-chaos' ),
				'color' => '#ccc'
			],
			[
				'name'  => __( 'White', 'controlled-chaos' ),
				'color' => '#fff'
				]
		] );
		
		add_theme_support( 'editor-color-palette', $gutenberg_colors );

		/**
		 * Add theme support.
		 *
		 * @since 1.0.0
		 */

		// Customizer widget refresh support.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		// TODO: add Fancybox to WC products.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Beaver Builder support.
		add_theme_support( 'fl-theme-builder-headers' );
		add_theme_support( 'fl-theme-builder-footers' );
		add_theme_support( 'fl-theme-builder-parts' );

		// Featured image support.
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add image sizes.
		 *
		 * Three sizes per aspect ratio so that WordPress
		 * will use srcset for responsive images.
		 *
		 * @since 1.0.0
		 */

		// 16:9 HD Video.
		add_image_size( __( 'video', 'controlled-chaos' ), 1280, 720, true );
		add_image_size( __( 'video-md', 'controlled-chaos' ), 960, 540, true );
		add_image_size( __( 'video-sm', 'controlled-chaos' ), 640, 360, true );

		// 21:9 Cinemascope.
		add_image_size( __( 'banner', 'controlled-chaos' ), 1280, 549, true );
		add_image_size( __( 'banner-md', 'controlled-chaos' ), 960, 411, true );
		add_image_size( __( 'banner-sm', 'controlled-chaos' ), 640, 274, true );

		// Add image size for meta tags if companion plugin is not activated.
		if ( ! is_plugin_active( 'controlled-chaos-plugin/controlled-chaos-plugin.php' ) ) {
			add_image_size( __( 'Meta Image', 'controlled-chaos' ), 1200, 630, true );
		}

		// Header support.
		$header = [
			'default-image'          => '',
			'width'                  => 1280,
			'height'                 => 549,
			'flex-height'            => true,
			'flex-width'             => true,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		];
		add_theme_support( 'custom-header', $header );

		// Customizer logo upload support.
		add_theme_support( 'custom-logo', [
			'width'       => apply_filters( 'cctheme_logo_width', 180 ),
			'height'      => apply_filters( 'cctheme_logo_height', 180 ),
			'flex-width'  => apply_filters( 'cctheme_logo_flex_width', true ),
			'flex-height' => apply_filters( 'cctheme_logo_flex_height', true )
		 ] );

		 /**
		 * Set content width.
		 *
		 * @since 1.0.0
		 */

		if ( ! isset( $content_width ) ) {
			$content_width = 1280;
		}

		/**
		 * Register theme menus.
		 * 
		 * @since  1.0.0
		 */
		register_nav_menus( [
				'main'   => apply_filters( 'cctheme_main_menu_name', esc_html__( 'Main Menu', 'controlled-chaos' ) ),
				'footer' => apply_filters( 'cctheme_footer_menu_name', esc_html__( 'Footer Menu', 'controlled-chaos' ) ),
				'social' => apply_filters( 'cctheme_social_menu_name', esc_html__( 'Social Menu', 'controlled-chaos' ) )
		] );

		/**
		 * Add stylesheet for the content editor.
		 *
		 * @since 1.0.0
		 */
		add_editor_style( '/assets/css/editor-style.css', [ 'cctheme-admin' ], '', 'screen' );

		/**
		 * Disable Jetpack open graph. We have the open graph tags in the theme.
		 *
		 * @since 1.0.0
		 */
		if ( class_exists( 'Jetpack' ) ) {
			add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );
		}

	}

	/**
	 * Clean up meta tags from the <head>.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function head_cleanup() {

		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
	}

	/**
	 * Frontend scripts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function frontend_scripts() {

		wp_enqueue_script( 'jquery' );

		// HTML 5 support.
		wp_enqueue_script( 'cctheme-html5',  get_theme_file_uri( '/assets/js/html5.min.js' ), [], '' );
		wp_script_add_data( 'cctheme-html5', 'conditional', 'lt IE 9' );

		// Comments scripts.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Admin scripts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function admin_scripts() {



	}

	/**
	 * Frontend styles.
	 * 
	 * @TODO	Try the following to get css for dev mode...
	 * 
	 * 			$files = glob( ' folder/*.{jpg,png,gif}', GLOB_BRACE );
	 * 
	 *			foreach ( $files as $file ) {
	 *				// Get files.
	 *			}
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function frontend_styles() {

		// Theme sylesheet.
		wp_enqueue_style( 'cctheme-style',      get_stylesheet_uri(), [], '', 'screen' );

		// Internet Explorer styles.
		wp_enqueue_style( 'cctheme-ie8',        get_theme_file_uri( '/assets/css/ie8.css' ), [], '', 'screen' );
		wp_style_add_data( 'cctheme-ie8', 'conditional', 'lt IE 9' );

		/**
		 * Check if we and/or Google are online. If so, get Google fonts
		 * from their servers. Otherwise, get them from the theme directory.
		 */
		$google = checkdnsrr( 'google.com' );

		if ( $google ) {
			wp_enqueue_style( 'cctheme-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Source+Code+Pro:200,300,400,500,600,700,900', [], '', 'screen' );
		} else {
			wp_enqueue_style( 'cctheme-sans',  get_theme_file_uri( '/assets/fonts/open-sans/open-sans.min.css' ), [], '', 'screen' );
			wp_enqueue_style( 'cctheme-serif', get_theme_file_uri( '/assets/fonts/merriweather/merriweather.min.css' ), [], '', 'screen' );
			wp_enqueue_style( 'cctheme-code',  get_theme_file_uri( '/assets/fonts/source-code-pro/source-code-pro.min.css' ), [], '', 'screen' );
		}

		// Media and supports queries.
		wp_enqueue_style( 'cctheme-queries',   get_theme_file_uri( '/queries.css' ), [], '', 'screen' );

		// Print styles.
		wp_enqueue_style( 'cctheme-print',     get_theme_file_uri( '/assets/css/print.css' ), [], '', 'print' );

	}

	/**
	 * Admin styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function admin_styles() {



	}

	/**
	 * Gutenberg editor styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	function gutenberg_editor_styles() {

		wp_enqueue_style( 'controlled-chaos-gutenberg', get_theme_file_uri( '/assets/css/gutenberg.css') );

	}

	/**
	 * Login styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function login_styles() {

		wp_enqueue_style( 'custom-login', get_theme_file_uri( '/assets/css/login.css' ), [], '', 'screen' );

	}

	/**
	 * Gutenberg title placeholder.
	 * *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	function gutenberg_title_placeholder( $post ) {

		$screen = get_current_screen();

		if ( $screen->post_type == 'post' ) {
			$title = __( 'Post Title', 'controlled-chaos' );
		} elseif ( $screen->post_type == 'page' ) {
			$title = __( 'Page Title', 'controlled-chaos' );
		} else {
			$title = __( 'Enter Title', 'controlled-chaos' );
		}

		return $title;
	}

	/**
	 * Gutenberg body placeholder.
	 * *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	function gutenberg_body_placeholder() {

		$screen = get_current_screen();

		if ( $screen->post_type == 'post' ) {
			$placeholder = __( 'Begin writing post&hellip;', 'controlled-chaos' );
		} elseif ( $screen->post_type == 'page' ) {
			$placeholder = __( 'Begin writing page&hellip;', 'controlled-chaos' );
		} else {
			$placeholder = __( 'Begin writing&hellip;', 'controlled-chaos' );
		}

		return $placeholder;
	}

}

// Run the Functions class.
$cctheme = new CCTheme_Functions();