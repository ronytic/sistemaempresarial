<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_area_usuario.php");

include_once("../../estructurabd/rec_area.php");

$rec_area=new rec_area;
if($_GET['login']!=""){
	$login=$_GET['login'];
}

extract($_POST);
if(!isset($rec_area_usuario)){
	$rec_area_usuario=new rec_area_usuario;	
}


$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];

$condicion="login  LIKE '%$login' ";

$rec_a_u=$rec_area_usuario->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered table-hover">
<thead>
<tr><th>Nº</th><th>Login</th><th>Area</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_a_u as $rau){$i++;
$ra=$rec_area->mostrarTodoRegistro("cod_area='".$rau['cod_area']."'",0);
$ra=array_shift($ra);
?>
<tr>
	<td><?php echo $i?></td>

    <td><?php echo $rau['login']?></td>
    <td><?php echo $rau['cod_area']?> - <?php echo $ra['descripcion']?></td>
    <td><a href="usuarios/eliminar_area.php?cod_rec_area_usuario=<?php echo $rau['cod_rec_area_usuario']?>" class="btn btn-xs btn-danger cargarajax" title="Eliminar">E</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
