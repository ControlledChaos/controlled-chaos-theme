<?php
/**
 * Header closing tags and after header actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>
</header>
<?php do_action( 'cct_after_header' ); ?>