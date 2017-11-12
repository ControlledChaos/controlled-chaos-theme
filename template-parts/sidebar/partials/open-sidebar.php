<?php
/**
 * Sidebar opening tags and before sidebar actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

do_action( 'cct_before_sidebar' );

echo '<aside class="sidebar">', "\r";