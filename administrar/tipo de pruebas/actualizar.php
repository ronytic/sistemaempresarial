<?php
include_once("../../estructurabd/rec_tipo_prueba.php");
extract($_POST);
$valores=array(
				"descripcion"=>"'$descripcion'",

				);
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_tipo_prueba->actualizarRegistro($valores,"cod_tipo='$cod_tipo'");

header("Location:../?c=Tipo de Pruebas");
?>