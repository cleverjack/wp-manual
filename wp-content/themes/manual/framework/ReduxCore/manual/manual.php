<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";    // ==== IMPORTANT

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /**
     * ---> SET ARGUMENTS
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Manual Options', 'manual' ),
        'page_title'           => __( 'Manual Options', 'manual' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'theme_options',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
		'forced_dev_mode_off'  => true,
		'use_cdn'              => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'manual' ),
    );

    $args['admin_bar_links'][] = array(
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'manual' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'manual' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/TheWpSmartApps',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/wpsmartapps',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );


    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
    } else {
    }


    Redux::setArgs( $opt_name, $args );

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'manual' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'manual' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'manual' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'manual' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'manual' );
    Redux::setHelpSidebar( $opt_name, $content );



/***************************************
*******  THEME OPTIONS  - LOGO     *****
****************************************/

	 Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'manual' ),
        'id'     => 'theme-header-logo-settings',
		'icon'   => 'el el-plus-sign',
        'fields' => array(
			
			array (
				'subtitle' => esc_html__('Choose a favicon image to be displayed', 'manual'),
				'id' => 'manual-favicon',
				'type' => 'media',
				'title' => esc_html__('Favicon Image', 'manual'),
				'url' => true,
			),
		
            array(
                'id'       => 'theme-header-logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Logo Image - Dark Logo', 'manual' ),
				'url' => true,
				'subtitle' => esc_html__('Choose a default logo image to display', 'manual'),
				'desc' => esc_html__( 'Standard logo size: 479(X)105px', 'manual' ),
            ),
			
		    array(
                'id'       => 'theme-nav-homepg-logo-when-img-bg',
                'type'     => 'media',
				'url' => true,
                'title'    => esc_html__( 'Theme White Logo', 'manual' ),
				'subtitle' => esc_html__( 'Applyed white logo if found image background', 'manual' ),
				'desc' => esc_html__( 'Standard image size: 479(X)105px', 'manual' ),
            ),
			
			array(
				'id'       => 'theme-custom-site-url',
				'type'     => 'text',
				'title'    => esc_html__('Your custom site URL', 'manual'),
				'subtitle' => esc_html__('Onclick logo system will redirect to custom site URL', 'manual'),
			),
			
			array(
				'id'       => 'hide-header-logo-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hide Logo', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( 'Global Effect', 'manual' ),
			),
			
			// Readjust Logo
			array(
                'id'       => 'readjust-logo-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Logo Adjustment', 'manual' ),
                'subtitle' => esc_html__( 'Readjust logo if needed', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme-logo-readjust-height',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Logo Height', 'manual'),
				'desc'     => esc_html__('Default: 35', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '35'
					)
			),
			
			array(
				'id'       => 'theme-logo-readjust-margin-top',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Logo Top Margin', 'manual'),
				'desc'     => esc_html__('Default: -6', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-6'
					)
			),
			
			array(
				'id'       => 'theme-logo-readjust-height-responsive',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Responsive (Logo Height)', 'manual'),
				'desc'     => esc_html__('Default: 35', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '35'
					)
			),
			
			array(
				'id'       => 'theme-logo-readjust-margin-top-responsive',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Responsive (Logo Top Margin)', 'manual'),
				'desc'     => esc_html__('Default: -6', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-6'
					)
			),
			
			// Sticky Menu
			array(
                'id'       => 'readjust-sticky-logo-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Sticky Menu', 'manual' ),
                'subtitle' => esc_html__( 'Readjust sticky menu if needed', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme-sticky-menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Menu', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( 'Enable or disable sticky menu (Global Effect)', 'manual' ),
			),
			
			array(
				'id'       => 'theme-logo-readjust-sticky-height',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Logo Height', 'manual'),
				'desc'     => esc_html__('Default: 27', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '27'
					)
			),
			
			array(
				'id'       => 'theme-logo-readjust-sticky-margin-top',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Logo Top Margin', 'manual'),
				'desc'     => esc_html__('Default: -18', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-18px'
					)
			),
			
        )
    ) );
	 

/***************************************
*******  THEME OPTIONS  - TYPOGRAPHY ***
****************************************/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'manual' ),
        'id'     => 'typography',
        'icon'   => 'el el-font',
        'fields' => array(
			
			// Body
            array(
                'id'       => 'theme-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'manual' ),
                'subtitle' => esc_html__('Specify the body font properties.', 'manual' ),
                'google'   => true,
				'text-align' => false,
				'font-style' => false,
				'letter-spacing' => true,
				'subsets' => false,
				'units'  => '',
                'default'  => array(
                    'color'       => '#333333', //424242
                    'font-size'   => '14',
                    'font-family' => 'Open Sans',
					'line-height' => '1.7',
					'letter-spacing' => '0.3',
					'google'      => true,
					'font-weight' => '400',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, Body Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-body-font',
				'type' => 'text',
				'title' => esc_html__('Body Custom Font Family Name', 'manual'),
			),
			
			// Navigation
			array(
                'id'       => 'typography-nav-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Navigation Style', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme-typography-nav',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'manual' ),
                'subtitle' => esc_html__('Specify the navigation font properties.', 'manual' ),
                'google'   => true,
				'text-align' => false,
				'font-weight' => false,
				'font-style' => false,
				'letter-spacing' => true,
				'subsets' => false,
				'color' => false,
				'font-size' => false,
				'line-height' => false,
				'letter-spacing' => false,
				'units'  => '',
				'desc' => '<strong style="color:#9573f7">Please go to: "Custom Style > Header Menu" for remaining settings</strong>',
                'default'  => array(
                    'font-family' => 'Raleway',
					'google'      => true,
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, Nav Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-nav-font',
				'type' => 'text',
				'title' => esc_html__('Nav Custom Font Family Name', 'manual'),
			),
			
			// H1
			array(
                'id'       => 'typography-h1-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Font Style', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
                'id'          => 'theme-h1-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H1 style', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '800',
                    'font-family' => 'Raleway',
                    'google'      => true,
                    'font-size'   => '36',
                    'line-height' => '40',
					'text-transform' => 'none',
					'letter-spacing' => '0.2',
					'color' => '#333333',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H1 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h1-font',
				'type' => 'text',
				'title' => esc_html__('H1 Custom Font Family Name', 'manual'),
			),
			
			// H2
			array(
                'id'          => 'theme-h2-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H2 style', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '800',
                    'font-family' => 'Raleway',
                    'google'      => true,
                    'font-size'   => '31',
                    'line-height' => '35',
					'text-transform' => 'none',
					'letter-spacing' => '0.2',
					'color' => '#333333',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H2 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h2-font',
				'type' => 'text',
				'title' => esc_html__('H2 Custom Font Family Name', 'manual'),
			),
			
			// H3
			array(
                'id'          => 'theme-h3-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H3 style', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Raleway',
                    'google'      => true,
                    'font-size'   => '26',
                    'line-height' => '34',
					'text-transform' => 'none',
					'letter-spacing' => '0.2',
					'color' => '#333333',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H3 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h3-font',
				'type' => 'text',
				'title' => esc_html__('H3 Custom Font Family Name', 'manual'),
			),
			
			// H4
			array(
                'id'          => 'theme-h4-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H4 style', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Raleway',
                    'google'      => true,
                    'font-size'   => '21',
                    'line-height' => '24',
					'text-transform' => 'none',
					'letter-spacing' => '0.2',
					'color' => '#333333',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H4 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h4-font',
				'type' => 'text',
				'title' => esc_html__('H4 Custom Font Family Name', 'manual'),
			),
			
			// H5
			array(
                'id'          => 'theme-h5-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H5 style', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Raleway',
                    'google'      => true,
                    'font-size'   => '16',
                    'line-height' => '20',
					'text-transform' => 'none',
					'letter-spacing' => '0.5',
					'color' => '#333333',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H5 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h5-font',
				'type' => 'text',
				'title' => esc_html__('H5 Custom Font Family Name', 'manual'),
			),
			
			// H6
			array(
                'id'          => 'theme-h6-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H6 style', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Raleway',
                    'google'      => true,
                    'font-size'   => '14',
                    'line-height' => '20',
					'text-transform' => 'none',
					'letter-spacing' => '0.2',
					'color' => '#333333',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H6 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h6-font',
				'type' => 'text',
				'title' => esc_html__('H6 Custom Font Family Name', 'manual'),
			),
			
        )
    ) );


	 
	 
