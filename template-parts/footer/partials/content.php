<?php
/**
 * Footerr HTML and content output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

$site_name      = esc_attr( get_bloginfo( 'name' ) );
$copyright_text = sprintf( '<p class="copyright-text">&copy;<span itemprop="copyrightYear">%1s</span> <span itemprop="copyrightHolder">%2s.</span> %3s.</p>', get_the_time( 'Y' ), $site_name, esc_html__( 'All rights reserved', 'integratepress' ) );

$copyright = apply_filters( 'cct_copyright_text', $copyright_text );
echo $copyright, "\r";