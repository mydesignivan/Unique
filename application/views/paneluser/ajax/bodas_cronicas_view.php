<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<form action="" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return Bodas.submit_comments(this, 4)">
<?php if( count($list)>0 ){?>
    <h3 class="subtitle">Cronicas<img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
    <?php foreach( $list as $row ){?>
    <div class="trow3">
        <p class="title1"><b>Escrito por:&nbsp;<?=$row['username']?></b></p>
        <?=nl2br($row['cronica'])?>
    </div>
    <?php }?>
<?php }?>
    <div class="trow">
        <label class="label label-contact" for="txtCronica">Escribe tu cr&oacute;nica</label>
        <div class="fleft"><textarea id="txtCronica" name="txtCronica" rows="5" cols="22" class="textarea-contact2"></textarea></div>
    </div>

    <div class="trow" style="width:470px">
        <div class="fright">
            <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button fright" value="Enviar" />
        </div>
    </div>
    <input type="hidden" name="type" value="cronica" />
</form>

