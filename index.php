<?php
/**
 * Content template
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled Chaos 1.0.1
 */
namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
<div id="content" class="site-content wrapper">
	<?php do_action( 'cct_before_main' ); ?>
	<main class="main" role="main" itemscope itemprop="mainContentOfPage">
		<?php do_action( 'cct_before_content' ); ?>
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			echo Controlled_Chaos_Content::partials();
			endwhile;
		else :
			get_template_part( 'template-parts/content/partials/content', 'none' );
		endif; ?>
		<?php do_action( 'cct_after_content' ); ?>
	</main>
	<?php do_action( 'cct_after_main' ); ?>
	<?php get_sidebar(); ?>
</div><!-- site-content -->
<?php get_footer();