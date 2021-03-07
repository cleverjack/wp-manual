<?php
/*-----------------------------------------------------------------------------------*/
/*	 HAMBURGER MENU & SEARCH BOX ON THE NAVIGATION BAR
/*-----------------------------------------------------------------------------------*/

add_filter( 'cmb2_admin_init', 'manual_page_menu_metaboxes' );
function manual_page_menu_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_menu_options',
        'title'         => esc_html__( '\'Hamburger Menu & Search Box\' On The Navigation Bar', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hamburger Menu', 'manual' ),
		'desc' => esc_html__( 'On checked, The navigation header menu will be replaced by hamburger menu', 'manual' ),
		'id'   => $prefix .'header_display_hamburger_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Search Box On The Menu Bar', 'manual' ),
		'desc' => 'On checked, The search box will appear on the menu bar. <br><br><strong>NOTE: Hamburger Menu MUST Activate</strong>',
		'id'   => $prefix .'header_display_search_box_on_menu_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Modern Search Design', 'manual' ),
		'desc' => esc_html__( 'On checked, Standard search design will be replaced by modern layout', 'manual' ),
		'id'   => $prefix .'header_display_search_box_modern_on_menu_bar',
		'type' => 'checkbox'
	) );
	
}
 
/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_metaboxes' );
function manual_page_metaboxes() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_options',
        'title'         => esc_html__( 'Navigation Style Controls', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Header Menu Bar Type', 'manual' ),
		'desc'             => 'Select an option',
		'id'               => $prefix .'nav_style_type',
		'type'             => 'select',
		'default'          => 'custom',
		'options'          => array(
			'custom'   => esc_html__( 'With Transparent Background', 'manual' ),
			'standard' => esc_html__( 'Without Background (White Backgorund)', 'manual' ),
			),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hide Navigation Area Initially', 'manual' ),
		'desc' => 'Enabling this option will initially hide the header, and it will only display when user scrolls down the page. (NOTE: Sticky Menu, must be enable to display menu)" )',
		'id'   => $prefix .'header_hide_menu_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add Nav Background', 'manual' ),
		'desc' => 'If checked, transparent background will be added on the header nav bar.',
		'id'   => $prefix .'remove_nav_header_bg_opacity',
		'type' => 'checkbox'
	) );
	
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Nav Background Color', 'manual' ),
		'id'      => $prefix .'nav_header_bg_color',
		'type'    => 'colorpicker',
		'default' => '#35373F',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Nav Background Color Opacity', 'manual' ),
		'default' => '',
		'id'      => $prefix .'nav_header_bg_color_opacity',
		'type'    => 'text_small',
		'desc' => 'Default: 0.3 (Make sure opacity value is between 0.1 to 0.9)',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add Nav Border Bottom', 'manual' ),
		'desc' => 'If checked, transparent border will be added on the header nav bar (works best with header type "Transparent Background")',
		'id'   => $prefix .'remove_nav_border_line',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Border Bottom Color', 'manual' ),
		'id'      => $prefix .'nav_border_color',
		'type'    => 'colorpicker',
		'default' => '#949494',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Border Bottom Color Opacity', 'manual' ),
		'default' => '0.6',
		'id'      => $prefix .'nav_border_opacity',
		'type'    => 'text_small',
		'desc' => 'Default: 0.6 (Make sure opacity value is between 0.1 to 0.9)',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add Nav Box Shadow', 'manual' ),
		'desc' => 'If checked, box shadow will be added on the header nav bar.',
		'id'   => $prefix .'remove_nav_box_shadow',
		'type' => 'checkbox'
	) );
	
}

