<?php
include_once("../../../estructurabd/seg_rol.php");
extract($_POST);
$valores=array(	
				"cod_empresa"=>"'$cod_empresa'",
				"cod_sistema"=>"'$cod_sistema'",
				"descripcion"=>"'$descripcion'",

				);
$seg_rol=new seg_rol;
$seg_rol->actualizarRegistro($valores,"cod_rol='$cod_rol'");

header("Location:../?c=seg_rol");
?>