/*******************************************
*******  THEME OPTIONS  - CUSTOM STYLE *****
********************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Custom Style', 'manual' ),
			'id'               => 'manual-theme-custom-style',
			'customizer_width' => '400px',
			'icon'             => 'el el-braille'
		) );
	
		// COLOUR SETTINGS
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'manual' ),
        'id'     => 'manual-theme-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
        'fields' => array(
					
					// Website colour
					array(
						'id'       => 'website_colour',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Website Color', 'manual' ),
						'subtitle'  => esc_html__('Applied to site globally', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular'   => '#47C494',
						)
					),
					
					// Standard a tag color
					array(
						'id'       => 'manual-global-link-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Standard "a" TAG :: Color', 'manual' ),
						'subtitle'  => esc_html__('Standard color', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#333333',
							'hover'   => '#46b289',
						),
					),
					
					// Standard a tag color - inside post
					array(
						'id'       => 'standard_a_tag_link_color_inside_post',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Standard "a" TAG :: Color (inside post)', 'manual' ),
						'subtitle'  => esc_html__('Standard color for the post content', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(   
							'regular'   => '#1e73be',
							'hover'   => '#46b289',
						)
					),
					
					// Custom text link color
					array(
						'id'       => 'text_link_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Custom Text :: Link Color', 'manual' ),
						'subtitle'  => esc_html__('Custom text link with icon attached', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#46b289',
							'hover'   => '#001040',
						)
					),
					
					// Button color
					array(
						'id'       => 'botton_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Botton Color', 'manual' ),
						'subtitle'  => esc_html__('Botton with special CSS effects', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#46b289',
							'hover'   => '#001040',
						)
					),
					
					// Button text color
					array(
						'id'       => 'botton_text_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Botton Text Color', 'manual' ),
						'active'    => false, 
						'hover'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#ffffff',
						)
					),
					
					// Meta icon color
					array(
						'id'       => 'blog-meta-icon-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Meta Icon :: Color', 'manual' ),
						'subtitle'  => esc_html__('Appears Below the title', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#46b289',
						)
					),
					
					// Meta icon color
					array(
						'id'       => 'blog-meta-icon-text-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Meta Text :: Color', 'manual' ),
						'subtitle'  => esc_html__('Appears Below the title', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#727272',
						)
					),
					
		
				)
		) );
		
	    // SEARCH BOX STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Live Search Box', 'manual' ),
		'id'     => 'theme-search-box-style',
		'subsection'  => true,
		'fields' => array(
						  
				array(
					'id'       => 'manual-live-search-icon-bouncein',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Search Icon BounceIn', 'manual' ),
					'subtitle' => esc_html__('Globally Enable', 'manual'),
					'default'  => false,
					'desc' => 'On == Enable',
				),		  
		
				array(
					'id'       => 'theme_search_box_border_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Search Box Border Color', 'manual' ),
					'default'  => '',
					'transparent' => false,
				 ),
				 
				 array(
					'id'       => 'theme_search_box_icon_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Search Box Icon Color', 'manual' ),
					'default'  => '#47c494',
					'transparent' => false,
				 ),
		
				array(
					'id'            => 'theme_search_box_radius',
					'type'          => 'slider',
					'title'         => esc_html__( 'Search Box Radius', 'manual' ),
					'default'       => 4,
					'min'           => 1,
					'step'          => 1,
					'max'           => 45,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 4px', 'manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'            => 'theme_search_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Search Box Font Size', 'manual' ),
					'default'       => 14,
					'min'           => 1,
					'step'          => 1,
					'max'           => 26,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 14px', 'manual' ),
					'display_value' => 'text',
				),
				
				
				array(
					'id'       => 'theme_search_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '500',
					'subtitle' => 'Default: 500',
				),
				
				array(
					'id'       => 'theme_search_box_search_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Submit Buttom', 'manual' ),
					'desc' => esc_html__('On==Disable', 'manual'),
					'default'  => false,
				),
		
		)
		) );
		
		// WIDGET STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Theme - Widget', 'manual' ),
		'id'     => 'manual-theme-widget-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
		'fields' => array(
		
			array(
				'id'       => 'theme_widget_title_tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme Widget Title Tag', 'manual' ),
				'options'  => array(
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
				),
				'default'  => 'h5', 
			),
			
		)
		) );	
	
        // FOOTER STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer Style', 'manual' ),
		'id'     => 'manual-theme-footer-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
		'fields' => array(
		
		
			array(
                'id'       => 'theme_footer_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Widget Area', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme_footer_title_tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'manual' ),
				'options'  => array(
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
				),
				'default'  => 'h5', 
			),
			
			array(
                'id'       => 'theme_footer_widget_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'manual' ),
                'default'  => '#101010',
            ),
			
			array(
                'id'       => 'theme_footer_widget_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Title Color', 'manual' ),
                'default'  => '#DDDDDD',
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Text Color', 'manual' ),
                'default'  => '#919191',
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'manual' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#919191',
                    'hover'   => '#BEBCBC',
                    'active'  => '#ccc',
                )
            ),
			
			array(
                'id'       => 'theme_footer_social_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Social/Copyright Area', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme_footer_social_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'manual' ),
                'default'  => '#080808',
            ),
			
			array(
                'id'       => 'theme_footer_social_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Text Color', 'manual' ),
                'default'  => '#828282',
            ),
			
			array(
                'id'       => 'theme_footer_social_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'manual' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#9E9D9D',
                    'hover'   => '#C4C4C4',
                    'active'  => '#ccc',
                )
            ),	
			
			array(
                'id'       => 'theme_footer_social_icon_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Link Color', 'manual' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#7E7E7E',
                    'hover'   => '#FFFFFF',
                    'active'  => '#ccc',
                )
            ),			
		
			)
		) );
		
		// GO UP ARROW
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Go Up Arrow Style', 'manual' ),
		'id'     => 'manual-theme-go-up-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
		'fields' => array(
				// start
				array(
					'id'            => 'go_up_arrow_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 24,
					'min'           => 1,
					'step'          => 1,
					'max'           => 60,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 24px', 'manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'go_up_arrow_icon_style',
					'type'     => 'text',
					'title'    => esc_html__( 'Icon Name', 'manual' ),
					'desc'     => __( 'Enter <a href=\'http://fortawesome.github.io/Font-Awesome/icons/\' target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\'https://www.elegantthemes.com/blog/resources/elegant-icon-font\' target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\'http://demo.wpsmartapps.com/themes/manual/et-line-font/\' target=\"_blank\">et line font</a> name', 'manual' ),
					'default'  => 'far fa-arrow-alt-circle-up',
					'subtitle' => esc_html__( 'Default: far fa-arrow-alt-circle-up', 'manual' ),
				),
				
				array(
					'id'       => 'manual-go-up-icon-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Go Up Icon Color', 'manual' ),
					'default'  => array(
						'color' => '#3e51e4',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				// eof section
			)
		) );
		


/*******************************************
*******  THEME OPTIONS  - CUSTOM STYLE *****
********************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Custom Menu', 'manual' ),
			'id'               => 'manual-theme-menu-custom-style',
			'customizer_width' => '400px',
			'icon'             => 'el el-minus'
		) );
		
		// HEADER MENU TYPE STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Menu Style', 'manual' ),
		'id'     => 'manual-theme-navigation-style',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'       => 'apply-nav-background-color-for-transparent-bg',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Header Background Color for Navigation Style 1', 'manual' ),
					'subtitle'    => esc_html__( 'header area background color with white background', 'manual' ),
					'default'  => array(
									'color' => '#ffffff',
									'alpha' => '0'
								),
				),
				
				array(
					'id'       => 'apply-nav-background-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Header Background Color for Navigation Style 2', 'manual' ),
					'subtitle'    => esc_html__( 'header area background color with transparent background', 'manual' ),
					'default'  => array(
									'color' => '#3a3a40',
									'alpha' => '.2'
								),
				),
				
				array(
					'id'       => 'theme-nav-type',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Select Navigation Style', 'manual' ),
					'subtitle' => esc_html__( 'Settings will effect globally', 'manual' ),
					'options'  => array(
						'1' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/1.jpg' ),
						'2' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/2.jpg' ),
					),
					'default'  => '2',
				),
				
				array(
					'id'       => 'apply-nav-border',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Activate Border Bottom', 'manual' ),
					'default'  => '0',
					'subtitle' => 'If checked, transparent border will be added on header nav bar (works best with header type "Transparent Background")',
				),
				
				array(
					'id'       => 'apply-nav-border-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
									'color' => '#ffffff',
									'alpha' => '.4'
								),
				),
				
				array(
					'id'       => 'apply-nav-box-shadow',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Nav Box shadow', 'manual' ),
					'default'  => '0',
				),
			
			)
		) );

		// HEADER MENU STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header - Menu Controls', 'manual' ),
		'id'     => 'theme-menu-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Some of the google "font family" choosen from "Typography->Navigation Style" does not fit correctly, use below configuration to re-adjust all settings for your header menu.', 'manual' ),
		'fields' => array(
				
				// Menu first level
				array(
					'id'       => 'menu-first-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu First Level', 'manual' ),
					'indent'   => true, 
				),
				
				
				array(
					'id'       => 'first-level-menu-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Navigation Arrow', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Down arrow icon will appear if found sub menu', 'manual' ),
					'desc'     => esc_html__( 'On == Enable', 'manual' ),
				),
			
				array(
					'id'       => 'first-level-menu-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '600',
					'subtitle' => 'Font weight totally depens on type of google "font family" you choose from "Typography->Body Font" ',
				),
				
				array(
					'id'            => 'first-level-menu-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 13,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'subtitle' => 'Default: 13px',
					'display_value' => 'text',
				),
				
				array(
					'id'            => 'first-level-menu-text-line-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Text Line Height', 'manual' ),
					'default'       => 92,
					'min'           => 1,
					'step'          => 1,
					'max'           => 130,
					'display_value' => 'label',
					'subtitle' => 'Default: 92px',
					'display_value' => 'text',
				),
				
				array(
					'id'            => 'first-level-responsive-hamburger-menu-top-margin',
					'type'          => 'slider',
					'title'         => esc_html__( 'Responsive Hamburger Menu Top Margin', 'manual' ),
					'default'       => 18,
					'min'           => 1,
					'step'          => 1,
					'max'           => 30,
					'display_value' => 'label',
					'subtitle' => 'Default: 18',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'first-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'manual' ),
					'desc'     => 'Default: 0.9px',
					'default'  => '0.9px',
				),
				
				array(
					'id'       => 'first-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'uppercase'
				),
				
				array(
					'id'       => 'first-level-menu-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#181818',
						'hover'   => '#5e5e5e',
						'active'  => '#ccc',
					),
				),
				
				array(
					'id'       => 'first-level-menu-text-color-for-img-bg',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color (for: Nav Bar with image background)', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'desc' => '<strong>For \'Navigation Style\' type \'with image background\' above font color will be used </strong>',
					'default'  => array(
						'regular' => '#ffffff',
						'hover'   => '#d8d8d8',
						'active'  => '#ccc',
					),
				),
				
				// Menu inner level
				array(
					'id'       => 'menu-inner-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu Inner Level', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'menu-inner-level-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Background Color', 'manual' ),
					'default'  => '#262626',
				),
				
				array(
					'id'       => 'menu-inner-level-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '600',
				),
				
				array(
					'id'            => 'menu-inner-level-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 11,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'subtitle' => 'Default: 11px',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'menu-inner-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'manual' ),
					'desc'     => 'Default: 0.9px',
					'default'  => '0.9px',
				),
				
				array(
					'id'       => 'menu-inner-level-menu-letter-line-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Line Height', 'manual' ),
					'desc'     => 'Default: 16px',
					'default'  => '16px',
				),
				
				
				array(
					'id'       => 'menu-inner-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'uppercase'
				),
				
				array(
					'id'       => 'menu-inner-level-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#9d9d9d',
						'hover'   => '#FFFFFF',
						'active'  => '#ccc',
					),
				),
				
			)
		) );
		
		// RESPONSIVE MENU
		Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Responsive Menu', 'manual' ),
        'id'     => 'manual-theme-responsive-layout-settings',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
        'fields' => array(
		
		
			array(
				'id'       => 'theme-responsive-bar-icon-replacement',
				'type'     => 'switch',
				'title'    => esc_html__( 'Replace Primary Menu "Bar Icon" (logo right side icon) with something text like.. "Menu" for the responsive layout', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( '"Bar Icon" will be replaced by text for the device like ipad and iphone', 'manual' ),
			),
			
			array (
				'id' => 'theme-responsive-bar-icon-replacement-text',
				'type' => 'text',
				'title' => esc_html__('"Bar Icon" Replacement Text', 'manual'),
				'default' => 'Menu',
			),
			
			
			// Mobile/Ipad - Menu Holder
			array(
				'id'       => 'mobile-bgackground-holder',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile/Ipad - Menu Holder', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'       => 'mobile-bgackground-holder-background-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Color', 'manual' ),
				'default'  => '#F9F9F9',
			),
			
			array(
				'id'       => 'mobile-menu-border-btm-li-color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Border bottom <li> tag color', 'manual' ),
				'default'  => array(
								'color' => '#f1f1f1',
								'alpha' => '0.9'
							),
			),
			
			// Mobile/Ipad - Menu First Level
			array(
				'id'       => 'mobile-menu-first-level',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile/Ipad - Menu First Level', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'            => 'mobile-first-level-menu-font-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Font Size', 'manual' ),
				'default'       => 12,
				'min'           => 1,
				'step'          => 1,
				'max'           => 50,
				'display_value' => 'label',
				'subtitle' => 'Default: 12px',
				'display_value' => 'text',
			),
		
			array(
				'id'       => 'mobile-first-level-menu-weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font Weight', 'manual' ),
				'options'  => array(
					'100' => '100',
					'200' => '200',
					'300' => '300',
					'400' => '400',
					'500' => '500',
					'600' => '600',
					'700' => '700',
					'800' => '800',
					'900' => '900',
				),
				'default'  => '700',
				'subtitle' => 'Font weight totally depens on type of google "font family" you choose from "Typography->Body Font" ',
			),
			
			array(
				'id'       => 'mobile-first-level-menu-letter-spacing',
				'type'     => 'text',
				'title'    => esc_html__( 'Letter Spacing', 'manual' ),
				'desc'     => 'Default: 0.9px',
				'default'  => '0.9px',
			),
			
			array(
				'id'       => 'mobile-first-level-menu-text-transform',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Transform', 'manual' ),
				'options'  => array(
					'none' => 'none',
					'capitalize' => 'Capitalize',
					'uppercase' => 'Uppercase',
					'lowercase' => 'Lowercase',
				),
				'default'  => 'uppercase'
			),
			
			array(
				'id'       => 'mobile-first-level-menu-text-color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Font Color', 'manual' ),
				'active'    => false, 
				'visited'   => false, 
				'default'  => array(
					'regular' => '#5B5B5B',
					'hover'   => '#47c494',
				),
			), 
			
			// Mobile/Ipad - Menu Inner Level
			array(
				'id'       => 'mobile-menu-inner-level',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile/Ipad - Menu Inner Level', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'            => 'mobile-menu-inner-level-font-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Font Size', 'manual' ),
				'default'       => 11,
				'min'           => 1,
				'step'          => 1,
				'max'           => 50,
				'display_value' => 'label',
				'subtitle' => 'Default: 11px',
				'display_value' => 'text',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font Weight', 'manual' ),
				'options'  => array(
					'100' => '100',
					'200' => '200',
					'300' => '300',
					'400' => '400',
					'500' => '500',
					'600' => '600',
					'700' => '700',
					'800' => '800',
					'900' => '900',
				),
				'default'  => '600',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-menu-letter-spacing',
				'type'     => 'text',
				'title'    => esc_html__( 'Letter Spacing', 'manual' ),
				'desc'     => 'Default: 0.9px',
				'default'  => '0.9px',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-menu-text-transform',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Transform', 'manual' ),
				'options'  => array(
					'none' => 'none',
					'capitalize' => 'Capitalize',
					'uppercase' => 'Uppercase',
					'lowercase' => 'Lowercase',
				),
				'default'  => 'uppercase'
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-menu-letter-line-height',
				'type'     => 'text',
				'title'    => esc_html__( 'Letter Line Height', 'manual' ),
				'desc'     => 'Default: 28px',
				'default'  => '28px',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-text-color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Font Color', 'manual' ),
				'active'    => false, 
				'visited'   => false, 
				'default'  => array(
					'regular' => '#656464',
					'hover'   => '#47c494',
				),
			),
		
		)
		) );
		
		// STICKY MENU
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Sticky Menu', 'manual' ),
			'id'               => 'theme_sticky_menu_settings',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
			
						array(
							'id'        => 'theme_sticky_menu_background',
							'type'      => 'color_rgba',
							'title'    => esc_html__( 'Sticky Menu Background Color', 'manual' ),
							'default'   => array(
								'color'     => '#fefefe',
								'alpha'     => 0.9
							),
							'options'       => array(
								'choose_text'               => 'Choose',
								'cancel_text'               => 'Cancel',
								'palette'                   => null,  // show default
								'input_text'                => 'Select Color'
							),                        
						),
						
						array(
							'id'       => 'theme_sticky_menu_text_color',
							'type'     => 'link_color',
							'title'    => esc_html__( 'Font Color', 'manual' ),
							'active'    => false, 
							'visited'   => false, 
							'default'  => array(
								'regular' => '#181818',
								'hover'   => '#47c494',
							),
						),
						
						array(
							'id'       => 'theme_sticky_white_logo',
							'type'     => 'switch',
							'title'    => esc_html__( 'Activate White Logo', 'manual' ),
							'default'  => false,
							'subtitle' => esc_html__( 'Normal logo dark logo will be replaced by the white logo', 'manual' ),
						),
			
			)
		) );
			
		

/***********************************
*******  DEFAULT THEME HEADER *****
***********************************/

		// HEADER BAR
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Default Theme Header', 'manual' ),
		'id'     => 'manual-theme-default-theme-header',
		'icon'   => 'el el-ok',
		'fields' => array(
		
				array(
					'id'    => 'header-style-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Infomration', 'manual' ),
					'desc'  => __( 'Settings set for the header style are always global BUT if any options like font family, font weight are chosen while crating page using "Pages-> Add New" or creating knowledge-base etc, such settings will overwrite global settings create unique header layout.', 'manual' )
				),
				
				
				// Header Background Style
				array(
					'id'       => 'theme_header_image_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Header Background', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'default-header-sytle-backgorund-image',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Default Gray Noise Background', 'manual' ),
					'subtitle' => esc_html__('on/off default gray noise background image', 'manual'),
					'default'  => false,
					'description' => 'Global Effect',
				),
				
				array(
					'id'       => 'enable-header-bg-color-for-nav-one',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Navigation Bar Background Color', 'manual' ),
					'subtitle' => esc_html__('on/off default gray noise background image', 'manual'),
					'default'  => false,
					'description' => 'on/off navigation bar background color',
				),
				
				array (
					'subtitle' => esc_html__('Custom Header Background', 'manual'),
					'id' => 'manual-header-custom-image',
					'type' => 'media',
					'title' => esc_html__('Header Background', 'manual'),
					'url' => true,
					'description' => '<strong style="color:#11d62b"><i>NOTE: "Default Gray Noise Background" must be "Disable" to activate this feature</i></strong>',
				),
				
				array(
					'id'       => 'header-opacity-uploadimage-global',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '1',
				),
				
				array(
					'id'       => 'header-uploadimage-parallax-effect',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Parallax Effect For the Upload Image', 'manual' ),
					'default'  => '0',
				),
				
				array(
					'id'       => 'header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center'
				),
				
				array(
					'id'       => 'default-header-sytle-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Header Background Color', 'manual' ),
					'default'  => '#F8F8F8',
					'description' => '<strong style="color:#11d62b"><i>NOTE: Will not work if added image header background AND if "Default Gray Noise Background" is "Enable"</i></strong>',
				),
				
				array(
					'id'       => 'header-force-white-logo-and-text',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Force apply white logo and white menu bar text for the selected \'Header Background Color\'', 'manual' ),
					'default'  => '0',
				),
				
				array(
					'id'            => 'default-header-sytle-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Height (equal top/bottom padding)', 'manual' ),
					'default'       => 120,
					'min'           => 1,
					'step'          => 1,
					'max'           => 300,
					'display_value' => 'label',
					'subtitle' => 'Default: 120',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'default-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'default'  => 'center'
				),
				
				// Header Title
				array(
					'id'       => 'theme_header_title_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Header Title', 'manual' ),
					'indent'   => true, 
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-top-header-title-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Title Color', 'manual' ),
					'default'  => '#4d515c',
				),
				
				array(
					'id'            => 'default-header-title-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Title Font Size', 'manual' ),
					'default'       => 36,
					'min'           => 12,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle' => 'Default: 36',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'default-header-title-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '400',
					'subtitle' => 'Default: 400',
				),
				
				array(
					'id'       => 'default-header-title-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'capitalize'
				),
				
				
				array(
					'id'            => 'default-header-title-font-letter-spacing',
					'type'          => 'slider',
					'title'         => esc_html__( 'Title Text Letter Spacing', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 5,
					'display_value' => 'label',
					'subtitle' => 'Default: 0',
					'display_value' => 'text',
				),
				
				// Header Sub-Title
				array(
					'id'       => 'theme_header_subtitle_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Header Sub Title', 'manual' ),
					'indent'   => true, 
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-top-header-subtitle-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Sub Title Color', 'manual' ),
					'default'  => '#666970',
				),
				
				array(
					'id'            => 'default-header-subtitle-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Sub Title Font Size', 'manual' ),
					'default'       => 18,
					'min'           => 12,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle' => 'Default: 18',
					'display_value' => 'text',
				),
				
				
				array(
					'id'       => 'default-header-subtitle-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '400',
					'subtitle' => 'Default: 400',
				),
				
				array(
					'id'       => 'default-header-subtitle-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'none'
				),
				
				
				array(
					'id'            => 'default-header-subtitle-font-letter-spacing',
					'type'          => 'slider',
					'title'         => esc_html__( 'Title Text Letter Spacing', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 5,
					'display_value' => 'label',
					'subtitle' => 'Default: 0',
					'display_value' => 'text',
				),
				
				// Breadcurmb
				array(
					'id'       => 'theme_header_breadcrumb_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Breadcrumb Link', 'manual' ),
					'indent'   => true, 
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-top-header-breadcrumb-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Breadcrumb Color', 'manual' ),
					'default'  => '#919191',
				),
				
				array(
					'id'       => 'default-top-header-breadcrumb-link-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Breadcrumb Link Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#919191',
						'hover'   => '#636363',
						'active'  => '#ccc',
					),
				),	
				
				array(
					'id'       => 'default-header-breadcrumb-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Breadcrumb Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'capitalize'
				),
				
				array(
					'id'            => 'default-header-breadcrumb-letter-spacing',
					'type'          => 'slider',
					'title'         => esc_html__( 'breadcrumb Text Letter Spacing', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 5,
					'display_value' => 'label',
					'subtitle' => 'Default: 0',
					'display_value' => 'text',
				),
				
				array(
					'id'            => 'default-header-breadcrumb-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Breadcrumb Font Size', 'manual' ),
					'default'       => 14,
					'min'           => 6,
					'step'          => 1,
					'max'           => 18,
					'display_value' => 'label',
					'subtitle' => 'Default: 14',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'default-header-breadcrumb-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Breadcrumb Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '400',
					'subtitle' => 'Default: 400',
				),
				
				
				array(
					'id'            => 'default-header-breadcrumb-padding',
					'type'          => 'slider',
					'title'         => esc_html__( 'Padding Top', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 30,
					'display_value' => 'label',
					'subtitle' => 'Gap between "header title/header sub-title" and breadcurmb',
					'display_value' => 'text',
				),
				
				// Treanding Search
				array(
					'id'       => 'theme_header_treanding_search_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Trending Search', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'theme_header_treanding_search_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Treanding Search Text Color', 'manual' ),
					'default'  => '#989CA6',
				),
				
				array(
					'id'       => 'theme_header_treanding_search_link_color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Treanding Search Link Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'hover'   => false, 
					'default'  => array(
						'regular' => '#B5B5B5',
						'hover'   => '#888F9E',
					),
				),	
				
		
		)
		) );
		
		
		
		
