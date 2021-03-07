<?php 

/*--------------------------------------------------------------*/
/*	Header below menu bar and above content box control
    * Use below function to control header design
	* Below function include header layout and CSS control
/*--------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: MENU NAVIGATION STYLE CONTROL 
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_menu_navigation_control')) {
	function manual_menu_navigation_control() {
		global $theme_options;
		// check navigation type [manual options]	
		if( $theme_options['theme-nav-type'] == 1 ) $theme_nav_type = 1;
		else $theme_nav_type = 2;
			
		if($theme_nav_type == 2) { 
			echo '.navbar { position: absolute; width: 100%; background: transparent!important; } .jumbotron_new.jumbotron-inner-fix{position: inherit;} .jumbotron_new .inner-margin-top { padding-top: 92px; }';
		} else {
			echo '';
		}	
		
	}
}

/*--------------------------------------------------------------*/
/*	MANUAL :: PAGE TEMPLATE "TEMPLATE-HOME.PHP" 
              HEADER CONTROL
/*--------------------------------------------------------------*/
if (!function_exists('manual_header_display_control_check')) {
	function manual_header_display_control_check() {
		global $theme_options;
		$check_home_current_page = basename( get_page_template() );
		manual_header_display_control_break();
	}
}

/*---------------------------------------------*/
/*	MANUAL :: HEADER DISPLAY CONTROL
			  BASED ON "MANUAL THEME OPTIONS"
/*---------------------------------------------*/
if (!function_exists('manual_header_display_control_break')) {
	function manual_header_display_control_break() {
		global $theme_options,$post;
		
		$current_post_type = get_post_type();
		
		if( is_404() ) {
			if( $theme_options['onoff-404-page-hrader'] == true ){	
				if( $theme_options['home-404-search-bar-status'] == true ) $searchbar = false;
				else  $searchbar = true;
				manual_header_design_control( '', '', false, $searchbar, '', false, '', false, false);
			}
		} else if( is_search() ) {
			if( $theme_options['search-page-header-search-bar-status'] == true ) $searchbar = true;
			else  $searchbar = false;
			
			if( $theme_options['search-page-header-title'] != '' ) $pagetitle = $theme_options['search-page-header-title'];
			else $pagetitle = '';
			
			if( $theme_options['search-page-header-sub-title'] != '' ) $subtitle = $theme_options['search-page-header-sub-title'];
			else $subtitle = '';
			
			manual_header_design_control( '', '', false, $searchbar, $pagetitle, false, $subtitle, false, false);
		} else if( $current_post_type == 'manual_portfolio' ) {  
			manual_header_display_control_break_page($post->ID);
		} else if($current_post_type == 'manual_faq') {
			if( $theme_options['faq-cat-header-search-status'] == false )  $searchbar = true;
			else  $searchbar = false;
			if( $theme_options['faq-cat-header-breadcrumb-status'] == false )  $breadcrumb = true;
			else  $breadcrumb = false;
			manual_header_design_control($current_post_type, '', false, $searchbar, '', true, '', false, $breadcrumb);
		} else if($current_post_type == 'manual_kb') {
			if( is_single() ) {
				if( $theme_options['kb-single-pg-header-search-status'] == false )  $searchbar = true;
				else  $searchbar = false;
				if( $theme_options['kb-single-pg-header-breadcrumb-status'] == false )  $breadcrumb = true;
				else  $breadcrumb = false;
				if( $theme_options['kb-single-pg-title-text-status'] == true )  $title_text = true;
				else  $title_text = false;
				manual_header_design_control($current_post_type, '', false, $searchbar, '', true, '', false, $breadcrumb, $title_text);
			} else {
				if( $theme_options['kb-cat-header-search-status'] == false ) { $searchbar = true;
				} else { $searchbar = false; }
				if( $theme_options['kb-cat-header-breadcrumb-status'] == false ) { $breadcrumb = true;
				} else { $breadcrumb = false; }
				manual_header_design_control($current_post_type, '', false, $searchbar, '', true, '', false, $breadcrumb);
			}
	   } else if($current_post_type == 'manual_documentation') {
			if( is_single() ) {
				if( $theme_options['documentation-disable-search-category-page'] == false ) { $searchbar = true;
				} else { $searchbar = false; }
				if( $theme_options['documentation-disable-breadcrumb-category-page'] == false ) { $breadcrumb = true;
				} else { $breadcrumb = false; }
				manual_header_design_control($current_post_type, '', false, $searchbar, '', true, '', false, $breadcrumb);
			} else {
				if( $theme_options['documentation-disable-search-category-page'] == false ) { $searchbar = true;
				} else { $searchbar = false; }
				if( $theme_options['documentation-disable-breadcrumb-category-page'] == false ) { $breadcrumb = true;
				} else { $breadcrumb = false; }
				manual_header_design_control($current_post_type, '', false, $searchbar, '', true, '', false, $breadcrumb);
			}
	  } else if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){ // woo
			if(is_shop()){
				$page_id = get_option('woocommerce_shop_page_id');
			} elseif(is_checkout()) {
				$page_id = get_option('woocommerce_pay_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_myaccount_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_edit_address_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_view_order_page_id'); 
			}
			$woopage  = get_post( $page_id );
			manual_header_display_control_break_page($woopage->ID);
			
		} else if(function_exists("is_woocommerce") && is_product() ){
				manual_header_design_control('', '', false, false, '', true, '', false, true, true);
		} else if(function_exists("is_woocommerce") && (is_product_category() || is_product_tag() ) ){
				manual_header_design_control('', '', false, true, '', true, '', false, true, false);
		} else if ( class_exists('bbPress') && is_bbPress() ) {  // bbpress
			$bbpress_plx_img = $bbpress_plx_effect = '';
			if( isset($theme_options['bbpress-header-image']['url']) && $theme_options['bbpress-header-image']['url'] != '' && $theme_options['bbpress_plx_bg_image'] == true ) {
				$bbpress_plx_img = $theme_options['bbpress-header-image']['url'];
				$bbpress_plx_effect = true;
			}
			manual_header_design_control('',$bbpress_plx_img,$bbpress_plx_effect);
		} else if( is_home() && $current_post_type == 'post' ) { // post home page
			$postID = get_option('page_for_posts');
			if( $postID != '' && $postID != 0 ) {
				manual_header_display_control_break_page($postID);
			}
		} else if( $current_post_type == 'page' ) {   // page
			manual_header_display_control_break_page($post->ID);
		} else if( $current_post_type == 'post' && $theme_options['blog_single_page_global_header_settings'] == true && !is_single() ) { // post !single page
			$postID = get_option('page_for_posts');
			manual_header_display_control_break_page($postID);
		} else if( $current_post_type == 'post' && is_single() ) { // post single page
			if( $theme_options['blog_single_post_display_search'] == true ) { $searchbar = true;
			} else { $searchbar = false; }
			manual_header_design_control($current_post_type, '', '', $searchbar);
		} else {
			$url = '';
			$parallax_effect = $searchbox = false;
			if( $theme_options['default-header-sytle-backgorund-image'] == true && isset($theme_options['manual-header-custom-image']['url']) && $theme_options['manual-header-custom-image']['url'] != '' && $theme_options['header-uploadimage-parallax-effect'] == 1 ) { 
				$parallax_effect = true;
				$url = $theme_options['manual-header-custom-image']['url'];
			}
			if( isset($theme_options['target-search-bar-display-on-the-header']) && $theme_options['target-search-bar-display-on-the-header'] != '') {
				foreach ( $theme_options['target-search-bar-display-on-the-header']  as $post_type ) {
						$activate_post_type[] = $post_type;
				}
				if( !empty( $activate_post_type ) && in_array($current_post_type, $activate_post_type) ) {
					if( $theme_options['activate-search-bar-on-the-header'] == true ) $searchbox = true;
				}
			}
			manual_header_design_control('', $url, $parallax_effect, $searchbox);	
		}
	}
}




