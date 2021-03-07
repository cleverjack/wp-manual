<?php 
/*************************************
***    ADD VC SC 1 :: COUNTER     ***
**************************************/
if(!function_exists("manual_theme_counter")){
	function manual_theme_counter( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"position"         => "",
			"digit"            => "",
			"font_weight"      => "",
			"font_color"       => "",
			"text"             => "",
			"text_transform"   => "",
			"text_color"       => "",
			"text_font_weight" => "",
			"separator"        => "",
			"separator_color"  => "",
		), $atts ) );
		
		// Countdown Color
		if( isset($font_color) && $font_color != '' ) { $font_color = 'color:'.$font_color.';';  
		} else { $font_color = ''; }
		// Countdown Font Weight
		if( isset($font_weight) && $font_weight != '' ) { $font_weight = 'font-weight:'.$font_weight.';'; 
		} else { $font_weight = ''; }
		// Text Color
		if( isset($text_color) && $text_color != '' ) { $text_color =  $text_color = 'color:'.$text_color.';';  
		} else { $text_color = ''; }
		// Text Font Weight
		if( isset($text_font_weight) && $text_font_weight != '' ) { $text_font_weight = 'font-weight:'.$text_font_weight.';'; 
		} else { $text_font_weight = ''; }
		// Separator Color
		if( isset($separator_color) && $separator_color != '' ) { $separator_color = $separator_color;
		} else { $separator_color = ''; }
		// Text Transform 
		if( isset($text_transform) && $text_transform != '' ) { $text_transform = 'text-transform:'.$text_transform.';'; 
		} else { $text_transform = ''; }
		// Separator yes/no
		if( $separator == 'yes' ) { 
			$separator_html = '<span class="separator small" style="background:'.$separator_color.'"></span>';
			$count_down_value_height = '';
		} else { 
			$separator_html = '';
			$count_down_value_height = 'height: 90px;'; 
		}
		
		$return  = '<div class="funact-main-div sc-funact text-white">
		  <span class="timer counter-select-number" data-to="'.$digit.'" data-speed="10000" style="'.$font_color.''.$count_down_value_height.''.$font_weight.'"></span>
		 '.$separator_html.'
		  <p class="counter-sc-text" style="'.$text_color.''.$text_font_weight.''.$text_transform.'">'.$text.'</p>
		</div>';
		
		return $return;
	}
add_shortcode('manual_theme_counter', 'manual_theme_counter');	
}

/*************************************
***    ADD VC SC 2 :: TEAM       ***
**************************************/
if(!function_exists("manual_our_team")){
	function manual_our_team( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"team_image"       => "",
			"team_name"        => "",
			"name_title_tag"   => "h4",
			"name_color"       => "",
			"team_position"    => "",
			"position_color"   => "",
			"show_separator"   => "",
			"separator_color"  => "",
			"icons_color"      => "",
			// social - 1
			"team_social_icon_1"         => "",
			"team_social_icon_1_link"    => "",
			"team_social_icon_1_target"  => "",
			// social - 2
			"team_social_icon_2"         => "",
			"team_social_icon_2_link"    => "",
			"team_social_icon_2_target"  => "",
			// social - 3
			"team_social_icon_3"         => "",
			"team_social_icon_3_link"    => "",
			"team_social_icon_3_target"  => "",
			// social - 4
			"team_social_icon_4"         => "",
			"team_social_icon_4_link"    => "",
			"team_social_icon_4_target"  => "",
		), $atts ) );
		
		
		if (is_numeric($team_image) && isset($team_image)) {
			$image_src = wp_get_attachment_url($team_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/team-blank.png';
		}
		if( $show_separator == 'yes' ) {
			$seprator = '<div class="separator" style="background-color:'.$separator_color.'"></div>';
		} else {
			$seprator = '<div class="no-separator"></div>';
		}
		
$return = '<div class="manual_team">
		  <div class="manual_team_inner">
			<div class="manual_team_image"><img src="'.$image_src.'"></div>
			<div class="manual_team_text" style="padding-top:0px;">
				<div class="manual_team_title_holder">
				<'.$name_title_tag.' class="manual_team_name" style="color:'.$name_color.'!important;">'.$team_name.'</'.$name_title_tag.'>
				<span style="color:'.$position_color.';">'.$team_position.'</span> '.$seprator.'
					<div class="team_social_holder">
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_1_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_1.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_2_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_2.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_3_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_3.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_4_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_4.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					</div>
				</div>
			</div>
		  </div>
		</div>';
		
		return $return;
	}
add_shortcode('manual_our_team', 'manual_our_team');	
}

/*************************************
***  ADD VC SC 3 :: TESTIMONIALS   ***
**************************************/
if(!function_exists("manual_theme_testimonials")){
	function manual_theme_testimonials( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"number"                  => "",
			"order_by"                => "",
			"order"                   => "",
			"text_color"              => "",
			"author_text_font_weight" => "",
			"author_text_color"       => "",
			"custom_font_size"        => "",
		), $atts ) );
		
		if( isset($number) && $number != '' ) $number = $number;
		else $number = '-1';
		
		if( isset($order_by) && $order_by != '' ) $order_by = $order_by;
		else $order_by = 'menu_order';
		
		if( isset($order) && $order != '' ) $order = $order;
		else $order = 'DESC';
		
		$return = '<style>.vc_sc_testo .owl-page span{ background:'.$text_color.'!important;}</style>';
		$return .= '<div class="home-testo-desk vc_sc_testo">'; 	
		$args = array(
						'post_type' => 'manual_tmal_block',
						'posts_per_page' => $number,
						'orderby' => $order_by,
						'post_status' => 'publish',
						'order' => $order,
					);
			$wp_query = new WP_Query($args);
			if($wp_query->have_posts()) {
				$i = 0;
				while($wp_query->have_posts()) { $wp_query->the_post();
				$return .= '<div class="testimonial text-center"><div class="testimonial-text">
						<div class="testimonial-quote">
							<p class="textmsg" style="color:'.$text_color.';font-size:'.$custom_font_size.';">
							'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text', true ).'
							</p>
						</div>
						<div class="testimonial-cite" style="font-weight:'.$author_text_font_weight.';color:'.$author_text_color.';">'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_name', true ).'</div>
					 </div></div>';
				}
			} 
		wp_reset_postdata(); 
		$return .= '</div>';
		
		return $return;
	}
add_shortcode('manual_theme_testimonials', 'manual_theme_testimonials');	
}

/*************************************
***    ADD VC SC 4 :: TEXT ICON    ***
**************************************/
if(!function_exists("manual_theme_icon_text")){
	function manual_theme_icon_text( $atts, $content = null ) {
		$link_html = '';
		$a_box_open = $a_box_close = $a_open = $a_close = '';
		extract( shortcode_atts( array( 
			"use_custom_icon_box_design"  => "",
			"icon_box_color"  => "",
			"icon_box_padding"  => "",
			"icon_box_margin"  => "",
			"box_css_animation"  => "",
			"icon_name"  => "",
			"title"      => "",
			"text"      => "",
			"use_custom_icon_size" => "",
			"custom_icon_size" => "",
			"text_color" => "",
			"title_font_weight" => "",
			"title_color" => "",
			"icon_color" => "",
			"display_icon_position" => "",
			"display_icon_top_margin" => "",
			"activate_link" => "",
			"link_icon" => "",
			"link"     => "",
			"link_color"  => "",
			"custom_top_margin_maintext_and_text"  => "",
			"custom_icon_margin"  => "",
			"title_font_size"  => "",
			"title_font_transform"  => "",
			
		), $atts ) );
		
		// custom icon box design
		if( $use_custom_icon_box_design == 'yes' ) {
			$box_design = 'style="background:'.$icon_box_color.';padding:'.$icon_box_padding.';margin:'.$icon_box_margin.'"';
		} else {
			$box_design = '';
		}
		// eof of custom icon box design	
		
		if( $use_custom_icon_size == "yes" ) {
			$new_custom_icon_size = $custom_icon_size.'px';
		} else {
			$new_custom_icon_size = '';
		}
		
		if( $display_icon_position == 'left' || $display_icon_position == 'left_from_title' ) { 
			$icon_position_class = '';
		} else if( $display_icon_position == 'top' ) { 
			$icon_position_class = 'top';
			$display_icon_top_margin = $display_icon_top_margin;
		} else {
			$display_icon_top_margin = '';
			$icon_position_class = '';
		}
		
		// activate link
		if( $activate_link == 'yes' ) {
			$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
			if( $link_icon == 'box' ) {
				$a_box_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
				$a_box_close = '</a>';
			} else if( $link_icon == 'yes' ) {
				$a_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
				$a_close = '</a>';
			} else {  
				if( $link_icon == 'both' ) {
					$a_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
					$a_close = '</a>';
				}
				if( isset($link['title']) && $link['title'] != '' ) { 
					$link_html = '<p style="padding-top:10px;text-transform: capitalize;letter-spacing: 0.6px;"> <a href="'.$link['url'].'" class="custom-link hvr-icon-wobble-horizontal" style="color:'.$link_color.'!important;" target="'.$link['target'].'">'.$link['title'].'  &nbsp;<i class="fa fa-arrow-right hvr-icon" style="color:'.$link_color.'!important;"></i></a> </p>';
				} else {  
					$link_html = '';
				}
			}
		}

		
if( $display_icon_position == 'left_from_title' ) { 
	$return = '<div class="'.$box_css_animation.'">'.$a_box_open.'<div class="manual_icon_with_title" '.$box_design.'">
	  
	  <div class="icon_holder '.$icon_position_class.' " style="margin-bottom:'.$display_icon_top_margin.'px;width: 100%;display: -webkit-box;">
		'.$a_open.'<span class=""><i class="'.$icon_name.'" style="font-size:'.$new_custom_icon_size.'; color:'.$icon_color.';padding: 0 20px 0 0;"></i></span>'.$a_close.'
		<h5 style="font-weight:'.$title_font_weight.'!important;color:'.$title_color.'!important;font-size:'.$title_font_size.'px!important;text-transform:'.$title_font_transform.'!important;">'.$title.'</h5>
	  </div>
	  
	  <div class="icon_text_holder '.$icon_position_class.'" style="padding:0px;padding-top:10px; clear: both;">
		<div class="icon_text_inner" style="margin-top:'.$custom_top_margin_maintext_and_text.'px;">
		  <p class="desc" style="color:'.$text_color.';">'.$text.'</p>
		  '.$link_html.'
		</div>
	  </div>
	  
	</div>'.$a_box_close.'</div>';
		
} else {
	
	if( $display_icon_position == 'left' ) $custom_icon_margin_left = $custom_icon_margin;
	else $custom_icon_margin_left = '';
	
	$return = '<div class="'.$box_css_animation.'">'.$a_box_open.'<div class="manual_icon_with_title" '.$box_design.'">
	  
	  <div class="icon_holder '.$icon_position_class.' " style="margin-bottom:'.$display_icon_top_margin.'px;">
	  '.$a_open.'<span class=""><i class="'.$icon_name.'" style="font-size:'.$new_custom_icon_size.'; color:'.$icon_color.';"></i></span>'.$a_close.'
	  </div>
	  
	  <div class="icon_text_holder '.$icon_position_class.'" style="padding-left:'.$custom_icon_margin_left.'px;">
		<div class="icon_text_inner">
		  <h5 style="font-weight:'.$title_font_weight.'!important;color:'.$title_color.'!important;font-size:'.$title_font_size.'px!important;text-transform:'.$title_font_transform.'!important;">'.$title.'</h5>
		  <p class="desc" style="color:'.$text_color.';margin-top:'.$custom_top_margin_maintext_and_text.'px;">'.$text.'</p>
		  '.$link_html.'
		</div>
	  </div>
	  
	</div>'.$a_box_close.'</div>';
}


		return $return;
	}
add_shortcode('manual_theme_icon_text', 'manual_theme_icon_text');	
}

