<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria_prueba.php");

include_once("../../estructurabd/rec_prueba.php");
$rec_bateria_prueba=new rec_bateria_prueba;
$rec_prueba=new rec_prueba;
if($_GET['login']!=""){
	$login=$_GET['login'];
}

extract($_POST);



$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];

$condicion="cod_empresa='$cod_empresa'";

$rec_b_p=$rec_bateria_prueba->mostrarTodoRegistro($condicion,1,"orden");
?>
<table class="table table-bordered table-hover">
<thead>
<tr><th width="50">Nº</th><th>Planta</th><th class="centrar" width="100">Orden</th><th width="50"></th></tr>
</thead>
<?php
$i=0;
foreach($rec_b_p as $rbp){$i++;
$rp=$rec_prueba->mostrarTodoRegistro("cod_prueba='".$rbp['cod_prueba']."'",0,"");
$rp=array_shift($rp);
?>
<tr>
	<td><?php echo $i?></td>

    <td><?php echo $rbp	['cod_prueba']?> - <?php echo $rp['descripcion']?></td>
    <td class="centrar"><?php echo $rbp	['orden']?></td>
    <td><a href="bateria/eliminar_prueba.php?cod_rec_bateria_prueba=<?php echo $rbp['cod_rec_bateria_prueba']?>" class="btn btn-xs btn-danger cargarajax" title="Eliminar">E</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
