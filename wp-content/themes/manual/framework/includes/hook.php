<?php 

/*-----------------------------------------------------------------------------------*/
/*	WPML
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_loaded', 'manual_load_theme_language' );

function manual_load_theme_language()
{
    $lang_dir = get_stylesheet_directory() . '/languages';
    return load_theme_textdomain( 'manual', $lang_dir );
}


/*-----------------------------------------------------------------------------------*/
/*	Enqueue scripts and styles.
/*-----------------------------------------------------------------------------------*/ 
function manual_theme_scripts() {
	global $post, $theme_options, $woocommerce;
	$post_info = get_post_type( $post );
	$post_type_info = $post_info;
	
	// Internet Explorer HTML5 support 
    wp_enqueue_script( 'html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    // Internet Explorer 8 media query support
    wp_enqueue_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '1.4.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'bootstrap', trailingslashit( get_template_directory_uri() ) . 'js/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-custom-timer', trailingslashit( get_template_directory_uri() ) . 'js/timer.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-custom-appear', trailingslashit( get_template_directory_uri() ) . 'js/appear.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-parallax-min', trailingslashit( get_template_directory_uri() ) . 'js/parallax/parallax.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-parallax', trailingslashit( get_template_directory_uri() ) . 'js/parallax/parallax.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-owl', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.carousel.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'isotope', trailingslashit( get_template_directory_uri() ) . 'js/isotope/isotope.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-imagesloaded', trailingslashit( get_template_directory_uri() ) . 'js/imagesloaded.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-advsearch', trailingslashit( get_template_directory_uri() ) . 'js/advsearch.js', array( 'jquery' ), false, true );
	if ( $theme_options['documentation-menu-scroller-status'] == true ) {
	wp_enqueue_script( 'manual-js-mCustomScrollbar', trailingslashit( get_template_directory_uri() ) . 'js/cscrollbar/customscrollbar.js', array( 'jquery' ), false, true );
	}
	
	// doc handler
	wp_register_script('manual-ajax-call-linkurl', trailingslashit( get_template_directory_uri() ) . '/js/handler/functions.js', array('jquery'), true );
	wp_enqueue_script('manual-ajax-call-linkurl');
	wp_register_script('manual-history', trailingslashit( get_template_directory_uri() ) . '/js/handler/jquery.history.js', array('jquery'), true );
	wp_enqueue_script('manual-history');
	wp_enqueue_script( 'manual-docafterloadreqcall', trailingslashit( get_template_directory_uri() ) . 'js/doc/after-load-requestcall.js', array( 'jquery' ), false, true );
	// eof doc
	
	wp_enqueue_script( 'manual-custom-script', trailingslashit( get_template_directory_uri() ) . 'js/theme.js', array( 'jquery' ), false, true );
	
	/*************************
	**** Add dynamic value ***
	**************************/ 
	$manual_theme_js_flip_search_txt = $doc_codecall_after_ajx_load_page = '';
	
	// Sticky Menu
	if ( $theme_options['theme-sticky-menu'] == false ){ 
		$manual_theme_js_sticky_menu = 1; 
	} else { 
		$manual_theme_js_sticky_menu = 2; 
	}
	// Placeholder Search Text
	if( isset($theme_options['global-flip-search-text-paceholder']) ){ 
		$manual_theme_js_flip_search_txt = str_replace("'", "", $theme_options['global-flip-search-text-paceholder']); 
	}
	
	if ( $theme_options['manual-live-search-status'] == true ){ 
		$manual_theme_js_live_search_active = 1;
		$manual_theme_js_live_search_url = manual_site_root_url_process();
	} else {
		$manual_theme_js_live_search_active = 2;
		$manual_theme_js_live_search_url = '';
	}
	// Documentation
	$footer_js_term_slug = get_query_var( 'term' );
	$footer_js_current_term = get_term_by( 'slug', $footer_js_term_slug, 'manualdocumentationcategory' ); 
	if(  isset($footer_js_current_term->taxonomy) == 'manualdocumentationcategory'  ) {
		
		$doc_catpage = 2;
		// cookie search
		if( (int) isset($_COOKIE['manualDocSingleID']) ) { 
			$cooie_search = 1;
		} else {
			$cooie_search = 2;
		}
		
		if ( $theme_options['documentation-menu-scroller-status'] == true ) { 
			$doc_category_page_active = 1;
		} else { 
			$doc_category_page_active = 2; 
		}
		
		if( !empty ( $theme_options['documentation-scroll-after-menu-height-new'] ) ) {
			$scroll_define_height = $theme_options['documentation-scroll-after-menu-height-new'].'px';
		} else {
			$scroll_define_height = '400px';
		}
		
	} else {
		
		$post_info = get_post_type( $post );
		if( $post_info == 'manual_documentation' && !is_search() && $theme_options['documentation-menu-scroller-status'] == true ) {
			$doc_catpage = 2;
			$doc_category_page_active = 1;
			$cooie_search = 1;
		} else {
			$doc_catpage = 2;
			$doc_category_page_active = 2;
			$cooie_search = 2;
		}
		if( !empty ( $theme_options['documentation-scroll-after-menu-height-new'] ) ) {
			$scroll_define_height = $theme_options['documentation-scroll-after-menu-height-new'].'px';
		} else {
			$scroll_define_height = '400px';
		}
	}
	// Documentation - ajax code call after page load
	if(  $theme_options['activate_js_call_after_ajax_page_load'] == false ) $execute_js_code_ajax_callpg = 2;
	else $execute_js_code_ajax_callpg = 1;
	// Knowledgebase
	if( ($post_type_info == 'manual_kb' && is_single() ) && $theme_options['kb-comment-box-on-thumbsdown'] == true ) { 
		if( comments_open($post->ID) == true ) { 
			$kb_display_feedback_form_onclick_thumbsdown = 1;
		} else {
			$kb_display_feedback_form_onclick_thumbsdown = 2;
		}
	} else { 
		$kb_display_feedback_form_onclick_thumbsdown = 2;
	}
	// FAQ
	$footer_js_faq_slug = get_query_var( 'term' );
	$footer_js_faq_current_term = get_term_by( 'slug', $footer_js_faq_slug, 'manualfaqcategory' );
	if(  isset($footer_js_faq_current_term->taxonomy) == 'manualfaqcategory'  ) {
		$faq_js_handler = "var faq_search = location.href.split('#');if ( faq_search[1] != null ){var faq_search_id = faq_search[1];} else {var faq_search_id = '';}";
	} else {
		$faq_js_handler = "var faq_search_id = '';";
	}
	// Code call after ajax page load
	if( !empty( $theme_options['js_code_call_after_ajax_page_load'] ) &&  $theme_options['activate_js_call_after_ajax_page_load'] == true ) {
		$doc_codecall_after_ajx_load_page = $theme_options['js_code_call_after_ajax_page_load'];
	}
	// Footer Extra JS code ADD
	if(!empty($theme_options['manual-editor-js'])){
		$manual_extra_js_code = $theme_options['manual-editor-js'];
	} else {
		$manual_extra_js_code = '';
	}
	
	// Go up icon 
	if( isset($theme_options['go_up_arrow_icon_style']) && $theme_options['go_up_arrow_icon_style'] != '' ) {
		$go_upiconname = $theme_options['go_up_arrow_icon_style'];
	} else {
		$go_upiconname = 'far fa-arrow-alt-circle-up';
	}
	
	// auto scroll
	if( $theme_options['documentation-disable-autoscroll-content-article-title'] == true ) {
		$auto_scroll = 2;
	} else {
		$auto_scroll = 1;
	}
	
	//disable ajax mode
	if( $theme_options['documentation-disable-ajaxload-content'] == true ) {
		$disable_ajax_load = 2;
	} else {
		$disable_ajax_load = 1;
	}
	
	wp_add_inline_script( 'manual-custom-script', 'var sticky_menu = '.esc_js($manual_theme_js_sticky_menu).'; var manual_searchmsg = "'.esc_js($manual_theme_js_flip_search_txt).'"; var doc_disable_ajaxload = '.esc_js($disable_ajax_load).'; var owlCarousel_item = '.esc_js($theme_options['home-help-section-mindisplay-blocks']?$theme_options['home-help-section-mindisplay-blocks']:'4').'; var live_search_active = '.esc_js($manual_theme_js_live_search_active).'; var live_search_url = "'.$manual_theme_js_live_search_url.'"; var doc_ajaxload_autoscroll = '.esc_js($auto_scroll).'; var doc_catpage_hash = '.esc_js($doc_catpage).'; var doc_catpage_active = '.esc_js($doc_category_page_active).'; var doc_cookie_sh = '.esc_js($cooie_search).'; var doc_scroll_menu_define_height = "'.esc_js($scroll_define_height).'"; var execute_js_after_ajax_call_pg_doc = "'. esc_js($execute_js_code_ajax_callpg).'"; var kb_display_feedback_form_onclick_thumbsdown = "'.esc_js($kb_display_feedback_form_onclick_thumbsdown).'"; var go_up_icon = "'.esc_js($go_upiconname).'"; '.sanitize_text_field($faq_js_handler).' '.($doc_codecall_after_ajx_load_page).' '.($manual_extra_js_code).'  ');
	
	/*****************************
	**** Eof Add dynamic value ***
	******************************/  
	
	
	
	// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
	wp_enqueue_script('doc_like_post', trailingslashit( get_template_directory_uri() ).'js/voting-front.js', array('jquery'), '1.0', true );
	wp_localize_script('doc_like_post', 'doc_ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('doc-ajax-nonce')
	));
	
	/*
	* Adds JavaScript to pages with the comment form to support
	* sites with threaded comments (when in use).
	*/
	if ( is_singular() && comments_open() ) {  
			wp_enqueue_script( 'comment-reply' );
	}
		
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'fontawesome', trailingslashit(get_template_directory_uri()) . 'css/font-awesome/css/all.css', array(), '3.3.1' );
	wp_enqueue_style( 'et-line-font', trailingslashit(get_template_directory_uri()) . 'css/et-line-font/style.css', array(), '3.3.1' );
	wp_enqueue_style( 'elegent-font', trailingslashit(get_template_directory_uri()) . 'css/elegent-font/style.css', array(), '3.3.1' );
	wp_enqueue_style( 'manual-style', get_stylesheet_uri() );
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'manual-fonts', manual_fonts_url(), array(), null );
	wp_enqueue_style( 'manual-bootstrap', trailingslashit( get_template_directory_uri() ) . 'css/lib/bootstrap.min.css', array(), '3.3.1' );
	wp_enqueue_style( 'manual-css-owl', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.carousel.css', array(), '' );
	wp_enqueue_style( 'manual-css-owl-theme', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.theme.css', array(), '' );
	wp_enqueue_style( 'manual-effect', trailingslashit( get_template_directory_uri() ) . 'css/hover.css', array(), '' );
	if ( $theme_options['documentation-menu-scroller-status'] == true ) {
	wp_enqueue_style( 'manual-css-mCustomScrollbar', trailingslashit( get_template_directory_uri() ) . 'js/cscrollbar/mcustomscrollbar.css', array(), '' );
	}
	
	if ($woocommerce) {
		wp_enqueue_style("woocommerce", trailingslashit(get_template_directory_uri()) . "css/woocommerce.min.css");
	}
		
}
add_action( 'wp_enqueue_scripts', 'manual_theme_scripts' );



/*-----------------------------------------------------------------------------------*/
/*	Google Font (connected to above hook wp_enqueue_scripts)
/*-----------------------------------------------------------------------------------*/ 
function manual_fonts_url() {
	global $theme_options; 
	$is_plugin_active = manual__plugin_active('ReduxFramework');
	
	$fonts_url = $font_add = '';
	$fonts = $user_define_fonts = array();
	$subsets = 'latin,latin-ext';
	$subset = _x( 'no-subset', 'PT Sans font: add new subset (greek, cyrillic, vietnamese)', 'manual' );

	if ( 'cyrillic' == $subset )
		$subsets .= ',cyrillic,cyrillic-ext';
	elseif ( 'greek' == $subset )
		$subsets .= ',greek,greek-ext';
	elseif ( 'vietnamese' == $subset )
		$subsets .= ',vietnamese';
	
	// Google Dynamic Fonts
	$font_weight_str  = '100,200,300,400,500,600,700,800,900';
	$fonts_array = array('Open Sans:'.$font_weight_str, 'Source Sans Pro:'.$font_weight_str, 'Raleway:'.$font_weight_str, 'Lato:'.$font_weight_str, 'Roboto:'.$font_weight_str, 'Montserrat:'.$font_weight_str );
	$user_define_fonts = array($theme_options['theme-typography-body']['font-family'].':'.$font_weight_str, $theme_options['theme-h1-typography']['font-family'].':'.$font_weight_str, $theme_options['theme-h2-typography']['font-family'].':'.$font_weight_str, $theme_options['theme-h3-typography']['font-family'].':'.$font_weight_str, $theme_options['theme-h4-typography']['font-family'].':'.$font_weight_str, $theme_options['theme-h5-typography']['font-family'].':'.$font_weight_str, $theme_options['theme-h6-typography']['font-family'].':'.$font_weight_str, $theme_options['theme-typography-nav']['font-family'].':'.$font_weight_str );
	if($is_plugin_active == false){
		$process_font_1 = array_unique($fonts_array);
	} else {
		$process_font_1 = array_unique(array_merge($fonts_array, $user_define_fonts));
	}
	$google_fonts_string = implode( '%7C', $process_font_1);
	
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = add_query_arg(array(
						'family' =>  str_replace(' ', '+', $google_fonts_string),
						'subset' => $subsets,
					), '//fonts.googleapis.com/css');

	return $query_args;
}



/*-----------------------------------------------------------------------------------*/
/*	Search Template  (include bbpress on the wp default search)  
/*-----------------------------------------------------------------------------------*/ 
function manual_search_template_chooser($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  
  if ( class_exists( 'bbPress' ) ) {
		if ( bbp_is_search() ) {
			return locate_template('search-forums.php'); 
		}
  } 
  return $template;
}
add_filter('template_include', 'manual_search_template_chooser');



/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: FILTER DOCUMENTATION BY CATEGORY ADMIN
/*-----------------------------------------------------------------------------------*/
function add_manual_documentation_category_filter_to_post_administration()
{
    global $post_type;
    if($post_type == 'manual_documentation')
    {
        $dropdown_args = array(
            'show_option_all'   => 'All Categories',
            'orderby'           => 'NAME',
            'order'             => 'ASC',
            'name'              => 'manualdocumentationcategory_admin_filter',
            'taxonomy'          => 'manualdocumentationcategory'
        );
        //if we have a category already selected, ensure that its value is set to be selected
        if(isset($_GET['manualdocumentationcategory_admin_filter'])) {
            $dropdown_args['selected'] = sanitize_text_field($_GET['manualdocumentationcategory_admin_filter']);
        }
        wp_dropdown_categories($dropdown_args);
    }
}
add_action('restrict_manage_posts','add_manual_documentation_category_filter_to_post_administration');

//restrict the posts by the chosen documentation category
function add_manual_documentation_category_filter_to_posts($query)
{
    global $post_type, $pagenow;
    //if we are currently on the edit screen of the post type listings
    if($pagenow == 'edit.php' && $post_type == 'manual_documentation')
    {
        if(isset($_GET['manualdocumentationcategory_admin_filter']))
        {
            $manualdocumentationcategory_id = sanitize_text_field($_GET['manualdocumentationcategory_admin_filter']);
            
            if($manualdocumentationcategory_id != 0) // 0 == all posts
            {

                $query->query_vars['tax_query'] = array(
                    array(
                        'taxonomy'  => 'manualdocumentationcategory',
                        'field'     => 'ID',
                        'terms'     => array($manualdocumentationcategory_id)
                    )
                );
            }
        }
    }
}
add_action('pre_get_posts','add_manual_documentation_category_filter_to_posts');  



/*-----------------------------------------------------------------------------------*/
/*	Custom Comment Buttom
/*-----------------------------------------------------------------------------------*/ 
function manual_custom_comment_button() {
    echo '<input name="submit" class="btn btn-primary margin-btm-20 blog-btn" type="submit" value="' . esc_html__( 'Post Comment', 'manual' ) . '" />';
}
add_action( 'comment_form', 'manual_custom_comment_button' );




/*-----------------------------------------------------------------------------------*/
/*	DOCUMENTATION AJAX_HOOK YES/NO
/*-----------------------------------------------------------------------------------*/
function manual_doc_admin_columns_yes($columns) {
	$new_columns = array(
					'doc_yes' => esc_html__('Post Like', 'manual'),
					'doc_no' => esc_html__('Post Unlike', 'manual'),
					'doc_stats' => esc_html__('Post Visitors', 'manual'),
				   );
    return array_merge($columns, $new_columns);
}
add_filter('manage_edit-manual_documentation_columns', 'manual_doc_admin_columns_yes');


function manual_show_doc_admin_columns($name) {
		global $post;
		switch ($name) {
		case 'doc_yes':
			$yes = get_post_meta($post->ID, 'votes_count_doc_manual', true);
			if ($yes) {
				echo esc_html($yes) .esc_html__(' like', 'manual');
			} else {
				echo esc_html__('--', 'manual');
			}
			break;
			
		 case 'doc_no':
		 	$no = get_post_meta($post->ID, 'votes_unlike_doc_manual', true);
			if ($no) {
				echo esc_html($no) .esc_html__(' unlike', 'manual');
			} else {
				echo esc_html__('--', 'manual');
			}
			break;
			
		 case 'doc_stats':
		 	echo get_post_meta($post->ID, 'manual_post_visitors', true);
			break;
			
		}
}
add_action('manage_manual_documentation_posts_custom_column', 'manual_show_doc_admin_columns');



/*-----------------------------------------------------------------------------------*/
/*	KNOWLEDGEBASE AJAX_HOOK YES/NO
/*-----------------------------------------------------------------------------------*/
function manual_kb_admin_columns($columns) {
	$new_columns = array(
					'doc_yes' => esc_html__('Post Like', 'manual'),
					'doc_no' => esc_html__('Post Unlike', 'manual'),
					'doc_stats' => esc_html__('Post Visitors', 'manual'),
				   );
    return array_merge($columns, $new_columns);
}
add_filter('manage_edit-manual_kb_columns', 'manual_kb_admin_columns');


function manual_show_kb_admin_columns($name) {
		global $post;
		switch ($name) {
		case 'doc_yes':
			$yes = get_post_meta($post->ID, 'votes_count_doc_manual', true);
			if ($yes) {
				echo esc_html($yes) .esc_html__(' like', 'manual');
			} else {
				echo esc_html__('--', 'manual');
			}
			break;
			
		 case 'doc_no':
		 	$no = get_post_meta($post->ID, 'votes_unlike_doc_manual', true);
			if ($no) {
				echo esc_html($no) .esc_html__(' unlike', 'manual');
			} else {
				echo esc_html__('--', 'manual');
			}
			break;
			
		 case 'doc_stats':
		 	echo get_post_meta($post->ID, 'manual_post_visitors', true);
			break;
			
		}
}
add_action('manage_manual_kb_posts_custom_column', 'manual_show_kb_admin_columns');


/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO AJAX_HOOK YES/NO
/*-----------------------------------------------------------------------------------*/
function manual_portfolio_admin_columns($columns) {
	$new_columns = array(
					'doc_yes' => esc_html__('Post Like', 'manual'),
					'doc_no' => esc_html__('Post Unlike', 'manual'),
					'doc_stats' => esc_html__('Post Visitors', 'manual'),
				   );
    return array_merge($columns, $new_columns);
}
add_filter('manage_edit-manual_portfolio_columns', 'manual_portfolio_admin_columns');


function manual_show_portfolio_admin_columns($name) {
		global $post;
		switch ($name) {
		case 'doc_yes':
			$yes = get_post_meta($post->ID, 'votes_count_doc_manual', true);
			if ($yes) {
				echo esc_html($yes) .esc_html__(' like', 'manual');
			} else {
				echo esc_html__('--', 'manual');
			}
			break;
			
		 case 'doc_no':
		 	$no = get_post_meta($post->ID, 'votes_unlike_doc_manual', true);
			if ($no) {
				echo esc_html($no) .esc_html__(' unlike', 'manual');
			} else {
				echo esc_html__('--', 'manual');
			}
			break;
			
		 case 'doc_stats':
		 	echo get_post_meta($post->ID, 'manual_post_visitors', true);
			break;
			
		}
}
add_action('manage_manual_portfolio_posts_custom_column', 'manual_show_portfolio_admin_columns');


/*-----------------------------------------------------------------------------------*/
/*	IMPRESSION (GLOBAL)
/*-----------------------------------------------------------------------------------*/
function manual_doc_post_visitors()
{  
	// Check for nonce security
    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
	 if(isset($_POST['post_id'])) { echo esc_html($_POST['post_id']);
		$post_id = $_POST['post_id'];
		$meta_visitors = get_post_meta($post_id, "manual_post_visitors", true);
		update_post_meta($post_id, "manual_post_visitors", ++$meta_visitors);
	}
	 exit;
}
add_action('wp_ajax_nopriv_manual-doc-impression', 'manual_doc_post_visitors');
add_action('wp_ajax_manual-doc-impression', 'manual_doc_post_visitors');



/*-----------------------------------------------------------------------------------*/
/*	VOTING (GLOBAL)  :: LIKE, UNLIKE, RESET (support function on the function.php)
/*-----------------------------------------------------------------------------------*/

function manual_doc_post_like() {	
	global $theme_options;
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = getenv('REMOTE_ADDR');
        $post_id = esc_attr($_POST['post_id']);
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
		if (!empty($meta_IP)) {
			$voted_IP = $meta_IP[0];
		} else {
			$voted_IP = '';
		}
 
        if(!is_array($voted_IP))
            $voted_IP = array();
			// Get votes count for the current post
			$meta_count = get_post_meta($post_id, "votes_count_doc_manual", true);
 
        // User has already voted ?
        if(!manual_hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count_doc_manual", ++$meta_count);
            // Display count (ie jQuery return value)
            echo esc_html($meta_count).' '.$theme_options['yes-user-input-text'];
        } else {
             echo esc_html($theme_options['already-voted']); //"already voted";
		}
    }
    exit;
}
add_action('wp_ajax_nopriv_post-like', 'manual_doc_post_like');
add_action('wp_ajax_post-like', 'manual_doc_post_like');


