<?php 
/*----------------------------*/
/*	MANUAL CUSTOMIZE :: LOGO
/*----------------------------*/
if (!function_exists('manual__logo_customize_settings')) {
	function manual__logo_customize_settings() {
		global $theme_options;
		
		// Normal Logo
		$logo_readjust = $logo_readjust_top_margin = $logo_readjust_responsive = $logo_readjust_top_margin_responsive = $logo_readjust_sticky = $logo_readjust_sticky_margin = '';
		if( isset($theme_options['theme-logo-readjust-height']['height']) && $theme_options['theme-logo-readjust-height']['height'] != '' && $theme_options['theme-logo-readjust-height']['height'] != 'px' ) {
			$logo_readjust = 'height:'.esc_attr($theme_options['theme-logo-readjust-height']['height']).'!important;';
		}
		if( isset($theme_options['theme-logo-readjust-margin-top']['height']) &&  $theme_options['theme-logo-readjust-margin-top']['height'] != '' &&  $theme_options['theme-logo-readjust-margin-top']['height'] != 'px' ) { 
			$logo_readjust_top_margin = 'margin-top:'.esc_attr($theme_options['theme-logo-readjust-margin-top']['height']).';';
		}
		// Responsive Logo
		if( isset($theme_options['theme-logo-readjust-height-responsive']['height']) && $theme_options['theme-logo-readjust-height-responsive']['height'] != '' && $theme_options['theme-logo-readjust-height-responsive']['height'] != 'px' ) { 
			$logo_readjust_responsive = 'height:'.esc_attr($theme_options['theme-logo-readjust-height-responsive']['height']).'!important;';
		}
		if( isset($theme_options['theme-logo-readjust-margin-top-responsive']['height']) && $theme_options['theme-logo-readjust-margin-top-responsive']['height'] != '' && $theme_options['theme-logo-readjust-margin-top-responsive']['height'] != 'px' ) { 
			$logo_readjust_top_margin_responsive = 'margin-top:'.esc_attr($theme_options['theme-logo-readjust-margin-top-responsive']['height']).';';
		}
		// Sticky Menu
		if( isset($theme_options['theme-logo-readjust-sticky-height']['height']) && $theme_options['theme-logo-readjust-sticky-height']['height'] != '' && $theme_options['theme-logo-readjust-sticky-height']['height'] != 'px' ) { 
			$logo_readjust_sticky = 'height: '.esc_attr($theme_options['theme-logo-readjust-sticky-height']['height']).'!important;'; 
		}
		if( isset($theme_options['theme-logo-readjust-sticky-margin-top']['height']) && $theme_options['theme-logo-readjust-sticky-margin-top']['height'] != '' && $theme_options['theme-logo-readjust-sticky-margin-top']['height'] != 'px' ) { 
			$logo_readjust_sticky_margin = 'margin-top: '.esc_attr($theme_options['theme-logo-readjust-sticky-margin-top']['height']).';'; 
		}
		
		echo '.custom-nav-logo { '.$logo_readjust.' '.$logo_readjust_top_margin.'  } @media (max-width: 767px) { .custom-nav-logo {  '.$logo_readjust_responsive.'  '.$logo_readjust_top_margin_responsive.' }  } ';
		// Sticky menu login user design fix
		if( is_user_logged_in() == true ) { echo 'body.home nav.navbar.after-scroll-wrap, nav.navbar.after-scroll-wrap { margin-top: 32px; }'; }
		echo 'nav.navbar.after-scroll-wrap .custom-nav-logo { '.$logo_readjust_sticky.' '.$logo_readjust_sticky_margin.' }';
		
	}
}