/*************************************
***  ADD VC SC 5 :: KNOWLEDGEBASE  ***
**************************************/
if(!function_exists("manual_theme_all_knowledgebase")){  
	function manual_theme_all_knowledgebase( $atts, $content = null ) {
	global $theme_options;	
	
		extract( shortcode_atts( array( 
			"knowledgebase_style_type" => '1',
			"knowledgebase_design_style_type" => '1',
			
			"knowledgebase_design_style_type1_border_color" => '#e1e1e1',
			"knowledgebase_design_style_type1_bg_color" => '#ffffff',
			"knowledgebase_design_style_type1_titletxtbg_color" => '#F6F6F6',
			
			
			"kb_no_of_category_records" => '0',
			"knowledgebase_column"  => "4",
			"knowledgebase_category_display_order"  => "ASC",
			"knowledgebase_category_display_orderby"  => "name",
			"knowledgebase_no_of_articles"  => "5",
			"knowledgebase_page_article_display_order"  => "ASC",
			"knowledgebase_page_article_display_orderby"  => "date",
			"knowledgebase_child_cat_as_root"  => "no",
			"category_title_tag" => "h5",
			"knowledgebase_view_all"  => "View All",
			"read_more_text_display" => 'yes',
			"kbgroupcatid"  => "",
			"icon_color" => "",
			"cat_desc_color" => "#96989a",
			"display_kb_cat_desc" => "yes",
		), $atts ) );
		
		
		// Knowledgebase Column & Style 
		$class = ''; 
		if( $knowledgebase_column == 4 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 4;
		} else if( $knowledgebase_column == 6 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid-without-sidebar'; }
			$col_md = 6;
		} else {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 4;
		}
		
		// Knowledegabse design style
		$kb_title_designstyle = $knowledgebase_body_style = '';
		if( $knowledgebase_design_style_type == 2 ) {
			$knowledgebase_body_style = 'style="border: 1px solid '.$knowledgebase_design_style_type1_border_color.'; padding: 19px; background:'.$knowledgebase_design_style_type1_bg_color.';"';
			$kb_title_designstyle = 'style="border-radius: 5px; margin-bottom: 10px; background: '.$knowledgebase_design_style_type1_titletxtbg_color.'; padding: 15px 15px 1px 15px;"';	
		}
				
		// Category Display Order
		if( isset($knowledgebase_category_display_order) && $knowledgebase_category_display_order != ''  ) {
			$cat_display_order = $knowledgebase_category_display_order;
		}
		if( isset($knowledgebase_category_display_orderby) && $knowledgebase_category_display_orderby != ''  ) {
			$cat_display_order_by = $knowledgebase_category_display_orderby;
		}
		
		// Records Under Category Display Order
		if( isset($knowledgebase_page_article_display_order) && $knowledgebase_page_article_display_order != ''  ) {
			$page_display_order = $knowledgebase_page_article_display_order;
		}
		if( isset( $knowledgebase_page_article_display_orderby ) && $knowledgebase_page_article_display_orderby != '' ) {
			$display_page_order_by = $knowledgebase_page_article_display_orderby;	
		}
		
		$id = get_the_ID();
		$get_id = update_option('manual_breadcrumb_kb', $id);
		
		
		$kb_catIDs = '';
		if( isset( $kbgroupcatid ) && $kbgroupcatid != '' ) {
			$kb_catIDs = explode(',', $kbgroupcatid); 
		}
		 
		//list terms in a given taxonomy
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $cat_display_order,
			'orderby'       => $cat_display_order_by,
			'number'        => $kb_no_of_category_records,
		); 
		$tax_terms = get_terms('manualknowledgebasecat', $args);
		if( $knowledgebase_child_cat_as_root == 'no' ) $tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
		$return = '<div class="'.$class.'">';
		
		// FIXROW
		if( $knowledgebase_style_type == 2 && ($knowledgebase_column == 4 || $knowledgebase_column == 6) ) {
			$return .= '<div class="row row-eq-height" style="margin: 0px;">'; // control every 3 loop
		}
		// EOF FIXROW
		
	    $i = 1;
		$cat_icon_name = 'icon-briefcase';
		
	    foreach ($tax_terms as $tax_term) { 
		
		$check_if_login_call = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
		$check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
		$custom_login_message = get_option( 'kb_cat_login_message_'.$tax_term->term_id );
		$cat_icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
		
		if( isset( $cat_icon_name ) && $cat_icon_name != '' ) {
			$cat_icon_name = $cat_icon_name;
		} else {
			$cat_icon_name = 'icon-briefcase';
		}
		
		if ( !empty($kb_catIDs) && !in_array( $tax_term->term_id, $kb_catIDs)) continue;
		
	    $return .= '<div class="col-md-'.$col_md.' col-sm-12 masonry-item body-content"> 
				    <div class="knowledgebase-body" '.$knowledgebase_body_style.'>';
					
		if( isset($cat_icon_name) && $cat_icon_name != '' ) { 
			$return .= '<div class="kb-title-wrap" '.$kb_title_designstyle.' ><div class="kb-masonry-icon"><'.$category_title_tag.'><i class="'.$cat_icon_name.'" style="color:'.$icon_color.'" ></i></'.$category_title_tag.'></div><div class="vc-kb-masonry-tag-right">';
		}			
					
		$return .= '<'.$category_title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'">'; 
	    
         $cat_title = $tax_term->name; 
         $return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
         $return .= '</a> 
                     </'.$category_title_tag.'>';
					 
		if( $display_kb_cat_desc == 'yes' ) {			 
			$return .= '<div style="color:'.$cat_desc_color.'">'.category_description($tax_term->term_id).'</div>'; 
		}
					 
		 if( isset($cat_icon_name) && $cat_icon_name != '' ) { $return .= '</div>'; }
		 
		 if( $knowledgebase_design_style_type != 2 ) $return .= '<span class="separator small"></span>';
		 $return .= '</div>';
		 
		 if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			$return .= manual_get_login_form_control($custom_login_message);
		 } else {
				 
			if( !empty($check_user_role) ) $access_status = manual_doc_access(($check_user_role));
			else  $access_status = true;
			
			if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) {
					$return .= '<div class="manual_login_page"> <div class="custom_login_form"><p>';
					$return .= $theme_options['kb-cat-page-access-control-message'];
					$return .= '</p></div></div>';
			} else {	 
						 
				$return .= '<ul class="kbse">';
				if( isset( $knowledgebase_no_of_articles ) && $knowledgebase_no_of_articles != '' ) {
					$display_on_of_records_under_cat = $knowledgebase_no_of_articles;	
				} else {
					$display_on_of_records_under_cat = 5;
				}
							 
				$args = array( 
					'post_type'  => 'manual_kb',
					'posts_per_page' => $display_on_of_records_under_cat,
					'orderby' => $display_page_order_by,
					'order'  => $page_display_order,
					'tax_query' => array(
						array(
							'taxonomy' => 'manualknowledgebasecat',
							'field' => 'term_id',
							'include_children' => true,
							'terms' => $tax_term->term_id
						)
					)
				 );
				 $st_cat_posts = get_posts( $args );
				 foreach( $st_cat_posts as $post ) : 
				 $return .= '<li class="cat inner"> <a href="'. get_permalink($post->ID).'">';
				 $org_title = $post->post_title; 
				 $return .= html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
				 $return .= '</a> </li>';
				 endforeach;
				 $return .= '</ul>';
				 
				 if( $knowledgebase_no_of_articles < $tax_term->count ) { 
					 if( $read_more_text_display == 'yes' ) {
						 $return .= '<div style="padding:10px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link hvr-icon-wobble-horizontal kblnk" >
							   '. $knowledgebase_view_all .'
							   '. $tax_term->count.' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></div>';
					 }
				 }
					   
			  }
		  }
          $return .= '</div> </div>';
		  
		// FIXROW
		if( $knowledgebase_style_type == 2 && $knowledgebase_column == 4 ) { 
			if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else if( $knowledgebase_style_type == 2 && $knowledgebase_column == 6 ) {
			if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		}
		// EOF FIXROW
		  
         $i++; }
		 
		 wp_reset_postdata();
		 
		 // FIXROW
		if( $knowledgebase_style_type == 2 && ($knowledgebase_column == 4 || $knowledgebase_column == 6) ) { 
			$return .= '</div>'; 
		}
		// EOF FIXROW
		 
		 $return .= '</div>';
		// Eof main code
		return $return;
		
	}
