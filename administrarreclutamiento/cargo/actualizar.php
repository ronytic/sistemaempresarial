<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_cargo.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",

				);
$rec_cargo=new rec_cargo;
$rec_cargo->actualizarRegistro($valores,"codigo_cargo='$codigo_cargo'");

header("Location:../?c=cargo");
?>