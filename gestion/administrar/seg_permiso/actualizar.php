<?php
include_once("../../../estructurabd/seg_permiso.php");
extract($_POST);
$valores=array(	
				"descripcion"=>"'$descripcion'",
				"cod_sistema"=>"'$cod_sistema'",

				);
$seg_permiso=new seg_permiso;
$seg_permiso->actualizarRegistro($valores,"cod_permiso='$cod_permiso'");

header("Location:../?c=seg_permiso");
?>