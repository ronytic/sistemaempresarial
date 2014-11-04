<?php
include_once("../../login/check.php");
include_once("../../estructurabd/seg_usuario.php");
extract($_POST);
$seg_usuario=new seg_usuario;
$cod_empresa=$_SESSION['cod_empresa'];
$condicion="cod_empresa  LIKE '%$cod_empresa' and cod_sistema  LIKE '%$cod_sistema' ";

$seg_u=$seg_usuario->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered table-hover">
<thead>
<tr><th>Nº</th><th>Empresa</th><th>Sistema</th><th>Login</th><th>Nombre</th><th>Paterno</th><th>Materno</th><th>Fecha de Creación</th><th>Fecha Expiración</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($seg_u as $su){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $su['cod_empresa']?></td>
    <td><?php echo $su['cod_sistema']?></td>
    <td><?php echo $su['login']?></td>
    <td><?php echo $su['nombre']?></td>
    <td><?php echo $su['paterno']?></td>
    <td><?php echo $su['materno']?></td>
    <td><?php echo $su['fecha_creacion']?></td>
    <td><?php echo $su['fecha_expira']?></td>
    <td><a href="usuarios/modificar.php?cod_usuario=<?php echo $su['cod_usuario']?>" class="btn btn-xs btn-warning cargarajax" title="Modificar">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
