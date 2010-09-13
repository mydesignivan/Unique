<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="success" ){?>
<div class="success">
    Los datos han sido guardados con &eacute;xito.
</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    Los datos no han podido ser guardados.
</div>
<?php }?>

<form id="form1" action="<?//=site_url('/paneladmin/myaccount/save');?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label for="txtEmail" class="label label-contact">* Email</label>
        <input type="text" name="txtEmail" id="txtEmail" class="input-contact" value="<?=$info['email']?>" />
    </div>
    <div class="trow">
        <label for="txtInfo" class="label label-contact">Contrase&ntilde;a</label>
        <button type="button" onclick="Account.showcontapass(this);" class="button">Modificar</button>
    </div>
    <div id="contPass" class="clear hide">
        <div class="trow">
            <label for="txtPassOld" class="label label-contact">* Contrase&ntilde;a actual</label>
            <input type="password" name="txtPassOld" id="txtPassOld" class="input-contact" />
        </div>
        <div class="trow">
            <label for="txtPassNew" class="label label-contact">* Nueva contrase&ntilde;a</label>
            <input type="password" name="txtPassNew" id="txtPassNew" class="input-contact" />
        </div>
        <div class="trow">
            <label for="txtConfirmPass" class="label label-contact">* Repetir Contrase&ntilde;a</label>
            <input type="password" name="txtConfirmPass" id="txtConfirmPass" class="input-contact" />
        </div>
    </div>
    <div class="trow" style="width: 466px;">
        <div class="fright"><img src="images/ajax-loader3.gif" alt="Sending ..." width="32" height="32" style="position: relative; top:10px; right: 10px;" class="hide jq-loading" /><input type="submit" id="btnSubmit" name="btnSubmit" value="Guardar" class="button" /></div>
    </div>
</form>

<script type="text/javascript">
<!--
    Account.initializer2();
-->
</script>