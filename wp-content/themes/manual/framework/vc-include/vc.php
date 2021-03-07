<?php
/*************************************
***      REMOVING SHORTCODES       ***
**************************************/

// Ultimate Addons for WPBakery Page Builder
define('BSF_PRODUCTS_NOTICES', false);
vc_set_as_theme( $disable_updater = true );  // disable vc activation notice

/*** 1 - Deprecated ***/
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element('vc_button2');
vc_remove_element("vc_tour");
vc_remove_element("vc_accordion");
vc_remove_element("vc_tabs");
/*** 2 - WP ***/ 
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");


/*************************************
***    ADD VC SC 1 :: COUNTER     ***
**************************************/
vc_map( array(
"name"             => esc_html__("Counter", "manual"),
"base"              => "manual_theme_counter",
"category"          => esc_html__('Manual', "manual"),
"icon" => "icon-wpb-counter",
"allowed_container_element" => 'vc_row',
"params" => array(
	
	array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Position",
		"param_name" => "position",
		"value" => array(
			"Left" => "left",
			"Right" => "right",	
			"Center" => "center"	
		),
		'save_always' => true,
		"description" => ""
	),
	
	array(
		"type" => "textfield",
		"holder" => "div",
		"class" => "",
		"heading" => "Digit",
		"param_name" => "digit",
		"description" => ""
	),
	
	array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Digit Font Weight",
		"param_name" => "font_weight",
		"value" => array(
			"Default" 			=> "",
			"Thin 100"			=> "100",
			"Extra-Light 200" 	=> "200",
			"Light 300"			=> "300",
			"Regular 400"		=> "400",
			"Medium 500"		=> "500",
			"Semi-Bold 600"		=> "600",
			"Bold 700"			=> "700",
			"Extra-Bold 800"	=> "800",
			"Ultra-Bold 900"	=> "900"
		),
		"description" => ""
	),
	
	array(
		"type" => "colorpicker",
		"holder" => "div",
		"class" => "",
		"heading" => "Font Color",
		"param_name" => "font_color",
		"description" => ""
	),
	
	array(
		"type" => "textfield",
		"holder" => "div",
		"class" => "",
		"heading" => "Text",
		"param_name" => "text",
		"description" => ""
	),
	
	array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Text Font Weight",
		"param_name" => "text_font_weight",
		"value" => array(
			"Default" => "",
			"Thin 100" => "100",
			"Extra-Light 200" => "200",
			"Light 300" => "300",
			"Regular 400" => "400",
			"Medium 500" => "500",
			"Semi-Bold 600" => "600",
			"Bold 700" => "700",
			"Extra-Bold 800" => "800",
			"Ultra-Bold 900" => "900"
		)
	),
	
	array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Text Transform",
		"param_name" => "text_transform",
		"value" => array(
			"Default" 			=> "uppercase",
			"None"				=> "none",
			"Capitalize" 		=> "capitalize",
			"Uppercase"			=> "uppercase",
			"Lowercase"			=> "lowercase"
		),
		"description" => ""
	),
	
	array(
		"type" => "colorpicker",
		"holder" => "div",
		"class" => "",
		"heading" => "Text Color",
		"param_name" => "text_color",
		"description" => ""
	),
	
	array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Separator",
		"param_name" => "separator",
		"value" => array(
			"Yes" => "yes",
			"No" => "no"
		),
		'save_always' => true,
		"description" => ""
	),
	
	array(
		"type" => "colorpicker",
		"holder" => "div",
		"class" => "",
		"heading" => "Separator Color",
		"param_name" => "separator_color",
		"description" => "",
		"dependency" => array('element' => "separator", 'value' => array('yes'))
	),
)
) );
	
   
/*************************************
***    ADD VC SC 2 :: TEAM       ***
**************************************/
vc_map( array(
	"name" => esc_html__("Team", "manual"), 
	"base" => "manual_our_team",
	"category"  => esc_html__('Manual', "manual"),
	"icon" => "icon-wpb-q_team",
	"allowed_container_element" => 'vc_row',
	"params" => array(
					  
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Image", "manual"), 
			"param_name" => "team_image"
		),
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Name", "manual"), 
			"param_name" => "team_name"
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Name Title Tag", "manual"), 
			"param_name" => "name_title_tag",
			"value" => array(
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => "",
			'std'         => 'h4',
		),
		
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Name Color", "manual"), 
			"param_name" => "name_color",
			"description" => ""
		),
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Position", "manual"),
			"param_name" => "team_position"
		),
		
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Position Color", "manual"), 
			"param_name" => "position_color",
			"description" => ""
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Show Separator", "manual"), 
			"param_name" => "show_separator",
			"value" => array(
				"Default" => "",
				"Yes" => "yes",
				"No" => "no"
			),
			"description" => ""
		),
		
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Separator Color", "manual"), 
			"param_name" => "separator_color",
			"value" => "#1abc9c",
			"dependency" => array('element' => "show_separator", 'value' => array('yes','')),
			"description" => ""
		),
		
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icons Color", "manual"),
			"param_name" => "icons_color",
			"value" => "",
			"description" => ""
		),
		
		// social icons - 1
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 1", "manual"), 
			"param_name" => "team_social_icon_1",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 1 Link", "manual"), 
			"param_name" => "team_social_icon_1_link"
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Social Icon 1 Target",
			"param_name" => "team_social_icon_1_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// social icons - 2
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 2", "manual"), 
			"param_name" => "team_social_icon_2",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 2 Link", "manual"), 
			"param_name" => "team_social_icon_2_link"
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Social Icon 2 Target",
			"param_name" => "team_social_icon_2_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// social icons - 3
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 3", "manual"), 
			"param_name" => "team_social_icon_3",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 3 Link", "manual"), 
			"param_name" => "team_social_icon_3_link"
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Social Icon 3 Target",
			"param_name" => "team_social_icon_3_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// social icons - 4
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 4", "manual"), 
			"param_name" => "team_social_icon_4",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icon 4 Link", "manual"), 
			"param_name" => "team_social_icon_4_link"
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Social Icon 4 Target",
			"param_name" => "team_social_icon_4_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// Eof social
		
	)
) );   
	
	
/*************************************
***  ADD VC SC 3 :: TESTIMONIALS   ***
**************************************/
vc_map( array(
		"name" => esc_html__("Testimonials", "manual"), 
		"base" => "manual_theme_testimonials",
		"category" => esc_html__('Manual', "manual"),
		"icon" => "icon-wpb-testimonials",
		"allowed_container_element" => 'vc_row',
		"params" => array(
						  
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Number', "manual"),
				"param_name" => "number",
				"value" => "",
				"description" =>  esc_html__('Number of Testimonials, if place -1 it will display all', "manual"), 
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Order By', "manual"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Title" => "title",
					"Date" => "date",
					"Random" => "rand"
				),
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Order Type', "manual"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"Ascending" => "ASC",
					"Descending" => "DESC",
				),
				"description" => "",
				"dependency" => array("element" => "order_by", "value" => array("title", "date"))
			),
			
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__('Text Color', "manual"), 
                "param_name" => "text_color",
                "description" => ""
            ),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Custom Text Font', "manual"),
				"param_name" => "custom_font_size",
				"value" => "22px",
				"description" =>  esc_html__('Enter as: 12px, 34px as per your need', "manual"), 
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__('Author Text Font Weight', "manual"),
				"param_name" => "author_text_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__('Author Text Color', "manual"),
                "param_name" => "author_text_color",
                "description" => ""
            ),
			
		)
) );	



