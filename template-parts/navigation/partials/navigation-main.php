<?php
/**
 * Main site navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;
$before = apply_filters( 'cct_main_nav_item_before', '<span class="main-nav-item-before"></span>' );
$after  = apply_filters( 'cct_main_nav_item_after', '<span class="main-nav-item-after"></span>' );
$args   = [
        'menu'            => 'main',
        'menu_class'      => 'main-nav-menu-list',
        'menu_id'         => 'main-nav-menu-list',
        'container'       => 'div', // Can use false to remove container.
        'container_class' => 'main-nav-menu',
        'container_id'    => 'main-nav-menu',
        'fallback_cb'     => '',
        'before'          => $before,
        'after'           => $after,
        'link_before'     => '',
        'link_after'      => '',
        'echo'            => true,
        'depth'           => 0,
        'walker'          => '',
        'theme_location'  => 'main',
        // 'items_wrap'      => '', // Uses printf() format with numbered placeholders.
        'item_spacing'    => 'preserve' // Accepts 'preserve' or 'discard'.
]; ?>
<nav class="main-navigation" role="directory" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="main-navigation global-wrapper main-navigation-wrapper">
	<?php $menu_toggle = apply_filters( 'cct_nav_toggle_text', esc_html__( 'Menu', 'controlled-chaos' ) ); ?>
		<button id="main-nav-toggle" class="main-nav-toggle" aria-controls="main-nav-menu" aria-expanded="false"><?php echo $menu_toggle; ?></button>
		<?php wp_nav_menu( $args ); ?>
	</div>
</nav>