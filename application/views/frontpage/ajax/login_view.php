<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contlogin">
    <form action="" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return Bodas.submit_login(this)">
        <div class="left"></div>
        <div class="middle">
            <div class="trow">
                <label for="txtUser" class="label label-login">Usuario</label>
                <input type="text" name="txtUser" id="txtUser" class="input-login" />
            </div>
            <div class="trow">
                <label for="txtPass" class="label label-login">Contrase&ntilde;a</label>
                <input type="password" name="txtPass" id="txtPass" class="input-login" />
            </div>
            <div id="msgbox-error" class="clear error align-center hide"></div>
            <div class="trow" style="width:285px">
                <div class="fright"><img id="ajaxupload" src="images/ajax-loader3.gif" alt="Sending..." width="32" height="32" style="position:relative; top:8px; display: none;" />&nbsp;<button type="submit" class="button">Entrar</button></div>
            </div>
        </div>
        <div class="right"></div>
    </form>
</div>