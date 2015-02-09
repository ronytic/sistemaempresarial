<?php 
include_once("../../login/check.php");
$folder="../../";
$titulo="Datos del Reclutamiento";

include_once("../../estructurabd/rec_area_usuario.php");

include_once("../../estructurabd/rec_area.php");
include_once("../../estructurabd/rec_planta.php");
include_once("../../estructurabd/rec_cargo.php");
include_once("../../estructurabd/rec_bateria.php");

include_once("../../estructurabd/rec_reclutamiento.php");
include_once("../../estructurabd/rec_recluta_candidato.php");
include_once("../../estructurabd/rec_candidato.php");
$rec_recluta_candidato=new rec_recluta_candidato;
$rec_candidato=new rec_candidato;
$rec_reclutamiento=new rec_reclutamiento;
$rec_area=new rec_area;
$rec_planta=new rec_planta;
$rec_cargo=new rec_cargo;
$rec_bateria=new rec_bateria;
if(!isset($rec_area_usuario)){
	$rec_area_usuario=new rec_area_usuario;	
}

$login=$_SESSION['login'];
$cod_recluta=$_GET['cod_recluta'];
$condicion="cod_recluta  LIKE '$cod_recluta' ";



$rec_r=$rec_reclutamiento->mostrarTodoRegistro($condicion,0);
$rec_r=array_shift($rec_r);
switch($rec_r['prioridad']){
	case "A":{$prioridad="Alta";}
	case "M":{$prioridad="Media";}
	case "B":{$prioridad="Baja";}
}
switch($rec_r['estado']){
	case "A":{$estado="Activo";}
	case "C":{$estado="Cerrado";}
}

$condicion="cod_recluta  LIKE '$cod_recluta' ";
$rec_r_c=$rec_recluta_candidato->mostrarTodoRegistro($condicion,0,"cedula");

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);


$rc=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$rec_r['cod_cargo']."'",0);
$rc=array_shift($rc);
$ra=$rec_area->mostrarTodoRegistro("cod_area='".$rec_r['cod_area']."'",0);
$ra=array_shift($ra);
$rp=$rec_planta->mostrarTodoRegistro("cod_planta='".$rec_r['cod_planta']."'",0);
$rp=array_shift($rp);
$rb=$rec_bateria->mostrarTodoRegistro("cod_bateria='".$rec_r['cod_bateria']."'",0);
$rb=array_shift($rb);
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<a href="javascript:history.back()" class="btn btn-xs">Volver</a>
<table class="table table-bordered table-hover table-striped">

		<thead>
        	<th colspan="1" width="200">Datos</th>
        </thead>
        <tr><td><strong>Cargo</strong></td><td><?php echo $rec_r['cod_cargo']?> - <?php echo $rc['descripcion']?></td></tr>
        <tr><td><strong>Area</strong></td><td><?php echo $rec_r['cod_area']?> - <?php echo $ra['descripcion']?></td></tr>
        <tr><td><strong>Planta</strong></td><td><?php echo $rec_r['cod_planta']?> - <?php echo $rp['descripcion']?></td></tr>
        <tr><td><strong>Bateria</strong></td><td><?php echo $rec_r['cod_bateria']?> - <?php echo $rb['descripcion']?></td></tr>
        <tr><td><strong>Fecha de Inicio</strong></td><td><?php echo date("d-m-Y",strtotime($rec_r['fecha_inicio']))?></td></tr>
        <tr><td><strong>Fecha Límite</strong></td><td><?php echo  date("d-m-Y",strtotime($rec_r['fecha_limite']))?></td></tr>
        <tr><td><strong>Prioridad</strong></td><td><?php echo $prioridad?></td></tr>
        <tr><td><strong>Estado</strong></td><td><?php echo $estado?></td></tr>
        <tr><td><strong>Responsable</strong></td><td><?php echo $rec_r['responsable']?></td></tr>
         <tr class="success"><td><strong>Cantidad de Cantidatos</strong></td><td><strong><?php echo count($rec_r_c)?></strong></td></tr>
</table>

<fieldset>
	<legend>Candidatos</legend>
    <a href="nuevo_candidato.php?cod_recluta=<?php echo $cod_recluta?>" class="btn btn-danger btn-xs">Nuevo Candidato</a>
    <a href="listar_candidato.php?cod_recluta=<?php echo $cod_recluta?>" class="btn btn-success btn-xs">Agregar Candidato ya Existente</a>
    <form action="comparar.php" method="get">
    	<input type="hidden" name="cod_recluta" value="<?php echo $cod_recluta?>">
    
    <table class="table table-bordered table-hover table-striped">
    	<thead>
        	<th width="50">N</th><th>Cedula</th><th>Paterno</th><th>Materno</th><th>Nombres</th><th></th><th width="90"><input type="submit" value="Comparar" class="btn btn-xs btn-warning"></th>
        </thead>
    <?php foreach($rec_r_c as $rrc){$i++;
	$rec_c=$rec_candidato->mostrarTodoRegistro("cedula='".$rrc['cedula']."'",0);
	$rec_c=array_shift($rec_c);
	?>
    	<tr>
        	<td><?php echo $i?></td>
        	<td><?php echo $rec_c['cedula']?></td>
            <td><?php echo $rec_c['paterno']?></td>
            <td><?php echo $rec_c['materno']?></td>
            <td><?php echo $rec_c['nombre']?></td>
            <td><a href="ver_candidato.php?cedula=<?php echo $rec_c['cedula']?>" class="btn btn-info btn-xs">Ver Datos</a>
            <a href="ver_respuesta.php?cedula=<?php echo $rec_c['cedula']?>&cod_recluta=<?php echo $cod_recluta?>" class="btn btn-success btn-xs">Pruebas</a>
            </td>
            <td class="centrar">
            <input type="checkbox" name="cedulas[]" value="<?php echo $rec_c['cedula']?>">
            </td>
        </tr>
    <?php	
	}?>
    </table>
    </form>
</fieldset>
<?php include_once("../../pie.php");?>
<script language="javascript">
	$(document).on("ready",function(){
		$(".formulario").submit();
	});
	$("select[name=cod_area],select[name=estado]").change(function(e) {
        $(".formulario").submit();
    });
</script>