<?php
/**
 * Site branding.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Conditional title tag.
 */
if ( is_front_page() && ! is_paged() ) {
    $title = sprintf( '<h1 class="site-title" itemprop="name">%1$s</h1>', get_bloginfo( 'name' ) );
} else {
    $title = sprintf( '<p class="site-title" itemprop="name"><a href="%1$s" rel="home">%2$s</a></p>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ) );
}
$site_title = apply_filters( 'cct_site_title', $title );

/**
 * Site descrition, if any.
 */
$description = get_bloginfo( 'description' );
if ( ! empty( $description ) ) {
    $description = sprintf( '<p class="site-description" itemprop="description">%1s</p>', esc_html__( get_bloginfo( 'description' ) ) );
} else {
    $description = '';
}
$site_description = apply_filters( 'cct_site_description', $description );

/**
 * Site logo.
 */
$logo_id  = get_theme_mod( 'custom_logo' );
$get_logo = wp_get_attachment_image_src( $logo_id , 'full' );
if ( function_exists( 'the_custom_logo' ) ) :
    if ( is_front_page() ) {
        $output = '<img src="' . esc_url( $get_logo[0] ) . '">';
    } else {
        $output = the_custom_logo();
    }
endif;
$logo = apply_filters( 'cct_logo', $output );

/**
 * Output header content.
 */
do_action( 'cct_before_header_content' ); ?>
    <div class="header-content global-wrapper header-wrapper">
    <?php if ( has_custom_logo() ) : ?>
        <div class="site-logo">
            <?php echo $logo; ?>
        </div>
<?php endif; ?>
    <div class="site-title-description">
            <?php echo $site_title, "\r"; ?>
            <?php echo $site_description, "\r"; ?>
        </div>
    </div><!-- header-content -->
<?php do_action( 'cct_after_header_content' );