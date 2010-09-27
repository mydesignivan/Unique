<?php

	/*
	**   SAVE THE POSITION
	*/

	if ($_POST['action'] == 'save') {
		if ($name = $_POST['position']) {
			$ok = true;
			$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);
			if (!is_array($positions)) $positions = array();
			if ($_POST['edit_position'] != $name) {
				if (array_key_exists($name, $positions)) {
					echo '<div id="message" class="updated fade"><p><strong>' . __('That position name already exists!') . '</strong></p></div>';			
					$ok = false;
				}
			} 
			if ($ok) {
				$positions[$name]['position'] = stripslashes($name); 
				$positions[$name]['description'] = stripslashes($_POST['description']);
				$positions[$name]['before'] = stripslashes($_POST['before']);
				$positions[$name]['after'] = stripslashes($_POST['after']);
				if (!$positions[$name]['type']) $positions[$name]['type'] = 'widget';
				if (!update_post_meta(get_option('administer_post_id'), 'administer_positions', $positions))	
					add_post_meta(get_option('administer_post_id'), 'administer_positions', $positions);	
			} 
		}
	}
	
	if ($_GET['action'] == 'confirm_delete') {
		if ($key = $_GET['key']) {
			$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);
			if (array_key_exists($key, $positions)) {

				// Remove the positon
				unset($positions[$key]);
				update_post_meta(get_option('administer_post_id'), 'administer_positions', $positions);

				// Orphane content if required
				foreach ($content as $con) {
					if ($con['position'] == $key) {
						$content[$con['id']]['position'] = '';
					}
				}

				update_post_meta(get_option('administer_post_id'), 'administer_content', $content);

				echo '<div id="message" class="updated fade"><p><strong>' . __('Position deleted.') . '</strong></p></div>';
			} else echo '<div id="message" class="updated fade"><p><strong>' . __('Error! Cannot delete a positon that does not exist.') . '</strong></p></div>';
		} else echo '<div id="message" class="updated fade"><p><strong>' . __('Error! Position key missing!') . '</strong></p></div>';
	
	}

	$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);

	if (empty($positions))
			echo '<div id="message" class="updated fade"><p><strong>' . __('Before you can add content you need to define some positions. These positions will be where your content appears.') . '</strong></p></div>';			
	
	$positions_t = array();
	$positions_w = array();
	if (is_array($positions)) {
		foreach ($positions as $position) {
			if ($position['type'] == 'widget') $positions_w[$position['position']] = $position;
			if ($position['type'] == 'template') $positions_t[$position['position']] = $position;
		}
	}
	ksort($positions_t);
	ksort($positions_w);
?>

<p><?php if ($_GET['action'] != 'delete') _e('Positions are just that, \'positions\' at which you want content to appear. A positions can be defined within a template, such as in a header for banner-ads, or a position can be a widget, which can be dragged onto a sidebar. Each position may have an optional description and html code which wraps the content withing a position. For example, this may be <em>&lt;div class=&quot;ads&quot;&gt;</em> before, and <em>&lt;/div&gt;</em> after.', 'ad-minister'); ?></p>