/***************************************
*******  POST TYPE - CUSTOM HEADER *****
****************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Custom Header', 'manual' ),
			'id'               => 'manual-theme-custom-header',
			'customizer_width' => '400px',
			'icon'             => 'el el-screen'
		) );
		
		// BBPRESS CUSTOM HEADER
        Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Bbpress/Forum', 'manual' ),
        'id'               => 'bbpres-header-design',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
			
			
			array(
				'id'       => 'bbpress_search_status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Search', 'manual' ),
				'subtitle' => esc_html__( 'Enable/Disable "Search" on the forum pages', 'manual' ),
				'default'  => true,
				'desc'     => esc_html__( 'Off == Disable', 'manual' ),
			),
			
			array(
				'id'       => 'bbpress-searchbox-display-position',
				'type'     => 'select',
				'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
				'options'  => array(
					'center' => 'Exact Center',
					'6' => '50% Width',
					'7' => '58% Width',
					'8' => '66% Width',
					'9' => '75% Width',
					'10' => '83% Width',
					'11' => '91% Width',
					'12' => '100% Width',
				),
				'default'  => 'center',
			),  
			
			array(
				'id'       => 'bbpress_breadcrumb_status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'manual' ),
				'subtitle' => esc_html__( 'Enable/Disable "breadcrumb" on the forum pages', 'manual' ),
				'default'  => true,
				'desc'     => esc_html__( 'Off == Disable', 'manual' ),
			),
			
			array(
				'id'       => 'bbpress_breadcrumb',
				'type'     => 'switch',
				'title'    => esc_html__( 'Include "Forum Root" slug name, inside breadcrumb', 'manual' ),
				'default'  => false,
				'desc'     => esc_html__( 'On == Enable', 'manual' ),
			),
			
			array(
                'id'            => 'bbpress-header-height',
                'type'          => 'slider',
                'title'         => esc_html__( 'Header Height', 'manual' ),
                'default'       => 120,
                'min'           => 1,
                'step'          => 1,
                'max'           => 220,
                'display_value' => 'label',
				'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
				'display_value' => 'text',
            ),
			
			array(
					'id'       => 'bbpress-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'default'  => 'center'
				),
			
			array(
					'id'       => 'bbpress-title-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
			),
			
			
			array(
                'id'       => 'manual-forum-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title Text', 'manual' ),
                'desc'     => esc_html__( 'Will appear on the top bar', 'manual' ),
                'default'  => 'Community Forum',
            ),
			
			array(
					'id'       => 'bbpress_header_title_font_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Font Size', 'manual' ),
					'desc'     => 'Example 30px',
					'default'  => '',
			),
			
			array(
					'id'       => 'bbpress_header_title_line_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Line Height', 'manual' ),
					'desc'     => 'Example 30px',
					'default'  => '',
			),
			
			array(
					'id'       => 'bbpress_header_title_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Font Weight', 'manual' ),
					'options'  => array(
						'default' => 'Default',
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => 'default',
			),
			
            array(
                'id'       => 'manual-forum-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub-title Text', 'manual' ),
                'desc'     => esc_html__( 'forum sub-title', 'manual' ),
                'default'  => 'receive professional support and assistance with any issues',
            ),
			
			array(
					'id'       => 'bbpress-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
			),
		
			array(
                'id'       => 'bbpress-header-image',
                'type'     => 'media',
                'title'    => esc_html__( 'Background Image', 'manual' ),
				'url' => true,
            ),
			
			array(
				'id'       => 'bbpress-header-background-position',
				'type'     => 'select',
				'title'    => esc_html__( 'Header Background Position', 'manual' ),
				'options'  => array(
					'center top' => 'Center Top',
					'center center' => 'Center Center',
					'center bottom' => 'Center Bottom',
				),
				'default'  => 'center center', 
				'desc' => '<strong>Works ONLY... if applied category header image</strong>',
			),
			
			array(
					'id'       => 'bbpress-apply-nav-background',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '1',
					'subtitle' => 'If checked, transparent background will be added on header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
			),
			
			array(
				'id'       => 'bbpress-apply-nav-border-btm',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
				'default'  => '',
				'subtitle' => 'If checked, transparent border will be added on the header nav bar',
				'desc' => '<strong>Works ONLY... if applied category header image</strong>',
			),
			
			array(
				'id'       => 'bbpress-apply-nav-border-btm-color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
				'default'  => array(
					'color' => '#b0b0b0',
					'alpha' => '0.6'
				),
				'mode'     => 'background',
			),
			
			array(
				'id'       => 'bbpress-header-opacity-uploadimage-global',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
				'default'  => '1',
				'desc' => '<strong>Works ONLY... if applied category header image</strong>',
			),
			
			
			array(
				'id'       => 'bbpress-lineargradient-first-color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
				'default'  => array(
								'color' => '#000000',
								'alpha' => '0.3'
							),
				'desc' => 'Default: rgba(0, 0, 0, 0.3)',
			),
				
			array(
				'id'       => 'bbpress-linear-gradient-second-color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
			),
			
			array(
				'id'       => 'bbpress_plx_bg_image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Apply Parallax Effect For the Upload Image', 'manual' ),
				'subtitle' => esc_html__( 'If checked, Parallax effect will activate', 'manual' ),
				'default'  => false,
				'desc'     => esc_html__( 'On == Enable', 'manual' ),
			),

			)
		) );
	   
	    // KNOWLEDGEBASE CUSTOM CAT/TAG HEADER
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'KB - Category/Tag Page', 'manual' ),
        'id'               => 'kb_custom_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'kb-cat-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Search', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable search bar from the category page', 'manual' ),
					'desc' => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'kbcat-searchbox-display-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
					'options'  => array(
						'center' => 'Exact Center',
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => 'center',
				),
				
				array(
					'id'       => 'kb-cat-header-breadcrumb-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable Breadcrumb from the category page', 'manual' ),
					'desc' => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'kbcat-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'center' => 'Center',
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'center',
				),
									
				array(
					'id'            => 'kbcat-header-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Header Height', 'manual' ),
					'default'       => 120,
					'min'           => 1,
					'step'          => 1,
					'max'           => 220,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'kb-cattag-header-bg-text-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
				),
				
				array(
						'id'       => 'kb_cattag_header_title_font_size',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Font Size', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'kb_cattag_header_title_line_height',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Line Height', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'kb_cattag_header_title_font_weight',
						'type'     => 'select',
						'title'    => esc_html__( 'Title Font Weight', 'manual' ),
						'options'  => array(
							'default' => 'Default',
							'100' => '100',
							'200' => '200',
							'300' => '300',
							'400' => '400',
							'500' => '500',
							'600' => '600',
							'700' => '700',
							'800' => '800',
							'900' => '900',
						),
						'default'  => 'default',
				),
				
				array(
					'id'       => 'kb-cattag-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
				),
									
				array (
					'subtitle' => esc_html__('Choose a background image for the kb header', 'manual'),
					'id' => 'manual-kb-header-background-image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'manual'),
					'url' => true,
					'desc' => esc_html__('Single image for all kb header (Global Effect)', 'manual'),
				),
				
				array(
					'id'       => 'kbcat-header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'kbcat-apply-nav-background',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '1',
					'subtitle' => 'If checked, transparent background will be added on header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'kbcat-apply-nav-border-btm',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
					'default'  => '',
					'subtitle' => 'If checked, transparent border will be added on the header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'kbcat-apply-nav-border-btm-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '0.6'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'kbcat-header-opacity-uploadimage-global',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '1',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				
				array(
					'id'       => 'kbcat-lineargradient-first-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
									'color' => '#000000',
									'alpha' => '0.3'
								),
					'desc' => 'Default: rgba(0, 0, 0, 0.3)',
				),
				
				array(
					'id'       => 'kbcat-linear-gradient-second-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
				),
					
				// eof image apply
						
				)
		) );
	   
	    // KNOWLEDGEBASE CUSTOM SINGLE PAGE HEADER
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'KB - Single Page', 'manual' ),
        'id'               => 'kb_custom_singlepg_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'kb-single-pg-title-text-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Header Title Text', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Enable/Disable header title text', 'manual' ),
					'desc' => esc_html__( 'On == Disable', 'manual' ),
				),					
									
				array(
					'id'       => 'kb-single-pg-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Search', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable search bar from the header', 'manual' ),
					'desc' => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'kbsinglepg-searchbox-display-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
					'options'  => array(
						'center' => 'Exact Center',
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => 'center',
				),
				
				array(
					'id'       => 'kb-single-pg-header-breadcrumb-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable Breadcrumb from the single KB page', 'manual' ),
					'desc' => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'kbsinglepg-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'center' => 'Center',
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'center',
				),
									
				array(
					'id'            => 'kbsinglepg-header-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Header Height', 'manual' ),
					'default'       => 32,
					'min'           => 1,
					'step'          => 1,
					'max'           => 220,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
					'display_value' => 'text',
				),
				
				
				array(
					'id'       => 'kbsinglepg-header-bg-text-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
				),
				
				array(
						'id'       => 'kbsinglepg_header_title_font_size',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Font Size', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'kbsinglepg_header_title_line_height',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Line Height', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'kbsinglepg_header_title_font_weight',
						'type'     => 'select',
						'title'    => esc_html__( 'Title Font Weight', 'manual' ),
						'options'  => array(
							'default' => 'Default',
							'100' => '100',
							'200' => '200',
							'300' => '300',
							'400' => '400',
							'500' => '500',
							'600' => '600',
							'700' => '700',
							'800' => '800',
							'900' => '900',
						),
						'default'  => 'default',
				),
				
				
				
				array(
					'id'       => 'kb-singlepg-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
				),
									
				array (
					'subtitle' => esc_html__('Choose a background image for the kb header', 'manual'),
					'id' => 'kbsinglepg-header-background-image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'manual'),
					'url' => true,
					'desc' => esc_html__('Single image for all kb header (Global Effect)', 'manual'),
				),
				
				array(
					'id'       => 'kbsinglepg-header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'kbsinglepg-apply-nav-background',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '1',
					'subtitle' => 'If checked, transparent background will be added on header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				
				array(
					'id'       => 'kbsinglepg-apply-nav-border-btm',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
					'default'  => '',
					'subtitle' => 'If checked, transparent border will be added on the header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'kbsinglepg-apply-nav-border-btm-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '0.6'
					),
					'mode'     => 'background',
				),
                
				array(
					'id'       => 'kbsinglepg-header-opacity-uploadimage-global',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '1',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'kbsingle-lineargradient-first-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
									'color' => '#000000',
									'alpha' => '0.3'
								),
					'desc' => 'Default: rgba(0, 0, 0, 0.3)',
				),
				
				array(
					'id'       => 'kbsingle-linear-gradient-second-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
				),
				// eof image apply
					
				)
		) );
	   
	    // DOCUMENTATION CUSTOM CAT/SINGLE PAGE HEADER
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'DOC - Category/Single Page', 'manual' ),
        'id'               => 'documentation_custom_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'documentation-disable-search-category-page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Search', 'manual' ),
					'default'  => false,
					'subtitle' => 'Disable search bar from the documentation area',
					'desc'     => __( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-searchbox-display-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
					'options'  => array(
						'center' => 'Exact Center',
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => 'center',
				), 
				
				array(
					'id'       => 'documentation-disable-breadcrumb-category-page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => 'Disable Breadcrumb from the documentation area',
					'desc'     => __( 'On == Disable', 'manual' ),
				),
									
				array(
					'id'            => 'documentation-header-height-category-page',
					'type'          => 'slider',
					'title'         => esc_html__( 'Header Height', 'manual' ),
					'default'       => 120,
					'min'           => 1,
					'step'          => 1,
					'max'           => 220,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'doc-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'default'  => 'center'
				),
				
				array(
					'id'       => 'doc-header-bg-text-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
				),
				
				array(
						'id'       => 'doc_header_title_font_size',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Font Size', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'doc_header_title_line_height',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Line Height', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'doc_header_title_font_weight',
						'type'     => 'select',
						'title'    => esc_html__( 'Title Font Weight', 'manual' ),
						'options'  => array(
							'default' => 'Default',
							'100' => '100',
							'200' => '200',
							'300' => '300',
							'400' => '400',
							'500' => '500',
							'600' => '600',
							'700' => '700',
							'800' => '800',
							'900' => '900',
						),
						'default'  => 'default',
				),
				
				array(
					'id'       => 'doc-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
				),
				
				array (
					'subtitle' => esc_html__('Choose a background image for the documentation header', 'manual'),
					'id' => 'manual-documentation-header-background-image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'manual'),
					'url' => true,
					'desc' => esc_html__('Single image for all documentation header (Global Effect)', 'manual'),
				),
				
				// for image apply
				array(
					'id'       => 'doc-header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'documentation-apply-nav-background-category-page',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '1',
					'subtitle' => 'If checked, transparent background will be added on header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'documentation-apply-nav-border-btm',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
					'default'  => '',
					'subtitle' => 'If checked, transparent border will be added on the header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'documentation-apply-nav-border-btm-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '0.6'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'documentation-header-opacity-uploadimage-global-category-page',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '1',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'documentation-lineargradient-first-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
									'color' => '#000000',
									'alpha' => '0.3'
								),
					'desc' => 'Default: rgba(0, 0, 0, 0.3)',
				),
				
				array(
					'id'       => 'documentation-linear-gradient-second-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
				),
					
				)
		) );
	   
	    // FAQ CATEGORY CUSTOM HEADER   
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'FAQ - Category/Single Page', 'manual' ),
        'id'               => 'faq_cat_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'faq-cat-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Search', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable search bar from the category page', 'manual' ),
					'desc'    => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'faq-searchbox-display-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
					'options'  => array(
						'center' => 'Exact Center',
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => 'center',
				),
				
				array(
					'id'       => 'faq-cat-header-breadcrumb-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable Breadcrumb from the category page', 'manual' ),
					'desc'    => esc_html__( 'On == Disable', 'manual' ),
				),	
				
				array(
					'id'            => 'faq-header-height-category-page',
					'type'          => 'slider',
					'title'         => esc_html__( 'Header Height', 'manual' ),
					'default'       => 120,
					'min'           => 1,
					'step'          => 1,
					'max'           => 220,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
					'display_value' => 'text',
				),
				
				
				array(
					'id'       => 'faq-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'default'  => 'center'
				),
				
				
				array(
					'id'       => 'faq-header-bg-text-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
				),
				
				array(
						'id'       => 'faq_header_title_font_size',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Font Size', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'faq_header_title_line_height',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Line Height', 'manual' ),
						'desc'     => 'Example 30px',
						'default'  => '',
				),
				
				array(
						'id'       => 'faq_header_title_font_weight',
						'type'     => 'select',
						'title'    => esc_html__( 'Title Font Weight', 'manual' ),
						'options'  => array(
							'default' => 'Default',
							'100' => '100',
							'200' => '200',
							'300' => '300',
							'400' => '400',
							'500' => '500',
							'600' => '600',
							'700' => '700',
							'800' => '800',
							'900' => '900',
						),
						'default'  => 'default',
				),
				
				
				array(
					'id'       => 'faq-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
				),
		
        	    // image apply
				array (
					'subtitle' => esc_html__('Choose a background image for the FAQ header', 'manual'),
					'id' => 'manual-faq-header-background-image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'manual'),
					'url' => true,
					'desc' => esc_html__('Single image for all FAQ header (Global Effect)', 'manual'),
				),
				
				array(
					'id'       => 'header-faq-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center'
				),
			
				array(
					'id'       => 'faq-apply-nav-background-category-page',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '1',
					'subtitle' => 'If checked, transparent background will be added on header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'faq-apply-nav-border-btm',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
					'default'  => '',
					'subtitle' => 'If checked, transparent border will be added on the header nav bar',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'faq-apply-nav-border-btm-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '0.6'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'faq-header-opacity-uploadimage-global-category-page',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '1',
					'desc' => '<strong>Works ONLY... if applied category header image</strong>',
				),
				
				array(
					'id'       => 'faq-lineargradient-first-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
									'color' => '#000000',
									'alpha' => '0.3'
								),
					'desc' => 'Default: rgba(0, 0, 0, 0.3)',
				),
				
				array(
					'id'       => 'faq-linear-gradient-second-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
				),
				// eof image apply
				
			)
		) );
	 
	    // 404 CUSTOM HEADER
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( '404 Page', 'manual' ),
        'id'     => 'theme_404_section',
		'subsection'       => true,
        'fields' => array(
					
					
					array(
						'id'       => 'onoff-404-page-hrader',
						'type'     => 'switch',
						'title'    => esc_html__( 'Enable 404 Page Header', 'manual' ),
						'subtitle' => esc_html__('Enable header', 'manual'),
						'default'  => false,
						'desc'     => esc_html__( 'On == Enable', 'manual' ),
					),
					
					array(
						'id'       => '404-pageheader-normal-settings',
						'type'     => 'section',
						'title'    => esc_html__( 'Normal Header Settings', 'manual' ),
						'indent'   => true, 
					),
					
						  
					array(
						'id'       => 'home-404-search-bar-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Disable Search', 'manual' ),
						'subtitle' => esc_html__('Disable search bar from the header bar', 'manual'),
						'default'  => false,
						'desc'     => esc_html__( 'On == Disable', 'manual' ),
					),
					
					array(
						'id'       => 'home-404-searchbox-display-position',
						'type'     => 'select',
						'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
						'options'  => array(
							'center' => 'Exact Center',
							'6' => '50% Width',
							'7' => '58% Width',
							'8' => '66% Width',
							'9' => '75% Width',
							'10' => '83% Width',
							'11' => '91% Width',
							'12' => '100% Width',
						),
						'default'  => 'center',
					),
					
					array(
						'id'            => '404-header-height',
						'type'          => 'slider',
						'title'         => esc_html__( 'Header Height', 'manual' ),
						'default'       => 120,
						'min'           => 1,
						'step'          => 1,
						'max'           => 220,
						'display_value' => 'label',
						'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
						'display_value' => 'text',
					),
					
					array(
						'id'       => '404-header-text-align',
						'type'     => 'select',
						'title'    => esc_html__( 'Header Text Align', 'manual' ),
						'options'  => array(
							'left' => 'Left',
							'center' => 'Center',
							'right' => 'Right',
						),
						'default'  => 'center'
					),
					
					array(
						'id'       => 'home-404-header-bg-text-global',
						'type'     => 'section',
						'title'    => esc_html__( 'Title Text', 'manual' ),
						'indent'   => true, 
					),
					
					array(
						'id'       => 'home-404-main-title',
						'type'     => 'text',
						'title'    => esc_html__( 'Title', 'manual' ),
						'subtitle' => esc_html__( 'Enter header title', 'manual' ),
						'default'  => '404 - Page NOT Found',
					),
					
					array(
							'id'       => 'home_404_header_title_font_size',
							'type'     => 'text',
							'title'    => esc_html__( 'Title Font Size', 'manual' ),
							'desc'     => 'Example 40px',
							'default'  => '40px',
					),
					
					array(
							'id'       => 'home_404_header_title_line_height',
							'type'     => 'text',
							'title'    => esc_html__( 'Title Line Height', 'manual' ),
							'desc'     => 'Example 45px',
							'default'  => '45px',
					),
					
					array(
							'id'       => 'home_404_header_title_font_weight',
							'type'     => 'select',
							'title'    => esc_html__( 'Title Font Weight', 'manual' ),
							'options'  => array(
								'default' => 'Default',
								'100' => '100',
								'200' => '200',
								'300' => '300',
								'400' => '400',
								'500' => '500',
								'600' => '600',
								'700' => '700',
								'800' => '800',
								'900' => '900',
							),
							'default'  => '800',
					),
						
					array(
						'id'       => '404-header-control',
						'type'     => 'section',
						'title'    => esc_html__( 'Background Image', 'manual' ),
						'indent'   => true,
					),
					
					
					array(
						'id'       => '404-page-header-background-img',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Header Background Image', 'manual' ),
						'compiler' => 'true',
					),
					
					array(
						'id'       => '404-header-background-position',
						'type'     => 'select',
						'title'    => esc_html__( 'Header Background Position', 'manual' ),
						'options'  => array(
							'center top' => 'Center Top',
							'center center' => 'Center Center',
							'center bottom' => 'Center Bottom',
						),
						'default'  => 'center center'
					),
					
					array(
							'id'       => '404-apply-nav-background',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Add Nav Background', 'manual' ),
							'default'  => '0',
							'subtitle' => 'If checked, transparent background will be added on header nav bar',
					),
					
					array(
						'id'       => '404-apply-nav-border-btm',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
						'default'  => '',
						'subtitle' => 'If checked, transparent border will be added on the header nav bar',
						'desc' => '<strong>Works ONLY... if applied category header image</strong>',
					),
					
					array(
						'id'       => '404-apply-nav-border-btm-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
						'default'  => array(
							'color' => '#b0b0b0',
							'alpha' => '0.6'
						),
						'mode'     => 'background',
					),
					
					array(
						'id'       => '404-header-opacity-uploadimage-global',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
						'default'  => '',
					),
					
					array(
						'id'       => '404-lineargradient-first-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
						'default'  => array(
										'color' => '#000000',
										'alpha' => '0.3'
									),
						'desc' => 'Default: rgba(0, 0, 0, 0.3)',
					),
					
					array(
						'id'       => '404-linear-gradient-second-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
					),
		
	
			)
		) );
	
		// BLOG POST - SINGLE PAGE HEADER
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog - Single Post', 'manual' ),
        'id'     => 'theme_blog_singlepg_section',
		'subsection'       => true,
        'fields' => array(
						  
						array(
							'id'       => 'blog_single_post_display_search',
							'type'     => 'switch',
							'title'    => esc_html__('Disable Search', 'manual' ),
							'subtitle' => esc_html__('Disable search bar from the header bar', 'manual'),
							'default'  => false,
							'desc'     => esc_html__( 'Off == Disable', 'manual' ),
						),
						
						array(
							'id'       => 'blog-single-searchbox-display-position',
							'type'     => 'select',
							'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
							'options'  => array(
								'center' => 'Exact Center',
								'6' => '50% Width',
								'7' => '58% Width',
								'8' => '66% Width',
								'9' => '75% Width',
								'10' => '83% Width',
								'11' => '91% Width',
								'12' => '100% Width',
							),
							'default'  => 'center',
						), 
						
						array(
							'id'       => 'blog_single_breadcrumb_on_header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Breadcrumb', 'manual' ),
							'subtitle' => esc_html__('on/off breadcrumb link on the header bar', 'manual'),
							'default'  => true,
							'desc'     => esc_html__( 'Off == Disable', 'manual' ),
						),
						
						
						array(
							'id'            => 'blog-header-height',
							'type'          => 'slider',
							'title'         => esc_html__( 'Header Height', 'manual' ),
							'default'       => 100,
							'min'           => 1,
							'step'          => 1,
							'max'           => 220,
							'display_value' => 'label',
							'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
							'display_value' => 'text',
						),
						
						
						array(
							'id'       => 'blog-header-text-align',
							'type'     => 'select',
							'title'    => esc_html__( 'Header Text Align', 'manual' ),
							'options'  => array(
								'left' => 'Left',
								'center' => 'Center',
								'right' => 'Right',
							),
							'default'  => 'center'
						),
						
						
						array(
							'id'       => 'blog-header-bg-text-global',
							'type'     => 'section',
							'title'    => esc_html__( 'Title Text', 'manual' ),
							'indent'   => true, 
						),
							
						array(
							'id'       => 'blog_single_title_on_header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Display Blog Title On The Header', 'manual' ),
							'subtitle' => esc_html__('Display title on the header bar', 'manual'),
							'default'  => true,
						),
						
						array(
								'id'       => 'blog_header_title_font_size',
								'type'     => 'text',
								'title'    => esc_html__( 'Title Font Size', 'manual' ),
								'desc'     => 'Example 30px',
								'default'  => '',
						),
						
						array(
								'id'       => 'blog_header_title_line_height',
								'type'     => 'text',
								'title'    => esc_html__( 'Title Line Height', 'manual' ),
								'desc'     => 'Example 30px',
								'default'  => '',
						),
						
						array(
								'id'       => 'blog_header_title_font_weight',
								'type'     => 'select',
								'title'    => esc_html__( 'Title Font Weight', 'manual' ),
								'options'  => array(
									'default' => 'Default',
									'100' => '100',
									'200' => '200',
									'300' => '300',
									'400' => '400',
									'500' => '500',
									'600' => '600',
									'700' => '700',
									'800' => '800',
									'900' => '900',
								),
								'default'  => 'default',
						),
							
						array(
							'id'       => 'blog-header-bg-background-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Background Image', 'manual' ),
							'indent'   => true, 
						),
						
						array(
							'id'       => 'blog_featured_image_on_the_header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Display Featured Image On The Header', 'manual' ),
							'subtitle' => esc_html__('Display Featured Image on the header and removed from the post area', 'manual'),
							'default'  => true,
						),
								  
					    array(
							'id'       => 'blog-apply-nav-background',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Add Nav Background', 'manual' ),
							'default'  => '1',
							'subtitle' => 'If checked, transparent background will be added on header nav bar',
							'desc' => '<strong>Works ONLY... if applied article header image</strong>',
						),
						
						array(
							'id'       => 'blog-apply-nav-border-btm',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
							'default'  => '',
							'subtitle' => 'If checked, transparent border will be added on the header nav bar',
							'desc' => '<strong>Works ONLY... if applied category header image</strong>',
						),
							
						array(
							'id'       => 'blog-apply-nav-border-btm-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
							'default'  => array(
								'color' => '#b0b0b0',
								'alpha' => '0.6'
							),
							'mode'     => 'background',
						),
						
						array(
							'id'       => 'blog-header-opacity-uploadimage-global',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
							'default'  => '1',
							'desc' => '<strong>Works ONLY... if applied article header image</strong>',
						),
							
						array(
							'id'       => 'blog-lineargradient-first-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
							'default'  => array(
											'color' => '#000000',
											'alpha' => '0.3'
										),
							'desc' => 'Default: rgba(0, 0, 0, 0.3)',
						),
						
						array(
							'id'       => 'blog-linear-gradient-second-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
						),
						  
			  )
		) );
		
		
		
		// SEARCH PAGE
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Search Page', 'manual' ),
        'id'     => 'site_search_page_section',
		'subsection'       => true,
        'fields' => array(
						  
						  array(
								'id'       => 'search-page-header-search-bar-status',
								'type'     => 'switch',
								'title'    => esc_html__( 'Disable Search', 'manual' ),
								'default'  => true,
								'subtitle' => 'Disable search bar from the header bar',
								'desc'     => esc_html__( 'Off == Disable', 'manual' ),
						  ),
						  
						  array(
								'id'       => 'search-page-searchbox-display-position',
								'type'     => 'select',
								'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
								'options'  => array(
									'center' => 'Exact Center',
									'6' => '50% Width',
									'7' => '58% Width',
									'8' => '66% Width',
									'9' => '75% Width',
									'10' => '83% Width',
									'11' => '91% Width',
									'12' => '100% Width',
								),
								'default'  => 'center',
							), 
						  
							array(
								'id'            => 'search-header-height',
								'type'          => 'slider',
								'title'         => esc_html__( 'Header Height', 'manual' ),
								'default'       => 111,
								'min'           => 1,
								'step'          => 1,
								'max'           => 220,
								'display_value' => 'label',
								'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
								'display_value' => 'text',
							),
							
							array(
								'id'       => 'search-header-text-align',
								'type'     => 'select',
								'title'    => esc_html__( 'Header Text Align', 'manual' ),
								'options'  => array(
									'left' => 'Left',
									'center' => 'Center',
									'right' => 'Right',
								),
								'default'  => 'center'
							),
							
							array(
								'id'       => 'searchpage-bg-text-global',
								'type'     => 'section',
								'title'    => esc_html__( 'Title Text', 'manual' ),
								'indent'   => true, 
							),
							
							array(
								'id'       => 'search-page-header-title',
								'type'     => 'text',
								'title'    => esc_html__( 'Header Title', 'manual' ),
								'subtitle' => esc_html__( 'Main title text', 'manual' ),
								'default'  => 'Search Results',
							),
							
							array(
								'id'       => 'search_page_header_title_font_size',
								'type'     => 'text',
								'title'    => esc_html__( 'Title Font Size', 'manual' ),
								'desc'     => 'Example 30px',
								'default'  => '',
							),
							
							array(
								'id'       => 'search_page_header_title_line_height',
								'type'     => 'text',
								'title'    => esc_html__( 'Title Line Height', 'manual' ),
								'desc'     => 'Example 30px',
								'default'  => '',
							),
							
							array(
								'id'       => 'search_page_header_title_font_weight',
								'type'     => 'select',
								'title'    => esc_html__( 'Title Font Weight', 'manual' ),
								'options'  => array(
									'default' => 'Default',
									'100' => '100',
									'200' => '200',
									'300' => '300',
									'400' => '400',
									'500' => '500',
									'600' => '600',
									'700' => '700',
									'800' => '800',
									'900' => '900',
								),
								'default'  => 'default',
							),
							
							array(
								'id'       => 'search-page-header-sub-title',
								'type'     => 'text',
								'title'    => esc_html__( 'Sub Title', 'manual' ),
								'subtitle' => esc_html__( 'sub title text', 'manual' ),
								'default'  => 'your search of',
							),
							
							array(
								'id'       => 'searchpage-bg-background-settings',
								'type'     => 'section',
								'title'    => esc_html__( 'Background Image', 'manual' ),
								'indent'   => true, 
							),
							
							 array(
								'id'       => 'search-page-header-background-img',
								'type'     => 'media',
								'url'      => true,
								'title'    => esc_html__( 'Header Background Image', 'manual' ),
								'compiler' => 'true',
							),
							
							array(
								'id'       => 'search-header-background-position',
								'type'     => 'select',
								'title'    => esc_html__( 'Header Background Position', 'manual' ),
								'options'  => array(
									'center top' => 'Center Top',
									'center center' => 'Center Center',
									'center bottom' => 'Center Bottom',
								),
								'default'  => 'center center'
							),
							
							array(
									'id'       => 'search-apply-nav-background',
									'type'     => 'checkbox',
									'title'    => esc_html__( 'Add Nav Background', 'manual' ),
									'default'  => '0',
									'subtitle' => 'If checked, transparent background will be added on header nav bar',
							),
							
							array(
								'id'       => 'search-header-apply-nav-border-btm',
								'type'     => 'checkbox',
								'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
								'default'  => '',
								'subtitle' => 'If checked, transparent border will be added on the header nav bar',
								'desc' => '<strong>Works ONLY... if applied category header image</strong>',
							),
								
							array(
								'id'       => 'search-header-apply-nav-border-btm-color',
								'type'     => 'color_rgba',
								'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
								'default'  => array(
									'color' => '#b0b0b0',
									'alpha' => '0.6'
								),
								'mode'     => 'background',
							),
								
							array(
								'id'       => 'search-header-opacity-uploadimage-global',
								'type'     => 'checkbox',
								'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
								'default'  => '',
							),
								
							array(
								'id'       => 'search-header-lineargradient-first-color',
								'type'     => 'color_rgba',
								'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
								'default'  => array(
												'color' => '#000000',
												'alpha' => '0.3'
											),
								'desc' => 'Default: rgba(0, 0, 0, 0.3)',
							),
							
							array(
								'id'       => 'search-header-linear-gradient-second-color',
								'type'     => 'color_rgba',
								'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
							),	
									
						  )
		) );
		

		
/**************************************
*******  START - HAMBURGET MENU   *****
***************************************/
	
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Hamburger Menu & Search Box', 'manual' ),
        'id'     => 'theme-hamburger-nav',
        'icon'   => 'el el-align-justify',
        'fields' => array(
		
			array(
					'id'    => 'hamburger-menu-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Infomration', 'manual' ),
					'desc'  => '<strong>The settings does not work for the post type "Pages"</strong>. There is a seprate settings available to display Hamburger Menu & Search Box when you trying to create page (Pages-> Add New Pages)',
				),
		
			array(
					'id'       => 'target-display-search-box-on-menu-bar',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Hamburger Menu Display Target', 'manual' ),
					'subtitle' => 'Targer display for the search box & hamburger menu to the selected post type',
					'desc'     => '<strong>NOTE:</strong> <span style="color:orange"><strong>Post Type: "Pages" does not work</strong></span>',
					'default'  => '',
			),
		
			array(
				'id'       => 'activate-hamburger-menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Hamburger Menu', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, The normal standard header menu will be replaced by hamburger menu',
			),
			
			array(
				'id'       => 'activate-search-box-on-menu-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Search Box On The Menu Bar', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, The search box will appear on the menu bar. <br><br><strong> NOTE: Feature will only work if activate Hamburger Menu</strong>',
			),
			
			array(
				'id'       => 'replace-search-design-with-modern-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Replace Standard Search Box', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, Manual Search will be replace by simple modern search</strong>',
			),
			

        )
    ) );
	
	
	
