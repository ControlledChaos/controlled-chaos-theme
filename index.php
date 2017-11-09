<?php
/**
 * Blog index template
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled Chaos 1.0.0
 */
get_header(); ?>
<div id="content" class="site-content global-wrap">
	<main class="main" role="main" itemscope itemprop="mainContentOfPage">
		<header class="blog-title">
		<?php $posts_title = esc_html__( 'Posts', 'ccdtheme' ); ?>
			<h1><?php echo apply_filters( 'ccdtheme_posts_pages_title', $posts_title ); ?></h1>
		</header>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile;

		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>
	</main>
	<?php get_sidebar(); ?>
</div><!-- site-content -->
<?php get_footer(); ?>