add_shortcode('manual_theme_all_knowledgebase', 'manual_theme_all_knowledgebase');	
}

/*************************************
***  ADD VC SC 6 :: KB CATEGORY    ***
**************************************/
if(!function_exists("manual_theme_kb_category")){
	function manual_theme_kb_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"kb_category_title"            => "",
			"kb_category_show_post_count"  => "",
			"count_text_color"   => "",
			"count_bg_color"   => "",
		), $atts ) );
		
		$categories = get_categories('taxonomy=manualknowledgebasecat&post_type=manual_kb');
		$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget vc-kb-cat-widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $kb_category_title . '</span></h5>';
		$return .= '<ul class="vc_kbcat_widget">';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );
			$return .= '<li><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
			if( $kb_category_show_post_count == 'true' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
			$return .= '</li>';
		}
		$return .= '</ul>';
		wp_reset_postdata();
		$return .= '</div></div>';
		return $return;
	}
add_shortcode('manual_theme_kb_category', 'manual_theme_kb_category');	
}

/******************************************
***  ADD VC SC 7 :: KB POPULAR ARTICLE  ***
*******************************************/
if(!function_exists("manual_theme_kb_popular_article")){
	function manual_theme_kb_popular_article( $atts, $content = null ) {
		global $post, $wpdb;
		extract( shortcode_atts( array( 
			"title"   => "",
			"knowledgebase_article_display_type"   => "",
			"knowledgebase_article_number"   => "5",
			"knowledgebase_article_order"   => "ASC",
		), $atts ) );
		
		$default_sql = 1;
		
		$return = '<div class="vc_kb_article_type sidebar-nav sidebar-widget widget_kb_cat_widget vc-kb-popular-widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $title . '</span></h5>';
		
		$args = '';
		if( $knowledgebase_article_display_type == 1 ) { // Latest Article
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
			
		} else if( $knowledgebase_article_display_type == 2 ) { // Popular Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'meta_value_num',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'manual_post_visitors'
						);
			
		} else if( $knowledgebase_article_display_type == 3 ) { // Top Rated Article
			$args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_kb',
					'orderby' => 'meta_value_num',
					'order'	=>	$knowledgebase_article_order,
					'meta_key' => 'votes_count_doc_manual'
				);
			
		} else if( $knowledgebase_article_display_type == 4 ) { // Most Commented Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
						
		} else { // Default latest
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		}
		
		if( $default_sql == 1 ) {
			$query = new WP_Query($args);
			$return .= '<ul class="clearfix">';
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			$return .= '<li class="articles"><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
			endwhile; endif;
			$return .= '</ul>'; 
		} else {
			$return .= '<ul class="clearfix">';
			foreach( $results as $key ) {
				$return .= '<li class="articles"><a href="'.get_permalink($key->post_id).'" rel="bookmark">'.get_the_title($key->post_id).'</a></li>';
			}
			$return .= '</ul>';
		}
		wp_reset_postdata();
		$return .= '</div></div>';

		return $return;
	}
add_shortcode('manual_theme_kb_popular_article', 'manual_theme_kb_popular_article');	
}

/*******************************************
***  ADD VC SC 8 :: AJAX LOAD POST TYPE  ***
********************************************/
if(!function_exists("manual__vc_ajaxloaddocumentation")){
	function manual__vc_ajaxloaddocumentation( $atts, $content = null ) {
		global $theme_options;
		
		extract( shortcode_atts( array( 
			"post_type"   => "manual_documentation",
			"posttype_records_display_order" => "ASC",
			"posttype_records_display_orderby" => "menu_order",
			"cat_id_posttype"   => "",
			"posttype_treemenu_display_position" => "left",
			"expandalltext" => "Expand All",
			"collapsealltext" => "Collapse All",
		), $atts ) );
		
		$return = $taxonomy = '';
		
		if( $posttype_treemenu_display_position == "left" ) {
			$content_fixcss = '';
			$padding_left_right_fix = 'padding-left: 0px;';
			$padding_content_right_left_fix = 'padding-right: 0px;';
		} else {
			$padding_left_right_fix = 'padding-right: 0px;';
			$padding_content_right_left_fix = 'padding-left: 0px;';
			$content_fixcss = 'ajxloadvc';
		}

		if( isset($cat_id_posttype) && $cat_id_posttype != '' ) { 
			
			if( $post_type == 'manual_documentation' ) {
				$taxonomy = 'manualdocumentationcategory';
			}
			
			$doc_catID = explode(',', $cat_id_posttype); 
			$args = array(
				'order'         => $posttype_records_display_order,
				'orderby'       => $posttype_records_display_orderby,
			);
			$tax_terms = get_terms($taxonomy, $args);
			
			foreach ($tax_terms as $tax_term) { 
			
				$check_if_login_call = get_option( 'doc_cat_check_login_'.$tax_term->term_id );
				$check_user_role = get_option( 'doc_cat_user_role_'.$tax_term->term_id );
				$custom_login_message = get_option( 'doc_cat_login_message_'.$tax_term->term_id );
				
				if (in_array( $tax_term->term_id, $doc_catID)) {
					
					$return .= '<div class="content-wrapper body-content">';
								
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
							if( $posttype_treemenu_display_position == 'left' ) {
								$return .= '<aside class="col-md-4 col-sm-12" id="sidebar-box" style="'.$padding_left_right_fix.'">';
								$return .= manual__doc_treemenu($post_type, $taxonomy, $tax_term->term_id, $posttype_records_display_order, $posttype_records_display_orderby, 'padding-left:0px;', $expandalltext, $collapsealltext);
								$return .= '</aside>';
							} 
							
							/**********************
							**** CONTENT AREA ****
							***********************/
							$return .= '<div class="col-md-8 col-sm-12 '.$content_fixcss.' " style="'.$padding_content_right_left_fix.'"> <div class="doc-single-post" id="single-post-container"> </div></div>';
							
							
							/**************************
							**** RIGHT SIDEBAR ****
							****************************/
							if( $posttype_treemenu_display_position == 'right' ) { 
								$return .= '<aside class="col-md-4 col-sm-12" id="sidebar-box" style="'.$padding_left_right_fix.'">';
								$return .= manual__doc_treemenu($post_type, $taxonomy, $tax_term->term_id, $posttype_records_display_order, $posttype_records_display_orderby, 'padding-right:0px;', $expandalltext, $collapsealltext);
								$return .= '</aside>';
							}
							
						}
					
					} //eof else
								
					$return .= '</div>';
	
				} // eof inarray
				
			} // eof foreach
			wp_reset_postdata();
			
		}
		
		return $return;
	}
add_shortcode('manual__vc_ajaxloaddocumentation', 'manual__vc_ajaxloaddocumentation');	
}


/**********************************************
***  ADD VC SC 8.1 :: INLINE DOCUMENTATION  ***
***********************************************/
if(!function_exists("manual__vc_inlinedocumentation")){
	function manual__vc_inlinedocumentation( $atts, $content = null ) {
		global $theme_options;
		extract( shortcode_atts( array( 
			"post_type"   => "manual_documentation",
			"posttype_inlinerec_display_order" => "ASC",
			"posttype_inlinerec_display_orderby" => "menu_order",
			"cat_id_posttype"   => "",
			"posttype_inlinerec_display_position" => "left",
			"inlinesearchboxtext" => "Search...",
			"inlineodc_searchonoff" => "on",
		), $atts ) );
		
		if( $posttype_inlinerec_display_position == "left" ) {
			$padding_left_right_fix = 'padding-left: 0px;';
			$padding_content_right_left_fix = 'padding-right: 0px;';
			$content_position = 'inline-content-block-left';
		} else {
			$padding_left_right_fix = 'padding-right: 0px;';
			$padding_content_right_left_fix = 'padding-left: 0px;';
			$content_position = 'inline-content-block-right';
		}
		
		$return = $taxonomy = '';
		if( isset($cat_id_posttype) && $cat_id_posttype != '' ) { 
			
			if( $post_type == 'manual_documentation' ) {
				$taxonomy = 'manualdocumentationcategory';
			}
			
			$doc_catID = explode(',', $cat_id_posttype); 
			$args = array(
				'order'         => $posttype_inlinerec_display_order,
				'orderby'       => $posttype_inlinerec_display_orderby,
			);
			$tax_terms = get_terms($taxonomy, $args);
			
			foreach ($tax_terms as $tax_term) { 
			
				$check_if_login_call = get_option( 'doc_cat_check_login_'.$tax_term->term_id );
				$check_user_role = get_option( 'doc_cat_user_role_'.$tax_term->term_id );
				$custom_login_message = get_option( 'doc_cat_login_message_'.$tax_term->term_id );
				
				if (in_array( $tax_term->term_id, $doc_catID)) {
					
					$return .= '<div class="content-wrapper body-content">';
								
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
							if( $posttype_inlinerec_display_position == 'left' ) {
								$return .= '<aside class="col-md-4 col-sm-12 inlinedocsidebar" id="sidebar-box" style="'.$padding_left_right_fix.'">';
								$return .= manual__inlinerecords_postype($post_type, $taxonomy, $tax_term->term_id, $posttype_inlinerec_display_order, $posttype_inlinerec_display_orderby, 'padding-left:0px;', $inlinesearchboxtext, $inlineodc_searchonoff);
								$return .= '</aside>';
							} 
							
							/**********************
							**** CONTENT AREA ****
							***********************/
							$return .= '<div class="col-md-8 col-sm-12 '.$content_position.'" style="'.$padding_content_right_left_fix.'">';
							$return .= manual__inlinerecords_postype_records($post_type, $taxonomy, $tax_term->term_id, $posttype_inlinerec_display_order, $posttype_inlinerec_display_orderby);
							$return .= '</div>';
							
							
							/**************************
							**** RIGHT SIDEBAR ****
							****************************/
							if( $posttype_inlinerec_display_position == 'right' ) { 
								$return .= '<aside class="col-md-4 col-sm-12 inlinedocsidebar inlinedoc-right-sidebar" id="sidebar-box" style="'.$padding_left_right_fix.'">';                          
								$return .= manual__inlinerecords_postype($post_type, $taxonomy, $tax_term->term_id, $posttype_inlinerec_display_order, $posttype_inlinerec_display_orderby, 'padding-right: 0px;', $inlinesearchboxtext, $inlineodc_searchonoff);
								$return .= '</aside>';
							}
							
						}
					
					} //eof else
								
					$return .= '</div>';
	
				} // eof inarray
				
			} // eof foreach
			wp_reset_postdata();
		}
		
		return $return;
	}
