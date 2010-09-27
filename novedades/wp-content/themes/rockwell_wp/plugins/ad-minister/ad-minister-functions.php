<?php

/*
**    administer_main ( )
**
**    Main Ad-minster Admin
*/
function administer_main() {

	// Check that our statistics is set up
	$stats = get_option(get_option('administer_post_id'), 'administer_stats', true);
	$content = get_post_meta(get_option('administer_post_id'), 'administer_content', true);
	$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);

	$plugindir = ABSPATH . PLUGINDIR .'/ ' . dirname(plugin_basename (__FILE__)) . '/';


	// $_GET['tab'] should be set in mf_queue_scripts, but still...
    $tab =  ($_GET['tab']) ? $_GET['tab'] : 'content'; 

	?>	

 	<div class="wrap">
		<h2>Ad-minister</h2>

	<ul class="tabs">
		<?php $url = 'tools.php?page=ad-minister';  ?>
		<li><a <?php if ($tab == 'content') echo 'class="tabs-current"'; ?> href="<?php echo $url; ?>&amp;tab=content"><?php _e('Content'); ?></a></li>
		<li><a <?php if ($tab == 'upload') echo 'class="tabs-current"'; ?> href="<?php echo $url; ?>&amp;tab=upload"><?php _e('Create content'); ?></a></li>
		<li><a <?php if ($tab == 'positions') echo 'class="tabs-current"'; ?>href="<?php echo $url; ?>&amp;tab=positions"><?php _e('Positions/Widgets'); ?></a></li>
		<li><a <?php if ($tab == 'settings') echo 'class="tabs-current"'; ?> href="<?php echo $url; ?>&amp;tab=settings"><?php _e('Settings'); ?></a></li>
		<li><a <?php if ($tab == 'help') echo 'class="tabs-current"'; ?> href="<?php echo $url; ?>&amp;tab=help"><?php _e('Help'); ?>!</a></li>
	</ul>
	<div style="padding: 10px;">

	<?php
	
	// Load the relevant tab
	if ($tab == 'upload') include('ad-minister-create.php');
	else if ($tab == 'settings') include('ad-minister-settings.php');
	else if ($tab == 'positions') include('ad-minister-positions.php');
	else if ($tab == 'help') include('ad-minister-help.php');
	else include('ad-minister-content.php');
	echo '</div></div>';
}


function administer_position_template ($position = array(), $nbr = 0) { echo administer_get_position_template($position, $nbr); }
function administer_get_position_template ($position = array(), $nbr = 0) { 
	$key  = $position['position']; // p2m_meta('position_key_' . $nbr);
	$desc = $position['description']; //p2m_meta('position_desc_' . $nbr);
			
	// Set up css formatting
	$class =  ($nbr % 2) ? '' : 'alternate';
	$html = '
			<tr class="%class%">
				<td>' . $key . '</td>
				<td>' . $desc . '</td>
				<td>' . htmlentities($position['before']) . ' ' . htmlentities($position['after']) . '</td>
				<td>
					<a href="%url_edit%">' . __('Edit', 'ad-minister') . '</a> |
					<a href="%url_remove%">' . __('Remove', 'ad-minister') . '</a>
				</td>
			</tr>
			';

	// Inject template values
	$url = get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__));
	$html = str_replace('%url_edit%', get_option('siteurl') . '/wp-admin/tools.php?page=' . dirname(plugin_basename(__FILE__)) . '&tab=positions&key=' . urlencode($key) . '&action=edit', $html);
	$html = str_replace('%url_remove%', get_option('siteurl') . '/wp-admin/tools.php?page=' . dirname(plugin_basename(__FILE__)) . '&tab=positions&key=' . urlencode($key) . '&action=delete', $html);
	$html = str_replace('%class%', $class, $html);

	return $html;
}