/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: TYPOGRAPHY (body, h1, h2, h3, h4, h5, h6)
/*-----------------------------------------------------------------*/
if (!function_exists('manual__typography_customize_settings')) {
	function manual__typography_customize_settings() {
		global $theme_options;
		
		// Body
		if( $theme_options['theme-typography-body']['font-family'] != '' ) {
			
			if( $theme_options['theme-typography-body']['font-family'] == 'Open Sans' && 
			    $theme_options['theme-typography-body']['line-height'] == '1.4px' ) {
				$body_lineheight = '1.7px';
			} else {
				$body_lineheight = $theme_options['theme-typography-body']['line-height'];
			}
			
		echo 'body { color: '.esc_attr($theme_options['theme-typography-body']['color']).'; font-family:'.esc_attr(((isset($theme_options['custom-body-font']) && $theme_options['custom-body-font'] != '' )?$theme_options['custom-body-font']:$theme_options['theme-typography-body']['font-family'])).'!important;font-size: '.esc_attr($theme_options['theme-typography-body']['font-size']). ($theme_options['theme-typography-body']['font-size'] == '14'?'px':'') .';line-height: '. preg_replace( '/px/', '', esc_attr($body_lineheight) ).';letter-spacing: '.esc_attr($theme_options['theme-typography-body']['letter-spacing']).($theme_options['theme-typography-body']['letter-spacing']=='0.3'?'px':'').'; font-weight: '.esc_attr((isset($theme_options['theme-typography-body']['font-weight']) && $theme_options['theme-typography-body']['font-weight'] != "")?$theme_options['theme-typography-body']['font-weight']:'400').' }';
		}
		// H1
		if( $theme_options['theme-h1-typography']['font-family'] != '' ) { 
			if( isset($theme_options['theme-h1-typography']['font-weight']) && 
				$theme_options['theme-h1-typography']['font-weight'] != ''  ) {
				$h1_weight = esc_attr($theme_options['theme-h1-typography']['font-weight']);	
			} else {
				$h1_weight = esc_attr($theme_options['theme-h1-typography']['font-style']);
			}
			echo 'h1 {  font-family: '.esc_attr(((isset($theme_options['custom-h1-font']) && $theme_options['custom-h1-font'] != "")?$theme_options['custom-h1-font']:$theme_options['theme-h1-typography']['font-family'])).'; font-weight:'.esc_attr($h1_weight).'; font-size:'.esc_attr($theme_options['theme-h1-typography']['font-size']).( ($theme_options['theme-h1-typography']['font-size'] == '36')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h1-typography']['line-height']).( ($theme_options['theme-h1-typography']['line-height'] == '20' || $theme_options['theme-h1-typography']['line-height'] == '40')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h1-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h1-typography']['letter-spacing']).( ($theme_options['theme-h1-typography']['letter-spacing'] == '0.2')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h1-typography']['color']).'; }';				
		}
		// H2
		if( $theme_options['theme-h2-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h2-typography']['font-weight']) && 
				$theme_options['theme-h2-typography']['font-weight'] != ''  ) {
				$h2_weight = esc_attr($theme_options['theme-h2-typography']['font-weight']);	
			} else {
				$h2_weight = esc_attr($theme_options['theme-h2-typography']['font-style']);
			}
			echo 'h2 {  font-family: '.esc_attr(((isset($theme_options['custom-h2-font']) && $theme_options['custom-h2-font'] != '')?$theme_options['custom-h2-font']:$theme_options['theme-h2-typography']['font-family'])).'; font-weight:'.esc_attr($h2_weight).'; font-size:'.esc_attr($theme_options['theme-h2-typography']['font-size']).( ($theme_options['theme-h2-typography']['font-size'] == '31')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h2-typography']['line-height']).(($theme_options['theme-h2-typography']['line-height'] == '30' || $theme_options['theme-h2-typography']['line-height'] == '35')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h2-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h2-typography']['letter-spacing']).( ($theme_options['theme-h2-typography']['letter-spacing'] == '0.2')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h2-typography']['color']).'; }';				
		}
		// H3
		if( $theme_options['theme-h3-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h3-typography']['font-weight']) && 
				$theme_options['theme-h3-typography']['font-weight'] != ''  ) {
				$h3_weight = esc_attr($theme_options['theme-h3-typography']['font-weight']);	
			} else {
				$h3_weight = esc_attr($theme_options['theme-h3-typography']['font-style']);
			}
			echo 'h3 {  font-family: '.esc_attr(((isset($theme_options['custom-h3-font']) && $theme_options['custom-h3-font'] != '')?$theme_options['custom-h3-font']:$theme_options['theme-h3-typography']['font-family'])).'; font-weight:'.esc_attr($h3_weight).'; font-size:'.esc_attr($theme_options['theme-h3-typography']['font-size']).( ($theme_options['theme-h3-typography']['font-size'] == '26')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h3-typography']['line-height']).(($theme_options['theme-h3-typography']['line-height'] == '20' || $theme_options['theme-h3-typography']['line-height'] == '34')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h3-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h3-typography']['letter-spacing']).( ($theme_options['theme-h3-typography']['letter-spacing'] == '0.2')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h3-typography']['color']).'; }';
		}
		// H4
		if( $theme_options['theme-h4-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h4-typography']['font-weight']) && 
				$theme_options['theme-h4-typography']['font-weight'] != ''  ) {
				$h4_weight = esc_attr($theme_options['theme-h4-typography']['font-weight']);	
			} else {
				$h4_weight = esc_attr($theme_options['theme-h4-typography']['font-style']);
			}
			echo 'h4 {  font-family: '.esc_attr(((isset($theme_options['custom-h4-font']) && $theme_options['custom-h4-font'] != '')?$theme_options['custom-h4-font']:$theme_options['theme-h4-typography']['font-family'])).'; font-weight:'.esc_attr($h4_weight).'; font-size:'.esc_attr($theme_options['theme-h4-typography']['font-size']).( ($theme_options['theme-h4-typography']['font-size'] == '21')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h4-typography']['line-height']).(($theme_options['theme-h4-typography']['line-height'] == '20' || $theme_options['theme-h4-typography']['line-height'] == '24')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h4-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h4-typography']['letter-spacing']).( ($theme_options['theme-h4-typography']['letter-spacing'] == '0.2')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h4-typography']['color']).'; }';
		}
		// H5
		if( $theme_options['theme-h5-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h5-typography']['font-weight']) && 
				$theme_options['theme-h5-typography']['font-weight'] != ''  ) {
				$h5_weight = esc_attr($theme_options['theme-h5-typography']['font-weight']);	
			} else {
				$h5_weight = esc_attr($theme_options['theme-h5-typography']['font-style']);
			}
			echo 'h5 {  font-family: '.esc_attr(((isset($theme_options['custom-h5-font']) && $theme_options['custom-h5-font'] != '')?$theme_options['custom-h5-font']:$theme_options['theme-h5-typography']['font-family'])).'; font-weight:'.esc_attr($h5_weight).'; font-size:'.esc_attr($theme_options['theme-h5-typography']['font-size']).( ($theme_options['theme-h5-typography']['font-size'] == '16')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h5-typography']['line-height']).(($theme_options['theme-h5-typography']['line-height'] == '20')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h5-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h5-typography']['letter-spacing']).( ($theme_options['theme-h5-typography']['letter-spacing'] == '0.5')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h5-typography']['color']).'; }';
		}
		// H6
		if( $theme_options['theme-h6-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h6-typography']['font-weight']) && 
				$theme_options['theme-h6-typography']['font-weight'] != ''  ) {
				$h6_weight = esc_attr($theme_options['theme-h6-typography']['font-weight']);	
			} else {
				$h6_weight = esc_attr($theme_options['theme-h6-typography']['font-style']);
			}
			echo 'h6 {  font-family: '.esc_attr(((isset($theme_options['custom-h6-font']) && $theme_options['custom-h6-font'] != '')?$theme_options['custom-h6-font']:$theme_options['theme-h6-typography']['font-family'])).'; font-weight:'.esc_attr($h6_weight).'; font-size:'.esc_attr($theme_options['theme-h6-typography']['font-size']).( ($theme_options['theme-h6-typography']['font-size'] == '14')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h6-typography']['line-height']).(($theme_options['theme-h6-typography']['line-height'] == '20')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h6-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h6-typography']['letter-spacing']).( ($theme_options['theme-h6-typography']['letter-spacing'] == '0.2')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h6-typography']['color']).'; }';
		}
		
	}
}


