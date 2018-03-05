<?php
/**
 * Body element tag.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="<?php do_action( 'cct_body_schema' ); ?>">