/*************************************
***    ADD VC SC 4 :: TEXT ICON    ***
**************************************/
vc_map( array(
		"name" => esc_html__("Icon With Text", "manual"), 
		"base" => "manual_theme_icon_text",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				  
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Design Icon Box', "manual"), 
					"param_name" => "use_custom_icon_box_design",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"description" => esc_html__("Select Yes if you want to custom design your icon box", "manual")
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Color', "manual"),
					"param_name" => "icon_box_color",
					"description" => "",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes'))
				),
				
			    array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Padding', "manual"), 
					"param_name" => "icon_box_padding",
					"value" => "",
					"description" => "Default: 0px 0px 30px 0px (top, right, buttom, left)",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes'))
				),
				
			    array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Margin', "manual"), 
					"param_name" => "icon_box_margin",
					"value" => "",
					"description" => "Default: 0px 0px 0px 0px (top, right, buttom, left)",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Box CSS Animation', "manual"), 
					"param_name" => "box_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => "",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Icon Name", "manual"),
					"param_name" => "icon_name",
					"value" => "",
					"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Position', "manual"),
					"param_name" => "display_icon_position",
					"value" => array(
						"Left" => "left",
						"Top" => "top",
						"Left From Title" => "left_from_title",
					),
					'save_always' => true,
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Margin (px)', "manual"),
					"param_name" => "display_icon_top_margin",
					"value" => "",
					"description" => "Margin should be set in a top right bottom left format",
					"dependency" => array('element' => "display_icon_position", 'value' => array('top'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Use Custom Icon Size', "manual"), 
					"param_name" => "use_custom_icon_size",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"description" => esc_html__("Select Yes if you want to use custom icon size and margin", "manual")
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Icon Size (px)', "manual"), 
					"param_name" => "custom_icon_size",
					"value" => "",
					"description" => esc_html__("Enter just number, omit px", "manual"),
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Icon Margin (px)', "manual"),
					"param_name" => "custom_icon_margin",
					"value" => "",
					"description" => esc_html__("Spacing between icon and text (for left icon/margin position). Enter just number, omit px", "manual"),
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', "manual"),
					"param_name" => "icon_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title', "manual"), 
					"param_name" => "title",
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Color', "manual"), 
					"param_name" => "title_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Font Size (px)', "manual"), 
					"param_name" => "title_font_size",
					"value" => "",
					"description" => "Omit px"
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Text Transform', "manual"), 
					"param_name" => "title_font_transform",
					"value" => array(
						"Default" 		=> "",
						"capitalize"	=> "capitalize",
						"lowercase" 	=> "lowercase",
						),
					"description" => ""
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Font Weight', "manual"), 
					"param_name" => "title_font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text', "manual"), 
					"param_name" => "text",
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text Color', "manual"),  
					"param_name" => "text_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Top Margin (px)', "manual"), 
					"param_name" => "custom_top_margin_maintext_and_text",
					"value" => "",
					"description" => __("Spacing between title text and text. Enter just number, omit px", "manual"),
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Activate Link', "manual"), 
					"param_name" => "activate_link",
					"value" => array(
						'' => '',
						'Yes' => 'yes',
						'No' => 'no'
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link URL Type', "manual"), 
					"param_name" => "link_icon",
					"value" => array(
						'' => '',
						'Link only icon' => 'yes',
						'Link only text' => 'no',
						'Link both icon & text' => 'both',
						'Link box' => 'box'
					),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes'))
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes')),
				 ),
				
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Link Text Color", "manual"),
					"param_name" => "link_color",
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no','both'))
				),
				 
			)
		)
) );