/*---------------------------------*/
/*	MANUAL :: HEADER DESIGN LAYOUT
/*---------------------------------*/
if (!function_exists('manual_header_design_control')) {
	function manual_header_design_control($current_post_type = '', $url = '', $parallax_effect = false, $searchbox = false, $replace_title='', $replace_title_act = true, $subtitle = '', $subtitle_act = false, $breadcrumb = true, $hidetitle = false) {
		global $theme_options, $product, $post;
		$plx_data_src = $plx_bk_img = $auto_adjust_padding =  $plx_class = $data_position_plx = '';
		
			if($parallax_effect == true && $url != '' ) {
				if( $current_post_type == 'page' ) { 
					$data_position_plx = get_post_meta( $post->ID, '_manual_background_img_display_position', true );
				} else {
					$data_position_plx = $theme_options['header-background-position'];
				}
				$plx_data_src = 'data-image-src="'.$url.'" data-parallax="scroll" data-position="'.$data_position_plx.'" ';
				$plx_bk_img = "background:none;";
				$plx_class = 'parallax-window';
			}
			echo '<div class="jumbotron_new inner-jumbotron jumbotron-inner-fix noise-break header_custom_height '.$plx_class.'" '.$plx_data_src.' style="'.$plx_bk_img.' ">
			<div class="page_opacity header_custom_height_new">
			  <div class="container inner-margin-top">
				<div class="row">
				  <div class="col-md-12 col-sm-12 header_control_text_align">';
				  
				  	// Main title
				  	if( $hidetitle == false ) {
				  	echo '<h1 class="inner-header custom_h1_head">';
					
					if( $current_post_type == 'manual_faq' ) {
						$faq_catname = get_term_by( 'slug', get_query_var( 'term' ), 'manualfaqcategory' );
						if( !empty($faq_catname) ) {
							echo esc_html($faq_catname->name);
						} else {
							$terms = get_the_terms( $post->ID , 'manualfaqcategory' ); 
							if( !empty($terms) ) echo esc_html($terms[0]->name);
						}
					} else if( $current_post_type == 'manual_kb' ) { 
						$kb_catname = get_term_by( 'slug', get_query_var( 'term' ), 'manualknowledgebasecat' );
						if( !empty($kb_catname) ) {
							echo esc_html($kb_catname->name);
						} else {
							if ( is_tax() ) { 
								$current_term = get_term_by( 'slug', get_query_var( 'term' ), 'manual_kb_tag' );
								echo esc_html($current_term->name);
							} else { 
								$terms = get_the_terms( $post->ID , 'manualknowledgebasecat' ); 
								if( !empty($terms) ) echo esc_html($terms[0]->name);
							}
						}
					} else if( $current_post_type == 'manual_documentation' ) { 
						$doc_catname = get_term_by( 'slug', get_query_var( 'term' ), 'manualdocumentationcategory' );
						if( !empty($doc_catname) ) {
							echo esc_html($doc_catname->name);
						} else {
							$terms = get_the_terms( $post->ID , 'manualdocumentationcategory' ); 
							if( !empty($terms) ) echo esc_html($terms[0]->name);
						}
					} else if ( class_exists('bbPress') && is_bbPress() ) { // bbpress
						echo esc_html($theme_options['manual-forum-title']);
					} else if( $current_post_type == 'page' || (is_home() && $current_post_type == 'post') || ($current_post_type == 'manual_portfolio') 
								||  function_exists("is_woocommerce") && function_exists("is_product") && is_product() && is_single() /*woo handle - 1*/ 
								||  function_exists("is_woocommerce") && (is_shop())  /*woo handle - 2*/  ) { 
						if( $replace_title_act == true ) echo (($replace_title != '')?$replace_title:get_the_title());
					} else if( function_exists("is_product_category") && (is_product_category() || is_product_tag()) /*woo handle - 3*/ ) {
						echo single_term_title();
					} else if( (is_single()) ) {
						$postID = get_option('page_for_posts');
						$pagetitle = get_post_meta( $post->ID, '_manual_page_tagline', true );
						echo esc_html($theme_options['blog_single_title_on_header'] ==  false? (($pagetitle != '')?$pagetitle:'') :get_the_title());
					} else {
						 if ( is_category() ) {
							 echo single_cat_title( '', false ); 
						 } else if ( is_tag() ) {
							echo single_cat_title( '', false ); 
						 } else if( is_archive() ) {
							if ( is_day() ) :
									printf( esc_html__( 'daily archives: %s', 'manual' ), get_the_date() );
								elseif ( is_month() ) :
									printf( esc_html__( 'monthly archives: %s', 'manual' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'manual' ) ) );
								elseif ( is_year() ) :
									printf( esc_html__( 'yearly archives: %s', 'manual' ), get_the_date( _x( 'Y', 'yearly archives date format', 'manual' ) ) );
								else :
									esc_html_e( 'archives', 'manual' );
							endif;
						 } else if( is_404() ) {
							 $is_plugin_active = manual__plugin_active('ReduxFramework');
							 if( $is_plugin_active == true ){
								 if( $theme_options['onoff-404-page-hrader'] == true ){
									 echo esc_html($theme_options['home-404-main-title']);
								 }
							 }
						 } else if( is_search() ) {
						 	echo esc_html($replace_title);
						 } else {
							echo get_the_title();
						 }
					}
					
					echo '</h1>';
					}
					
					// subtitle
					if( (is_home() && $current_post_type == 'post') || $current_post_type == 'page' && $subtitle_act == true 
								|| function_exists("is_woocommerce") && (is_shop()) || ($current_post_type == 'manual_portfolio') ) { 
						echo '<p class="inner-header-color">'.$subtitle.'</p>';
					} else if ( class_exists('bbPress') && is_bbPress() ) {
						if( !empty($theme_options['manual-forum-subtitle']) && bbp_is_forum_archive() ) { 
							echo '<p class="inner-header-color">'.$theme_options['manual-forum-subtitle'].'</p>';
						}
					} else if( is_search() ) {
						if( $subtitle == '' ) $space_quot = '';
						else $space_quot = '&quot;';
						 echo '<p class="inner-header-color">'.$subtitle.'&nbsp;<b>'.$space_quot.''.get_search_query().''.$space_quot.'</b></p>';
					} 
					 
					// Breadcurmb
					if( function_exists("is_woocommerce") && is_woocommerce() && !is_shop() ){ // woo
						$woo_args = array(
								'delimiter' => '<span class="sep">/</span>',
								'wrap_before' => '<div id="breadcrumbs">',
								'wrap_after' => '</div>',
						);
						echo '<div class="inner-header-color">'.woocommerce_breadcrumb($woo_args) .'</div>'; 
					} else if ( class_exists('bbPress') && is_bbPress() ) { //bbpress
						if( $theme_options['bbpress_breadcrumb_status'] == true ) {
							if( bbp_is_single_user() != true && !bbp_is_forum_archive() ) {
								$manual_breadcrumbs_args = array(
									'before'          => '',
									'after'           => '',
									'sep'             => esc_html__( '/', 'manual' ),
									'home_text'       => esc_html__( 'Home', 'manual' ),
									(($theme_options['bbpress_breadcrumb'] ==  true )?'':'include_root') => ( ($theme_options['bbpress_breadcrumb'] ==  true )? '' : false ),
								);
								echo '<div id="breadcrumbs" class="forum-breadcrumbs">'.bbp_get_breadcrumb($manual_breadcrumbs_args).'</div>'; 
							}
						}
					} else { // Normal
						if( is_single() && $theme_options['blog_single_breadcrumb_on_header'] == false ) $breadcrumb = false;
						if( !is_404() && $breadcrumb == true ) { 
							echo '<div class="inner-header-color">'.manual_breadcrumb().'</div>'; 
						}
					}
					
					// search
					if( is_search() ) {
						if( $theme_options['search-page-header-search-bar-status'] == true ) {
							$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
							$searchpg_box_layout = $theme_options['search-page-searchbox-display-position'];
							if( isset($searchpg_box_layout) && $searchpg_box_layout != '' && $searchpg_box_layout != 'center' ) {
								$search_class = 'col-md-'.$searchpg_box_layout.' col-sm-12 class-pg-searchbox-fix';
							}
							echo '<div class="'.$search_class.' search-margin-top"><div class="global-search">';
							manual__standard_search_form();
							echo '</div></div>';
						}
					} else if( is_404() ) {
						if( $theme_options['onoff-404-page-hrader'] == true ){
							if( $theme_options['home-404-search-bar-status'] == false ) {
								$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
								$search_box_layout_404 = $theme_options['home-404-searchbox-display-position'];
								if( isset($search_box_layout_404) && $search_box_layout_404 != '' && $search_box_layout_404 != 'center' ) {
									$search_class = 'col-md-'.$search_box_layout_404.' col-sm-12 class-pg-searchbox-fix';
								}
								$is_plugin_active = manual__plugin_active('ReduxFramework');
								if( $is_plugin_active == true ){
									echo '<div class="'.$search_class.' search-margin-top"><div class="global-search">';
									manual__standard_search_form();
									echo '</div></div>';
								}
							}
						}
					} else if ( class_exists('bbPress') && is_bbPress() ) {
						if( $theme_options['bbpress_search_status'] == true ) {
							$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
							$bbpress_search_box_layout = $theme_options['bbpress-searchbox-display-position'];
							if( isset($bbpress_search_box_layout) && $bbpress_search_box_layout != '' && $bbpress_search_box_layout != 'center' ) {
								$search_class = 'col-md-'.$bbpress_search_box_layout.' col-sm-12 class-pg-searchbox-fix';
							}
							echo '<div class="'.$search_class.' search-margin-top"><div class="global-search">';
							manual__standard_search_form();
							echo '</div></div>';
						}
					} else if($searchbox == true) { 
						$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
						if( is_single() && $current_post_type == 'post' ) {
							$blogsingle_shbox_display = $theme_options['blog-single-searchbox-display-position'];
							if( isset($blogsingle_shbox_display) && $blogsingle_shbox_display != '' && $blogsingle_shbox_display != 'center' ) {
								$search_class = 'col-md-'.$blogsingle_shbox_display.' col-sm-12 class-pg-searchbox-fix';
							}
						} else if( (is_home() || is_archive()) && $current_post_type == 'post' ) {
							$homepostID = get_option('page_for_posts');
							$homepg_shbox_display_grid = get_post_meta( $homepostID, '_manual_search_box_display_grid', true );
							if( isset($homepg_shbox_display_grid) && $homepg_shbox_display_grid != '' && $homepg_shbox_display_grid != 'center' ) {
								$search_class = 'col-md-'.$homepg_shbox_display_grid.' col-sm-12 class-pg-searchbox-fix';
							} 
						} else if( $current_post_type == 'page' ) { 
							$header_search_box_display_grid = get_post_meta( $post->ID, '_manual_search_box_display_grid', true );
							if( isset($header_search_box_display_grid) && $header_search_box_display_grid != '' && $header_search_box_display_grid != 'center' ) {
								$search_class = 'col-md-'.$header_search_box_display_grid.' col-sm-12 class-pg-searchbox-fix';
							} 
						} else if($current_post_type == 'manual_kb') {
							if( is_single() ) {
								$kbsinglepg_shbox_display = $theme_options['kbsinglepg-searchbox-display-position'];
								if( isset($kbsinglepg_shbox_display) && $kbsinglepg_shbox_display != '' && $kbsinglepg_shbox_display != 'center' ) {
									$search_class = 'col-md-'.$kbsinglepg_shbox_display.' col-sm-12 class-pg-searchbox-fix';
								}
							} else {
								$kbcat_shbox_display = $theme_options['kbcat-searchbox-display-position'];
								if( isset($kbcat_shbox_display) && $kbcat_shbox_display != '' && $kbcat_shbox_display != 'center' ) {
									$search_class = 'col-md-'.$kbcat_shbox_display.' col-sm-12 class-pg-searchbox-fix';
								} 
							}
						} else if( $current_post_type == 'manual_faq' ) {
							$faq_shbox_display = $theme_options['faq-searchbox-display-position'];
							if( isset($faq_shbox_display) && $faq_shbox_display != '' && $faq_shbox_display != 'center' ) {
								$search_class = 'col-md-'.$faq_shbox_display.' col-sm-12 class-pg-searchbox-fix';
							}
						} else if($current_post_type == 'manual_documentation') {
							$doc_shbox_display = $theme_options['documentation-searchbox-display-position'];
							if( isset($doc_shbox_display) && $doc_shbox_display != '' && $doc_shbox_display != 'center' ) {
								$search_class = 'col-md-'.$doc_shbox_display.' col-sm-12 class-pg-searchbox-fix';
							}
						}
						echo '<div class="'.$search_class.' search-margin-top"><div class="global-search">';
						manual__standard_search_form();
						echo '</div></div>';
					} 
					                    
			  echo '</div>
			</div>
		  </div>
		  </div>
		</div>';
		
	}
}

