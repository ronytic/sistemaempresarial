<?php
include_once("../../../estructurabd/seg_permiso.php");
extract($_POST);
$valores=array(
				"cod_permiso"=>"'$cod_permiso'",
				"cod_sistema"=>"'$cod_sistema'",
				"descripcion"=>"'$descripcion'",
				);
$seg_permiso=new seg_permiso;
$seg_permiso->insertarRegistro($valores,0);

header("Location:../?c=seg_permiso");
?>