/*
**   administer_position_select ()
**
**   Generate the select list for the defined positions
*/
function administer_position_select ($nbr = '', $value = '') {

	if ($value == '') $value = '-';

	$html = '<select name="position" id ="ad_position_edit_' . $nbr . '">';

	$got_selected = false;
	
	$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);	
	if (!is_array($positions)) $positions = array();
	$position_keys = array_keys($positions); 
	sort($position_keys);
	
	foreach ($position_keys as $key) {
		// $position_key = p2m_meta('ad_position_' . $nbr);
		if ($key == $value) {
			$selected = ' selected="selected"';
			$got_selected = true;
		} else $selected = '';
		$description = ($positions[$key]['description']) ? ' (' . $positions[$key]['description'] . ')' : '';
		$html .= '<option value="' . $positions[$key]['position'] . '"' . $selected .'>' . $positions[$key]['position'] . $description . '</option>';
	}

	// If nothing got selected, then churn out a blank value for orphans.
	if ($value == '-') $html .= '<option value="-" selected="selected">- (' . __('orphan', 'ad-minister') . ')</option>';
	if (!$value || $value != '-') $html .= '<option value="-">- (' . __('orphan', 'ad-minister') . ')</option>';

	$html .= '</select>';
	return $html;
}

/*
**   p2m_nbr_to_save()
**
**   Finds the highest number from zero that is not currently
**   some content.
*/
function administer_nbr_to_save($what = 'content') {

	$content = get_post_meta(get_option('administer_post_id'), 'administer_content', true);

	if (!is_array($content)) return 0;
	if (empty($content)) return 0;

	// Store the ids in a separate array
	$ids = array_keys($content);
	sort($ids);

	// Get the smallest unpopulated id
	for ($i = 0; $i < $ids[count($ids) - 1] + 2; $i++)
			if ($i != $ids[$i]) return strval($i);
}

/*
**   administer_ok_to_go()
**
**   Checks if the supplied post/page ID exists.
*/
function administer_ok_to_go() {
	$the_page = get_page(get_option('administer_post_id'));
	$ok_to_go = ($the_page->post_title) ? true : false;
	return $ok_to_go;
}

/*
**   adminiseter_content_age()
**
**  Calculates the age of a content. Returns assoc. array with 'start' and 'end' ages, i.e.
**	negative numbers for events in the future, positive for events passed, just like at
**	shuttle launches.
*/
function adminiseter_content_age($scheduele) {
	if (!$scheduele) return array(array('start' => '0', 'end' => '0'));

	$age = array();
	$valid == false;
	$times = explode(',', $scheduele);
	// Content may have multiple schedueles
	foreach ($times as $time) {
		$parts = explode(':', ltrim(rtrim($time)));
		if (count($parts) == 2) {
			// Make the dates inclusive
			$start = strtotime($parts[0] . ' 00:00:00');
			$end   = strtotime($parts[1] . ' 23:59:59');
		}
		$now = time();
		// 24 hours a 2600 seconds is 86400.
		$age[count($age)] = array('start' => ($start - time())/86400, 'end' => ($end - time())/86400);
		
		if ($start <= $now && $end >= $now) $valid = true;
	}

	return $age;
}


