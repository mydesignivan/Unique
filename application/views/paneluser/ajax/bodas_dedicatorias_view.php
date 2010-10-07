<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<form action="" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return Bodas.submit_comments(this, 3)">
<?php if( count($list)>0 ){?>
    <h3 class="subtitle">Dedicatorias <img src="images/dibujo-index.png" alt="" width="47" height="18" /></h3>
    <?php foreach( $list as $row ){?>
    <div class="trow3">
        <p class="title1"><b>Escrito por:&nbsp;<?=$row['name']?></b></p>
        <?=nl2br($row['dedicatoria'])?>
    </div>
    <?php }?>
<?php }?>

    <div class="trow">
        <label class="label label-contact" for="txtNameDedicatoria">* Nombre<br/></label>
        <div class="fleft"><input type="text" id="txtNameDedicatoria" name="txtNameDedicatoria" class="input-contact" /></div>
    </div>
    <div class="trow">
        <label class="label label-contact" for="txtDedicatoria">Escribe tu dedicatoria</label>
        <div class="fleft"><textarea id="txtDedicatoria" name="txtDedicatoria" rows="5" cols="22" class="textarea-contact2"></textarea></div>
    </div>
    <div class="trow align-right" style="width:470px">
       <img src="images/ajax-loader3.gif" alt="Loading..." width="32" height="32" class="jq-loading hide" style="position: relative; top:8px;" />&nbsp;&nbsp;<input type="submit" id="btnSubmit" name="btnSubmit" class="button" value="Enviar" />
    </div>

    <input type="hidden" name="type" value="dedicatoria" />
</form>