add_shortcode('manual__vc_inlinedocumentation', 'manual__vc_inlinedocumentation');		
}



/****************************************
***  ADD VC SC 9 :: HOME HELP BLOCKS  ***
*****************************************/
if(!function_exists("manual_theme_home_help_blocks")){
	function manual_theme_home_help_blocks( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"title"   => "",
		), $atts ) );
		
		$return = '<div class="loop-help-desk">';
        $args = array(
	 				'post_type' => 'manual_hp_block',
					'posts_per_page' => '-1',
					'orderby' => 'menu_order',
					'post_status' => 'publish',
					'order' => 'ASC'
				);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
		while($wp_query->have_posts()) { $wp_query->the_post(); 
         $return .= '<a href="'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link', true ).'">
		   <div class="vc-help-blocks counter-text hvr-float">
              <div class="browse-help-desk" style="background:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_bg_color', true ).';"><div class="browse-help-desk-div"> ';
			    $icon_image_url = get_post_meta( $wp_query->post->ID, '_manual_hpblock_custom_icon', 1 );
				if( $icon_image_url != '' ) {
					$return .= '<img src="'.$icon_image_url.'">';
				} else {
					$return .= '<i class="'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_icon', true ).' i-fa" style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_icon_color', true ).';"></i>';
				}
				$return .= '</div>
                <div class="m-and-p">
                  <h5 style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';">'.get_the_title($wp_query->post->ID).'</h5>
                  <p style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';">'. get_post_meta( $wp_query->post->ID, '_manual_hpblock_text', true ).'</p>';
				
				if( get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_text', true ) != '' ) { 
					 $return .= '<p class="padding" style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';"><span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_color', true ).'!important;">'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_text', true ).'</span></p>';
				} else {  
				   if( get_post_meta( $wp_query->post->ID, '_manual_hpblock_link', true ) != '' ) {
					   $return .= '<p class="padding" style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';"><span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_color', true ).'!important;">Browse&nbsp;'.get_the_title($wp_query->post->ID).' &nbsp;<i class="fa fa-arrow-right hvr-icon"></i></span></p>';
					} 
				}
                $return .= '</div>
              </div>
            </div></a>';
		}
		} 
		wp_reset_postdata();
		$return .= '</div>';
		return $return;
	}
add_shortcode('manual_theme_home_help_blocks', 'manual_theme_home_help_blocks');	
}

/***************************************
***  ADD VC SC 10 :: PORTFOLIO LIST  ***
****************************************/
if(!function_exists("manual_theme_portfolio_sc")){
	function manual_theme_portfolio_sc( $atts, $content = null ) {
		global $post,$paged;
		extract( shortcode_atts( array( 
			"title"                      => "",
			"portfolio_title_tag"        => "h4",
			"portfolio_order"            => "DESC",
			"number_of_post"             => "",
			"portfolio_order_by"         => "date",
			"portfolio_column"           => "3",
			"portfolio_type"             => "",
			"portfolio_shorting"         => "no",
			"shorting_link_color"        => "",
			"shorting_link_border_color" => "",
			"filter_align"               => "left",
			"filter_padding"             => "",
			"link_color"                 => "",
			"link_cat_color"             => "",
			"selected_projects"          => "",
			"category"                   => "",
			"sorting_order"              => "ASC",
			"sorting_order_by"           => "name",
			"show_categories"            => "yes",
			"show_load_more"        	 => "yes",
			"show_load_more_align"       => "",
			"show_load_more_margin"      => "",
			"show_custom_description"      => "no",
		), $atts ) );
		

		if( isset($portfolio_type) && $portfolio_type != '') {
			if( $portfolio_type == 'FitRows' ) {
				$portfolio_type_class = 'isotope-container';
				$image_handler_size = 'portfolio-FitRows';
				if( $portfolio_shorting == 'yes' ) {
					$portfolio_filter_type_class = 'filter-portfolio-group';
					$portfolio_data_filter_li = 'data-filter';
				}
			} else {
				$portfolio_type_class = 'isotope-container-masnory';
				$image_handler_size = 'large';
				if( $portfolio_shorting == 'yes' ) {
					$portfolio_filter_type_class = 'filter-portfolio-group-masnory';
					$portfolio_data_filter_li = 'data-filter-masnory';
				}
			}
		} else {
			$portfolio_type_class = 'isotope-container-masnory';
			$image_handler_size = 'large';
			if( $portfolio_shorting == 'yes' ) {
				$portfolio_filter_type_class = 'filter-portfolio-group-masnory';
				$portfolio_data_filter_li = 'data-filter-masnory';
			}
		}
		
		$return = '<span></span>';
		if( isset($portfolio_shorting) && $portfolio_shorting != '' && $portfolio_shorting == 'yes') {
			
			if( isset($filter_padding) && !empty($filter_padding) ) $filter_padding = $filter_padding;
			else $filter_padding = '50px';
			
			if( !empty($shorting_link_border_color) ) { 
				$readjust_border_color = 'border-bottom: 1px solid '.$shorting_link_border_color.'';
			} else {
				$readjust_border_color = '';
			}
			
			if( !empty($filter_align) ) {
				if( $filter_align == 'left' ) $filter_padding_align_li = 'padding:10px 18px 10px 0px;';
				else if( $filter_align == 'center' ) $filter_padding_align_li = 'padding: 10px 10px;';
				else if( $filter_align == 'right' ) $filter_padding_align_li = 'padding: 10px 0px 10px 18px;';
			}
			
			// cat names 
			$cat_slug_name = array();
			if( !empty($category) ) {
				$category = preg_replace('/\s+/', '', $category);
				$cat_slug_name = explode(",", $category);
			}
					
			$args = array(
				'hide_empty'    => 1,
				'child_of' 		=> 0,
				'pad_counts' 	=> 1,
				'hierarchical'	=> 1,
				'order'         => $sorting_order,
				'orderby'       => $sorting_order_by,
			); 
			$tax_terms = get_terms('manualportfoliocategory', $args);
			$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
			
			if( ! empty($tax_terms) ) { 
				$return .= '<div class="portfolio-start-display-section" style="padding: '.$filter_padding.' 0px;">
							<div class="portfolio-filter portfolio-list-divider '.$portfolio_filter_type_class.'" style="text-align:'.$filter_align.'">
							<ul>';
				$return .= '<li style="'.$filter_padding_align_li.'" '.$portfolio_data_filter_li.'="*" class="selected"><span style="'.$readjust_border_color.';color:'.$shorting_link_color.'">All</span></li>';
				$i = 1;
				foreach ($tax_terms as $tax_term) { 
					 if ( !empty($cat_slug_name) && !in_array( trim($tax_term->slug), $cat_slug_name ) ) continue;
					 $cat_title = $tax_term->name; 
					 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					 $cat_title_filter = strtolower($cat_title);
					 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
					 $return .= ' <li style="'.$filter_padding_align_li.'" '.$portfolio_data_filter_li.'=".'.strtolower($cat_title_filter).'"><span style="'.$readjust_border_color.';color:'.$shorting_link_color.'">'.$cat_title.'</span></li> ';
				 } 
				$return .= '</ul></div></div>';
			} 
		}
		
		if( isset($number_of_post) && $number_of_post != '' ) $number_of_post = $number_of_post;
		else $number_of_post = '-1';
		
		$return .= '<div class="portfolio-readjust-container">';	
		$term_slug = get_query_var( 'term' );
		
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		
		if ($category == "") {
				$args = array(
	 				'post_type' => 'manual_portfolio',
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		} else {
				$args = array(
	 				'post_type' => 'manual_portfolio',
					'manualportfoliocategory' => $category,
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		}
		
		$project_ids = null;
		if ($selected_projects != "") {
			$project_ids = explode(",", $selected_projects);
			$args['post__in'] = $project_ids;
		}
				
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$return .= '<div class="projects_holder '.$portfolio_type_class.'" style="margin:0px -15px;">';
			while($wp_query->have_posts()) : $wp_query->the_post();
			    $cutom_redirect_url = get_post_meta( $wp_query->post->ID, '_manual_portfolio_redirect_link_url', true );
			    $cutom_description = get_post_meta( $wp_query->post->ID, '_manual_portfolio_widget_description', true );
				$taxonomies = get_object_taxonomies( $post->post_type, 'objects' ); 
				$out = array();
				$data_category = array();
				foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
					// get the terms related to post
					$terms = get_the_terms( $post->ID, $taxonomy_slug );
					if ( !empty( $terms ) ) {
						foreach ( $terms as $term ) {
							$out[] = $term->name;
							$data_category[] = $term->name;
						}
					}
				}
				$return .= '<div class="col-md-'.$portfolio_column.' col-sm-6 element-item portfolio-section-records ';
				foreach( $data_category as $val ) { $return .=  preg_replace("/[\s_]/", "-", strtolower($val)).' '; }
				$return .= '">';
				$return .= '<div class="portfolio-image">';
				$return .= '<a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'"> ';
				if ( has_post_thumbnail()) { 
					$return .= get_the_post_thumbnail( $wp_query->post->ID, $image_handler_size, array( 'class' => 'hvr-float' ) );
				} else {
				$return .= '<img width="825" height="510" src="'. trailingslashit( get_template_directory_uri() ).'img/blank-portfolio.jpg" class="hvr-float wp-post-image">';
				}
				$return .= '</a></div>
						    <div class="portfolio-desc">
						    <'.$portfolio_title_tag.'><a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'" style="color:'.$link_color.'!important;">';
							$title = get_the_title(); 
							$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
						
				$return .= '</a></'.$portfolio_title_tag.'>';
				if( $show_categories == 'yes' ) $return .= '<p class="category" style="color:'.$link_cat_color.'">'. implode(', ', $out ).' </p>';
				if( $show_custom_description == 'yes' ) $return .= '<p>'.$cutom_description.'</p>';
				$return .= '</div></div>';
                    
			 endwhile;
			 
			 	$i = 1;
                while ($i <= $portfolio_column) {
                    $i++;
                    if ($portfolio_column != 1) {
                        $return .= "<div class='filler'></div>\n";
                    }
                }
				
			  $return .= '</div>';
             
		} else {
			$return .= '<p> '. esc_html__('Sorry, no posts matched your criteria.', 'manual') .'</p>';
		}
		$return .= '</div>';
		
		if ($show_load_more == "yes" && $wp_query->max_num_pages > 1 ) { 
		if ($show_load_more == "yes" || $show_load_more == "") {
			
			if( isset($show_load_more_margin) && $show_load_more_margin != '' ) $show_load_more_margin = $show_load_more_margin;
			else $show_load_more_margin = '20px';
		
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="ajax_load_more_post load_more custom-botton hvr-icon-spin">' . get_next_posts_link(esc_html__('Show more', 'manual'), $wp_query->max_num_pages) . '&nbsp;</span></div>';
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging_loading load_more "><a href="javascript: void(0)" class="qbutton custom-botton">'.__('Loading...', 'manual').'</a></div>';
		
		}
		}
		
		
		wp_reset_postdata();
		
		return $return;
	}
add_shortcode('manual_theme_portfolio_sc', 'manual_theme_portfolio_sc');	
}