/*
**   administer_activity_box_alerts ()
**
**   Stick something on the dashboard if something is due to expire or becom active, or if
**	it's running out of clicks or impressions.
*/
function administer_activity_box_alerts () {

	$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);
	if (!is_array($stats)) $stats = array();

	// If there is no content, then skip this
	if (!($content = get_post_meta(get_option('administer_post_id'), 'administer_content', true))) 
		$content = array(); 

	$url = get_option('siteurl') . '/wp-admin/tools.php?page=' . dirname(plugin_basename(__FILE__));
	$period = get_option('administer_dashboard_period');

	$li_ends = '';
	$li_starts = '';
	$li_impressions = '';
	$li_clicks = '';

	foreach($content as $con) {
	
		// Format impressions
		$impressions = ($stats[$con['id']]['i']) ? $stats[$con['id']]['i'] : 0;
		$impressions_p = ($con['impressions']) ? 100 * $impressions / $con['impressions'] : 0;
		if ($impressions_p > 100 - get_option('administer_dashboard_percentage') && $impressions_p < 100) {
			$li_impressions .= '<li><a href="' . $url . '&cshow=' . urlencode($con['position']) . '">' . $con['title'] . '</a>';
			$li_impressions .= ' ' . __('has', 'ad-minister') . ' ' . round(100 - $impressions_p, 1) . __('% of impressions left', 'ad-minister') . '.</li>';
		}
		// Format clicks
		$clicks = ($stats[$con['id']]['c']) ? $stats[$con['id']]['c'] : 0;
		$clicks_p = ($con['clicks']) ? 100 * $clicks / $con['clicks'] : 0;
		if ($clicks_p > 100 - get_option('administer_dashboard_percentage') && $clicks_p < 100) {
			$li_clicks .= '<li><a href="' . $url . '&cshow=' . urlencode($con['position']) . '">' . $con['title'] . '</a>';
			$li_clicks .= ' ' . __('has', 'ad-minister') . ' ' . round(100 - $clicks_p, 1) . __('% of clicks left', 'ad-minister') . '.</li>';
		}
		$ages = adminiseter_content_age($con['scheduele']);
		foreach ($ages as $age) {
			if ($age['end'] < $period && $age['end'] >= 0 && $age['end']) {
				$li_ends .= '<li><a href="' . $url . '&cshow=' . urlencode($con['position']) . '">' . $con['title'] . '</a>';
				$li_ends .= ' ' . __('expires in', 'ad-minister') . ' ' . round($age['end'], 1) . ' days.</li>';
			}
			if ($age['start'] < $period && $age['start'] >= 0 && $age['start']) {
				$li_starts .= '<li><a href="' . $url . '&cshow=' . urlencode($con['position']) . '">' . $con['title'] . '</a>';
				$li_starts .= ' ' . __('starts in', 'ad-minister') . ' ' . round($age['start'], 1) . ' ' . __('days', 'ad-minister') . '.</li>';
			}		
		}
	}

//	if ($li_starts || $li_ends) 
	printf('<h3>Ad-minister <a href="%s" title="'. __('Go to', 'ad-minister') . ' Ad-minister">&raquo;</a></h3>', $url);
	echo '<p><ul>';
	if ($li_impressions) echo $li_impressions;
	if ($li_clicks) echo $li_clicks;
	if ($li_starts) echo $li_starts;
	if ($li_ends) echo $li_ends;
	echo '</ul></p>';

}


/**
***		administer_translate ( )
**/
function administer_translate(){
    // Load a language
	load_plugin_textdomain('p2m-ad-manager', PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)) );
}

/**
***   administer_export ( )
***   
***   Enable one-click xml export of the post that contains the administer data.
**/
function administer_export () {
	global $post_ids;
	if ($_GET['administer'])
		$post_ids = array(get_option('administer_post_id'));
}

/**
***  administer_load_widgets (  )
***
***   Create the widgets...
**/
function administer_load_widgets () {
	if (!($post_id = get_option('administer_post_id'))) return 0;
	$positions = get_post_meta($post_id, 'administer_positions', true);
	if (!is_array($positions) || empty($positions)) return 0;
	foreach ($positions as $position) {
		if ($position['type'] == 'widget') {
			// Create a whiddgett!
			$options = array('title' => $position['position']);
			register_sidebar_widget('Ad: ' . $position['position'], 'administer_widget', $options);
			$dims = array('width' => 400, 'height' => 200, 'params' => array('nbr' => $nbr) );
			wp_register_widget_control('Ad: ' . $position['position'], $position['position'], 'administer_widget_control', $dims);		
		}
	}
}

/**
***   administer_widget_control (  )
***
**/
function administer_widget_control() { }

/**
***   administer_popuplate_widget_controls (  )
***
**/
function administer_popuplate_widget_controls () { }

/**
***   administer_widget (  )
***
***   The actual theme widget being displayed. 
**/
function administer_widget($args, $options) {
	// Crank out the widget position
    extract($args);
	echo $before_widget;
	administer_display_position($options['title']);
	echo $after_widget; 
}

