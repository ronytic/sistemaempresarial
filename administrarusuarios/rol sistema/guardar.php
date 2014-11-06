<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_rol.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_sistema"=>"'$cod_sistema'",
				"cod_rol"=>"'$cod_rol'",
				"descripcion"=>"'$descripcion'",

				);
$rec_rol=new rec_rol;
$rec_rol->insertarRegistro($valores,0);

header("Location:../?c=rol sistema");
?>