/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_metaboxes_header_control' );
function manual_page_metaboxes_header_control() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_header_control_options',
        'title'         => esc_html__( 'Page Header Controls', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hide Header', 'manual' ),
		'desc' => 'Check to hide header section that appear right after logo & menu bar.',
		'id'   => $prefix .'header_hide_header_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate Search Box', 'manual' ),
		'desc' => 'If checked, ajax search box will appear on the header',
		'id'   => $prefix .'header_searh_box',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Search Box Display Column Layout', 'manual' ),
		'desc'             => 'Select an option',
		'id'               => $prefix .'search_box_display_grid',
		'type'             => 'select',
		'default'          => '5',
		'classes'          => 'theme_metabox_margin_left_50',
		'options'          => array(
			'center' => esc_html__( 'Exact Center', 'manual' ),
			'6' => esc_html__( '50% Width', 'manual' ),
			'7' => esc_html__( '58% Width', 'manual' ),
			'8' => esc_html__( '66% Width', 'manual' ),
			'9' => esc_html__( '75% Width', 'manual' ),
			'10'  => esc_html__( '83% Width', 'manual' ),
			'11'  => esc_html__( '91% Width', 'manual' ),
			'12'  => esc_html__( '100% Width', 'manual' ),
			),
	) );
	
	
	$cmb->add_field( array(
		'name'    => 'Re-adjust Header Padding (Height)',
		'desc'    => 'default: 120 <strong>(omit px)</strong>',
		'default' => '',
		'id' => $prefix . 'header_re_adjust_padding',
		'type'    => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Page Header Background Color', 'manual' ),
		'desc' => 'Background color <strong>will NOT work</strong> if uploaded Header Image and checked option <strong>\'Apply Parallax Effect For the Upload Image\'</strong> ',
		'id'   => $prefix .'header_background_color',
		'type' => 'colorpicker'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Page Header Background Linear Gradient Color', 'manual' ),
		'desc' => '<strong style="color:#e6614b;">NOTE: Page Header Background Color must be enable to activate this feature.</strong>',
		'id'   => $prefix .'header_background_color_linear',
		'type' => 'colorpicker',
		'classes' => 'theme_metabox_margin_left_50',
	) );

	
	$cmb->add_field( array(
		'name' => esc_html__( 'Force apply white logo and white menu bar text for the selected \'Page Header Background Color\'', 'manual' ),
		'desc' => 'Apply white logo and white text color for the menu bar <br><strong style="color:#e6614b;">Works only if applied  "Header Menu Bar Type == Transparent Background" </strong>',
		'id'   => $prefix .'header_background_color_force_white',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Page Header Image', 'manual' ), 
		'desc'    => esc_html__( 'Upload image for your header (Note: Does not work if, place slider revolution shortcode or select <strong>Template as "Home Page") ' , 'manual' ),
		'id'      => $prefix .'header_image',
		'type'    => 'file',
		'options' => array(
			'url' => true, // Hide the text input for the url
			'add_upload_file_text' => 'Add Or Upload File' // Change upload button text. Default: "Add or Upload File"
		),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Force apply black logo and black menu bar text for the selected \'Page Header Image\'', 'manual' ),
		'desc' => '<strong style="color:#e6614b;">Works only if applied  "Header Menu Bar Type == Transparent Background" </strong>',
		'id'   => $prefix .'header_background_img_force_black',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Background Image Display Position', 'manual' ),
		'desc'             => 'Option does not work if applied Parallax Effect',
		'id'               => $prefix .'background_img_display_position',
		'type'             => 'select',
		//'show_option_none' => true,
		'default'          => 'center center',
		'classes' => 'theme_metabox_margin_left_50',
		'options'          => array(
			'center top'      => esc_html__( 'Center Top', 'manual' ),
			'center center'   => esc_html__( 'Center Center', 'manual' ),
			'center bottom'   => esc_html__( 'Center Bottom', 'manual' ),
			),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
		'desc' => esc_html__( 'If checked, Background Opacity will activate', 'manual' ),
		'id'   => $prefix .'header_bk_opacity_effect',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Background Opacity Color For the Upload Image', 'manual' ),
		'id'   => $prefix .'header_background_bg_cover_opacity_color',
		'type' => 'colorpicker',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Background Color Opacity Depth', 'manual' ),
		'default' => '0.3',
		'id'      => $prefix .'bg_color_opacity_depth',
		'type'    => 'text_small',
		'desc' => 'Default:0.3 (Make sure opacity value is between 0.1 to 0.9)',
		'classes' => 'theme_metabox_margin_left_100',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Apply Parallax Effect For the Upload Image', 'manual' ),
		'desc' => esc_html__( 'If checked, Parallax effect will activate', 'manual' ),
		'id'   => $prefix .'header_parallax_effect',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Slider Revolution ShortCode', 'manual' ),
		'desc'    => 'Will replace header image or background color (Copy and paste your shortcode located in "Slider Revolution -> Slider Revolution -> Embed Slider")',
		'id'      => $prefix .'slider_rev_shortcode',
		'type'    => 'text',
	) );
	
}

