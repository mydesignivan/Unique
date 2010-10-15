<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
<div class="success">
    Gracias por CONTACTARNOS, nos comunicaremos a la brevedad.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="error" ){?>
<div class="error">
    El formulario no ha podido ser enviado, porfavor, reintentelo nuevamente.
</div>
<?php }?>

<ul id="menu-bodas" class="menu-bodas">
    <li class="current"><a href="javascript:void(Bodas.load_menu('bodas_novios_view',0))">Los Novios</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_rsvp_view',1))">RSVP</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_galerias_view',2))">Galer&iacute;a</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_dedicatorias_view',3))">Dedicatorias</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_cronicas_view',4))">La Cr&oacute;nica</a></li>
</ul>

<div id="resultboda" class="clear trow prepend-top2">
    <input type="hidden" id="fechaBoda" value="<?=date("Y-m-d-G-i-s",$info['fecha'])?>">
    <div id="contador"></div>
    <div id="tab0" class="jq-tab"><?php require("ajax/bodas_novios_view.php"); ?></div>
    <div id="tab1" class="jq-tab"></div>
    <div id="tab2" class="jq-tab"></div>
    <div id="tab3" class="jq-tab"></div>
    <div id="tab4" class="jq-tab"></div>
</div>

<div class="cont-separator"><img src="images/dibujo-cierre-seccion.png" alt="" width="140" height="28" /></div>

<script type="text/javascript">
<!--
Bodas.initializer();
-->
</script>