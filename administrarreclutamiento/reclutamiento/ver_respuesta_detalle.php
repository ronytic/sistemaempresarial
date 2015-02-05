<?php 
include_once("../../login/check.php");
$folder="../../";
$cedula=$_GET['cedula'];
include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_reclutamiento.php");
$rec_reclutamiento=new rec_reclutamiento;

include_once("../../estructurabd/rec_bateria_prueba.php");
$rec_bateria_prueba=new rec_bateria_prueba;

include_once("../../estructurabd/rec_banco_candidato.php");
$rec_banco_candidato=new rec_banco_candidato;

include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;
include_once("../../estructurabd/rec_banco_candidato.php");
$rec_banco_candidato=new rec_banco_candidato;
include_once("../../estructurabd/rec_banco_preguntas.php");
$rec_banco_preguntas=new rec_banco_preguntas;

$titulo="Ver Respuestas de las Pruebas";
$condicion="cedula  LIKE '$cedula'";

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
$rec_c=array_shift($rec_c);

$cod_empresa=$_SESSION['cod_empresa'];
$cod_recluta=$_GET['cod_recluta'];

$rec_r=$rec_reclutamiento->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_recluta='$cod_recluta'",0);
$rec_r=array_shift($rec_r);

$cod_bateria=$rec_r['cod_bateria'];
$rec_b_p=$rec_bateria_prueba->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_bateria='$cod_bateria'",0);

$cod_prueba=$_GET['cod_prueba'];
$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='".$cod_prueba."'",0);
$rec_p=array_shift($rec_p);
			
			
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<a href="javascript:history.back()" class="btn btn-xs">Volver</a>
<table class="table table-bordered table-hover table-striped">

		<thead>
        	<th colspan="1" width="200">Datos del Candidato</th>
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


</table>
<table class="table table-bordered table-hover table-striped">

		<thead>
        	<tr>
        		<th colspan="2" width="200">Resultado de la Prueba - <?php echo $rec_p['descripcion']?></th>
            </tr>
            <tr class="centrar">
        		<th colspan="1" width="50"  class="">N</th><th>Pregunta</th><th>Respuesta Correcta</th><th>Respuesta Seleccionada</th>
            </tr>
        </thead>
        <?php
		$rec_b_p=$rec_banco_preguntas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_banco='".$rec_p['cod_banco']."'",0);
		$contarCorrectos=0;
        foreach($rec_b_p as $rbp){$i++;
			
			
			
			$rec_b_c=$rec_banco_candidato->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_banco='".$rec_p['cod_banco']."' and cod_prueba='$cod_prueba' and cod_recluta='$cod_recluta' and nro='".$rbp['nro']."' and cedula='$cedula'",0);
			$rec_b_c=array_shift($rec_b_c);
			$seleccionada=$rec_b_c['respuesta'];
			if($rec_b_c['escorrecta']=="S"){
				$contarCorrectos++;
				$icono="ok";
				$color="00A608";	
			}else{
				$icono="remove";
				$color="A10002";
			}
			?>
            <tr>
            	<td class="centrar"><?php echo  $rbp['nro']?></td>
                <td><?php echo $rbp['pregunta']?></td>
                <td class="centrar" width="100"><?php echo $rbp['opcion'.$rbp['correcta']]?></td>
                <td class="centrar" width="100"><?php echo $rbp['opcion'.$seleccionada]?></td>
                <td class="centrar" width="50"><span class="icon icon-<?php echo $icono?>" style="color:#<?php echo $color?>"></span></td>
                
            </tr>
            <?php
		}
		?>
        <tr class="resaltar"><td colspan="3" class="der">Total</td><td class="centrar "><?php echo $contarCorrectos?></td><td></td></tr>
</table>
<?php include_once("../../pie.php");?>
<script language="javascript">
</script>