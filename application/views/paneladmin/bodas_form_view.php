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

<?php $mode_edit = isset($info) ? "true" : "false"?>

<form id="form1" action="<?=site_url(isset($info) ? '/paneladmin/bodas/edit/' : '/paneladmin/bodas/create/')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtFecha">* Fecha y hora del evento</label>
        <div class="span-19 last">
            <div class="fleft" style="margin-right:5px;">
                <input type="text" id="txtFecha" readonly name="txtFecha" class="input-small" value="<?=date('d-m-Y', isset($info['fecha'])? $info['fecha']:time())?>" />
            </div>
            <div class="fleft">
                 <?=form_dropdown("comboHora",$comboHora,@$info['fecha'],"id='comboHora'");?>
            </div>
            <div class="fleft">
                <?=form_dropdown("comboMinuto",$comboMinuto,@$info['fecha'],"id='comboMinuto'");?>
            </div>
        </div>
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtNombreNovia">* Nombre y Apellido de la Novia</label>
        <div class="span-19 last">
            <div class="fleft" style="margin-right:5px;"><input type="text" id="txtNombreNovia" name="txtNombreNovia" class="input-small" value="<?=@$info['nombre_novia']?>" /></div>
            <div class="fleft"><input type="text" id="txtApellidoNovia" name="txtApellidoNovia" class="input-small" value="<?=@$info['apellido_novia']?>" /></div>
        </div>
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtHistNovia">* Breve historia de la Novia</label>
        <div class="span-19 last"><textarea id="txtHistNovia" name="txtHistNovia" rows="5" cols="22" class="textarea-contact2"><?=@$info['historia_novia']?></textarea></div>
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtImageNovia">* Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_NOVIA . $info['imagen_novia'] : '';
?>
        <div class="span-16 last">
            <img src="<?=$src?>" alt="<?=@$info['imagen_novia']?>" width="<?=@$info['imagen_novia_width']?>" height="<?=@$info['imagen_novia_height']?>" class="fleft imgframe jq-au-thumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="span-14 last">
                <input type="file" id="txtImageNovia" name="txtImageNovia" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Bodas.upload('txtImageNovia','NOVIA');" class="jq-au-button">Subir</button>
                <img src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="ajaxupload-load hide" />
            </div>
            <div class="clear"><label class="label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label></div>
            <div class="clear error span-7 ajaxupload-error hide"></div>
        </div>
        <input type="hidden" name="image_old_novia" value="<?=$src?>" />
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtNombreNovio">* Nombre y Apellido del Novio<br/></label>
        <div class="span-19 last">
            <div class="fleft" style="margin-right:5px;"><input type="text" id="txtNombreNovio" name="txtNombreNovio" class="input-small" value="<?=@$info['nombre_novio']?>" /></div>
            <div class="fleft"><input type="text" id="txtApellidoNovio" name="txtApellidoNovio" class="input-small" value="<?=@$info['apellido_novio']?>" /></div>
        </div>
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtHistNovio">* Breve historia del Novio</label>
        <div class="fleft"><textarea id="txtHistNovio" name="txtHistNovio" rows="5" cols="22" class="textarea-contact2"><?=@$info['historia_novio']?></textarea></div>
    </div>
    
    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtImageNovio">* Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_NOVIO . $info['imagen_novio'] : '';
?>
        <div class="span-16 last">
            <img src="<?=$src?>" alt="<?=@$info['imagen_novio']?>" width="<?=@$info['imagen_novio_width']?>" height="<?=@$info['imagen_novio_height']?>" class="fleft imgframe jq-au-thumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="span-14 last">
                <input type="file" id="txtImageNovio" name="txtImageNovio" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Bodas.upload('txtImageNovio','NOVIO');" class="jq-au-button">Subir</button>
                <img src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="ajaxupload-load hide" />
            </div>
            <div class="clear"><label class="label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label></div>
            <div class="clear error span-7 ajaxupload-error hide"></div>
        </div>
        <input type="hidden" name="image_old_novio" value="<?=$src?>" />
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtHistNovios">* Breve historia de la Pareja</label>
        <div class="span-19 last"><textarea id="txtHistNovios" name="txtHistNovios" rows="5" cols="22" class="textarea-contact2"><?=@$info['historia_novios']?></textarea></div>
    </div>

    <div class="trow" style="width:1000px;">
        <label class="label label-contact2" for="txtImageNovia">* Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_PAREJA . $info['imagen_novios'] : '';
