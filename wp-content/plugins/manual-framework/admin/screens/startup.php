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

$theme = manual__admin_get_theme_info();
$theme_name = $theme['name'];
?>

<div class="wrap about-wrap">
  <?php manual__admin_menu_tabs(); ?>
  <div class="about-description"> <?php printf(esc_html__('Thank you for choosing %s! You can also view our other premium WordPress products', 'manual-framework'), $theme_name); ?> </div>
  <br>
  <br>
  <!--Display Products-->
  <?php 
	$theme_info = time();
      wp_enqueue_script('vue.js', plugin_dir_url( __FILE__ ) . 'assets/vue.min.js', null, $theme_info, true);
    wp_enqueue_script('vue-resource.js', plugin_dir_url( __FILE__ ) . 'assets/vue-resource.js', array('vue.js'), $theme_info, true);
    wp_enqueue_script('vue-main.js', plugin_dir_url( __FILE__ ) . 'assets/main.js', array('vue.js'), $theme_info, true);
	?>
  <script type="text/javascript">
		var stm_theme = 'wsaplist';
	</script>
  <div id="theme-dashboard-announcement">
    <div v-for="announcement in announcements">
      <div v-html="announcement.content"></div>
    </div>
  </div>
  <!--Eof Display Products-->
</div>