/**************************************
***  ADD VC SC 11 :: MONITOR FRAME  ***
***************************************/
if(!function_exists("manual_theme_monitor_frame_portfolio")){
	function manual_theme_monitor_frame_portfolio( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			"title"      => "",
			"link"       => "#",
			"portfoio_image"  => "",
			"title_tag" => "h6",
		), $atts ) );
		
		
		if (is_numeric($portfoio_image) && isset($portfoio_image)) {
			$image_src = wp_get_attachment_url($portfoio_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
		}
		
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( isset($link['target']) && $link['target'] != ''  ) { 
			$add_parm = 'target="_blank"';
		} else { 
			$add_parm = '';
		}
				
		$return  = '<div class="monitor_frame_main_div mix hvr-bob">
					<img class="monitor_frame" alt="frame" src="'.trailingslashit( get_template_directory_uri() ).'/img/monitor_frame.png">';
					
		$return  .= '<div class="item_holder slide_up">';
						
						if( $link['title'] != ''  ) {
		
						$return  .= '<div class="portfolio_title_holder hvr-bubble-top">
										<'.$title_tag.' class="portfolio_title"><a class="href" href="'.$link['url'].'" '.$add_parm.'>'.$link['title'].'</a></'.$title_tag.'>
									</div>';
						}
						
						$return  .= '<a class="portfolio_link_class" href="'.$link['url'].'" '.$add_parm.'></a> 
						<div class="portfolio_shader"></div>
						
						<div class="image_holder">
							<span class="image"><img src="'.$image_src.'"></span>
						</div>';
					
		$return  .= '</div></div>';
		
		
		return $return;
		
	}
add_shortcode('manual_theme_monitor_frame_portfolio', 'manual_theme_monitor_frame_portfolio');	
}

/**************************************
***  ADD VC SC 12 :: KB SINGLE CAT  ***
***************************************/
if(!function_exists("manual_theme_single_cat_knowledgebase")){
	function manual_theme_single_cat_knowledgebase( $atts, $content = null ) {
		global $post, $theme_options;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"kbsinglecatid"   => "",
			"hide_pagination"   => "1",
		), $atts ) );
		
		$return = '';
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		// Check if access level defined
		$check_if_login_call = get_option( 'kb_cat_check_login_'.$kbsinglecatid );
		$check_user_role = get_option( 'kb_cat_user_role_'.$kbsinglecatid);
		$custom_login_message = get_option( 'kb_cat_login_message_'.$kbsinglecatid );
		if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			$return .= manual__get_login_forum($custom_login_message);
		} else {
			
			if( !empty($check_user_role) ) $access_status = manual_doc_access(($check_user_role));
			else  $access_status = true;
			
			if( $access_status == false ) {
					$return .= '<div class="manual_login_page"> <div class="custom_login_form"><p>';
					$return .= $theme_options['kb-cat-page-access-control-message'];
					$return .= '</p></div></div>';
			} else {
			
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$args = array( 
				'posts_per_page' => $page_per_post, 
				'paged' => $paged,
				'post_type'  => 'manual_kb',
				'orderby' => $post_orderby,
				'order'  => $post_order,
				'tax_query' => array(
					array(
						'taxonomy' => 'manualknowledgebasecat',
						'field' => 'id',
						'include_children' => $include_child_post,
						'terms' => $kbsinglecatid
					)
				)
			 );
			
			$return = '';
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				 $return .= '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
				 while ( $the_query->have_posts() ) : $the_query->the_post();
				 
				   $return .= '<div class="kb-box-single" '; 
				   if( $theme_options['knowledgebase-cat-quick-stats-under-title'] == true ) { $return .= 'style="padding: 5px 20px 0px 65px!important;"'; }
				   $return .= '><h4 style="margin-bottom:5px;"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h4>
								   <p class="entry-meta">';
				   if( $theme_options['knowledgebase-cat-quick-stats-under-title'] == false ) {
							$return .= '<i class="fa fa-eye"></i>&nbsp;<span>'; 
								   
										if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
											$return .= get_post_meta( $post->ID, 'manual_post_visitors', true ). '&nbsp;views ';
										} else { $return .= '0 views'; }
									   
									   $return .= '</span><i class="far fa-calendar-alt"></i> <span>'.get_the_time( get_option('date_format') ).'</span>';
									   $return .= '</span>';
				   }
					$return .= '</p>
					   </div>';
				 endwhile;
				 
			// pagination here 
			if( $hide_pagination == 1 ) {
			$return .= '<div class="vc_sc_kb_single_cat">
							<ul class="pagination">
								<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( '&lt;' ).'</li>
								<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( '&gt;', $the_query->max_num_pages ).'</li>
							</ul>
						</div>';
			}
						
			$return .= '</div>';	
			
			}
		wp_reset_postdata(); 
	  }
	}
		
		
		return $return;
	}
add_shortcode('manual_theme_single_cat_knowledgebase', 'manual_theme_single_cat_knowledgebase');	
}

/***********************************************
***  ADD VC SC 13 :: KB GROUP CAT - REMOVED  ***
************************************************/


/*************************************
***  ADD VC SC 14 :: FAQ CATEGORY  ***
**************************************/
if(!function_exists("manual_theme_faq_category")){
	function manual_theme_faq_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"faq_category_title"  => "",
			"faq_category_show_post_count"  => "",
			"count_text_color"  => "",
			"count_bg_color"  => "",
		), $atts ) );
		
		$categories = get_categories('taxonomy=manualfaqcategory&post_type=manual_faq');
		$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $faq_category_title . '</span></h5>';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );
			$return .= '<ul>';
			$return .= '<li class="cat-item"><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
			if( $faq_category_show_post_count == 'true' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
			$return .= '</li></ul>';
		}
		wp_reset_postdata();
		$return .= '</div></div>';
		return $return;
	}
add_shortcode('manual_theme_faq_category', 'manual_theme_faq_category');	
}

