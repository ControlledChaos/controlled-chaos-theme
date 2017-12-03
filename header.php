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

do_action( 'cct_body' );
do_action( 'cct_loader' );
do_action( 'cct_topbar' );
get_template_part( 'template-parts/header/class', 'controlled-chaos-header' );
do_action( 'cct_header' );