/**
***   administer_template_action ( )
***
***   The template action. Add action if it doesn't exist and
***   display the content of the position.
**/
function administer_template_action ($args) {

	if (!($post_id = get_option('administer_post_id'))) return 0;

	// It's OK only to pass the name of the position to be shown...
	$position = (!is_array($args)) ? $args : '';	
	
	$defaults = array('position' => $position, 'description' => '', 'before' => '', 'after' => '', 'type' => 'template');
	$args = wp_parse_args($args, $defaults);

	// Ignore empty calls
	if (!$args['position']) return '';

	$positions = get_post_meta($post_id, 'administer_positions', true);

	if (!is_array($positions)) {
			$positions = array();
			$edit_position = true;
	} else {
		if (array_key_exists($args['position'], $positions)) {
		 	$diff = array_diff($positions[$args['position']], $args);
		 	if (!empty($diff)) $edit_position = true;
			else $edit_position = false;
		}
		else $edit_position = true;
	}

	// If anything has changed, then update our database
	if ($edit_position) {
	
		$positions[$args['position']] = $args; 
		
		// Save to a Custom Field
		if (!add_post_meta($post_id, 'administer_positions', $positions, true)) 
				update_post_meta($post_id, 'administer_positions', $positions);		
	}

	administer_display_position($args['position']);
}

/*
**   administer_is_visible ( )
**
**   Determine wether or not content is visible.
*/
function administer_is_visible($ad) {

	// Is the option to show the content ticked.
	if ($ad['show'] == 'false') return false; 

	// Is the content schedueled to show?
	$valid = false;
	$ages = adminiseter_content_age($ad['scheduele']);

	// Has the scheduele expired, or hasn't it started?
	foreach ($ages as $age) {
	
		// No scheduele, so content always valid
		if (!$age['start'] && !$age['end']) $valid = true;

		// Check that we're in the validity period
		if ($age['start'] < 0 && $age['end'] > 0) $valid = true;
	}

	// Have we reached maximum impressions or clicks?
	if (get_option('administer_statistics') == 'true') {

		$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);		
		if (!is_array($stats)) $stats = array();

		if ($ad['impressions'])
			if ($stats[$ad['id']]['i'] >= $ad['impressions']) $valid = false;

		if ($ad['clicks'])
			if ($stats[$ad['id']]['c'] >= $ad['clicks']) $valid = false;
	}
	
	return $valid;
}

/*
**   administer_display_position ( )
**
**   Show a position, randomize weighted content and log.
*/
function administer_display_position ($pos) {

	// Display the content
	if (!($post_id = get_option('administer_post_id'))) return false;
	$content = get_post_meta($post_id, 'administer_content', true);
	$positions = get_post_meta($post_id, 'administer_positions', true);

	if (!is_array($content) || empty($content)) return false;

	$valids = array();
	$total_weight = 0;
	foreach($content as $ad) {
		
		// Skip if this content if it does not belong here.
		if ($ad['position'] != $pos) continue;
		
		$valid = administer_is_visible($ad);

		// Sum the weights if the content is valid
		if ($valid) {
			
			array_push($valids, $ad);

			// The default weight is one.	
			if (!$weight = $ad['weight']) $total_weight += 1;
				$total_weight += $ad['weight'];
		}
	}

	// Make sure we have some valid content
	if (count($valids) == 0) return false;

	// Get a pseudo random number
	$nbr = rand(1, $total_weight);

	// Get the randomized bit of content from our stack of valid content
	$total_weight = 0;
	foreach($valids as $ad) {

		if (!$weight = $ad['weight']) $total_weight += 1;
			$total_weight += $weight;

		if ($nbr <= $total_weight) {

			$code = stripslashes($ad['code']);

			if (!(false === strpos($code, '%tracker%'))) {
				if (get_option('administer_statistics') == 'true') {
					$page = get_option('siteurl');
					$page = get_page_link();
					$symbol = (preg_match('/\?/', $page)) ? '&' : '?';
					$code = str_replace('%tracker%', $page . $symbol . 'administer_redirect_' . $ad['id'] . '=', $code);		
				} else $code = str_replace('%tracker%', '', $code);
			}	

			// Make amersands validate
			$code = preg_replace('/&([^#])(?![a-zA-Z1-4]{1,8};)/', '&amp;$1', $code);	
			
			// Display the content code with optional wrapping.
			if ($ad['wrap'] != 'false') echo $positions[$pos]['before'];
			echo $code;
			if ($ad['wrap'] != 'false') echo $positions[$pos]['after'];
			// Save the pageview
			if (get_option('administer_statistics') == 'true') administer_register_impression($ad['id']);
			return true;
		}
	}
}

