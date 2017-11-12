<?php
/**
 * Controlled_Chaos head template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Controlled_Chaos head template.
 */
class Controlled_Chaos_Head {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		// Tags before the wp_head() function.
		$this->before_wp_head();

		// wp_head() function.
		wp_head();

		// Tags after the wp_head() function.
		$this->after_wp_head();

    }

    /**
	 * Tags before the wp_head() function.
	 * 
	 * @since IntegratePress 1.0.1
	 */
	public function before_wp_head() {

		echo '<head data-template-set="integratepress">';

		echo sprintf( '<meta charset="%1s">', get_bloginfo( 'charset' ) );
		echo '
		<!--[if IE ]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<![endif]-->' . "\r";

		$meta_viewport = '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>';
		$viewport      = apply_filters( 'igp_meta_viewport', $meta_viewport );
		echo $viewport . "\r";

    }
    
    /**
	 * Tags after the wp_head() function.
	 * 
	 * @since IntegratePress 1.0.1
	 */
	public function after_wp_head() {

		global $post;

		echo '<link rel="profile" href="http://gmpg.org/xfn/11" />';
		if ( is_singular() && pings_open() ) {
			echo sprintf( '<link rel="pingback" href="%s" />', get_bloginfo( 'pingback_url' ) );
		}
		echo sprintf( '<link href="%1s" rel="canonical" />', get_the_permalink() ) . "\r";

		echo '<meta name="title" content="">' . "\r";
		echo '<meta name="description" content="" />' . "\r";
		echo '<meta name="author" content="" />' . "\r";
		if ( is_search() ) { echo '<meta name="robots" content="noindex,nofollow" />'; }
		
		if ( ! is_404() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'Sharing Image', [ 600, 315 ], true, '' );
		}
		
		if ( has_post_thumbnail() ) {
			$src = $image[0];
		} else {
			$src = get_template_directory_uri() . '/assets/images/default-sharing-image.jpg';
		}

		echo "\r" . '<!-- Open Graph meta -->' . "\r";
		echo '<meta property="og:url" content="' . get_the_permalink() . '" />' . "\r";
		echo '<meta property="og:locale" content="' . get_locale() . '" />' . "\r";
		echo '<meta property="og:site_name" content="" />' . "\r";
		echo '<meta property="og:title" content="" />' . "\r";
		echo '<meta property="og:type" content="" />' . "\r";
		echo '<meta property="og:description" content="" />' . "\r";
		echo '<meta property="og:image" content="' . $src . '" />' . "\r";

		echo "\r" . '<!-- Twitter Card meta data -->' . "\r";
		echo '<meta name="twitter:card" content="summary_large_image" />' . "\r";
		echo '<meta name="twitter:domain" content="' . esc_url( home_url() ) . '">' . "\r";
		echo '<meta name="twitter:site" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\r";
		echo '<meta name="twitter:title" content="" />' . "\r";
		echo '<meta name="twitter:description" content="" />' . "\r";
		echo '<meta name="twitter:url" content="' . get_the_permalink() . '" />' . "\r";
		echo '<meta name="twitter:image:src" content="' . $src . '" />' . "\r";

		echo '</head>';

	}
    
}