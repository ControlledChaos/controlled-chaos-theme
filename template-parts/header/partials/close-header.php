<?php
/**
 * Header closing tags and after header actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

echo '</header>', "\r";

do_action( 'cct_after_header' );