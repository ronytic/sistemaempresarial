<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_empleado.php");
include_once("../../../estructurabd/rec_cargo.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rh_empleado=new rh_empleado;
$rec_cargo=new rec_cargo;


$cedula=$cedula!=""?$cedula:'%';
$nombre=$nombre!=""?$nombre:'%';
$paterno=$paterno!=""?$paterno:'%';
$materno=$materno!=""?$materno:'%';
//cod_cargo  LIKE '$cod_cargo'
$condicion="cedula  LIKE '$cedula' and nombre LIKE '$nombre' and paterno LIKE '$paterno' and materno LIKE '$materno'";

$rh_e=$rh_empleado->mostrarTodoRegistro($condicion,0,"paterno,materno,nombre");
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th width="50">Nº</th><th width="100">Cédula de Identidad</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombres</th><th>Cargo</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rh_e as $re){$i++;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$re['cod_cargo']."'",0);
$rec_c=array_shift($rec_c);
?>
<tr>
	<td class="der"><?php echo $i?></td>
    <td class="der"><?php echo $re['cedula']?></td>
    <td><?php echo $re['paterno']?></td>
    <td><?php echo $re['materno']?></td>
    <td><?php echo $re['nombre']?></td>
    <td><?php echo $rec_c['descripcion']?></td>
    <td><a href="empleado/modificar.php?cedula=<?php echo $re['cedula']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