/*-----------------------------------------*/
/*	MANUAL :: HEADER [[ "CONTROL" ]] CONTROL
			  * BASED ON [[ POST TYPE ]]
/*------------------------------------------*/
if (!function_exists('manual__post_type_header_control')) {
	function manual__post_type_header_control(){
		global $post, $theme_options;
		
		$current_post_type = get_post_type();
		$check_cat_img_exist = '';
		
		if( is_404() ) {
			if( $theme_options['onoff-404-page-hrader'] == true ){
				
				$check_404_img_exist = '';
				if( isset($theme_options['404-page-header-background-img']['url']) &&
						$theme_options['404-page-header-background-img']['url'] != '' ) {
						$check_404_img_exist = esc_url( $theme_options['404-page-header-background-img']['url'] );
				}
				
				$lineargradient_first_color_404 = $lineargradient_second_color_404 = '';
				if( isset($theme_options['404-lineargradient-first-color']['rgba']) && $theme_options['404-lineargradient-first-color']['rgba']!= '' ) {
					$lineargradient_first_color_404 = $theme_options['404-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['404-linear-gradient-second-color']['rgba']) && $theme_options['404-linear-gradient-second-color']['rgba']!= '' ) {
					$lineargradient_second_color_404 = $theme_options['404-linear-gradient-second-color']['rgba'];
				}
			
				manual_custom_page_css_control($check_404_img_exist, $theme_options['404-header-background-position'], $theme_options['404-apply-nav-background'], $theme_options['404-header-opacity-uploadimage-global'], $theme_options['404-header-height'], $lineargradient_first_color_404, $lineargradient_second_color_404);
				
				// title text control
				$headertitle_font_weight_404 = $headertitle_font_size_404 = $header_lineheight_404 = '';
				if( isset($theme_options['home_404_header_title_font_weight']) && $theme_options['home_404_header_title_font_weight'] != '' && $theme_options['home_404_header_title_font_weight'] != 'default' ) {
					$headertitle_font_weight_404 = 'font-weight:'.$theme_options['home_404_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['home_404_header_title_font_size']) && ($theme_options['home_404_header_title_font_size'] != '') ) {
					$headertitle_font_size_404 = 'font-size:'.$theme_options['home_404_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['home_404_header_title_line_height']) && ($theme_options['home_404_header_title_line_height'] != '') ) {
					$header_lineheight_404 = 'line-height: '.$theme_options['home_404_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$headertitle_font_weight_404.$headertitle_font_size_404.$header_lineheight_404.'}';
				
				if( $theme_options['404-apply-nav-border-btm'] == 1 ) {
					echo '.navbar { border-bottom: 1px solid '.$theme_options['404-apply-nav-border-btm-color']['rgba'].'; }'; 
				}
				if( isset($theme_options['404-header-text-align']) && $theme_options['404-header-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['404-header-text-align'].'; }';
				}
				
			} else {
				echo '.navbar { position: inherit; box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); }';
			}
				
		} else if( is_search() ) {
			
			$check_searchpg_img_exist = '';
			if( isset($theme_options['search-page-header-background-img']['url']) &&
					$theme_options['search-page-header-background-img']['url'] != '' ) {
					$check_searchpg_img_exist = esc_url( $theme_options['search-page-header-background-img']['url'] );
			}
			
			
$search_lineargradient_first_color = $search_lineargradient_second_color = '';
if( isset($theme_options['search-header-lineargradient-first-color']['rgba']) && $theme_options['search-header-lineargradient-first-color']['rgba']!= '' ) {
	$search_lineargradient_first_color = $theme_options['search-header-lineargradient-first-color']['rgba'];
}
if( isset($theme_options['search-header-linear-gradient-second-color']['rgba']) && $theme_options['search-header-linear-gradient-second-color']['rgba']!= '' ) {
	$search_lineargradient_second_color = $theme_options['search-header-linear-gradient-second-color']['rgba'];
}
			
			
			manual_custom_page_css_control($check_searchpg_img_exist, $theme_options['search-header-background-position'], $theme_options['search-apply-nav-background'], $theme_options['search-header-opacity-uploadimage-global'], $theme_options['search-header-height'], $search_lineargradient_first_color, $search_lineargradient_second_color);
			
			if( isset($theme_options['search-header-text-align']) && $theme_options['search-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['search-header-text-align'].'; }';
			}
			
			if( $theme_options['search-header-apply-nav-border-btm'] == 1 ) {
				echo '.navbar { border-bottom: 1px solid '.$theme_options['search-header-apply-nav-border-btm-color']['rgba'].'; }'; 
			}
			
			// title text control
			$searchpg_font_weight = $searchpg_font_size = $searchpg_lineheight = '';
			if( isset($theme_options['search_page_header_title_font_weight']) && $theme_options['search_page_header_title_font_weight'] != '' && $theme_options['search_page_header_title_font_weight'] != 'default' ) {
				$searchpg_font_weight = 'font-weight:'.$theme_options['search_page_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['search_page_header_title_font_size']) && ($theme_options['search_page_header_title_font_size'] != '') ) {
				$searchpg_font_size = 'font-size:'.$theme_options['search_page_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['search_page_header_title_font_size']) && ($theme_options['search_page_header_title_font_size'] != '') ) {
				$searchpg_lineheight = 'line-height: '.$theme_options['search_page_header_title_font_size'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$searchpg_font_weight.$searchpg_font_size.$searchpg_lineheight.'}';
			
			
			if( $theme_options['searchpg-records-publish-date'] == false && $theme_options['searchpg-records-author-name'] == false && !is_user_logged_in() ) { echo '.body-content .search::before, .body-content .search.manual_documentation:before {font-size: 32px; margin-top: -10px; }'; }
			
		} else if( $current_post_type == 'manual_portfolio' ) {  
			manual_header_page_css_control($post->ID);
			
		// FAQ	
		} else if($current_post_type == 'manual_faq') {
			if( isset($theme_options['manual-faq-header-background-image']['url']) &&
					$theme_options['manual-faq-header-background-image']['url'] != '' ) {
					$check_cat_img_exist = esc_url( $theme_options['manual-faq-header-background-image']['url'] );
			} else {
				if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => null,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
				}
			}
			if( $check_cat_img_exist != '') {
				
				$faq_lineargradient_first_color = $faq_lineargradient_second_color = '';
				if( isset($theme_options['faq-lineargradient-first-color']['rgba']) && $theme_options['faq-lineargradient-first-color']['rgba']!= '' ) {
					$faq_lineargradient_first_color = $theme_options['faq-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['faq-linear-gradient-second-color']['rgba']) && $theme_options['faq-linear-gradient-second-color']['rgba']!= '' ) {
					$faq_lineargradient_second_color = $theme_options['faq-linear-gradient-second-color']['rgba'];
				}
				
				manual_custom_page_css_control($check_cat_img_exist, $theme_options['header-faq-background-position'], $theme_options['faq-apply-nav-background-category-page'], $theme_options['faq-header-opacity-uploadimage-global-category-page'], $theme_options['faq-header-height-category-page'], $faq_lineargradient_first_color, $faq_lineargradient_second_color);
			} else {
					manual_custom_page_css_control('', '', '', '', $theme_options['faq-header-height-category-page']);
			}
			
			if( isset($theme_options['faq-header-text-align']) && $theme_options['faq-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['faq-header-text-align'].'; }';
			}
			
			// title text control
			$faq_headertitle_font_weight = $faq_headertitle_font_size = $faq_header_lineheight = '';
			if( isset($theme_options['faq_header_title_font_weight']) && $theme_options['faq_header_title_font_weight'] != '' && $theme_options['bbpress_header_title_font_weight'] != 'default' ) {
				$faq_headertitle_font_weight = 'font-weight:'.$theme_options['faq_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['faq_header_title_font_size']) && ($theme_options['faq_header_title_font_size'] != '') ) {
				$faq_headertitle_font_size = 'font-size:'.$theme_options['faq_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['faq_header_title_line_height']) && ($theme_options['faq_header_title_line_height'] != '') ) {
				$faq_header_lineheight = 'line-height: '.$theme_options['faq_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$faq_headertitle_font_weight.$faq_headertitle_font_size.$faq_header_lineheight.'}';
			
			if( $theme_options['faq-apply-nav-border-btm'] == 1 ) {
				echo '.navbar { border-bottom: 1px solid '.$theme_options['faq-apply-nav-border-btm-color']['rgba'].'; }'; 
			}
			
		// KNOWLEDGEBASE	
		} else if($current_post_type == 'manual_kb') {
			
			if( is_single() ) {
				$image = get_post_meta( get_the_ID(), '_manual_header_image', 1 ); // post upload image
				$terms = wp_get_post_terms($post->ID, 'manualknowledgebasecat');
				$current_term = $terms[0];
				$term_id = $current_term->term_id;
				if( isset($theme_options['kbsinglepg-header-background-image']['url']) &&
					$theme_options['kbsinglepg-header-background-image']['url'] != '' ) {
					$check_cat_img_exist = esc_url( $theme_options['kbsinglepg-header-background-image']['url'] );
				} else {
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => $term_id,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
				}
				if( $check_cat_img_exist != '' && $image == '' ) {
					
					$kbsingle_lineargradient_first_color = $kbsingle_lineargradient_second_color = '';
					if( isset($theme_options['kbsingle-lineargradient-first-color']['rgba']) && $theme_options['kbsingle-lineargradient-first-color']['rgba']!= '' ) {
						$kbsingle_lineargradient_first_color = $theme_options['kbsingle-lineargradient-first-color']['rgba'];
					}
					if( isset($theme_options['kbsingle-linear-gradient-second-color']['rgba']) && $theme_options['kbsingle-linear-gradient-second-color']['rgba']!= '' ) {
						$kbsingle_lineargradient_second_color = $theme_options['kbsingle-linear-gradient-second-color']['rgba'];
					}
					
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['kbsinglepg-header-background-position'], $theme_options['kbsinglepg-apply-nav-background'], $theme_options['kbsinglepg-header-opacity-uploadimage-global'], $theme_options['kbsinglepg-header-height'], $kbsingle_lineargradient_first_color, $kbsingle_lineargradient_second_color);
					
					if( $theme_options['kbsinglepg-apply-nav-border-btm'] == 1 ) {
					    echo '.navbar { border-bottom: 1px solid '.$theme_options['kbsinglepg-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
					
				} else {
					if( $image != '') { 
						if( get_post_meta( get_the_ID(), '_manual_remove_nav_bg', 1 ) == false ) $nav = true;
						else $nav = false;
						if( get_post_meta( get_the_ID(), '_manual_bg_opacity_uploadimg', 1 ) == false ) $header_opacity = true;
						else $header_opacity = false;
						manual_custom_page_css_control($image, 'center center', $nav, $header_opacity, ( (get_post_meta( get_the_ID(), '_manual_header_height', 1 ) != '')?get_post_meta( get_the_ID(), '_manual_header_height', 1 ):$theme_options['kbsinglepg-header-height'] ) );
					} else {
						$nav = $header_opacity = false;
						manual_custom_page_css_control('', '', $nav, $header_opacity, ( (get_post_meta( get_the_ID(), '_manual_header_height', 1 ) != '')?get_post_meta( get_the_ID(), '_manual_header_height', 1 ):$theme_options['kbsinglepg-header-height'] ) );
					}
				}
				
				if( isset($theme_options['kbsinglepg-text-align']) && $theme_options['kbsinglepg-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['kbsinglepg-text-align'].'; }';
				}
				
				// title text control
				$kbsinglepg_headertitle_font_weight = $kbsinglepg_headertitle_font_size = $kbsinglepg_header_lineheight = '';
				if( isset($theme_options['kbsinglepg_header_title_font_weight']) && $theme_options['kbsinglepg_header_title_font_weight'] != '' && $theme_options['bbpress_header_title_font_weight'] != 'default' ) {
					$kbsinglepg_headertitle_font_weight = 'font-weight:'.$theme_options['kbsinglepg_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['kbsinglepg_header_title_font_size']) && ($theme_options['kbsinglepg_header_title_font_size'] != '') ) {
					$kbsinglepg_headertitle_font_size = 'font-size:'.$theme_options['kbsinglepg_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['kbsinglepg_header_title_line_height']) && ($theme_options['kbsinglepg_header_title_line_height'] != '') ) {
					$kbsinglepg_header_lineheight = 'line-height: '.$theme_options['kbsinglepg_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$kbsinglepg_headertitle_font_weight.$kbsinglepg_headertitle_font_size.$kbsinglepg_header_lineheight.'}';
				
				if( isset($theme_options['kb-remove-article-title-icon']) && $theme_options['kb-remove-article-title-icon'] == false ) {
					echo '.body-content .kb-single { padding: 0px; } .body-content .kb-single:before { content: ""; }';
				}
				
			
			} else {
				if( isset($theme_options['manual-kb-header-background-image']['url']) &&
					$theme_options['manual-kb-header-background-image']['url'] != '' ) {
					$check_cat_img_exist = esc_url( $theme_options['manual-kb-header-background-image']['url'] );
				} else {
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => null,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
				}
				if( $check_cat_img_exist != '') {
					$kbcat_lineargradient_first_color = $kbcat_lineargradient_second_color = '';
					if( isset($theme_options['kbcat-lineargradient-first-color']['rgba']) && $theme_options['kbcat-lineargradient-first-color']['rgba']!= '' ) {
						$kbcat_lineargradient_first_color = $theme_options['kbcat-lineargradient-first-color']['rgba'];
					}
					if( isset($theme_options['kbcat-linear-gradient-second-color']['rgba']) && $theme_options['kbcat-linear-gradient-second-color']['rgba']!= '' ) {
						$kbcat_lineargradient_second_color = $theme_options['kbcat-linear-gradient-second-color']['rgba'];
					}
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['kbcat-header-background-position'], $theme_options['kbcat-apply-nav-background'], $theme_options['kbcat-header-opacity-uploadimage-global'], $theme_options['kbcat-header-height'], $kbcat_lineargradient_first_color, $kbcat_lineargradient_second_color);
					
					if( $theme_options['kbcat-apply-nav-border-btm'] == 1 ) {
					    echo '.navbar { border-bottom: 1px solid '.$theme_options['kbcat-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
					
				} else {
					manual_custom_page_css_control('', '', '', '', $theme_options['kbcat-header-height']);
				}
				
				if( isset($theme_options['kbcat-text-align']) && $theme_options['kbcat-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['kbcat-text-align'].'; }';
				}
				// title text control
				$kbcat_headertitle_font_weight = $kbcat_headertitle_font_size = $kbcat_header_lineheight = '';
				if( isset($theme_options['kb_cattag_header_title_font_weight']) && $theme_options['kb_cattag_header_title_font_weight'] != '' && $theme_options['bbpress_header_title_font_weight'] != 'default' ) {
					$kbcat_headertitle_font_weight = 'font-weight:'.$theme_options['kb_cattag_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['kb_cattag_header_title_font_size']) && ($theme_options['kb_cattag_header_title_font_size'] != '') ) {
					$kbcat_headertitle_font_size = 'font-size:'.$theme_options['kb_cattag_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['kb_cattag_header_title_line_height']) && ($theme_options['kb_cattag_header_title_line_height'] != '') ) {
					$kbcat_header_lineheight = 'line-height: '.$theme_options['kb_cattag_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$kbcat_headertitle_font_weight.$kbcat_headertitle_font_size.$kbcat_header_lineheight.'}';
				
			}
		
		// DOCUMENTATION
		} else if($current_post_type == 'manual_documentation') {
			
$documentation_lineargradient_first_color = $documentation_lineargradient_second_color = '';
if( isset($theme_options['documentation-lineargradient-first-color']['rgba']) && $theme_options['documentation-lineargradient-first-color']['rgba']!= '' ) {
	$documentation_lineargradient_first_color = $theme_options['documentation-lineargradient-first-color']['rgba'];
}
if( isset($theme_options['documentation-linear-gradient-second-color']['rgba']) && $theme_options['documentation-linear-gradient-second-color']['rgba']!= '' ) {
	$documentation_lineargradient_second_color = $theme_options['documentation-linear-gradient-second-color']['rgba'];
}
	
			
			if( is_single() ) {
				if( isset($theme_options['manual-documentation-header-background-image']['url']) &&
					$theme_options['manual-documentation-header-background-image']['url'] != '' ) {
					$check_cat_img_exist = esc_url( $theme_options['manual-documentation-header-background-image']['url'] );
				} else {
					$terms = wp_get_post_terms($post->ID, 'manualdocumentationcategory');
					$current_term = $terms[0];
					$term_id = $current_term->term_id;
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => $term_id,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
				}
				if( $check_cat_img_exist != '') {
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['doc-header-background-position'], $theme_options['documentation-apply-nav-background-category-page'], $theme_options['documentation-header-opacity-uploadimage-global-category-page'], $theme_options['documentation-header-height-category-page'], $documentation_lineargradient_first_color, $documentation_lineargradient_second_color);
				} else {
					manual_custom_page_css_control('', '', '', '', $theme_options['documentation-header-height-category-page']);
				}
			} else { // start else
				if( isset($theme_options['manual-documentation-header-background-image']['url']) &&
					$theme_options['manual-documentation-header-background-image']['url'] != '' ) {
					$check_cat_img_exist = esc_url( $theme_options['manual-documentation-header-background-image']['url'] );
				} else {
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => null,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
				}
				if( $check_cat_img_exist != '') {
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['doc-header-background-position'], $theme_options['documentation-apply-nav-background-category-page'], $theme_options['documentation-header-opacity-uploadimage-global-category-page'], $theme_options['documentation-header-height-category-page'], $documentation_lineargradient_first_color, $documentation_lineargradient_second_color);
				} else {
					manual_custom_page_css_control('', '', '', '', $theme_options['documentation-header-height-category-page']);
				}
			} // eof else
			
			if( $theme_options['documentation-quick-stats-under-title'] == true && !is_user_logged_in()  ) { echo '.page-title-header:before {font-size: 34px;top: -7px;}.page-title-header { padding: 0px 0px 0px 53px; margin-bottom: -8px; }'; }
			if( $theme_options['documentation-voting-buttons-status'] == true || ($theme_options['documentation-voting-buttons-status'] == false && !is_user_logged_in() && $theme_options['documentation-voting-login-users'] == true)  ) {
				echo '.panel-heading .social-box { float: none; }';
			}
			
			if( isset($theme_options['doc-header-text-align']) && $theme_options['doc-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['doc-header-text-align'].'; }';
			}
			
			// title text control
			$doc_headertitle_font_weight = $doc_headertitle_font_size = $doc_header_lineheight = '';
			if( isset($theme_options['doc_header_title_font_weight']) && $theme_options['doc_header_title_font_weight'] != '' && $theme_options['doc_header_title_font_weight'] != 'default' ) {
				$doc_headertitle_font_weight = 'font-weight:'.$theme_options['doc_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['doc_header_title_font_size']) && ($theme_options['doc_header_title_font_size'] != '') ) {
				$doc_headertitle_font_size = 'font-size:'.$theme_options['doc_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['doc_header_title_line_height']) && ($theme_options['doc_header_title_line_height'] != '') ) {
				$doc_header_lineheight = 'line-height: '.$theme_options['doc_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$doc_headertitle_font_weight.$doc_headertitle_font_size.$doc_header_lineheight.'}';
			
			if( $theme_options['documentation-apply-nav-border-btm'] == 1 ) {
				echo '.navbar { border-bottom: 1px solid '.$theme_options['documentation-apply-nav-border-btm-color']['rgba'].'; }'; 
			}
			
			
		// WOOCOMMERCE
		} else if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){
			if(is_shop()){
				$page_id = get_option('woocommerce_shop_page_id');
				manual_woo_shop_column_css_handler();		
			} elseif(is_checkout()) {
				$page_id = get_option('woocommerce_pay_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_myaccount_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_edit_address_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_view_order_page_id'); 
			}
			$woopage  = get_post( $page_id );
			manual_header_page_css_control($woopage->ID);
		} else if(function_exists("is_woocommerce") && (is_product() || is_product_category() || is_product_tag() ) ){ 
			if( is_product_category() || is_product_tag() ) {
				manual_custom_page_css_control('', '', '', '', 40);
			} else {
				manual_custom_page_css_control('', '', '', '', 25);
			}
			if( is_product() ) echo '.header_control_text_align { text-align:left; }';
		} else if( is_home() && $current_post_type == 'post' ) {
			$postID = get_option('page_for_posts');
			if( $postID != '' && $postID != 0 ) {
				manual_header_page_css_control($postID);
			} else {
				echo '.navbar { position: inherit; box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); }';	
			}
		} else if( $current_post_type == 'page' ) {
			manual_header_page_css_control($post->ID);
		} else if( $current_post_type == 'post' && $theme_options['blog_single_page_global_header_settings'] == true && !is_single() ) {
			$postID = get_option('page_for_posts');
			manual_header_page_css_control($postID);
			
		// POST SINGLE
		} else if( $current_post_type == 'post' && is_single() ) {
			
			$feature_image_url = get_the_post_thumbnail_url($post->ID,'large');
			if( $feature_image_url != '' && $theme_options['blog_featured_image_on_the_header'] == true ) {
				
				$blogpg_lineargradient_first_color = $blogpg_lineargradient_second_color = '';
				if( isset($theme_options['blog-lineargradient-first-color']['rgba']) && $theme_options['blog-lineargradient-first-color']['rgba']!= '' ) {
					$blogpg_lineargradient_first_color = $theme_options['blog-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['blog-linear-gradient-second-color']['rgba']) && $theme_options['blog-linear-gradient-second-color']['rgba']!= '' ) {
					$blogpg_lineargradient_second_color = $theme_options['blog-linear-gradient-second-color']['rgba'];
				}
				
				manual_custom_page_css_control($feature_image_url, 'center center', $theme_options['blog-apply-nav-background'], $theme_options['blog-header-opacity-uploadimage-global'], $theme_options['blog-header-height'], $blogpg_lineargradient_first_color, $blogpg_lineargradient_second_color);
				
			   echo 'h1.custom_h1_head { color: #ffffff!important; }';
			} else {
				manual_custom_page_css_control('', 'center center', $theme_options['blog-apply-nav-background'], $theme_options['blog-header-opacity-uploadimage-global'], $theme_options['blog-header-height']);
			}
			if( $theme_options['blog_single_page_icon_format'] == true ) echo '.body-content .blog.post.format-image:before, .body-content .blog.post.format-quote:before, .body-content .blog.post.format-video:before, .body-content .blog.post.format-audio:before, .body-content .blog.post.format-standard:before { content: ""; }';
			
			if( isset($theme_options['blog-header-text-align']) && $theme_options['blog-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['blog-header-text-align'].'; }';
			}
			
			$blogsingle_headertitle_font_weight = $blogsingle_headertitle_font_size = $blogsingle_header_lineheight = '';
			if( isset($theme_options['blog_header_title_font_weight']) && $theme_options['blog_header_title_font_weight'] != '' && $theme_options['blog_header_title_font_weight'] != 'default' ) {
				$blogsingle_headertitle_font_weight = 'font-weight:'.$theme_options['blog_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['blog_header_title_font_size']) && ($theme_options['blog_header_title_font_size'] != '') ) {
				$blogsingle_headertitle_font_size = 'font-size:'.$theme_options['blog_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['blog_header_title_line_height']) && ($theme_options['blog_header_title_line_height'] != '') ) {
				$blogsingle_header_lineheight = 'line-height: '.$theme_options['blog_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$blogsingle_headertitle_font_weight.$blogsingle_headertitle_font_size.$blogsingle_header_lineheight.'}';
			
			if( $theme_options['blog-apply-nav-border-btm'] == 1 ) {
				echo '.navbar { border-bottom: 1px solid '.$theme_options['blog-apply-nav-border-btm-color']['rgba'].'; }'; 
			}
			
		// BBPRESS	
		} else if ( class_exists('bbPress') && is_bbPress() ) { 
			if( isset($theme_options['bbpress-header-image']['url']) && $theme_options['bbpress-header-image']['url'] != '') {
				
				$bbpress_lineargradient_first_color = $bbpress_lineargradient_second_color = '';
				if( isset($theme_options['bbpress-lineargradient-first-color']['rgba']) && $theme_options['bbpress-lineargradient-first-color']['rgba']!= '' ) {
					$bbpress_lineargradient_first_color = $theme_options['bbpress-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['bbpress-linear-gradient-second-color']['rgba']) && $theme_options['bbpress-linear-gradient-second-color']['rgba']!= '' ) {
					$bbpress_lineargradient_second_color = $theme_options['bbpress-linear-gradient-second-color']['rgba'];
				}
				
				manual_custom_page_css_control($theme_options['bbpress-header-image']['url'], $theme_options['bbpress-header-background-position'], $theme_options['bbpress-apply-nav-background'], $theme_options['bbpress-header-opacity-uploadimage-global'], $theme_options['bbpress-header-height'], $bbpress_lineargradient_first_color, $bbpress_lineargradient_second_color);
				if( $theme_options['bbpress-apply-nav-background'] == 0 ) {
					echo '.navbar { background: transparent!important; }';
				}
				
				if( $theme_options['bbpress-apply-nav-border-btm'] == 1 ) {
					echo '.navbar { border-bottom: 1px solid '.$theme_options['bbpress-apply-nav-border-btm-color']['rgba'].'; }'; 
				}
				
			} else {
				manual_custom_page_css_control('', '', false, false, $theme_options['bbpress-header-height']);
			}
			if( isset($theme_options['bbpress-header-text-align']) && $theme_options['bbpress-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['bbpress-header-text-align'].'; }';
			}
			
			$bbpress_headertitle_font_weight = $bbpress_headertitle_font_size = $bbpress_header_lineheight = '';
			if( isset($theme_options['bbpress_header_title_font_weight']) && $theme_options['bbpress_header_title_font_weight'] != '' && $theme_options['bbpress_header_title_font_weight'] != 'default' ) {
				$bbpress_headertitle_font_weight = 'font-weight:'.$theme_options['bbpress_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['bbpress_header_title_font_size']) && ($theme_options['bbpress_header_title_font_size'] != '') ) {
				$bbpress_headertitle_font_size = 'font-size:'.$theme_options['bbpress_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['bbpress_header_title_line_height']) && ($theme_options['bbpress_header_title_line_height'] != '') ) {
				$bbpress_header_lineheight = 'line-height: '.$theme_options['bbpress_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$bbpress_headertitle_font_weight.$bbpress_headertitle_font_size.$bbpress_header_lineheight.'}';
			
		}
		
		
	}
}


/*-----------------------------------------*/
/*	MANUAL :: "WP POST TYPE == PAGE" 
               HEADER [[ "IMAGE" ]] CONTROL
/*------------------------------------------*/
if (!function_exists('manual_custom_page_css_control')) {
	function manual_custom_page_css_control($img='', $imgbgposition = 'center center', $navbarbg = true, $header_opacity = true, $headerheight = '', $lineargradient_first = '', $lineargradient_second = '' ) {
		global $theme_options;
		if( $img != '' ) {
		echo '.page_opacity.header_custom_height_new { padding: 112px 0px!important; } .noise-break { background: #f5f5f5 url('.$img.') repeat; background-size: cover; background-position:'.$imgbgposition.'; } h1.custom_h1_head { color: #ffffff!important; } #breadcrumbs, #breadcrumbs span, #breadcrumbs a, .trending-search a, .trending-search span.comma { color: #f5f5f5!important; } .trending-search span.popular-keyword-title { color: #f1f1f1; } .trending-search a:hover, #breadcrumbs a:hover { color: #dad8d8!important; } p.inner-header-color { color: #e8e8e8; } ';
		
		if( $header_opacity == true ) { 
			echo '.page_opacity.header_custom_height_new { background: '.((isset($lineargradient_first)&& $lineargradient_first != '')?$lineargradient_first:'rgba(0,0,0,0.3)').';';
			if( ( isset($lineargradient_first) && $lineargradient_first != '' ) &&  (isset($lineargradient_second) && $lineargradient_second != '') ) {							
				echo 'background: -moz-linear-gradient(-45deg, '.$lineargradient_first.' 35%, '.$lineargradient_second.' 100%);
					  background: -webkit-linear-gradient(-45deg, '.$lineargradient_first.' 35%, '.$lineargradient_second.' 100%);
					  background: linear-gradient(135deg, '.$lineargradient_first.' 35%, '.$lineargradient_second.' 100%);';
			}
		echo '}'; }
		
		if( $theme_options['theme-nav-type'] == 2 ) { 
			if( class_exists('bbPress') && is_bbpress() ) {
				$nav_bg_call = 'background:'.$theme_options['apply-nav-background-color']['rgba'].'!important;';
			} else {
				$nav_bg_call = 'background:none!important;';
			}
				echo '.navbar {  border: none; box-shadow:none;'.$nav_bg_call.' } '; 
		}
		
		if( $navbarbg == true ) { if( $theme_options['theme-nav-type'] == 2 ) { echo '.navbar {  background:'.$theme_options['apply-nav-background-color']['rgba'].'!important; }';} }
		
		if($theme_options['theme-nav-type'] == 2) { 
		echo 'img.home-logo-show { display: none; } img.inner-page-white-logo { display: block; } .navbar-inverse .navbar-nav>li>a { color:'.$theme_options['first-level-menu-text-color-for-img-bg']['regular'].'!important; } .navbar-inverse .navbar-nav>li>a:hover { color:'.$theme_options['first-level-menu-text-color-for-img-bg']['hover'].'!important; } @media (max-width: 991px) and (min-width: 768px) { img.inner-page-white-logo { display: none!important; } img.home-logo-show { display: block; } .navbar {  background:#FFFFFF!important; } } @media (max-width: 767px) {  img.inner-page-white-logo { display: none!important; } img.home-logo-show { display: block; } .navbar {  background:#FFFFFF!important; } }'; }
		}
		if( $headerheight != '' ) echo '.page_opacity.header_custom_height_new { padding: '.$headerheight.'px 0px!important; }';
	}
}


/*-------------------------------------*/
/*	MANUAL :: "WP POST TYPE == PAGE" 
               HEADER DESIGN CONTROL
/*--------------------------------------*/
if (!function_exists('manual_header_display_control_break_page')) {
	function manual_header_display_control_break_page($postID) {
		global $theme_options,$post;
		$url = '';
		$searchbox = $parallax_effect = false;
		$revslider = get_post_meta($postID, "_manual_slider_rev_shortcode", true);
		if (!empty($revslider)){ 
			echo '<div class="q_slider"><div class="q_slider_inner">'.do_shortcode($revslider).'</div></div>';
		} else {
			if( !get_post_meta( $postID, '_manual_header_hide_header_bar', true ) == 'on' ) { 
				$pagetitle = get_post_meta( $postID, '_manual_page_tagline', true );
				if( get_post_meta( $postID, '_manual_header_searh_box', true ) == true ) { $searchbox = true; }
				if( get_post_meta( $postID, '_manual_header_parallax_effect', true ) == true && get_post_meta( $postID, '_manual_header_image', true ) != '' ) {
					$url = get_post_meta( $postID, '_manual_header_image', true );
					$parallax_effect = true;
				}
				if( get_post_meta( $postID, '_manual_header_no_title', true ) == true ) $replace_title_act = false;
				else $replace_title_act =  true;
				
				if( get_post_meta( $postID, '_manual_page_desc', true ) != '' ) { 
					$subtitle = get_post_meta( $postID, '_manual_page_desc', true );
					$subtitle_act = true;
				} else {
					$subtitle = '';
					$subtitle_act = false;
				}
				
				if( get_post_meta( $postID, '_manual_header_breadcrumb_status', true ) == true ) $breadcrumb = true;
				else $breadcrumb = false;
					
				manual_header_design_control( get_post_type(), $url, $parallax_effect, $searchbox, $pagetitle, $replace_title_act, $subtitle, $subtitle_act, $breadcrumb);
			}
		}
	}
}

/*----------------------------------------------*/
/*	MANUAL :: HEADER DESIGN - [[ CSS CONTROL ]]
              * BASED ON "HEADER TYPE"
              * BASED ON [[ "WP PAGE" ]] SETTINGS
/*-----------------------------------------------*/
if (!function_exists('manual_header_page_css_control')) {
	function manual_header_page_css_control($postID, $post_type_call = '') {
		global $theme_options,$post;
		
			// Header Menu Bar Type 
			if( get_post_meta( $postID, '_manual_nav_style_type', true ) ==  'standard' ) { // Transparent Background
				echo '.navbar { position: inherit; background:'.(isset($theme_options['apply-nav-background-color-for-transparent-bg']['rgba'])?$theme_options['apply-nav-background-color-for-transparent-bg']['rgba']:'').'!important; }img.inner-page-white-logo{ display: none; } img.home-logo-show { display: block; } .jumbotron_new .inner-margin-top { padding-top: 0px; }';
			} else { // Without Background (White Backgorund)
				echo '.navbar { position: absolute; width: 100%!important; } .jumbotron_new .inner-margin-top { padding-top: 92px; } @media (max-width: 991px) and (min-width: 768px) { .navbar { position: relative!important; background: #FFFFFF!important; } }';
			}
			
			
			/* Force apply white logo and white 
			   menu bar text for the selected 'Page Header Background Color' */
			if( get_post_meta( $postID, '_manual_header_background_color_force_white', true ) ==  true ) { echo '@media (min-width:768px) and (max-width:991px) { img.home-logo-show { display: block!important; } img.inner-page-white-logo{ display: none!important; } } @media (max-width:767px) { img.home-logo-show { display: block!important; } img.inner-page-white-logo{ display: none!important; }  }'; }
			
			// Nav Bar CSS
			if( get_post_meta( $postID, '_manual_nav_style_type', true ) ==  'custom' && (get_post_meta($postID, "_manual_header_background_color", true) != '' || get_post_meta( $postID, '_manual_header_image', true ) != '' || get_post_meta( $postID, '_manual_slider_rev_shortcode', true ) != '' ) ) {
				
				echo '.navbar{ ';
				if( get_post_meta( $postID, '_manual_remove_nav_header_bg_opacity', true ) == false ) echo 'background:none!important;';
				else echo 'background:'.$theme_options['apply-nav-background-color']['rgba'].'!important;';
				
				echo '}  @media (max-width: 991px) and (min-width: 768px) { .navbar { background: #FFFFFF!important; } }  @media (max-width:767px) { .navbar { background: #FFFFFF!important; }  } ';
			}
			
			
			/**********************************************
			 * SETTINGS FOR ANY HEADER TYPE 
			 * i.e  Standard OR with White Background.
			 ***********************************************/
			echo '.navbar{ ';
			
				// Add Nav Background
				if( get_post_meta( $postID, '_manual_remove_nav_header_bg_opacity', true ) == true  ) { 
					$rgb_bgcolor = hex2rgb(get_post_meta( $postID, '_manual_nav_header_bg_color', true ));
					$nav_bg_color = 'rgba('.$rgb_bgcolor[0].','.$rgb_bgcolor[1].','.$rgb_bgcolor[2].', '.(get_post_meta( $postID, '_manual_nav_header_bg_color_opacity', true )?get_post_meta( $postID, '_manual_nav_header_bg_color_opacity', true ):'0.3').')';
					echo 'background: '.$nav_bg_color.'!important;';
				}
			
				// Nav Border Bottom
				if( get_post_meta( $postID, '_manual_remove_nav_border_line', true ) == false ) { 
						echo 'border-bottom:none!important;';
				} else { 
					$rgb_border = hex2rgb(get_post_meta( $postID, '_manual_nav_border_color', true ));
					$border_rgb_color = 'rgba('.$rgb_border[0].','.$rgb_border[1].','.$rgb_border[2].', '.(get_post_meta( $postID, '_manual_nav_border_opacity', true )?get_post_meta( $postID, '_manual_nav_border_opacity', true ):'0.6').')';
					echo 'border-bottom: 1px solid '.$border_rgb_color.';'; 
				}
			
				// Nav Box Shadow
				if( get_post_meta( $postID, '_manual_remove_nav_box_shadow', true ) == false ) { 
					echo 'box-shadow: none!important;';
				} else { echo 'box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04);';
				}
				
			echo '} @media (max-width: 991px) and (min-width: 768px) { .navbar{ background: rgba(255, 255, 255)!important; } } @media (max-width: 767px) { .navbar{ background: rgba(255, 255, 255)!important; }  }';
			
			
			
			// Hide Header Bar
			if( get_post_meta( $postID, '_manual_header_hide_menu_bar', true ) == true ) {
				echo '.navbar { display:none; } .jumbotron_new.jumbotron-inner-fix .inner-margin-top { padding-top:0px!important; }';
			} 
			
			if( get_post_meta($postID, "_manual_header_re_adjust_padding", true) != '' ) {
				echo '.page_opacity.header_custom_height_new { padding: '.get_post_meta($postID, "_manual_header_re_adjust_padding", true).'px 0px!important; }';
			}
			
			echo '.header_control_text_align { text-align:'.get_post_meta($postID, "_manual_text_align_title_and_desc", true).'!important; }';
			
			
			if( get_post_meta( $postID, '_manual_header_image', true ) != '' || get_post_meta( $postID, '_manual_slider_rev_shortcode', true ) != '' ) {
				
				if( get_post_meta($postID, "_manual_header_background_color", true) != '' ) {
					$post_bg_color = get_post_meta($postID, "_manual_header_background_color", true);
				} else {
					$post_bg_color = '#f5f5f5';
				}
				
				echo '.noise-break { background-position: '.(get_post_meta( $postID, '_manual_background_img_display_position', true )!=''?get_post_meta( $postID, '_manual_background_img_display_position', true ):'center center').'!important; background-size:cover!important; background: '.$post_bg_color.' url("'.get_post_meta( $postID, '_manual_header_image', true ).'") } img.inner-page-white-logo{ display: block; } img.home-logo-show { display: none; }.navbar-inverse .navbar-nav>li>a:hover { color:'.$theme_options['first-level-menu-text-color-for-img-bg']['hover'].'!important; } @media (max-width: 991px) and (min-width: 768px) { img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; } } @media (max-width: 767px) { img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; } } .hamburger-menu span { background: #ffffff; }';
				
				$black_logo_navtext = get_post_meta( $postID, '_manual_header_background_img_force_black', true );
				if($black_logo_navtext == true) {
					echo 'img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; }';	
				} else {
					echo '.navbar-inverse .navbar-nav>li>a { color:'.$theme_options['first-level-menu-text-color-for-img-bg']['regular'].'!important; } ';
				}
				
				if( get_post_meta( $postID, '_manual_header_bk_opacity_effect', true ) == true ) { 
					$rgb_border_bg = hex2rgb(get_post_meta( $postID, '_manual_header_background_bg_cover_opacity_color', true ));
					$border_rgb_color_layer = 'rgba('.$rgb_border_bg[0].','.$rgb_border_bg[1].','.$rgb_border_bg[2].', '.(get_post_meta( $postID, '_manual_bg_color_opacity_depth', true )?get_post_meta( $postID, '_manual_bg_color_opacity_depth', true ):'0.3').')';
					echo '.page_opacity.header_custom_height_new{background:'.$border_rgb_color_layer.';}';
				} else {
					echo '.page_opacity.header_custom_height_new{background:none;}';
				}
				
			}
			
						
			
			if( get_post_meta( $postID, '_manual_nav_style_type', true ) ==  'standard' && (get_post_meta( $postID, '_manual_header_image', true ) != '' || get_post_meta( $postID, '_manual_slider_rev_shortcode', true ) != '')) {
				echo 'img.inner-page-white-logo{ display: none; } img.home-logo-show { display: block; } .navbar-inverse .navbar-nav>li>a { color:'.$theme_options['first-level-menu-text-color']['regular'].'!important; } .navbar-inverse .navbar-nav>li>a:hover { color:'.$theme_options['first-level-menu-text-color']['hover'].'!important; }.jumbotron_new .inner-margin-top { padding-top: 0px; }';
			}
			
			if( get_post_meta($postID, "_manual_header_background_color", true) != '' && get_post_meta( $postID, '_manual_header_image', true ) == '' ) {
				
				if( get_post_meta($postID, "_manual_header_background_color_linear", true) != '' ) {
					echo '.noise-break{ background:'.get_post_meta($postID, "_manual_header_background_color", true).'; background: -moz-linear-gradient(-45deg, '.get_post_meta($postID, "_manual_header_background_color", true).' 35%, '.get_post_meta($postID, "_manual_header_background_color_linear", true).' 100%); background: -webkit-linear-gradient(-45deg, '.get_post_meta($postID, "_manual_header_background_color", true).' 35%, '.get_post_meta($postID, "_manual_header_background_color_linear", true).' 100%); background: linear-gradient(135deg, '.get_post_meta($postID, "_manual_header_background_color", true).' 35%,'.get_post_meta($postID, "_manual_header_background_color_linear", true).' 100%); }';
				} else {
					echo '.noise-break{ background:'.get_post_meta($postID, "_manual_header_background_color", true).'; }';
				}
				if( get_post_meta($postID, "_manual_header_background_color_force_white", true) == true && get_post_meta( $postID, '_manual_nav_style_type', true ) ==  'custom' ) {
				echo 'img.inner-page-white-logo{ display: block; } img.home-logo-show { display: none; } .navbar-inverse .navbar-nav>li>a { color: #f7f7f7!important; } .hamburger-menu span { background: #f7f7f7; }  .navbar-inverse .navbar-nav>li>a:hover { color: #c3c3c3!important; }';	
				}
			}
			
			// Page Header Text Controls
			$title_text_padding = $title_text_line_height = $title_text_letter_spacing = $title_text_margin = '';
			$extra_title_text = get_post_meta( $postID, '_manual_extra_title_text_settings', true );
			foreach ( (array) $extra_title_text as $key => $entry ) {
				if ( isset( $entry['title_text_padding'] ) ) {
					$title_text_padding = esc_html( $entry['title_text_padding'] );
				}
				if ( isset( $entry['title_text_line_height'] ) ) {
					$title_text_line_height = esc_html( $entry['title_text_line_height'] );
				}
				if ( isset( $entry['title_text_letter_spacing'] ) ) {
					$title_text_letter_spacing = esc_html( $entry['title_text_letter_spacing'] );
				}
				if ( isset( $entry['title_text_margin'] ) ) {
					$title_text_margin = esc_html( $entry['title_text_margin'] );
				}
			}
			if( get_post_meta( $postID, '_manual_page_tagline_color', true ) ==  '' && get_post_meta( $postID, '_manual_header_image', true ) != '' ) { 
				$h1_customh1_header_color = '#FFFFFF';
			} else { 
				$h1_customh1_header_color = get_post_meta( $postID, '_manual_page_tagline_color', true );
			}
			echo 'h1.custom_h1_head { color:'.$h1_customh1_header_color.'!important; font-size:'.get_post_meta( $postID, '_manual_page_tagline_size', true ).'px!important; font-weight: '.get_post_meta( $postID, '_manual_page_tagline_weight', true ).'!important; text-transform: '.get_post_meta( $postID, '_manual_header_title_text_transform', true ).'!important; line-height:'.$title_text_line_height.'!important; font-family: '.get_post_meta( $postID, '_manual_page_tagline_font_family', true ).'!important; padding:'.$title_text_padding.'; letter-spacing:'.$title_text_letter_spacing.'!important; margin:'.$title_text_margin.'; }';
			
			// Sub title text control
			$subtitle_text_color = $subtitle_text_size = $subtitle_text_weight = $subtitle_font_family = $subtitle_text_transform = $sub_title_text_padding = $sub_title_text_line_height = $sub_title_text_letter_spacing = '';
			$sub_title_text = get_post_meta( $postID, '_manual_subtitle_text_settings', true );
			foreach ( (array) $sub_title_text as $key => $entry ) {
				if ( isset( $entry['title_text_color'] ) ) {
					$subtitle_text_color = esc_html( $entry['title_text_color'] );
				}
				if ( isset( $entry['title_text_size'] ) ) {
					$subtitle_text_size = esc_html( $entry['title_text_size'] );
				}
				if ( isset( $entry['title_text_weight'] ) ) {
					$subtitle_text_weight = esc_html( $entry['title_text_weight'] );
				}
				if ( isset( $entry['subtitle_font_family'] ) ) {
					$subtitle_font_family = esc_html( $entry['subtitle_font_family'] );
				}
				if ( isset( $entry['subtitle_text_transform'] ) ) {
					$subtitle_text_transform = esc_html( $entry['subtitle_text_transform'] );
				}
				if ( isset( $entry['sub_title_text_padding'] ) ) {
					$sub_title_text_padding = esc_html( $entry['sub_title_text_padding'] );
				}
				if ( isset( $entry['sub_title_text_line_height'] ) ) {
					$sub_title_text_line_height = esc_html( $entry['sub_title_text_line_height'] );
				}
				if ( isset( $entry['sub_title_text_letter_spacing'] ) ) {
					$sub_title_text_letter_spacing = esc_html( $entry['sub_title_text_letter_spacing'] );
				}
			}
			if( $subtitle_text_color ==  '' && get_post_meta( $postID, '_manual_header_image', true ) != '' ) { 
				$p_inner_header_color = '#FFFFFF';
			} else { 
				$p_inner_header_color = $subtitle_text_color;
			}
			
			echo 'p.inner-header-color { color:'.$p_inner_header_color.'!important; font-size:'.$subtitle_text_size.'!important; font-weight: '.$subtitle_text_weight.'!important; font-family: '.$subtitle_font_family.'!important; text-transform:'.$subtitle_text_transform.'; padding: '.$sub_title_text_padding.'; line-height:'.$sub_title_text_line_height.'; letter-spacing:'.$sub_title_text_letter_spacing.'!important; }';
			
			// Breadcrumb Control
			$breadcrumb_text_color = $breadcrumb_link_text_color = $breadcrumb_link_text_hover_color = '';
			$breadcrumb_text = get_post_meta( $postID, '_manual_breadcrumb_settings', true );
			foreach ( (array) $breadcrumb_text as $key => $entry ) {
				if ( isset( $entry['text_color'] ) ) {
					$breadcrumb_text_color = esc_html( $entry['text_color'] );
				}
				if ( isset( $entry['link_text_color'] ) ) {
					$breadcrumb_link_text_color = esc_html( $entry['link_text_color'] );
				}
				if ( isset( $entry['link_text_hover_color'] ) ) {
					$breadcrumb_link_text_hover_color = esc_html( $entry['link_text_hover_color'] );
				}
			}
			
			if( $breadcrumb_text_color == '' && get_post_meta( $postID, '_manual_header_image', true ) != '' ) { 
				$breadcrumb_text_color = '#ffffff';
			} else { 
				$breadcrumb_text_color = $breadcrumb_text_color;
			}
			
			if( $breadcrumb_link_text_color == '' && get_post_meta( $postID, '_manual_header_image', true ) != '' ) { 
				$breadcrumb_link_text_color = '#eff1f5';
			} else { 
				$breadcrumb_link_text_color = $breadcrumb_link_text_color;
			}
			
			echo '#breadcrumbs span, #breadcrumbs { color:'.$breadcrumb_text_color.'; } #breadcrumbs a { color:'.$breadcrumb_link_text_color.'; } #breadcrumbs a:hover { color:'.$breadcrumb_link_text_hover_color.'; }' ;
			
			// Trending Search
			$trending_text_color = $trending_link_text_color = $trending_link_text_hover_color = '';
			$trending_search_text = get_post_meta( $postID, '_manual_trending_search_settings', true );
			foreach ( (array) $trending_search_text as $key => $entry ) {
				if ( isset( $entry['text_color'] ) ) {
					$trending_text_color = esc_html( $entry['text_color'] );
				}
				if ( isset( $entry['link_text_color'] ) ) {
					$trending_link_text_color = esc_html( $entry['link_text_color'] );
				}
				if ( isset( $entry['link_text_hover_color'] ) ) {
					$trending_link_text_hover_color = esc_html( $entry['link_text_hover_color'] );
				}
			}
			
			if( $trending_text_color == '' && get_post_meta( $postID, '_manual_header_image', true ) != '' ) { 
				$trending_text_color = '#ffffff';
			} else { 
				$trending_text_color = $trending_text_color;
			}
			
			if( $trending_link_text_color == '' && get_post_meta( $postID, '_manual_header_image', true ) != '' ) { 
				$trending_link_text_color = '#eff1f5';
			} else { 
				$trending_link_text_color = $trending_link_text_color;
			}
			
			echo '.trending-search span.popular-keyword-title { color:'.$trending_text_color.'; } .trending-search a { color:'.$trending_link_text_color.'!important; } .trending-search a:hover { color:'.$trending_link_text_hover_color.'!important; }';
						
		// eof page control
	}
}
?>