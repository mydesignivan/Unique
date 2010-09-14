<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
<div class="success">
    Muchas Gracias por comunicarse con nosotros, nos comunicaremos con usted a la brevedad.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="error" ){?>
<div class="error">
    El formulario no ha podido ser enviado, porfavor, reintentelo nuevamente.
</div>
<?php }?>

<form id="form1" action="<?=site_url('/contacto/send/')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label class="label label-contact" for="txtNameNovia">* Nombre de la Novia</label>
        <div class="fleft"><input type="text" id="txtNameNovia" name="txtNameNovia" class="input-contact" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtNameNovio">* Nombre del Novio</label>
        <div class="fleft"><input type="text" id="txtNameNovio" name="txtNameNovio" class="input-contact" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="cboLugar">* Lugar de Residencia</label>
        <div class="fleft">
            <select id="cboLugar" name="cboLugar" class="select-contact">
                <option value="">&nbsp;</option>
                <option value="sadas">dssdf</option>
            </select>
        </div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtDate">Fecha de Casamiento</label>
        <div class="fleft"><input type="text" id="txtDate" name="txtDate" class="input-date" readonly /></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtEmail">* Correo electr&oacute;nico</label>
        <div class="fleft"><input type="text" id="txtEmail" name="txtEmail" class="input-contact" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtPhoneCode">* Tel&eacute;fono</label>
        <div class="fleft"><input type="text" id="txtPhoneCode" name="txtPhoneCode" class="input-phonecode" /> - <input type="text" id="txtPhoneNum" name="txtPhoneNum" class="input-phonenum" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtConsult">Consulta</label>
        <div class="fleft"><textarea id="txtConsult" name="txtConsult" rows="5" cols="22" class="textarea-contact"></textarea></div>
    </div>
    <div class="trow" style="width:470px">
        <div class="fright">
            <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button fright" value="Enviar" />
        </div>        
    </div>
</form>

<div class="clear content"><?=$content?></div>

<div class="cont-separator"><img src="images/dibujo-cierre-seccion.png" alt="" width="140" height="28" /></div>

<script type="text/javascript">
<!--
Bodas.initializer();
-->
</script>