/*-------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - GENERAL
/*-------------------------------------------------*/
if (!function_exists('manual__cs_general_customize_settings')) {
	function manual__cs_general_customize_settings() {
		global $theme_options;
		
		// Website color
		echo '.browse-help-desk .browse-help-desk-div .i-fa:hover, ul.news-list li.cat-lists:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, #list-manual li a.has-child.dataicon:before, #list-manual li a.has-inner-child.dataicon:before, .manual_related_articles h5:before, .manual_attached_section h5:before, .tagcloud.singlepgtag span i, form.searchform i.livesearch, span.required, .woocommerce .star-rating, .woocommerce-page .star-rating, .kb_tree_viewmenu ul li.root_cat a.kb-tree-recdisplay:before, .kb_tree_viewmenu ul li.root_cat_child a.kb-tree-recdisplay:before, #bbpress-forums .bbp-forum-title-container a:before, .body-content .collapsible-panels h4:before, .body-content .collapsible-panels h5:before, .portfolio-next-prv-bar .hvr-icon-back, .portfolio-next-prv-bar .hvr-icon-forward, .body-content .blog:before, #bbpress-forums .bbp-forum-title-container a:after, ul li.kb_tree_title a:hover:before, #list-manual li a.has-inner-child.dataicon i:before, #list-manual li a.has-child.dataicon i:before, #list-manual li a.doc-active.has-child i:before, #list-manual li a.doc-active.has-inner-child i:before, span.inlinedoc-postlink.inner:hover {color:'.esc_attr($theme_options['website_colour']['regular']).'; } .social-share-box:hover { background:'.esc_attr($theme_options['website_colour']['regular']).'; border: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .manual_login_page { border-top: 4px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { background-color: '.esc_attr($theme_options['website_colour']['regular']).'; border-color: '.esc_attr($theme_options['website_colour']['regular']).'; } .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover{ color: #ffffff; } blockquote { border-left: 5px solid '.esc_attr($theme_options['website_colour']['regular']).'; } form.bbp-login-form, .bbp-logged-in { border-top: 4px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .woocommerce .quantity .minus:hover, .woocommerce #content .quantity .minus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page #content .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce #content .quantity .plus:hover, .woocommerce-page .quantity .plus:hover, .woocommerce-page #content .quantity .plus:hover { background-color:'.esc_attr($theme_options['website_colour']['regular']).'; } .woocommerce div.product .woocommerce-tabs ul.tabs li.active { border-top: 4px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .woocommerce p.stars a, .woocommerce p.stars a:hover { color:'.esc_attr($theme_options['website_colour']['regular']).'!important;  } .sidebar-widget.widget_product_categories ul li.current-cat>a { border-left-color: '.esc_attr($theme_options['website_colour']['regular']).'; }.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle { background-color: '.esc_attr($theme_options['website_colour']['regular']).'; } .pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover { background-color: '.esc_attr($theme_options['website_colour']['regular']).'; border-color:'.esc_attr($theme_options['website_colour']['regular']).'; color:#ffffff; } #bbpress-forums .bbp-forums .status-category .bbp-forum-header, #bbpress-forums .bbp-forums > .bbp-forum-header { border-top: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .sidebar-widget.widget_product_categories ul li a:hover { border-left: 5px solid '.esc_attr($theme_options['website_colour']['regular']).'; } a.post-page-numbers.current { color:'.esc_attr($theme_options['website_colour']['regular']).'; background:#ffffff; border: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .inlinedocs-sidebar ul.nav li ul { border-left: 1px dashed '.esc_attr($theme_options['website_colour']['regular']).'; }';
		// Standard a tag + hover color 
		echo 'a, a:visited, a:focus, .body-content .knowledgebase-cat-body h4 a, .body-content .knowledgebase-body h5:before, .body-content .knowledgebase-body h5 a, .body-content .knowledgebase-body h6 a, .body-content .knowledgebase-body h4 a, .body-content .knowledgebase-body h3 a, #bbpress-forums .bbp-reply-author .bbp-author-name, #bbpress-forums .bbp-topic-freshness > a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a, #bbpress-forums .last-posted-topic-title a, #bbpress-forums .bbp-forum-link, #bbpress-forums .bbp-forum-header .bbp-forum-title, .body-content .blog .caption h2 a, a.href, .body-content .collapsible-panels p.post-edit-link a, .tagcloud.singlepg a, h4.title-faq-cat a, .portfolio-next-prv-bar .portfolio-prev a, .portfolio-next-prv-bar .portfolio-next a, .search h4 a, .portfolio-filter ul li span, ul.news-list.doc-landing li a, .kb-box-single a, .portfolio-desc a, .woocommerce ul.products li.product a, .kb_tree_viewmenu ul li a, #bbpress-forums .bbp-admin-links a, .woocommerce div.product div.product_meta>span span, .woocommerce div.product div.product_meta>span a, td.product-name a, .body-content .blog-author h5.author-title a, .entry-content .inlinedocs-sidebar a { color:'.esc_attr($theme_options['manual-global-link-color']['regular']).'; }  
		a:hover, .body-content .knowledgebase-cat-body h4 a:hover, .body-content .knowledgebase-body h6:hover:before, .body-content .knowledgebase-body h5:hover:before, .body-content .knowledgebase-body h4:hover:before, .body-content .knowledgebase-body h3:hover:before, .body-content .knowledgebase-body h6 a:hover, .body-content .knowledgebase-body h5 a:hover, .body-content .knowledgebase-body h4 a:hover, .body-content .knowledgebase-body h3 a:hover, #bbpress-forums .bbp-reply-author .bbp-author-name:hover, #bbpress-forums .bbp-topic-freshness > a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums .last-posted-topic-title a:hover, #bbpress-forums .bbp-forum-link:hover, #bbpress-forums .bbp-forum-header .bbp-forum-title:hover, .body-content .blog .caption h2 a:hover, .body-content .blog .caption span:hover, .body-content .blog .caption p a:hover, .sidebar-nav ul li a:hover, .tagcloud a:hover , a.href:hover, .body-content .collapsible-panels p.post-edit-link a:hover, .tagcloud.singlepg a:hover, .body-content li.cat a:hover, h4.title-faq-cat a:hover, .portfolio-next-prv-bar .portfolio-prev a:hover, .portfolio-next-prv-bar .portfolio-next a:hover, .search h4 a:hover, .portfolio-filter ul li span:hover, ul.news-list.doc-landing li a:hover, .news-list li:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, .kb_article_type li.articles:hover:before, .kb-box-single a:hover, .portfolio-desc a:hover, .woocommerce ul.products li.product a:hover, .kb_tree_viewmenu h6 a:hover, .kb_tree_viewmenu h6 a:hover:before, .kb_tree_viewmenu h5 a:hover, .kb_tree_viewmenu h5 a:hover:before,  .kb_tree_viewmenu ul li a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title:hover:before, #bbpress-forums .bbp-admin-links a:hover, .widget_display_topics li:hover:before, .woocommerce div.product div.product_meta>span span:hover, .woocommerce div.product div.product_meta>span a:hover, #breadcrumbs a:hover, .body-content li.cat.inner a:hover:before, .vc_kb_article_type li.articles a:hover:before, .footer-go-uplink:hover, a.post-edit-link:hover, .body-content .collapsible-panels h4:hover:before, .body-content .collapsible-panels h5:hover:before, td.product-name a:hover, ul.vc_kbcat_widget li:hover:before, .sidebar-widget .display-faq-section li.cat-item a:hover:before, .body-content .display-faq-section ul li.cat-item.current-cat a:before { color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'; } .trending-search a:hover, li.current-singlepg-active a, li.current-singlepg-active a:before, .kb_article_type li.articles a:hover:before, .sidebar-widget .display-faq-section li.cat-item:hover:before, ul.manual-searchresults li.live_search_attachment_icon a:hover:before, ul.manual-searchresults li.live_search_portfolio_icon a:hover:before, ul.manual-searchresults li.live_search_forum_icon a:hover:before, .body-content .blog-author h5.author-title a:hover { color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'!important; }'; 
		// Standard a tag + hover color (inside post)
		echo '.entry-content a, .manual_attached_section a{ color:'.esc_attr($theme_options['standard_a_tag_link_color_inside_post']['regular']).'; }.entry-content a:hover, .manual_attached_section a:hover{ color:'.esc_attr($theme_options['standard_a_tag_link_color_inside_post']['hover']).'; }';
		// Custom Text :: Link Color
		echo '.custom-link, .more-link, .load_more a, a.custom-link-blog, a.custom-link i {color:'.esc_attr($theme_options['text_link_color']['regular']).'!important;}.custom-link:hover, .more-link:hover, .load_more a:hover, a.custom-link-blog:hover { color:'.esc_attr($theme_options['text_link_color']['hover']).'!important; }';
		// Botton Color + text color
		echo '.button-custom, p.home-message-darkblue-bar, p.portfolio-des-n-link, .portfolio-section .portfolio-button-top, .body-content .wpcf7 input[type="submit"], .container .blog-btn, .sidebar-widget.widget_search input[type="submit"], .navbar-inverse .navbar-toggle, .custom_login_form input[type="submit"], .custom-botton, button#bbp_user_edit_submit, button#bbp_topic_submit, button#bbp_reply_submit, button#bbp_merge_topic_submit, .bbp_widget_login button#user-submit, input[type=submit], .vc_btn3.vc_btn3-color-juicy-pink, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat, #bbpress-forums .bbp-topic-controls #favorite-toggle, #bbpress-forums .bbp-topic-controls #subscription-toggle, .bbp-logged-in a.button, .woocommerce a.button, form.woocommerce-product-search button, .woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .wp-block-button__link {background-color:'.esc_attr($theme_options['botton_color']['regular']).'!important; color:'.esc_attr($theme_options['botton_text_color']['regular']).'!important; -webkit-transition: background-color 2s ease-out; -moz-transition: background-color 2s ease-out; -o-transition: background-color 2s ease-out; transition: background-color 2s ease-out; }
		.navbar-inverse .navbar-toggle, .container .blog-btn,input[type=submit] { border-color:'.esc_attr($theme_options['botton_color']['regular']).'!important;}
		.button-custom:hover, p.home-message-darkblue-bar:hover, .body-content .wpcf7 input[type="submit"]:hover, .container .blog-btn:hover, .sidebar-widget.widget_search input[type="submit"]:hover, .navbar-inverse .navbar-toggle:hover, .custom_login_form input[type="submit"]:hover, .custom-botton:hover, button#bbp_user_edit_submit:hover, button#bbp_topic_submit:hover, button#bbp_reply_submit:hover, button#bbp_merge_topic_submit:hover, .bbp_widget_login button#user-submit:hover, input[type=submit]:hover, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:focus, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:hover, .vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_btn3.vc_btn3-color-juicy-pink:hover, #bbpress-forums .bbp-topic-controls #favorite-toggle:hover, #bbpress-forums .bbp-topic-controls #subscription-toggle:hover, .bbp-logged-in a.button:hover, .woocommerce a.button:hover, form.woocommerce-product-search button:hover, .woocommerce button.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .wp-block-button__link:hover, p.portfolio-des-n-link:hover{  background-color:'.esc_attr($theme_options['botton_color']['hover']).'!important; }';
		// Meta icon color
		echo '.body-content .blog .caption p a i, .body-content .blog .caption p i, .page-title-header p, p.entry-meta i { color:'.esc_attr($theme_options['blog-meta-icon-color']['regular']).'; } .page-title-header span, p.entry-meta span {  color:'.esc_attr($theme_options['blog-meta-icon-text-color']['regular']).';  }';

	}
}



