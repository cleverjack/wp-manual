<?php
/**
 * @author     Manual
 * @copyright  (c) Copyright by Manual
 * @link       https://wpsmartapps.com/
 * @package    Manual
 * @since      2.6
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} 
?>
<style>.tgmpa.wrap h1, select#bulk-action-selector-top, input#doaction { display:none;} .tablenav { height: 13px; } td.type.column-type { font-weight: bold; } </style>
<div class="wrap about-wrap">
	<?php 
	manual__admin_menu_tabs('plugins'); 
	
	$tgm_page_plugins = new TGM_Plugin_Activation();
	echo '<div id="manual-theme-install-plugins">';
	$tgm_page_plugins->install_plugins_page();
	echo '</div>';
	?>
</div>