<?php
/**
 * Search HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<article class="hentry" id="post-<?php the_ID(); ?>" role="article">
    <header class="entry-header">
        <?php echo apply_filters( 'cct_front_page_title', the_title( '<h2 class="entry-title">', '</h2>' ) ); ?>
    </header>
    <div class="entry-content" itemprop="articleBody">
    <?php
    if ( '' !== get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php
            $size = apply_filters( 'cct_search_thumbnail_size', 'thumbnail' );
            echo get_the_post_thumbnail( $post->ID, $size ); ?>
        </div><!-- post-thumbnail -->
    <?php endif;
        echo apply_filters( 'cct_search_content', the_content() ); ?>
    </div><!-- entry-content -->
</article>