<?php
/**
 * Site branding.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

echo '</footer>', "\r";

do_action( 'cct_after_footer' );