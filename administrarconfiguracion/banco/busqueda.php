<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_banco=new rec_banco;
$condicion="cod_banco  LIKE '%$cod_banco' and cod_empresa  LIKE '%$cod_empresa' and pregunta LIKE '%$pregunta%' ";

$rec_b=$rec_banco->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th>Nº</th><th>Código</th><th>Nro</th><th>Pregunta</th>
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

    <td><a href="banco/modificar.php?codigo_banco=<?php echo $rb['codigo_banco']?>" class="btn btn-xs btn-warning cargarajax">M</a>
<!--<a href="eliminar.php?cod_empresa=<?php echo $se['cod_empresa']?>" class="btn btn-xs btn-primary">E</a>--></td></tr>
<?php
}
?>

</table>
<?php