/****************************************************
***  ADD VC SC 15 :: FAQ SINGLE CATEGORY ARTICLE  ***
*****************************************************/
if(!function_exists("manual_theme_single_faq_article")){
	function manual_theme_single_faq_article( $atts, $content = null ) {
		global $post, $theme_options;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"custom_title"   => "",
			"title_font_size"   => "19px",
			"text_font_weight"   => "600",
			"text_transform"   => "none",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"faqsinglecatid"   => "",
			"hidepagination"   => "1",
			"displaystyle"   => "1",
			"faq_column"    => "4",
			"faq_title_tag"    => "h4",
			"bg_color" => "#fafafa",
			"tag_color" => "", 
		), $atts ) );
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		if( $custom_title == 'yes' ) {
			$custom_title_style = 'style="font-weight:'.$text_font_weight.';text-transform:'.$text_transform.';font-size:'.$title_font_size.';"';
		} else {
			$custom_title_style = '';
		}
		
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$args = array( 
			'posts_per_page' => $page_per_post, 
			'paged' => $paged,
			'post_type'  => 'manual_faq',
			'orderby' => $post_orderby,
			'order'  => $post_order,
			'tax_query' => array(
				array(
					'taxonomy' => 'manualfaqcategory',
					'field' => 'id',
					'include_children' => $include_child_post,
					'terms' => $faqsinglecatid
				)
			)
		 );
		
		$return = '';
		$the_query = new WP_Query( $args );
		
		$current_term = get_terms('manualfaqcategory',array("term_taxonomy_id"=>$faqsinglecatid));
		if( !empty( $current_term ) ){
		$check_if_login_call = get_option( 'doc_cat_check_login_'.$current_term[0]->term_id );
		$check_user_role = get_option( 'doc_cat_user_role_'.$current_term[0]->term_id );
		$custom_login_message = get_option( 'doc_cat_login_message_'.$current_term[0]->term_id );
		
		if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			$return .= manual__get_login_forum($custom_login_message);
		} else {
			
			if( !empty($check_user_role) ) { $access_status = manual_doc_access(($check_user_role));
			} else {  $access_status = true; }
				
			if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) {
					$return .= '<div class="manual_login_page"> <div class="custom_login_form"><p>';
					$return .= $theme_options['faq-cat-page-access-control-message'];
					$return .= '</p></div></div>';
			} else {
				if ( $the_query->have_posts() ) {
					$return .= '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
					
					if( $displaystyle == 1 ) {
						while ( $the_query->have_posts() ) : $the_query->the_post();
							$content = get_the_content();
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							$return .= '<div class="body-content">
										  <div class="collapsible-panels theme-faq-cat-pg" id="'. $post->ID .'">
										  <h5 class="title-faq-cat" '.$custom_title_style.'><a href="#">'. $post->post_title .'</a></h5>
										  <div class="entry-content clearfix">
											'. $content .' ';
						   $chk_link = get_edit_post_link( $post->ID );
						   if( $chk_link != '' ) {					
							   $return .= '<p class="post-edit-link" style="text-align:right"><i class="fa fa-edit"></i> <a href="'. $chk_link .'">'.esc_html__( 'Edit', 'manual' ).'</a></p>';
						   }
						  if( $theme_options['faq-display-social-share'] == true ) $return .= manual_get_social_share(get_permalink());
											
							$return .= '</div>
										</div></div>';
						endwhile;
						
					} else {
						
						if( $tag_color != '' ) $return .= '<style> .vc-manualfaq-blocks a { color:'.$tag_color.'!important; } </style>';
						
						if( $faq_column == 4 ) $colmd = 3;
						else if( $faq_column == 3 )  $colmd = 4;
						else if( $faq_column == 2 )  $colmd = 6;
						else $colmd = 3; 
						
						$i = 1;
						$return .= '<div class="row row-eq-height" style="margin: 0px;">';
						while ( $the_query->have_posts() ) : $the_query->the_post();
							$content = get_the_content();
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							$chk_link = get_post_permalink( $post->ID );
							$return .= '<div class="col-md-'.$colmd.' col-sm-12 vc-manualfaq-blocks hvr-bob" style="background:'.$bg_color.';">';
						    $return .= '<'.$faq_title_tag.' class="title-faq-cat" '.$custom_title_style.'><a href="'.$chk_link.'">'. $post->post_title .'</a></'.$faq_title_tag.'>';
							$return .= '</div>';
							
							if( $faq_column == 4 ) { 
								if($i % 4 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
							} else if( $faq_column == 3 ) {
								if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
							} else if( $faq_column == 2 ) {
								if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
							}
							
						$i++;	
						endwhile;	
						
					}
				}
				
				// pagination here 
				if( $hidepagination == 1 && $page_per_post != '-1') {
					$return .= '<div class="vc_sc_kb_single_cat">
									<ul class="pagination">
										<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( 'Next Page', $the_query->max_num_pages ).'</li>
										<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( 'Previous Page' ).'</li>
									</ul>
								</div>';
				}
				
				$return .= '</div>';
				wp_reset_postdata(); 
		} // eof else
		}
		}
		return $return;
	}
add_shortcode('manual_theme_single_faq_article', 'manual_theme_single_faq_article');	
}

/**************************************
***  ADD VC SC 16 :: BBPRESS LOGIN  ***
***************************************/
if (!function_exists('theme_maual_bbpress_login')) {
	function theme_maual_bbpress_login($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"bbpress_login"  => "Login",
			"text_color"  => "",
			"button_bg_color"  => "",
			"button_text_color"  => "",
			"register_link_url"  => "",
			"lost_password_link_url"  => "",
		), $atts ) );
		
		$register_link = (function_exists("vc_build_link") ? vc_build_link($register_link_url) : $register_link_url);
		$lost_password_link = (function_exists("vc_build_link") ? vc_build_link($lost_password_link_url) : $lost_password_link_url);
		
		$return =  '<div class="vc-bbpress-login"><form method="post" action="'. bbp_get_wp_login_action( array( 'context' => 'login_post' ) ).'" class="bbp-login-form">
	<fieldset class="bbp-form">

		<div class="bbp-username">
			<label for="user_login" style="color:'.$text_color.'">'. esc_html__( 'Username', 'manual' ).': </label>
			<input type="text" name="log" value="'. bbp_sanitize_val( 'user_login', 'text' ).'" size="20" id="user_login" />
		</div>

		<div class="bbp-password">
			<label for="user_pass" style="color:'.$text_color.'">'. esc_html__( 'Password', 'manual' ).': </label>
			<input type="password" name="pwd" value="'. bbp_sanitize_val( 'user_pass', 'password' ).'" size="20" id="user_pass" />
		</div>

		<div class="bbp-remember-me">
			<input type="checkbox" name="rememberme" value="forever" '. checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ) .' id="rememberme" />
			<label for="rememberme"  style="color:'.$text_color.'">'. esc_html__( 'Keep me signed in', 'manual' ) .'</label>
		</div>

		'. do_action( 'login_form' ) .'

		<div class="bbp-submit-wrapper">
			<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'. $bbpress_login .'</button>
			'. bbp_user_login_fields() .'
		</div>';
		
		
		if( !empty($register_link['title']) ) {
			$return .= '<div><a href="'.$register_link['url'].'" target="'.$register_link['target'].'" class="more-link hvr-icon-wobble-horizontal">'.$register_link['title'].'</a></div>';
		}
		
		if( !empty($lost_password_link['title']) ) {
			$return .= '<div><a href="'.$lost_password_link['url'].'" target="'.$lost_password_link['target'].'" class="more-link hvr-icon-wobble-horizontal">'.$lost_password_link['title'].'</a></div>';
		}
		
	$return .= '</fieldset>
</form></div>';
		
		return $return;
	}
add_shortcode('theme_maual_bbpress_login', 'theme_maual_bbpress_login');	
}

/*****************************************
***  ADD VC SC 17 :: BBPRESS REGISTER  ***
******************************************/
if (!function_exists('theme_maual_bbpress_register')) {
	function theme_maual_bbpress_register($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"bbpress_register_msg"  => "Your username must be unique, and cannot be changed later. We use your email address to email you a secure password and verify your account.",
			"text_color"  => "",
			"button_bg_color"  => "",
			"button_text_color"  => "",
		), $atts ) );
		
		$return = '<form method="post" action=" '. bbp_get_wp_login_action( array( 'context' => 'login_post' ) ) .'" class="bbp-login-form">
	<fieldset class="bbp-form">
		<legend>'.esc_html__( 'Create an Account', 'manual' ).'</legend>

		<div class="bbp-register-notice">
			<p style="color:'.$text_color.'">'.$bbpress_register_msg.'</p>
		</div>

		<div class="bbp-username">
			<label for="user_login">'.esc_html__( 'Username', 'manual' ).':</label>
			<input type="text" name="user_login" value="'. bbp_sanitize_val( 'user_login' ).'" size="20" id="user_login" />
		</div>

		<div class="bbp-email">
			<label for="user_email">'.esc_html__( 'Email', 'manual' ).': </label>
			<input type="text" name="user_email" value="'. bbp_sanitize_val( 'user_email' ).'" size="20" id="user_email" />
		</div>

		'. do_action( 'register_form' ) .'

		<div class="bbp-submit-wrapper">
			<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'.esc_html__( 'Register', 'manual' ).'</button>
			'. bbp_user_register_fields() .'

		</div>
	</fieldset>
</form>
';
		
		return $return;
	}
add_shortcode('theme_maual_bbpress_register', 'theme_maual_bbpress_register');	
}

/**********************************************
***  ADD VC SC 18 :: BBPRESS LOST PASSWORD  ***
***********************************************/
if (!function_exists('theme_maual_bbpress_lost_password')) {
	function theme_maual_bbpress_lost_password($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"button_bg_color"  => "",
			"button_text_color"  => "",
		), $atts ) );
		
		$return = '<form method="post" action="'. bbp_get_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ) .'" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend>'.esc_html__( 'Lost Password', 'manual' ).'</legend>
			<div class="bbp-username">
				<p>
					<label for="user_login">'.esc_html__( 'Username or Email', 'manual' ).': </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" />
				</p>
			</div>
			'. do_action( 'login_form', 'resetpass' ) .'
			<div class="bbp-submit-wrapper">
				<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'.esc_html__( 'Reset My Password', 'manual' ).'</button>
				'. bbp_user_lost_pass_fields() .'
			</div>
		</fieldset>
	</form>';
		
		return $return;
	}
add_shortcode('theme_maual_bbpress_lost_password', 'theme_maual_bbpress_lost_password');	
}

