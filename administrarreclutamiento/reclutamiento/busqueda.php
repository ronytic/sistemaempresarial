<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_reclutamiento.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_reclutamiento=new rec_reclutamiento;
$condicion="responsable  LIKE '%$responsable%' and cod_empresa  LIKE '%$cod_empresa' and usuario LIKE '%$usuario%' ";

$rec_c=$rec_reclutamiento->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código Cargo</th><th>Código Área</th><th>Código Bateria</th><th>Fecha Inicio</th><th>Fecha Limite</th><th>Responsable</th><th>Usuario</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_c as $rc){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rc['cod_cargo']?></td>
    <td><?php echo $rc['cod_area']?></td>
    <td><?php echo $rc['cod_bateria']?></td>
    <td><?php echo $rc['fecha_inicio']?></td>
    <td><?php echo $rc['fecha_limite']?></td>
    <td><?php echo $rc['responsable']?></td>
    <td><?php echo $rc['usuario']?></td>

    <td><a href="reclutamiento/modificar.php?cod_recluta=<?php echo $rc['cod_recluta']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
