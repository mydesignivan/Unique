<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( count($list)>0 ){?>
    <div class="trow">
        <div class="fright">
            <button type="button" onclick="BodasList.comments_del_sel();">Eliminar Seleccionados</button>
        </div>
    </div>

        <table cellpadding="0" cellspacing="0" class="table-comments" id="tblList">
        <thead>
            <tr>
                <td class="cell1">&nbsp;</td>
                <td class="cell2">Usuario</td>
                <td class="cell3">Cr&oacute;nica</td>
                <td class="cell4">Eliminar</td>
            </tr>
        </thead>
        <tbody>
    <?php
    $n=0;
    foreach( $list as $row ) {
        $n++;
        $class = $n%2 ? 'row-even' : '';
    ?>
            <tr class="<?=$class?>">
                <td class="cell1"><input type="checkbox" value="<?=$row['id']?>" /></td>
                <td class="cell2"><?=$row['username']?></td>
                <td class="cell3"><?=nl2br($row['cronica'])?></td>
                <td class="cell4"><a href="javascript:void(BodasList.comments_del(<?=$row['id']?>))" class="link1"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
            </tr>
    <?php }?>
        </tbody>
    </table>

    <div id="ajaxloader" class="ajaxloader"><br /><br /><br /><br /><br /><br /><br /><br /><img src="images/ajax-loader2.gif" alt="Loading..." width="100" height="100" /></div>

<?php }else{?>

    <div class="trow align-center"><br /><br /><br /><br /><br /><br /><br /><br /><br /><h2>No hay cronicas cargadas.</h2></div>

<?php }?>
