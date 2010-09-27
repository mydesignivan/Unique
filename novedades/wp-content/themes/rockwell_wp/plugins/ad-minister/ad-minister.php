<?php
/*
Plugin Name: Ad-minister
Version: 0.6
Plugin URI: http://labs.dagensskiva.com/plugins/ad-minister/
Author URI: http://labs.dagensskiva.com/
Description:  A management system for temporary static content (such as ads) on your WordPress website. Manage->Ad-minister to administer.
Author: Henrik Melin, Kal Ström

	USAGE:

	See the Help tab in Manage -> Ad-minister.

	LICENCE:

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
       
*/


require_once ( 'ad-minister-functions.php' );

// Theme action
add_action('ad-minister', administer_template_action, 10, 2);

// XML Export
add_action('rss2_head', 'administer_export');

// Enable translation
add_action('init', 'administer_translate'); 

// Add administration menu
function administer_admin() {
	if (!($user_level = get_option('administer_user_level'))) $user_level = 7;
	add_management_page('Ad-minister', 'Ad-minister', $user_level, 'ad-minister', 'administer_main');
}
add_action('admin_menu', 'administer_admin');

// Ajax functions
add_action('wp_ajax_administer_save_content', 'administer_save_content');
add_action('wp_ajax_administer_delete_content', 'administer_delete_content');
add_action('wp_ajax_administer_save_position', 'administer_save_position');
add_action('wp_ajax_administer_delete_position', 'administer_delete_position');

// Handle theme widgets
if (get_option('administer_make_widgets') == 'true') {
	add_action('sidebar_admin_page', 'administer_popuplate_widget_controls');
	add_action('init', 'administer_load_widgets');
}

// Display on dashboard
if (get_option('administer_dashboard_show') == 'true')
	add_action('activity_box_end', 'administer_activity_box_alerts', 1, 1);

// Count the number of impressions the content makes
if (get_option('administer_statistics') == 'true' && !is_admin()) {
	add_action('init', 'administer_init_impressions');
	add_action('shutdown', 'administer_save_impressions');
}
add_action('init', 'administer_do_redirect', 11);

add_action('administer_stats', 'administer_template_stats');

function administer_load_scripts () {
	if (ereg('page\=ad\-minister', $_SERVER['REQUEST_URI'])) {
		?>
 		<link rel='stylesheet' href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/ad-minister.css" type='text/css' />
		<?php
	}
}
function administer_default_edtor_to_html ($type) {
	global $page_hook;
	if (strpos($page_hook, 'ad-minister'))
		$type = 'html';
	return $type;
}

add_filter('wp_default_editor', 'administer_default_edtor_to_html');

function administer_queue_scripts () {
	global $wpdb;

	// Auto install
	if (!get_option('administer_post_id') || !administer_ok_to_go()) {
		$_POST = array();
		
		// Does it exist already?
		$sql = "select count(*) from $wpdb->posts where post_type='administer'";
		$nbr = $wpdb->get_var($sql) + 1;

		// Create a new one		
		$_POST['post_title'] = 'Ad-minister Data Holder ' . $nbr;
		$_POST['post_type'] = 'administer';
		$_POST['content'] = 'This post holds your Ad-minister data';
		$id = wp_write_post();
		update_option('administer_post_id', $id);
	}

	// Default tab is 'content'
    $tab =  ($_GET['tab']) ? $_GET['tab'] : 'content'; 

	$content = get_post_meta(get_option('administer_post_id'), 'administer_content', true);
	$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);

	// Cannot show 'Content' if there ain't any
	if ($tab == 'content' && (!is_array($content) || empty($content))) $tab = 'upload';

	// Cannot show 'Create' if there are no position
	if ($tab == 'upload' && (!is_array($positions) || empty($positions) ) ) $tab = 'positions';

	// If we're not installed, go to the settings for the setup.
	if (!administer_ok_to_go() && $tab != 'help') $tab = 'settings';

	$_GET['tab'] = $tab;

	if ($_GET['tab'] == 'upload') {
		wp_enqueue_script('page');
		wp_enqueue_script('editor');
        add_thickbox();
		wp_enqueue_script('media-upload');
		wp_enqueue_script('controls');
	}
	
}

add_action('load-ad-minister.php', 'administer_queue_scripts');

function administer_pre_queue_scripts () {
	add_action('load-' . sanitize_title(__('Tools')) . '_page_ad-minister', 'administer_queue_scripts');
	add_action('admin_head-' . sanitize_title(__('Tools')) . '_page_ad-minister', 'administer_load_scripts');
}

add_action('admin_init' , 'administer_pre_queue_scripts');

?>
