<?php

print_r($post);

	if ($_GET['resetimpressions'] == 'true') {
		$idt = $_GET['id'];
		$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);
		unset($stats[$idt]['i']);
		update_post_meta(get_option('administer_post_id'), 'administer_stats', $stats);
	
	}
	if ($_GET['resetclicks'] == 'true') {
		$idt = $_GET['id'];	
		$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);
		unset($stats[$idt]['c']);
		update_post_meta(get_option('administer_post_id'), 'administer_stats', $stats);	
	}

	// Check to see that we have everything we need
	if ($_POST['action'] == 'edit') {
		if (!($code = $_POST['content'])) $all_ok = false;
		if (!($position = $_POST['position'])) $all_ok = false;
		else if (!($title = $_POST['title'])) $all_ok = false;
		else $all_ok = true;
	
		if ($all_ok) {
			$id = ($_POST['id'] == '') ? administer_nbr_to_save() : $_POST['id'];

			$content = get_post_meta(get_option('administer_post_id'), 'administer_content', true);
			if (!is_array($content)) $content = array();
			$index = count($content);

			// Requried parameters
			$content[$id]['position'] = $position;
			$content[$id]['code'] = $code;
			$content[$id]['title'] = $title;
			$content[$id]['id'] = $id;

			// Optional parameters
			$content[$id]['scheduele'] = $_POST['scheduele'];
			$content[$id]['impressions'] = $_POST['impressions'];
			$content[$id]['clicks'] = $_POST['clicks'];
			$content[$id]['show'] = ($_POST['show'] == 'on') ? 'true' : 'false';
			$content[$id]['weight'] = $_POST['weight'];
			$content[$id]['wrap'] = ($_POST['wrap']) ? 'true' : 'false';

			// Save to a Custom Field
			if (!add_post_meta(get_option('administer_post_id'), 'administer_content', $content, true)) 
				update_post_meta(get_option('administer_post_id'), 'administer_content', $content);
			
			echo '<div id="message" class="updated fade"><p><strong>' . __('Saved!', 'ad-minister') . '</strong></p></div>';		

			$value = $content[$id];

		}
	} else if ($_POST['action'] == 'delete') {
		$id = $_POST['id'];
		$content = get_post_meta(get_option('administer_post_id'), 'administer_content', true);
		$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);
		if (is_array($stats)) {
			unset($stats[$id]); 
			update_post_meta(get_option('administer_post_id'), 'administer_stats', $stats);
		}
		// Remove the evidence
		unset($content[$id]);
			
		// Save back down
		update_post_meta(get_option('administer_post_id'), 'administer_content', $content);

		// Notify 
		echo '<div id="message" class="updated fade"><p><strong>' . __('Deleted!', 'ad-minister') . '</strong></p></div>';		
	}

	$content = get_post_meta(get_option('administer_post_id'), 'administer_content', true);
	if (!is_array($content) || empty($content))
			echo '<div id="message" class="updated fade"><p><strong>' . __('There is no content! Do make some.', 'ad-minister') . '</strong></p></div>';


	// Are we editing?
	if ($_GET['action'] == 'edit') {
		if (!$value) $value = $content[$_GET['id']];		
	}
	else $value = array();
	$checked_visible = ($value['visible'] == 'true' || !$value['visible']) ? 'checked="checked"' : ''; 
	$checked_wrap = ($value['wrap'] == 'true' || !$value['wrap']) ? 'checked="checked"' : ''; 


?>

<form name="post" method="POST" action="tools.php?page=ad-minister&tab=upload&action=edit" id="post">
<div class="wrap">
<?php 
	if ($_GET['action'] == 'edit') { 
		$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);
		if (!is_array($stats)) $stats = array();

		$impressions = ($stats[$value['id']]['i']) ? $stats[$value['id']]['i'] : '0';
		$impressions = ($impressions == 1) ? '1 ' . __('impression', 'ad-minister') : $impressions . ' ' . __('impressions', 'ad-minister');

		$clicks = ($stats[$value['id']]['c']) ? $stats[$value['id']]['c'] : '0';
		$clicks = ($clicks == 1) ? '1 ' . __('click', 'ad-minister') : $clicks . ' ' . __('clicks', 'ad-minister');
		$url = get_option('siteurl') . '/wp-admin/edit.php?page=ad-minister&tab=upload&action=edit&id=' . $value['id'] . '';
