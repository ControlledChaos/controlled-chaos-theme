<?php
/**
 * Footer opening tags and before footer actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

do_action( 'cct_before_footer' );

echo '<footer>', "\r";