/******************************************
*******  START - SEARCH FORM DISPLAY *****
******************************************/	


Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Live Search Box Display', 'manual' ),
		'id'     => 'manual-theme-header-search-display',
		'icon'   => 'el el-search-alt',
		'fields' => array(
						  
						  
		  array(
					'id'    => 'target-search-bar-display-on-the-header-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'NOTE', 'manual' ),
					'desc'  => 'If you planning to display live search box to any custom post type EXCEPT post type (i.e knowledgebase, FAQ, Documenation etc..) provided by theme, then you can use this section. ',
				),
			
			array(
					'id'       => 'target-search-bar-display-on-the-header',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Target Search Box Display', 'manual' ),
					'subtitle' => 'Targer Search Box Display to the selected post type',
					'default'  => '',
			),	
			
			array(
				'id'       => 'activate-search-bar-on-the-header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Search Box On The Header', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, The search box will appear on the header bar.',
			),
						  
						  
						  
		)
) );


/*********************************
*******  TEXT & SOCIAL SHARE *****
**********************************/	 
	 

	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Text & Social Share', 'manual' ),
		'id'               => 'manual-theme-general-section',
		'customizer_width' => '400px',
		'icon'             => 'el el-globe-alt'
	) );
	
	
	/***************************
	**   GLOBAL CHANGE TEXT ***
	****************************/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Text Settings', 'manual' ),
        'id'               => 'theme_global_used_text_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			/****** General  *****/
			array(
                'id'       => 'theme-default-post-records-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Post', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear under summery post content', 'manual'),
				'id' => 'theme-defult-post-continue-reading-text',
				'type' => 'text',
				'title' => esc_html__('Continue Reading', 'manual'),
				'default' => esc_html__('Continue Reading', 'manual'),
			),
			
			
			array(
                'id'       => 'theme-post-records-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Custom Post Records', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear under knowledgebase and documentation records', 'manual'),
				'id' => 'custom-record-post-view-text',
				'type' => 'text',
				'title' => esc_html__('View Text', 'manual'),
				'default' => esc_html__('views', 'manual'),
			),
		
			/****** Post like dislike  *****/
			array(
                'id'       => 'theme-post-like-dislike-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Post Like/Dislike', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('This message will appear above Yes/No button on the knowledgebase and documentation section.', 'manual'),
				'id' => 'yes-no-above-message',
				'type' => 'text',
				'title' => esc_html__('Like/Dislike Message', 'manual'),
				'default' => esc_html__('Was this helpful?', 'manual'),
			),
			array (
				'id' => 'yes-user-input-text',
				'type' => 'text',
				'title' => esc_html__('Like Button Text', 'manual'),
				'subtitle' => esc_html__('(Yes) button Text.', 'manual'),
				'default' => 'Yes',
			),
			array (
				'id' => 'no-user-input-text',
				'type' => 'text',
				'title' => esc_html__('Unlike Button Text', 'manual'),
				'subtitle' => esc_html__('(No) button Text.', 'manual'),
				'default' => 'No',
			),
			array (
				'id' => 'already-voted',
				'type' => 'text',
				'title' => esc_html__('Already Voted', 'manual'),
				'subtitle' => esc_html__('Message appear if user has voted already', 'manual'),
				'default' => 'already voted',
			),
			
			
			/****** File attached  *****/
			array(
                'id'       => 'theme-post-file-attached-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Post File Attached', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear as title', 'manual'),
				'id' => 'attached-file-title',
				'type' => 'text',
				'title' => esc_html__('Attached File Title', 'manual'),
				'default' => esc_html__('Attached Files', 'manual'),
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-type',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Type Title', 'manual'),
				'default' => 'File Type',
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-size',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Size Title', 'manual'),
				'default' => 'File Size',
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-download',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Download Title', 'manual'),
				'default' => 'Download',
			),
			
			
			/****** knowledgebase  *****/
			array(
                'id'       => 'knowlegebase-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Knowledge Base', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'kb-cat-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Knowledgebase Category Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this Knowledge-base Category.',
				'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected category',
			),
			array(
				'id'       => 'kb-single-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Knowledgebase Article Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this Knowledge-base Article.',
				'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected article',
			),
			array(
				'id'       => 'kb-cat-view-all',
				'type'     => 'text',
				'title'    => esc_html__( 'View All Text', 'manual' ),
				'default'  => 'View All',
				'subtitle' => 'will appear under category records',
			),
			array(
				'id'       => 'kb-related-post-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Post Title', 'manual' ),
				'default'  => 'Related Articles',
			),
			
			
			/****** Documentation *****/
			array(
                'id'       => 'documentation-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Documentation', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'documentation-expand-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Expand Text', 'manual' ),
				'default'  => 'Expand All',
				'subtitle' => 'will appear on the documentation sidebar @ top',
			),
			array(
				'id'       => 'documentation-collapse-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Collapse Text', 'manual' ),
				'default'  => 'Collapse All',
				'subtitle' => 'will appear on the documentation sidebar @ top',
			),
			array(
				'id'       => 'documentation-root-category-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Documentation Category Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this documentation',
				'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected category',
			),
			array(
				'id'       => 'documentation-single-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Documentation Article Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this documentation Article.',
				'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected article',
			),
			array(
				'id'       => 'documentation-related-post-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Post Title', 'manual' ),
				'default'  => 'Related Articles',
			),
			
			
			/****** FAQ *****/
			array(
                'id'       => 'faq-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'FAQ', 'manual' ),
                'indent'   => true, 
            ),
			 array(
				'id'       => 'faq-expand-collapse-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Expand / Collapse Text', 'manual' ),
				'default'  => 'Expand / Collapse All',
			),
            array(
                'id'       => 'faq-cat-page-access-control-message',
                'type'     => 'text',
                'title'    => esc_html__( 'FAQ Category Access Control Message', 'manual' ),
                'default'  => 'You do not have sufficient permissions to access this FAQ Category.',
                'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected category',
            ),
			
			/****** Breadcrumb  *****/
			array(
                'id'       => 'theme-breadcrumb-records-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Breadcrumb', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('rename initial "Home" attribute in a Breadcrumb: "Home / Doc /... ', 'manual'),
				'id' => 'custom-record-breadcrumb-home-text',
				'type' => 'text',
				'title' => esc_html__('Home Text', 'manual'),
				'default' => esc_html__('home', 'manual'),
			),
			
			/****** Copyright Text  *****/
			array(
                'id'       => 'theme-copyright-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Copyright', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'footer-copyright',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'manual' ),
				'default' => esc_html__('© 2019 wpsmartapps.com. All Rights Reserved.', 'manual'),
			),


		)
    ) );


	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Share Settings', 'manual' ),
        'id'     => 'manual-theme-general-social-share',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
        'fields' => array(
		
		
		   array(
					'id'    => 'social-box-global-message',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'desc'  => esc_html__( 'seprate ON|OFF feature provided to disable "Social Share" on the blog, knowledge-base, and Documentation section.', 'manual' )
				),	
		
			array(
				'id'       => 'theme-social-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Social Share Buttons', 'manual' ),
				'default'  => true,
				'subtitle' => esc_html__( 'Enable or disable the social share buttons at the end of each post (Global Effect)', 'manual' ),
			),
			
			array (
				'subtitle' => esc_html__('This subject will act as default when visitors try to send favourite read post via email to there friends', 'manual'),
				'id' => 'theme-social-box-mailto-subject',
				'type' => 'text',
				'title' => esc_html__('Social Share eMail Button', 'manual'),
				'default' => esc_html__('Awesome Post', 'manual'),
			),
			
			array(
                'id'       => 'theme-social-share-displaycrl-status',
                'type'     => 'sortable',
				'mode'     => 'checkbox',
                'title'    => esc_html__( 'Social Share Display Control', 'manual' ),
                'subtitle' => esc_html__( 'Sortable/Control social share display', 'manual' ),
				'options'  => array(
                    'twitter' => 'Twitter',
                    'facebook' => 'Facebook',
                    'pinterest' => 'Pinterest',
                    'google-plus' => 'Google Plus',
                    'email' => 'Email',
                    'linkedin' => 'LinkedIn',
                ),
                'default'  => array(
                    'twitter' => true,
                    'facebook' => true,
                    'pinterest' => true,
                    'google-plus' => true,
                    'email' => true,
                    'linkedin' => false,
                )
            ),
			
		)
	) );
	
	
