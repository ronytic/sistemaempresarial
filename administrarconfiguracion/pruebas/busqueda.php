<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_prueba=new rec_prueba;
$condicion="cod_prueba  LIKE '%$cod_prueba' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$rec_p=$rec_prueba->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Código de Tipo de Prueba</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_p as $rp){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rp['cod_prueba']?></td>
    <td><?php echo $rp['cod_tipo']?></td>
    <td><?php echo $rp['descripcion']?></td>

    <td><a href="pruebas/modificar.php?cod_prueba=<?php echo $rp['cod_prueba']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