/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_metaboxes_header_text_control' );
function manual_page_metaboxes_header_text_control() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_header_text_control_options',
        'title'         => esc_html__( 'Page Header Text Controls', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Text Alignment', 'manual' ),
		'desc'             => esc_html__( 'Header Content alignment', 'manual' ),
		'id'               => $prefix .'text_align_title_and_desc',
		'type'             => 'select',
		'default'          => 'center',
		'options'          => array(
			'left'    => esc_html__( 'Left', 'manual' ),
			'center'  => esc_html__( 'Center', 'manual' ),
			'right'   => esc_html__( 'Right', 'manual' ),
			),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Disable Main/Replacement Title', 'manual' ),
		'desc' => esc_html__( 'If checked, title will be disable', 'manual' ),
		'id'   => $prefix .'header_no_title',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Replacement Title', 'manual' ),
		'desc'    => esc_html__( 'New page tagline', 'manual' ), 
		'id'      => $prefix.'page_tagline',
		'type'    => 'text',
		'sanitization_cb' => 'manual_sanitization_func',
	) );
	
	   // [+] Replacement Title Text Style
	
		$cmb->add_field( array(
			'name'    => esc_html__( 'Title Color', 'manual' ),  
			'id'      => $prefix . 'page_tagline_color',
			'type'    => 'colorpicker',
			'desc'    => '<strong>Default: #4d515c</strong>  (NOTE: for image background use #FFFFFF)',
		) );
		
		$cmb->add_field( array(
			'name'    => esc_html__( 'Title Size', 'manual' ),
			'desc'    => '<strong>(omit px)</strong> (please enter as: 36)',
			'id'   => $prefix . 'page_tagline_size',
			'type'    => 'text_small'
		) );
		
		$cmb->add_field( array(
			'name'             => esc_html__( 'Title Weight', 'manual' ),
			'id'      		   => $prefix . 'page_tagline_weight',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => '',
			'options'          => array(
				 '' 	  => esc_html__( '' ),
				'100' 	  => esc_html__( 'Thin 100', 'manual' ),
				'200'     => esc_html__( 'Extra-Light 200', 'manual' ),
				'300'     => esc_html__( 'Light 300', 'manual' ),
				'400'     => esc_html__( 'Regular 400', 'manual' ),
				'500'     => esc_html__( 'Medium 500', 'manual' ),
				'600'     => esc_html__( 'Semi-Bold 600', 'manual' ),
				'700'     => esc_html__( 'Bold 700', 'manual' ),
				'800'     => esc_html__( 'Extra-Bold 800', 'manual' ),
				'900'     => esc_html__( 'Ultra-Bold 900', 'manual' ),
			),
		) );
		
		$cmb->add_field( array(
			'name'             => esc_html__( 'Title Font Family', 'manual' ),
			'id'     		   => $prefix . 'page_tagline_font_family',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => array(
				''   => esc_html__( '' ),
				'Open Sans' => esc_html__( 'Open Sans', 'manual' ),
				 'Raleway' => esc_html__( 'Raleway', 'manual' ),
				 'Lato' => esc_html__( 'Lato', 'manual' ),
				 'Roboto' => esc_html__( 'Roboto', 'manual' ),
				 'Montserrat' => esc_html__( 'Montserrat', 'manual' ),
			),
		) );
		
		$cmb->add_field( array(
			'name'             => esc_html__( 'Title Text Transform', 'manual' ),
			'id'      		   => $prefix . 'header_title_text_transform',
			'type'             => 'select',
			'show_option_none' => false,
			'options'          => array(
				'' => esc_html__(''),
				'uppercase' => esc_html__( 'Uppercase', 'manual' ),
				'capitalize'   => esc_html__( 'Capitalize', 'manual' ),
				'none'   => esc_html__( 'None', 'manual' ),
			),
		) );
		
		$group_field_title_text_extra_settings = $cmb->add_field( array(
			'id'          => $prefix.'extra_title_text_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Extra Title Text Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
		'name'    => esc_html__( 'Padding', 'manual' ),
		'desc'    => '<strong>Default: 0px 0px 0px 0px (top right buttom left)</strong> ',
		'default' => '',
		'id'      => 'title_text_padding',
		'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
		'name'    => esc_html__( 'Margin', 'manual' ),
		'desc'    => '<strong>Example: 0px 0px 0px 0px (top right buttom left)</strong> ',
		'default' => '',
		'id'      => 'title_text_margin',
		'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
		'name'    => esc_html__( 'Line Height', 'manual' ),
		'desc'    => 'example:35px',
		'default' => '',
		'id'      => 'title_text_line_height',
		'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
		'name'    => esc_html__( 'Letter Spacing', 'manual' ),
		'desc'    => 'example:-1px or 0.4px etc...',
		'default' => '',
		'id'      => 'title_text_letter_spacing',
		'type'    => 'text'
		) );
		
	   // Eof [+] Replacement Title Text Style
	
		$cmb->add_field( array(
			'name'    => esc_html__( 'Subtitle Text', 'manual' ),
			'desc'    => esc_html__( 'Enter your subtitle text (will appear under title)', 'manual' ), 
			'id'   => $prefix . 'page_desc',
			'type'    => 'text',
			'sanitization_cb' => 'manual_sanitization_func',
		) );

		// [+] Replacement Sub-Title Text Style

		$group_field_subtitle_text_other_settings = $cmb->add_field( array(
			'id'          => $prefix.'subtitle_text_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Subtitle Text Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Text Color', 'manual' ),  
			'id'      => 'title_text_color',
			'type'    => 'colorpicker',
			'desc'    => '<strong>Default: #989CA6</strong>  (NOTE: for image background use #FFFFFF)',
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Text Size', 'manual' ),
			'desc'    => '<strong>Default:18px</strong> (please enter as: 15px)',
			'id'      => 'title_text_size',
			'type'    => 'text_small'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'             => esc_html__( 'Title Weight', 'manual' ),
			'id'               => 'title_text_weight',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => '400',
			'desc'    => '<strong>Default: Regular 400</strong>',
			'options'          => array(
				'100' => esc_html__( 'Thin 100', 'manual' ),
				'200'   => esc_html__( 'Extra-Light 200', 'manual' ),
				'300'     => esc_html__( 'Light 300', 'manual' ),
				'400'     => esc_html__( 'Regular 400', 'manual' ),
				'500'     => esc_html__( 'Medium 500', 'manual' ),
				'600'     => esc_html__( 'Semi-Bold 600', 'manual' ),
				'700'     => esc_html__( 'Bold 700', 'manual' ),
				'800'     => esc_html__( 'Extra-Bold 800', 'manual' ),
				'900'     => esc_html__( 'Ultra-Bold 900', 'manual' ),
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'             => esc_html__( 'Font Family', 'manual' ),
			'id'               => 'subtitle_font_family',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => array(
				 'Open Sans' => esc_html__( 'Open Sans', 'manual' ),
				 'Raleway' => esc_html__( 'Raleway', 'manual' ),
				 'Lato' => esc_html__( 'Lato', 'manual' ),
				 'Roboto' => esc_html__( 'Roboto', 'manual' ),
				 'Montserrat' => esc_html__( 'Montserrat', 'manual' ),
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'             => esc_html__( 'Text Transform', 'manual' ),
			'id'               => 'subtitle_text_transform',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'desc'    => '<strong>Default: none</strong>',
			'options'          => array(
				'uppercase' => esc_html__( 'Uppercase', 'manual' ),
				'capitalize'   => esc_html__( 'Capitalize', 'manual' ),
				'none'     => esc_html__( 'None', 'manual' ),
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Padding', 'manual' ),
			'desc'    => '<strong>Default: 0px 0px 0px 0px (top right buttom left)</strong> ',
			'default' => '',
			'id'      => 'sub_title_text_padding',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Line Height', 'manual' ),
			'desc'    => 'example:35px',
			'default' => '',
			'id'      => 'sub_title_text_line_height',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
		'name'    => esc_html__( 'Letter Spacing', 'manual' ),
		'desc'    => 'example:-1px or 0.4px etc...',
		'default' => '',
		'id'      => 'sub_title_text_letter_spacing',
		'type'    => 'text'
		) );

	   // Eof [+] Sub Title Text Style
	  
		$cmb->add_field( array(
			'name' => esc_html__( 'Activate Breadcrumb', 'manual' ),
			'desc' => esc_html__( 'If checked, breadcrumb will be activate', 'manual' ),
			'id'   => $prefix .'header_breadcrumb_status',
			'type' => 'checkbox'
		) );
		
		$group_breadcrumb_other_settings = $cmb->add_field( array(
			'id'          => $prefix.'breadcrumb_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Breadcrumb Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $group_breadcrumb_other_settings, array(
			'name'    => esc_html__( 'Text Color', 'manual' ),  
			'id'      => 'text_color',
			'type'    => 'colorpicker',
			'desc'    => 'NOTE: for image background use #F4F4F4',
		) );
	
		$cmb->add_group_field( $group_breadcrumb_other_settings, array(
			'name'    => esc_html__( 'Link Text Color', 'manual' ),  
			'id'      => 'link_text_color',
			'type'    => 'colorpicker',
			'desc'    => 'NOTE: for image background use #FFFFFF',
		) );
	
		$cmb->add_group_field( $group_breadcrumb_other_settings, array(
			'name'    => esc_html__( 'Link Text Hover Color', 'manual' ),  
			'id'      => 'link_text_hover_color',
			'type'    => 'colorpicker',
			'desc'    => 'NOTE: for image background use #d8d3d3',
		) );
		
		$trending_search_settings = $cmb->add_field( array(
			'id'          => $prefix.'trending_search_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Trending Search Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $trending_search_settings, array(
			'name'    => esc_html__( 'Search Text Color', 'manual' ),  
			'id'      => 'text_color',
			'type'    => 'colorpicker',
			'desc'    => 'NOTE: for image background use #F4F4F4',
		) );
	
		$cmb->add_group_field( $trending_search_settings, array(
			'name'    => esc_html__( 'Search Link Text Color', 'manual' ),  
			'id'      => 'link_text_color',
			'type'    => 'colorpicker',
			'desc'    => 'NOTE: for image background use #FFFFFF',
		) );
	
		$cmb->add_group_field( $trending_search_settings, array(
			'name'    => esc_html__( 'Search Link Text Hover Color', 'manual' ),  
			'id'      => 'link_text_hover_color',
			'type'    => 'colorpicker',
			'desc'    => 'NOTE: for image background use #d8d3d3',
		) );
	  
}

/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_footer_metaboxes' );
function manual_page_footer_metaboxes() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_footer_options',
        'title'         => esc_html__( 'Page Footer Controls', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Forcely De-activate Footer Widget Area', 'manual' ),
		'desc' => esc_html__( 'Will de-activate footer widget area', 'manual' ),
		'id'   => $prefix .'footer_force_hide_widget_area',
		'type' => 'checkbox'
	) );
	
}
?>