?>
        <div class="span-16 last">
            <img src="<?=$src?>" alt="<?=@$info['imagen_novios']?>" width="<?=@$info['imagen_novios_width']?>" height="<?=@$info['imagen_novios_height']?>" class="fleft imgframe jq-au-thumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="span-14 last">
                <input type="file" id="txtImageNovios" name="txtImageNovios" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Bodas.upload('txtImageNovios','NOVIOS');" class="jq-au-button">Subir</button>
                <img src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="ajaxupload-load hide" />
            </div>
            <div class="clear"><label class="label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label></div>
            <div class="clear error span-7 ajaxupload-error hide"></div>
        </div>
        <input type="hidden" name="image_old_novios" value="<?=$src?>" />
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtNombreSalon">* Nombre Sal&oacute;n</label>
        <div class="fleft"><input type="text" id="txtNombreSalon" name="txtNombreSalon" class="input-contact" value="<?=@$info['nombre_salon']?>" /></div>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtUbiSalon">* Ubicaci&oacute;n sal&oacute;n<br/>
            <span class="text-size-80">(c&oacute;digo Google Maps)</span></label>
        <div class="fleft"><input type="text" id="txtUbiSalon" name="txtUbiSalon" class="input-contact" value='<?=@$info['google_maps_salon']?>' onclick="this.select()" /></div>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtNombreIglesia">* Nombre Iglesia</label>
        <div class="fleft"><input type="text" id="txtNombreIglesia" name="txtNombreIglesia" class="input-contact" value="<?=@$info['nombre_iglesia']?>" /></div>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtUbiIglesia">* Ubicaci&oacute;n Iglesia<br/>
            <span class="text-size-80">(c&oacute;digo Google Maps)</span></label>
        <div class="fleft"><input type="text" id="txtUbiIglesia" name="txtUbiIglesia" class="input-contact" value='<?=@$info['google_maps_iglesia']?>' onclick="this.select()" /></div>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="lstRegalos"> Lista de Regalos<br/></label>
        <div class="fleft">
            <?php if (!isset($info['regalos'])) $info['regalos']=array();
            echo form_dropdown('lstRegalos', $info['regalos'], false, "id='lstRegalos' size='10' multiple  class='input-contact'" );?>
        </div>
    </div>

    <div class="trow">
        <label class="label label-contact2">&nbsp;</label>
        <div class="fleft">
            <label for="txtRegalo">Regalo</label><br />
            <input type="text" id="txtRegalo" name="txtRegalo" class="input-contact" value="" />
        </div>
    </div>

    <div class="trow">
        <label class="label label-contact2">&nbsp;</label>        
        <button id="btnAgregarRegalo" type="button" onclick="Bodas.add_item('#lstRegalos','#txtRegalo');">Agregar</button>&nbsp;&nbsp;
        <button id="btnQuitarRegalo" type="button" onclick="Bodas.remove_item('#lstRegalos');">Quitar</button>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="lstMenu">* Lista Menues<br/></label>
        <div class="fleft">
            <?php
            if (!isset($info['menus'])) $info['menus']=array();
                echo form_dropdown('lstMenu', $info['menus'], false, "id='lstMenu' size='10' multiple  class='input-contact'" );?>
        </div>
    </div>

    <div class="trow">
        <label class="label label-contact2">&nbsp;</label>
        <div class="fleft">
            <label for="txtMenu">Men&uacute;</label><br />
            <input type="text" id="txtMenu" name="txtMenu" class="input-contact" value="" />
        </div>
    </div>
    
    <div class="trow">
        <label class="label label-contact2" >&nbsp;</label>        
        <button id="btnAgregarMenu" type="button" onclick="Bodas.add_item('#lstMenu','#txtMenu');">Agregar</button>&nbsp;&nbsp;
        <button id="btnQuitarMenu" type="button" onclick="Bodas.remove_item('#lstMenu');">Quitar</button>
    </div>

    <div class="trow">
         <label class="label label-contact2">Galer&iacute;a de Im&aacute;genes</label>
         <div class="fleft">
            <fieldset class="gallery-panel gallery-panel2">

                <div class="cont">
                    <ul id="gallery-image" <?php if( count(@$info['gallery'])==0 ){?>class="hide"<?php }?>>
            <?php if( count(@$info['gallery'])>0 ){?>
                <?php foreach( $info['gallery'] as $row ){?>
                        <li>
                            <a href="<?=UPLOAD_PATH_GALLERY_BODAS.$row['image']?>" class="jq-image" rel="group"><img src="<?=UPLOAD_PATH_GALLERY_BODAS.$row['thumb']?>" alt="<?=$row['thumb']?>" width="108" height="70" /></a>
                            <div class="d1 clear">
                                <a href="javascript:void(0)" class="link2 fleft jq-removeimg"><img src="images/icon_delete.png" alt="" width="16" height="16" />Quitar</a>
                                <a href="javascript:void(0)" class="fright handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                            </div>
                        </li>
                <?php }?>

            <?php }else{?>
                        <li>
                            <a href="" class="jq-image" rel="group"><img src="" alt="" width="" height="" /></a>
                            <div class="d1 clear">
                                <a href="javascript:void(0)" class="link2 fleft jq-removeimg"><img src="images/icon_delete.png" alt="" width="16" height="16" />Quitar</a>
                                <a href="javascript:void(0)" class="fright handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                            </div>
                        </li>
            <?php }?>
                    </ul>

                </div>
            </fieldset>

            <div class="clear span-14 last">
                <input type="file" size="22" name="txtUploadFile" id="txtUploadFile" />&nbsp;
                <button id="btnUpload" type="button" onclick="PictureGallery.upluad()">Subir</button>
                <img id="ajax-loader1" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <div class="clear"><label class="label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label></div>
            <div id="pg-msgerror" class="clear error span-7 hide"></div>
        </div>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtUsuario">* Nombre de Usuario<br/></label>
        <div class="fleft"><input type="text" id="txtUsuario" name="txtUsuario" class="input-bodas" value="<?=@$info['username']?>" maxlength="10" /></div>
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtPass">* Contrase&ntilde;a<br/></label>
        <div class="fleft"><input type="text" id="txtPass" name="txtPass" class="input-bodas" value="<?=@$info['password']?>" maxlength="10" /></div>
        &nbsp;<button id="btnGenerarPass" type="button" onclick="Bodas.generate_pass();">Generar password</button>
    </div>

    <div class="trow align-right" style="width:470px">
       <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" style="position: relative; top:8px;" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button" value="Guardar" />
    </div>

    <input type="hidden" name="json" id="json" />
    <input type="hidden" name="bodas_id" id="bodas_id" value="<?=isset($info['bodas_id']) ? $info['bodas_id'] : 0;?>" />
</form>

<form id="ajaxupload-form" action="<?=site_url('/paneladmin/bodas/ajax_upload_bodas')?>" method="post" enctype="multipart/form-data" target="ifr" class="hide">
    <iframe name="ifr" id="ifr" src="about:blank" frameborder="1" style="width:800px; height: 100px; border: 1px solid red;"></iframe>
</form>


<script type="text/javascript">
<!--
Bodas.initializer(<?=$mode_edit?>);
-->
</script>