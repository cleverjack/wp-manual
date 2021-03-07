<?php
/**
 * @author     Manual
 * @copyright  (c) Copyright by Manual
 * @link       https://wpsmartapps.com/
 * @package    Manual
 * @since      2.6
 */

/* Do not allow directly accessing this file. */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**************************
  CALL MANUAL ADMIN PAGES
***************************/
function manual__admin_page_templates($path) {
	$path = MANUALSUPPORT_PLUGIN_DIR.'/admin/screens/' . $path . '.php';
	if($path)  require_once $path;
}

/***********************
  REGISTER MANUAL MENU
************************/
function manual__admin_startup_screen() {
	$theme = manual__admin_get_theme_info();
	$theme_name = $theme['name'];
	if( $theme_name == 'Manual Child Theme' ) { $linkname = 'ManualChildTheme'; } else { $linkname = 'Manual'; }
		/* WELCOME */
		add_menu_page( $theme_name, $theme_name, 'manage_options', 'manual-admin' , 'manual__admin_page', plugin_dir_url( __FILE__ ) . 'favicon.png',
			'2' );
		/* SUPPORT */
		add_submenu_page('manual-admin', esc_attr__('Support', 'manual-framework'), esc_attr__('Support', 'manual-framework'), 'manage_options', 'manual-admin-support', 'manual__admin_support_page' );
		/* PLUGINS */
		add_submenu_page( 'manual-admin', esc_attr__('Plugins', 'manual-framework'), esc_attr__('Plugins', 'manual-framework'), 'manage_options', 'manual-admin-plugins', 'manual__admin_plugins_page' );
		/* IMPORT */
		add_submenu_page( 'manual-admin', esc_attr__('Demo import', 'manual-framework'), esc_attr__('Demo Import', 'manual-framework'), 'manage_options', 'manual-demo-import', 'manual__admin_demo_install_page' );
		/* SYSTEM STATUS */
		add_submenu_page( 'manual-admin', esc_attr__('System status', 'manual-framework'), esc_attr__('System Status', 'manual-framework'), 'manage_options', 'manual-admin-system-status', 'manual__admin_status_page' );
		/* THEME OPTIONS */
		add_submenu_page( 'manual-admin', esc_attr__('Theme Options', 'manual-framework'), esc_attr__('Theme Options', 'manual-framework'), 'switch_themes', 'admin.php?page='.$linkname.'' );
		/* CUSTOMIZATION */
		add_submenu_page( 'manual-admin', esc_attr__('System status', 'manual-framework'), esc_attr__('Extra - Customization', 'manual-framework'), 'manage_options', 'manual-admin-customization', 'manual__admin_customization_page' );
}
add_action( 'admin_menu', 'manual__admin_startup_screen' );


/* Welcome Screen - Startup */
function manual__admin_page() {
	manual__admin_page_templates('startup');
}
/* Support Screen */
function manual__admin_support_page() {
	manual__admin_page_templates('support');
}
/* Plugins Screen */
function manual__admin_plugins_page() {
	manual__admin_page_templates('plugins');
}
/* Demo Screen */
function manual__admin_demo_install_page() {
	manual__admin_page_templates('install_demo');
}
/* System Status Screen */
function manual__admin_status_page() {
	manual__admin_page_templates('system_status');
}
/* Customization */
function manual__admin_customization_page(){
	manual__admin_page_templates('customization');
}
?>