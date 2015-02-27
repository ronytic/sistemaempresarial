<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
if($cod_tipo=="CLE"){
	$cod_banco="CLE";
}
if($cod_tipo=="SER"){
	$cod_banco="SER";
}
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"cod_tipo"=>"'$cod_tipo'",
				"cod_banco"=>"'$cod_banco'",
				"descripcion"=>"'$descripcion'",
				"detalle"=>"'$detalle'",
				"tiempo"=>"'$tiempo'",
				);
$rec_prueba=new rec_prueba;
$rec_prueba->actualizarRegistro($valores,"cod_prueba='$cod_prueba'");

header("Location:../?c=pruebas");
?>