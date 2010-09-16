<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
    <div class="clear"></div>
<?php }?>



<div class="trow">
    <button type="button" onclick="" class="fright">Eliminar Seleccionados</button>
    <button type="button" onclick="location.href='<?=site_url('paneladmin/bodas/form')?>'" class="fright">Agregar Boda</button>
</div>


<?php if( $listBodas->num_rows>0 ){?>
<table cellpadding="0" cellspacing="0" class="table-bodas">
    <thead>
        <tr>
            <td class="cell1"></td>
            <td class="cell2">Bodas</td>
            
            <td class="cell3">Modificar</td>
            <td class="cell4">Eliminar</td>
        </tr>
    </thead>
    <tbody>
<?php
$n=0;
foreach( $listBodas->result_array() as $row ) {
    $n++;
    $url = site_url('/paneladmin/bodas/form/'.$row['bodas_id']);
    $class = $n%2 ? 'row-even' : '';
?>
        <tr id="tr<?=$row['bodas_id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" id="chk_<?=$row['bodas_id']?>" name="chk_<?=$row['bodas_id']?>"></td>
            <td class="cell2"><a href="<?=$url?>" class="link-title2"><?=$row['nombre_novia']." y ".$row['nombre_novio']?></a></td>
            
            <td class="cell3"><a href="<?=$url?>"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Modificar</span></a></td>
            <td class="cell4"><a href="javascript:Products.del(<?=$row['bodas_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php }?>
    </tbody>
</table>
<?php }?>

<script type="text/javascript">
<!--
    Products.initializer();
-->
</script>