<?php
include_once("../../../estructurabd/seg_empresa.php");
extract($_POST);
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"descripcion"=>"'$descripcion'",
				//"direccion"=>"'$direccion'",
				"telefono1"=>"'$telefono1'",
				"telefono2"=>"'$telefono2'",

				);
$seg_empresa=new seg_empresa;
$seg_empresa->insertarRegistro($valores,0);

header("Location:../?c=Seg_empresa");
?>