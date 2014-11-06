<?php
include_once("../../login/check.php");
include_once("../../estructurabd/seg_rol.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$seg_rol=new seg_rol;
$condicion="cod_rol  LIKE '%$cod_rol'  and cod_sistema  LIKE '%$cod_sistema' and cod_empresa  LIKE '%$cod_empresa' and descripcion LIKE '%$descripcion%' ";

$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Descripción</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($seg_r as $sr){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $sr['cod_rol']?></td>
    <td><?php echo $sr['descripcion']?></td>

    <td><a href="rol sistema/modificar.php?cod_rol=<?php echo $sr['cod_rol']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
