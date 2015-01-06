<?php
include_once("../../login/check.php");
$titulo="asd";
include_once("../../estructurabd/rec_reclutamiento.php");
include_once("../../estructurabd/rec_cargo.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_reclutamiento=new rec_reclutamiento;
$rec_cargo=new rec_cargo;
$condicion="cod_planta  LIKE '$cod_planta' and cod_empresa  LIKE '%$cod_empresa' and estado='$estado' ";

$rec_c=$rec_reclutamiento->mostrarTodoRegistro($condicion,0);
?>
<table class="table table-bordered  table-hover">
<thead>
<tr><th width="10">Nº</th><th>Cargo</th>
<?php /*?>
<th>Código Área</th><th>Código Bateria</th><th>Fecha Inicio</th><th>Fecha Limite</th><th>Responsable</th><?php */?><th width="10">Prioridad</th><th width="20"></th>
</tr>
</thead>
<?php
$i=0;
if(count($rec_c)<=0){
	?>
    <tr><td colspan="4"><?php echo "No existen reclutamiento registrados";	?></td></tr>
	
    <?php
}else{
foreach($rec_c as $rc){$i++;
switch($rc['prioridad']){
	case "A":{$color="danger";}break;	
	case "M":{$color="warning";}break;	
	case "B":{$color="success";}break;	
}

$rec_ca=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$rc['cod_cargo']."'",0);
$rec_ca=array_shift($rec_ca);
?>
<tr class="<?php echo $color;?>">
	<td class="der"><?php echo $i?></td>
    <td><?php echo $rec_ca['descripcion']?></td>
    <?php /*?>
    <td><?php echo $rc['cod_area']?></td>
    <td><?php echo $rc['cod_bateria']?></td>
    <td><?php echo $rc['fecha_inicio']?></td>
    <td><?php echo $rc['fecha_limite']?></td>
    <td><?php echo $rc['responsable']?></td>
    <?php */?>
	<td><?php echo $rc['prioridad']?></td>
    <td><a href="ver.php?cod_recluta=<?php echo $rc['cod_recluta']?>" class="btn btn-info btn-xs">Ver</a></td>
    </tr>
<?php
}
}
?>

</table>
<?php