/**********************************************
*******  START  KNOWLEDGEBASE       *****
***********************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Knowledgebase', 'manual' ),
        'id'               => 'theme_knowledgebase_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-file-edit'
    ) );
	
	// GLOBAL
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Global Settings', 'manual' ),
        'id'               => 'knowledgebase_global_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
			   array(
					'id'       => 'kb-hide-notification-bar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Notification Bar from the KB Section', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Hide notification bar from the knowledgebase area (applied for both category and single page)', 'manual' ),
					'desc' => 'On ==  disable',
				),
									
									
					)
    ) );
	
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Slug & Breadcrumb Name', 'manual' ),
        'id'               => 'knowledgebase_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				
				array(
					'id'       => 'kb-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>knowledgebase</strong>/creating-new-kb-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Knowledge Base single post slug name <strong>MUST BE</strong> different from the page name used to display Knowledge Base. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'knowledgebase',
				),
				
			   array(
					'id'       => 'kb-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb</strong>/customization/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>Knowledge Base Single Post (Slug Name)</strong> and the page name used to display Knowledge Base. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'kb',
				),
				
				array(
					'id'       => 'kb-tag-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Tag Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb-tag</strong>/kb-post-slig-name/ <br><br></strong> Custom slug name for your knowledge base tag.', 'manual' ),
					'default'  => 'kb-tag',
				),
				
			   array(
					'id'       => 'kb-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Knowledge Base</strong> / Customization /', 'manual' ),
					'default'  => 'Knowledge Base',
				),
				
				array(
					'id'       => 'kb-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Knowledge Base</a> / Customization /', 'manual' ),
					'subtitle' => __( 'Custom home page URL for your Knowledge Base', 'manual' ),
					'default'  => '',
				),
	
		)
    ) );
	
	
	// CATEGORY SETTINGS
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Page Settings', 'manual' ),
        'id'               => 'knowledgebase_records_order_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'kb-noof-records-catper-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Category Records Per Page', 'manual' ),
					'default'  => '-1',
					'desc' => esc_html__( 'Value "-1" will display all the results i.e no pagination will appear', 'manual' ),
				),

				array(
					'id'       => 'kb-cat-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Records Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Display order ', 'manual' ),
					'options'  => array(
						'1' => 'Ascending Order (ASC)',
						'2' => 'Descending Order (DESC)',
					),
					'default'  => '1'
				),
			
				array(
					'id'       => 'kb-cat-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Records Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Display order by', 'manual' ),
					'options'  => array(
						'ID' => 'Order by post id',
						'title' => 'Order by title',
						'name' => 'Order by post name',
						'date' => 'Order by date',
						'modified' => 'Order by last modified date',
						'rand' => 'Order by Random',
						'comment_count' => 'Order by number of comment',
						'none' => 'None',
					),
					'default'  => 'date'
				),
				
				array(
					'id'       => 'all-child-cat-post-in-root-category',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display All Child Category Records Inside Parent Category', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Display all child category records under root category', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-cat-sidebar-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove The Sidebar From The Category', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make record full width', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				
				array(
					'id'       => 'kb-cat-sidebar-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'right'
				),
				
				array(
					'id'       => 'knowledgebase-cat-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Quick Stats', 'manual' ),
					'subtitle' => esc_html__('Disable views, date posted, posted by and like count displayed under knowledgebase post title', 'manual'),
					'default'  => false,
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'knowledgebase-remove-subcategory-readmore',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Sub-Category Read More Text', 'manual' ),
					'default'  => false,
					'desc' => 'On ==  disable',
				),
				
				array(
					'id'       => 'knowledgebase-remove-subcategory-description',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Sub-Category Description Text', 'manual' ),
					'default'  => false,
					'desc' => 'On ==  disable',
				),
	
		)
    ) );
	
	
	// SINGLE PAGE SETTINGS
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Settings', 'manual' ),
        'id'               => 'kb_single_records_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-singlepg-title-tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Tag', 'manual' ),
					'options'  => array(
						'h2' => 'h2',
						'h1' => 'h1',
					),
					'default'  => 'h1', 
				),
				
				array(
					'id'       => 'kb-remove-article-title-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Title Icon', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Icon that display before article title', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-single-pg-print-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Print', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'No print icon will appear under knowledgebase post title', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Comments On Each Knowledge Base Article', 'manual' ),
					'default'  => false,
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-comment-box-on-thumbsdown',
					'type'     => 'switch',
					'title'    => '<span style="color:orange;font-weight:bold;">Display Comment Box, When User Click On The Thumbs Down Icon (red buttom)</span>',
					'subtitle'    => 'NOTE: Above feature, <strong>\'Allow Comments On Each Knowledge Base Article\'</strong> must be activate',
					'default'  => false,
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-cat-sidebar-singlepg-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove The Sidebar From The Single Pages', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make record full width', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-single-page-sidebar-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'right'
				),
				
				array(
					'id'       => 'kb-singlepg-publish-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Post Publish Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'On checked "Off" no post publish date will appear under documentation post title', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-singlepg-modified-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Post Modified Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'On checked "Off" no modifed date will appear under knowledgebase post title', 'manual' ),
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-disable-doc-author-name',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Author Name', 'manual' ),
					'default'  => true,
					'subtitle' => 'On checked "Off" no author name will appear under knowledgebase post title',
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-single-post-user-name',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Name', 'manual' ),
					'subtitle' => esc_html__( 'will appear under title i.e aricle display by', 'manual' ),
					'options'  => array(
						'user_login' => 'User Login',
						'user_nicename' => 'User Nicename',
						'user_registered' => 'User Registered',
						'display_name' => 'Display Name',
						'first_name' => 'First Name',
						'user_firstname' => 'User Firstname',
					),
					'default'  => 'user_nicename'
				),
				
				array(
					'id'       => 'knowledgebase-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Quick Stats', 'manual' ),
					'subtitle' => esc_html__('Disable views, date posted, posted by and like count displayed under knowledgebase post title', 'manual'),
					'default'  => false,
					'desc' => 'On ==  disable',
				),
				
				array(
					'id'       => 'knowledgebase-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Social Share', 'manual' ),
					'subtitle' => esc_html__('Disable knowledgebase post social share', 'manual'),
					'default'  => false,
					'desc' => 'On ==  disable',
				),
				
				array(
					'id'       => 'knowledgebase-voting-buttons-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Voting Buttons', 'manual' ),
					'subtitle' => esc_html__('Disable knowledgebase post voting buttoms', 'manual'),
					'default'  => false,
					'desc' => 'On ==  disable',
				),
				
				array(
					'id'       => 'knowledgebase-voting-login-users',
					'type'     => 'switch',
					'title'    => '<span style="color:orange;font-weight:bold;">Display Voting For Only Login Users</span>',
					'subtitle' => esc_html__('allow voting ONLY for login users', 'manual'),
					'default'  => false,
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-related-post-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Related Posts On Each Knowledge Base Article', 'manual' ),
					'default'  => true,
					'desc' => 'Off ==  disable',
				),
				
				array(
					'id'       => 'kb-related-post-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Related Post to Display', 'manual' ),
					'default'  => '6',
				),
				
		)
    ) );
	
	
	// Gutenberg Editor
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Gutenberg Editor', 'manual' ),
        'id'               => 'kb_gutenberg_editor_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-gutenberg-editor-onoff',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Gutenberg Editor Inside Knowledgebase Post', 'manual' ),
					'default'  => false,
					'desc'     => 'Off == disable',
				),
				
		)
    ) );			
	
	
/**********************************************
*******  // EOF  KNOWLEDGEBASE //   *****
***********************************************/
	
	
	
		
		
