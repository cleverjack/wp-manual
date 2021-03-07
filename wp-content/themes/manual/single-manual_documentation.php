<?php 
get_header();

/*****************************
**** AJAX POST LOAD CHECK ****
******************************/
if( isset($theme_options['documentation-disable-ajaxload-content']) && $theme_options['documentation-disable-ajaxload-content'] == true ) {
	$ajax_load_post = false;
	$ajaxload = 2;
	define("DOCSINGLEPAGENORMALPOSTCALL", $post->ID);
} else {
	$ajax_load_post = true;
	$ajaxload = 1;
}

$post_type = get_post_type( $post );

/*********************
**** FIND TERM ID ****
**********************/
$terms = wp_get_post_terms($post->ID, 'manualdocumentationcategory');
$term_slug = $terms[0]->slug;
$current_term = $terms[0];
$term_id = $current_term->term_id;

/*******************
**** META VALUE ****
*******************/
$check_if_login_call = '';
$check_if_login_call = get_option( 'doc_cat_check_login_'.$terms[0]->term_id );
$check_user_role = get_option( 'doc_cat_user_role_'.$terms[0]->term_id );
$custom_login_message = get_option( 'doc_cat_login_message_'.$terms[0]->term_id );

$_COOKIE['manualDocSingleID'] = $post->ID;	
?>
<!--Display Specific Page-->
<script>
	jQuery(document).ready(function() { 
		"use strict";
		jQuery("#list-manual li a").removeClass('doc-active');
		jQuery("a[rel='<?php echo esc_html($_COOKIE['manualDocSingleID']); ?>']").addClass('doc-active');
		jQuery("a[rel='<?php echo esc_html($_COOKIE['manualDocSingleID']); ?>']").parentsUntil('#list-manual', 'ul').slideDown(300).each(function(index, ele) {
			jQuery(ele).prev('a').addClass('dataicon');
		});
	});
</script>
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php 
/**********************************
**** ARTICLE LOCK STATUS CHECK ****
***********************************/
if( $check_if_login_call == 1 && !is_user_logged_in() ) {
	manual__login_forum($custom_login_message, 1);
} else {   
	
	/**************************************************
	**** USER LOGED-IN BUT HAS NO SUFFIENCT ACCESS ****
	****************************************************/
	$access_status = manual_doc_access($check_user_role);
	if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
		manual__no_sufficentaccess($theme_options['documentation-root-category-access-control-message']);
	} else {
		
		/**************************
		**** LEFT SIDEBAR ****
		****************************/
		if( $theme_options['documentation-sidebar-position'] == 'left' ) { 
			echo '<aside class="col-md-4 col-sm-12 doc-rtl-sidebar" id="sidebar-box">';
			echo manual__doc_treemenu($post_type, 'manualdocumentationcategory', $term_id, $theme_options['documentation-record-display-order'], $theme_options['documentation-record-display-order-by'], 'padding-left:0px;', $theme_options['documentation-expand-text'], $theme_options['documentation-collapse-text'], $ajaxload);
			echo '</aside>';
		}

		/**********************
		**** CONTENT AREA ****
		***********************/
		if( $ajax_load_post == true ) {
			echo '<div class="col-md-8 col-sm-12"> <div class="doc-single-post" id="single-post-container"> </div></div>';
		} else {
			echo '<div class="col-md-8 col-sm-12"><div class="doc-single-post">';
			get_template_part( 'template/doc/single', 'page' );	
			echo '</div></div>';
		}

		/**************************
		**** RIGHT SIDEBAR ****
		****************************/
		if( $theme_options['documentation-sidebar-position'] == 'right' ) { 
			echo '<aside class="col-md-4 col-sm-12 doc-rtl-sidebar" id="sidebar-box">';
			echo manual__doc_treemenu($post_type, 'manualdocumentationcategory', $term_id, $theme_options['documentation-record-display-order'], $theme_options['documentation-record-display-order-by'], 'padding-right:0px;', $theme_options['documentation-expand-text'], $theme_options['documentation-collapse-text'], $ajaxload);
			echo '</aside>';
		}
		

	}// eof else
}// eof else (if user loggedin)
get_footer(); 
?>