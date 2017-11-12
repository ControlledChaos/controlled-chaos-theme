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
<?php
$cct_head = new Controlled_Chaos_Head;
$cct_body = new Controlled_Chaos_Body_Element;

/**
 * Use GeneratePress action to add header
 * for removal by theme builders.
 * 
 * @since Controlled_Chaos 1.0.2
 */
get_template_part( 'template-parts/header/header' );
do_action( 'generate_header' );