/**********************************************
***  ADD VC SC 19 :: PORTFOLIO ITEM WRAP  *****
***********************************************/
if(!function_exists("manual_portfolio_item_frame")){
	function manual_portfolio_item_frame( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			"title"      => "",
			"link"       => "#",
			"portfoio_image"  => "",
			"image_border_shadow"  => "",
			"box_css_animation"  => "",
			"position"  => "",
			"margin"  => "",
		), $atts ) );
		
		if (is_numeric($portfoio_image) && isset($portfoio_image)) {
			$image_src = wp_get_attachment_url($portfoio_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
		}
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( isset($link['target']) && $link['target'] != ''  ) { 
			$add_parm = 'target="_blank"';
		} else { 
			$add_parm = '';
		}
		
		if( $image_border_shadow == true ) $shadow = "shadow";
		else $shadow = '';
		
		$return = '<div class="portfolio-item-wrap" style="text-align:'.$position.';margin:'.$margin.';"><div class="portfolio-item '.$shadow.' '.$box_css_animation.'">
					<a href="'.$link['url'].'" '.$add_parm.'> <div class="image-wrap"><img src="'.$image_src.'"></div> </a>';
		$return .= '</div></div>';
		
		return $return;
		
	}
add_shortcode('manual_portfolio_item_frame', 'manual_portfolio_item_frame');
}

/********************************
***  ADD VC SC 20 :: BUTTON *****
*********************************/
if(!function_exists("manual_sc_button_url")){
	function manual_sc_button_url( $atts, $content = null ) {
		$text_readjust_padding = $text_readjust_size = $border_bottom = $text_shadow = '';
		extract( shortcode_atts( array( 
			"link"        => "",
			"bottom_margin"  => "",
			"button_css_animation"  => "",
			"link_align"  => "",
			"link_color"  => "",
			"button_color"  => "",
			"text_size"  => "",
			"text_padding"  => "",
			"remove_border_buttom" => "",
			"border_radius" => "",
			"remove_text_shadow" => "",
			"button_hover_color" => "",
		), $atts ) );
		
		if( !empty($text_size) ) $text_readjust_size = 'font-size:'.$text_size.';';
		if( !empty($text_padding) ) $text_readjust_padding = 'padding:'.$text_padding.';';
		
		if( $remove_border_buttom == true ) $border_bottom = "border-bottom:0px;";
		if( $remove_text_shadow == true ) $text_shadow = "text-shadow:none;";
		if( !empty($border_radius) )  $border_radius = 'border-radius:'.$border_radius.';';
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( !empty($link['title']) ) {
			if( empty($link['target']) ) $btm_target = '_parent';
			else $btm_target = $link['target'];
			$return = '<style>a.vc-custom-btm-hover-'.$time_start[1].'{background-color:'.$button_color.'!important;}a.vc-custom-btm-hover-'.$time_start[1].':hover{color:'.($link_color?$link_color:'#fff').'!important;background-color:'.$button_hover_color.'!important;}</style><div style="text-align:'.$link_align.'; margin:'.$bottom_margin.';" class="'.$button_css_animation.'"><a href="'.$link['url'].'" target="'.$btm_target.'" style="text-transform:none;height:auto!important; color:'.$link_color.'!important; '.$text_shadow.' '.$border_radius.' '.$text_readjust_size.' '.$text_readjust_padding.' '.$border_bottom.'" class="custom-botton vc-custom-btm-hover-'.$time_start[1].'" >'.$link['title'].'</a></div>';
		} else {
			$return = '';
		}
		
		return $return;
	}
add_shortcode('manual_sc_button_url', 'manual_sc_button_url');
}

/**************************************************
***  ADD VC SC 21 :: KNOWLEDGE BASE TREE MENU *****
***************************************************/
if(!function_exists("manual__knowledgebase_tree_menu")){
	function manual__knowledgebase_tree_menu( $atts, $content = null ) {
		global $post, $theme_options;
		
		extract( shortcode_atts( array( 
			"title_tag"   => "h6",
			"root_tag_li_padding" => "3px 10px 3px 10px",
			"root_tag_color" => "#f7f7f7",
			"root_tag_border_bottom_color" => "#f7f7f7",
			"kb_no_of_category_records" => "",
			"knowledgebase_category_display_order" => "",
			"knowledgebase_category_display_orderby" => "",
			"kb_private_category" => "Private Records",
			"knowledgebase_records_display_order" => "",
			"knowledgebase_records_display_orderby" => "",
			"border_radius" => "5px",
		), $atts ) );
		
		
		if( isset($root_tag_li_padding) && $root_tag_li_padding != '' ) $root_tag_li_padding = 'padding:'.$root_tag_li_padding.';';
		else $root_tag_li_padding = '';
		
		if( isset($root_tag_color) && $root_tag_color != '' ) $root_tag_color = 'background:'.$root_tag_color.';';
		else $root_tag_color = '';
		
		if( isset($border_radius) && $border_radius != '' ) $border_radius = 'border-radius:'.$border_radius.';';
		else $border_radius = '';
		
		$return = '';
		$return .= '<div class="kb_tree_viewmenu">';
		//list terms in a given taxonomy
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'parent'        => 0,
			'order'         => $knowledgebase_category_display_order,
			'orderby'       => $knowledgebase_category_display_orderby,
			'number'        => $kb_no_of_category_records,
		); 
		$tax_terms = get_terms('manualknowledgebasecat', $args);
		$i = 1;
		/***********************
		***  START MAIN ROOT CATEGORY  ***
		***********************/
		$return .= '<ul class="kb_tree_view_wrap">';
		foreach ($tax_terms as $tax_term) {
			
		// get extra meta value
		$root_cat_login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
		$root_cat_check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
		// eof exta meta value	
			
		if( $i == 1 ) { 
			$call_css = 'open-ul-first';
		} else {  
			$call_css = '';	
		}
		$return .= '<li class="root_cat" style="'.$root_tag_li_padding.' '.$root_tag_color.' '.$border_radius.' border-bottom: 1px solid '.$root_tag_border_bottom_color.'; ">';
			// Root Category
			$return .= '<'.$title_tag.'><a rel="'.$tax_term->term_id.'" class="kb-tree-recdisplay '.$call_css.'">';
			$cat_title = $tax_term->name; 
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			
			/***********************
			***  CHECK CHILD CATEGORY  ***
			***********************/
			$kb_subcat_args = array(
			  'orderby' => 'name',
			  //'order'   => $cat_display_order,
			  'child_of' => $tax_term->term_id,
			  'parent' => $tax_term->term_id
			);
			$kb_sub_categories = get_terms('manualknowledgebasecat', $kb_subcat_args);
			if ($kb_sub_categories) {
				$return .= '<ul class="kb-tree-chidcat-'.$tax_term->term_id.' kb_tree_chid_cat_wrap close_record">'; // hide
				foreach($kb_sub_categories as $kb_sub_category_list) {
					
					// get extra meta value
					$root_subcat_login_check = get_option( 'kb_cat_check_login_'.$kb_sub_category_list->term_id );
					$root_subcat_check_user_role = get_option( 'kb_cat_user_role_'.$kb_sub_category_list->term_id );
					// eof exta meta value	
					
					$return .= '<li class="root_cat_child">';
					$subcat_title = $kb_sub_category_list->name; 
					$return .= '<'.$title_tag.'><a rel="'.$kb_sub_category_list->term_id.'" class="kb-tree-recdisplay">';
					$return .= html_entity_decode($subcat_title, ENT_QUOTES, "UTF-8");
					$return .= '</a></'.$title_tag.'>';
						/***********************
						***  DISPLAY RECORDS  ***
						***********************/
						$kb_childargs_list = array( 
							'post_type'  => 'manual_kb',
							'orderby' => $knowledgebase_records_display_order,
							'order'  => $knowledgebase_records_display_orderby,
							'tax_query' => array(
								array(
									'taxonomy' => 'manualknowledgebasecat',
									'field' => 'id',
									'include_children' => false,
									'terms' => $kb_sub_category_list->term_id
								)
							)
						);
						$kb_childposts = get_posts( $kb_childargs_list );
						$return .= '<ul class="kb-tree-records-'.$kb_sub_category_list->term_id.' tree_child_records close_record">';
						
						// check login 
						if( isset($root_subcat_login_check) && $root_subcat_login_check == true && !is_user_logged_in() ) {
							$return .='<li class="kb_tree_title" style="color:red;">'.$kb_private_category.'</li>';
						} else {
						/**************************************
						** Check USER ROLE AFTER USER LOGIN**
						***************************************/
						$access_status_subcat = manual_doc_access($root_subcat_check_user_role);
						if( $root_subcat_login_check == 1 && is_user_logged_in() && $access_status_subcat == false ) { 
							$return .= '<li class="kb_tree_title" style="color:red;">';
							$return .= esc_html('No sufficent user permission');
							$return .= '</li>';
						} else {
							foreach( $kb_childposts as $kbchildpost ) {
								$return .='<li class="kb_tree_title">';
								$return .='<a href="'.get_permalink($kbchildpost->ID).'" class="kb_tree_title">';
								$return .= html_entity_decode($kbchildpost->post_title, ENT_QUOTES, "UTF-8");
								$return .='</a>';
								$return .='</li>';
							}
						}
						}
						$return .= '</ul>';
						/***********************
						***  EOF DISPLAY RECORDS  ***
						***********************/
					$return .= '</li>';
				}
				$return .= '</ul>';
			}
			/***********************
			***  EOF CHILD CATEGORY  ***
			***********************/
			
			/***********************
			***  DISPLAY ROOT RECORDS  ***
			***********************/
				$kbroot_args = array(
					'post_type' => 'manual_kb',
					'orderby' => $knowledgebase_records_display_order,
					'order'  => $knowledgebase_records_display_orderby,
					'posts_per_page' => '-1',
					'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'id',
								'include_children' => false,
								'terms' => $tax_term->term_id
								)
							),
				);
				$kb_rootposts = get_posts( $kbroot_args );
				$return .= '<ul class="kb-tree-records-'.$tax_term->term_id.' kbroot_cat_records close_record">';
					// check login 
					if( isset($root_cat_login_check) && $root_cat_login_check == true && !is_user_logged_in() ) {
						$return .='<li class="kb_tree_title" style="color:red;">'.$kb_private_category.'</li>';
					} else {
						/**************************************
						** Check USER ROLE AFTER USER LOGIN**
						***************************************/
						$access_status = manual_doc_access($root_cat_check_user_role);
						if( $root_cat_login_check == 1 && is_user_logged_in() && $access_status == false ) { 
							$return .= '<li class="kb_tree_title" style="color:red;">';
							$return .= esc_html('No sufficent user permission');
							$return .= '</li>';
						} else {
							foreach( $kb_rootposts as $kbpost_list ) {
								$return .='<li class="kb_tree_title">';
								$return .='<a href="'.get_permalink($kbpost_list->ID).'" >';
								$return .= html_entity_decode($kbpost_list->post_title, ENT_QUOTES, "UTF-8");
								$return .='</a>';
								$return .='</li>';
							}
						}
					}
				$return .= '</ul>';
			/***********************
			*** EOF DISPLAY ROOT RECORDS  ***
			***********************/
			
		$return .= '</li>';
		$i++;
		}
		$return .= '</ul>';
		/***********************
		***  EOF MAIN ROOT CATEGORY  ***
		***********************/
		wp_reset_postdata();
		$return .= '</div>';
		return $return;
	}