/*************************************
***  ADD VC SC 5 :: KNOWLEDGEBASE  ***
**************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase", "manual"), 
		"base" => "manual_theme_all_knowledgebase",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Knowledgebase Style", 'manual'), 
					"param_name" => "knowledgebase_style_type",
					"value" => array(
						"Masonry" => "1",
						"FitRows" => "2",
						)
				),
				
				// KB Design Style
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Knowledgebase Design Style", 'manual'), 
					"param_name" => "knowledgebase_design_style_type",
					"value" => array(
						"Default" => "1",
						"Style 1" => "2",
						), 
					"group" => "Design",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Border Color', "manual"), 
					"param_name" => "knowledgebase_design_style_type1_border_color",
					"description" => "Default: #E1E1E1",
					"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2')), 
					"group" => "Design",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Background Color', "manual"), 
					"param_name" => "knowledgebase_design_style_type1_bg_color",
					"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2')), 
					"group" => "Design",
					"description" => "Default: #FFFFFF",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Text Background Color', "manual"), 
					"param_name" => "knowledgebase_design_style_type1_titletxtbg_color",
					"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2')), 
					"group" => "Design",
					"description" => "Default: #F6F6F6",
				),
				// EOF KB Design Style
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Category Records", 'manual'),
					"param_name" => "kb_no_of_category_records",
					"value" => "0",
					"description" => "0 == all category records",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Knowledgebase Columns", "manual"), 
					"param_name" => "knowledgebase_column",
					"value" => array(
						"Default" => "",
						"3 Columns (Full Width)" => "4",
						"2 Columns (Best Fit Sidebar)" => "6",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Display Order", 'manual'),
					"param_name" => "knowledgebase_category_display_order",
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Display OrderBy", 'manual'),
					"param_name" => "knowledgebase_category_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Description" => "description",
							"Number Of Records Count"  => "count",
							"Slug Name"  => "slug",
							"Name"  => "name",
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "No Of Articles Under Category",
					"param_name" => "knowledgebase_no_of_articles",
					"description" => 'No of articles under category (Default:5)',  
					"value"       => "5",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Records Display Order", 'manual'),
				"param_name" => "knowledgebase_page_article_display_order",
				"description" => 'Order pages that\'s under category',
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Display Order By", 'manual'),
					"param_name" => "knowledgebase_page_article_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Child Category as Main Category", 'manual'),
					"param_name" => "knowledgebase_child_cat_as_root",
					"value" => array(
							"No" => "no",
							"Yes" => "yes",
						)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Category Title Tag",
					"param_name" => "category_title_tag",
					"value" => array(
						""   => "",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', "manual"), 
					"param_name" => "icon_color",
					"description" => "Icon before category title",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Display Category Description", 'manual'), 
					"param_name" => "display_kb_cat_desc",
					"value" => array(
						"Yes" => "yes",
						"No" => "no",
						)
				), 
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Category Description Color', "manual"), 
					"param_name" => "cat_desc_color",
					"description" => "",
					"dependency" => Array('element' => "display_kb_cat_desc", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Read More Text",
					"param_name" => "knowledgebase_view_all",
					"value" => "View All",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Display Read More Text", 'manual'), 
					"param_name" => "read_more_text_display",
					"value" => array(
						"Yes" => "yes",
						"No" => "no",
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "KnowledgeBase by - Category ID (comma seprated ID)", 'manual' ),
					"param_name" => "kbgroupcatid",
					"value" => "",
					"description" => "<span style='color:blue'><strong>Leave empty to display all category</strong></span> <br><br>Go to 'Knowledge Base > Knowledge Base Categories', click on edit KB category; you will see something like this on the URL: \"wp-admin/term.php?taxonomy=manualknowledgebasecat<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> <strong>Your category ID == 13 (tag_ID=13)</strong><br><br>",
			   ),
				
			)
		)
) );


/***************************************************
***     ADD VC :: KNOWLEDGE BASE CAT LANDING  ******
****************************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase - Category Landing Style", 'manual'), 
		"base" => "manual__theme_kb_catlanding_style",
		"icon" => "icon-wpb-icon_text",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__("Knowledgebase Style", 'manual'), 
				"param_name" => "knowledgebase_style_type",
				"value" => array(
					"Style 1" => "1",
					"Style 2" => "2",
					)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Records", 'manual'),
					"param_name" => "kb_no_ofrecords",
					"value" => "0",
					"description" => "0 == all records",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Disable Count Total Article Section",
					"param_name" => "total_article_count",
					"value" => array(
						"No"   => "no",
						"Yes" => "yes",	
					),
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Article Total Count Display Style",
					"param_name" => "total_article_count_style",
					"value" => array(
						"Style 1"   => "1",
						"Style 2" => "2",	
					),
					"dependency" => Array('element' => "total_article_count", 'value' => array('no'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'manual'),
					"param_name" => "total_article_count_style1_text",
					"value" => "Written by",
					"description" => "",
					"dependency" => Array('element' => "total_article_count_style", 'value' => array('1'))
				),
				
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Disable Description",
					"param_name" => "disable_description",
					"value" => array(
						"No"   => "no",
						"Yes" => "yes",	
					),
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Limit Description to Define Character Length",
					"param_name" => "limit_description_char",
					"value" => "",
					"description" => esc_html__("Limit your description characters", 'manual'),
					"dependency" => Array('element' => "disable_description", 'value' => array('no'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Article count text box", 'manual'),
					"description" => esc_html__("Default text: articles in this collection", 'manual'),
					"param_name" => "article_count_box_title",
					"value" => "articles in this collection",
					"dependency" => Array('element' => "total_article_count", 'value' => array('no'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Background Color', 'manual'), 
					"param_name" => "background_color",
					"description" => "",
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Color', 'manual'), 
					"param_name" => "border_color",
					"description" => "",
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Border Radius", 'manual'),
					"param_name" => "border_radius",
					"value" => "4px",
					"description" => "Example: 4px",
				),
				
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', 'manual'), 
					"param_name" => "icon_color",
					"description" => "",
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Default Icon Code Name", 'manual'),
					"param_name" => "default_icon_code",
					"value" => "",
					"description" => "If found knowledgebase category icon code blank, system will use default icon code <br>Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Icon Size", 'manual'),
					"param_name" => "icon_size",
					"value" => "",
					"description" => "Example:55px",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Page Records Display Order", 'manual'),
				"param_name" => "knowledgebase_style_type_display_order",
				"description" => 'Order pages that\'s under category',
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Records Display Order By", 'manual'),
					"param_name" => "knowledgebase_style_type_display_orderby",
					"value" => array(
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'manual'),
					"param_name" => "kb_private_categpry",
					"value" => "Private Category",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Private Category Text Color', 'manual'), 
					"param_name" => "kb_private_category_text_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Exclude Knowledge Base Category (comma seprated ID)", 'manual' ),
					"param_name" => "exclude_kb_category",
					"value" => "",
					"description" => "<span style='color:blue'><strong>Leave empty to display all category</strong></span> <br><br><strong>How to find knowledgebase category ID??</strong> <br><br> 1. Click On \"Knowledge Base &minus;&gt; Knowledge Base Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\", You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=manualkbcat<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
				


			)
		)
) );



/**************************************
***  ADD VC SC 12 :: KB SINGLE CAT  ***
***************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase - Single Category Records", "manual"), 
		"base" => "manual_theme_single_cat_knowledgebase",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Post Per Page", "manual"),
					"param_name" => "page_per_post",
					"value" => "-1",
					"description" => "Note: -1 shows all post",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order", "manual"),
					"param_name" => "post_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order By", "manual"),
					"param_name" => "post_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Include Child Post", "manual"),
					"param_name" => "include_child_post",
					"value" => array(
							"yes" => "yes",
							"No" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Hide Pagination", "manual"),
					"param_name" => "hide_pagination",
					"value" => array(
						"No"  => "1",
						"Yes" => "2",
						)
				),
				 
			   array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Knowledgebase Category ID", "manual" ),
					"param_name" => "kbsinglecatid",
					"value" => "",
					"description" => "<span style='color:blue'><strong>ALERT: Enter ONLY 1 Category ID</strong></span> <br><br>Go to 'Knowledge Base > Knowledge Base Categories', click on edit KB category; you will see something like this on the URL: \"wp-admin/term.php?taxonomy=manualknowledgebasecat<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> <strong>Your category ID == 13 (tag_ID=13)</strong><br><br>",
				 ),
		 
					
			)
		)
) );


/**************************************************
***  ADD VC SC 21 :: KNOWLEDGE BASE TREE MENU *****
***************************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase - Tree View", 'manual'), 
		"base" => "manual__knowledgebase_tree_menu",
		"icon" => "icon-wpb-icon_text",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Root tag <li> padding", 'manual'),
					"param_name" => "root_tag_li_padding",
					"value" => "",
					"description" => "Default: 3px 10px 3px 10px (top, left, buttom, right)"
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Root tag <li> Background Color', 'manual'), 
					"param_name" => "root_tag_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Root tag <li> Border Buttom Color', 'manual'), 
					"param_name" => "root_tag_border_bottom_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Radius', 'manual'), 
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Example: 5px"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Category Records", 'manual'),
					"param_name" => "kb_no_of_category_records",
					"value" => "0",
					"description" => "0 == all category records",
				),
                
                array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Category Display Order", 'manual'),
				"param_name" => "knowledgebase_category_display_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
                
                array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Display OrderBy", 'manual'),
					"param_name" => "knowledgebase_category_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Description" => "description",
							"Number Of Records Count"  => "count",
							"Slug Name"  => "slug",
							"Name"  => "name",
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'manual'),
					"param_name" => "kb_private_category",
					"value" => "",
					"description" => "",
				),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Under Category Display Order", 'manual'),
					"param_name" => "knowledgebase_records_display_order",
					"description" => 'Order pages that\'s under category',
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
                
                array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Under Category Display Order By", 'manual'),
					"param_name" => "knowledgebase_records_display_orderby",
					"value" => array(
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),

			)
		)
) );



/*************************************
***  ADD VC SC 6 :: KB CATEGORY    ***
**************************************/
vc_map( array(
		"name" => esc_html__("Widget - KnowledgeBase Category", "manual"), 
		"base" => "manual_theme_kb_category",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				  
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "kb_category_title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show post counts", "manual"),
					"param_name" => "kb_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Text Color', "manual"), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Background Color', "manual"), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
			)
		)
) );



