<?php
include_once("../../../estructurabd/seg_empresa.php");
extract($_POST);
$seg_empresa=new seg_empresa;
$condicion="cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' and direccion LIKE '%$direccion%'";

$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered">
<thead>
<tr><th>Nº</th><th>Cod_Empresa</th><th>Descripción</th><th>Dirección</th><th>Teléfono 1</th><th>Teléfono 2</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($seg_e as $se){$i++;
?>
<tr><td><?php echo $i?></td><td><?php echo $se['cod_empresa']?></td><td><?php echo $se['descripcion']?></td><td><?php echo $se['direccion']?></td><td><?php echo $se['telefono1']?></td><td><?php echo $se['telefono2']?></td><td><a href="seg_empresa/modificar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
