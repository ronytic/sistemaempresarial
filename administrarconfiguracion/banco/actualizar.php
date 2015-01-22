<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_prueba"=>"'$cod_prueba'",
				"cod_banco"=>"'$cod_banco'",
				"nro"=>"'$nro'",
				"pregunta"=>"'$pregunta'",
				"opcion1"=>"'$opcion1'",
				"opcion2"=>"'$opcion2'",
				"opcion3"=>"'$opcion3'",
				"opcion4"=>"'$opcion4'",
				"opcion5"=>"'$opcion5'",
				"correcta"=>"'$correcta'",

				);
$rec_banco=new rec_banco;
$rec_banco->actualizarRegistro($valores,"codigo_banco='$codigo_banco'");

header("Location:../?c=banco");
?>