<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_tipo_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_tipo"=>"'$cod_tipo'",
				"descripcion"=>"'$descripcion'",
				


				);
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_tipo_prueba->insertarRegistro($valores,0);

header("Location:../?c=Tipo de Pruebas");
?>