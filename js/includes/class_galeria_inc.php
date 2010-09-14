<?php
if( isset($_modejs) ){
    $script_js[] = "plugins/picturegallery/picturegallery".$this->config->item('sufix_pack_js');
    $script_js[] = "class/galeria_class".$this->config->item('sufix_pack_js');
}
?>