<?php
if( isset($_modejs) ){
    $script_js[] = "helpers/json/JSONError".$this->config->item('sufix_pack_js');
    $script_js[] = "helpers/json/JSON".$this->config->item('sufix_pack_js');
}
?>