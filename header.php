<?php
/**
 * Head element and header HTML.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php do_action( 'cct_before_html' ); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php $cct_head = new Controlled_Chaos_Head;

get_template_part( 'includes/template-tags/class-body-element' );
$cct_body = new Controlled_Chaos_Body_Element;

get_template_part( 'template-parts/header/header' );
$cct_header = new Controlled_Chaos_Header;