/******************************************
***  ADD VC SC 7 :: KB POPULAR ARTICLE  ***
*******************************************/
vc_map( array(
		"name" => esc_html__(" Widget - KnowledgeBase Article", "manual"), 
		"base" => "manual_theme_kb_popular_article",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				  
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Articles By", "manual"),
				"param_name" => "knowledgebase_article_display_type",
				"value" => array(
					"Select Article Display Type" => "",
					"Latest Articles (using date)" => "1",
					"Popular Article (using number of views)" => "2",
					"Top Rated Article (using like)" => "3",
					"Most Commented Article" => "4",
					)
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Number Of Article", "manual"),
				"param_name" => "knowledgebase_article_number",
				"value" => array(
					"Four" => "4",
					"Five" => "5",
					"Six" => "6",
					"Seven" => "7",
					"Eight" => "8",
					"Nine" => "9",
					"Ten" => "10",
					)
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Article Order", "manual"),
				"param_name" => "knowledgebase_article_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
			)
		)
) );



/*******************************************
***  ADD VC SC 8 :: AJAX LOAD POST TYPE  ***
********************************************/
vc_map( array(
		"name" => esc_html__("Documentation - Tree View Ajax Load Post", 'manual'), 
		"base" => "manual__vc_ajaxloaddocumentation",
		"icon" => "icon-wpb-icon_text",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Type", 'manual'),
					"param_name" => "post_type",
					"value" => array(
							"Documentation" => "manual_documentation",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Tree Menu Display Order", 'manual'),
					"param_name" => "posttype_records_display_order",
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Tree Menu Display Order By", 'manual'),
					"param_name" => "posttype_records_display_orderby",
					"value" => array(
							'Page Order' => 'menu_order',		 
							'Order by Title' => 'title',
							'Order by Random' => 'rand',
							'Order By Date' => 'date',
							'Order By Last Modified Date' => 'modified',
							'None' => 'none',
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Tree Menu Display Position", 'manual'),
					"param_name" => "posttype_treemenu_display_position",
					"value" => array(
							'Left' => 'left',		 
							'Right' => 'right',
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Post Type Category ID (ONLY single category ID allowed)", "manual" ),
					"param_name" => "cat_id_posttype",
					"value" => "",
					"description" => "Go to 'Documentation > Documentation Categories', edit documentation category; you will see something like this on the URL: \"wp-admin/term.php?taxonomy=manualdocumentationcategory<strong>&tag_ID=13</strong>&post_type=manual_documentation\" <br><br> <strong>Your category ID == 13 (tag_ID=13)</strong><br><br>",
				 ),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Expand All Text", "manual" ),
					"param_name" => "expandalltext",
					"value" => "Expand All",
				 ),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Collapse All Text", "manual" ),
					"param_name" => "collapsealltext",
					"value" => "Collapse All",
				 ),

			)
		)
) );



