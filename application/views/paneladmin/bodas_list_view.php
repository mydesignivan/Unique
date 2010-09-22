<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="success" ){?>
<div class="success">
    Las bodas pudieron ser eliminados correctamente.
</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    Las bodas no han podido ser eliminados.
</div>
<?php }?>



<div class="trow">
    <div class="fright">
        <button type="button" onclick="location.href='<?=site_url('paneladmin/bodas/form')?>'">Agregar Boda</button>&nbsp;&nbsp;
        <button type="button" onclick="BodasList.del_sel();">Eliminar Seleccionados</button>
    </div>
</div>


<?php if( $listBodas->num_rows>0 ){?>
    <table cellpadding="0" cellspacing="0" class="table-bodas" id="tblList">
    <thead>
        <tr>
            <td class="cell1">&nbsp;</td>
            <td class="cell2">Bodas</td>
            <td class="cell3">Dedicatorias</td>
            <td class="cell4">Cronicas</td>
            <td class="cell5">Orden</td>
            <td class="cell6">Modificar</td>
            <td class="cell7">Eliminar</td>
        </tr>
    </thead>
    <tbody id="sortable">
<?php
$n=0;
foreach( $listBodas->result_array() as $row ) {
    $n++;
    $url = site_url('/paneladmin/bodas/form/'.$row['bodas_id']);
    $class = $n%2 ? 'row-even' : '';
?>
        <tr id="id<?=$row['bodas_id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" value="<?=$row['bodas_id']?>" /></td>
            <td class="cell2"><a href="<?=$url?>" class="link-title"><?=ucwords($row['nombre_novia']." &amp; ".$row['nombre_novio'])?></a></td>
            <td class="cell3"><a href="javascript:void(BodasList.popup_comments(<?=$row['bodas_id']?>, 'bodas_dedicatorias_view'))" class="link1"><img src="images/icon_view.png" alt="" width="16" alt="16" /> Mostrar</a></td>
            <td class="cell4"><a href="javascript:void(BodasList.popup_comments(<?=$row['bodas_id']?>, 'bodas_cronicas_view'))" class="link1"><img src="images/icon_view.png" alt="" width="16" alt="16" /> Mostrar</a></td>
            <td class="cell5"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell6"><a href="<?=$url?>" class="link1"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Modificar</span></a></td>
            <td class="cell7"><a href="javascript:void(BodasList.del(<?=$row['bodas_id']?>))" class="link1"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php }?>
    </tbody>
</table>
<?php }?>

<div id="popup"></div>

<script type="text/javascript">
<!--
BodasList.initializer();
-->
</script>