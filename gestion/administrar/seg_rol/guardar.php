<?php
include_once("../../../estructurabd/seg_rol.php");
extract($_POST);
$valores=array(
				"cod_rol"=>"'$cod_rol'",
				"cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",
				);
$seg_rol=new seg_rol;
$seg_rol->insertarRegistro($valores,0);

header("Location:../?c=Seg_rol");
?>