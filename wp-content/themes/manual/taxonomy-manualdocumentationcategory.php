<?php 
get_header();  

$post_type = get_post_type( $post );

/****************************
**** CATEGORY META VALUE ****
*****************************/
$check_if_login_call = '';
$current_term_check_termID = get_term_by( 'slug', get_query_var( 'term' ), 'manualdocumentationcategory' );
$check_if_login_call = get_option( 'doc_cat_check_login_'.$current_term_check_termID->term_id );
$check_user_role = get_option( 'doc_cat_user_role_'.$current_term_check_termID->term_id );
$custom_login_message = get_option( 'doc_cat_login_message_'.$current_term_check_termID->term_id );

/*****************************
**** AJAX POST LOAD CHECK ****
******************************/
if( isset($theme_options['documentation-disable-ajaxload-content']) && $theme_options['documentation-disable-ajaxload-content'] == true ) {
	$ajax_load_post = false;
	$ajaxload = 2;
} else {
	$ajax_load_post = true;
	$ajaxload = 1;
}

/*********************
**** FIND TERM ID ****
**********************/
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualdocumentationcategory' );
$term_id = $current_term->term_id;
?>

<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php 
/****************************
**** IF USER NOT LOGED-IN ****
****************************/
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
			get_template_part( 'template/doc/cat', 'page' );	
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


	} // eof else
} // eof else (if user loggedin)
get_footer(); 
?>