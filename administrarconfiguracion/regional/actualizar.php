<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",

				);
$rec_planta=new rec_planta;
$rec_planta->actualizarRegistro($valores,"codigo_planta='$codigo_planta'");

header("Location:../?c=regional");
?>