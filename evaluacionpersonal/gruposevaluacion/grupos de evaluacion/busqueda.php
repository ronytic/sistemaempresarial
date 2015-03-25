<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_grupo_mas.php");
$rh_grupo_mas=new rh_grupo_mas;

include_once("../../../estructurabd/rh_competencia_mas.php");
$rh_competencia_mas=new rh_competencia_mas;

include_once("../../../estructurabd/rh_empleado.php");
$rh_empleado=new rh_empleado;

include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;



extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_competencia=$cod_competencia!=""?$cod_competencia:"%";
$cod_cargo=$cod_cargo!=""?$cod_cargo:"%";

$condicion="cedula_jefe IN(SELECT cedula FROM rh_empleado WHERE nombre LIKE '%$nombre%') ";

$rh_g_m=$rh_grupo_mas->mostrarTodoRegistro($condicion,0,"codigo_grupo");
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Evaluador</th><th>Cargo</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rh_g_m as $rg){$i++;
$rh_c_m=$rh_competencia_mas->mostrarTodoRegistro("cod_competencia='".$rg['cod_competencia']."'",0,"descripcion");
$rh_c_m=array_shift($rh_c_m);
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$rg['cod_cargo']."'",0,"descripcion");
$rec_c=array_shift($rec_c);

$rh_e=$rh_empleado->mostrarTodoRegistro("cedula='".$rg['cedula_jefe']."'",0,"");
$rh_e=array_shift($rh_e);


?>
<tr>
	<td><?php echo $i?></td>
    <td><?php echo $rh_e['nombre']?></td>
    <td><?php echo $rec_c['descripcion']?></td>

    <td><a href="grupos de evaluacion/modificar.php?codigo_grupo=<?php echo $rg['codigo_grupo']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
