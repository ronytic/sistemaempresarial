<?php 
include_once("../../login/check.php");
$folder="../../";
$cedulas=$_GET['cedulas'];
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
foreach($cedulas as $cedula){
	$condicion="cedula  LIKE '$cedula'";
	$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
	$rec_c=array_shift($rec_c);
	$datoscandidato[$cedula]=$rec_c;
}
//print_r($datoscandidato);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_recluta=$_GET['cod_recluta'];

$rec_r=$rec_reclutamiento->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_recluta='$cod_recluta'",0);
$rec_r=array_shift($rec_r);

$cod_bateria=$rec_r['cod_bateria'];
$rec_b_p=$rec_bateria_prueba->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_bateria='$cod_bateria'",0);
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
        <tr><td><strong>Cédula</strong></td>
        	<?php foreach($cedulas as $cedula){?>
        	<td width="50"><?php echo $datoscandidato[$cedula]['cedula']?></td>
            <?php }?>
            </tr>
        <tr><td><strong>Paterno</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo $datoscandidato[$cedula]['paterno']?></td>
            <?php }?>
        </tr>
        <tr><td><strong>Materno</strong></td>
        	<?php foreach($cedulas as $cedula){?>
        	<td><?php echo $datoscandidato[$cedula]['materno']?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Nombres</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo $datoscandidato[$cedula]['nombre']?></td>
        	<?php }?>
        </tr>
        
        <tr><td><strong>Fecha de Nacimiento</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo date("d-m-Y",strtotime($datoscandidato[$cedula]['fecha_nac']))?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Ciudad de Nacimiento</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo  $datoscandidato[$cedula]['ciudad_nac']?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Pais de Nacimiento</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo $datoscandidato[$cedula]['pais_nac']?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Dirección</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo $datoscandidato[$cedula]['direccion']?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Teléfono</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo $datoscandidato[$cedula]['telefono']?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Correo Electronico</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php echo $datoscandidato[$cedula]['mail']?></td>
        	<?php }?>
        </tr>
        <tr><td><strong>Foto</strong></td>
        	<?php foreach($cedulas as $cedula){?><td><?php
        	if($datoscandidato[$cedula]['foto']!=""){
			?><a href="../../imagenes/candidato/<?php echo $datoscandidato[$cedula]['foto']?>" target="_blank"><img src="../../imagenes/candidato/<?php echo $datoscandidato[$cedula]['foto']?>" width="150" class="img-polaroid"></a><?php	
			}
		?></td>
        	<?php }?>
        </tr>
		<thead>
        	<tr>
        		<th colspan="1" width="200">Resultado de la Pruebas</th>
            </tr>
            
        </thead>
        <?php
		$total=0;
        foreach($rec_b_p as $rbp){$i++;
			$cod_prueba=$rbp['cod_prueba'];
			$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='".$cod_prueba."'",0);
			$rec_p=array_shift($rec_p);
			
			$rec_b_p=$rec_banco_preguntas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_banco='".$rec_p['cod_banco']."'",0);
			
			foreach($cedulas as $cedula){
				$datos[$cedula]['i']=$i;
				$rec_b_c=$rec_banco_candidato->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_banco='".$rec_p['cod_banco']."' and cod_prueba='$cod_prueba' and cod_recluta='$cod_recluta' and escorrecta='S' and cedula='$cedula'",0);
				$datos[$cedula]['cantidadTotal']=count($rec_b_p);
				$datos[$cedula]['correctas']=count($rec_b_c);
				$datos[$cedula]['porcentaje']=number_format($datos[$cedula]['correctas']*100/$datos[$cedula]['cantidadTotal'],2);
				$datos[$cedula]['total']+=$datos[$cedula]['porcentaje'];
			}
			?>

            <thead>
			<tr>
                <th class="resaltar" colspan="1"><?php echo  $i?> - <?php echo $rec_p['descripcion']?>
                </th>
                <?php foreach($cedulas as $cedula){?>
				<th><a href="ver_respuesta_detalle.php?cedula=<?php echo $cedula?>&cod_recluta=<?php echo $cod_recluta?>&cod_prueba=<?php echo $cod_prueba?>" class="btn btn-xs btn-info">Ver Detalle de Respuestas</a></th>
                <?php }?>
            </tr>
            </thead>
            <tr>
                <td class="resaltar" colspan="1">Total de Preguntas</td>
                <?php foreach($cedulas as $cedula){?>
                <td class="centrar"><?php echo $datos[$cedula]['cantidadTotal']?></td>
                <?php }?>
            </tr>
            <tr>
                <td class="resaltar" colspan="1">Preguntas Correctas</td>
                <?php foreach($cedulas as $cedula){?>
                <td class="centrar" ><?php echo $datos[$cedula]['correctas']?></td>
                <?php }?>
            </tr>
            <tr>
            	<td class="resaltar" colspan="1">Porcentaje Obtenido</td>
                <?php foreach($cedulas as $cedula){?>
                <td class="centrar" colspan="1"><?php echo $datos[$cedula]['porcentaje']?> %</td>
                <?php }?>
            </tr>
            <?php
		}
			foreach($cedulas as $cedula){
			$datos[$cedula]['promedio']=$datos[$cedula]['total']/$i;
			$datos[$cedula]['promedio']=number_format($datos[$cedula]['promedio'],2);
			}
		?>

        <tr class="success">
        	<td class="resaltar" colspan="1">Promedio Total Obtenido</td>
            <?php foreach($cedulas as $cedula){?>
            <td class="centrar" colspan="1"><?php echo $datos[$cedula]['promedio']?> %</td>
			<?php }?>
        </tr>
</table>
<?php include_once("../../pie.php");?>
<script language="javascript">
</script>