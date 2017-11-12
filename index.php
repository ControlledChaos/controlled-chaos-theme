<?php
/**
 * Content template
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled Chaos 1.0.0
 */
namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
<div id="content" class="site-content wrapper">
	<main class="main" role="main" itemscope itemprop="mainContentOfPage">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content' );
			$cct_content = new Controlled_Chaos_Content;
			endwhile;
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif; ?>
	</main>
	<?php get_sidebar(); ?>
</div><!-- site-content -->
<?php get_footer();