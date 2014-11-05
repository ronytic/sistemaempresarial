<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_area.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",

				);
$rec_area=new rec_area;
$rec_area->actualizarRegistro($valores,"codigo_area='$codigo_area'");

header("Location:../?c=areas");
?>