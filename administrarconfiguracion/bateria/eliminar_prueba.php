<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria_prueba.php");
extract($_GET);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(
				"Activo"=>"0",
				);
$rec_bateria_prueba=new rec_bateria_prueba;
$rec_bateria_prueba->actualizarRegistro($valores,"cod_rec_bateria_prueba=$cod_rec_bateria_prueba");

//header("Location:../?c=usuarios");
?>