<?php
/**
 * Post comments template
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

if ( post_password_required() ) {
	return;
}
?>

<section class="comments-section">

<?php	
$commenter = wp_get_current_commenter();
$req_email = get_option( 'require_name_email' );
$aria_req  = ( $req_email ? " aria-required='true'" : '' );
$fields    =  array(
	'author' => '<p class="comment-form-author"><label for="author">' . apply_filters( 'igp_comments_name_label', __( 'Name', 'controlled-chaos' ) ) . '</label> ' . ( $req_email ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email"><label for="email">' . apply_filters( 'igp_comments_email_label', __( 'Email', 'controlled-chaos' ) ) . '</label> ' . ( $req_email ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></p>',
	'url'    => '<p class="comment-form-url"><label for="url">' . apply_filters( 'igp_comments_website_label', __( 'Website', 'controlled-chaos' ) ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>',
);

$comments_args = array(
	'id_form'              => 'comment-form',
	'id_submit'            => 'comment-submit',
	'class_submit'         => 'comment-submit',
	'name_submit'          => 'submit',
	'title_reply'          => apply_filters( 'igp_comments_title_reply', __( 'Comments', 'controlled-chaos' ) ),
	'title_reply_to'       => apply_filters( 'igp_comments_title_reply_to', __( 'Reply to %s', 'controlled-chaos' ) ),
	'cancel_reply_link'    => apply_filters( 'igp_comments_cancel_reply_link', __( 'Cancel reply', 'controlled-chaos' ) ),
	'label_submit'         => apply_filters( 'igp_comments_label_submit', __( 'Submit', 'controlled-chaos' ) ),
	'format'               => 'html5',
	'comment_field'        =>  '<p class="comment-form-comment"><label for="comment">' . apply_filters( 'igp_comments_comment_field_label', __( 'Leave a comment:', 'controlled-chaos' ) ) . '</label><br /><textarea id="comment" name="comment" aria-required="true">' . '</textarea></p>',
	'must_log_in'          => '<p class="comment-form-log-in">' . apply_filters( 'igp_comments_must_log_in', sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'controlled-chaos' ), wp_login_url() ) ) . '</p>',
	'logged_in_as'         => '<p class="comment-form-logged-in">' . apply_filters( 'igp_comments_logged_in_as', sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a class="comment-form-log-out" href="%3$s" title="Log out of this account">Log out?</a>', 'controlled-chaos' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url() ) ) . '</p>',
	'comment_notes_before' => '<p class="comment-form-notes">' . apply_filters( 'igp_comments_notes_before', __( 'Your email address will not be published.', 'controlled-chaos' ) ) . '</p>',
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
);

comment_form( $comments_args );

if ( have_comments() ) : ?>

	<h3 class="comments-title">
		<?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				printf( _x( 'One comment on %s', 'comments title', 'controlled-chaos' ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s Comment on %2$s',
						'%1$s Comments on %2$s',
						$comments_number,
						'comments title',
						'controlled-chaos'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
		?>
	</h3>

	<?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) {
		printf( '<p class="comments-open-closed"><span class="comments-closed">%1$s</span></p>', apply_filters( 'igp_comments_closed', __( 'Comments are closed for this post.', 'controlled-chaos' ) ) );
	} ?>

	<div id="comments" class="comments">

		<ol class="comment-list">
			<?php wp_list_comments(); ?>
		</ol>
	
	</div><!-- comments -->
	
<?php else : ?>

	<?php
		if ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) {
			printf( '<p class="comments-open-closed"><span class="comments-open">%1$s</span></p>', apply_filters( 'igp_comments_none', __( 'Be the first to comment!', 'controlled-chaos' ) ) );
		} elseif ( post_type_supports( get_post_type(), 'comments' ) ) {
			printf( '<p class="comments-open-closed"><span class="comments-closed">%1$s</span></p>', apply_filters( 'igp_comments_closed', __( 'Comments are closed for this post.', 'controlled-chaos' ) ) );
		}
	
endif; ?>
</section><!-- comments-section -->