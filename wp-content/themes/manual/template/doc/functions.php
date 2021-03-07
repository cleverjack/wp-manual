<?php 
/*-----------------------------------------------------------------------------------*/
/*	CHECK PLUGIN EXIST USING FUNCATION NAME
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__doc_treemenu')) {
	function manual__doc_treemenu($post_info, $taxonomycat, $term_id, $display_order_doc = 'ASC', $display_order_doc_by, $sidebarpadding = '', $expandtxt, $collapsetxt, $ajaxload = 1) {
		
		global $post, $theme_options;
		
		if( $ajaxload == 1 ) { 
			$ajaxloadclass = 'post-link';
			$doactive_class = 'doc-active';
		} else {  
			$ajaxloadclass = '';
			if( ($post_info == 'manual_documentation' && is_tax( 'manualdocumentationcategory' )) ) {
				$doactive_class = 'doc-active-normal';
			} else {
				$doactive_class = '';
			}
		}
		
		$return = '<div class="custom-well blankbg sidebar-nav" style="'.$sidebarpadding.' padding-top:0px;">';
		
		/*****************************************
		**** EXPAND COLLAPSE ****
		******************************************/
		$return .= '<div class="margin-btm-20">
			<span><a class="more-link doc-expandall" style="cursor:pointer;">'.esc_html($expandtxt).'</a></span>
			<span><a class="more-link doc-collapseall" style="cursor:pointer;display:none;">'.esc_html($collapsetxt).'</a></span>
		</div>'; 
		
		/*****************
		**** TREE GUI ****
		******************/
		if ( $theme_options['documentation-menu-scroller-status'] == true ) { 
			$mCustomScrollbar = 'mCustomScrollbar'; 
		} else { 
			$mCustomScrollbar = ''; 
		}
		$return .= '<ul id="list-manual" class="toc-expandable page-doc '.$mCustomScrollbar.' " data-toc-depth-max="1">';
		$args = array( 
			'posts_per_page'    => -1,
			'post_type'  		=> $post_info,
			'orderby'   		=> $display_order_doc_by,
			'order'     		=> $display_order_doc,
			'tax_query'			=> array(
				array(
					'taxonomy'	 		=> $taxonomycat,
					'field' 	 		=> 'id',
					'include_children'  => false,
					'terms' 			=> $term_id,
				)
			)
		);
		$cat_posts = get_posts( $args );
		$i = 1;
		foreach( $cat_posts as $post ) {
			if( $post->post_parent == 0 ) { 
				$count = manual_count_child_post($post, $post_info, $term_id, $taxonomycat);
				$return .= '<li class="nav-header nav-header-sub" manual-topic-id="'.$post->ID.'" manual-parent-id="'.$post->ID.'>" style="padding:3px 0px;">';
				
				if( $ajaxload != 1 && $i == 1 && ($post_info == 'manual_documentation' && is_tax( 'manualdocumentationcategory' )) ) {
					$normal_postID = get_the_ID();
					define("DOCCATPAGENORMALPOSTCALL", $normal_postID);
				}
				
				if( $i == 1 ) {  $doactive = $doactive_class; } else {  $doactive = ''; }
				$root_plus_icon = $root_arrow_icon = '';
				if( isset($count) && (count($count) > 0) ) { 
					$haschild = 'has-child';
					$root_plus_icon = '<i class="fas fa-plus-circle"></i> &nbsp;';
				} else { 
					$haschild = 'no-child';
					$root_arrow_icon = '<i class="fas fa-angle-right doc-root-plus-icon"></i>';
				}
				if( $i == 1 && (isset($count) && (count($count) > 0)) ) { $openulfirst = 'open-ul-first';  } else { $openulfirst = ''; }
				if( isset($count) && (count($count) <= 0) ) { $fontstyle = 'font-weight:normal;'; } else { $fontstyle = ''; }
				
            	$return .= $root_arrow_icon.'<a href="'. get_permalink().'" rel="'. get_the_ID() .'" class=" '.$ajaxloadclass.' '.$doactive .' '.$haschild.' '.$openulfirst.' " style="'.$fontstyle.'">'. $root_plus_icon;
            	$return .= get_the_title();
				$return .= '</a>';
				
				$return .= manual_documentation_cat_pages($post, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by, $ajaxload);
				$i++;
			} // Eof if
		$return .= '</li>';
		} // Eof foreach
		$return .= '</ul>';
		
		$return .= '</div>';
		return $return;
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	TREE MENU - UI 1
/*-----------------------------------------------------------------------------------*/ 
if (!function_exists('manual_documentation_cat_pages')) {
	function manual_documentation_cat_pages( $post, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by, $ajaxload = 1 ) {
		global $theme_options;
		
		if( $ajaxload == 1 ) { 
			$ajaxloadclass = 'post-link';
		} else {  
			$ajaxloadclass = ''; 
		}
		
		$children = get_posts( array( 'post_parent' => $post->ID, 
									  'post_type' => $post_info, 
									  'orderby' => $display_order_doc_by,
									  'order' => $display_order_doc,
									  'posts_per_page'   => -1,
									  'taxonomy' => $taxonomycat,
									  ));
		$child = count($children);
		if( $child > 0 ) {
			$return = '<ul class="parent-display-'.$post->ID.'">';
			foreach($children as $child) :
				$count_child = manual_count_child_post($child, $post_info, $term_id, $taxonomycat); 
				if( is_object_in_term( $child->ID, $taxonomycat, $term_id) === true ): 
					
					$child_plus_icon = $child_arrow_icon = '';
					if( isset($count_child) && ((count($count_child)) > 0) ) { 
						$has_yes_no_inner_child = 'has-inner-child'; 
						$child_plus_icon = '<i class="fas fa-plus-circle"></i> &nbsp;';
					} else { 
						$has_yes_no_inner_child = 'has-no-inner-child';
						$child_arrow_icon = '<i class="fas fa-angle-right doc-root-child-plus-icon"></i>';
					}
					
					$return .= '<li manual-topic-id="'.$child->ID.'" > '.$child_arrow_icon.' <a href="'.get_permalink($child->ID).'" rel="'.$child->ID.'" class=" '.$ajaxloadclass.' '.$has_yes_no_inner_child.'" >'.$child_plus_icon .' '.$child->post_title.'</a>';
					$return .= manual_documentation_cat_pages($child, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by, $ajaxload); 
					$return .= '</li>';
	
				endif;
			endforeach; 
			$return .= '</ul>';
			return $return;
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	TREE MENU - UI 2
/*-----------------------------------------------------------------------------------*/ 
if (!function_exists('manual_count_child_post')) {
	function manual_count_child_post($post, $post_info, $term_id, $taxonomycat){
		$count = array();
		$children = get_posts( array( 'post_parent' => $post->ID, 'post_type' => $post_info, 'taxonomy' => $taxonomycat  ));
		$child = count($children);
		if( $child > 0 ) {
			foreach($children as $child) : 
				if( is_object_in_term( $child->ID, $taxonomycat, $term_id) === true ): 
					$count[] = 1;
				endif;
			endforeach; 
			return $count;
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: ARTICLE LOCK STATUS CHECK
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__login_forum' ) ) {
	function manual__login_forum($custom_login_message, $formcenter = '', $ajaxcall_login = ''){
		
		if( $formcenter == 1 ) { 
			$center_css = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
		} else { 
			$center_css = ''; 
		}
		
		echo '<div class="'.$center_css.'"><div class="manual_login_page"><div class="custom_login_form">';
		if( $custom_login_message != '' ) {
			echo '<h4>'.esc_html($custom_login_message).'</h4>';
		}
		if( $ajaxcall_login == '' ) {
			$args = array(
				'echo' => false,
			);
			echo wp_login_form($args); 
		} else {
			echo ' <form action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><input type="submit" class="button-primary" value="Log In"></form>';
		}
		echo '<ul class="custom_register">';
			if ( get_option( 'users_can_register' ) ) { wp_register(); } 
			echo '<li><a href=" '.wp_lostpassword_url().'" title="Lost Password" class="more-link hvr-icon-wobble-horizontal margin-15">';
			echo esc_html_e( 'Lost Password', 'manual' );
			echo ' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li></ul>';
		echo '</div></div></div>';
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: ARTICLE LOCK STATUS CHECK
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__get_login_forum' ) ) {
	function manual__get_login_forum($custom_login_message, $formcenter = '', $ajaxcall_login = ''){
		
		if( $formcenter == 1 ) { 
			$center_css = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
		} else { 
			$center_css = ''; 
		}
		
		$return = '<div class="'.$center_css.'"><div class="manual_login_page"><div class="custom_login_form">';
		if( $custom_login_message != '' ) {
			$return .= '<h4>'.esc_html($custom_login_message).'</h4>';
		}
		if( $ajaxcall_login == '' ) {
			$args = array(
				'echo' => false,
			);
			$return .= wp_login_form($args); 
		} else {
			$return .= ' <form action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><input type="submit" class="button-primary" value="Log In"></form>';
		}
		$return .= '<ul class="custom_register">';
			if ( get_option( 'users_can_register' ) ) { wp_register(); } 
			$return .= '<li><a href=" '.wp_lostpassword_url().'" title="Lost Password" class="more-link hvr-icon-wobble-horizontal margin-15">';
			$return .= esc_html__( 'Lost Password', 'manual' );
			$return .= '&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li></ul>';
		$return .= '</div></div></div>';
		
		return $return;
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: ARTICLE NO SUFFIENCT ACCESS
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__no_sufficentaccess' ) ) {
	function manual__no_sufficentaccess($message){
		echo '<div class="doc_access_control"><p>';
		echo esc_html($message);
		echo '</p></div>';
	}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: META SECTION
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__doc_belowtitle_meta_section' ) ) {
	function manual__doc_belowtitle_meta_section($postID, $post_author){
		global $theme_options;
		
		if( $theme_options['documentation-quick-stats-under-title'] == true ) { 
			$class_quick_stats_active = 'style="min-height:10px;"';  
		} else {
			$class_quick_stats_active = '';  
		}
		
		echo '<p class="entry-meta" '.$class_quick_stats_active.'>';
		
		if( $theme_options['documentation-quick-stats-under-title'] == false ) {
					
			// Impression
			echo '<i class="fa fa-eye"></i> <span>';  
			if( get_post_meta( $postID, 'manual_post_visitors', true ) != '' ) { 
				echo get_post_meta( $postID, 'manual_post_visitors', true );
				echo '&nbsp;'.esc_html($theme_options['custom-record-post-view-text']);
			} else { 
				echo '0&nbsp;'.esc_html($theme_options['custom-record-post-view-text']); 
			} 
			echo '</span>';
			// Calender
			if( $theme_options['documentation-singlepg-publish-date-status'] == true ) {
				echo '<i class="far fa-calendar-alt"></i> <span>';  
				echo get_the_date( get_option('date_format'), $postID ); echo '</span>';
			}
			// Modified Date
			if( $theme_options['documentation-singlepg-modified-date-status'] == true ) {
				if (get_post_modified_time(get_option('date_format'),'',$postID) != get_the_time(get_option('date_format'),$postID) ) { 
					echo '<i class="far fa-calendar-plus"></i> <span>'.get_post_modified_time(get_option('date_format'),'',$postID).'</span>';
				} 
			} 
			// Author
			if( $theme_options['documentation-disable-doc-author-name'] == true ) {
				echo '<i class="fas fa-user"></i> <span>';  
				$author_id = $post_author; 
				echo the_author_meta( $theme_options['documentation-single-post-user-name'] , $author_id ); 
				echo '</span>';
			}
			// Liks count
			echo ' <i class="fas fa-thumbs-up"></i> <span>'; 
			if( get_post_meta( $postID, 'votes_count_doc_manual', true ) == '' ) { 
				echo 0; 
			} else { 
				echo get_post_meta( $postID, 'votes_count_doc_manual', true ); 
			} 
			echo '</span>';
					
		} // Eof quick status
		
		// Print Icon
		if( $theme_options['documentation-single-pg-print-status'] == true ) {
			if (class_exists('WP_Print_O_Matic')) { echo do_shortcode('[print-me printstyle="pom-small-grey" tag="span" id="'.$postID.'" target=".title-content-print"]'); echo '<span></span>'; }
		}
		
		// Edit Icon	    
		edit_post_link( esc_html__( 'Edit', 'manual' ), '<i class="fa fa-edit"></i> <span class="edit-link">', '</span>', $postID );
		echo '</p>';
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: LIKE DISLIKE SECTION
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__like_dislike_section' ) ) {
	function manual__like_dislike_section($postID, $message){
		
		global $theme_options;
		
		echo '<div id="rate-topic-content" class="row-fluid"><div class="rate-buttons"> ';
					
		if(isset($theme_options['yes-no-above-message'])) { echo '<p class="helpfulmsg" >'.esc_html($message).'</p>'; }
			
		echo ' <span class="post-like"><a data-post_id="'.$postID.'" href="#"><span class="btn btn-success rate custom-like-dislike-btm" data-rating="1"><i class="glyphicon glyphicon-thumbs-up"></i> <span class="manual_doc_count">'. $meta_values = get_post_meta( $postID, 'votes_count_doc_manual', true ).' '.esc_html($theme_options['yes-user-input-text']).'</span></span></a></span>&nbsp;';		
	
		echo '<span class="post-unlike"><a data-post_id="'. $postID .'" href="#"><span class="btn btn-danger rate custom-like-dislike-btm" data-rating="0"> <i class="glyphicon glyphicon-thumbs-down"></i> <span class="manual_doc_unlike_count">'. $meta_values = get_post_meta( $postID, 'votes_unlike_doc_manual', true ) .' '.esc_html($theme_options['no-user-input-text']).' </span></span></a></span> ';	
		
		if( is_super_admin() && is_user_logged_in() ) {
			echo '<span class="post-reset"><a data-post_id="'.$postID.'" href="#"><span class="btn btn-warning" data-rating="0"> <i class="fa fa-refresh"></i> <span class="rating_reset_display"> Reset </span></span></a></span>';
		}
					
		echo '</div></div>';
		echo '<div class="clearfix"></div>';
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	DOCUMENTATION RELATED POST
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_doc_related_post')) {
	function manual_doc_related_post($currentID) {  
		
		global $post, $theme_options;
		if( isset($theme_options['documentation-related-post-per-page']) && $theme_options['documentation-related-post-per-page'] != '' ) {
			$posts_per_page = $theme_options['documentation-related-post-per-page'];
		} else {
			$posts_per_page = 6;
		}
		$categories = get_the_terms($currentID, 'manualdocumentationcategory');
		//print_r($categories);
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) 
				$category_ids[] = $individual_category->term_id;
				//print_r($category_ids);
			$args=array(
			'post_type' => 'manual_documentation',
			'tax_query' => array(
				array(
					'taxonomy' => 'manualdocumentationcategory',
					'field' => 'term_id',
					'terms' => $category_ids
				)
			),
			'post__not_in' => array($currentID),
			'posts_per_page'=> $posts_per_page, // Number of related posts that will be shown.
			'ignore_sticky_posts'=>1 // sticky post hide
		   );
		   $related_articles_query = new wp_query( $args );
		   if( $related_articles_query->have_posts() ) {
		   ?>
			<section class="manual_related_articles">
				<h5><?php echo esc_html($theme_options['documentation-related-post-title']); ?></h5>
				<span class="separator small"></span>
				<ul class="kbse">
				<?php 
				 while( $related_articles_query->have_posts() ) {
						$related_articles_query->the_post();
				?>
					<li class="cat inner"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></li>
				 <?php } ?>
				</ul>
			</section>      
		   <?php 	   
		   }
		}
		wp_reset_postdata();
	}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: DOCUMENTATION HOME PAGE
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__doc_landingpg')) {
	function manual__doc_landingpg($term_id, $cat_display_order, $cat_display_order_by) { 
			
		$args = array(
			'orderby'           => $cat_display_order_by, 
			'order'             => $cat_display_order,
			'hide_empty'        => true, 
			'exclude'           => array(), 
			'exclude_tree'      => array(), 
			'include'           => array(),
			'number'            => '', 
			'fields'            => 'all', 
			'slug'              => '',
			'hierarchical'      => true, 
			'child_of'          => $term_id, 
			'get'               => '', 
			'name__like'        => '',
			'description__like' => '',
			'pad_counts'        => false, 
			'offset'            => '', 
			'search'            => '', 
			'cache_domain'      => 'core'
		); 
		$customPostTaxonomies = get_object_taxonomies('manual_documentation');		
		$customPostTaxonomies = get_terms( $customPostTaxonomies[0], $args );
		if (!empty($customPostTaxonomies)) {
		    echo '<ul class="news-list doc-landing child">';
			foreach($customPostTaxonomies as $cat) {
				echo "<li class='cat-lists'><h4 style='margin-bottom: 0px;'>";
				echo '<a href="' . esc_attr(get_term_link($cat, $customPostTaxonomies[0])) . '" >' . esc_attr( $cat->name ).'</a>';
				echo "</h4><p>".esc_html( $cat->description )."</p>";
				echo '</li>';
			}
			echo '</ul>';
		  }	
			
	}
}

/*-----------------------------------------------------------------------------------*/
/*	INLINE POST TYPE
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__inlinerecords_postype')) {
	function manual__inlinerecords_postype($post_info, $taxonomycat, $term_id, $display_order_doc = 'ASC', $display_order_doc_by, $sidebarpadding = '', $searchtext = '', $onoffsearchbox = 'on') {
		
		global $post, $theme_options;
		$return = '<div class="custom-well blankbg sidebar-nav" style="'.$sidebarpadding.' padding-top:0px;">';
		
		/*****************
		**** INLINE GUI ****
		******************/
		$return .= '<div class="inlinedocs-sidebar" id="docinlinespy" data-spy="affix">';
		if( $onoffsearchbox == 'on' ) $return .= manual__inlinesearch_form($searchtext, $post_info);
		$return .= '<ul class="nav">';
		$args = array( 
			'posts_per_page'    => -1,
			'post_type'  		=> $post_info,
			'orderby'   		=> $display_order_doc_by,
			'order'     		=> $display_order_doc,
			"post_parent"       => 0, 
			'tax_query'			=> array(
				array(
					'taxonomy'	 		=> $taxonomycat,
					'field' 	 		=> 'id',
					'include_children'  => false,
					'terms' 			=> $term_id,
				)
			)
		);
		$cat_posts = get_posts( $args );
		$i = 1;
		foreach( $cat_posts as $post ) {
			$count = manual_count_child_post($post, $post_info, $term_id, $taxonomycat);
			$return .= '<li>';
			$return .= '<a href="#'. get_the_ID().'" class="inlineclick">';
			$return .= get_the_title();
			$return .= '</a>';
			$return .= manual__inlinerecords_child($post, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by);
			$i++;
		$return .= '</li>';
		} // Eof foreach
		$return .= '</ul></div>';
		
		$return .= '</div>';
		return $return;
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	INLINE POST TYPE - CHILD
/*-----------------------------------------------------------------------------------*/ 
if (!function_exists('manual__inlinerecords_child')) {
	function manual__inlinerecords_child( $post, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by) {
		global $theme_options;
		$children = get_posts( array( 'post_parent' => $post->ID, 
									  'post_type' => $post_info, 
									  'orderby' => $display_order_doc_by,
									  'order' => $display_order_doc,
									  'posts_per_page'   => -1,
									  'taxonomy' => $taxonomycat,
									  ));
		$child = count($children);
		if( $child > 0 ) {
			$return = '<ul class="nav">';
			foreach($children as $child) :
				$count_child = manual_count_child_post($child, $post_info, $term_id, $taxonomycat); 
				if( is_object_in_term( $child->ID, $taxonomycat, $term_id) === true ): 
					$return .= '<li><a href="#'.$child->ID.'" class="inlineclick">'.$child->post_title.'</a>';
					$return .= manual__inlinerecords_child($child, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by); 
					$return .= '</li>';
				endif;
			endforeach; 
			$return .= '</ul>';
			return $return;
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	INLINE POST TYPE - RECORDS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__inlinerecords_postype_records')) {
	function manual__inlinerecords_postype_records($post_info, $taxonomycat, $term_id, $display_order_doc = 'ASC', $display_order_doc_by) {
		global $theme_options;
		
		$current_pgid = get_queried_object_id();
		$current_pgurl = get_permalink( $current_pgid );
		
		$return = '';
		$args = array( 
			'posts_per_page'    => -1,
			'post_type'  		=> $post_info,
			'orderby'   		=> $display_order_doc_by,
			'order'     		=> $display_order_doc,
			"post_parent"       => 0, 
			'post_status'       => 'publish',
			'tax_query'			=> array(
				array(
					'taxonomy'	 		=> $taxonomycat,
					'field' 	 		=> 'id',
					'include_children'  => false,
					'terms' 			=> $term_id,
				)
			)
		);
		$wp_inlinedocquery = new WP_Query($args);
		if($wp_inlinedocquery->have_posts()) {
			
			$i = 0;
			$return .= '<div class="print-content inline-content-block">';
			$return .= '<div class="printinlinedoc">'.do_shortcode('[print-me printstyle="pom-small-grey" tag="span" target=".print-content"]').'</div>'; 
			while($wp_inlinedocquery->have_posts()) { $wp_inlinedocquery->the_post();
			
					$access_meta = get_post_meta( $wp_inlinedocquery->post->ID, 'doc_single_article_access', true );
					$check_post_user_level_access = get_post_meta( $wp_inlinedocquery->post->ID, 'doc_single_article_user_access', true );
					
					$return .= '<div id="'.$wp_inlinedocquery->post->ID.'" class="ininebody" '.(($i == 0)?'style="padding-top: 0px;"':'').'>';
					$return .= '<div class="page-title-header"><h2 class="inline-pagetitle">'. esc_html($wp_inlinedocquery->post->post_title) .'<span class="inlinedoc-postlink" onclick="prompt(\'Press Ctrl + C, then Enter to copy to clipboard\',\''.esc_url($current_pgurl).'#'.$wp_inlinedocquery->post->ID.'\')">#</span></h2></div>';
					$return .= '<div class="post-cat margin-btm-35"></div>';
					
					/********************************
					**** ARTICLE LOCK STATUS CHECK ****
					*********************************/
					if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
						$return .= manual_get_login_form_control($access_meta['message']);
					} else {
						/****************************************************
						**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
						*****************************************************/
						if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
						else  $access_status = true;
						
						if( $access_status == false ) {
							$return .= '<div class="doc_access_control"><p>';
							$return .= esc_html($theme_options['documentation-single-page-access-control-message']);
							$return .= '</p></div>';
						} else {
							$return .= '<div class="entry-content clearfix">'.apply_filters('the_content', $wp_inlinedocquery->post->post_content).'</div>';
						}
					}
					
					$return .= manual__inlinerecords_child_postype_records($wp_inlinedocquery->post->ID, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by);
					$return .= '<div class="margin-btm-40"></div>';
					$return .= '</div>';
			$i++;		
			}
			$return .= '</div>';
			
		}
		wp_reset_postdata();
		return $return;
	}
}


if (!function_exists('manual__inlinerecords_child_postype_records')) {
	function manual__inlinerecords_child_postype_records($inlinechildID, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by, $tag='h3') {
		global $theme_options;
		$current_pgid = get_queried_object_id();
		$current_pgurl = get_permalink( $current_pgid );
		$return = '';
		$children = get_posts( array( 'post_parent' => $inlinechildID, 
									  'post_type' => $post_info, 
									  'orderby' => $display_order_doc_by,
									  'order' => $display_order_doc,
									  'posts_per_page'   => -1,
									  'taxonomy' => $taxonomycat,
									  ));
		$child = count($children);
		if( $child > 0 ) {
			foreach($children as $child) :
				$count_child = manual_count_child_post($child, $post_info, $term_id, $taxonomycat); 
				if( is_object_in_term( $child->ID, $taxonomycat, $term_id) === true ): 
					$access_meta = get_post_meta( $child->ID, 'doc_single_article_access', true );
					$check_post_user_level_access = get_post_meta( $child->ID, 'doc_single_article_user_access', true );
					$return .= '<div id="'.$child->ID.'" class="ininebodyinner">';
					$return .= '<'.$tag.' class="inline-pagetitle">'. esc_html($child->post_title) .'<span class="inlinedoc-postlink inner" onclick="prompt(\'Press Ctrl + C, then Enter to copy to clipboard\',\''.esc_url($current_pgurl).'#'.$child->ID.'\')">#</span></'.$tag.'>';
					
					/********************************
					**** ARTICLE LOCK STATUS CHECK ****
					*********************************/
					$access_meta = get_post_meta( $child->ID, 'doc_single_article_access', true );
					$check_post_user_level_access = get_post_meta( $child->ID, 'doc_single_article_user_access', true );
					if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
						$return .= manual_get_login_form_control($access_meta['message']);
					} else {
						/****************************************************
						**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
						*****************************************************/
						if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
						else  $access_status = true;
						
						if( $access_status == false ) {
							$return .= '<div class="doc_access_control"><p>';
							$return .= esc_html($theme_options['documentation-single-page-access-control-message']);
							$return .= '</p></div>';
						} else {
							$return .= '<div class="entry-content clearfix">'.apply_filters('the_content', $child->post_content).'</div>';
						}
					}
					
					$return .= manual__inlinerecords_child_postype_records($child->ID, $post_info, $term_id, $taxonomycat, $display_order_doc, $display_order_doc_by, 'h3');
					$return .= '</div>';
					
				endif;
			endforeach; 
			return $return;
		}
	}
}

?>