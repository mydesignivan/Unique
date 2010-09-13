<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=TITLE_GLOBAL . @$tlp_title;?></title>
    <meta name="description" content="<?=META_DESCRIPTION_GLOBAL . @$tlp_meta_description;?>" />
    <meta name="keywords" content="<?=META_KEYWORDS_GLOBAL . @$tlp_meta_keywords;?>" />
    <meta name="robots" content="index,follow" />

<?php
    require('includes/head_inc.php');
    if( isset($tlp_script) && !empty($tlp_script) ) {
        if( !is_array($tlp_script) ) $tlp_script = array($tlp_script);
        foreach ( $tlp_script as $filename ){
            require('./js/includes/'.$filename.'_inc.php');
        }
        echo '<script type="text/javascript" src="'. site_url('load/js/'.implode('/', $tlp_script)) .'"></script>'.chr(13);
    }
?>
</head>

<body>
    <div class="container">
        <div class="span-24 last header">
            <?php require('includes/header_inc.php');?>
        </div>
        <div class="clear span-24 last main-container"> 
            <div class="t"></div>
            <div class="i">

                <?php if( isset($tlp_title_section) ){?>
                <h1 class="title-section"><?=$tlp_title_section?><img src="images/dibujo-titulo-seccion.png" alt="" width="74" height="57" /></h1>
                <div class="clear">&nbsp;</div>
                <?php }?>

                <?php require($tlp_section);?>

            </div>
            <div class="b"></div>
            <div class="clear span-24">
                <div class="flores-left"></div>
                <div class="flores-right"></div>
            </div>
        </div>
        <div class="clear span-24 last footer"> 
            <?php require('includes/footer_inc.php');?>
        </div>
    </div>
</body>
</html>