<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_bateria=new rec_bateria;
$condicion="cod_bateria  LIKE '%$cod_bateria' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$rec_b=$rec_bateria->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th width="50">Nº</th><th width="100">Código</th><th>Descripción</th>
<th width="50"></th></tr>
</thead>
<?php
$i=0;
foreach($rec_b as $rb){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rb['cod_bateria']?></td>
    <td><?php echo $rb['descripcion']?></td>

    <td><a href="bateria/modificar.php?codigo_bateria=<?php echo $rb['codigo_bateria']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
