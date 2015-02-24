<?php
include_once("../login/check.php");
$folder="../../";

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;


$cedula=$_SESSION['cedula'];
$cod_planta=$_SESSION['cod_planta'];
$cod_recluta=$_SESSION['cod_recluta'];
$pruebas=$_SESSION['pruebas'];
$cod_empresa=$_SESSION['cod_empresa'];




$cod_prueba=$_POST['cod_prueba'];
$cod_banco=$_POST['cod_banco'];
$r=$_POST['r'];
$rec_c=$rec_candidato->mostrarTodoRegistro("cedula='$cedula'",0);
$rec_c=array_shift($rec_c);

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


$titulo="Conclusión de la Prueba";

include_once("../cabecerahtml.php");
include_once("../cabecera.php");
?>
<table class="table table-bordered">
<thead><tr>
<th>Cédula</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>

<form action="evaluar.php" method="post">
<input type="hidden" name="cod_prueba" value="<?php echo $cod_prueba?>">
<input type="hidden" name="cod_banco" value="<?php echo $cod_banco?>">
<?php 
?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5>Mensaje</h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            		<h3><strong>Prueba realizada con Éxito, se le informará de los resultados posteriormente</strong></h3>
            
					<a class="btn btn-danger btn-xm" href="../login/logout.php">Terminar</a>
			
			</div>
        </div>
    </div>
</div>

	 
<?php
include_once("../pie.php");
?>