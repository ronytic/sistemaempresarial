<?php
include_once("../../../estructurabd/seg_rol.php");
extract($_POST);
$seg_rol=new seg_rol;
$condicion="cod_empresa LIKE '%$cod_empresa' and cod_sistema LIKE '%$cod_sistema' and descripcion LIKE '%$descripcion%' ";

$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered">
<thead>
<tr><th>Nº</th><th>Cod_Empresa</th><th>Cod_Sistema</th><th>Descripción</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($seg_r as $sr){$i++;
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $sr['cod_empresa']?></td>
<td><?php echo $sr['cod_sistema']?></td>
<td><?php echo $sr['descripcion']?></td>
<td><a href="seg_rol/modificar.php?cod_rol=<?php echo $sr['cod_rol']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
