<?php
include_once("../../../estructurabd/seg_permiso.php");
extract($_POST);
$valores=array(	
				"descripcion"=>"'$descripcion'",
				"cod_empresa"=>"'$cod_empresa'",

				);
$seg_permiso=new seg_permiso;
$seg_permiso->actualizarRegistro($valores,"cod_permiso='$cod_permiso'");

header("Location:../?c=Seg_permiso");
?>