/*-----------------------------------*/
/*	MANUAL CUSTOMIZE :: STICKY MENU
/*-----------------------------------*/
if (!function_exists('manual__cs_stickymenu_customize_settings')) {
	function manual__cs_stickymenu_customize_settings(){
		global $theme_options;
		$bg_color = '';
		if( isset($theme_options['theme_sticky_menu_background']['rgba']) && $theme_options['theme_sticky_menu_background']['rgba'] != '' ) {
			$bg_color = 'background:'.esc_attr($theme_options['theme_sticky_menu_background']['rgba']).'!important;';
		}
		if( $theme_options['theme_sticky_white_logo'] == true ) {
			echo 'nav.navbar.after-scroll-wrap img.home-logo-show { display: none; } nav.navbar.after-scroll-wrap img.inner-page-white-logo { display: block; }';
		}
		echo 'body.home nav.navbar.after-scroll-wrap { '.$bg_color.' } .navbar-inverse.after-scroll-wrap .navbar-nav>li>a { color:'.esc_attr($theme_options['theme_sticky_menu_text_color']['regular']).'!important; } .navbar-inverse.after-scroll-wrap .navbar-nav>li>a:hover {  color:'.esc_attr($theme_options['theme_sticky_menu_text_color']['hover']).'!important; } ';
	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - SEARCH BOX STYLE
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_searchbox_customize_settings')) {
	function manual__cs_searchbox_customize_settings() {
		global $theme_options;
		
		$search_btm_remove = $searhbox_theme_search_box_border_color = $scrollbkToTop_color = '';
		if( $theme_options['theme_search_box_search_bottom'] ==  true ) $search_btm_remove = '!important';
		if( isset($theme_options['theme_search_box_border_color']) && $theme_options['theme_search_box_border_color'] != "" ) {
			$searhbox_theme_search_box_border_color = 'border-color:'.esc_attr($theme_options['theme_search_box_border_color']).'!important;';
		}
		
		echo '.form-control.header-search{ border-radius:'.esc_attr($theme_options['theme_search_box_radius']).'px'.$search_btm_remove.'; font-size: '.$theme_options['theme_search_font_size'].'px; font-weight:'.esc_attr($theme_options['theme_search_font_weight']).'; '.$searhbox_theme_search_box_border_color.' } form.searchform i.livesearch { color: '.esc_attr($theme_options['theme_search_box_icon_color']).'; } .theme-top-header-searchbox .form-group .search-button-custom{ font-size: '.esc_attr($theme_options['theme_search_font_size']).'px; font-weight:'.esc_attr($theme_options['theme_search_font_weight']).'; }';
		
		if($theme_options['theme_search_box_search_bottom'] == true) { 
			echo 'select.search-expand-types { right: 16px!important; }';
			if( $theme_options['manual-trending-post-type-search-status'] == false ) {
				echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } }';
			} else {
				echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 150px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } }';
			}
		} else {
			if($theme_options['manual-trending-post-type-search-status'] == false) {
				echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; }  }';
			} else {
				if ( class_exists('bbPress') && is_bbPress() ) {
					if( $theme_options['manual-trending-post-type-search-status-on-forum-pages'] == true ) {
						echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; }  }';
					} else {
						echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 105px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; }  }';
					}
				} else {
					echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; }  }';
				}
			}
			
		}
		
	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - HEADER MENU CONTROL
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_headermenucontrol_customize_settings')) {
	function manual__cs_headermenucontrol_customize_settings() {
		global $theme_options;
		
		$border_btm_color_li = '';
		if( isset($theme_options['mobile-menu-border-btm-li-color']['rgba']) && $theme_options['mobile-menu-border-btm-li-color']['rgba'] != '' ) {
			$border_btm_color_li = 'border-bottom: 1px solid '.esc_attr($theme_options['mobile-menu-border-btm-li-color']['rgba']).'!important;';
		}
		
		echo '.navbar .nav-fix { height:'.esc_attr($theme_options['first-level-menu-text-line-height']).'px; }.navbar-inverse .navbar-nav>li>a { font-family:'.((isset($theme_options['custom-nav-font'])&& $theme_options['custom-nav-font'] != '')?$theme_options['custom-nav-font']:$theme_options['theme-typography-nav']['font-family']).'!important; text-transform: '.esc_attr($theme_options['first-level-menu-text-transform']).'; font-weight: '.esc_attr($theme_options['first-level-menu-weight']).'; font-size: '.esc_attr($theme_options['first-level-menu-font-size']).'px; letter-spacing: '.esc_attr($theme_options['first-level-menu-letter-spacing']).'; color:'.esc_attr($theme_options['first-level-menu-text-color']['regular']).'!important;line-height:'.esc_attr($theme_options['first-level-menu-text-line-height']).'px;} .navbar-inverse .navbar-nav>li>a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color']['hover']).'!important; }#navbar ul li > ul, #navbar ul li > ul li > ul { background-color:'.esc_attr($theme_options['menu-inner-level-background-color']).'; border-color:'.esc_attr($theme_options['menu-inner-level-background-color']).'; box-shadow: 0 5px 11px 0 rgba(0,0,0,.27); padding: 10px 0px;} #navbar ul li > ul li a { font-family:'.((isset($theme_options['custom-nav-font'])&& $theme_options['custom-nav-font'] != '')?$theme_options['custom-nav-font']:$theme_options['theme-typography-nav']['font-family']).'!important; font-weight:'.esc_attr($theme_options['menu-inner-level-weight']).'; font-size:'.esc_attr($theme_options['menu-inner-level-font-size']).'px; color:'.esc_attr($theme_options['menu-inner-level-text-color']['regular']).'!important; letter-spacing: '.esc_attr($theme_options['menu-inner-level-menu-letter-spacing']).'; text-transform:'.esc_attr($theme_options['menu-inner-level-menu-text-transform']).';line-height:'.esc_attr($theme_options['menu-inner-level-menu-letter-line-height']).';} #navbar ul li > ul li a:hover { color:'.esc_attr($theme_options['menu-inner-level-text-color']['hover']).'!important; } @media (max-width: 991px) { .mobile-menu-holder li a {  font-family:'.((isset($theme_options['custom-nav-font'])&& $theme_options['custom-nav-font'] != '')?$theme_options['custom-nav-font']:$theme_options['theme-typography-nav']['font-family']).'!important; } }  @media (max-width: 991px){ .mobile-menu-holder{ background:'.esc_attr($theme_options['mobile-bgackground-holder-background-color']).'; } .mobile-menu-holder li a { font-size:'.esc_attr($theme_options['mobile-first-level-menu-font-size']).'px; font-weight:'.esc_attr($theme_options['mobile-first-level-menu-weight']).'!important; letter-spacing:'.esc_attr($theme_options['mobile-first-level-menu-letter-spacing']).'; text-transform:'.esc_attr($theme_options['mobile-first-level-menu-text-transform']).'; color:'.esc_attr($theme_options['mobile-first-level-menu-text-color']['regular']).'!important } .mobile-menu-holder li a:hover { color: '.esc_attr($theme_options['mobile-first-level-menu-text-color']['hover']).'!important; background:none; }  .mobile-menu-holder li > ul li a { font-size:'.esc_attr($theme_options['mobile-menu-inner-level-font-size']).'px; font-weight:'.esc_attr($theme_options['mobile-menu-inner-level-weight']).'!important; letter-spacing:'.esc_attr($theme_options['mobile-menu-inner-level-menu-letter-spacing']).'; text-transform:'.esc_attr($theme_options['mobile-menu-inner-level-menu-text-transform']).'; line-height:'.esc_attr($theme_options['mobile-menu-inner-level-menu-letter-line-height']).'; color: '.esc_attr($theme_options['mobile-menu-inner-level-text-color']['regular']).'!important; } .mobile-menu-holder li > ul li a:hover{ color: '.esc_attr($theme_options['mobile-menu-inner-level-text-color']['hover']).'!important; } .mobile_menu_arrow { color:'.esc_attr($theme_options['mobile-first-level-menu-text-color']['regular']).'!important; } .mobile_menu_arrow:hover { color:'.esc_attr($theme_options['mobile-first-level-menu-text-color']['hover']).'!important; } .mobile-menu-holder ul > li { '.$border_btm_color_li.' } } @media (max-width: 991px) and (min-width: 768px){ .navbar-inverse .navbar-toggle { top:'.esc_attr($theme_options['first-level-responsive-hamburger-menu-top-margin']).'px; } } @media (max-width: 767px){ .navbar-inverse .navbar-toggle { top:'.esc_attr($theme_options['first-level-responsive-hamburger-menu-top-margin']).'px; } }';
		// show hide
		echo '@media (max-width: 991px){ .mobile-menu-holder i.menu_arrow_first_level.fa.fa-caret-down { float: right;  padding: 5px; } .mobile-menu-holder ul > li { border-bottom: 1px solid rgba(241, 241, 241, 0.92); } .mobile-menu-holder li > ul li a i { display: block; float: right; margin-top: 6px; } .mobile-menu-holder ul.sub-menu li:last-child, .mobile-menu-holder ul > li:last-child{ border-bottom:none; } }';
		if( isset($theme_options['first-level-menu-icon']) && $theme_options['first-level-menu-icon'] == false ) {
			echo '#navbar i.menu_arrow_first_level.fa.fa-caret-down { display:none }';
		}
		
	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - HEADER MENU TYPE CONTROL
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_headermenu_type_control_customize_settings')) {
	function manual__cs_headermenu_type_control_customize_settings() {
		global $theme_options;
		
		// Check the logo switch status
		if( isset($theme_options['manual-header-custom-image']['url']) && $theme_options['manual-header-custom-image']['url'] != '' ) {
		  $manual_headercustomimgurl = $theme_options['manual-header-custom-image']['url'];
		} else {
		  $manual_headercustomimgurl = '';
		}
		
		if( $theme_options['theme-nav-type'] == 2 && $manual_headercustomimgurl == '' &&  $theme_options['default-header-sytle-backgorund-image'] == false) {
			echo 'img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; }';
		} else if( $theme_options['theme-nav-type'] == 2 && $theme_options['manual-header-custom-image']['url'] != '' &&  $theme_options['default-header-sytle-backgorund-image'] == true) {
			echo 'img.inner-page-white-logo { display: block; } img.home-logo-show { display: none; }'; 
			if( !is_page() ) { 
				echo '.navbar-inverse .navbar-nav>li>a { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['regular']).'!important; }'; 
			}
			echo '.navbar-inverse .navbar-nav>li>a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['hover']).'!important; } .hamburger-menu span { background: #ffffff;}';
		} else if( $theme_options['header-force-white-logo-and-text'] == 1 && $theme_options['manual-header-custom-image']['url'] == '' && $theme_options['default-header-sytle-backgorund-image'] == true ) { 
			echo 'img.inner-page-white-logo { display: block; } img.home-logo-show { display: none; } .navbar-inverse .navbar-nav>li>a { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['regular']).'!important; } .navbar-inverse .navbar-nav>li>a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['hover']).'!important; } .hamburger-menu span { background: #ffffff;}';
		} else {
			echo 'img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; }';
		}
		
		 echo 'nav.navbar.after-scroll-wrap img.inner-page-white-logo{ display: none; } nav.navbar.after-scroll-wrap img.home-logo-show { display: block; }';
		
		// Nav background and border bottom
		echo '.navbar {  z-index: 99; border: none;';   
		if( $theme_options['apply-nav-box-shadow'] ) { echo 'box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.05);'; }
		if( $theme_options['apply-nav-border'] ==  1) { 
			echo 'border-bottom:1px solid '.esc_attr($theme_options['apply-nav-border-color']['rgba']).'; ';
		} else { 
			echo 'border-bottom:none;';
		}
		if( $theme_options['theme-nav-type'] ==  2 && !is_page()) { 
			if( $theme_options['enable-header-bg-color-for-nav-one'] == true ) { 
				echo 'background: '.esc_attr($theme_options['apply-nav-background-color']['rgba']).'!important;'; 
			}
		} else {
			echo 'background: '.(isset($theme_options['apply-nav-background-color-for-transparent-bg']['rgba']) && $theme_options['apply-nav-background-color-for-transparent-bg']['rgba'] != '' ? $theme_options['apply-nav-background-color-for-transparent-bg']['rgba'] : '').'!important;';
		}
		echo '}';


	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - HEADER MENU TYPE CONTROL
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_headerbar_customize_settings')) {
	function manual__cs_headerbar_customize_settings() {
		global $theme_options;
		
		// Default
		if( $theme_options['default-header-sytle-backgorund-image'] == false ) {
			echo '.noise-break { background: #F7F7F7 url('.get_template_directory_uri().'/img/noise.jpg) repeat; }';
		} 
		  
		if( $theme_options['default-header-sytle-backgorund-image'] == true && isset($theme_options['manual-header-custom-image']['url']) && $theme_options['manual-header-custom-image']['url'] != '' ) {
		   echo '.noise-break { background: '.esc_attr($theme_options['default-header-sytle-background-color']).' url('.$theme_options['manual-header-custom-image']['url'].') repeat; background-size: cover; background-position:'.esc_attr($theme_options['header-background-position']).' }';
		} else if( $theme_options['default-header-sytle-backgorund-image'] == true && $theme_options['manual-header-custom-image']['url'] == '' ) {
		  echo '.noise-break { background: '.esc_attr($theme_options['default-header-sytle-background-color']).'; }';
		}
		 
		if( $theme_options['header-opacity-uploadimage-global'] == true && !empty($theme_options['manual-header-custom-image']['url']) && $theme_options['default-header-sytle-backgorund-image'] == true && !is_page() ) {  echo '.page_opacity.header_custom_height_new{background: rgba(0,0,0,0.3);}'; }
		 
		 // Header height
		echo '.page_opacity.header_custom_height_new{ padding: '.esc_attr($theme_options['default-header-sytle-height']).'px 0px!important; }';
		  
		// Controls header text align
		echo ' .header_control_text_align { text-align:'.esc_attr($theme_options['default-header-text-align']).'; } ';
		 
		// Header title control
		echo 'h1.custom_h1_head { color: '.esc_attr($theme_options['default-top-header-title-color']).'!important; font-size: '.esc_attr($theme_options['default-header-title-font-size']).'px!important; font-weight: '.esc_attr($theme_options['default-header-title-font-weight']).'!important; text-transform:'.esc_attr($theme_options['default-header-title-text-transform']).'!important; letter-spacing: '.esc_attr($theme_options['default-header-title-font-letter-spacing']).'px!important; overflow-wrap: break-word; }';
		 
		// Subtitle
		echo 'p.inner-header-color { color:'.esc_attr($theme_options['default-top-header-subtitle-color']).'; font-size: '.esc_attr($theme_options['default-header-subtitle-font-size']).'px!important; letter-spacing: '.esc_attr($theme_options['default-header-subtitle-font-letter-spacing']).'px!important; font-weight:'.esc_attr($theme_options['default-header-subtitle-font-weight']).'!important; text-transform:'.esc_attr($theme_options['default-header-subtitle-text-transform']).';  }';
		 
		// Breadcrumbs
		echo '#breadcrumbs {color:'.esc_attr($theme_options['default-top-header-breadcrumb-color']).'; text-transform:'.esc_attr($theme_options['default-header-breadcrumb-text-transform']).'; letter-spacing: '.esc_attr($theme_options['default-header-breadcrumb-letter-spacing']).'px; font-size: '.esc_attr($theme_options['default-header-breadcrumb-font-size']).'px; font-weight: '.esc_attr($theme_options['default-header-breadcrumb-font-weight']).';  padding-top: '.esc_attr($theme_options['default-header-breadcrumb-padding']).'px;} #breadcrumbs span{ color:'.esc_attr($theme_options['default-top-header-breadcrumb-color']).'; } #breadcrumbs a{ color:'.esc_attr($theme_options['default-top-header-breadcrumb-link-color']['regular']).'; } #breadcrumbs a:hover{ color:'.esc_attr($theme_options['default-top-header-breadcrumb-link-color']['hover']).'; } ';
		 
		// Trending search
		echo '.trending-search span.popular-keyword-title { color:'.esc_attr($theme_options['theme_header_treanding_search_color']).'; } .trending-search a { color:'.esc_attr($theme_options['theme_header_treanding_search_link_color']['regular']).'!important; }';

	}
}

