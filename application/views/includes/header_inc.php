<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- =============== TOP HEADER =============== -->
<div class="span-24 last header-top"> 
    <a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Unique WP" width="395" height="123" /></a>
</div>

<?php if( $this->session->userdata('logged_in') && $this->uri->segment(1)=="panel" ) {
    $page = $this->uri->segment(2);

    // "PANEL ADMIN"
?>

<?php }else{ // "FRONTPAGE"
    $page = $this->uri->segment(1);?>

    <ul class="menu">
        <li <?php if( $page=="" || $page=="index" ) echo 'class="current"';?>><a href="<?=$this->config->item('base_url');?>"><div class="l"></div><div class="m">Home</div><div class="r"></div></a></li>
        <li <?php if( $page=="quienes-somos") echo 'class="current"';?>><a href="<?=site_url('/quienes-somos/')?>"><div class="l"></div><div class="m">¿Quienes Somos?</div><div class="r"></div></a></li>
        <li <?php if( $page=="servicios") echo 'class="current"';?>><a href="<?=site_url('/servicios/')?>"><div class="l"></div><div class="m">Servicios</div><div class="r"></div></a></li>
        <li <?php if( $page=="modalidad") echo 'class="current"';?>><a href="<?=site_url('/modalidad/')?>"><div class="l"></div><div class="m">Modalidad</div><div class="r"></div></a></li>
        <li <?php if( $page=="galeria") echo 'class="current"';?>><a href="<?=site_url('/galeria/')?>"><div class="l"></div><div class="m">Galer&iacute;a</div><div class="r"></div></a></li>
        <li <?php if( $page=="bodas") echo 'class="current"';?>><a href="<?=site_url('/bodas/')?>"><div class="l"></div><div class="m">Bodas</div><div class="r"></div></a></li>
        <li <?php if( $page=="contacto") echo 'class="current"';?>><a href="<?=site_url('/contacto/')?>"><div class="l"></div><div class="m">Contacto</div><div class="r"></div></a></li>
        <li <?php if( $page=="novedades") echo 'class="current"';?>><a href="<?=site_url('/novedades/')?>"><div class="l"></div><div class="m">Novedades</div><div class="r"></div></a></li>
    </ul>

<?php }?>