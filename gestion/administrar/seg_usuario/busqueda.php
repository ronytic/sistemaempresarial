<?php
include_once("../../../estructurabd/seg_usuario.php");
extract($_POST);
$seg_usuario=new seg_usuario;
$condicion="cod_empresa  LIKE '%$cod_empresa' and cod_sistema  LIKE '%$cod_sistema' ";

$seg_u=$seg_usuario->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered">
<thead>
<tr><th>Nº</th><th>Cod_Empresa</th><th>Cod_Sistema</th><th>Login</th><th>Nombre</th><th>Paterno</th><th>Materno</th><th>FechaCreación</th><th>Fecha Expiración</th><th></th></tr>
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
    <td><a href="seg_usuario/modificar.php?cod_empresa=<?php echo $su['cod_empresa']?>" class="btn btn-xs btn-warning cargarajax" title="Modificar">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