?>

	<h3>Content info:</h3>
		<ul>
			<li><?php echo $impressions; ?> | <a href="<?php echo $url . '&resetimpressions=true'; ?>" onclick="return confirm('<?php _e('Are you sure you want to set the impressions to zero?', 'ad-minister'); ?>')"><?php _e('Reset', 'ad-minister'); ?></a></li>
			<li><?php echo $clicks; ?> | <a href="<?php echo $url . '&resetclicks=true'; ?>" onclick="return confirm('<?php _e('Are you sure you want to set the clicks to zero?', 'ad-minister'); ?>')"><?php _e('Reset', 'ad-minister'); ?></a></li>
			<li><?php _e('Tracker url', 'ad-minister'); ?>: <em>%tracker%</em> or <em><?php echo administer_tracker_url($value['id']); ?></em><br>To track clicks, insert tracker url before link url, e.g. %tracker%http://labs.dagensskiva.com/</li>
		</ul>

<?php } else { ?>
	<h3>Create content</h3>

	<p><?php _e('To create static content, fill in the Title, Position and the html code that constitues the content. You can set the visibility of the ad and the weight. Use the file browser below to upload and add an image/file.', 'ad-minister'); ?></p>

<?php } ?>

	<table  class="widefat">
		<tr class="title">
			<td>
				<label class="create" for="title"><?php _e('Title', 'ad-minister'); ?>: </label>
			</td>
			<td>
				<input class="create" name="title" id='title' type="text" value="<?php echo administer_f($value['title']); ?>">
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="content"><?php _e('Html code', 'ad-minister'); ?>:</label>
			</td>
			<td>
			<div id="postdiv" class="postarea">
				<?php the_editor(stripslashes($value['code'])); ?>
			</div>
			</td>
		</tr>
		<input type="hidden" id="user-id" value="">
		<tr class="alternate">
			<td>
				<label class="create" for="scheduele"><?php _e('Scheduele', 'ad-minister'); ?></label>
			</td>
			<td>
				<input class="create" name="scheduele" type="text" id="scheduele" value="<?php echo $value['scheduele']; ?>" /><br />
				(<?php _e('Optional', 'ad-minister'); ?>, E.g. 2007-12-01:2008-01-01)				
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="ad_position_edit_"><?php _e('Position', 'ad-minister'); ?></label>
			</td>
			<td>
				<?php echo administer_position_select(0, $value['position']); ?>
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="impressions"><?php _e('Impressions', 'ad-minister'); ?>: </label>
			</td>
			<td>
				<input name="impressions" type="text" id="impressions" value="<?php echo $value['impressions']; ?>" /> 
				(<?php _e('Optional', 'ad-minister'); ?>)				
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="clicks"><?php _e('Clicks', 'ad-minister'); ?></label>
			</td>
			<td>
				<input name="clicks" type="text" id="clicks"  value="<?php echo $value['clicks']; ?>"  /> 
				(<?php _e('Optional, see documentation on how to make this work.', 'ad-minister'); ?>)				
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="weight"><?php _e('Weight', 'ad-minister'); ?></label>
			</td>
			<td>
				<input name="weight" type="text" id="weight" value="<?php echo $value['weight']; ?>"  /> 
				(<?php _e('Optional', 'ad-minister'); ?>)
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="show"><?php _e('Make visible?', 'ad-minister'); ?></label>
			</td>
			<td>
				<label><input name="show" type="checkbox" id="show" <?php echo $checked_visible; ?> /> (<?php _e('tick for yes', 'ad-minister'); ?>)</label>
			</td>
		</tr>

		<tr class="alternate">
			<td>
				<label class="create" for="wrap"><?php _e('Use wrapper?', 'ad-minister'); ?></label>
			</td>
			<td>
				<label><input name="wrap" type="checkbox" id="wrap" <?php echo $checked_wrap; ?> /> (<?php _e('tick for yes', 'ad-minister'); ?>)</label>
			</td>
		</tr>
	</table>
	<div style="padding: 10px; margin-left: 170px;">
					<input type="hidden" name="page" value="ad-minister/ad-minister.php">
				<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
				<input type="hidden" name="action" value="edit">
				<!-- input class="button" type="button" value="<?php _e('Save & preview', 'ad-minister'); ?>" onclick="" -->
				<input class="button-primary" type="submit" value="<?php _e('Save', 'ad-minister'); ?>">
				</form>
				<?php if ($_GET['action']) : ?>
				<p>
					<form method="POST" action="tools.php?page=ad-minister&tab=upload" onsubmit="return confirm('<?php _e('Are you sure you want to delete this content?', 'ad-minister'); ?>');">
					<input type="hidden" name="page" value="ad-minister/ad-minister.php">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
					<input class="button" type="submit" value="<?php _e('Delete this', 'ad-minister'); ?>">
					</form>
				</p>
				<?php endif; ?>
	</div>

<?php
/*
	<h3><?php _e('Preview', 'ad-minister'); ?>:</h3>
	<div id="preview" ></div>
	

	<iframe id="uploading" name="uploading" frameborder="0" src="media-upload.php?post_id=-1206559419&amp;type=image&amp;TB_iframe=true&amp;height=500&amp;width=640" style="height: 500px">This feature requires iframe support.</iframe>
*/
?>