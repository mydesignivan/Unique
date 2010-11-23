<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<h3 class="subtitle">Breve Historia de la Novia <img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
<p><img src="<?=UPLOAD_PATH_NOVIA.$info['imagen_novia']?>" alt="<?=$info['imagen_novia']?>" width="<?=$info['imagen_novia_width']?>" height="<?=$info['imagen_novia_height']?>" class="imgframe2" /> <?=nl2br($info['historia_novia'])?></p>

<div class="clear">&nbsp;</div>

<h3 class="subtitle">Breve Historia del Novio <img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
<p><img src="<?=UPLOAD_PATH_NOVIO.$info['imagen_novio']?>" alt="<?=$info['imagen_novio']?>" width="<?=$info['imagen_novio_width']?>" height="<?=$info['imagen_novio_height']?>" class="imgframe2" /> <?=nl2br($info['historia_novio'])?></p>

<div class="clear">&nbsp;</div>

<h3 class="subtitle">Breve Historia de la Pareja <img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
<p><img src="<?=UPLOAD_PATH_PAREJA.$info['imagen_novios']?>" alt="<?=$info['imagen_novios']?>" width="<?=$info['imagen_novios_width']?>" height="<?=$info['imagen_novios_height']?>" class="imgframe2" /> <?=nl2br($info['historia_novios'])?></p>