function manual_doc_post_unlike()
{
	global $theme_options;
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = getenv('REMOTE_ADDR');
        $post_id = esc_attr($_POST['post_id']);
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
		if (!empty($meta_IP)) {
			$voted_IP = $meta_IP[0];
		} else {
			$voted_IP = '';
		}
 
        if(!is_array($voted_IP))
            $voted_IP = array();
			// Get votes count for the current post
			$meta_count = get_post_meta($post_id, "votes_unlike_doc_manual", true);
 
        // Use has already voted ?
        if(!manual_hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_unlike_doc_manual", ++$meta_count);
            // Display count (ie jQuery return value)
            echo esc_html($meta_count).' '.$theme_options['no-user-input-text'];
        }
        else {
            echo esc_html($theme_options['already-voted']); //"already voted";
		}
    }
    exit;
}
add_action('wp_ajax_nopriv_post-unlike', 'manual_doc_post_unlike');
add_action('wp_ajax_post-unlike', 'manual_doc_post_unlike');


function manual_stats_reset() {
	
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_reset'])) { 
		$post_id = $_POST['post_id'];  
		update_post_meta($post_id, "voted_IP", '');
		update_post_meta($post_id, "votes_count_doc_manual", '');
		update_post_meta($post_id, "votes_unlike_doc_manual", '');
		update_post_meta($post_id, "manual_post_visitors", '');
	}
	exit;
}
add_action('wp_ajax_nopriv_post-reset-stats', 'manual_stats_reset');
add_action('wp_ajax_post-reset-stats', 'manual_stats_reset');



