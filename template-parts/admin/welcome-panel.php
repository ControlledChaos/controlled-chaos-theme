<?php
/**
 * Custom welcome panel output.
 *
 * Provided are several widget areas and hooks for adding content.
 * The `do_action` hooks are named and placed to be similar to the
 * before and after pseudoelements in CSS.
 *
 * Uses the companion plugin prefix.
 * @see        functions.php
 *
 * @package    Controlled_Chaos_Theme
 * @subpackage Template_Parts\Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CC_Theme\Template_Parts\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Bail if the companion plugin is not active.
if ( ! is_plugin_active( CCT_PLUGIN ) ) {
	return;
}

// Get the current user name for the greeting.
$current_user = wp_get_current_user();
$user_name    = $current_user->display_name;

// Add a filterable subheading.
$subheading = sprintf(
	'<h3>%1s %2s %3s.</h3>',
	esc_html__( 'This is your custom', 'controlled-chaos' ),
	get_bloginfo( 'name' ),
	esc_html__( 'welcome panel', 'controlled-chaos' )
);
$subheading = apply_filters( CCT_PLUGIN_PREFIX . '_welcome_subheading', $subheading );

// Add a filterable description.
$about_desc = apply_filters( CCT_PLUGIN_PREFIX . '_welcome_about', __( 'Put your welcome message here.', 'controlled-chaos' ) );

?>
<?php do_action( CCT_PLUGIN_PREFIX . '_before_welcome_panel_content' ); ?>
<div class="welcome-panel-content custom">
	<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_content_before' ); ?>

	<?php echo sprintf(
		'<h2>%1s %2s.</h2>',
		esc_html__( 'Welcome,', 'controlled-chaos' ),
		$user_name
	); ?>
	<p class="about-description"><?php echo $about_desc; ?></p>
	<?php echo $subheading; ?>
	<p><?php _e( 'Use this to provide handy links to manage content, informational widgets, or maybe an instructional video.' ); ?></p>
	<p><?php _e( 'No CSS has been applied to this welcome panel. Add styles as necessary for your project.' ); ?></p>

	<div class="welcome-panel-column-container">
		<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_container_before' ); ?>

		<div class="welcome-panel-column">
			<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_first_before' ); ?>

				<?php if ( is_active_sidebar( CCT_PLUGIN_PREFIX . '_welcome_widget_first' ) ) {

					dynamic_sidebar( CCT_PLUGIN_PREFIX . '_welcome_widget_first' );

				} else {

					$placeholder = sprintf(
						'<h3>%1s</h3>',
						esc_html( 'Column One', 'controlled-chaos' )
					);
					$placeholder .= sprintf(
						'<p><a href="%1s">%2s</a> %3s.</p>',
						admin_url( 'widgets.php' ),
						__( 'Add a widget', 'controlled-chaos' ),
						__( 'to this area', 'controlled-chaos' )
					);

					echo $placeholder;

				} ?>

			<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_first_after' ); ?>
		</div>
		<div class="welcome-panel-column">
			<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_second_before' ); ?>

			<?php if ( is_active_sidebar( CCT_PLUGIN_PREFIX . '_welcome_widget_second' ) ) {

					dynamic_sidebar( CCT_PLUGIN_PREFIX . '_welcome_widget_second' );

				} else {

					$placeholder = sprintf(
						'<h3>%1s</h3>',
						esc_html( 'Column Two', 'controlled-chaos' )
					);
					$placeholder .= sprintf(
						'<p><a href="%1s">%2s</a> %3s.</p>',
						admin_url( 'widgets.php' ),
						__( 'Add a widget', 'controlled-chaos' ),
						__( 'to this area', 'controlled-chaos' )
					);

					echo $placeholder;

				} ?>

			<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_second_after' ); ?>
		</div>
		<div class="welcome-panel-column welcome-panel-last">
			<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_last_before' ); ?>

			<?php if ( is_active_sidebar( CCT_PLUGIN_PREFIX . '_welcome_widget_last' ) ) {

					dynamic_sidebar( CCT_PLUGIN_PREFIX . '_welcome_widget_last' );

				} else {

					$placeholder = sprintf(
						'<h3>%1s</h3>',
						esc_html( 'Column Three', 'controlled-chaos' )
					);
					$placeholder .= sprintf(
						'<p><a href="%1s">%2s</a> %3s.</p>',
						admin_url( 'widgets.php' ),
						__( 'Add a widget', 'controlled-chaos' ),
						__( 'to this area', 'controlled-chaos' )
					);

					echo $placeholder;

				} ?>

			<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_last_after' ); ?>
		</div>

		<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_column_container_after' ); ?>
	</div>

	<?php do_action( CCT_PLUGIN_PREFIX . '_welcome_panel_content_after' ); ?>
</div>
<?php do_action( CCT_PLUGIN_PREFIX . '_after_welcome_panel_content' ); ?>