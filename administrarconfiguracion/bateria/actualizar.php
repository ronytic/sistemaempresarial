<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",

				);
$rec_bateria=new rec_bateria;
$rec_bateria->actualizarRegistro($valores,"codigo_bateria='$codigo_bateria'");

header("Location:../?c=bateria");
?>