<?php 
$folder="../../../";
include_once("../../login/check.php");
include_once("../../../estructurabd/rec_bateria_prueba.php");
$rec_bateria_prueba=new rec_bateria_prueba;
$rec_b_p=$rec_bateria_prueba->mostrarTodoRegistro($condicion,1,"orden");
$pruebas=array();
foreach($rec_b_p as $rbp){
	array_push($pruebas,array($rbp['orden']=>$rbp['cod_prueba']));
}

include_once("../../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
//print_r($_SESSION);
if($_GET['r']){
	$_SESSION['pruebas']=$pruebas;
}

$titulo="Pruebas de Reclutamiento";
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
/*echo "<pre>";
print_r($_SESSION);
print_r($_POST);
echo "</pre>";*/
?>
<div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5>Mensaje</h5>
            </div>
            <div class="widget-body">
    			<div class="widget-main">
<?php

if($_GET['r']){
	?>
    <h2>¿Desea comenzar la Prueba?</h2>
    <a href="../../prueba/" class="btn btn-success">Iniciar</a>
    <?php	
}else{
	?>
    <h2>Usted ya realizó la Prueba</h2>
    <a href="listar.php" class="btn btn-danger">Buscar Nuevo Reclutamiento</a>
    <?php	
}
?>
                </div>
			</div>
        </div>
    </div>
<?php include_once("../../pie.php");?>
