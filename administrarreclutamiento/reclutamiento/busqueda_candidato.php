<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_candidato.php");
extract($_POST);
$rec_candidato=new rec_candidato;
$cod_empresa=$_SESSION['cod_empresa'];
$condicion="cedula  LIKE '$cedula%' and nombre  LIKE '$nombre%' and paterno  LIKE '$paterno%' and materno  LIKE '$materno%'";

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered table-hover">
<thead>
<tr><th>Nº</th><th>Cédula</th><th>Nombre</th><th>Paterno</th><th>Materno</th><th>Fecha de Nac</th><th>Teléfono</th><th>Correo</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_c as $rc){$i++;
?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rc['cedula']?> <?php echo $rc['exp']?></td>

    <td><?php echo $rc['nombre']?></td>
    <td><?php echo $rc['paterno']?></td>
    <td><?php echo $rc['materno']?></td>
    <td><?php echo date("d-m-Y",strtotime($rc['fecha_nac']))?></td>
    <td><?php echo $rc['telefono']?></td>
    <td><?php echo $rc['mail']?></td>
    <td><a href="agregar_candidato.php?cedula=<?php echo $rc['cedula']?>&cod_recluta=<?php echo $cod_recluta?>" class="btn btn-xs btn-info " title="Modificar">Agregar</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
