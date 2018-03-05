<?php
/**
 * Body element tag.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="<?php do_action( 'cct_body_schema' ); ?>">
