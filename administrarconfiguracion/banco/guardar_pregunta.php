<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco_preguntas.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
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
$rec_banco_preguntas=new rec_banco_preguntas;
$rec_banco_preguntas->insertarRegistro($valores,0);
$_SESSION['cod_banco']=$cod_banco;
include_once("listar_preguntas.php");
?>