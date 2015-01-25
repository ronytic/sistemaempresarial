<?php 
$folder="../../../";
include_once("../../login/check.php");
include_once("../../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
//print_r($_SESSION);
$titulo="Reclutamiento";
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<?php
echo "<pre>";
print_r($_SESSION);
print_r($_POST);
echo "</pre>";
if($_GET['r']){
	?>
    <h2>¿Desea comenzar la Prueba?</h2>
    <a href="#" class="btn btn-success">Comenzar</a>
    <?php	
}else{
	?>
    <h2>Usted ya realizó la Prueba</h2>
    <a href="listar.php" class="btn btn-danger">Buscar Nuevo Reclutamiento</a>
    <?php	
}
?>
<?php include_once("../../pie.php");?>
