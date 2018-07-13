<?php
/**
 * Body element.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Body element.
 */
class Body_Schema {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		add_action( 'cct_body_schema', [ $this, 'schema' ] );

	}

	/**
	 * Conditional Schema attributes.
	 */
	public function schema() {

		// Change page slugs and template names as needed
		if ( is_page( 'about' ) || is_page( 'about-us' ) || is_page_template( 'page-about.php' ) || is_page_template( 'about.php' ) ) {
			$itemtype = esc_attr( 'AboutPage' );
		} elseif ( is_page( 'contact' ) || is_page( 'contact-us' ) || is_page_template( 'page-contact.php' ) || is_page_template( 'contact.php' ) ) {
			$itemtype = esc_attr( 'ContactPage' );
		} elseif ( is_page( 'faq' ) || is_page( 'faqs' ) || is_page_template( 'page-faq.php' ) || is_page_template( 'faq.php' ) ) {
			$itemtype = esc_attr( 'QAPage' );
		} elseif ( is_page( 'cart' ) || is_page( 'shopping-cart' ) || is_page( 'checkout' ) || is_page_template( 'cart.php' ) || is_page_template( 'checkout.php' ) ) {
			$itemtype = esc_attr( 'CheckoutPage' );
		} elseif ( is_front_page() || is_page() ) {
			$itemtype = esc_attr( 'WebPage' );
		} elseif ( is_author() || is_plugin_active( 'buddypress/bp-loader.php' ) && bp_is_home() || is_plugin_active( 'bbpress/bbpress.php' ) && bbp_is_user_home() ) {
			$itemtype = esc_attr( 'ProfilePage' );
		} elseif ( is_search() ) {
			$itemtype = esc_attr( 'SearchResultsPage' );
		} else {
			$itemtype = esc_attr( 'Blog' );
		}

		echo $itemtype;

	}

}

new Body_Schema;