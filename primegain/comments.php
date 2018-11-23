<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( '<span>1</span> Comment', '<span>%1$s</span> Comments', get_comments_number(), 'twentytwelve' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
					
					/*printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentytwelve' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );*/
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'twentytwelve_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php //comment_form(); ?>
	    <?php
   
    $args = array(
        
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>'<p class="comment-form-author">' . '<input id="author" placeholder="Name *" name="author" type="text" class="required" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
				/*'<label for="author">' . __( 'Your Name' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' )  .*/
				'</p>'
				,
			'email'  => '<p class="comment-form-email">' . '<input id="email" placeholder="Email address *" name="email" type="text"class="required"  value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' />'  .
				/*'<label for="email">' . __( 'Your Email' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .*/
				'</p>',
			'url'    => '<p class="comment-form-url">' .
			 '<input id="url" name="url" placeholder="Company " type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
			/*'<label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .*/
	           '</p>'
		)
	),
	'label_submit' => __( 'Post Comments' ),
	'title_reply'          => __( 'Leave a Comment' ),
	'comment_field' => '<p class="comment-form-comment">' .
		/*'<label for="comment">' . __( 'Let us know what you have to say:' ) . '</label>' .*/
		'<textarea class="required"  id="comment" name="comment" placeholder="Comments " cols="45" rows="8" aria-required="true"></textarea>' .
		'</p>',
    
);
    
    comment_form($args);
    ?>

</div><!-- #comments .comments-area -->