/*********************************************
***  ADD VC SC 8.1 :: INLINE DOCUMENTATION ***
**********************************************/
vc_map( array(
		"name" => esc_html__("Inline Documentation", 'manual'), 
		"base" => "manual__vc_inlinedocumentation",
		"icon" => "icon-wpb-icon_text",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(	  
			array(  
				  
				  array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Type", 'manual'),
					"param_name" => "post_type",
					"value" => array(
							"Documentation" => "manual_documentation",
						)
				  ),
				  
				  array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Inline Records Display Order", 'manual'),
					"param_name" => "posttype_inlinerec_display_order",
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				  ),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Inline Records Display Order By", 'manual'),
					"param_name" => "posttype_inlinerec_display_orderby",
					"value" => array(
							'Page Order' => 'menu_order',		 
							'Order by Title' => 'title',
							'Order by Random' => 'rand',
							'Order By Date' => 'date',
							'Order By Last Modified Date' => 'modified',
							'None' => 'none',
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Inline Records Display Position", 'manual'),
					"param_name" => "posttype_inlinerec_display_position",
					"value" => array(
							'Left' => 'left',		 
							'Right' => 'right',
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Search Box On|Off", 'manual'),
					"param_name" => "inlineodc_searchonoff",
					"value" => array(
						"On" => "on",
						"Off" => "off",
						),
				),  
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Search Box Text", "manual" ),
					"param_name" => "inlinesearchboxtext",
					"value" => "Search...",
					"dependency" => array('element' => "inlineodc_searchonoff", 'value' => array('on'))
				 ),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Post Type Category ID (ONLY single category ID allowed)", "manual" ),
					"param_name" => "cat_id_posttype",
					"value" => "",
					"description" => "Go to 'Documentation > Documentation Categories', edit documentation category; you will see something like this on the URL: \"wp-admin/term.php?taxonomy=manualdocumentationcategory<strong>&tag_ID=13</strong>&post_type=manual_documentation\" <br><br> <strong>Your category ID == 13 (tag_ID=13)</strong><br><br>",
				 ),
				  
				  
				  
			)
		)	  
) );




/****************************************
***  ADD VC SC 9 :: HOME HELP BLOCKS  ***
*****************************************/
vc_map( array(
		"name" => esc_html__("Home Help Blocks", "manual"), 
		"base" => "manual_theme_home_help_blocks",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				  
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Name (Only For heading, will not display anywhere)", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
			)
		)
) );



