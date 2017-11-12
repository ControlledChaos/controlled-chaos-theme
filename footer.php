<?php
/**
 * Footer template
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 *
 */

namespace Controlled_Chaos;

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_template_part( 'template-parts/footer/footer' );
$cct_footer = new Controlled_Chaos_Footer; ?>

</body>
</html>