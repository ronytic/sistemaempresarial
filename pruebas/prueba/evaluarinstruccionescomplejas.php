<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_banco_inst_respuestas.php");
$rec_banco_inst_respuestas=new rec_banco_inst_respuestas;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_resultados.php");
$rec_banco_resultados=new rec_banco_resultados;

include_once("../../estructurabd/rec_banco_inst.php");
$rec_banco_inst=new rec_banco_inst;

include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

$cedula=$_SESSION['cedula'];
$cod_planta=$_SESSION['cod_planta'];
$cod_recluta=$_SESSION['cod_recluta'];
$pruebas=$_SESSION['pruebas'];
$cod_empresa=$_SESSION['cod_empresa'];
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

$pruebaactual=array_shift($pruebas);
$orden_prueba=array_shift(array_keys($pruebaactual));

$cod_prueba=$_POST['cod_prueba'];
$cod_banco=$_POST['cod_banco'];
$r=$_POST['r'];
$rec_c=$rec_candidato->mostrarTodoRegistro("cedula='$cedula'",0);
$rec_c=array_shift($rec_c);

$rec_p=$rec_prueba->mostrarTodoRegistro("cod_prueba='$cod_prueba'",0);
$rec_p=array_shift($rec_p);

//$rec_b_s=$rec_banco_serie_respuestas->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and cod_recluta='$cod_recluta' and cod_prueba='$cod_prueba' and cedula='$cedula'",0,"");	

if(count($rec_b_s)>0){
	$mensaje[]="Usted Ya se Realizó esta Prueba";	
	$sw=1;
}else{
	$mensaje[]="Evaluación Registrada Correctamente";	
	$sw=0;
}
$correctos=0;
$incorrectos=0;
if(count($r)>0){
	foreach($r as $nro=>$respuesta){
		$rec_b=$rec_banco_inst->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and  codigo_inst='$nro'",0,"");	
		$rec_b=array_shift($rec_b);
		$correcta=$rec_b['respuesta'];
		$a=array();
        foreach($respuesta as $k=>$v){
            $a[$k]=$k;    
        }
        //$a=$respuesta;  // Donde buscar

        $b=explode(",",$correcta);// a Buscar
        
        /*echo "<pre>";
		print_r($a);
		echo "</pre>";
        
        echo "<pre>";
		print_r($b);
		echo "</pre>";
        
        echo "<pre>";
		print_r(array_intersect($b, $a));
		echo "</pre>";*/
        
        if(count(array_intersect($a, $b)) == count($a)){
         //$array1 está contenido completamente en $array2
            //echo "Si"."<br>";
            $escorrecta="1";
            $correctos++;
        }else{
            //echo "No"."<br>";
            $escorrecta="0";
            $incorrectos++;
        }
		
		$valores=array("cod_empresa"=>"'$cod_empresa'",
						"cod_recluta"=>"'$cod_recluta'",
						"cod_prueba"=>"'$cod_prueba'",
						"codigo_inst"=>"'$nro'",
						"correcta"=>"'$escorrecta'",
						"cedula"=>"'$cedula'",
		
		);

		if($sw==0){
			$rec_banco_inst_respuestas->insertarRegistro($valores,0);
			
		}

		/*echo "<pre>";
		print_r($valores);
		echo "</pre>";*/
	}
	//if($sw==0){
		$_SESSION['pruebas']=$pruebas;
	//}
     $rec_b=$rec_banco_inst->mostrarTodoRegistro("",0,"");	
    $total=count($rec_b);
    $incorrectos=$total-$correctos;
    $porcentaje=number_format($correctos*100/$total,2,".",",");
    $valor=array("cod_empresa"=>"'$cod_empresa'",
						"cod_recluta"=>"'$cod_recluta'",
						"cod_prueba"=>"'$cod_prueba'",
						"correstas"=>"'$correctos'",
						"incorrectas"=>"'$incorrectos'",
						"total"=>"'$total'",
                        "porcentaje"=>"'$porcentaje'",
						"cedula"=>"'$cedula'",);
    /*echo "<pre>";
    print_r($valor);
    echo "</pre>";*/
    $rec_banco_resultados->insertarRegistro($valor,0);
}else{
	//	
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
<?php /*
<table class="table table-bordered">
<thead><tr>
<th>Cédula de Identidad</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>*/?>

<?php /*echo "<pre>";
print_r($_SESSION);
print_r($_POST);
echo "</pre>";*/
?>
<div class="col-sm-offset-3 col-sm-6">
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