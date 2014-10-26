<?php
include_once("../../../estructurabd/seg_rol_permiso.php");
extract($_POST);
$seg_rol_permiso=new seg_rol_permiso;
$condicion="cod_rol LIKE '%$cod_rol' and cod_permiso LIKE '%$cod_permiso' ";

$seg_rp=$seg_rol_permiso->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered">
<thead>
<tr><th>Nº</th><th>Cod_Rol</th><th>Cod_Empresa</th><th>Cod_Sistema</th><th>Cod_Permiso</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($seg_rp as $srp){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $srp['cod_rol']?></td>
    <td><?php echo $srp['cod_empresa']?></td>
    <td><?php echo $srp['cod_sistema']?></td>
    <td><?php echo $srp['cod_permiso']?></td>
    <td><a href="seg_rol_permiso/modificar.php?cod_rp=<?php echo $srp['cod_rp']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
