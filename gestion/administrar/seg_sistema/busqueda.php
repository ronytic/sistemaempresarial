<?php
include_once("../../../estructurabd/seg_sistema.php");
extract($_POST);
$seg_sistema=new seg_sistema;
$condicion="cod_sistema  LIKE '%$cod_sistema' and descripcion LIKE '%$descripcion%' ";

$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered">
<thead>
<tr><th>Nº</th><th>Cod_Empresa</th><th>Descripción</th>
<!--<th>Dirección</th>-->
<!--<th>Teléfono 1</th><th>Teléfono 2</th><th></th></tr>-->
</thead>
<?php
$i=0;
foreach($seg_s as $ss){$i++;
?>
<tr><td><?php echo $i?></td>
<td><?php echo $ss['cod_sistema']?></td>
<td><?php echo $ss['descripcion']?></td>
<!--<td><?php echo $se['direccion']?></td>-->
<!--<td><?php echo $se['telefono1']?></td>
<td><?php echo $se['telefono2']?></td>-->
<td><a href="seg_sistema/modificar.php?cod_sistema=<?php echo $ss['cod_sistema']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
