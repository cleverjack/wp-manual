<?php 
global $theme_options;
$current_pageID = DOCSINGLEPAGENORMALPOSTCALL;
if( isset($current_pageID) ) {
	
		$post = get_post($current_pageID);
		$access_meta = get_post_meta( $current_pageID, 'doc_single_article_access', true );
		$check_post_user_level_access = get_post_meta( $current_pageID, 'doc_single_article_user_access', true );

		/********************************
		**** ARTICLE LOCK STATUS CHECK ****
		*********************************/
		if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
			manual__login_forum($access_meta['message'], '', 1);
		} else {  
		
			/****************************************************
			**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
			*****************************************************/
			if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
			else  $access_status = true;
			
			if( $access_status == false ) {
				manual__no_sufficentaccess($theme_options['documentation-single-page-access-control-message']);
			} else {
					
				/*************************
				**** DISPLAY CONTENT ****
				**************************/
				echo '<div class="print-content">';
				echo '<div id="single-post post-'.esc_html($current_pageID).'">';
				
				/**********************************
				**** PAGE TITLE + META SECTION ****
				***********************************/
				echo '<div class="title-content-print">';
				echo '<div class="page-title-header">'; 
				echo '<'.$theme_options['documentation-singlepg-title-tag'].' class="manual-title title singlepg-font">'. esc_html($post->post_title) .'</'.$theme_options['documentation-singlepg-title-tag'].'>';
					  manual__doc_belowtitle_meta_section($current_pageID, $post->post_author);
				echo '</div>';
				echo '<div class="post-cat margin-btm-35"></div>';
				
				
				/****************
				**** CONTENT ****
				*****************/
				echo '<div class="entry-content clearfix">'.apply_filters('the_content', $post->post_content).'</div>';
				echo '</div>';
					 
					  
				/**********************
				**** ATTACHED FILE ****
				***********************/
				if( get_post_meta( $current_pageID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) {
					$message = get_post_meta( $current_pageID, '_manual_attachement_access_login_msg', true );
					manual__login_forum($message, '', 1);
				} else { 
					manual_kb_attachment_files($current_pageID); 
				}
					 
				echo '<div style="clear:both"></div>';
				
				
				/******************************
				**** SOCIAL SHARE + VOTING ****
				*******************************/
				echo '<div class="panel-heading" style="padding:0px;">';
				// SOCIAL SHARE 
				if( $theme_options['documentation-social-share-status'] == false ) {
					manual_social_share(get_permalink($current_pageID));
				}
				// VOTING
				if( ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == false ) || ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == true && is_user_logged_in())) {
					manual__like_dislike_section($current_pageID, $theme_options['yes-no-above-message']);
				} 
				echo '</div>';
				
						
				echo '</div><span class="manual-views" id="manual-views-'.$current_pageID.'"></span>';
			
			
			/*********************
			**** RELATED POST ****
			**********************/
			if( $theme_options['documentation-related-post-status'] == true ) manual_doc_related_post($current_pageID);
			
			echo '</div>';
			
		}// Eof else
		}// Eof else
		
}
?>