/***************************************
***  ADD VC SC 10 :: PORTFOLIO LIST  ***
****************************************/
vc_map( array(
		"name" => esc_html__("Portfolio", "manual"), 
		"base" => "manual_theme_portfolio_sc",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Type", "manual"),
					"param_name" => "portfolio_type",
					"value" => array(
						"Default" => "",
						"FitRows" => "FitRows",
						"Masonry" => "Masonry",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Portfolio Filter", "manual"),
					"param_name" => "portfolio_shorting",
					"value" => array(
						"Default" => "",
						"yes" => "yes",
						"no" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Order", "manual"),
					"param_name" => "sorting_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Filter Order By",
					"param_name" => "sorting_order_by",
					"value" => array(
						"Name" => "name",
						"Slug" => "slug",
						"ID" => "id",
						"Description" => "description"
					),
					"description" => "",
					"dependency" => array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Filter Link Color', "manual"), 
					"param_name" => "shorting_link_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Filter Link Border Color', "manual"), 
					"param_name" => "shorting_link_border_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Align", "manual"),
					"param_name" => "filter_align",
					"value" => array(
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Padding", "manual"),
					"param_name" => "filter_padding",
					"value" => "50px",
					"description" => "Will distribute equal top/bottom height (Default:50px)",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number of portfolio records per page", "manual"),
					"param_name" => "number_of_post",
					"value" => "-1",
					"description" => esc_html__("NOTE: value -1 display all result", "manual"),
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio by Selected Category", "manual"),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio by Selected Projects", "manual"),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => "Enter portfolio ID seprated by comma"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Title Tag", "manual"), 
					"param_name" => "portfolio_title_tag",
					"value" => array(
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"description" => "",
					'std'         => 'h4',
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Order", "manual"),
					"param_name" => "portfolio_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Order By", "manual"),
					"param_name" => "portfolio_order_by",
					"value" => array(
						"Default" => "",
						"Title" => "title",
						"Name" => "name",
						"Date" => "date",
						"Modified" => "modified",
						"Random" => "rand",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Column", "manual"),
					"param_name" => "portfolio_column",
					"value" => array(
						"Default" => "",
						"Two" => "6",
						"Three" => "4",
						"Four" => "3",
						)
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Color', "manual"), 
					"param_name" => "link_color",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Categories",
					"param_name" => "show_categories",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Category Text Color', "manual"), 
					"param_name" => "link_cat_color",
					"description" => "",
					"dependency" => Array('element' => "show_categories", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Custom Description",
					"param_name" => "show_custom_description",
					"value" => array(
						"No"   	=>	"no",
						"Yes"	=>	"yes",
					),
					"description" => ""
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Show Load More', "manual"),
					"param_name" => "show_load_more",
					"value" => array(
						"" => "",
						"Yes" => "yes",
						"No" => "no"	
					),
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More Text Align", "manual"),
					"param_name" => "show_load_more_align",
					"value" => array(
								"Default" => "",
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More margin", "manual"),
					"param_name" => "show_load_more_margin",
					"value" => "20px",
					"description" => "Will distribute equal top/bottom height (Default:20px)",
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
			)
		)
) );


/**************************************
***  ADD VC SC 11 :: MONITOR FRAME  ***
***************************************/
vc_map( array(
		"name" => esc_html__("Monitor Frame", "manual"), 
		"base" => "manual_theme_monitor_frame_portfolio",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Tag", "manual"),
					"param_name" => "title_tag",
					"value" => array(
						"None" => "",
						"h5"  => "h5",
						"h6" => "h6",
						"div" => "div",
						)
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				 ),
				 
				 array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image", "manual"), 
					"param_name" => "portfoio_image"
				),
				
				
			)
		)
) );


/*************************************
***  ADD VC SC 13 :: KB GROUP CAT - REMOVED  ***
**************************************/


			
/*************************************
***  ADD VC SC 14 :: FAQ CATEGORY  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Widget - FAQ Category", "manual"), 
		"base" => "manual_theme_faq_category",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "faq_category_title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show post counts", "manual"),
					"param_name" => "faq_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Text Color', "manual"), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "faq_category_show_post_count", 'value' => array('true'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Background Color', "manual"), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "faq_category_show_post_count", 'value' => array('true'))
				),
				
			)
		)
) );





/****************************************************
***  ADD VC SC 15 :: FAQ SINGLE CATEGORY ARTICLE  ***
*****************************************************/
vc_map( array(
		"name" => esc_html__("FAQ - Single Category Records", "manual"), 
		"base" => "manual_theme_single_faq_article",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				 
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('FAQ Display Style', "manual"), 
					"param_name" => "displaystyle",
					"value" => array(
						'Style 1' => '1',
						'Style 2' => '2',
					),
				), 
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Display Column', "manual"), 
					"param_name" => "faq_column",
					"value" => array(
						'Column 4' => '4',
						'Column 3' => '3',
						'Column 2' => '2',
					),
					"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
				),  
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Display Column', "manual"), 
					"param_name" => "faq_title_tag",
					"value" => array(
						'H2' => 'h2',
						'H3' => 'h3',
						'H4' => 'h4',
						'H5' => 'h5',
						'H6' => 'h6',
					),
					"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
				),  
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Background Color",
					"param_name" => "bg_color",
					"description" => "",
					"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Text Color",
					"param_name" => "tag_color",
					"description" => "",
					"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
				),
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Post Per Page", "manual"),
					"param_name" => "page_per_post",
					"value" => "-1",
					"description" => "Note: -1 shows all post",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Title', "manual"), 
					"param_name" => "custom_title",
					"value" => array(
						'' => '',
						'Yes' => 'yes',
						'No' => 'no',
					),
					"dependency" => Array('element' => "displaystyle", 'value' => array('1')),
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Font Size', "manual"), 
					"param_name" => "title_font_size",
					"value" => "19px",
					"description" => "Default: 19px",
					"dependency" => Array('element' => "custom_title", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Text Font Weight",
					"param_name" => "text_font_weight",
					"value" => array(
						"Default" => "",
						"Thin 100" => "100",
						"Extra-Light 200" => "200",
						"Light 300" => "300",
						"Regular 400" => "400",
						"Medium 500" => "500",
						"Semi-Bold 600" => "600",
						"Bold 700" => "700",
						"Extra-Bold 800" => "800",
						"Ultra-Bold 900" => "900"
					),
					'std'         => '600', 
					"dependency" => Array('element' => "custom_title", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Text Transform",
					"param_name" => "text_transform",
					"value" => array(
						"Default" 			=> "uppercase",
						"None"				=> "none",
						"Capitalize" 		=> "capitalize",
						"Uppercase"			=> "uppercase",
						"Lowercase"			=> "lowercase"
					),
					"description" => "",
					'std'         => 'none',
					"dependency" => Array('element' => "custom_title", 'value' => array('yes'))
				),
					
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order", "manual"),
					"param_name" => "post_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order By", "manual"),
					"param_name" => "post_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Include Child Post", "manual"),
					"param_name" => "include_child_post",
					"value" => array(
							"yes" => "yes",
							"No" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Hide Pagination", "manual"),
					"param_name" => "hidepagination",
					"value" => array(
							"1" => "No",
							"2" => "Yes",
						)
				),
				 
			    array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Category ID (ENTER ONLY SINGLE ID)", "manual" ),
					"param_name" => "faqsinglecatid",
					"value" => "",
					"description" => "<strong>How to find FAQ category ID??</strong> <br><br> 1. Click On \"FAQs &minus;&gt; FAQs Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\" You like to display, You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=manualfaqcategory<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				),
		 
					
			)
		)
) );



