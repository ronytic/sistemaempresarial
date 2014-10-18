<?php
include_once("../../../estructurabd/seg_permiso.php");
extract($_POST);
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",
				);
$seg_permiso=new seg_permiso;
$seg_permiso->insertarRegistro($valores,0);

header("Location:../?c=Seg_permiso");
?>