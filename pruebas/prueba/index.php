<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_preguntas.php");
$rec_banco_preguntas=new rec_banco_preguntas;

$cedula=$_SESSION['cedula'];
$cod_planta=$_SESSION['cod_planta'];
$cod_recluta=$_SESSION['cod_recluta'];
$pruebas=$_SESSION['pruebas'];
$pruebaactual=array_shift($pruebas);
$orden_prueba=array_shift(array_keys($pruebaactual));
$cod_prueba=array_shift($pruebaactual);

$rec_c=$rec_candidato->mostrarTodoRegistro("cedula='$cedula'",0);
$rec_c=array_shift($rec_c);
//$cod_prueba="P12";
$rec_p=$rec_prueba->mostrarTodoRegistro("cod_prueba='$cod_prueba'",0);
$rec_p=array_shift($rec_p);
$cod_banco=$rec_p['cod_banco'];
$rec_b=$rec_banco_preguntas->mostrarTodoRegistro("cod_banco='".$cod_banco."'",0,"nro");
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
 switch($rec_p['cod_tipo']){
		case "EN3":{$archivo="selectiva.php";}break;
		case "CLE":{$archivo="clever.php";}break;
		case "SER":{$archivo="serie.php";}break;
		case "PER":{$archivo="percepcion.php";}break;	
		case "VAL":{$archivo="valanti.php";}break;
        case "CON":{$archivo="concentracion.php";}break;
        case "INC":{$archivo="instruccionescomplejas.php";}break;
	}

$titulo="Prueba de ".$rec_p['descripcion'];
$titulo="";
include_once("../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/core/plugins/jquery.countdowntimer.min.js"></script>
<?php
include_once("../cabecera.php");
/*?>
<table class="table table-bordered">
<thead><tr>
<th>Cédula de Identidad</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>
<?php */?>
<style type="text/css">
.cuadrotiempo{
	width:100px;
	position:fixed;
	top:50px;	
	right:50px;
	z-index:1500;
}
.cuadrotiempo:hover{
	opacity:0.5;	
}
.cuadrotiempo .widget-main{
	text-align:right;	
}
.cuadrotiempo h3{
	margin:0px;	
}
</style>
<script language="javascript" type="text/javascript">
</script>

<div class=" col-sm-9">
            <?php
            //$rec_p['detalle']="";
             if($rec_p['detalle']!=""){?>
            
            <?php echo $rec_p['detalle']?>
            <hr>
            <?php }?>
            <?php
            if($rec_p['grafico']!=""){
			?><a href="../../imagenes/pruebas/<?php echo $rec_p['grafico']?>" target="_blank"><img src="../../imagenes/pruebas/<?php echo $rec_p['grafico']?>" width="100%" class="img-polaroid"></a><?php	
			}
			?>
            <hr>
            <center><a href="<?php echo $archivo?>" class="btn btn-success btn-xm">Iniciar</a></center>
			
</div>
<div class=" col-sm-3">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5>Tiempo de la Prueba</h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            <h3 class="separador"><?php echo $rec_p['tiempo']?> minutos</h3>
            
			</div>
        </div>
    </div>
</div>
<br>
	
    <br>
    
<?php
include_once("../pie.php");

?>