/**********************************************
*******  START  DOCUMENTATION       *****
***********************************************/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Documentation', 'manual' ),
        'id'               => 'theme_documentation_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-folder-open'
    ) );
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Slug & Breadcrumb Name', 'manual' ),
        'id'               => 'documentation_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			  array(
					'id'       => 'doc-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>documentation</strong>/new-doc-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Documentation single post slug name <strong>MUST BE</strong> different from the page name used to display documentation. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'documentation',
				),
				
			   array(
					'id'       => 'doc-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>doc</strong>/product-name/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>Documentation Single Post (Slug Name)</strong> and the page name used to display documentation. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'doc',
				),
				
				array(
					'id'       => 'doc-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Documentation</strong> / product-name /', 'manual' ),
					'default'  => 'Documentation',
				),
				
				array(
					'id'       => 'doc-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Documentation</a> / product-name /', 'manual' ),
					'subtitle' => __( 'Custom home page URL for your Documentation', 'manual' ),
					'default'  => '',
				),
		
		)
    ) );
	
	
	// Page Template - "Documenation - Home" Settings
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Template - "Documenation - Home" Settings', 'manual' ),
        'id'               => 'documentation_pagetemplate_dochome_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
							array(
								'id'       => 'documentation-category-record-display-order',
								'type'     => 'select',
								'title'    => esc_html__( 'Category Display Order', 'manual' ),
								'subtitle' => esc_html__( 'Category records display order ', 'manual' ),
								'options'  => array(
									'ASC' => 'Ascending Order (ASC)',
									'DESC' => 'Descending Order (DESC)',
								),
								'default'  => 'ASC'
							),
							
							array(
								'id'       => 'documentation-category-record-display-order-by',
								'type'     => 'select',
								'title'    => esc_html__( 'Category Display Order By', 'manual' ),
								'subtitle' => esc_html__( 'Category records display order by', 'manual' ),
								'options'  => array(
									'id' => 'Order By ID',
									'count' => 'Order By Count',
									'name' => 'Order By Name ',
									'slug' => 'Order By Slug ',
									'none' => 'None',
								),
								'default'  => 'name'
							),		
									
		)
    ) );
	
	
	// RECORDS ORDER SECTION
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Tree Menu Settings', 'manual' ),
        'id'               => 'documentation_records_order_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'documentation-record-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Records display order ', 'manual' ),
					'options'  => array(
						'ASC' => 'Ascending Order (ASC)',
						'DESC' => 'Descending Order (DESC)',
					),
					'default'  => 'ASC'
				),
				
				array(
					'id'       => 'documentation-record-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Records display order by', 'manual' ),
					'desc'     => __( 'Find how orderby works <a href="https://codex.wordpress.org/Template_Tags/get_posts" target="_blank">https://codex.wordpress.org/Template_Tags/get_posts</a>', 'manual' ),
					'options'  => array(
						'title' => 'Order by Title',
						'rand' => 'Order by Random',
						'menu_order' => 'Page Order',
						'date' => 'Order By Date',
						'modified' => 'Order By Last Modified Date',
						'none' => 'None',
					),
					'default'  => 'menu_order'
				),
				
				
				array(
					'id'       => 'documentation-menu-scroller-status',
					'type'     => 'switch',
					'title'    => esc_html__('Tree Menu Scroller', 'manual' ),
					'subtitle' => esc_html__('Scrollbar will appear after certain tree menu height', 'manual'),
					'default'  => true,
					'desc'     => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'            => 'documentation-scroll-after-menu-height-new',
					'type'          => 'slider',
					'title'         => esc_html__( 'Display Scrollbar After Height', 'manual' ),
					'subtitle'      =>  esc_html__( 'Scrollbar will appear after exceeding define tree menu height', 'manual' ),
					'default'       => 401,
					'min'           => 1,
					'step'          => 1,
					'max'           => 1200,
					'display_value' => 'label',
					'display_value' => 'text',
				),
				

		)
    ) );
	
	
	
	// SINGLE POST ON/OFF
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Feature On|Off', 'manual' ),
        'id'               => 'documentation_single_records_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'documentation-singlepg-title-tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Tag', 'manual' ),
					'options'  => array(
						'h2' => 'h2',
						'h1' => 'h1',
					),
					'default'  => 'h2', 
				),					
									
				array(
					'id'       => 'documentation-notification-bar-global',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Notification Bar', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Hide notification bar from the documentation area', 'manual' ),
					'desc'     => __( 'On == Hide', 'manual' ),
				),					
									
				array(
					'id'       => 'documentation-sidebar-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Documentation Tree Menu Sidebar Position', 'manual' ),
					'subtitle' => esc_html__( 'Global Effect', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'left'
				),
				
				array(
					'id'       => 'documentation-single-post-user-name',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Name', 'manual' ),
					'subtitle' => esc_html__( 'will appear under title i.e aricle display by', 'manual' ),
					'options'  => array(
						'user_login' => 'User Login',
						'user_nicename' => 'User Nicename',
						'user_registered' => 'User Registered',
						'display_name' => 'Display Name',
						'first_name' => 'First Name',
						'user_firstname' => 'User Firstname',
					),
					'default'  => 'user_nicename'
				),
				
				array(
					'id'       => 'documentation-disable-doc-author-name',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Author Name', 'manual' ),
					'default'  => true,
					'subtitle' => 'No author name will appear under documentation post title',
					'desc'     => __( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Comments On Each Documentation Article', 'manual' ),
					'default'  => false,
					'description' => '<span style="color:red">FEATURE TEMPORARY DISABLE</span>',
				),
				
				array(
					'id'       => 'documentation-single-pg-print-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Print', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'No print icon will appear under documentation post title', 'manual' ),
					'desc' => __( 'Off == Disable', 'manual' ),
				),
		
				array(
					'id'       => 'documentation-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Quick Stats', 'manual' ),
					'subtitle'     => esc_html__('Disable views, date posted, posted by and like count displayed under documentation post title', 'manual'),
					'default'  => false,
					'desc' => __( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Social Share', 'manual' ),
					'subtitle'     => esc_html__('Disable documentation post social share', 'manual'),
					'default'  => false,
					'desc' => __( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-voting-buttons-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Voting Buttons', 'manual' ),
					'subtitle'     => esc_html__('Disable documentation post voting buttoms', 'manual'),
					'default'  => false,
					'desc' => __( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-voting-login-users',
					'type'     => 'switch',
					'title'    => '<span style="color:orange;font-weight:bold;">Display Voting For Only Login Users</span>',
					'subtitle' => esc_html__('Allow voting ONLY for the login users', 'manual'),
					'default'  => false,
					'desc'     => __( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-singlepg-publish-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Post Publish Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'On checked "Off" no post publish date will appear under documentation post title', 'manual' ),
					'desc' => __( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-singlepg-modified-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Post Modified Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'On checked "Off" no post modifed date will appear under documentation post title', 'manual' ),
					'desc' => __( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-related-post-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Related Posts On Each Documentation Article', 'manual' ),
					'default'  => true,
					'desc' => __( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-related-post-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Related Post to Display', 'manual' ),
					'default'  => '6',
				),
				
		)
    ) );
	
	
	// SEARCH HANDLER
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Ajax Page Load Settings', 'manual' ),
        'id'               => 'documentation_ajaxload_settings_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				
				array(
					'id'       => 'documentation-disable-ajaxload-content',
					'type'     => 'switch',
					'title'    => esc_html__('Ajax Load Documentation Article On|Off', 'manual' ),
					'subtitle' => esc_html__('System will perform normal content load', 'manual'),
					'default'  => false,
					'desc'     => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'doc_auto_scroll_screen_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Auto-scroll web page while loading documentation post via ajax', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'documentation-disable-autoscroll-content-article-title',
					'type'     => 'switch',
					'title'    => esc_html__('Disable auto-scroll web page to the documentation title', 'manual' ),
					'subtitle' => esc_html__('The web page will STOP auto-scrolls to the documentation title, while loading doc article via ajax', 'manual'),
					'default'  => false,
					'desc'     => esc_html__( 'On == Disable', 'manual' ),
				),
				
				
				array(
					'id'       => 'doc_calljs_after_pageload_via_ajax_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Call Javascript after documentation article is loaded via AJAX', 'manual' ),
					'indent'   => true, 
				),
				
				
				array(
					'id'       => 'activate_js_call_after_ajax_page_load',
					'type'     => 'switch',
					'title'    => esc_html__( 'Trigger JavaScript Code', 'manual' ),
					'subtitle' => esc_html__('Run ANY JavaScript code globally when documenation article loaded via AJAX', 'manual'),
					'default'  => false,
					'desc'     => __( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'js_code_call_after_ajax_page_load',
					'type'     => 'ace_editor',
					'title'    => esc_html__( 'JS Code', 'manual' ),
					'subtitle' => esc_html__( 'Paste your JS code here.', 'manual' ),
					'mode'     => 'javascript',
					'theme'    => 'chrome',
					'default'  => '
jQuery( document ).on("executeJSCodeOnAjaxCallDocPost", function(event, data){
		  
	// Unique Documentation Post ID
	postID = data.post_id;
	
	"use strict";
	
	// YOUR JS CODE OVER HERE.
		  
}); '
				),
				
				
		
		)
    ) );		
	
	
	// Troubleshoot
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Ajax Load Page Troubleshoot', 'manual' ),
        'id'               => 'documentation_troubleshoot',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
					array(
						'id'       => 'fix_documentation_busted_msg',
						'type'     => 'switch',
						'title'    => 'Fix "Busted!" message',
						'subtitle' => 'when you trying to access specific documentation article and see the text message "Busted!"',
						'default'  => false,
						'desc'     => __( 'Off == Disable', 'manual' ),
					),
					
					
					array(
						'id'       => 'activate-vc-inside-ajax-load-page-doc',
						'type'     => 'switch',
						'title'    => esc_html__( 'Activate VC Inside Documentation Page', 'manual' ),
						'subtitle' => esc_html__( 'allow visual composer inside ajax load documentation pages', 'manual' ),
						'desc' =>  __( '<strong style="color:red">ALERT:</strong> Documentation records are based on the ajax call request leading to block VC shortcode that fully depend on JQuery or Javascript function <br><br> <strong style="color:green">SOLUTION:</strong> Call ANY JavaScript or JQuery function on AJAX page load, from the section <strong>"Manual Options -> Documentation -> Call Javascript on AJAX Page Load"</strong>', 'manual' ),
						'default'  => false,
					),

			)
    ) );
	
	
	// Gutenberg Editor
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Gutenberg Editor', 'manual' ),
        'id'               => 'doc_gutenberg_editor_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'doc-gutenberg-editor-onoff',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Gutenberg Editor Inside Documentation Post', 'manual' ),
					'default'  => false,
					'desc'     => 'Off == disable',
				),
				
		)
    ) );
		

