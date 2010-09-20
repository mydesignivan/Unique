<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span-16">
    <h3 class="subtitle">Confirmar Asistencia <img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
    <form id="form1" action="<?=site_url('/paneluser/index/send')?>" method="post" enctype="application/x-www-form-urlencoded">
        <div class="trow">
            <label class="label label-contact" for="txtNameInvitado">* Nombre y Apellido<br/>
                <span class="text-size-80">(Seg&uacute;n tarjeta de invitaci&oacute;n)  </span></label>
            <div class="fleft"><input type="text" id="txtNameInvitado" name="txtNameInvitado" class="input-contact" /></div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="txtAdultos">* Mayores</label>
            <div class="fleft"><input type="text" id="txtAdultos" name="txtAdultos" class="input-contact" /></div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="txtNinio">* Ni&ntilde;os</label>
            <div class="fleft"><input type="text" id="txtNinio" name="txtNinio" class="input-contact" /></div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="cboMenu">* Menu elegido</label>
            <div class="fleft">
                <select name="cboMenu" id="cboMenu" class="select-contact">
                    <option value="">Seleccione un Menu</option>
            <?php foreach( $info['menus'] as $row ){?>
                    <option value="<?=$row['menu']?>"><?=$row['menu']?></option>
            <?php }?>
                </select>
            </div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="txtEmail">* Mail</label>
            <div class="fleft"><input type="text" id="txtEmail" name="txtEmail" class="input-contact" /></div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="txtPhoneCode">* Tel&eacute;fono</label>
            <div class="fleft"><input type="text" id="txtPhoneCode" name="txtPhoneCode" class="input-phonecode" /> - <input type="text" id="txtPhoneNum" name="txtPhoneNum" class="input-phonenum" /></div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="txtConsult">
                Observaciones<br/>
                <span class="text-size-80">(Ej: cel&iacute;acos, al&eacute;rgicos)</span>
            </label>
            <label class="label label-contact" for="txtObserv"></label>
            <div class="fleft"><textarea id="txtObserv" name="txtObserv" rows="5" cols="22" class="textarea-contact"></textarea></div>
        </div>
        <div class="trow" style="width:470px">
            <div class="fright">
                <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button fright" value="Enviar" />
            </div>
        </div>
    </form>

</div>
<div class="span-5 last">
    <h3 class="subtitle">Lista de Regalos de <?=ucwords($info['nombre_novia'])?> &amp; <?=ucwords($info['nombre_novio'])?> <img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
    <ul>
    <?php foreach( $info['regalos'] as $row ){?>
        <li class="title-section"><?=$row['regalo']?></li>
    <?php }?>
    </ul>
</div>


<div class="clear fleft prepend-top" >
    <div class="span-10">
        <h3>Salon <?=$info['nombre_salon']?></h3>
        <div class="framegm"><?=$info['google_maps_salon']?></div>
    </div>
     <div class="span-10 prepend-1 last">
         <h3>Iglesia <?=$info['nombre_iglesia']?></h3>
        <div class="framegm"><?=$info['google_maps_iglesia']?></div>
    </div>
</div>


<script type="text/javascript">
<!--
Bodas.initializer();
-->
</script>