/*----------------------------*/
/*	MANUAL CUSTOMIZE :: LOGO
/*----------------------------*/
if (!function_exists('manual__gouparrow_settings')) {
	function manual__gouparrow_settings() {
		global $theme_options;
		echo '.footer-go-uplink { color:'.(!empty($theme_options['manual-go-up-icon-color']['rgba'])?$theme_options['manual-go-up-icon-color']['rgba']:'').'; font-size:'.$theme_options['go_up_arrow_font_size'].'px!important; }
';
	}
}

/*--------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - FOOTER
/*--------------------------------------------*/
if (!function_exists('manual__cs_footer_customize_settings')) {
	function manual__cs_footer_customize_settings() {
		global $theme_options;
		
		echo '.footer-bg { background: '.$theme_options['theme_footer_widget_bg_color'].'; } .footer-widget h6, .footer-widget h5, .footer-widget h4 { color: '.$theme_options['theme_footer_widget_title_color'].'!important; } .footer-widget .textwidget, .footer-widget .textwidget p { color: '.$theme_options['theme_footer_widget_text_color'].'!important; } .footer-widget a {
color: '.$theme_options['theme_footer_widget_text_link_color']['regular'].'!important; } .footer-widget a:hover { color:'.$theme_options['theme_footer_widget_text_link_color']['hover'].'!important; } span.post-date { color: '.$theme_options['theme_footer_widget_text_color'].'; }'; 

		echo '.footer_social_copyright, .footer-bg.footer-type-one{ background-color: '.$theme_options['theme_footer_social_bg_color'].'; } .footer-btm-box p, .footer-bg.footer-type-one p, .footer-tertiary p { color: '.$theme_options['theme_footer_social_text_color'].'; } .footer-link-box a,.footer-btm-box a, .footer-bg.footer-type-one .footer-btm-box-one a{ color: '.$theme_options['theme_footer_social_link_color']['regular'].'!important;  } .footer-link-box a:hover, .footer-btm-box a:hover, .footer-bg.footer-type-one .footer-btm-box-one a:hover { color: '.$theme_options['theme_footer_social_link_color']['hover'].'!important; } .footer-btm-box .social-footer-icon, .footer-bg.footer-type-one .social-footer-icon { color: '.$theme_options['theme_footer_social_icon_link_color']['regular'].'; } .footer-btm-box .social-footer-icon:hover, .footer-bg.footer-type-one .social-footer-icon:hover { color:'.$theme_options['theme_footer_social_icon_link_color']['hover'].'; }';
		
	}
}

