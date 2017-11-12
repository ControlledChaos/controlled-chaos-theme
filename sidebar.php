<?php
/**
 * Sidebar HTML template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_template_part( 'template-parts/sidebar/sidebar' );
$cct_sidebar = new Controlled_Chaos_Sidebar;