<?php
if( isset($_modejs) ){
    $script_js[] = "class/bodas_list_class".$this->config->item('sufix_pack_js');
    $script_js[] = "plugins/simplemodal/js/jquery.simplemodal";
}else{?>
<!--[if IE 6]>
<link rel="stylesheet" media="all" type="text/css" href="js/plugins/simplemodal/css/style_ie.css" />
<![endif]-->
<link rel="stylesheet" media="all" type="text/css" href="js/plugins/simplemodal/css/style2.css" />
<?php }?>