<?php
/**
 * Singular HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

    do_action( 'cct_before_main' ); ?>
    
	<main class="main" role="main" itemscope itemprop="mainContentOfPage">
		<?php do_action( 'cct_before_article' ); ?>
        <article class="hentry" id="post-<?php the_ID(); ?>" role="article">
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>
            <div class="entry-content" itemprop="articleBody">
            <?php
            if ( '' !== get_the_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php
                    $size = apply_filters( 'cct_singular_thumbnail_size', 'banner' );
                    $args = apply_filters( 'cct_singular_thumbnail_args', [
                        'class' => 'alignnone'
                    ] );
                    echo get_the_post_thumbnail( $post->ID, $size, $args ); ?>
                </div><!-- post-thumbnail -->
            <?php endif;
                the_content(); ?>
            </div><!-- entry-content -->
        </article>
        <?php do_action( 'cct_after_article' ); ?>
        <?php if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
	</main>
	<?php do_action( 'cct_after_main' ); ?>