if ( class_exists('bbPress') ) { 
	/**************************************
	***  ADD VC SC 16 :: BBPRESS LOGIN  ***
	***************************************/
	vc_map( array(
			"name" => esc_html__("bbPress - Login", "manual"), 
			"base" => "theme_maual_bbpress_login",
			"icon" => "icon-wpb-icon_text",
			"category" => 'Manual BBPress',
			"allowed_container_element" => 'vc_row',
			"params" => array(
			
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => "Login Text",
						"param_name" => "bbpress_login",
						"description" => "Custom Login Text"
					),
					
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Text Color",
						"param_name" => "text_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Button Background Color",
						"param_name" => "button_bg_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Button Text Color",
						"param_name" => "button_text_color",
						"description" => "",
					),
					
					array(
						"type"        => "vc_link",
						"class"       => "",
						"heading"     => esc_html__("Register Link", "manual"),
						"param_name"  => "register_link_url",
						"value"       => "",
						"description" => esc_html__("Register Link URL", "manual"),
					),

					array(
						"type"        => "vc_link",
						"class"       => "",
						"heading"     => esc_html__("Lost Password Link", "manual"),
						"param_name"  => "lost_password_link_url",
						"value"       => "",
						"description" => esc_html__("Lost Password Link URL", "manual"),
					),
	
			)
	) );
	
	
	/*****************************************
	***  ADD VC SC 17 :: BBPRESS REGISTER  ***
	******************************************/
	vc_map( array(
			"name" => esc_html__("bbPress - Register", "manual"), 
			"base" => "theme_maual_bbpress_register",
			"icon" => "icon-wpb-icon_text",
			"category" => 'Manual BBPress',
			"allowed_container_element" => 'vc_row',
			"params" => array(
			
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => "Message",
						"param_name" => "bbpress_register_msg",
						"value" => "",
						"description" => 'The pre-define message will overwrite',
					),
					
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Message Text Color",
						"param_name" => "text_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Button Background Color",
						"param_name" => "button_bg_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Button Text Color",
						"param_name" => "button_text_color",
						"description" => "",
					),

			)
	) );
	
	
	/**********************************************
	***  ADD VC SC 18 :: BBPRESS LOST PASSWORD  ***
	***********************************************/
	vc_map( array(
			"name" => esc_html__("bbPress - Lost Password", "manual"), 
			"base" => "theme_maual_bbpress_lost_password",
			"icon" => "icon-wpb-icon_text",
			"category" => 'Manual BBPress',
			"allowed_container_element" => 'vc_row',
			"params" => array(
			
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Button Background Color",
						"param_name" => "button_bg_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => "Button Text Color",
						"param_name" => "button_text_color",
						"description" => "",
					),
			
			)
	) );
	
} // Eof bbpress



	
/**********************************************
***  ADD VC SC 19 :: PORTFOLIO ITEM WRAP  *****
***********************************************/
vc_map( array(
		"name" => esc_html__("Item Frame", "manual"), 
		"base" => "manual_portfolio_item_frame",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				 ),
				 
				 array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image", "manual"), 
					"param_name" => "portfoio_image"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Image Position",
					"param_name" => "position",
					"value" => array(
						"Center" => "center",	
						"Left" => "left",
						"Right" => "right",	
					),
					'save_always' => true,
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Margin", "manual"),
					"param_name" => "margin",
					"value" => "",
					"description" => "example: 0px 0px 0px 0px (top, right, bottom, left)",
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Apply Image Box Shadow", "manual"),
					"param_name" => "image_border_shadow",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Image Box CSS Animation', "manual"), 
					"param_name" => "box_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => "",
				),
				
			)
		)
) );




/********************************
***  ADD VC SC 20 :: BUTTON *****
*********************************/
vc_map( array(
		"name" => esc_html__("Button", "manual"), 
		"base" => "manual_sc_button_url",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Botton Margin", "manual"),
					"param_name" => "bottom_margin",
					"value" => "0px 0px 0px 0px",
					"description" => "(Default: 0px 0px 0px 0px;) == top right button left (Include px)",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Botton CSS Animation', "manual"), 
					"param_name" => "button_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => ""
				),
			
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				),
				 
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Align', "manual"),
					"param_name" => "link_align",
					"value" => array(
						"Left" => "left",
						"Center" => "center",
						"Right" => "right",
					),
					'save_always' => true,
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text Color', "manual"),
					"param_name" => "link_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Text Size", "manual"),
					"param_name" => "text_size",
					"value" => "",
					"description" => "Include px example:17px",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Text Padding", "manual"),
					"param_name" => "text_padding",
					"value" => "",
					"description" => "Default: 0px 22px; (top/button left/right) Include px",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Color', "manual"),
					"param_name" => "button_color",
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Hover Color', "manual"),
					"param_name" => "button_hover_color",
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Remove Border Bottom', "manual"),  
					"param_name" => "remove_border_buttom",
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Remove Text Shadow', "manual"),  
					"param_name" => "remove_text_shadow",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Radius', "manual"),  
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Include px (example: 3px)"
				),
			
			)
		)
) );