/*
**	administer_register_impression ( )
**
**	Note that an impression was made.
*/
function administer_register_impression($id) {
	global $administer_stats;
	if (!is_admin()) {
		if (!isset($administer_stats[$id]['i'])) $administer_stats[$id]['i'] = 0;
		$administer_stats[$id]['i']++; 	
	}
}

/*
**	administer_init_impressions ( )
**
**	Set up global stat variable.
*/
function administer_init_impressions() {
	global $administer_stats;
	$administer_stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);

	// Set up stats if there aren't any
	if (!is_array($administer_stats)) {
		$administer_stats = array();
		add_post_meta(get_option('administer_post_id'), 'administer_stats', $administer_stats, true);
	}
}

/*
**   administer_do_redirect ( )
**
**   Register clicks.
*/
function administer_do_redirect() {
 	global $administer_stats;
 	
	if ($qs = $_SERVER['REQUEST_URI']) {
		$pos = strpos($qs, 'administer_redirect');
		if (!(false === $pos)) { 
			$link = substr($qs, $pos);
			$link = str_replace('administer_redirect=', '', $link);

			// Extract the ID and get the link
			$pattern = '/administer_redirect_(\d+?)\=/';
			preg_match($pattern, $link, $matches);
			$link = preg_replace($pattern, '', $link);

			// Save click!
			if (get_option('administer_statistics') == 'true') { 
				$administer_stats[$matches[1]]['c']++;
				update_post_meta(get_option('administer_post_id'), 'administer_stats', $administer_stats);
			}

			// Redirect
			header("HTTP/1.1 302 Temporary Redirect");
			header("Location:" . $link);
			// I'm outta here!
			exit(1);
		}
	} 
}

/*
**  administer_save_impressions ( )
**
**  Save the clicks and impressions to db. I think there is an issue regarding the 
**	effectivness of storing this data in a Custom Field. In the future a separate db might be more
**	appropriate.
*/
function administer_save_impressions () {
	global $administer_stats;
	// Save to a Custom Field
	if (!is_admin()) 
		update_post_meta(get_option('administer_post_id'), 'administer_stats', $administer_stats);
}

/*
**  administer_f ( )
**
**  Formatting wrapper function
*/
function administer_f($text) {
	return wptexturize(stripslashes($text));
}

/*
**  administer_sort_link ( )
**
**  Generate the link for the statistics table headers
*/
function administer_sort_link($link, $field, $sort, $order) {
	//$link = get_option('siteurl') . '/wp-admin/edit.php?page=' . dirname(plugin_basename (__FILE__)) . '';
	$link .= '&tab=statistics';
	if ($field != $sort) return false;
	$symbol = ($order == 'up') ? '&darr;' : '&uarr;';
	$linkorder = ($order == 'up') ? 'down' : 'up';
	$alt = ($order == 'up') ? __('Sort up', 'ad-minister') : __('Sort down', 'ad-minister');
	echo '<a class="sort" title="' . $alt. '" href="' . $link . ' &sort=' . $sort . '&order=' . $linkorder . '">' . $symbol . '</a>';
}

