<?php
include_once("../../../estructurabd/seg_empresa.php");
extract($_POST);
$valores=array(
				"descripcion"=>"'$descripcion'",
				//"direccion"=>"'$direccion'",
				"telefono1"=>"'$telefono1'",
				"telefono2"=>"'$telefono2'",

				);
$seg_empresa=new seg_empresa;
$seg_empresa->actualizarRegistro($valores,"cod_empresa='$cod_empresa'");

header("Location:../?c=Seg_empresa");
?>