/*--------------------------------------------*/
/*	MANUAL EXTRA DESIGN - ICON BOUNCED IN
/*--------------------------------------------*/
if (!function_exists('manual__cs_icon_bouncedin_settings')) {
	function manual__cs_icon_bouncedin_settings() {
		global $theme_options;
		
		if( $theme_options['manual-live-search-icon-bouncein'] == true ) {
			echo 'form.searchform i.livesearch{ animation: bounceIn 750ms linear infinite alternate; -moz-animation: bounceIn 750ms linear infinite alternate;   -webkit-animation: bounceIn 750ms linear infinite alternate; -o-animation: bounceIn 750ms linear infinite alternate; } @-webkit-keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
	keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);-ms-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);-ms-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);-ms-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);-ms-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);-ms-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);-ms-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
	.bounceIn{-webkit-animation-name:bounceIn;animation-name:bounceIn;-webkit-animation-duration:.75s;animation-duration:.75s;}';
		}
		
	}
}


/*----------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - KNOWLEDGEBASE
/*----------------------------------------------------*/
if (!function_exists('manual__cs_knowledgebase_customize_settings')) {
	function manual__cs_knowledgebase_customize_settings() {
		global $theme_options;

		if( $theme_options['knowledgebase-cat-quick-stats-under-title'] == true ) { echo '.kb-box-single:before { font-size: 28px; margin-top: -3px; } .kb-box-single { padding: 14px 10% 0px 44px; margin-bottom: 0px;; }'; }
		if( $theme_options['knowledgebase-quick-stats-under-title'] == true ) { echo '.body-content .kb-single:before { font-size: 39px; } .body-content .kb-single { padding: 0px 0px 5px 55px; } .body-content .kb-single:before { top: -4px; }'; }
		// target search dropdown design control
		echo 'select.search-expand-types{ margin-right:'.$theme_options['manual-dropdown-target-search-margin-right'].'; }';
		// other
		echo '.kb_tree_viewmenu h5 a, .kb_tree_viewmenu h6 a { color: inherit; }';
		
	}
}


