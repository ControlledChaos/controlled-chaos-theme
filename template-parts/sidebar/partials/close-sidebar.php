<?php
/**
 * Sidebar closing tags and after sidebar actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

echo '</aside>', "\r";

do_action( 'cct_after_sidebar' );