/**********************************************
*******  START  FAQ       *****
***********************************************/


	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'FAQ', 'manual' ),
        'id'               => 'theme_faq',
        'customizer_width' => '400px',
        'icon'             => 'el el-question-sign'
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Slug & Breadcrumb Name', 'manual' ),
        'id'               => 'faq_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				
				array(
					'id'       => 'faq-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>faqs</strong>/creating-new-kb-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> FAQ single post slug name <strong>MUST BE</strong> different from the page name used to display FAQ. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'faqs',
				),
				
			   array(
					'id'       => 'faq-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>faq</strong>/customization/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>FAQ Single Post (Slug Name)</strong> and the page name used to display FAQ. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'faq',
				),
				
			   array(
					'id'       => 'faq-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>FAQ</strong> / Customization /', 'manual' ),
					'default'  => 'FAQ',
				),
				
				array(
					'id'       => 'faq-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">FAQ</a> / Customization /', 'manual' ),
					'subtitle' => __( 'Custom home page URL for your FAQ', 'manual' ),
					'default'  => '',
				),
	
		)
    ) );

	
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Category Page Settings', 'manual' ),
        'id'     => 'theme_faq_section',
	    'subsection' => true,
        'fields' => array(
		
			array(
					'id'       => 'faq-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Records Display Order', 'manual' ),
					'subtitle' => esc_html__( 'FAQ records order', 'manual' ),
					'options'  => array(
						'1' => 'Ascending Order (ASC)',
						'2' => 'Descending Order (DESC)',
					),
					'default'  => '2'
			),
			
			array(
				'id'       => 'faq-display-order-by',
				'type'     => 'select',
				'title'    => esc_html__( 'FAQ Display Order By', 'manual' ),
				'subtitle' => esc_html__( 'FAQ records order by', 'manual' ),
				'options'  => array(
					'date' => 'Order By Date',
					'modified' => 'Order By Last Modified Date',
					'title' => 'Order By Title',
					'rand' => 'Order By Random',
					'menu_order' => 'Order By Page Order',
					'comment_count' => 'Order By Number of Comments',
					'none' => 'None',
				),
				'default'  => 'date'
			),
			
			array(
                'id'       => 'faq-display-sidebar-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Disable Sidebar', 'manual' ),
                'subtitle' => esc_html__( 'If checked FAQ sidebar will disable', 'manual' ),
                'default'  => false,
            ),
			
			
			array(
				'id'       => 'faq-sidebar-display-position',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Position', 'manual' ),
				'options'  => array(
					'left' => 'Left',
					'right' => 'Right',
				),
				'default'  => 'left'
			),
			
			array(
                'id'       => 'faq-display-social-share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Share', 'manual' ),
                'subtitle' => esc_html__( 'show hide social share inside FAQ blocks', 'manual' ),
                'default'  => true,
				'desc'    => esc_html__( 'On == Enable', 'manual' ),
            ),
			
			array(
                'id'       => 'faq-ed-expandcollapse',
                'type'     => 'switch',
                'title'    => esc_html__( '"Expand / Collapse All" Text', 'manual' ),
                'subtitle' => esc_html__( 'Disable/Enable "Expand / Collapse All" ', 'manual' ),
                'default'  => true,
				'desc'    => esc_html__( 'Off == Disable', 'manual' ),
            ),
			
		
		)
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Page - Custom Title', 'manual' ),
        'id'               => 'faq_custom_title_design_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
					array(
						'id'       => 'faq-typography-title-overwrite',
						'type'     => 'switch',
						'title'    => esc_html__( 'Overwrite <h5> Title Tag', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Enabling this feature will overwrite <h5> tag', 'manual' ),
					),
		
					array(
					'id'       => 'faq-custom-title-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '600',
					'subtitle' => 'Font weight totally depens on type of google "font family" you had choose from the "Typography" section',
				),
                
                
                array(
					'id'            => 'faq-custom-title-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 19,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'desc' => 'Default: 19px',
					'display_value' => 'text',
				),
                
                array(
					'id'       => 'faq-custom-title-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'none'
				),
		
	  )
    ) );
	
	
	// Search Handler
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search Settings', 'manual' ),
        'id'               => 'faq_search_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				
				array(
					'id'       => 'faq-hash-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hash Search', 'manual' ),
					'subtitle' => esc_html__('If disable, system will redirect to the single FAQ page', 'manual'),
					'default'  => true,
				),
		
		)
    ) );	


	
/**********************************************
*******  START  PORTFOLIO       *****
***********************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Portfolio', 'manual' ),
			'id'               => 'theme_portfolio_section',
			'customizer_width' => '400px',
			'icon'             => 'el el-picture'
		) );
		
		 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'Custom Slug Name', 'manual' ),
			'id'         => 'manual-portfolio-settings',
			'subsection' => true,
			'fields'     => array(
			
			   array(
					'id'       => 'portfolio-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>work</strong>/single-portfolio-record/ <br><br>  <div style="color: #D01B0B;"><strong>WARNING:</strong> Single post portfolio <strong>Slug Name</strong> must be different from the page name used to display portfolio</strong>. If same name provided system will show 404 error page when used Portfolio pagination. ', 'manual' ),
					'default'  => 'work',
				),
				
			   array(
					'id'       => 'portfolio-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>pfocat</strong>/themes/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name must be different from the <strong>Portfolio Single Post (Slug Name)</strong>. If same name provided system will show 404 error page when click on the Portfolio category link. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect search. </div>', 'manual' ),
					'default'  => 'pfocat',
				),
				
				
				
				
			)
		) );
		
		
		Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Settings', 'manual' ),
        'id'               => 'portfolio_single_page_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
						array(
							'id'       => 'portfolio-comment-status',
							'type'     => 'switch',
							'title'    => esc_html__( 'Activate Comment Box', 'manual' ),
							'subtitle' => esc_html__('Allow comments on each portfolio article', 'manual'),
							'default'  => false,
						),
						
						array(
							'id'       => 'portfolio-next-previous-status',
							'type'     => 'switch',
							'title'    => esc_html__('Deactivate Next/Previous Link ', 'manual' ),
							'subtitle' => esc_html__('Disable previous / next link at the bottom of the portfolio single page', 'manual'),
							'default'  => false,
						),			
									
			)
		) );
		
		
		
		
		
/**********************************************
*******  START BLOG       *****
***********************************************/

	Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Blog', 'manual' ),
			'id'               => 'theme_blog_section',
			'customizer_width' => '400px',
			'icon'             => 'el el-blogger'
	) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Breadcrumb', 'manual' ),
        'id'               => 'blog_breadcrumb_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'blog-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>{BLOG CUSTOM NAME}</strong> / Latest News /', 'manual' ),
					'default'  => '',
					'subtitle' => __( 'Will replace blog page name', 'manual' ),
				),
				
				array(
					'id'       => 'remove_blog_breadcrumb_name',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Breadcrumb Name', 'manual' ),
					'desc' => '<strong>Will appear as:</strong>  Home / Latest News /',
					'default'  => false,
					'subtitle'    => esc_html__( 'On == Disable', 'manual' ),
				),
									
									
		)
    ) );	
	

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog Post Settings', 'manual' ),
        'id'     => 'theme_blog_section_singlepg',
        'subsection' => true,
        'fields' => array(

				array(
					'id'       => 'blog_single_page_global_header_settings',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply "Front Post Page" Header Settings To All The Blog Area', 'manual' ),
					'subtitle' => '<strong style="color:#11d62b;">Applyed to all the blog area (i.e Categories, Archives, Tag pages) but, EXCEPT single blog post.</strong>',
					'default'  => false,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual_blog_single_page_settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Blog Single Page Settings', 'manual' ),
					'indent'   => true,
				),
				
				array(
					'id'       => 'blog_single_title_on_content_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Blog Title', 'manual' ),
					'subtitle' => '<strong>on/off blog title from the page content</strong>',
					'default'  => false,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_page_icon_format',
					'type'     => 'switch',
					'title'    => esc_html__( 'Format Icon', 'manual' ),
					'subtitle' => 'remove icon format from the single post',
					'default'  => true,
					'desc'    => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_social_share_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Share', 'manual' ),
					'subtitle' => esc_html__('on/off social share from the blog post', 'manual'),
					'default'  => true,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_sidebar_status',
					'type'     => 'switch',
					'title'    => esc_html__('Sidebar', 'manual'),
					'subtitle' => esc_html__('on/off sidebar from the blog post', 'manual'),
					'default'  => true,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_page_sidebar_center_content',
					'type'     => 'switch',
					'title'    => esc_html__('Apply Center Content', 'manual'),
					'subtitle' => '<strong style="color:#11d62b;">Feature work, when single page sidebar is OFF</strong>',
					'default'  => false,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),

		)
    ) );	
		
		
		
		
		
		
		
/**********************************************
*******  //  FORUM SECTION  //     *****
***********************************************/

						  
	 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'Forum', 'manual' ),
			'id'         => 'theme-forum-settings',
			'icon'       => 'el el-comment-alt',
			'fields'     => array(					  
			
           array(
                'id'       => 'manual-forum-yes-no-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Forum Section "with or without sidebar"', 'manual' ),
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                    
                ),
                'default'  => '2'
            ),
			
			array(
                'id'      => 'manual-forum-message',
                'type'    => 'editor',
                'title'   => esc_html__( 'User Alert Message', 'manual' ),
				'subtitle' => esc_html__( 'Qill appear ONLY on the forum home page', 'manual' ),
                'default' => '',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => false,
                )
            ),
			
        )
    ) );
	 
	 
	 
/*************************************
*******  WOOCOMMERCE - SETTINGS  *****
**************************************/
	
global $woocommerce;
if ($woocommerce) {
	
	 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'WooCommerce', 'manual' ),
			'id'         => 'theme_woocommerce',
			'icon'       => 'el el-shopping-cart',
			'fields'     => array(
		
				array(
					'id'       => 'woo_column_product_listing',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Columns', 'manual' ),
					'subtitle' => esc_html__( 'Choose number of columns for product listing', 'manual' ),
					'options'  => array(
						'3' => '3 Columns',
						'4' => '4 Columns',
					),
					'default'  => '3'
				),
				
				array(
					'id'       => 'woo_display_sidebar_on_product_listing_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Sidebar', 'manual' ),
					'subtitle'    => __( 'Display sidebar on the product listing page i.e on default shop page', 'manual' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'woo_no_of_related_products',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Related Products', 'manual' ),
					'subtitle' => esc_html__( 'Choose number of related products', 'manual' ),
					'options'  => array(
						'3' => '3 Columns',
						'4' => '4 Columns',
					),
					'default'  => '4'
				),
				
		 )
    ) );
	
}

		

/**********************************************
*******  START  SEARCH       *****
***********************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search', 'manual' ),
        'id'               => 'theme_search_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-search-alt'
    ) );


	// LIVE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Live Search', 'manual' ),
        'id'           => 'theme_live_search_section',
		'subsection'   => true,
        'fields' => array(
						  
				array(
					'id'       => 'manual-default-search-type-multi-select',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Default Live/Normal Target Search', 'manual' ),
					'subtitle' => 'System will only display results from the selected post types while performing live/normal search <strong>i.e without selecting any post type</strong>',
					'desc'     => __( '<strong>NOTE:</strong> If no any post type selected above, system will do normal WP (default) search', 'manual' ),
					'default'  => array('post','manual_kb','manual_faq','manual_portfolio','manual_documentation')
				),		  
				
				array(
					'id'       => 'manual-live-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Live Search', 'manual' ),
					'subtitle' => esc_html__('Globally disable live search', 'manual'),
					'default'  => true,
					'desc' => 'Off == Disable',
				),
				
				array(
					'id'       => 'manual-live-search-post-navigation-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Live Search Post Navigation/Breadcrumb', 'manual' ),
					'subtitle' => '<span style="color:orange;">Live search will display post Navigation for Post, FAQ, Documenation & Knowledge Base</span>',
					'desc' => 'Off == Disable',
					'default'  => true,
				),
				
				array(
					'id'       => 'global-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Placeholder Text', 'manual' ),
					'default'  => 'Have a question? Ask or enter a search term.',
				),
				
				 array(
					'id'       => 'global-flip-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Flip Search Placeholder Text', 'manual' ),
					'default'  => 'Please Let Us Know Your Problem',
				),
				
				array(
					'id'       => 'global-buttom-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Buttom Text', 'manual' ),
					'default'  => 'Search',
				),
				
				array(
					'id'       => 'global-showall-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Show All Results Text', 'manual' ),
					'default'  => 'Show All Results',
				),
				
				array(
					'id'       => 'global-noresult-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'No Results Text', 'manual' ),
					'default'  => 'No Results',
				),
				
		 )
    ) );
	
	// TRENDING SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Trending Search', 'manual' ),
        'id'           => 'theme_trending_search_section',
		'subsection'   => true,
        'fields' => array(
				
				array(
					'id'       => 'manual-trending-live-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Trending Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable trending searches ', 'manual'),
					'default'  => false,
					'desc' => 'On == Activate',
				),
				
				array(
					'id'       => 'manual-trending-text',
					'type'     => 'text',
					'title'    => esc_html__( 'Text', 'manual' ),
					'subtitle' => esc_html__( 'Short message words', 'manual'),
					'desc'     => esc_html__( 'Default: Popular Search', 'manual' ),
					'default'  => 'Popular Search:',
				),
				
				array(
					'id'       => 'manual-three-trending-search-text',
					'type'     => 'sortable',
					'title'    => esc_html__( 'Trending Search keyword', 'manual' ),
					'subtitle' => esc_html__( 'Include 3 search term that is trending ex: installation, demo data etc...', 'manual' ),
					'label'    => true,
					'options'  => array(
						'Search keyword 1'  => '',
						'Search keyword 2'  => '',
						'Search keyword 3'  => '',
					)
				),
				
		 )
    ) );
	
	// TARGET POST TYPE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Target Post Type Search', 'manual' ),
        'id'           => 'theme_target_post_type_search_section',
		'subsection'   => true,
        'fields' => array(
				
				/*array(
					'id'       => 'manual_dropdown_live_search_control',
					'type'     => 'section',
					'title'    => esc_html__( 'Dropdown Target Search', 'manual' ),
					'indent'   => true,
				),*/
				
				array(
					'id'       => 'manual-trending-post-type-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Dropdown Target Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable target search', 'manual'),
					'default'  => true,
					'desc' => 'On == Activate',
				),
				
				array(
					'id'       => 'manual-dropdown-target-search-margin-right',
					'type'     => 'text',
					'title'    => esc_html__( 'Dropdown Target Search Box Margin Right', 'manual' ),
					'subtitle' => esc_html__( 'Adjust dropdown box design, if creating any space', 'manual' ),
					'desc' => esc_html__( 'Example: 0px, -10px, 20px', 'manual' ),
					'default'  => '0px',
				),
				
				array(
					'id'       => 'manual-trending-post-type-search-status-on-forum-pages',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Dropdown Target Search On The Forum (bbpress) Section', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable post type search ', 'manual'),
					'default'  => false,
					'desc' => 'On == Activate',
				),
				
				array(
					'id'       => 'manual-search-post-type-multi-select',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Target Search (Dropdown list)', 'manual' ),
					'subtitle' => 'While performing search if selected any post type, <strong>the live/normal search results are targeted to only chosen post type</strong>',
					'desc'     => __( '<strong>NOTE:</strong> Post Type: "Forums" does not work ONLY for the TARGET LIVE search but WORKS SMOOTHLY for the normal search <br><br> <strong>NOTE 2:</strong> Post Type: "Replies and Topics" will not list on the Target Search although selected on list above.', 'manual' ),
					'default'  => array('post','page','manual_kb','manual_faq','manual_portfolio','manual_documentation')
				),
				
				array(
					'id'       => 'manual_dropdown_value_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Target Search Dropdown Text', 'manual' ),
					'indent'   => true,
					'subtitle' => 'If selected post type keyword matches from the "Target Search (Dropdown list)" above, it will be replace by below text',
				),
				
				array(
					'id'       => 'manual-post-type-search-text-inital',
					'type'     => 'text',
					'title'    => esc_html__( 'Default', 'manual' ),
					'subtitle' => esc_html__( 'Default display text', 'manual' ),
					'default'  => 'All Site',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-kb',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Knowledge Base Text', 'manual' ),
					'default'  => 'Knowledge Base',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-documentation',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Documentation Text', 'manual' ),
					'default'  => 'Documentation',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-portfolio',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Portfolio Text', 'manual' ),
					'default'  => 'Portfolio',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-faq',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQs', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown FAQs Text', 'manual' ),
					'default'  => 'FAQs',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-forums',
					'type'     => 'text',
					'title'    => esc_html__( 'Forums', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Forums Text', 'manual' ),
					'default'  => 'Forums',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-media',
					'type'     => 'text',
					'title'    => esc_html__( 'Media', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Media Text', 'manual' ),
					'default'  => 'Media',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Page', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Page Text', 'manual' ),
					'default'  => 'Page',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-post',
					'type'     => 'text',
					'title'    => esc_html__( 'Post', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Post Text', 'manual' ),
					'default'  => 'Post',
				),
				
				
		 )
    ) );
	
	
	// SEARCH PAGE
	Redux::setSection( $opt_name, array(
	'title'        => esc_html__( 'Search Page', 'manual' ),
	'id'           => 'theme_target_post_type_search_page_section',
	'subsection'   => true,
	'fields' => array(
					  
					array(
						'id'       => 'searchpg-sidebar',
						'type'     => 'switch',
						'title'    => esc_html__( 'Search Page Sidebar', 'manual' ),
						'default'  => true,
						'desc' => esc_html__( 'On = Enable', 'manual' ),
					),  
	
					array(
						'id'       => 'searchpg-records-publish-date',
						'type'     => 'switch',
						'title'    => esc_html__( 'Disable Post Publish Date', 'manual' ),
						'default'  => true,
						'subtitle' => esc_html__( 'On checked "Off" no post publish date will appear under search post title', 'manual' ),
						'desc' => esc_html__( 'On = Enable', 'manual' ),
					),
					
					array(
						'id'       => 'searchpg-records-author-name',
						'type'     => 'switch',
						'title'    => esc_html__( 'Disable Author Name', 'manual' ),
						'default'  => true,
						'subtitle' => 'On checked "Off" no author name will appear under search post title',
						'desc' => esc_html__( 'On = Enable', 'manual' ),
					),
					
					array(
						'id'       => 'searchpg-records-post-user-name',
						'type'     => 'select',
						'title'    => esc_html__( 'Author Name', 'manual' ),
						'subtitle' => esc_html__( 'will appear under title i.e aricle display by', 'manual' ),
						'options'  => array(
							'user_login' => 'User Login',
							'user_nicename' => 'User Nicename',
							'user_registered' => 'User Registered',
							'display_name' => 'Display Name',
							'first_name' => 'First Name',
							'user_firstname' => 'User Firstname',
						),
						'default'  => 'user_nicename'
					),
					
					array(
						'id'       => 'searchpg-post-content-section',
						'type'     => 'section',
						'title'    => esc_html__( 'Search Post Content', 'manual' ),
						'indent'   => true,
					),
					
					array(
						'id'       => 'searchpg-display-post-content',
						'type'     => 'switch',
						'title'    => esc_html__( 'Display Search Post Content', 'manual' ),
						'default'  => true,
						'subtitle' => 'Character limit post content will display below headline',
					),
					
					array(
						'id'       => 'searchpg-display-post-content-on-post-type',
						'type'     => 'select',
						'data'     => 'post_type',
						'multi'    => true,
						'sortable' => true,
						'title'    => esc_html__( 'Target Search Result Display', 'manual' ),
						'subtitle' => 'System will only display post content from the selected post types</strong>',
						'desc'     => __( '<strong>NOTE:</strong> If no any post type selected, system will just display title', 'manual' ),
						'default'  => array('manual_kb','manual_documentation')
					),
					
					array(
						'id'       => 'searchpg-display-post-content-character',
						'type'     => 'text',
						'title'    => esc_html__( 'Limit Post Content', 'manual' ),
						'subtitle' => esc_html__( 'Search post description will limit to define character', 'manual' ),
						'desc' => esc_html__( 'Default Character: 200 words', 'manual' ),
						'default'  => '200',
					),					
					
			 )
    ) );

	


