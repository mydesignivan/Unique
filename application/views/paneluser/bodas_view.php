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

<ul class="menu-bodas ">
    <li class="current"><a href="javascript:void(Bodas.load_menu('bodas_novios_view',0))">Los Novios</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_rsvp_view',1))">RSVP</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_galerias_view',2))">Galer&iacute;a</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_dedicatorias_view',3))">Dedicatorias</a></li>
    <li><a href="javascript:void(Bodas.load_menu('bodas_cronicas_view',4))">La Cr&oacute;nica</a></li>

</ul>

<div id="resultboda" class="clear fleft prepend-top2 ">
    <?php require("ajax/bodas_novios_view.php"); ?>
</div>


<div class="cont-separator"><img src="images/dibujo-cierre-seccion.png" alt="" width="140" height="28" /></div>

<script type="text/javascript">
<!--
Bodas.initializer();
-->
</script>