/*-------------------------------*/
/*	INITIAL MANUAL THEME SETUP
/*-------------------------------*/
if (!function_exists('manual__themeinitial_setup')) {
	function manual__themeinitial_setup() {
		$post_type = get_post_type();
		echo 'img.home-logo-show { display: block!important; } h1.inner-header { text-align: center; }body { color: #424242; font-family:Open Sans!important; font-size: 14px; line-height: 1.7; letter-spacing: 0.3px; }h1 {  font-family: Raleway; font-weight:800; font-size:36px; line-height: 40px; text-transform:none; letter-spacing: 0px; color: #363d40; }h2 {  font-family: Raleway; font-weight:800; font-size:31px; line-height: 35px; text-transform:none; letter-spacing: 0px; color: #363d40; }h3 {  font-family: Raleway; font-weight:700; font-size:26px; line-height: 34px; text-transform:none; letter-spacing: 0px; color: #363d40; }h4 {  font-family: Raleway; font-weight:700; font-size:21px; line-height: 24px; text-transform:none; letter-spacing: 0px; color: #363d40; }h5 {  font-family: Raleway; font-weight:700; font-size:16px; line-height: 20px; text-transform:none; letter-spacing: 0px; color: #363d40; }h6 {  font-family: Raleway; font-weight:700; font-size:14px; line-height: 20px; text-transform:none; letter-spacing: 0px; color: #363d40; }.page_opacity.header_custom_height_new { padding: 90px 0px!important; }.header_control_text_align { text-align: center!important; }#breadcrumbs {color: #919191; text-transform: capitalize; letter-spacing: 0px; font-size: 14px; font-weight: 400; padding-top: 0px; } a, .body-content .blog .caption h2 a { color: #333333; } a:hover, .body-content .knowledgebase-cat-body h4 a:hover, .body-content .knowledgebase-body h6:hover:before, .body-content .knowledgebase-body h5:hover:before, .body-content .knowledgebase-body h4:hover:before, .body-content .knowledgebase-body h3:hover:before, .body-content .knowledgebase-body h6 a:hover, .body-content .knowledgebase-body h5 a:hover, .body-content .knowledgebase-body h4 a:hover, .body-content .knowledgebase-body h3 a:hover, #bbpress-forums .bbp-reply-author .bbp-author-name:hover, #bbpress-forums .bbp-topic-freshness > a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums .last-posted-topic-title a:hover, #bbpress-forums .bbp-forum-link:hover, #bbpress-forums .bbp-forum-header .bbp-forum-title:hover, .body-content .blog .caption h2 a:hover, .body-content .blog .caption span:hover, .body-content .blog .caption p a:hover, .sidebar-nav ul li a:hover, .tagcloud a:hover, a.href:hover, .body-content .collapsible-panels p.post-edit-link a:hover, .tagcloud.singlepg a:hover, .body-content li.cat a:hover, h4.title-faq-cat a:hover, .portfolio-next-prv-bar .portfolio-prev a:hover, .portfolio-next-prv-bar .portfolio-next a:hover, .search h4 a:hover, .portfolio-filter ul li span:hover, ul.news-list.doc-landing li a:hover, .news-list li:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, .kb_article_type li.articles:hover:before, .kb-box-single a:hover, .portfolio-desc a:hover, .woocommerce ul.products li.product a:hover, .kb_tree_viewmenu h6 a:hover, .kb_tree_viewmenu h6 a:hover:before, .kb_tree_viewmenu h5 a:hover, .kb_tree_viewmenu h5 a:hover:before, .kb_tree_viewmenu ul li a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title:hover:before, #bbpress-forums .bbp-admin-links a:hover, .widget_display_topics li:hover:before, .woocommerce div.product div.product_meta>span span:hover, .woocommerce div.product div.product_meta>span a:hover, #breadcrumbs a:hover, .body-content li.cat.inner a:hover:before, .vc_kb_article_type li.articles a:hover:before, .footer-go-uplink:hover, a.post-edit-link:hover, .body-content .collapsible-panels h4:hover:before, .body-content .collapsible-panels h5:hover:before, td.product-name a:hover, ul.vc_kbcat_widget li:hover:before, .sidebar-widget .display-faq-section li.cat-item a:hover:before, .body-content .display-faq-section ul li.cat-item.current-cat a:before { color: #46b289; } .body-content .blog .caption p a i, .body-content .blog .caption p i, .page-title-header p, p.entry-meta i { color: #46b289; } .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { background-color: #47C494; border-color: #47C494; } .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { color: #ffffff; } .browse-help-desk .browse-help-desk-div .i-fa:hover, ul.news-list li.cat-lists:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, #list-manual li a.has-child.dataicon:before, #list-manual li a.has-inner-child.dataicon:before, .manual_related_articles h5:before, .manual_attached_section h5:before, .tagcloud.singlepgtag span i, form.searchform i.livesearch, span.required, .woocommerce .star-rating, .woocommerce-page .star-rating, .kb_tree_viewmenu ul li.root_cat a.kb-tree-recdisplay:before, .kb_tree_viewmenu ul li.root_cat_child a.kb-tree-recdisplay:before, #bbpress-forums .bbp-forum-title-container a:before, .body-content .collapsible-panels h4:before, .body-content .collapsible-panels h5:before, .portfolio-next-prv-bar .hvr-icon-back, .portfolio-next-prv-bar .hvr-icon-forward, .body-content .blog:before { color: #47C494; } .custom-well { padding: 0px 19px 19px 19px; } .navbar-inverse .navbar-nav>li>a:hover { color: #46b289!important; } .navbar-inverse .navbar-toggle, .container .blog-btn, input[type=submit] { border-color: #46b289!important; } .navbar-inverse .navbar-toggle { background-color: #46b289!important; } .navbar-inverse .navbar-toggle:hover { background-color: #001040!important; } .body-content .search:before { margin-top: -8px; font-size: 25px; } .body-content .search { padding: 20px 5px 1px 45px; } .button-custom, p.home-message-darkblue-bar, p.portfolio-des-n-link, .portfolio-section .portfolio-button-top, .body-content .wpcf7 input[type="submit"], .container .blog-btn, .sidebar-widget.widget_search input[type="submit"], .navbar-inverse .navbar-toggle, .custom_login_form input[type="submit"], .custom-botton, button#bbp_user_edit_submit, button#bbp_topic_submit, button#bbp_reply_submit, button#bbp_merge_topic_submit, .bbp_widget_login button#user-submit, input[type=submit], .vc_btn3.vc_btn3-color-juicy-pink, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat, #bbpress-forums .bbp-topic-controls #favorite-toggle, #bbpress-forums .bbp-topic-controls #subscription-toggle, .bbp-logged-in a.button, .woocommerce a.button, form.woocommerce-product-search button, .woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .wp-block-button__link { background: #46b289!important; color: #ffffff!important; -webkit-transition: background-color 2s ease-out; -moz-transition: background-color 2s ease-out; -o-transition: background-color 2s ease-out; transition: background-color 2s ease-out; } .button-custom:hover, p.home-message-darkblue-bar:hover, .body-content .wpcf7 input[type="submit"]:hover, .container .blog-btn:hover, .sidebar-widget.widget_search input[type="submit"]:hover, .navbar-inverse .navbar-toggle:hover, .custom_login_form input[type="submit"]:hover, .custom-botton:hover, button#bbp_user_edit_submit:hover, button#bbp_topic_submit:hover, button#bbp_reply_submit:hover, button#bbp_merge_topic_submit:hover, .bbp_widget_login button#user-submit:hover, input[type=submit]:hover, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:focus, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:hover, .vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_btn3.vc_btn3-color-juicy-pink:hover, #bbpress-forums .bbp-topic-controls #favorite-toggle:hover, #bbpress-forums .bbp-topic-controls #subscription-toggle:hover, .bbp-logged-in a.button:hover, .woocommerce a.button:hover, form.woocommerce-product-search button:hover, .woocommerce button.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .wp-block-button__link:hover, p.portfolio-des-n-link:hover { background-color: #001040!important; }';
		if( is_404() || (is_single() && $post_type == 'post' ) || $post_type == 'post' ) { echo '.jumbotron_new.jumbotron-inner-fix { display: none; } .navbar { position: inherit; box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); }'; }
		if( is_404() ) { echo 'form.searchform i.livesearch { top: 36px; }'; }
	}
}
?>