/*
**  administer_tracker_url ( )
**
**  Generate the tracker link
*/
function administer_tracker_url ($id) {
	return get_option('siteurl') . '/?administer_redirect_' . $id . '=';
}

/*
**  administer_stats ( )
**
**  Generate the statistics table, both for template use and in the admin.
*/
function administer_stats ($options = array()) {

	if (empty($options)) {
		$ids = array();
		$columns = array('id', 'title', 'position', 'visible', 'time', 'impressions', 'clicks');
	} else {
		$ids = $options['ids'];
		$columns = $options['columns'];
	}
	
	$contents = get_post_meta(get_option('administer_post_id'), 'administer_content', true);
	$positions = get_post_meta(get_option('administer_post_id'), 'administer_positions', true);
	$stats = get_post_meta(get_option('administer_post_id'), 'administer_stats', true);
	if (!is_array($stats)) $stats = array();
	
	if (is_admin()) $link = get_option('siteurl') . '/wp-admin/tools.php?page=' . dirname(plugin_basename (__FILE__)) . '';
	else $link = get_page_link() . '?administer=view';
	
	$table = array();
	
	foreach (array_keys($contents) as $i) {

		$ad = $contents[$i];

		if (!empty($ids)) if (!array_key_exists($ad['id'], array_flip($ids))) continue;
	
		$table['title'][$i] = administer_f($ad['title']);
		$table['title_link'][$i] = $link . '&tab=upload&action=edit&id=' . $ad['id'];
		$table['position'][$i] = ($pos = administer_f($ad['position'])) ? $pos : '-';

		// Check visibility
		$is_visible = administer_is_visible($ad);

		// Set orphaned content as invisible
		if ($table['position'][$i] == '-') $is_visible = false;

		// Get the time left based on scheduele, if present
		$ages = adminiseter_content_age($ad['scheduele']);
		$time = '';
		foreach ($ages as $age) {
			$time = ($age['start'] > 0) 
				? __('Starts in', 'ad-minister') . ' ' . round($age['start'], 1) . ' ' . __('days', 'ad-minister')
				: __('Ends in', 'ad-minister') . ' ' . round($age['end'], 1) . ' ' . __('days', 'ad-minister');
			if ($age['end'] < 0) $time = 'Ended';
			else if (!$age['start']) $time = '-';
		}
	
		// Calculate and format the fractional weight, given as a percentage
		$total_weight = 0;
		foreach($contents as $content)
			if ($ad['position'] == $content['position']) 
				if (administer_is_visible($content))
					$total_weight += ($content['weight']) ? $content['weight'] : 1;		
		$weight = ($ad['weight']) ? $ad['weight'] : 1;
		$weight = (administer_is_visible($ad)) ? 100*$weight/$total_weight : '';
		$table['weight'][$i] = ($weight > 0 && $weight < 100) ? '(' . round($weight, 1) . '%)' : '';
		// Don't show percentages for orphans
		if ($table['position'][$i] == '-') $table['weight'][$i] = '';

		// Format impressions
		$impressions = ($stats[$ad['id']]['i']) ? $stats[$ad['id']]['i'] : '0';
		$impressions = ($ad['impressions']) ? $impressions . ' of ' . $ad['impressions'] : $impressions;

		// Format clicks
		$clicks = ($stats[$ad['id']]['c']) ? $stats[$ad['id']]['c'] : '0';
		$clicks = ($ad['clicks']) ? $clicks . ' of ' . $ad['clicks'] : $clicks;

		$table['clicks'][$i]      = $clicks;
		$table['impressions'][$i] = $impressions;
		$table['time'][$i]        = $time;
		$table['class_row'][$i]   = ($is_visible) ? 'stat_row_visible' : 'stat_row_invisible';
		$table['visible'][$i]     = ($is_visible) ? __('Yes', 'ad-minister') : __('No', 'ad-minister');
		$table['id'][$i] = $ad['id'];

	}

	// Do the sorting, only save sort column if we're in the admin
	$saved_sort = (is_admin()) ? get_option('administer_sort_key') : '';
	if (!($sort = $_GET['sort'])) $sort = ($saved_sort) ? $saved_sort : 'position';
	if ($sort != $saved_sort && is_admin()) update_option('administer_sort_key', $sort);

	$order = $_GET['order'];


	$arr = $table[$sort];
	if (!is_array($arr)) {
		echo '<p><strong>' . __('No data available', 'ad-minister') . '.</strong></p>';
		return 0;
	}
	natcasesort($arr);

	$link .= '&tab=statistics';

	$arr_keys = array_keys($arr);
	if ($order == 'down') $arr_keys = array_reverse($arr_keys);

	?>
	<table class="widefat">
	<thead>
		<tr>
			<?php if (array_key_exists('id', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=id&order=up"><?php _e('ID', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'id', $sort, $order); ?></th>
			<?php endif; ?>
			<?php if (array_key_exists('title', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=title&order=up"><?php _e('Content title', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'title', $sort, $order); ?></th>
			<?php endif; ?>
			<?php if (array_key_exists('position', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=position&order=up"><?php _e('Position', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'position', $sort, $order); ?></th>
			<?php endif; ?>
			<?php if (array_key_exists('visible', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=visible&order=up"><?php _e('Visible', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'visible', $sort, $order); ?></th>	
			<?php endif; ?>
			<?php if (array_key_exists('time', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=time&order=up"><?php _e('Time left', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'time', $sort, $order); ?></th>
			<?php endif; ?>
			<?php if (array_key_exists('impressions', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=impressions&order=up"><?php _e('Impressions', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'impressions', $sort, $order); ?></th>
			<?php endif; ?>
			<?php if (array_key_exists('clicks', array_flip($columns))) : ?>
				<th><a class="sort" href="<?php echo $link; ?>&sort=clicks&order=up"><?php _e('Clicks', 'ad-minister'); ?></a> <?php administer_sort_link($link, 'clicks', $sort, $order); ?></th>
			<?php endif; ?>

		</tr>
	</thead>
	<?php 
		$rownbr = 0;
		foreach ($arr_keys as $i) : 
		$class =  ($rownbr++ % 2) ? '' : 'alternate'; 
	?>
<!--	<tr class="<?php echo $table['class_row'][$i]; ?>"> -->
	<tr class="<?php echo $class; ?>">
		<?php if (array_key_exists('id', array_flip($columns))) : ?>
			<td class='staddt_id'><strong><?php echo $table['id'][$i]; ?></strong></td>
		<?php endif; ?>
		<?php if (array_key_exists('title', array_flip($columns))) : ?>
			<td class='stat_title'>
				<?php if (is_admin()) : ?><a href="<?php echo $table['title_link'][$i]; ?>"><?php endif; ?><?php echo $table['title'][$i]; ?><?php if (is_admin()) : ?></a><?php endif; ?>	
			</td>
		<?php endif; ?>
		<?php if (array_key_exists('position', array_flip($columns))) : ?>
			<td class='stat_position'><?php echo $table['position'][$i]; ?> <?php echo $table['weight'][$i]; ?></td>
		<?php endif; ?>
		<?php if (array_key_exists('visible', array_flip($columns))) : ?>
			<td class='stat_visible'><?php echo $table['visible'][$i]; ?></td>
		<?php endif; ?>
		<?php if (array_key_exists('time', array_flip($columns))) : ?>
			<td class='stat_time'><?php echo $table['time'][$i]; ?></td>
		<?php endif; ?>
		<?php if (array_key_exists('impressions', array_flip($columns))) : ?>
			<td class='stat_impressions'><?php echo $table['impressions'][$i]; ?></td>
		<?php endif; ?>
		<?php if (array_key_exists('clicks', array_flip($columns))) : ?>
			<td class='stat_clicks'><?php echo $table['clicks'][$i]; ?></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php
}

/*
**	administer_template_stats
**
*/
function administer_template_stats ($options = array()) {
	administer_stats($options);
}


?>