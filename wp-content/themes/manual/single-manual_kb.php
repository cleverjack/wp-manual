<?php 
get_header();

$col_type = '';
if( $theme_options['kb-cat-sidebar-singlepg-status'] == true ) {
	$col_type = 12;	
} else {
	$col_type = 8;	
}

/***********************************
**** GET ARTICLE CURRENT CAT ID ****
************************************/
$terms = get_the_terms( $post->ID , 'manualknowledgebasecat' ); 
if( !empty($terms) ) { 
$current_term = $terms[0];
$term_id = $current_term->term_id; // cat id
$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
$custom_login_message = get_option( 'kb_cat_login_message_'.$terms[0]->term_id );
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<?php 
/*********************
**** SIDEBAR LEFT ****
**********************/
if( $theme_options['kb-cat-sidebar-singlepg-status'] != true && 
	$theme_options['kb-single-page-sidebar-position'] == 'left' ) { 
		get_template_part('sidebar', 'kb');
}


/*******************************
**** CATEGORY ACCESS CONTROL ****
********************************/
if( $check_if_login_call == 1 && !is_user_logged_in() ) {
	echo '<div class="col-md-'.esc_html($col_type).' col-sm-12">';
		manual__login_forum($custom_login_message);
	echo '</div>';

} else {
	
	/****************************************************
	**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
	*****************************************************/
	$access_status = manual_doc_access($check_user_role);
	if( $access_status == false ) { 
		echo '<div class="col-md-'.esc_html($col_type).' col-sm-12"><div class="doc_access_control"><p>';
		echo esc_html($theme_options['kb-single-page-access-control-message']);
		echo '</p></div></div>';
	} else {

		/************************
		**** ARTICLE SECTION ****
		*************************/
		echo '<div class="col-md-'.esc_html($col_type).' col-sm-12 print-content kb-rtl-right">';

		/*******************************
		**** ARTICLE ACCESS CONTROL ****
		********************************/
		$access_meta = get_post_meta( $post->ID, 'doc_single_article_access', true );
		$check_post_user_level_access = get_post_meta( $post->ID, 'doc_single_article_user_access', true );
		if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
			manual__login_forum($access_meta['message']);
		} else { 
	
			/****************************************************
			**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
			*****************************************************/
			if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
			else  $access_status = true;
	
			if( $access_status == false ) {
				manual__no_sufficentaccess($theme_options['kb-single-page-access-control-message']);
			} else {
				
				/*************************
				**** DISPLAY CONTENT ****
				**************************/
				while ( have_posts() ) : the_post(); 
  					
					echo '<div class="title-content-print">';
					/**********************************
					**** PAGE TITLE + META SECTION ****
					***********************************/
					echo '<div class="kb-single">';
					echo '<'.$theme_options['kb-singlepg-title-tag'].' class="singlepg-font">'.get_the_title().'</'.$theme_options['kb-singlepg-title-tag'].'>';
					manual__kb_belowtitle_meta_section($post->ID, $post->post_author);
					echo '</div>';
				
					/****************
					**** CONTENT ****
					*****************/
					echo '<div class="margin-15 entry-content clearfix">';
					the_content();
					echo '</div>';
					
					echo '</div>';
		
					/****************
					**** TAGS ****
					*****************/
					if (is_single() && has_term( '', 'manual_kb_tag' )) {
						echo '<div class="tagcloud singlepgtag kbtag clearfix margin-btm-20 singlepg"><span><i class="fa fa-tags"></i> '.esc_html__( 'Tags:', 'manual' ).'</span>';
						the_terms( get_the_ID(), 'manual_kb_tag', '' , '');
						echo '</div>';
					}
			
					/**********************
					**** ATTACHED FILE ****
					***********************/
					if( get_post_meta( $post->ID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) { 
						$message = get_post_meta( $post->ID, '_manual_attachement_access_login_msg', true ); 
						manual_access_attachment($message);
					} else { 
						manual_kb_attachment_files(); 
					}
	
				endwhile; // end of the loop. 
	
	
				/******************************
				**** SOCIAL SHARE + VOTING ****
				*******************************/
				echo '<div class="panel-heading" style="padding:0px;">';
				// SOCIAL SHARE 
				if( $theme_options['knowledgebase-social-share-status'] != true ) { 
					manual_social_share(get_permalink()); 
				}
				// VOTING
				if( ($theme_options['knowledgebase-voting-buttons-status'] != true && $theme_options['knowledgebase-voting-login-users'] != true) || 
						($theme_options['knowledgebase-voting-buttons-status'] == false && $theme_options['knowledgebase-voting-login-users'] == true && is_user_logged_in())
					   ) {
					manual__like_dislike_section($post->ID, $theme_options['yes-no-above-message']);
				}
			
		echo '</div>';
	
	
		/*********************
		**** RELATED POST ****
		**********************/
		if( $theme_options['kb-related-post-status'] == true ) { manual_kb_related_post(); }
	
	
		/*********************
		**** COMMENT STATUS ****
		**********************/
		if( $theme_options['kb-comment-status'] == true ) {
			if ( comments_open() || get_comments_number() ) {
				if( $theme_options['kb-comment-box-on-thumbsdown'] == true ){ echo '<div class="kb-respond-no-message"><div class="kb-feedback-showhide" style="display:none;">';}
				comments_template( '', true ); 
				if( $theme_options['kb-comment-box-on-thumbsdown'] == true ){ echo '</div></div>'; }
			}
		}
	
		echo '<div style="clear:both"></div>';
		echo '<span class="manual-views" id="manual-views-'.$post->ID.'"></span>';
  
		} // eof else
	} // eof else
  
echo '</div>';

	}// eof else if
}// eof else if 

/*********************
**** SIDEBAR RIGHT ****
**********************/
if( $theme_options['kb-cat-sidebar-singlepg-status'] != true && 
	$theme_options['kb-single-page-sidebar-position'] == 'right' ) { 
		get_template_part('sidebar', 'kb');
} 

/***************
**** FOOTER ****
****************/
get_footer(); 
} else {
 esc_html_e( 'Please assign category for your Knowledge Base RECORD', 'manual' );	
} 
?>