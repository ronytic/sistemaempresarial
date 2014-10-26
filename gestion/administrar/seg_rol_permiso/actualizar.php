<?php
include_once("../../../estructurabd/seg_rol_permiso.php");
extract($_POST);
$valores=array(
				"cod_rol"=>"'$cod_rol'",
				"cod_empresa"=>"'$cod_empresa'",
				"cod_sistema"=>"'$cod_sistema'",
				"cod_permiso"=>"'$cod_permiso'",
				"accede"=>"'$accede'",
				);
$seg_rol_permiso=new seg_rol_permiso;
$seg_rol_permiso->actualizarRegistro($valores,"cod_rp='$cod_rp'");

header("Location:../?c=Seg_rol_permiso");
?>