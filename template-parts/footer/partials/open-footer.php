<?php
/**
 * Footer opening tags and before footer actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

do_action( 'cct_before_footer' );

echo '<footer>', "\r";