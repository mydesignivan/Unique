<?php
if( isset($_modejs) ){
    $script_js[] = "jquery-1.4.2.min";
    $script_js[] = "helpers/helpers".$this->config->item('sufix_pack_js');
}
?>