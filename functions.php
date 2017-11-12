<?php
/**
 * Controlled Chaos Theme functions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled Chaos 1.0.1
 */

namespace ControlledChaos;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Controlled Chaos functions class.
 *
 * @since Controlled_Chaos 1.0.1
 */
class Controlled_Chaos_Functions {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		// Controlled Chaos theme setup.
		add_action( 'after_setup_theme', [ $this, 'setup' ] );

		// Remove unpopular meta tags.
		add_action( 'init', [ $this, 'head_cleanup' ] );

		/**
		 * Theme scripts.
		 *
		 * @since Controlled_Chaos 1.0.1
		 */

		// Frontend scripts.
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ] );

		// Admin scripts.
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );

		// Remove emoji script.
		add_action( 'init', [ $this, 'disable_emojis' ] );

		// Remove versions from stylesheets and scripts if option set in customizer.
		if ( get_theme_mod( 'integrate_remove_script_versions' ) ) {
			add_filter( 'style_loader_src', [ $this, 'remove_wp_ver_css_js' ], 999 );
			add_filter( 'script_loader_src', [ $this, 'remove_wp_ver_css_js' ], 999 );
		}

		// jQuery UI fallback for HTML5 Contact Form 7 form fields.
		add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

		// Frontend styles.
		 add_action( 'wp_enqueue_scripts', [ $this, 'frontend_styles' ] );

		// Admin styles.
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_styles' ] );

		// Login styles.
		add_action( 'login_enqueue_scripts', [ $this, 'login_styles' ] );

		// Dependencies.
		$this->dependencies();

		// Register widgets.
		add_action( 'widgets_init', [ $this, 'widgets' ] );

		// Remove WooCommerce styles.
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	}

	/**
	 * Theme setup.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function setup() {

		/**
		 * Load domain for translation.
		 *
		 * @since Controlled_Chaos 1.0.1
		 */
		load_theme_textdomain( 'controlled-chaos' );

		/**
		 * Add theme support.
		 *
		 * @since Controlled_Chaos 1.0.1
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
		 */

		// Default color choices.
		$gutenberg_colors = apply_filters( 'cct_gutenberg_colors', [
			'#444',
			'#eee',
			'#23282d',
			'#32373c',
			'#0073aa',
			'#00a0d2'
		 ] );

		add_theme_support( 'gutenberg', [
			'wide-images' => true,
			'colors'      => $gutenberg_colors,
		 ] );

		// Customizer widget refresh support.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		// TODO: add Fancybox to WC products.
		// add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Beaver Builder support.
		add_theme_support( 'fl-theme-builder-headers' );
		add_theme_support( 'fl-theme-builder-footers' );
		add_theme_support( 'fl-theme-builder-parts' );

		// Featured image support.
		add_theme_support( 'post-thumbnails' );

		// Customizer logo upload support.
		add_theme_support( 'custom-logo', [
			'width'       => apply_filters( 'cct_logo_width', 180 ),
			'height'      => apply_filters( 'cct_logo_height', 180 ),
			'flex-width'  => apply_filters( 'cct_logo_flex_width', true ),
			'flex-height' => apply_filters( 'cct_logo_flex_height', true )
		 ] );

		 /**
		 * Set content width.
		 *
		 * @since Controlled_Chaos 1.0.1
		 */
		
		if ( ! isset( $content_width ) ) {
			$content_width = 1280;
		}

		/**
		 * Register theme menus.
		 */
		register_nav_menus( [
				'main'   => apply_filters( 'cct_main_menu_name', esc_html__( 'Main Menu', 'controlled-chaos' ) ),
				'footer' => apply_filters( 'cct_footer_menu_name', esc_html__( 'Footer Menu', 'controlled-chaos' ) ),
				'social' => apply_filters( 'cct_social_menu_name', esc_html__( 'Social Menu', 'controlled-chaos' ) )
		] );

		/**
		 * Add stylesheet for the content editor.
		 *
		 * @since Controlled_Chaos 1.0.1
		 */
		add_editor_style( '/assets/css/editor-style.css', [ 'cct-admin' ], '', 'screen' );

		/**
		 * Disable Jetpack open graph. We have the open graph tags in the theme.
		 *
		 * @since Controlled_Chaos 1.0.1
		 */
		if ( class_exists( 'Jetpack' ) ) {
			add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );
		}

	}

	/**
	 * Clean up meta tags from the <head>.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function head_cleanup() {

		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'wp_site_icon', 99 );
	}

	/**
	 * Frontend scripts.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function frontend_scripts() {

		wp_enqueue_script( 'jquery' );

		// Get Modernizr from CDN.
		wp_enqueue_script( 'modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js' );

		// HTML 5 support.
		wp_enqueue_script( 'cct-html5',  get_theme_file_uri( '/assets/js/html5.min.js' ), [], '' );
		wp_script_add_data( 'cct-html5', 'conditional', 'lt IE 9' );

		// Comments scripts.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Admin scripts.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function admin_scripts() {



	}

	/**
	 * Disable emojis.
	 *
	 * @since Controlled_Chaos 1.0.1
	 *
	 * Emojis will still work in modern browsers.
	 */
	public function disable_emojis() {

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	}

	/**
	 * Frontend styles.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function frontend_styles() {

		// Theme sylesheet.
		wp_enqueue_style( 'cct-style',      get_stylesheet_uri(), [], '', 'screen' );

		// Internet Explorer styles.
		wp_enqueue_style( 'cct-ie8',        get_theme_file_uri( '/assets/css/ie8.css' ), [], '', 'screen' );
		wp_style_add_data( 'cct-ie8', 'conditional', 'lt IE 9' );

		/**
		 * Check if we and/or Google are online. If so, get Google fonts
		 * from their servers. Otherwise, get them from the theme directory.
		 */
		$google = checkdnsrr( 'google.com' );

		if ( $google ) {
			wp_enqueue_style( 'cct-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Source+Code+Pro:200,300,400,500,600,700,900', [], '', 'screen' );
		} else {
			wp_enqueue_style( 'cct-sans',  get_theme_file_uri( '/assets/fonts/open-sans/open-sans.min.css' ), [], '', 'screen' );
			wp_enqueue_style( 'cct-serif', get_theme_file_uri( '/assets/fonts/merriweather/merriweather.min.css' ), [], '', 'screen' );
			wp_enqueue_style( 'cct-code',  get_theme_file_uri( '/assets/fonts/source-code-pro/source-code-pro.min.css' ), [], '', 'screen' );
		}

		// Media and supports queries.
		wp_enqueue_style( 'cct-queries',   get_theme_file_uri( '/queries.css' ), [], '', 'screen' );

		// Print styles.
		wp_enqueue_style( 'cct-print',     get_theme_file_uri( '/assets/css/print.css' ), [], '', 'print' );

	}

	/**
	 * Admin styles.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function admin_styles() {



	}

	/**
	 * Login styles.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function login_styles() {

		wp_enqueue_style( 'custom-login', get_theme_file_uri( '/assets/css/login.css' ), [], '', 'screen' );

	}

	/**
	 * Remove versions from stylesheets and scripts.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function remove_wp_ver_css_js( $src ) {

		if ( strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src );
		}

		return $src;
	}

	/**
	 * Theme dependencies.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	private function dependencies() {

		// Set up the <head> element.
		require_once get_parent_theme_file_path( '/includes/head.php' );

	}

	/**
	 * Register widget areas.
	 *
	 * @since Controlled_Chaos 1.0.1
	 */
	public function widgets() {

		// Aside widget filters
		$sidebar_widget_name   = apply_filters( 'cct_sidebar_widget_name', esc_html__( 'Sidebar Widget Area', 'controlled-chaos' ) );
		$sidebar_widget_desc   = apply_filters( 'cct_sidebar_widget_desc', esc_html__( '', 'controlled-chaos' ) );
		$sidebar_before_widget = apply_filters( 'cct_sidebar_before_widget', '<div id="%1$s" class="widget sidebar-widget %2$s">' );
		$sidebar_after_widget  = apply_filters( 'cct_sidebar_after_widget', '</div>' );
		$sidebar_before_title  = apply_filters( 'cct_sidebar_before_title', '<h3 class="widget-title">' );
		$sidebar_after_title   = apply_filters( 'cct_sidebar_after_title', '</h3>' );

		// Register aside widget area
		register_sidebar( array(
			'name'          => $sidebar_widget_name,
			'id'            => 'sidebar-widgets',
			'description'   => $sidebar_widget_desc,
			'before_widget' => $sidebar_before_widget,
			'after_widget'  => $sidebar_after_widget,
			'before_title'  => $sidebar_before_title,
			'after_title'   => $sidebar_after_title,
		) );

	}

}

// Run the Controlled_Chaos_Functions class.
$controlled_chaos_functions = new Controlled_Chaos_Functions;