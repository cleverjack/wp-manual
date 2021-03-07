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

/******************
 MANUAL THEME INFO
*******************/
function manual__admin_get_theme_info() {
	$theme = wp_get_theme();
	$theme_name = $theme->get('Name');
	$theme_v = $theme->get('Version');
	$theme_info = array(
		'name' => $theme_name,
		'slug' => sanitize_file_name(strtolower($theme_name)),
		'v'    => $theme_v,
	);
	return $theme_info;
}

/*************
  TAB MENU
**************/
function manual__admin_menu_tabs($screen='welcome') {
	$theme = manual__admin_get_theme_info();
	$theme_name = $theme['name'];
	if(empty($screen)) { $screen = 'manual-admin'; }
	?>

<div class="clearfix">
  <div><?php echo $theme_name.'&nbsp;'.substr($theme['v'], 0, 5); ?></div>
  <h1><?php printf(esc_html__('Welcome to %s', 'manual-framework'), $theme_name); ?></h1>
  <div class="about-text"> <?php printf(esc_html__('%s is now installed and ready to use! With Manual Help Desk theme; everything in one place, a happy team, and loyal customers. We hope you enjoy it!', 'manual-framework'), $theme_name); ?> </div>
</div>
<h2 class="nav-tab-wrapper"> 
  <a href="<?php echo ( 'welcome' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=manual-admin' ) ); ?>" class="<?php echo ( 'welcome' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab">
  <?php esc_attr_e( 'Welcome', 'manual-framework' ); ?>
  </a> 
  
  <a href="<?php echo ( 'support' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=manual-admin-support' ) ); ?>" class="<?php echo ( 'support' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab">
  <?php esc_attr_e( 'Support', 'manual-framework' ); ?>
  </a> 
  
  <a href="<?php echo ( 'plugins' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=manual-admin-plugins' ) ); ?>" class="<?php echo ( 'plugins' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab">
  <?php esc_attr_e( 'Plugins', 'manual-framework' ); ?>
  </a> 
  
  <a href="<?php echo ( 'demos' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=manual-demo-import' ) ); ?>" class="<?php echo ( 'demos' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab">
  <?php esc_attr_e( 'Demo Import', 'manual-framework' ); ?>
  </a> 
  
  <a href="<?php echo ( 'system-status' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=manual-admin-system-status' ) ); ?>" class="<?php echo ( 'system-status' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab">
  <?php esc_attr_e( 'System Status', 'manual-framework' ); ?>
  </a>
    
  <a href="<?php echo ( 'customization' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=manual-admin-customization' ) ); ?>" class="<?php echo ( 'customization' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab">
  <?php esc_attr_e('Customization', 'manual-framework'); ?>
  </a> 
  
  <?php if( $theme_name == 'Manual Child Theme' ) { $linkname = 'ManualChildTheme'; } else { $linkname = 'Manual'; } ?>
  <a href="<?php echo esc_url_raw(admin_url('admin.php?page='.$linkname.'')); ?>" class="nav-tab">
  <?php esc_attr_e('Theme Options', 'manual-framework'); ?>
  </a> 
  
  </h2>
<?php
}


/**********************
  THEME SYSTEM REPORT
***********************/
function manual__server_memory($size) {
	$l   = substr( $size, -1 );
	$ret = substr( $size, 0, -1 );
	switch ( strtoupper( $l ) ) {
		case 'P':
			$ret *= 1024;
		case 'T':
			$ret *= 1024;
		case 'G':
			$ret *= 1024;
		case 'M':
			$ret *= 1024;
		case 'K':
			$ret *= 1024;
	}
	return $ret;
}
?>
