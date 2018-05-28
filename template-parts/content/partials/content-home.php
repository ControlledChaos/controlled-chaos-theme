<?php
/**
 * Blog HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

    do_action( 'cctheme_before_main' ); ?>
    
	<main class="main" role="main" itemscope itemprop="mainContentOfPage">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'cctheme_before_article' ); ?>
        <article class="hentry" id="post-<?php the_ID(); ?>" role="article">
            <header class="entry-header">
                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            </header>
            <div class="entry-content" itemprop="articleBody">
            <?php if ( '' !== get_the_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php
                    $size = apply_filters( 'cctheme_blog_thumbnail_size', 'medium' );
                    $args = apply_filters( 'cctheme_blog_thumbnail_args', [
                        'class' => 'alignnone'
                    ] );
                    echo get_the_post_thumbnail( $post->ID, $size, $args ); ?></a>
                </div><!-- post-thumbnail -->
                <?php endif; ?>
                <?php do_action( 'cctheme_before_content' ); ?>
                <?php if ( 'excerpt' == cctheme_sanitize_blog_content_format( get_theme_mod( 'cctheme_blog_content_format' ) ) ) {
                    the_excerpt();
                } else {
                    the_content();
                } ?>
                <?php do_action( 'cctheme_after_content' ); ?>
            </div><!-- entry-content -->
        </article>
		<?php do_action( 'cctheme_after_article' ); ?>
    <?php endwhile; endif; ?>
	</main>
	<?php do_action( 'cctheme_after_main' ); ?>