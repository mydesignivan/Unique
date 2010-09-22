<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<ul class="cont-images-bodas">
<?php foreach( $listBodas->result_array() as $row ) {?>
    <li>
        <a href="javascript:void(Bodas.popup_login())"><img src="<?=UPLOAD_PATH_PAREJA.$row['imagen_novios']?>" alt="<?=$row['imagen_novios']?>" width="<?=$row['imagen_novios_width']?>" height="<?=$row['imagen_novios_height']?>" class="imgframe" /></a><br />
        <a href="javascript:void(Bodas.popup_login())" class="link-bodas"><img src="images/bodas-dibujo-nombres-left.png" alt="" width="29" height="15" />&nbsp;<?=ucwords($row['nombre_novia'])?> &amp; <?=ucwords($row['nombre_novio'])?>&nbsp;<img src="images/bodas-dibujo-nombres-right.png" alt="" width="29" height="15" /></a>
    </li>
<?php }?>
</ul>

<div class="clear content"><?=$content?></div>

<div class="clear span-22 align-center last"><img src="images/dibujo-cierre-seccion.png" alt="" width="140" height="28" /></div>

<div id="popup"></div>

<script type="text/javascript">
<!--
//Bodas.initializer();
-->
</script>