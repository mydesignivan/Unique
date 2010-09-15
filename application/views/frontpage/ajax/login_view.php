<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contlogin">
    <form action="<?=site_url('/bodas/login/'.$id)?>" method="post" enctype="application/x-www-form-urlencoded">
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
            <?php if( $this->session->flashdata('message_login')!='' ){?>
            <div class="clear error align-center"><?=$this->session->flashdata('message_login')?></div>
            <?php }?>
            <div class="trow" style="width:285px"><button type="submit" class="button fright">Entrar</button></div>
        </div>
        <div class="right"></div>
    </form>
</div>