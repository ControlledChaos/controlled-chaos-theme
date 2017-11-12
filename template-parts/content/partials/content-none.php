<?php
/**
 * Singular HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<article class="hentry" id="post-<?php the_ID(); ?>" role="article">
    <header class="entry-header">
        <?php echo apply_filters( 'cct_no_content_title', sprintf( '<h1 class="entry-title">%1s</h1>', esc_html__( 'Nothing Found' ) ) ); ?>
    </header>
    <div class="entry-content" itemprop="articleBody">
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'controlled-chaos' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php else : ?>
		<p><?php _e( 'No content available at this time. Maybe try searching&hellip;', 'controlled-chaos' ); ?></p>
	<?php
		get_search_form();
	endif; ?>
    </div><!-- entry-content -->
</article>