<?php if ($_GET['action'] == 'edit') { ?>
<?php $position = ($key = $_GET['key']) ? $positions[$key] : array(); ?>

	<h3><?php _e('Create/edit position', 'ad-minister'); ?></h3>
    <form method="POST" action="tools.php?page=ad-minister&tab=positions">

	<?php 
		if ($position['type'] == 'template') {
			echo '<p><strong>' . __('Warning!', 'ad-minister') . '</strong> ';
			_e('You are editing a template position. If the description and wrapper code is also set in the template, then these values will reset when the template is reloaded.', 'ad-minister');
			echo '</p>';
		}
	?>
	<table class="form-table" id="position_edit">
	<tr id="position_edit_name">
		<th scope="row" valign="top"><?php _e('Name'); ?></th>
		<?php $type = ($position['position']) ? 'hidden' : 'text'; ?>
		<td><?php if ($type == 'hidden') echo $position['position']; ?><input type="<?php echo $type; ?>" name="position" value="<?php echo format_to_edit($position['position']); ?>"></td>	
	</tr>
	<tr id="position_edit_desc">
		<th scope="row" valign="top"><?php _e('Description'); ?></th>
		<td><input type="text" name="description" value="<?php echo format_to_edit($position['description']); ?>"></td>	
	</tr>
	<tr id="positions_edit_before">
		<th scope="row" valign="top"><?php _e('Code before'); ?></th>
		<td><input type="text" name="before" value="<?php echo format_to_edit($position['before']); ?>"></td>	
	</tr>
	<tr id="positions_edit_after">
		<th scope="row" valign="top"><?php _e('Code after'); ?></th>
		<td><input type="text" name="after" value="<?php echo format_to_edit($position['after']); ?>"></td>	
	</tr>
	</table>

	<p><input type="submit" value="<?php _e('Save position'); ?>" class="button-primary"></p>

	<input type="hidden" name="edit_position" value="<?php echo ($position['position']); ?>">
	<input type="hidden" name="action" value="save">
</form>

<?php } else if ($_GET['action'] == 'delete') {
	$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);
	$position = ($key = $_GET['key']) ? $positions[$key] : array();
	
	$nbr = 0;
	foreach ($content as $con) if ($con['position'] == $key) $nbr++;
	
	if ($key) {
?>
	
<div class="narrow">

<p><?php _e('You are about to delete position', 'ad-minister'); ?>: <strong><?php echo $key; ?></strong></p>

<?php if ($nbr) printf(__('There are %s ads currently attached to this position. Deleting this position will make those ads orphans.', 'ad-minister'), $nbr); ?>

<p><?php _e('Are you sure you want to do this?', 'ad-minister'); ?></p>

<?php 
	if ($position['type'] == 'template') {
		echo '<p><strong>' . __('Warning!', 'ad-minister') . '</strong> ';
		_e('You are about to delete a template position. If the positions is still declared within the template, then this position will re-appear when the template is re-loaded.', 'ad-minister');
		echo '</p>';
	}
?>

<form action='tools.php' method='get'>

	<table width="100%">
		<tr>
		<td><input type='button' class="button" value='<?php _e('No', 'ad-minister'); ?>' onclick="self.location='<?php echo get_option('siteurl'); ?>/wp-admin/tools.php?page=ad-minister&amp;tab=positions'" /></td>
		<td class="textright"><input type='submit' class="button" value='<?php _e('Yes', 'ad-minister'); ?>' /></td>
		</tr>
	</table>
	<?php echo wp_nonce_field(); ?>
	<input type='hidden' name='action' value='confirm_delete' />
	<input type='hidden' name='tab' value='positions' />
	<input type='hidden' name='page' value='ad-minister' />
	<input type='hidden' name='key' value='<?php echo $key; ?>' />
</form>

<table class="form-table" cellpadding="5">
	<tr class="alt">
		<th scope="row"><?php _e('Position', 'ad-minister'); ?></th>
		<td><?php echo $key; ?></td>
	</tr>
	<tr>
		<th scope="row"><?php _e('Description', 'ad-minister'); ?></th>
		<td><?php echo $positions[$key]['description']; ?></td>
	</tr>
	<tr>
		<th scope="row"><?php _e('Wrapper', 'ad-minister'); ?></th>
		<td><?php echo htmlentities($positions[$key]['before']); ?> <?php echo htmlentities($positions[$key]['after']); ?></td>
	</tr>
</table>
	
	
<?php
	}
}else { 
?>
<form>

<div id="positions">

	<h3>Template Positions</h3>

	<p><?php _e('These are the positions defined within the theme that you are using.', 'ad-minister'); ?></p>

	<table class="widefat">
		<thead>
			<tr>
				<th class="positionKey" scope="col" style=""><?php _e('Position Name', 'ad-minister'); ?></th>
				<th class="templatePositionsDescription" scope="col"><?php _e('Description', 'ad-minister'); ?></th>
				<th class="templateFunctions" scope="col" colspan="1">Wrapper</th>
				<th class="templatePositionsActions" scope="col"><?php _e('Actions', 'ad-minister'); ?></th>
			</tr>
		</thead>
		<tbody id="positions_body">

		<?php
		$nbr = 0;
		if (!empty($positions_t)) {
			foreach ($positions_t as $position) 
				if ($position['type'] == 'template')
					administer_position_template($position, $nbr++);
		} else { 
			$url = 'http://labs.dagensskiva.com/plugins/ad-minister/';
			$string = __('There are currently no template positions defined. %a%See the documentation%b% on how to do that', 'ad-minister');
			$string = str_replace('%a%', '<a href="' . $url . '">', $string);
			$string = str_replace('%b%', '</a>', $string);
			?>
			<tr class="alternate"><td colspan="4"><?php echo $string;  ?>.</td></tr>
	
	<?php } ?>
		</tbody>
	</table>


	
	<h3>Widget Positions</h3>
	
	<p><?php _e('Below are the Ad-minister widgets available to be <a href="widgets.php">placed your blog</a> (On the widget page the positions below starts with \'Ad: \' on as to identify them).', 'ad-minister'); ?></p>

	<div id="positions">
	<table class="widefat">
		<thead>
			<tr>
				<th class="positionKey" scope="col" style=""><?php _e('Widget Name', 'ad-minister'); ?></th>
				<th class="templatePositionsDescription" scope="col"><?php _e('Description', 'ad-minister'); ?></th>
				<th class="templateFunctions" scope="col" colspan="1"><?php _e('Wrapper', 'ad-minister'); ?></th>
				<th class="templatePositionsActions" scope="col"><?php _e('Actions', 'ad-minister'); ?></th>
			</tr>
		</thead>
		<tbody id="widget_positions_body">

		<?php
		$nbr = 0;
		if (!empty($positions_w)) {
			foreach ($positions_w as $position) {
				if ($position['type'] == 'widget') administer_position_template($position, $nbr++);
			}
		} else echo '<tr class="alternate"><td colspan="4">' . __('There are currently no widget positions', 'ad-minister') . '.</td></tr>';
		?>
		
		</tbody>
	</table>	

<?php 
/*
<p><input type="button-primary" onclick="p2m_add_position(); return false;" value="<?php _e('Add a new widget position', 'ad-minister'); ?>"></p>
*/ 
?>

<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/tools.php?page=<?php echo dirname(plugin_basename(__FILE__)); ?>&tab=positions&action=edit">Add new widget position</a></p>
</form>

</div>
</div>

<?php

}


?>