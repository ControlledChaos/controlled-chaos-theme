<?php
/**
 * Begin content wrapper.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled Chaos 1.0.0
 */
namespace Controlled_Chaos;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

$content_wrapper_class = apply_filters( 'cct_content_wrapper_class', '' );

?>
<div id="content" class="site-content global-wrapper page-wrapper <?php echo $content_wrapper_class; ?>">