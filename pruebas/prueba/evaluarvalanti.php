<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_banco_serie_respuestas.php");
$rec_banco_serie_respuestas=new rec_banco_serie_respuestas;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_serie.php");
$rec_banco_serie=new rec_banco_serie;

include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

$cedula=$_SESSION['cedula'];
$cod_planta=$_SESSION['cod_planta'];
$cod_recluta=$_SESSION['cod_recluta'];
$pruebas=$_SESSION['pruebas'];
$cod_empresa=$_SESSION['cod_empresa'];
/*echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
$pruebaactual=array_shift($pruebas);
$orden_prueba=array_shift(array_keys($pruebaactual));

$cod_prueba=$_POST['cod_prueba'];
$cod_banco=$_POST['cod_banco'];
$r=$_POST['r'];
$rec_c=$rec_candidato->mostrarTodoRegistro("cedula='$cedula'",0);
$rec_c=array_shift($rec_c);

$rec_p=$rec_prueba->mostrarTodoRegistro("cod_prueba='$cod_prueba'",0);
$rec_p=array_shift($rec_p);

$rec_b_s=$rec_banco_serie_respuestas->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and cod_recluta='$cod_recluta' and cod_prueba='$cod_prueba' and cedula='$cedula'",0,"");	

if(count($rec_b_s)>0){
	$mensaje[]="Usted Ya se Realizó esta Prueba";	
	$sw=1;
}else{
	$mensaje[]="Evaluación Registrada Correctamente";	
	$sw=0;
}
if(count($r)>0){
	foreach($r as $nro=>$respuesta){
		$rec_b=$rec_banco_serie->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and  codigo_banco_serie='$nro'",0,"orden");	
		$rec_b=array_shift($rec_b);
		$correcta=$rec_b['respuesta'];
		if($correcta==$respuesta){
			$escorrecta="S";
		}else{
			$escorrecta="N";
		}
		
		$valores=array("cod_empresa"=>"'$cod_empresa'",
						"cod_recluta"=>"'$cod_recluta'",
						"cod_prueba"=>"'$cod_prueba'",
						"codigo_banco_serie"=>"'$nro'",
						"respuesta"=>"'$respuesta'",
						"escorrecta"=>"'$escorrecta'",
						"cedula"=>"'$cedula'",
		
		);

		$rec_b_c=$rec_banco_serie_respuestas->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and cod_recluta='$cod_recluta' and cod_prueba='$cod_prueba'",0,"");	
		$rec_b_c=array_shift($rec_b_c);
		if($sw==0){
			$rec_banco_serie_respuestas->insertarRegistro($valores,0);
			
		}

		/*echo "<pre>";
		print_r($valores);
		echo "</pre>";*/
	}
	//if($sw==0){
		$_SESSION['pruebas']=$pruebas;
	//}
}else{
		
}

if(count($_SESSION['pruebas'])>0){
	$Archivo="index.php";	
	$TextoBoton="Continuar con la Prueba";
}
else{
	$Archivo="terminar.php";
	$TextoBoton="Terminar la Prueba";
}

/*
echo "<pre>";
print_r($_SESSION);
print_r($_POST);
print_r($pruebaactual);
print_r($_SESSION);
echo $k;
echo $v;
echo "</pre>";
*/


$titulo="Prueba de ".$rec_p['descripcion'];

include_once("../cabecerahtml.php");
include_once("../cabecera.php");
?>
<table class="table table-bordered">
<thead><tr>
<th>Cédula de Identidad</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>

<?php /*echo "<pre>";
print_r($_SESSION);
print_r($_POST);
echo "</pre>";*/
?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5>Mensaje</h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            		<h3><strong><?php echo $mensaje[0]?></strong></h3>
            
					<a class="btn btn-success btn-xm" href="<?php echo $Archivo?>"><?php echo $TextoBoton?></a>
			
			</div>
        </div>
    </div>
</div>

	 
<?php
include_once("../pie.php");
?>