<?php
/**
 * Sidebar HTML and widget output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="sidebar-content">
    <?php do_action( 'cct_before_sidebar_widgets' ); ?>
    <div class="sidebar-widgets">
        <?php dynamic_sidebar( 'sidebar-widgets' ); ?>
    </div>
    <?php do_action( 'cct_after_sidebar_widgets' ); ?>
</div><!-- sidebar-content -->