<?php
/**
 * The template for displaying Comments.
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
           <?php  printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'netscribes_comments' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
        </h2>
        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'netscribes_comments', 'style' => 'ol' ) ); ?>
        </ol><!-- .commentlist -->
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-below" class="navigation" role="navigation">
                <h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'netscribes' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'netscribes' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'netscribes' ) ); ?></div>
            </nav>
        <?php endif; // check for comment navigation ?>
        <?php
        /* If there are no comments and comments are closed, let's leave a note.
         * But we only want the note on posts and pages that had comments in the first place.
         */
        if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="nocomments"><?php _e( 'Comments are closed.' , 'netscribes' ); ?></p>
        <?php endif; ?>
    <?php endif; // have_comments() ?>
    <?php $comment_args = array(
            'fields' => apply_filters(
                'comment_form_default_fields', array(
                    'author' => '<p class="comment-form-author">' .
                                '<label for="author">' . __( 'Enter Name' ) . '</label> ' .
                                ( $req ? '<span class="required">*</span>' : '' ) .
                                '<input id="author" name="author" type="text" value="" size="30"' . $aria_req . ' />' .
                                '</p><!-- #form-section-author .form-section -->',
                    'email'  => '<p class="comment-form-email">' .
                                '<label for="email">' . __( 'Email Address' ) . '</label> ' .
                                ( $req ? '<span class="required">*</span>' : '' ) .
                                '<input id="email" name="email" type="text" value="" size="30"' . $aria_req . ' />' .
                                '</p><!-- #form-section-email .form-section -->',
                    'url'    => '<p class="comment-form-url">'.
                                '<label for="url">'.__('Website').'</label>'.
                                '<input id="url" name="url" type="text" value="" size="30" maxlength="200">'.
                                '</p>'
                )
            ),
            'comment_field' => '<p class="comment-form-comment">' .
                    '<label for="comment">' . __( 'Comments' ) . '</label>' .
                    '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
                    '</p><!-- #form-section-comment .form-section -->',
            'comment_notes_before' => 'Your email address will not be published. All fields are mandatory',
            'title_reply' => 'Leave a Reply',
            'title_reply_to'    => __( 'Leave a Reply to %s' ),
            'label_submit'      => __( 'Comment' ),
        );
    ?>
    <?php comment_form($comment_args); ?>
</div><!-- #comments .comments-area -->