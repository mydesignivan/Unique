<?php
if( isset($_modejs) ){
    $script_js[] = "plugins/galleriffic-2.0/js/jquery.galleriffic.pack";
    $script_js[] = "plugins/galleriffic-2.0/js/jquery.opacityrollover.min";

}else{?>
<link rel="stylesheet" href="js/plugins/galleriffic-2.0/css/galleriffic-2<?=$this->config->item('sufix_pack_css');?>.css" type="text/css" />

<?php }?>