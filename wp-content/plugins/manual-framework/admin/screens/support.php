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
  <?php manual__admin_menu_tabs('support'); ?>
  <div id="welcome-panel" class="welcome-panel">
    <div style="margin:0px 20px; font-size: 18px;"> <?php printf( __( 'Manual WordPress Theme comes with 6 months of free support for every license you purchase. Support can be <a %1$s>extended through subscriptions</a> via ThemeForest. Below are all the resources we offer in our support center.', 'manual-framework' ), 'href="https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support" target="_blank"' ); ?> </div>
    <div class="welcome-panel-column-container" style="margin:20px 20px;">
      <div class="welcome-panel-column" style="margin-bottom: 75px;">
        <h3>
          <?php esc_attr_e( '1. Submit A Ticket', 'manual-framework' ); ?>
        </h3>
        <p  style="padding:0px 20px 0px 0px;">
          <?php _e( 'Use our private ticket sytem for issue that need to be take closer look.', 'manual-framework' ); ?>
        </p>
        <a href="http://support.wpsmartapps.com/" target="_blank">
        <?php esc_html_e( 'Submit a ticket', 'manual-framework' ); ?>
        </a> </div>
      <div class="welcome-panel-column">
        <h3>
          <?php esc_attr_e( '2. Documentation', 'manual-framework' ); ?>
        </h3>
        <p style="padding:0px 20px 0px 0px;"> <?php printf(__( 'Use our online documentaiton for learning the every aspect and features of %s.', 'manual-framework' ), $theme_name); ?> </p>
        <a href="https://wpsmartapps.com/doc/wordpress-themes/manual-theme/" target="_blank">
        <?php esc_html_e( 'Learn more', 'manual-framework' ); ?>
        </a> </div>
      <div class="welcome-panel-column">
        <h3>
          <?php esc_attr_e( '3. Community Forum', 'manual-framework' ); ?>
        </h3>
        <p> <?php printf(__( 'Ask a question or help each other using our community forum.', 'manual-framework' ), $theme_name); ?> </p>
        <a href="http://forums.wpsmartapps.com/" target="_blank">
        <?php esc_html_e( 'Visit Our Forum', 'manual-framework' ); ?>
        </a> </div>
    </div>
  </div>
</div>
