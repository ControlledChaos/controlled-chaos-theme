<?php
/**
 * Secondary sidebar.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

register_sidebar( array(
    'name'          => __( 'Secondary Sidebar', 'controlled-chaos' ),
    'id'            => 'secondary-sidebar',
    'description'   => __( 'Sidebar that displays on the Two Sidebars template', 'controlled-chaos' ),
    'before_widget' => '<div id="%1$s" class="widget secondary-sidebar-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );