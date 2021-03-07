<?php 
get_header();

$cat_display_order = 'ASC';
$cat_display_order_by = 'date';
$cat_sidebar_position = 'right';

if( isset($theme_options['kb-cat-display-order']) &&  $theme_options['kb-cat-display-order'] != '' ) {
	$cat_display_order = $theme_options['kb-cat-display-order'];
}
if( isset($theme_options['kb-cat-display-order-by']) &&  $theme_options['kb-cat-display-order-by'] != '' ) {
	$cat_display_order_by = $theme_options['kb-cat-display-order-by'];
}
if( isset($theme_options['kb-cat-sidebar-position']) &&  $theme_options['kb-cat-sidebar-position'] != '' ) {
	$cat_sidebar_position = $theme_options['kb-cat-sidebar-position'];
}

if( $theme_options['kb-cat-sidebar-status'] == true ) $col_content = 12;
else $col_content = 8;

/***************************
**** GET CURRENT CAT ID ****
****************************/
$st_term_data =	$wp_query->queried_object;
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualknowledgebasecat' );
$check_if_login_call = get_option( 'kb_cat_check_login_'.$current_term->term_id );
$check_user_role = get_option( 'kb_cat_user_role_'.$current_term->term_id );
$custom_login_message = get_option( 'kb_cat_login_message_'.$current_term->term_id );
$term_id = $current_term->term_id;
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">


<?php 

/*********************
**** SIDEBAR LEFT ****
**********************/
if( $theme_options['kb-cat-sidebar-status'] != true && $cat_sidebar_position == 'left' ) { 
	get_template_part('sidebar', 'kb'); 
} 

/*******************************
**** CATEGORY ACCESS CONTROL ****
********************************/
if( $check_if_login_call == 1 && !is_user_logged_in() ) { 
	echo '<div class="col-md-'.esc_html($col_content).' col-sm-12">';
	manual__login_forum($custom_login_message);
	echo '</div>';
	
} else { 

	/****************************************************
	**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
	*****************************************************/
	$access_status = manual_doc_access($check_user_role);
	if( $access_status == false ) { 
		echo '<div class="col-md-'.$col_content.' col-sm-12"><div class="doc_access_control"><p>';
		echo esc_attr($theme_options['kb-cat-page-access-control-message']);
		echo '</p></div></div>';
	} else {
		
		/************************
		**** ARTICLE SECTION ****
		*************************/
		echo '<div class="col-md-'.esc_html($col_content).' col-sm-12 kb-rtl-right">';

		/***************************
		 DISPLAY ALL CHILD CATEGORY
		****************************/
		if( $theme_options['all-child-cat-post-in-root-category'] == false ) {
			if( !is_paged() ) { 
			
			// CHILD CAT !! CHEK IF THERE IS ANY
			$st_subcat_args = array(
			  'orderby' => 'name',
			  'order'   => 'ASC',
			  'child_of' => $term_id,
			  'parent' => $term_id
			);
			
			$st_sub_categories = get_terms('manualknowledgebasecat', $st_subcat_args);
			if ($st_sub_categories) {
				
				$check_no_of_records = count($st_sub_categories);
				if( $check_no_of_records > 1 ) $apply_masonry_grid = 'masonry-grid-inner';
				else  $apply_masonry_grid = '';
				
				echo '<div class="'.$apply_masonry_grid.' margin-btm-25" style="clear:both;">';
				
				// If the category has sub categories 
				$st_subcat_args = array(
					'orderby' => 'name',
					'order'   => 'ASC',
					'child_of' => $term_id,
					'parent' => $term_id
				);
				$st_sub_categories = get_terms('manualknowledgebasecat', $st_subcat_args); 
				$st_sub_categories_count = count($st_sub_categories);
				if( $st_sub_categories_count == 1 ) { 
					$col_md_sm = 12;
					$col_sm = 12;
				} else { 
					$col_md_sm = 6; 
					$col_sm = 12;
				}
				
				foreach($st_sub_categories as $st_sub_category) {
					
					$cat_icon_name = get_option( 'kb_cat_icon_name_'.$st_sub_category->term_id );
					if( isset( $cat_icon_name ) && $cat_icon_name != '' ) {
						$cat_icon_name = $cat_icon_name;
					} else {
						$cat_icon_name = 'icon-briefcase';
					}
					
					echo '<div class="col-md-'.esc_html($col_md_sm).' col-sm-'.esc_html($col_sm).' masonry-item kb-subcat-cssfix">';
					echo '<div class="knowledgebase-body">';
					
					if( isset($cat_icon_name) && $cat_icon_name != '' ) { 
						echo '<div class="kb-masonry-icon"><h5><i class="'.$cat_icon_name.'"></i></h5></div><div class="vc-kb-masonry-tag-right">';
					}
					
					echo '<h5><a href="'.get_term_link($st_sub_category->slug, 'manualknowledgebasecat').'">';
					$cat_title = $st_sub_category->name; 
					echo html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					echo '</a></h5>';
					
					if( $theme_options['knowledgebase-remove-subcategory-description'] == false ) { 
						echo category_description($st_sub_category->term_id); 
					}
					
					if( isset($cat_icon_name) && $cat_icon_name != '' ) { echo '</div>'; }
					
					echo '<span class="separator small"></span>';
					echo '<ul class="kbse">';
				 
					if( isset( $theme_options['kb-no-of-records-per-cat'] ) && $theme_options['kb-no-of-records-per-cat'] != '' ) {
						$display_on_of_records_under_cat = $theme_options['kb-no-of-records-per-cat'];	
					} else {
						$display_on_of_records_under_cat = '5';	
					}
							  
					// Get posts per category
					$args = array( 
						'numberposts' => $display_on_of_records_under_cat, 
						'post_type'  => 'manual_kb',
						'orderby' => $cat_display_order_by,
						'order'  => $cat_display_order,
						'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'id',
								'include_children' => false,
								'terms' => $st_sub_category->term_id
							)
						)
					);
					$st_cat_posts = get_posts( $args );
					foreach( $st_cat_posts as $post ) {
					echo '<li class="cat inner"> <a href="'.get_the_permalink().'">';
						$org_title = get_the_title(); 
						echo html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
						echo '</a> </li>';
					} 
                    
					echo '</ul>';
				    if( $theme_options['knowledgebase-remove-subcategory-readmore'] == false ) {
					echo '<div style="padding:10px 0px;"> <a href="'.get_term_link($st_sub_category->slug, 'manualknowledgebasecat').'"  class="custom-link hvr-icon-wobble-horizontal kblnk">'.$theme_options['kb-cat-view-all'].'&nbsp;'. $st_sub_category->count .' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a> </div>';
					}
					echo '</div></div>';
			  
				}
				
				echo '</div>';
			} 
			wp_reset_postdata();
			}
		}


		/******************************
		 DISPLAY ROOT CATEGORY RECORDS
		*******************************/
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'manual_kb',
			'paged' => $paged,
			'posts_per_page' => (isset($theme_options['kb-noof-records-catper-page'])?$theme_options['kb-noof-records-catper-page']:'-1'),
			'order'  => $cat_display_order,
			'orderby' => $cat_display_order_by,
			'tax_query' => array(
					array(
						'taxonomy' => 'manualknowledgebasecat',
						'field' => 'slug',
						'include_children' => (($theme_options['all-child-cat-post-in-root-category'] == false)? false : true ), //false,
						'terms' => $term_slug
						)
					),
						
		);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) :  
			echo '<div class="col-md-12 col-md-12 clearfix margin-btm-25 rtl-kbcatbody-fix" style="padding-left:1px; clear:both;">'; 
			echo '<div class="knowledgebase-cat-body">';
			if ( have_posts() ) {
				
				while($wp_query->have_posts()) : $wp_query->the_post();
					echo '<div class="kb-box-single">';
					echo '<h4 style="margin-bottom:5px;"><a href="'.get_the_permalink().'">';
					$org_title = get_the_title(); 
					echo html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
					echo '</a></h4>';
					manual__kb_catag_belowtitle_meta_section($post->ID);
					echo '</div>';
				endwhile; 
		  
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => esc_html__( '&lt;', 'manual' ),
					'next_text'          => esc_html__( '&gt;', 'manual' ),
				) ); 
			
				wp_reset_postdata();
	
			} else {
				 esc_html_e( 'Sorry, no posts were found', 'manual' );
			}			
    
  		echo '</div></div>';
 	endif; 
	echo '</div>';
	} // eof else
}// eof else 


/*********************
**** SIDEBAR RIGHT ****
**********************/
if( $theme_options['kb-cat-sidebar-status'] != true && $cat_sidebar_position == 'right' ) { 
	get_template_part('sidebar', 'kb'); 
} 

/***************
**** FOOTER ****
****************/
get_footer(); 
?>