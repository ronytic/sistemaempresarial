<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_planta"=>"'$cod_planta'",
				"descripcion"=>"'$descripcion'",

				);
$rec_planta=new rec_planta;
$rec_planta->insertarRegistro($valores,0);

header("Location:../?c=regional");
?>