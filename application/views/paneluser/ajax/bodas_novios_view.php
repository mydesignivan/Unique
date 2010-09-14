<form id="form1" action="<?//=site_url('/paneluser/')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label class="label label-contact" for="txtHistNovia"> Breve hisotria de la Novia<br/></label>
        <div class="fleft"><textarea id="txtHistNovia" name="txtHistNovia" rows="5" cols="22" class="textarea-contact2"></textarea></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtImageNovia"><span class="required">*</span>Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_PRODUCTS . $info['image_name'] : '';
?>
        <img id="ajaxupload-thumb" src="<?=$src?>" alt="<?=@$info['image_name']?>" width="<?=@$info['image_width']?>" height="<?=@$info['image_height']?>" class="fleft thumbframe1 <?php if( $src=='' ) echo 'hide'?>" />
        <div class="fleft">
            <div class="span-14">
                <input type="file" id="txtImageNovia" name="txtImageNovia" class="ajaxupload-input" size="20" />&nbsp;
                <button id="btnUpload2" type="button" onclick="Products.upload();">Subir</button>
                <img id="ajaxupload-load" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div id="ajaxupload-error" class="clear error span-7 hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>

    <div class="trow">
        <label class="label label-contact" for="txtHistNovio"> Breve hisotria de la Novio<br/></label>
        <div class="fleft"><textarea id="txtHistNovio" name="txtHistNovio" rows="5" cols="22" class="textarea-contact2"></textarea></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtImageNovia"><span class="required">*</span>Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_PRODUCTS . $info['image_name'] : '';
?>
        <img id="ajaxupload-thumb" src="<?=$src?>" alt="<?=@$info['image_name']?>" width="<?=@$info['image_width']?>" height="<?=@$info['image_height']?>" class="fleft thumbframe1 <?php if( $src=='' ) echo 'hide'?>" />
        <div class="fleft">
            <div class="span-14">
                <input type="file" id="txtImageNovia" name="txtImageNovia" class="ajaxupload-input" size="20" />&nbsp;
                <button id="btnUpload2" type="button" onclick="Products.upload();">Subir</button>
                <img id="ajaxupload-load" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div id="ajaxupload-error" class="clear error span-7 hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>

    <div class="trow">
        <label class="label label-contact" for="txtImageNovios"> Breve hisotria de la Novios<br/></label>
        <div class="fleft"><textarea id="txtImageNovios" name="txtHistNovia" rows="5" cols="22" class="textarea-contact2"></textarea></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtImageNovia"><span class="required">*</span>Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_PRODUCTS . $info['image_name'] : '';
?>
        <img id="ajaxupload-thumb" src="<?=$src?>" alt="<?=@$info['image_name']?>" width="<?=@$info['image_width']?>" height="<?=@$info['image_height']?>" class="fleft thumbframe1 <?php if( $src=='' ) echo 'hide'?>" />
        <div class="fleft">
            <div class="span-14">
                <input type="file" id="txtImageNovia" name="txtImageNovia" class="ajaxupload-input" size="20" />&nbsp;
                <button id="btnUpload2" type="button" onclick="Products.upload();">Subir</button>
                <img id="ajaxupload-load" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div id="ajaxupload-error" class="clear error span-7 hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>

    <div class="trow" style="width:470px">
        <div class="fright">
            <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button fright" value="Enviar" />
        </div>
    </div>
</form>