/*************************************
***    ADD VC :: SERVICE TABLE     ***
**************************************/
vc_map( array(
"name" => esc_html__("Service Table", "manual"),
"base" => "manual_service_table_section",
"category" =>  esc_html__('Manual', "manual"),
"as_parent" => array('only' => 'manual_service_option'),
"content_element" => true,
"icon" => "icon-wpb-service_column",
"show_settings_on_create" => true,
"js_view" => 'VcColumnView',
"params"            => array(
			 array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_html__("Title", "manual"),
				"param_name"  => "title",
				"value"       => "",
				"description" => esc_html__("The title of the service section", "manual")
			 ),
			 
			 array(
				"type"        => "textfield",
				"class"       => "",
				"heading"     => esc_html__("Icon Image", "manual"),
				"param_name"  => "iconimage",
				"value"       => "",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name"
			 ),
			 
			 array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Icon Color', "manual"), 
				"param_name" => "icon_color",
				"description" => "",
			),
			 
			array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_html__("Description", "manual"),
				"param_name"  => "description",
				"value"       => "",
				"description" => esc_html__("short info", "manual")
			),
			
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Description Text Color', "manual"), 
				"param_name" => "description_text_color",
				"description" => "",
			),
			
			array(
				"type"        => "vc_link",
				"class"       => "",
				"heading"     => esc_html__("Link", "manual"),
				"param_name"  => "link",
				"value"       => "",
				"description" => esc_html__("Link URL", "manual")
			 ),
			
			 array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Box Font Color', "manual"), 
				"param_name" => "box_font_color",
				"description" => "",
			),
			 
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Link Text Color', "manual"), 
				"param_name" => "link_text_color",
				"description" => "",
			),
			
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Box Background Color', "manual"), 
				"param_name" => "background_color",
				"description" => "",
			),
			
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Box Border Color', "manual"), 
				"param_name" => "box_border_color",
				"description" => "",
			),
  )
) );

vc_map( array(
  "name"              => esc_html__("Service Option", "manual"),
  "base"              => "manual_service_option",
  "content_element"   => true,
  "as_child"          => array('only' => 'manual_service_table'),
  "category"          => esc_html__('Manual', "manual"),
  "icon"              => "icon-wpb-service_column",
  "params"            => array(
							   
							 array(
								"type"        => "textarea_html",
								"holder"      => "div",
								"class"       => "",
								"heading"     => esc_html__("Option Text", "manual"),
								"param_name"  => "content",
								"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
								"description" => esc_html__("An option this Service table includes", "manual")
							 ),
	
  )
) );
   
  
/*************************************
***    ADD VC :: PRICING TABLE    ***
**************************************/

vc_map( array(
"name" => esc_html__("Pricing Table", "manual"),
"base" => "manual_pricing_table_section",
"category" =>  esc_html__('Manual', "manual"),
"as_parent" => array('only' => 'manual_pricing_option'),
"content_element" => true,
"icon" => "icon-wpb-pricing_column",
"show_settings_on_create" => true,
"js_view" => 'VcColumnView',
"params"            => array(
							 
			 array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_html__("Title", "manual"),
				"param_name"  => "title",
				"value"       => "",
				"description" => esc_html__("The title of the service section", "manual")
			 ),
			 
			 array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Price", "manual"), 
				"param_name" => "price",
				"description" => ""
			 ),
			 
			 array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Currency", "manual"),
				"param_name" => "currency",
				"description" => ""
			 ),
			
			 array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Price Period", "manual"),
				"param_name" => "price_period",
				"description" => ""
			 ),
			 
			 array(
				"type"        => "vc_link",
				"class"       => "",
				"heading"     => esc_html__("Button Link", "manual"),
				"param_name"  => "link",
				"value"       => "",
				"description" => esc_html__("Link URL", "manual")
			 ),
			 
			 array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Make Box Standout", "manual"),
				"param_name" => "active",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"	
				),
				'save_always' => true,
				"description" => "",
			 ),
			 
			 array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Background Color', "manual"), 
				"param_name" => "background_color",
				"description" => "",
			 ),
			 
			 array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__('Text Color', "manual"), 
				"param_name" => "text_color",
				"description" => "",
			 ),
			 
			 array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Box Border Color', "manual"), 
				"param_name" => "box_border_color",
				"description" => "",
			 ),
			 
			 array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Button Color', "manual"),
				"param_name" => "buttom_color",
				"value" => array(
					"" => "",
					"Button Default" => "btn-default",
					"Button Primary" => "btn-primary",
					"Button Success" => "btn-success",
					"Button Info" => "btn-info",
					"Button Warning" => "btn-warning",
					"Button Danger" => "btn-danger",
					"Button Link" => "btn-link",
				),
				"description" => "",
			 ),
		
  )
) );

vc_map( array(
  "name"              => esc_html__("Pricing Option", "manual"),
  "base"              => "manual_pricing_option",
  "content_element"   => true,
  "as_child"          => array('only' => 'manual_pricing_table'),
  "category"          => esc_html__('Manual', "manual"),
  "icon"              => "icon-wpb-pricing_column",
  "allowed_container_element" => 'vc_row',
  "params"            => array(
							   
							 array(
								"type"        => "textarea_html",
								"holder"      => "div",
								"class"       => "",
								"heading"     => esc_html__("Option Text", "manual"),
								"param_name"  => "content",
								"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
								"description" => esc_html__("An option this Service table includes", "manual")
							 ),
	 
  )
) );
   
/*******
SUPPORT PARM ::	EXTRA PROCESS
********/
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
   class WPBakeryShortCode_Manual_Service_Table_Section extends WPBakeryShortCodesContainer {}
   class WPBakeryShortCode_Manual_Pricing_Table_Section extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
   class WPBakeryShortCode_Manual_Service_Option extends WPBakeryShortCode {}
   class WPBakeryShortCode_Manual_Pricing_Option extends WPBakeryShortCode {}
}
?>