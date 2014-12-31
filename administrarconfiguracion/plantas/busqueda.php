<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_planta=new rec_planta;
$condicion="cod_planta  LIKE '%$cod_planta' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$rec_p=$rec_planta->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_p as $rp){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rp['cod_planta']?></td>
    <td><?php echo $rp['descripcion']?></td>

    <td><a href="plantas/modificar.php?codigo_planta=<?php echo $rp['codigo_planta']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
