<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_bateria"=>"'$cod_bateria'",
				"descripcion"=>"'$descripcion'",

				);
$rec_bateria=new rec_bateria;
$rec_bateria->insertarRegistro($valores,0);

header("Location:../?c=bateria");
?>