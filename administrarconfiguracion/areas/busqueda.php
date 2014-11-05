<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_area.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_area=new rec_area;
$condicion="cod_area  LIKE '%$cod_area' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$rec_a=$rec_area->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_a as $ra){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $ra['cod_area']?></td>
    <td><?php echo $ra['descripcion']?></td>

    <td><a href="areas/modificar.php?codigo_area=<?php echo $ra['codigo_area']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