/*-----------------------------------------------------------------------------------*/
/*	DOCUMENTATION & FAQ REDIRECT FROM SINGLE PAGE
/*-----------------------------------------------------------------------------------*/
function manual_doc_redirect_post() {
  global $post, $theme_options;
  $queried_post_type = get_query_var('post_type');
  $term_slug = get_query_var( 'term' );
  
  // DOCUMENTATION
  $current_term = get_term_by( 'slug', $term_slug, 'manualdocumentationcategory' );
  if ( is_single() && 'manual_documentation' ==  $queried_post_type ) {
	 // current post ID
	 $postID = get_the_ID();
	 // Post category ID
	 $terms = get_the_terms( $postID , 'manualdocumentationcategory' );
	 if( !empty($terms) ) { 
		 $term = array_pop($terms);
		 $catID = $term->term_taxonomy_id;
	 } else {
		 esc_html_e( 'Please assign category for your Documentation RECORD', 'manual' );
		 exit;
	 }
  } else if(  isset($current_term->taxonomy) == 'manualdocumentationcategory'  ) {
	 setcookie("manualDocSingleID", '', time() - 3600, '/'); 
  }
  
  // FAQ
  if ( $theme_options['faq-hash-search-status'] == true ){
	  $current_term_faq = get_term_by( 'slug', $term_slug, 'manualfaqcategory' );
	  if ( is_single() && 'manual_faq' ==  $queried_post_type ) {
		 // current post ID
		 $postID = get_the_ID();
		 // Post category ID
		 $terms = get_the_terms( $postID , 'manualfaqcategory' );
		 if( !empty($terms) ) { 
			 $term = array_pop($terms);
			 $catID = $term->term_taxonomy_id;
			 // Generate Cat link
			 $category_link = esc_url( get_term_link($catID, 'manualfaqcategory') ).'#'.$postID;
			 wp_redirect( $category_link, 301 );
			 exit;
		 } else {
			 esc_html_e( 'Please assign category for your FAQ RECORD', 'manual' );
			 exit;
		 }
	  } else if(  isset($current_term_faq->taxonomy) == 'manualfaqcategory'  ) {
		 setcookie("manualFaqSingleID", '', time() - 3600, '/'); 
	  }
  }
  
  
}
add_action( 'template_redirect', 'manual_doc_redirect_post' );


