<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_tipo_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_tipo_prueba=new rec_tipo_prueba;
$condicion="cod_tipo  LIKE '%$cod_tipo' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_t_p as $rtp){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rtp['cod_tipo']?></td>
    <td><?php echo $rtp['descripcion']?></td>

    <td><a href="tipo de pruebas/modificar.php?cod_r_t_p=<?php echo $rtp['cod_rec_tipo_prueba']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