add_shortcode('manual__knowledgebase_tree_menu', 'manual__knowledgebase_tree_menu');
}


/**************************************************
***  ADD VC SC 22 :: KNOWLEDGE BASE CAT LANDING  *****
***************************************************/
if(!function_exists("manual__theme_kb_catlanding_style")){
	function manual__theme_kb_catlanding_style( $atts, $content = null ) {
		global $theme_options;	

		extract( shortcode_atts( array( 
			"knowledgebase_style_type" => "1",
			"knowledgebase_style_type_display_order" => "ASC",
			"knowledgebase_style_type_display_orderby" => "date",
			"title_tag" => "h5",
			"total_article_count" => "no",
			"border_color" => "",
			"article_count_box_title" => 'articles in this collection',
			"icon_color" => '#818A97',
			"kb_private_categpry" => 'Private Category',
			"kb_private_category_text_color" => '#F13C2A',
			"exclude_kb_category" => '',
			"kb_no_ofrecords" => "0",
			"disable_description" => "no",
			"icon_size" => "",
			"default_icon_code" => "icon_documents_alt",
			"limit_description_char" => "",
			"background_color" => '#ffffff',
			"border_radius" => '4px',
			"total_article_count_style" => '1',
			"total_article_count_style1_text" => 'Written by',
		), $atts ) );
		
		$return = '';
		
		// args
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $knowledgebase_style_type_display_order,
			'orderby'       => $knowledgebase_style_type_display_orderby,
			'exclude'       => $exclude_kb_category,
			'number'        => $kb_no_ofrecords,
		); 
		
		$tax_terms = get_terms('manualknowledgebasecat', $args);
		$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));

		if( $knowledgebase_style_type == 1 ) {
			
			if( isset($border_color) && $border_color != '' ) $border_color = $border_color;
			else $border_color = '#d4dadf';
			
			if( isset($icon_size) && $icon_size != '' ) $icon_size = $icon_size;
			else $icon_size = '55px';
			
			
			$i = 1;
	        foreach ($tax_terms as $tax_term) {
			// get extra meta value
			$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
			if( isset($icon_name) && $icon_name != '' ) { $icon_name = $icon_name;
			} else { $icon_name = $default_icon_code; }
			$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
			// eof exta meta value
			$return .= '<div class="kb_style1_box"> <div class="wrap_kbstyle" style="border: 1px solid '.$border_color.';background:'.$background_color.';border-radius:'.$border_radius.';">';
			if( isset($login_check) && $login_check == true ) { 
				if ( !is_user_logged_in() ) {
					$return .= '<div class="private-kb-cat"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.';"></i>&nbsp; '.$kb_private_categpry.'</div>';
				}
			}
			$return .= '<div class="wrap_stylekb">
								<!--icon or image-->
								<div class="icon_image_kbstyle">';
			if( isset($icon_name) && $icon_name != '' ) $return .= '<i class="'.$icon_name.'" style="color:'.$icon_color.';font-size:'.$icon_size.';"></i>';
			$return .= '</div>
								<!--Content-->';
			$return .= '<div class="kbcontent">';
			$return .= '<'.$title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'">';
			$cat_title = $tax_term->name;
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			if( $disable_description == 'no' ) { 
				if( isset($limit_description_char) && $limit_description_char != '' ) {
					$return .= '<p>'.  mb_strimwidth(esc_attr($tax_term->description), 0, $limit_description_char, "...").'</p>';
				} else {
					$return .= '<p>'.esc_attr($tax_term->description).'</p>';
				}
			}
			
			if( $total_article_count == 'no' && $total_article_count_style == 2 ) {
			$return .= '<div style="padding:5px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link hvr-icon-wobble-horizontal">
               '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).' </a></div>';
			}
			
			// User Avator
			if( $total_article_count == 'no' && $total_article_count_style == 1 ) {
				$authors = manual__get_authors_in_category($tax_term->term_id);
				$return .= '<div class="vckbpostauthors">
							<ul>';
				foreach ( $authors as $key=>$val ) {
				  $return .= '<li><img src=" '.$val.' " ></li>';
				}
				$return .= '</ul>
							<div class="item-info"><a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link"> '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).'</a> <br> <span class="vc_wrriten_by_text" style="color:#8d8d8d;">'.$total_article_count_style1_text.'</span>&nbsp;';
				
				$author_count = count($authors);
				foreach ( $authors as $key=>$val ) {
				 if( $author_count  > 1 ) $comma = ',';
				 else $comma = '';
				 $return .= $key.''.$comma.'&nbsp;';
				}			
							
				$return .= '</div>
						</div>';  
			}
			// Eof User Avator
			
			$return .= '</div>
							</div>
						</div></div>';
						
			}
		} else if( $knowledgebase_style_type == 2 ) {
			
			if( isset($border_color) && $border_color != '' ) $border_color = $border_color;
			else $border_color = '#ededed';
			
			if( isset($icon_size) && $icon_size != '' ) $icon_size = $icon_size;
			else $icon_size = '45px';
			
			// FIX ROW
			$return .= '<div class="row-eq-height">';
			// EOF FIX ROW
			
			$j = 0;
	        foreach ($tax_terms as $tax_term) {
				
			// get extra meta value
			$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
			if( isset($icon_name) && $icon_name != '' ) { $icon_name = $icon_name;
			} else { $icon_name = $default_icon_code; }
			$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
			// eof exta meta value
			
			$return .= '<div class="KbCategory__box_layout2" style="border: 1px solid '.$border_color.';background:'.$background_color.';border-radius:'.$border_radius.';"><div class="KbCategory__box_layout2__boxInner">';
			$return .= '<div class="flex">';
			$return .= '<div class="mediaFigure">';
			if( isset($icon_name) && $icon_name != '' ) $return .= '<i class="'.$icon_name.'" style="color:'.$icon_color.';font-size:'.$icon_size.';"></i>';
			$return .= '</div>';
			
			$return .= '<div class="mediaContent">';
			if( isset($login_check) && $login_check == true ) { 
				if ( !is_user_logged_in() ) {
					$return .= '<div class="private-kb-cat"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.';"></i>&nbsp; '.$kb_private_categpry.'</div>';
				}
			}
			$return .= '<'.$title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'">';
			$cat_title = $tax_term->name;
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			
			if( $disable_description == 'no' ) { 
				if( isset($limit_description_char) && $limit_description_char != '' ) {
					$return .= '<p>'.  mb_strimwidth(esc_attr($tax_term->description), 0, $limit_description_char, "...").'</p>';
				} else {
					$return .= '<p>'.esc_attr($tax_term->description).'</p>';
				}
			}
			
			if( $total_article_count == 'no' && $total_article_count_style == 2 ) {
			$return .= '<div style="padding:5px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link hvr-icon-wobble-horizontal">
               '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).' </a></div>';
			}
			
			// User Avator
			if( $total_article_count == 'no' && $total_article_count_style == 1 ) {
				$authors = manual__get_authors_in_category($tax_term->term_id);
				$return .= '<div class="vckbpostauthors">
							<ul>';
				foreach ( $authors as $key=>$val ) {
				  $return .= '<li><img src=" '.$val.' " ></li>';
				}
				$return .= '</ul>
							<div class="item-info"><a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link"> '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).'</a> <br> <span class="vc_wrriten_by_text" style="color:#8d8d8d;">'.$total_article_count_style1_text.'</span>&nbsp;';
				
				$author_count = count($authors);
				foreach ( $authors as $key=>$val ) {
				 if( $author_count  > 1 ) $comma = ',';
				 else $comma = '';
				 $return .= $key.''.$comma.'&nbsp;';
				}			
							
				$return .= '</div>
						</div>';  
			}
			// Eof User Avator
			
			
			
			$return .= '</div>';
			$return .= '</div> </div> </div>';
						
			// FIX ROW	
			if($j % 2 == 1) $return .= ' </div><div class="row-eq-height">';  // control every 3 loop
			// EOF FIX ROW
						
			$j++;			
			}
			
			$return .= '</div>';
			
		} // eof else
	
		return $return;
	}
add_shortcode('manual__theme_kb_catlanding_style', 'manual__theme_kb_catlanding_style');
}
?>