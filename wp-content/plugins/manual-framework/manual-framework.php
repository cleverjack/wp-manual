<?php 
/* 
 * Plugin Name:   Manual Framework (Post Type) 
 * Version:       2.6
 * Plugin URI:    http://www.wpsmartapps.com/
 * Description:   <strong>Support MANUAL wordpress theme</strong>.
 * Author:        pixelacehq (Jabin Kadel)
 * Author URI:    http://www.wpsmartapps.com
 *
 * License: Copyright (c) 2020 WpSmartApps.com. All rights reserved.
 *  
 */


define( 'MANUALSUPPORT_PLUGIN', __FILE__ );
define( 'MANUALSUPPORT_PLUGIN_DIR', untrailingslashit( dirname( MANUALSUPPORT_PLUGIN ) ) );

/********************************
*** ACTIVATE PLUGIN ACTION  ***
***********************************/
$manual_framework_path     = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', __FILE__);
$manual_framework_path     = str_replace('\\','/',$manual_framework_path);

// Langauge Support
add_action('plugins_loaded', 'manual_framework_load_textdomain');
function manual_framework_load_textdomain() {
        load_plugin_textdomain( 'manual-framework', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
}

// Version Upgrade
add_action('activate_'.$manual_framework_path, 'manual_framework_plugin_active'); 
function manual_framework_plugin_active() {
	update_option( 'manual_theme_framework_version', '2.6' );
	return true;
}

require MANUALSUPPORT_PLUGIN_DIR . '/manual-post-type.php';
if(is_admin()) { 
	require MANUALSUPPORT_PLUGIN_DIR . '/admin/admin.php'; 
	require MANUALSUPPORT_PLUGIN_DIR . '/announcement/main.php'; 
}

?>