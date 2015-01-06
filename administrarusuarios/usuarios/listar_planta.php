<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta_usuario.php");

include_once("../../estructurabd/rec_planta.php");

$rec_planta=new rec_planta;
if($_GET['login']!=""){
	$login=$_GET['login'];
}

extract($_POST);
if(!isset($rec_planta_usuario)){
	$rec_planta_usuario=new rec_planta_usuario;	
}


$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];

$condicion="login  LIKE '%$login' ";

$rec_p_u=$rec_planta_usuario->mostrarTodoRegistro($condicion,1);
?>
<table class="table table-bordered table-hover">
<thead>
<tr><th>Nº</th><th>Usuario</th><th>Planta</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_p_u as $rpu){$i++;
$rp=$rec_planta->mostrarTodoRegistro("cod_planta='".$rpu['cod_planta']."'",0);
$rp=array_shift($rp);
?>
<tr>
	<td><?php echo $i?></td>

    <td><?php echo $rpu['login']?></td>
    <td><?php echo $rpu['cod_planta']?> - <?php echo $rp['descripcion']?></td>
    <td><a href="usuarios/eliminar_planta.php?cod_rec_planta_usuario=<?php echo $rpu['cod_rec_planta_usuario']?>" class="btn btn-xs btn-danger cargarajax" title="Eliminar">E</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
