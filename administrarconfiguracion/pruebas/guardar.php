<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_prueba"=>"'$cod_prueba'",
				"cod_tipo"=>"'$cod_tipo'",
				"cod_banco"=>"'$cod_banco'",
				"descripcion"=>"'$descripcion'",
				"detalle"=>"'$detalle'",
				"tiempo"=>"'$tiempo'",
				);
$rec_prueba=new rec_prueba;
$rec_prueba->insertarRegistro($valores,0);

header("Location:../?c=pruebas");
?>