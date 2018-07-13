<?php
/**
 * Begin the <head> section.
 * 
 * Use the before_html hook for things such as
 * acf_form_head for Advanced Custom Fields
 * conditional frontend forms.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

// Get the site languge.
$language = get_language_attributes();

// Apply filter for adding classes or more attributes.
$tag      = '<html ' . $language . ' class="no-js">';
$html_tag = apply_filters( 'cct_html_tag', $tag );

?>
<!DOCTYPE html>
<?php do_action( 'before_html' ); ?>
<?php echo $html_tag; ?>