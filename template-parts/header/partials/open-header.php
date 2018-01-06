<?php
/**
 * Header opening tags and before header actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

do_action( 'cct_before_header' ); ?>
<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">