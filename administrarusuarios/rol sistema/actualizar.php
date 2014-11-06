<?php
include_once("../../login/check.php");
include_once("../../estructurabd/seg_rol.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(	"cod_sistema"=>"'$cod_sistema'",
				"cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",

				);
$seg_rol=new seg_rol;
$seg_rol->actualizarRegistro($valores,"cod_rol='$cod_rol'");

header("Location:../?c=rol sistema");
?>