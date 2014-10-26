<?php
include_once("../../../estructurabd/seg_permiso.php");
extract($_POST);
$seg_permiso=new seg_permiso;
$condicion="cod_sistema  LIKE '%$cod_sistema' and descripcion LIKE '%$descripcion%' ";

$seg_p=$seg_permiso->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered">
<thead>
<tr><th>Nº</th><th>Cod_Sistema</th><th>Descripción</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($seg_p as $sp){$i++;
?>
<tr><td><?php echo $i?></td><td><?php echo $sp['cod_sistema']?></td><td><?php echo $sp['descripcion']?></td><td><a href="seg_permiso/modificar.php?cod_permiso=<?php echo $sp['cod_permiso']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
