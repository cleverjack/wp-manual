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

class manual__aAnnouncements
{
	public $announcement = array();

	function __construct()
	{
		add_action('wp_dashboard_setup', array($this, 'manual__dashboard_changelog'));
	}

	function manual__dashboard_changelog() {
		add_meta_box('manual__dashboard_announcement', 'WpSmartApps News', array($this, 'manual__dashboard_announcement_screen'), 'dashboard', 'side', 'high');
    }

	function manual__dashboard_announcement_screen()
	{
		$stm_theme = wp_get_theme()->get('Name');
		?>
        <script type="text/javascript">
            var stm_theme = <?php echo json_encode($stm_theme); ?>;
        </script>
        <div id="theme-dashboard-announcement"> 
            <div v-for="announcement in announcements">  
                <div v-html="announcement.content"></div>
            </div>
        </div>
	<?php }
}

new manual__aAnnouncements();

add_action('admin_enqueue_scripts', 'manual__admin_announcment_scripts');
function manual__admin_announcment_scripts($hook)
{
	if ($hook == 'index.php') {
		$theme_info = time();
		wp_enqueue_script('vue.js', plugin_dir_url( __FILE__ ) . 'assets/vue.min.js', null, $theme_info, true);
		wp_enqueue_script('vue-resource.js', plugin_dir_url( __FILE__ ) . 'assets/vue-resource.js', array('vue.js'), $theme_info, true);
		wp_enqueue_script('vue-main.js', plugin_dir_url( __FILE__ ) . 'assets/main.js', array('vue.js'), $theme_info, true);
	}
}

?>