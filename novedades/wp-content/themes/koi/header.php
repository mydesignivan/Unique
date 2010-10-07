<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php if (is_home()) {
	echo bloginfo('name');
} elseif (is_404()) {
	_e('404 Not Found','ndesignthemes');
} elseif (is_category()) {
	_e('Category:','ndesignthemes'); wp_title('');
} elseif (is_tag()) {
	_e('Tag:','ndesignthemes'); wp_title('');
} elseif (is_search()) {
	_e('Search Results for:','ndesignthemes'); echo ' ' . $s;
} elseif ( is_day() || is_month() || is_year() ) {
	_e('Archives:','ndesignthemes'); wp_title('');
} else {
	echo wp_title('');
}
?></title>

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="http://www.uniquewp.com.ar/novedades/wp-content/themes/koi/style_ie.css" rel="stylesheet" type="text/css" />
<![endif]-->

<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
<div id="header">
	<h1 id="logo"><a href="http://www.uniquewp.com.ar<?php //echo get_option('home'); ?>"><img src="http://www.uniquewp.com.ar/images/logo.png" alt="Unique Wedding Planners" /></a></h1>
	<p class="description"><?php bloginfo('description'); ?></p>

	<?php 
	$theme_opts = get_option('theme_opts');
	
	if ( !$theme_opts['social_off'] ) include (TEMPLATEPATH . "/socialmedia.php"); ?>

	<ul id="nav">
		<li<?php if (is_home()) { echo ' class="current_home"'; }?>><a href="http://www.uniquewp.com.ar<?php //echo get_option('home'); ?>"><span class="l"></span><span class="m"><?php _e('Home','ndesignthemes'); ?></span><span class="r"></span></a></li>
		<?php wp_list_pages(array(
		    'sort_column' => 'menu_order',
		    'title_li' => '',
		    'exclude_tree' => $theme_opts['exclude_pages'],
		    'depth' => $theme_opts['no_dropdown'] ? 1 : 0,
		)); ?>
	</ul>
	<!--<?php include (TEMPLATEPATH . '/searchform.php'); ?>-->
</div>
<!--/header -->