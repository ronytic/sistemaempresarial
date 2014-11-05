<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_cargo.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_cargo=new rec_cargo;
$condicion="cod_cargo  LIKE '%$cod_cargo' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$rec_c=$rec_cargo->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_c as $rc){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rc['cod_cargo']?></td>
    <td><?php echo $rc['descripcion']?></td>

    <td><a href="cargo/modificar.php?codigo_cargo=<?php echo $rc['codigo_cargo']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
