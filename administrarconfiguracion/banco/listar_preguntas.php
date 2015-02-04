<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco_preguntas.php");
extract($_POST);
if($_POST['cod_banco']==""){
$cod_banco=$_SESSION['cod_banco'];	
}

$cod_empresa=$_SESSION['cod_empresa'];
$rec_banco_preguntas=new rec_banco_preguntas;
$condicion="cod_banco LIKE '$cod_banco' and cod_empresa  LIKE '$cod_empresa' ";

$rec_b=$rec_banco_preguntas->mostrarTodoRegistro($condicion,0,"nro");
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Nro</th><th>Pregunta</th><th>Opción 1</th><th>Opción 2</th><th>Opción 3</th><th>Opción 4</th><th>Opción 5</th><th>Correcta</th>
<th></th></tr>
</thead>
<?php
$i=0;
foreach($rec_b as $rb){$i++;
?>
<tr>
	<td width="10"><?php echo $i?></td>
    <td><?php echo $rb['cod_banco']?></td>
	<td><?php echo $rb['nro']?></td>
    <td><?php echo $rb['pregunta']?></td>
    <td width="80"><?php echo $rb['opcion1']?></td>
    <td width="80"><?php echo $rb['opcion2']?></td>
    <td width="80"><?php echo $rb['opcion3']?></td>
    <td width="80"><?php echo $rb['opcion4']?></td>
    <td width="80"><?php echo $rb['opcion5']?></td>
    <td class="centrar"><?php echo $rb['correcta']?></td>

    <!--<td><a href="banco/modificar.php?codigo_banco=<?php echo $rb['codigo_banco']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a></td>--></tr>
<?php
}
?>

</table>
<?php
