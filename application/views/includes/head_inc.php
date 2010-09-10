<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<base href="<?=base_url();?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv="cache-control" content="Public" />
<meta http-equiv="expires" content="<?=add_date(date('D, d M Y H:i:s'), 'D, d M Y H:i:s', array('h'=>1))?> GMT" />
<meta http-equiv="last-modified" content="<?=date('D, d M Y H:i:s')?> GMT" />

<link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

<!-- Framework CSS -->
<link rel="stylesheet" href="css/blueprint/screen<?=$this->config->item('sufix_pack_css');?>.css" type="text/css" media="screen, projection"/>
<link rel="stylesheet" href="css/blueprint/print<?=$this->config->item('sufix_pack_css');?>.css" type="text/css" media="print"/>
<!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->

<link href="css/style<?=$this->config->item('sufix_pack_css');?>.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?=site_url("load/js/initializer")?>"></script>

<!--[if IE 6]>
<link href="css/style_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 6]>
<script type="text/javascript">
    var IE6UPDATE_OPTIONS = {
        icons_path: "js/plugins/ie6update/ie6update/images/"
    }
</script>
<script type="text/javascript" src="js/plugins/ie6update/ie6update/ie6update.js"></script>
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="js/helpers/DD_belatedPNG.js"></script>
<![endif]-->
