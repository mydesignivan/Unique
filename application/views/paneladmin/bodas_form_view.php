<form id="form1" action="<?=site_url(isset($info) ? '/paneladmin/bodas/edit/' : '/paneladmin/bodas/create/')?>" method="post" enctype="application/x-www-form-urlencoded">

    <div class="trow">
        <label class="label label-contact2" for="txtNombreNovia">* Nombre y apellido de la novia<br/></label>
        <div class="fleft"><input type="text" id="txtNombreNovia" name="txtNombreNovia" class="input-contact2" value="<?=@$info['nombre_novia']?>" /></div>
        <div class="fleft marleft15 "><input type="text" id="txtApellidoNovia" name="txtApellidoNovia" class="input-contact2" value="<?=@$info['nombre_novia']?>" /></div>
    </div>



    <div class="trow">
        <label class="label label-contact2" for="txtNombreNovio">* Nombre y apellido del novio<br/></label>
        <div class="fleft"><input type="text" id="txtNombreNovio" name="txtNombreNovio" class="input-contact2" value="<?=@$info['nombre_novio']?>" /></div>
        <div class="fleft marleft15"><input type="text" id="txtApellidoNovio" name="txtApellidoNovio" class="input-contact2" value="<?=@$info['nombre_novia']?>" /></div>
    </div>



    <div class="trow">
        <label class="label label-contact2" for="txtHistNovia"> Breve hisotria de la Novia<br/></label>
        <div class="fleft"><textarea id="txtHistNovia" name="txtHistNovia" rows="5" cols="22" class="textarea-contact2"><?=@$info['historia_novia']?></textarea></div>
    </div>
    <div class="trow">
        <label class="label label-contact2" for="txtImageNovia"><span class="required">*</span>Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_NOVIA . $info['imagen_novia'] : '';
?>
        <div class="fleft">
            <img src="<?=$src?>" alt="<?=@$info['imagen_novia']?>" width="<?=@$info['imagen_novia_width']?>" height="<?=@$info['imagen_novia_height']?>" class="fleft imgframe jq-au-thumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="span-10">
                <input type="file" id="txtImageNovia" name="txtImageNovia" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Bodas.upload('txtImageNovia','NOVIA');" class="jq-au-button">Subir</button>
                <img src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="ajaxupload-load hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div class="clear error span-7 ajaxupload-error hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtHistNovio"> Breve hisotria del Novio<br/></label>
        <div class="fleft"><textarea id="txtHistNovio" name="txtHistNovio" rows="5" cols="22" class="textarea-contact2"><?=@$info['historia_novio']?></textarea></div>
    </div>
    <div class="trow">
        <label class="label label-contact2" for="txtImageNovio"><span class="required">*</span>Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_NOVIO . $info['imagen_novio'] : '';
?>
        <div class="fleft">
            <img src="<?=$src?>" alt="<?=@$info['imagen_novio']?>" width="<?=@$info['imagen_novio_width']?>" height="<?=@$info['imagen_novio_height']?>" class="fleft imgframe jq-au-thumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="span-10">
                <input type="file" id="txtImageNovio" name="txtImageNovio" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Bodas.upload('txtImageNovio','NOVIO');" class="jq-au-button">Subir</button>
                <img src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="ajaxupload-load hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div class="clear error span-7 ajaxupload-error hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>

    <div class="trow">
        <label class="label label-contact2" for="txtHistNovios"> Breve hisotria de la Novios<br/></label>
        <div class="fleft"><textarea id="txtHistNovios" name="txtHistNovios" rows="5" cols="22" class="textarea-contact2"><?=@$info['historia_novios']?></textarea></div>
    </div>
    <div class="trow">
        <label class="label label-contact2" for="txtImageNovia"><span class="required">*</span>Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_NOVIOS . $info['imagen_novios'] : '';
?>
        <div class="fleft">
            <img src="<?=$src?>" alt="<?=@$info['imagen_novios']?>" width="<?=@$info['imagen_novios_width']?>" height="<?=@$info['imagen_novios_height']?>" class="fleft imgframe jq-au-thumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="span-10">
                <input type="file" id="txtImageNovios" name="txtImageNovios" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Bodas.upload('txtImageNovios','NOVIOS');" class="jq-au-button">Subir</button>
                <img src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="ajaxupload-load hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div class="clear error span-7 ajaxupload-error hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>



    <div class="trow">
        <label class="label label-contact2" for="txtUbiSalon">* Ubicaci&oacute;n sal&oacute;n<br/>
            <span class="text-size-80">(c&oacute;digo Google Maps)  </span></label>
        <div class="fleft"><input type="text" id="txtUbiSalon" name="txtUbiSalon" class="input-contact" value="<?=@$info['google_maps_salon']?>" /></div>
    </div>


    <div class="trow">
        <label class="label label-contact2" for="txtUbiIglesia">* Ubicaci&oacute;n Iglesia<br/>
            <span class="text-size-80">(c&oacute;digo Google Maps)  </span></label>
        <div class="fleft"><input type="text" id="txtUbiIglesia" name="txtUbiIglesia" class="input-contact" value="<?=@$info['google_maps_iglesia']?>" /></div>
    </div>


    <div class="trow">
        <label class="label label-contact2" for="lstRegalos"> Lista de Regalos<br/></label>
        <div class="fleft">
            <?php
            if (!isset($info['regalos'])) $info['regalos']=array();
            echo form_dropdown('lstRegalos', $info['regalos'], false, "id='lstRegalos' size='10' multiple  class='input-contact'" );?>

        </div>
    </div>
    <div class="trow">
        <label class="label label-contact2" for="txtRegalo"> &nbsp;</label>
         <label  >Regalo <br/></label>
        <div class="fleft"><input type="text" id="txtRegalo" name="txtRegalo" class="input-contact" value="" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact2"  <br/></label>
        
        <button id="btnAgregarRegalo" type="button" onclick="Bodas.agregarItem('#lstRegalos','#txtRegalo');">Agregar</button>
        <button id="btnQuitarRegalo" type="button" onclick="Bodas.quitarItem('#lstRegalos');">Quitar</button>
    </div>




    <div class="trow">
        <label class="label label-contact2" for="lstMenu"> Lista Menues<br/></label>
        <div class="fleft">
            <?php
            if (!isset($info['menus'])) $info['menus']=array();
                echo form_dropdown('lstMenu', $info['menus'], false, "id='lstMenu' size='10' multiple  class='input-contact'" );
               ?>


        </div>
    </div>

   <div class="trow">
       <label class="label label-contact2" for="txtMenu">&nbsp;</label>
        <label  >Menu <br/></label>
        <div class="fleft"><input type="text" id="txtMenu" name="txtMenu" class="input-contact" value="" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact2" > <br/></label>
        
        <button id="btnAgregarMenu" type="button" onclick="Bodas.agregarItem('#lstMenu','#txtMenu');">Agregar</button>
        <button id="btnQuitarMenu" type="button" onclick="Bodas.quitarItem('#lstMenu');">Quitar</button>
    </div>


    
    <div class="trow" style="width:470px">
        <div class="fright">
            <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button fright" value="Enviar" />
        </div>
    </div>

    <input type="hidden" name="json" id="json" />

</form>

<form id="ajaxupload-form" action="<?=site_url('/paneladmin/bodas/ajax_upload_bodas')?>" method="post" enctype="multipart/form-data" target="ifr" class="hide">
    <iframe name="ifr" id="ifr" src="about:blank" frameborder="1" style="width:800px; height: 100px; border: 1px solid red;"></iframe>
</form>


<script type="text/javascript">
<!--
Bodas.initializer();
-->
</script>