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
$titulo="";
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
<?php
if($_GET['r']){
	?>
    <center>
        <div  style="background-color:#FFF">
        <img src="../../../imagenes/pruebasinicio/prueba01.jpg" class="img-polaroid">
        
        </div>
        <div class="">
        <a href="../../prueba/" class="btn btn-danger">Iniciar</a>
        </div>
    </center>
    
    
    <?php
}else{
?>
<h2>Usted ya realizó la Prueba</h2>
    <center>
    <div>
    <a href="listar.php" class="btn btn-danger">Buscar Nuevo Reclutamiento</a>
    </div>
    </center>
<?php    
}
?>

<?php include_once("../../pie.php");?>
