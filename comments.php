<?php
/**
* The template for displaying Comments.
*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() )
return;
?>
<div class="col-sm-16 comments-area">
  <div class="main-title-outer pull-left">
    <div class="main-title">نظرات</div>
  </div>
  <?php // You can start editing here -- including this comment!
  if ( have_comments() ) : ?>



  <div class="opinion">
    <?php
    wp_list_comments("callback=mytheme_comment");

    //wp_list_comments( array( 'callback' => '', 'style' => 'ol' ) );
    ?>
  </div><!-- .commentlist -->
</div>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
  <ul class="default-wp-page clearfix">
    <h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'travelify' ); ?></h1>
    <li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'travelify' ) ); ?></li>
    <li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'travelify' ) ); ?></li>
  </ul>
<?php endif; // check for comment navigation
// If comments are closed and there are comments, let's leave a little note.

elseif ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
  <p class="nocomments"><?php _e( 'Comments are closed.', 'travelify' ); ?></p>
<?php endif;
$args = array(
  'label_submit'=>'ارسال',
  'class_submit'         => 'btn btn-primary',
  'fields' => apply_filters(
    'comment_form_default_fields', array(
      'author' =>'<p class="comment-form-author">' . '<input class="form-control" id="author" placeholder="نام" name="author" type="text" value="' .
      esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
      ( $req ? '' : '' )  .
      '</p>'
      ,
      'email'  => '<p class="comment-form-email">' . '<input class="form-control" id="email" placeholder="پست الکترونیک" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' />'  .
      ( $req ? '' : '' )
      .
      '</p>',
      'url'    => '<p class="comment-form-url">' .
      '<input class="form-control" id="url" name="url" placeholder="وب سایت" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
      '</p>'
      )
    ),
    'comment_field' => '<p class="comment-form-comment">' .
    '<textarea class="form-control" id="comment" name="comment" placeholder="نظر خود را ثبت کنید" cols="45" rows="8" aria-required="true"></textarea>' .
    '</p>',
    'comment_notes_after' => '',
  );
  comment_form($args); ?>
</div><!-- #comments .comments-area -->
