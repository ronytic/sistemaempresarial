<?php
include_once("../../../estructurabd/seg_rol_permiso.php");
extract($_POST);
$valores=array(
				"cod_rol"=>"'$cod_rol'",
				"cod_permiso"=>"'$cod_permiso'",
				//"descripcion"=>"'$descripcion'",
				);
$seg_rol_permiso=new seg_rol_permiso;
$seg_rol_permiso->actualizarRegistro($valores,"cod_rp='$cod_rp'");

header("Location:../?c=Seg_rol_permiso");
?>