<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- =============== TOP HEADER =============== -->
<div class="span-24 last header-top"> 
    <a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Unique WP" width="395" height="123" /></a>
</div>

<div class="clear span-24 last"> 
<?php if( $this->session->userdata('logged_in') && $this->uri->segment(1)=="paneladmin" ) {
    $page = $this->uri->segment(2);

    // "PANEL ADMIN"
?>

    <ul class="menu menu-paneladmin">
        <li <?php if( $page=="" || $page=="index" ) echo 'class="current"';?>><a href="<?=$this->config->item('base_url');?>" target="_blank"><div class="l"></div><div class="m">Inicio</div><div class="r"></div> <div class="adorno"></div></a></li>
        <li <?php if( $page=="myaccount") echo 'class="current"';?>><a href="<?=site_url('/paneladmin/myaccount/')?>"><div class="l"></div><div class="m">Mi Cuenta</div><div class="r"></div> <div class="adorno"></div></a></li>
        <li <?php if( $page=="bodas") echo 'class="current"';?>><a href="<?=site_url('/paneladmin/bodas/')?>"><div class="l"></div><div class="m">Bodas</div><div class="r"></div> <div class="adorno"></div></a></li>
        <li <?php if( $page=="galeria") echo 'class="current"';?>><a href="<?=site_url('/paneladmin/galeria/')?>"><div class="l"></div><div class="m">Galer&iacute;a</div><div class="r"></div> <div class="adorno"></div></a></li>
        <li <?php if( $page=="contents") echo 'class="current"';?>><a href="<?=site_url('/paneladmin/contents/')?>"><div class="l"></div><div class="m">P&aacute;ginas</div><div class="r"></div> <div class="adorno"></div></a></li>
        <li><a href="<?=site_url('/paneladmin/index/logout/')?>"><div class="l"></div><div class="m">Salir</div><div class="r"></div> <div class="adorno"></div></a></li>
    </ul>

<?php }else{ // "FRONTPAGE"
    $page = $this->uri->segment(1);?>

    <ul class="menu">
        <li <?php if( $page=="" || $page=="index" ) echo 'class="current"';?>><a href="<?=$this->config->item('base_url');?>"><span class="l"></span><span class="m">Inicio</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li <?php if( $page=="quienes-somos") echo 'class="current"';?>><a href="<?=site_url('/quienes-somos/')?>"><span class="l"></span><span class="m">¿Quienes Somos?</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li <?php if( $page=="servicios") echo 'class="current"';?>><a href="<?=site_url('/servicios/')?>"><span class="l"></span><span class="m">Servicios</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li <?php if( $page=="modalidad") echo 'class="current"';?>><a href="<?=site_url('/modalidad/')?>"><span class="l"></span><span class="m">Modalidad</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li <?php if( $page=="galeria") echo 'class="current"';?>><a href="<?=site_url('/galeria/')?>"><span class="l"></span><span class="m">Galer&iacute;a</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li <?php if( $page=="bodas") echo 'class="current"';?>><a href="<?=site_url('/bodas/')?>"><span class="l"></span><span class="m">Bodas</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li <?php if( $page=="contacto") echo 'class="current"';?>><a href="<?=site_url('/contacto/')?>"><span class="l"></span><span class="m">Contacto</span><span class="r"></span> <span class="adorno"></span></a></li>
        <li><a href="novedades"><span class="l"></span><span class="m">Novedades</span><span class="r"></span> <span class="adorno"></span></a></li>
    </ul>

<?php }?>
</div>