/*-----------------------------------------------------------------------------------*/
/*	HEAD GLOBAL
/*-----------------------------------------------------------------------------------*/
function manual_header() {
    global $theme_options;
	if(!empty($theme_options['manual-favicon']['url'])){ 
     echo '<link href="'.$theme_options['manual-favicon']['url'].'" rel="shortcut icon">';
	}
}
add_action( 'wp_head', 'manual_header' );


/*-----------------------------------------------------------------------------------*/
/*	 Plugin Activation
/*-----------------------------------------------------------------------------------*/
require_once trailingslashit( get_template_directory() ) . 'framework/tgm/tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'manual_theme_register_required_plugins' );
function manual_theme_register_required_plugins() {
	$theme_url = trailingslashit( get_template_directory() );
	$plugins = array(
	
		// Redux Framework
		array(
			'name'         => 'Redux Framework', // The plugin name.
			'slug'         => 'redux-framework', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
		// CMB2
		array(
			'name'         => 'CMB2',
			'slug'         => 'cmb2', 
			'required'     => true, 
		),
		// bbPress
		array(
			'name'         => 'bbPress', 
			'slug'         => 'bbpress', 
			'required'     => false, 
		),
		// Contact Form 7
		array(
			'name'         => 'Contact Form 7', 
			'slug'         => 'contact-form-7', 
			'required'     => false, 
		),
		// Print
		array(
			'name'         => 'Print-O-Matic', 
			'slug'         => 'print-o-matic', 
			'required'     => true, 
		),
		// Category Order and Taxonomy Terms Order
		array(
			'name'         => 'Taxonomy Terms Order', 
			'slug'         => 'taxonomy-terms-order', 
			'required'     => false, 
		),
		// WPCustom Category Image
		array(
			'name'         => 'WPCustom Category Image', 
			'slug'         => 'wpcustom-category-image', 
			'required'     => false, 
			'source'       => $theme_url.'install/wpcustom-category-image.zip', 
			'external_url' => $theme_url.'install/wpcustom-category-image.zip', 
		),
		// One Click Demo Import
		array(
			'name'         => 'One Click Demo Import', 
			'slug'         => 'one-click-demo-import', 
			'required'     => true, 
		),
		// WooCommerce
		array(
			'name'         => 'WooCommerce', 
			'slug'         => 'woocommerce', 
			'required'     => false, 
		),
		// Manual Framework
		array(
			'name'         => 'Manual Framework',
			'slug'         => 'manual-framework', 
			'source'       => $theme_url.'install/manual-framework.zip', 
			'required'     => true, 
			'external_url' => $theme_url.'install/manual-framework.zip', 
		),
		// VC
		array(
			'name'         => 'Visual Composer', 
			'slug'         => 'js_composer', 
			'source'       => $theme_url.'install/js_composer.zip', 
			'required'     => true, 
			'external_url' => $theme_url.'install/js_composer.zip', 
		),
		// Slider Revolution
		array(
			'name'         => 'Slider Revolution',
			'slug'         => 'revslider',
			'source'       => $theme_url.'install/revslider.zip', 
			'required'     => false, 
			'external_url' => $theme_url.'install/revslider.zip', 
		),
		// Ultimate_VC_Addons
		array(
			'name'         => 'Ultimate Addons for WPBakery Page Builder', // The plugin name.
			'slug'         => 'Ultimate_VC_Addons', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/Ultimate_VC_Addons.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/Ultimate_VC_Addons.zip', // If set, overrides default API URL and points to an external URL.
		),
		
	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}

/**
 * @param array $action_links The action link(s) for a required plugin.
 * @return array The action link(s) for a required plugin.
 */
function manual__edit_tgmpa_notice_action_links( $action_links ) {
		
		$current_screen = get_current_screen();
		
		if ( 'manual_page_manual-admin-plugins' == $current_screen->id ) {
			$link_template = '<a id="manage-plugins" class="button-primary" style="margin-top:1em;" href="#manual-theme-install-plugins">' . esc_attr__( 'Manage Plugins Below', 'manual' ) . '</a>';
			$action_links  = array(
				'install' => $link_template,
			);
		} else {
			$link_template = '<a id="manage-plugins" class="button-primary" style="margin-top:1em;" href="' . esc_url( self_admin_url( 'admin.php?page=manual-admin-plugins' ) ) . '#manual-theme-install-plugins">' . esc_attr__( 'Go Manage Plugins', 'manual' ) . '</a>';
			$action_links  = array(
				'install' => $link_template,
			);
		}
		
		return $action_links;
}
	
$is_plugin_required_fortheme_active = manual__chkfunction_plugin_active('manual_framework_plugin_active');
if ( $is_plugin_required_fortheme_active == true ) {	
	add_filter( 'tgmpa_notice_action_links', 'manual__edit_tgmpa_notice_action_links' );
}



/*-----------------------------------------------------------------------------------*/
/*	WOO - ADDON HOOKS
/*-----------------------------------------------------------------------------------*/ 
add_action("init", function () {
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_change_loop_title_tag');
});

// add a new fonction to the hook
add_action("woocommerce_shop_loop_item_title", function () {
    echo '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
});


/*-----------------------------------------------------------------------------------*/
/*	Remove Links from Admin Bar
/*-----------------------------------------------------------------------------------*/
function manual_remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('Manual');
}
add_action( 'wp_before_admin_bar_render', 'manual_remove_admin_bar_links' );


/*-----------------------------------------------------------------------------------*/
/*	ReduxFrameworkPlugin MODIFY
/*-----------------------------------------------------------------------------------*/ 
function manual_admin_custom_style() {
  wp_enqueue_style('manual-admin-styles', trailingslashit(get_template_directory_uri()) . 'css/admin.css', array(), '' );
}
add_action('admin_enqueue_scripts', 'manual_admin_custom_style');
/** REMOVE REDUX MESSAGES */
function manual_remove_redux_messages() {
	if(class_exists('ReduxFramework')){
		remove_action( 'admin_notices', array( get_redux_instance('redux_demo'), '_admin_notices' ), 99);
	}
}
add_action('init', 'manual_remove_redux_messages');


/*******************************
 ***  VISUAL COMPOSER     ****
********************************/

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: LOAD VC INSIDE DOCUMENTATION PAGES
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_nopriv_display-doc-post', 'enable_vc_custom', 1);
add_action('wp_ajax_display-doc-post', 'enable_vc_custom', 1);
function enable_vc_custom(){
	global $theme_options;
	if( $theme_options['activate-vc-inside-ajax-load-page-doc'] == true ) WPBMap::addAllMappedShortcodes();
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: FIX POST COUNT
/*-----------------------------------------------------------------------------------*/
function manual_fix_postcount( $query ) {
  if (!is_admin() && $query->is_main_query() ){
	  if( $query->is_archive('manual_kb') && manual__plugin_active('woocommerce') == false ) {
		   if( isset($query->queried_object->taxonomy) && $query->queried_object->taxonomy == 'manualknowledgebasecat' ) { 
		   $query->set('posts_per_page', 1); } else {}
	  } else if(  $query->is_archive('manual_kb') && (manual__plugin_active('woocommerce') == true  && !is_woocommerce())) {
		   if( isset($query->queried_object->taxonomy) && $query->queried_object->taxonomy == 'manualknowledgebasecat' ) { 
		   $query->set('posts_per_page', 1); } else {}
	  } else {
		  
	  }
  }
}
add_action( 'pre_get_posts', 'manual_fix_postcount' );
?>