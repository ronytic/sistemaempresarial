<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"cod_tipo"=>"'$cod_tipo'",
				"descripcion"=>"'$descripcion'",

				);
$rec_prueba=new rec_prueba;
$rec_prueba->actualizarRegistro($valores,"cod_prueba='$cod_prueba'");

header("Location:../?c=pruebas");
?>