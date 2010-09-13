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

<form id="form1" action="<?//=site_url(isset($info) ? '/paneladmin/galeria/edit/' : '/paneladmin/galeria/create/')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <fieldset class="gallery-panel">
            <div class="cont">
                <ul id="gallery-image" <?php if( !isset($info) ){?>class="hide"<?php }?>>
        <?php if( isset($info) ){?>
            <?php foreach( $info as $row ){?>
                    <li>
                        <a href="<?=UPLOAD_PATH_GALLERY.$row['image']?>" class="jq-image" rel="group"><img src="<?=UPLOAD_PATH_GALLERY.$row['thumb']?>" alt="<?=$row['thumb']?>" width="130" height="58" /></a>
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

        <div class="fleft clear">
            <div class="span-14 last">
                <input type="file" size="22" name="txtUploadFile" id="txtUploadFile" />&nbsp;
                <button id="btnUpload" type="button" onclick="PictureGallery.upluad()">Subir</button>
                <img id="ajax-loader1" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <div class="clear span-14"><label class="label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label></div>
            <div id="pg-msgerror" class="clear error span-7 hide">Este campo es obligatorio</div>
        </div>
    </div>

    <div class="trow align-center" style="margin-top:20px">
        <img src="images/ajax-loader3.gif" alt="Sending ..." width="32" height="32" style="position: relative; top:10px; right: 10px;" class="hide jq-loading" /><button type="submit" name="btnSubmit" class="jq-submit button">Guardar</button>
    </div>

    <input type="hidden" name="json" id="json" />
</form>

<script type="text/javascript">
<!--
    Galeria.initializer();
-->
</script>