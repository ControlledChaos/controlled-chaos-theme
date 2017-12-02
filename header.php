<?php
/**
 * Head element and header HTML.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

$cct_head = new Controlled_Chaos_Head;

do_action( 'controlled_chaos_body' );
do_action( 'controlled_chaos_loader' );
do_action( 'controlled_chaos_topbar' );

/**
 * Use GeneratePress action to add header
 * for removal by certain theme builders.
 * 
 * @since Controlled_Chaos 1.0.2
 */
get_template_part( 'template-parts/header/header' );
do_action( 'generate_header' );