<?php 
include_once("../../login/check.php");
$folder="../../";
$titulo="Datos del Reclutamiento";

include_once("../../estructurabd/rec_area_usuario.php");

include_once("../../estructurabd/rec_area.php");

include_once("../../estructurabd/rec_reclutamiento.php");
include_once("../../estructurabd/rec_recluta_candidato.php");
include_once("../../estructurabd/rec_candidato.php");
$rec_recluta_candidato=new rec_recluta_candidato;
$rec_candidato=new rec_candidato;
$rec_reclutamiento=new rec_reclutamiento;
$rec_area=new rec_area;

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
$rec_r_c=$rec_recluta_candidato->mostrarTodoRegistro($condicion,0);

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);

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
        <tr><td><strong>Cargo</strong></td><td><?php echo $rec_r['cod_cargo']?></td></tr>
        <tr><td><strong>Area</strong></td><td><?php echo $rec_r['cod_area']?></td></tr>
        <tr><td><strong>Bateria</strong></td><td><?php echo $rec_r['cod_bateria']?></td></tr>
        <tr><td><strong>Fecha de Inicio</strong></td><td><?php echo date("d-m-Y",strtotime($rec_r['fecha_inicio']))?></td></tr>
        <tr><td><strong>Fecha Límite</strong></td><td><?php echo  date("d-m-Y",strtotime($rec_r['fecha_limite']))?></td></tr>
        <tr><td><strong>Prioridad</strong></td><td><?php echo $prioridad?></td></tr>
        <tr><td><strong>Estado</strong></td><td><?php echo $estado?></td></tr>
        <tr><td><strong>Responsable</strong></td><td><?php echo $rec_r['responsable']?></td></tr>
         <tr class="success"><td><strong>Cantidad de Cantidatos</strong></td><td><strong><?php echo count($rec_r_c)?></strong></td></tr>
</table>

<fieldset>
	<legend>Candidatos</legend>
    <a href="" class="btn btn-danger btn-xs">Nuevo Candidato</a>
    <table class="table table-bordered table-hover table-striped">
    	<thead>
        	<th>N</th><th>Cedula</th><th>Paterno</th><th>Materno</th><th>Nombres</th><th></th>
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
            <td><a href="ver_candidato.php?cedula=<?php echo $rec_c['cedula']?>" class="btn btn-info btn-xs">Ver</a></td>
        </tr>
    <?php	
	}?>
    </table>
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