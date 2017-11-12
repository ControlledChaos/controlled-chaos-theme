<?php
/**
 * Post comments template
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

if ( post_password_required() ) {
	return;
}

$commenter = wp_get_current_commenter();
$req_email = get_option( 'require_name_email' );
if ( $req_email ) {
	$aria_req = ' aria-required="true" ';
	$required = ' <span class="required">*</span>';
} else {
	$aria_req = '';
	$required = '';
}

$fields =  apply_filters( 'cct_comments_signup_fields', [
	'author' => sprintf( '<p class="comment-form-author"><label for="author">%1s</label> %2s<input id="author" name="author" type="text" value="%3s"' . $aria_req . ' /></p>', __( 'Name', 'controlled-chaos' ), $required, esc_attr( $commenter['comment_author'] ) ),
	'email'  => sprintf( '<p class="comment-form-email"><label for="email">%1s</label> %2s<input id="email" name="email" type="text" value="%3s"' . $aria_req . ' /></p>', __( 'Email', 'controlled-chaos' ), $required, esc_attr(  $commenter['comment_author_email'] ) ),
	'url'    => sprintf( '<p class="comment-form-url"><label for="url">%1s</label><input id="url" name="url" type="text" value="%2s" /></p>',  __( 'Website', 'controlled-chaos' ), esc_attr( $commenter['comment_author_url'] ) ),
] );

$comments_args = apply_filters( 'cct_comments_labels', [
	'id_form'              => 'comment-form',
	'id_submit'            => 'comment-submit',
	'class_submit'         => 'comment-submit',
	'name_submit'          => 'submit',
	'title_reply'          => __( 'Comments', 'controlled-chaos' ),
	'title_reply_to'       => __( 'Reply to %s', 'controlled-chaos' ),
	'cancel_reply_link'    => __( 'Cancel reply', 'controlled-chaos' ),
	'label_submit'         => __( 'Submit', 'controlled-chaos' ),
	'format'               => 'html5',
	'comment_field'        =>  sprintf( '<div class="comment-form-comment"><label for="comment">%1s</label><textarea id="comment" name="comment" aria-required="true"></textarea></div>', __( 'Leave a comment:', 'controlled-chaos' ) ),
	'must_log_in'          => sprintf( '<p class="comment-form-log-in">%1s <a href="%2s">%3s</a> %4s.</p>', __( 'You must be', 'controlled-chaos' ), wp_login_url(), __( 'logged in', 'controlled-chaos' ), __( 'to post a comment', 'controlled-chaos' ) ),
	'logged_in_as'         => sprintf( '<p class="comment-form-logged-in">%1s <a href="%2s">%3s</a>. <a class="comment-form-log-out" href="%4s" title="Log out of this account">%5s?</a></p>', __( 'Logged in as', 'controlled-chaos' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url(), __( 'Log out', 'controlled-chaos' ) ),
	'comment_notes_before' => '<p class="comment-form-notes">' . __( 'Your email address will not be published.', 'controlled-chaos' ) . '</p>',
	'fields'               => $fields,
] );

$comments_number = get_comments_number();
if ( 1 === $comments_number ) {
	$comments_title = sprintf( _x( 'One comment on %1s', 'comments title', 'controlled-chaos' ), get_the_title() );
} else {
	$comments_title = sprintf(
		_nx(
			'%1s Comment on %2s',
			'%1s Comments on %2s',
			$comments_number,
			'comments title',
			'controlled-chaos'
		),
		number_format_i18n( $comments_number ),
		get_the_title()
	);
}

$comments_none   = apply_filters( 'cct_comments_none', sprintf( '<p class="comments-none-closed"><span class="comments-none">%1s</span></p>', __( 'Be the first to comment!', 'controlled-chaos' ) ) );
$comments_closed = apply_filters( 'cct_comments_closed', sprintf( '<p class="comments-none-closed"><span class="comments-closed">%1s</span></p>', __( 'Comments are closed for this post.', 'controlled-chaos' ) ) );
?>

<section class="comments-section">
<?php comment_form( $comments_args );

if ( have_comments() ) :

	echo '<h3 class="comments-title">' . $comments_title . '</h3>';

	if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) {
		echo $comments_closed;
	} ?>

	<div id="comments" class="comments">

		<ol class="comment-list">
			<?php wp_list_comments(); ?>
		</ol>

	</div><!-- comments -->

<?php else :

	if ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) {
		echo $comments_none;
	} elseif ( post_type_supports( get_post_type(), 'comments' ) ) {
		echo $comments_closed;
	}

endif; ?>
</section><!-- comments-section -->