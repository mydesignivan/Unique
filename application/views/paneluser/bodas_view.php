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


<div class="span-16">
    <h3>Confirmar Asistencia</h3>
    <form id="form1" action="<?//=site_url('/paneluser/')?>" method="post" enctype="application/x-www-form-urlencoded">
        <div class="trow">
            <label class="label label-contact" for="txtNameInvitado">* Nombre y Apellido<br/>
                <span class="text-size-80">(Seg&uacute;n tarjeta de invitaci&oacute;n)  </span></label>
            <div class="fleft"><input type="text" id="txtNameInvitado" name="txtNameInvitado" class="input-contact" /></div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="txtNameNovio">* Mayores</label>
            <div class="fleft">
                <select id="cboLugar" name="cboLugar" class="select-contact">
                    <option value="">&nbsp;</option>
                    <option value="sadas">dssdf</option>
                </select>
            </div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="cboLugar">* Niños</label>
            <div class="fleft">
                <select id="cboLugar" name="cboLugar" class="select-contact">
                    <option value="">&nbsp;</option>
                    <option value="sadas">dssdf</option>
                </select>
            </div>
        </div>
        <div class="trow">
            <label class="label label-contact" for="cboLugar">* Menu elegido</label>
            <div class="fleft">
                <select id="cboLugar" name="cboLugar" class="select-contact">
                    <option value="">&nbsp;</option>
                    <option value="sadas">dssdf</option>
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
            <label class="label label-contact" for="txtConsult"></label>
            <div class="fleft"><textarea id="txtConsult" name="txtConsult" rows="5" cols="22" class="textarea-contact"></textarea></div>
        </div>
        <div class="trow" style="width:470px">
            <div class="fright">
                <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button fright" value="Enviar" />
            </div>
        </div>
    </form>

</div>
<div class="span-5 last">
        <h3>Lista de Regalos</h3>

        <ul>
            <li class="title-section">aaaa y bbbb </li>
            <li class="title-section">aaaa y bbbb </li>
            <li class="title-section">aaaa y bbbb </li>
            <li class="title-section">aaaa y bbbb </li>
            <li class="title-section">aaaa y bbbb </li>
            <li class="title-section">aaaa y bbbb </li>
        </ul>
</div>


<div class="clear fleft prepend-top" >

    <div class="span-10 border">
        <h3>Salon quinta al amanecer</h3>
         <div>
            <label class="label">Salon quinta al amanecer</label>
         </div>
        <div class="clear content"></div>

            
    </div>
     <div class="span-10  last border">
         <h3>Iglesia San Nicolás</h3>
         <div>
            <label class="label">Salon quinta al amanecer</label>
         </div>
         <div class="clear content"></div>
    </div>


</div>

<div class="cont-separator"><img src="images/dibujo-cierre-seccion.png" alt="" width="140" height="28" /></div>

<script type="text/javascript">
<!--
Bodas.initializer();
-->
</script>