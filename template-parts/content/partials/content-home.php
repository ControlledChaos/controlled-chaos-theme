<?php
/**
 * Blog HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

// Do not namespace this class.

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<article class="hentry" id="post-<?php the_ID(); ?>" role="article">
    <header class="entry-header">
        <?php echo apply_filters( 'cct_front_page_title', the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ) ); ?>
    </header>
    <div class="entry-content" itemprop="articleBody">
    <?php
    if ( '' !== get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>"><?php
            $size = apply_filters( 'cct_blog_thumbnail_size', 'medium' );
            $args = apply_filters( 'cct_blog_thumbnail_args', [
                'class' => 'alignnone'
            ] );
            echo get_the_post_thumbnail( $post->ID, $size, $args ); ?></a>
        </div><!-- post-thumbnail -->
    <?php endif;
        if ( 'excerpt' == cct_sanitize_blog_content_format( get_theme_mod( 'cct_blog_content_format' ) ) ) {
            echo apply_filters( 'cct_blog_content', the_excerpt() );
        } else {
            echo apply_filters( 'cct_blog_content', the_content() );
        } ?>
    </div><!-- entry-content -->
</article>