/********************************************************
*******  START - PAGE TEMPLATE "Home Page" SETTINGS *****
*********************************************************/
	 
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Page Template "Home Page" Settings', 'manual' ),
		'id'               => 'homeconfg',
		'desc'             => esc_html__( 'These are really basic fields!', 'manual' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home'
	) );
		
	// Help Section	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Help Section', 'manual' ),
		'id'               => 'help-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
		
			array(
				'id'       => 'home-help-section-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Home Help Section', 'manual' ),
				'default'  => true,
			),
			
			
			array(
			'id'       => 'home-help-section-mindisplay-blocks',
			'type'     => 'select',
			'title'    => esc_html__( 'Display Minimum "X" no of Help Blocks', 'manual' ),
			'subtitle' => esc_html__( 'Choose minimum number of help blocks to display', 'manual' ),
			'options'  => array(
				'3' => 'Block 3',
				'4' => 'Block 4',
			),
			'default'  => '4'
		),
			
			
		
			array(
				'id'       => 'home-help-section-title-main',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Help Desk',
			),
		
		   array(
				'id'      => 'home-help-section-msg-short',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Easily create Documentation, Knowledge-base, FAQ, Forum and more using page layouts and the tools we provide.',
			),
			
			array(
				'id'    => 'home-help-section-info',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'title' => esc_html__( 'Help Section Block Infomration', 'manual' ),
				'desc'  => __( 'Please click on <strong>"Home Help Blocks -> Add New Block"</strong> to add new blocks on the Help Section', 'manual' )
			),
			
			
		)
	) );
	
	// Testimonials	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Testimonials', 'manual' ),
		'id'               => 'home-testimonials-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
			array(
				'id'       => 'home-testimonials-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Organization Blocks Display Status', 'manual' ),
				'default'  => true,
			),
			
			 array(
			'id'       => 'testimonials-plx-url',
			'type'     => 'media',
			'title'    => esc_html__( 'Testimonials Parallax Image', 'manual' ),
		),
			
			
			array(
				'id'    => 'home-testimonials-info',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'title' => esc_html__( 'Testimonials Infomration', 'manual' ),
				'desc'  => __( 'Please click on <strong>"Testimonials -> Add New Block"</strong> to add new Testimonials blocks', 'manual' )
			),
			
			
		)
	) );
	
	// Organization Blocks	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Organization Blocks', 'manual' ),
		'id'               => 'home-org-blocks-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
			array(
				'id'       => 'home-org-block-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Organization Blocks Display Status', 'manual' ),
				'default'  => true,
			),
			
		 array(
			'id'       => 'home-org-block-background-url',
			'type'     => 'media',
			'title'    => esc_html__( 'Organizational Block Sidebar Image', 'manual' ),
		),
			
			array(
				'id'       => 'home-org-block-main-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Why People Love Us',
			),
			
		   array(
				'id'      => 'home-org-block-sub-title',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
			),
			
			array(
				'id'    => 'home-org-help-section-info',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'title' => esc_html__( 'Organization Blocks Infomration', 'manual' ),
				'desc'  => __( 'Please click on <strong>"Home Org Blocks -> Add New Block"</strong> to add new blocks on the Help Section', 'manual' )
			),
			
		)
	) );
		
	// Message Bar	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Message Bar', 'manual' ),
		'id'               => 'home-message-bar-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
			array(
				'id'       => 'de-message-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Message Bar Display Status', 'manual' ),
				'default'  => true,
			),
			
			array(
				'id'       => 'message-bar-main-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Didn\'t find the question you were searching?',
			),
			
		   array(
				'id'      => 'message-bar-sub-title',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
			),
			
			
			array(
				'id'       => 'message-bar-bottom-display-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Bottom Text', 'manual' ),
				'subtitle' => esc_html__( 'Bottom display text', 'manual' ),
				'default'  => 'Go To Live Chat',
			),
		
			array(
				'id'       => 'message-bar-bottom-url',
				'type'     => 'text',
				'title'    => esc_html__( 'Bottom Url', 'manual' ),
				'default' => '#',
			),
		
			
			
		)
	) );
	 
	// Fun Act
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Fun Act', 'manual' ),
		'id'               => 'home-funact-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
			array(
				'id'       => 'home-funact-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fun Act Display Status', 'manual' ),
				'default'  => true,
			),
			
			 array(
			'id'       => 'funact-plx-url',
			'type'     => 'media',
			'title'    => esc_html__( 'Fun Act Parallax Image', 'manual' ),
			),
			
			array(
				'id'       => 'home-funact-main-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Something you dont know...',
			),
			
		   array(
				'id'      => 'home-funact-sub-title',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
			),
			
			array(
			'id'       => 'home-funact-sortable',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Fun Act', 'manual' ),
			'subtitle' => __( 'Define organization fun act.', 'manual' ),
			'label'    => true,
			'options'  => array(
				'Text One'   => 'Happy Customers',
				'Text Two'   => 'Projects',
				'Text Three' => 'Satisfied Clients',
				'Text Four' => 'Problem Solved',
				)
			 ),
			 
			array(
			'id'       => 'home-funact-no-sortable',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Fun Act Number', 'manual' ),
			'subtitle' => __( 'Define organization fun act Number.', 'manual' ),
			'label'    => true,
			'options'  => array(
				'Text One'   => '',
				'Text Two'   => '',
				'Text Three' => '',
				'Text Four' => '',
				)
			 ),
			
		)
	) );
		
/*************************************
*******  404 Page Content  *****
**************************************/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( '404 Page Content', 'manual' ),
        'id'               => '404-pagecontent',
        'customizer_width' => '450px',
		'icon'             => 'el el-error',
        'fields'           => array(
									
					
					array(
						'id'       => '404-disable-page-contnet',
						'type'     => 'switch',
						'title'    => esc_html__( 'Disable Page Content', 'manual' ),
						'default'  => true,
						'desc' => esc_html__( 'Off == Disable', 'manual' ),
					),
					
					
					array(
						'id'       => '404-pagetitme',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Text', 'manual' ),
						'default'  => '404',
					),
					
					array(
						'id'       => '404-sustitle',
						'type'     => 'text',
						'title'    => esc_html__( 'Sub-title Text', 'manual' ),
						'default'  => 'Oops! That page can\'t be found',
					),
					
					array(
						'id'       => '404-contenttext',
						'type'     => 'text',
						'title'    => esc_html__( 'Page Content Text', 'manual' ),
						'default'  => 'The link BROKEN, or the page has been REMOVED. Try search our site.',
					),
					
					array(
						'id'       => '404-disable-page-search',
						'type'     => 'switch',
						'title'    => esc_html__( 'Disable Search Box', 'manual' ),
						'default'  => true,
						'desc' => esc_html__( 'Off == Disable', 'manual' ),
					),
					
									
		)
	) );
	 
	 
/*************************************
*******  START - NOTIFICATION BAR  *****
**************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Notification Bar', 'manual' ),
        'id'               => 'footer-notification-bar',
        'customizer_width' => '450px',
		'icon'             => 'el el-bullhorn',
        'fields'           => array(
		
			array(
				'id'       => 'footer-notification-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Notification Bar Display Status', 'manual' ),
				'default'  => true,
			),
			
			array(
                'id'       => 'footer-notification-bar-bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Color RGBA', 'manual' ),
                'default'  => array(
                    'color' => '#5AA773',
                    'alpha' => '1'
                ),
                'mode'     => 'background',
            ),
			
			array(
                'id'       => 'footer-notification-bar-background-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Background Image', 'manual' ),
                'compiler' => 'true',
            ),
			
			array(
                'id'            => 'footer-notification-bar-text-margin',
                'type'          => 'slider',
                'title'         => esc_html__( 'Text Margin Top/Bottom', 'manual' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 200,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
		
			array(
                'id'      => 'footer-text',
                'type'    => 'editor',
                'title'   => esc_html__( 'Message', 'manual' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => true,
                )
            ),
			
        )
    ) );
	
	
	 
/*************************************
*******  START - FOOTER SECTION  *****
**************************************/

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'manual' ),
        'id'               => 'theme-footer',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card'
    ) );
	
	// Footer Style
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Style', 'manual' ),
        'id'               => 'footer-design-type-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'theme-footer-type',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Footer Style Type', 'manual' ),
					'subtitle' => esc_html__( 'Settings will effect globally', 'manual' ),
					'options'  => array(
						'1' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/footer1.jpg' ),
						'2' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/footer2.jpg' ),
					),
					'default'  => '2',
				),	
				
				// FOOTER WIDGET AREA
				array(
					'id'       => 'footer_widget_extra_settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Widget Area', 'manual' ),
					'indent'   => true,
				),
				
				array(
					'id'       => 'footer-widget-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Footer Widget Area', 'manual' ),
					'subtitle' => esc_html__( 'Only works for the default footer style i.e with widget and footer', 'manual' ),
					'default'  => false,
				),
				
				array(
					'id'            => 'theme_footer_noof_section_widget_area',
					'type'          => 'slider',
					'title'         => esc_html__( 'Number Of Widget', 'manual' ),
					'default'       => 4,
					'min'           => 1,
					'step'          => 1,
					'max'           => 4,
					'display_value' => 'label',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'theme_footer_redesign_start_column',
					'type'     => 'section',
					'title'    => esc_html__( 'Adjust, Widget Area Column', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'    => 'info_warning',
					'type'  => 'info',
					'title' => esc_html__('IMPORTANT! Adjust, \'Widget Area Column\' based to the \'Number Of Widget\' size chosen above', 'manual'),
					'style' => 'critical',
					'desc'  => '<br>1. If selected \'Number Of Widget\' == 4, the <strong>total sum (Footer One + Footer Two + Footer Three + Footer Four)</strong> must be 12 while adjusting column <br> 2. If selected \'Number Of Widget\' == 3, the <strong>total sum (Footer One + Footer Two + Footer Three)</strong> must be 12 while adjusting column <br> 3. If selected \'Number Of Widget\' == 2, the <strong>total sum (Footer One + Footer Two)</strong> must be 12 while adjusting column ',
				),
				
				array(
					'id'            => 'footer_one_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer One Column', 'manual' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
				
				array(
					'id'            => 'footer_two_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer Two Column', 'manual' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
			
				array(
					'id'            => 'footer_three_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer Three Column', 'manual' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
			
				array(
					'id'            => 'footer_four_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer Four Column', 'manual' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
									
									
	  )
    ) );

	// Copyright & Social
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Copyright & Social', 'manual' ),
        'id'               => 'footer-design-bar',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
				'id'       => 'footer-social-copyright-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Footer Social/copyright Area', 'manual' ),
				'subtitle' => esc_html__( 'Only works for the default footer style i.e with widget and footer', 'manual' ),
				'default'  => false,
			),
			
			array(
				'id'       => 'footer-disable-copyright-section',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Copyright Section', 'manual' ),
				'subtitle' => 'Click <code>On</code> to disable copyright section.',
				'default'  => false,
			),
			
			array(
				'id'       => 'footer-disable-social-icons',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Social Icons', 'manual' ),
				'subtitle' => 'Click <code>On</code> to disable social icons.',
				'default'  => true,
			),
		
				
        )
    ) );
	
	// Social Icons
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Icons', 'manual' ),
        'id'               => 'footer-copyright-social-bar',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
                'id'       => 'footer-social-facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-youtube',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-google',
                'type'     => 'text',
                'title'    => esc_html__( 'Google URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-pinterest',
                'type'     => 'text',
                'title'    => esc_html__( 'Pinterest URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-vimo',
                'type'     => 'text',
                'title'    => esc_html__( 'vimo URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-tumblr',
                'type'     => 'text',
                'title'    => esc_html__( 'Tumblr URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-whatsapp',
                'type'     => 'text',
                'title'    => esc_html__( 'WhatsApp URL', 'manual' ),
            ),
			
        )
    ) );


/********************************************
*******  START - CUSTOM CODE  SECTION   *****
*********************************************/

	 Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Code', 'manual' ),
        'id'         => 'manual-editor',
        'subsection' => false,
        'fields'     => array(
							  
            array(
                'id'       => 'manual-editor-css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Custom Code', 'manual' ),
                'subtitle' => esc_html__( 'Change theme design using your own custom code', 'manual' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
            ),
			
            array(
                'id'       => 'manual-editor-js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Code', 'manual' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'manual' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
            ),
			
        )
    ) );


/**********************************************
*******  //  END OF - THEME OPTIONS  //   *****
***********************************************/
	 
	/*
     * <--- END SECTIONS
     */
 
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'manual' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'manual' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
?>