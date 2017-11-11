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
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php do_action( 'cct_before_html' ); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php $cct_head = new Controlled_Chaos_Head; ?>

<body>
<?php
get_template_part( 'template-parts/header/header' );
$cct_header = new Controlled_Chaos_Header;
?>