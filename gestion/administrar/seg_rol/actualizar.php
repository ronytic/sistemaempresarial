<?php
include_once("../../../estructurabd/seg_rol.php");
extract($_POST);
$valores=array(	
				"descripcion"=>"'$descripcion'",
				"cod_empresa"=>"'$cod_empresa'",

				);
$seg_rol=new seg_rol;
$seg_rol->actualizarRegistro($valores,"cod_rol='$cod_rol'");

header("Location:../?c=Seg_rol");
?>