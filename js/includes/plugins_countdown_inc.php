<?php
if( isset($_modejs) ){
    $script_js[] = "plugins/jquery-countdown/jquery.countdown.pack";
    $script_js[] = "plugins/jquery-countdown/jquery.countdown-es";

}else{?>
<link type="text/css" href="js/plugins/jquery-countdown/jquery.countdown.css" rel="stylesheet" />

<?php }?>