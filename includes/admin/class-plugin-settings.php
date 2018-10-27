<?php
/**
 * Admin settings if the companion plugin is active.
 *
 * Also checks for Advanced Custom Fields. Whether ACF
 * is active or not, this will add settings to the
 * Site Settings page registered by the plugin.
 *
 * @package    Controlled_Chaos_Theme
 * @subpackage Includes\Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @todo       Begin adding to the Site Settings page.
 */
namespace CC_Theme\Includes\Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;