<?php
/**
 * The template for displaying comments
 */
 
if ( post_password_required() ) {
	return;
}
$aria_req = '';
$required_text  = '';
?>

<div>
  <?php if ( have_comments() ) : ?>
  <h5 style="margin-top:45px;">
        <?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'manual' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'manual'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
		?>
  </h5>
  <?php manual_comment_nav(); ?>
  <ul class="comments margin-btm-25">
    <?php wp_list_comments( 'type=comment&callback=manual_comment&avatar_size=56&style=ul&max_depth=3' ); ?>
  </ul>
  <?php 
   manual_comment_nav(); 
   endif; 
   ?>
  <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
  <p class="no-comments">
    <?php esc_html_e( 'Comments are closed.', 'manual' ); ?>
  </p>
  <?php endif; ?>
  <div class="clearfix"></div>
  <div class="margin-30 comment-section-format">
    <?php 
	$comment_args = array( 'title_reply'=>  esc_html__( 'Leave A Comment',  'manual' ) ,
						   'title_reply_before' => '<h5>',
						   'title_reply_after' => '</h5>',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
																	
		'author' => '  <div class="row"><label for="author" class="control-label sr-only">'. esc_html__( 'Name',  'manual' ) .'</label> 
					  <div class="col-sm-4 col-md-4 col-lg-4 margin-15">
					  <input id="author" name="author" class="form-control" type="text"  placeholder="'.esc_html__( 'Name '.( $req ? esc_html__('*','manual') : '' ).'',  'manual' ).'"
					  value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
					  
		'email' => ' <label for="email" class="control-label sr-only">'. esc_html__( 'Your Email',  'manual' ) .'</label> 
					 <div class="col-sm-4 col-md-4 col-lg-4 margin-15">
					 <input id="email" name="email" class="form-control" type="text"  placeholder="'.esc_html__( 'Email '.( $req ? esc_html__('*','manual') : '' ).'',  'manual' ).'"
					 value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
					  
		'url'    => '<label for="url" class="control-label sr-only">'. esc_html__( 'Your Website',  'manual' ) .'</label> 
					 <div class="col-sm-4 col-md-4 col-lg-4 margin-15">
					 <input id="url" name="url" class="form-control" type="text"  placeholder="'.esc_html__( 'Website',  'manual' ).'"
					 value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"  />
					 </div></div>' ) ),
	
		'comment_field' => '<div class="row margin-15">
								<label class="control-label sr-only">'.  esc_html__( 'Comment',  'manual' ) .'</label>
								<div class="col-md-12">
								  <textarea class="form-control full" id="comment" name="comment" placeholder="'.  esc_html__( 'Comment',  'manual' ) .'" style="height: 100px;"></textarea>
								</div>
							  </div>',
							  
		  'comment_notes_before' => '',									
									
	);
	comment_form($comment_args); 
?>
  </div>
</div>