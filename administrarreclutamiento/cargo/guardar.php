<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_cargo.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_cargo"=>"'$cod_cargo'",
				"descripcion"=>"'$descripcion'",
                "cod_bateria"=>"'$cod_bateria'",
				);
$rec_cargo=new rec_cargo;
$rec_cargo->insertarRegistro($valores,0);

header("Location:../?c=cargo");
?>