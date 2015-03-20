<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_competencia_mas.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rh_competencia_mas=new rh_competencia_mas;
$condicion="cod_competencia  LIKE '%$cod_competencia'  and descripcion LIKE '%$descripcion%' ";

$rh_c_m=$rh_competencia_mas->mostrarTodoRegistro($condicion,0,"descripcion");
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rh_c_m as $rc){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rc['cod_competencia']?></td>
    <td><?php echo $rc['descripcion']?></td>

    <td><a href="competencia/modificar.php?cod_competencia=<?php echo $rc['cod_competencia']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
