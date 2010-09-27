<?php

	// Saving our Options.
	if ($ad_post_id = $_POST['administer_post_id']) {
		$the_page = get_page($_POST['administer_post_id']);
		update_option('administer_post_id', $ad_post_id);
		if (preg_match('/\d+$/', $ad_post_id)) {
			if ($the_page->post_author) 
				echo '<div id="message" class="updated fade"><p><strong>' . __('Options saved.') . '</strong></p></div>';			
		} else {
			echo '<div id="message" class="updated fade"><p><strong>' . __('Error! The ID must be a number. Try again.') . '</strong></p></div>';		
		}
		
		update_option('administer_dashboard_period', $_POST['administer_dashboard_period']);
		update_option('administer_dashboard_percentage', $_POST['administer_dashboard_percentage']);
		update_option('administer_user_level', $_POST['administer_user_level']);

		// Checkboxes...
		$names = array('administer_make_widgets', 'administer_dashboard_show', 'administer_statistics');
		foreach ($names as $name) {
			$value = ($_POST[$name] == 'on') ? 'true' : 'false';
			update_option($name, $value);		
		}
	}

	// Default settings
	if (!strlen(get_option('administer_make_widgets'))) 
		update_option('administer_make_widgets', 'true');

	if (!strlen(get_option('administer_statistics'))) 
		update_option('administer_statistics', 'true');

	if (!strlen(get_option('administer_dashboard_show'))) 
		update_option('administer_dash board_show', 'true');

	if (!strlen(get_option('administer_dashboard_period')))
		update_option('administer_dashboard_period', '7');

	if (!strlen(get_option('administer_dashboard_percentage')))
		update_option('administer_dashboard_percentage', '20');

	if (!strlen(get_option('administer_user_level')))
		update_option('administer_user_level', '7');

	// Display installation messsage 
	if (!get_option('administer_post_id'))
		echo '<div id="message" class="updated fade"><p><strong>' . __('Before you get started you must specify the ID of an existing post or page that will hold the content.', 'ad-minister') . '</strong></p></div>';

	// Check that the post ID exists. 
	if (get_option('administer_post_id') && !administer_ok_to_go())
		echo '<div id="message" class="updated fade"><p><strong>' . __('Error! The ID you supplied does not exist', 'ad-minister') . ' <a href="' . get_option('siteurl') . '/wp-admin/page-new.php">' . __('Go create a one', 'ad-minister') . '</a></strong></p></div>';			

	// See what post we're attached to
	$the_page = get_page(get_option('administer_post_id'));
	$title = ($the_page->post_author) ? __('The content is currently attached to post/page ID <strong>', 'ad-minister') . get_option('administer_post_id') . "</strong> entitled '" . $the_page->post_title . "'. | <a href='#' onclick=\" alert('" . __('Warning! Changing the ID will cause the positions and content to dissapear. Please do proceed with caution.', 'ad-minister') . "'); jQuery('#view_ad_post_id').hide(); jQuery('#edit_ad_post_id').show(); return false; \">" . __('Change', 'ad-minister') . "</a>" : '';
	$this_page = get_option('siteurl') . '/wp-admin/edit.php?page=ad-minister/ad-minister.php';
?>

<h3>Settings</h3>


	<form method="post" action="tools.php?page=ad-minister&amp;tab=settings">

<table class="form-table">

 <tr>
 	<th scope="row" valign="top"><?php _e('Setup', 'ad-minister'); ?></th>
 	<td>
		<?php _e('The Ad-minister data attaches itself to a post or page with a given ID. There is little reason to change this.', 'ad-minister'); ?>
		<div id="view_ad_post_id" ><?php echo $title; ?></div>
		<div id="edit_ad_post_id" <?php if ($title) echo 'style="display: none"'; ?>><?php _e('ID of page to attach the Ad-minister data to', 'ad-minister'); ?>: <input type="text" name="administer_post_id" value="<?php echo get_option('administer_post_id'); ?>" style="width: 30px;" /></div>
 	</td>
 </tr>

 <tr>
 	<th scope="row" valign="top"><?php _e('Notifications', 'ad-minister'); ?></th>
 	<td>
		<input type="checkbox" id="administer_dashbaord_show" name="administer_dashboard_show" <?php if (get_option('administer_dashboard_show') == 'true') echo ' checked="checked" '; ?> /> <label for="administer_dashbaord_show"><?php _e('Alert on the Dashboard of upcoming content expiration or activation.', 'ad-minister'); ?></label><br />
		<?php _e('Number of days to check for upcoming events', 'ad-minister'); ?>: <input type="text" name="administer_dashboard_period" value="<?php echo get_option('administer_dashboard_period'); ?>" style="width: 40px;" /><br />
		<?php _e('Minimum percentage of clicks/impressions left before alerting', 'ad-minister'); ?>: <input type="text" name="administer_dashboard_percentage" value="<?php echo get_option('administer_dashboard_percentage'); ?>" style="width: 40px;" />
 	</td>
 </tr>
 <tr>
 	<th scope="row" valign="top"><?php _e('Theme widets', 'ad-minister'); ?></th>
 	<td>
		<input type="checkbox" id="administer_make_widgets" name="administer_make_widgets" <?php if (get_option('administer_make_widgets') == 'true') echo ' checked="checked"'; ?> /> <label for="administer_make_widgets"><?php _e('Make theme widgets?', 'ad-minister'); ?></label>
 	</td>
 </tr>

 <tr>
 	<th scope="row" valign="top"><?php _e('Statistics', 'ad-minister'); ?></th>
 	<td>
		<input type="checkbox" id="administer_statistics" name="administer_statistics" <?php if (get_option('administer_statistics') == 'true') echo ' checked="checked"'; ?> /> <label for="administer_statistics"><?php _e('Log content impressions and clicks?', 'ad-minister'); ?></label>
 	</td>
 </tr>
 
  <tr>
 	<th scope="row" valign="top"><?php _e('User access', 'ad-minister'); ?></th>
 	<td>
		 <?php _e('The minimum <a href="http://codex.wordpress.org/User_Levels">User Level</a> required to access Ad-minister.', 'ad-minister'); ?>

			<select name="administer_user_level">
				<?php $ul = get_option('administer_user_level'); ?>
				<option value="10" <?php if ($ul == '10') echo 'selected="selected"'; ?>><?php _e('Administrator', 'ad-minister'); ?></option>
				<option value="7" <?php if ($ul == '7') echo 'selected="selected"'; ?>><?php _e('Editor', 'ad-minister'); ?></option>
				<option value="2" <?php if ($ul == '2') echo 'selected="selected"'; ?>><?php _e('Author', 'ad-minister'); ?></option>
				<option value="1" <?php if ($ul == '1') echo 'selected="selected"'; ?>><?php _e('Contributor', 'ad-minister'); ?></option>
			</select>
 	</td>
 </tr>
 
</table>

<?php 
/*
	<h4><?php _e('XML Export', 'ad-minister'); ?>:</h4>
	<blockquote>
		<a href="<?php echo get_option('siteurl') . '/wp-admin/export.php?download=true&administer=true' ?>"><?php _e('Download', 'ad-minister'); ?></a> <?php _e('Worpress XML export file for Ad-minister positions and content', 'ad-minister'); ?>.
	</blockquote>
*/
?>


	<p class="submit">
		<input class="button-primary" type="submit" name="Submit" value="<?php _e('Update Settings', 'ad-minister') ?>" />
	</p>

</form>
