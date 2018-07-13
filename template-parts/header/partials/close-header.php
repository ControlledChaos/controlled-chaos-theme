<?php
/**
 * Header closing tags and after header actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>
</header>
<?php do_action( 'cct_after_header' ); ?>