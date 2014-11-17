<?php 
include_once("../../login/check.php");
$folder="../../";
$cedula=$_GET['cedula'];
include_once("../../estructurabd/rec_candidato.php");
$titulo="Datos del Cantidato";

$rec_candidato=new rec_candidato;
$condicion="cedula  LIKE '$cedula'";

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
$rec_c=array_shift($rec_c);


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
        <tr><td><strong>Cédula</strong></td><td><?php echo $rec_c['cedula']?></td></tr>
        <tr><td><strong>Paterno</strong></td><td><?php echo $rec_c['paterno']?></td></tr>
        <tr><td><strong>Materno</strong></td><td><?php echo $rec_c['materno']?></td></tr>
        <tr><td><strong>Nombres</strong></td><td><?php echo $rec_c['nombre']?></td></tr>
        
        <tr><td><strong>Fecha de Nacimiento</strong></td><td><?php echo date("d-m-Y",strtotime($rec_c['fecha_nac']))?></td></tr>
        <tr><td><strong>Ciudad de Nacimiento</strong></td><td><?php echo  $rec_c['ciudad_nac']?></td></tr>
        <tr><td><strong>Pais de Nacimiento</strong></td><td><?php echo $rec_c['pais_nac']?></td></tr>
        <tr><td><strong>Dirección</strong></td><td><?php echo $rec_c['direccion']?></td></tr>
        <tr><td><strong>Teléfono</strong></td><td><?php echo $rec_c['telefono']?></td></tr>
        <tr><td><strong>Correo Electronico</strong></td><td><?php echo $rec_c['mail']?></td></tr>
        <tr><td><strong>Foto</strong></td><td><?php
        	if($rec_c['foto']!=""){
			?><a href="../../imagenes/candidato/<?php echo $rec_c['foto']?>" target="_blank"><img src="../../imagenes/candidato/<?php echo $rec_c['foto']?>" width="150" class="img-polaroid"></a><?php	
			}
		?></td></tr>

</table>


<?php include_once("../../pie.php");?>
<script language="javascript">
	$(document).on("ready",function(){
		$(".formulario").submit();
	});
	$("select[name=cod_area],select[name=estado]").change(function(e) {
        $(".formulario").submit();
    });
</script>