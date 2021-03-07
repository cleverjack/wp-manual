<?php

/****************************************
 ***  ONE CLICK DEMO IMPORT - CUSTOM ***
*****************************************/

$OCDI_Plugin_active = manual__plugin_active('OCDI_Plugin');
if ( $OCDI_Plugin_active == true ) {
	
	// START IMPORT
	function ocdi_import_files() {
	  return array(
	  
		array(
            'import_file_name'             => 'Manual Original',
            'categories'                   => array( 'Manual Original'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/redux.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory() ) . 'img/preview_import_1.jpg',
            'import_notice'            => '<strong style="color: #dc2f2f;">ALERT:</strong><br> <ol><li><b>Import data maximum time 2-3 minutes</b> depending on your internet connection.</li> <li><b>DEMO PICTURES will be import</b> taking additionl 3-4 minutes.</li></ol> <br><strong style="color: #dc2f2f;">INSTALLATION FAIL:</strong><br><ol><li>Sometimes your <b>server has \'low upload size and minumim execution time\'</b> creating an issue. (Fix issue, manual URL: <a href="https://wpsmartapps.com/docs/theme-installation-fails/" target="_blank">Tutorial</a>)</li><li>You can also click on "Import Demo Data", to begain demo import process. System will begain importing data from where it has stopped.</li></ol><br><strong style="color: #dc2f2f;">ALERT 2</strong>: <ol><li><b>Setup the slider separately from; "Slider Revolution -> Import Slider"</b>. (Download slider: <a href="http://demo.wpsmartapps.com/themes/manual/MANUAL-ReV-SlideR/" target="_blank">Download Sliders</a>)</li></ol>',
        ),
		
	  );
	}
	add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
	
	
	// AUTOMATICALLY ASSIGN 'FRONT PAGE' & MENU LOCATION AFTER THE IMPORT IS DONE.
	function ocdi_after_import_setup() {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'header menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'footer', 'nav_menu' );
		
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
				'footer' => $footer_menu->term_id,
			)
		);
	
		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home Landing' );
		$blog_page_id  = get_page_by_title( 'News' );
	
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	
	}
	add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
	
	
	// CHANGE THE LOCATION
	function manual_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'admin.php';
		$default_settings['page_title']  = esc_html__( 'Manual Demo Import' , 'manual' );
		$default_settings['menu_title']  = esc_html__( 'Manual Demo Import' , 'manual' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'manual-demo-import';
		return $default_settings;
	}
	add_filter( 'pt-ocdi/plugin_page_setup', 'manual_plugin_page_setup' );
	
	
	// CHANGE PLUGIN INTRO
	function manual_import_intro_text( $default_text ) {
		$default_text .= '<div class="ocdi__intro-text" style="padding: 10px;background: #e2e263;margin-bottom: 10px;">This upgrade process requires PHP version of at least 5.3.x, but we recommend version 5.6.x or better yet 7.x. Please contact your hosting company and ask them to update the PHP version for your site, if hosting using low PHP version.</div>';
		return $default_text;
	}
	add_filter( 'pt-ocdi/plugin_intro_text', 'manual_import_intro_text' );
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

}
?>