<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_area.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_area"=>"'$cod_area'",
				"descripcion"=>"'$descripcion'",

				);
$rec_area=new rec_area;
$rec_area->insertarRegistro($valores,0);

header("Location:../?c=areas");
?>