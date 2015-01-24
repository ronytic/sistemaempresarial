<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria_prueba.php");
extract($_POST);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"cod_bateria"=>"'$cod_bateria'",
				"cod_prueba"=>"'$cod_prueba'",
				"orden"=>"'$orden'",
				"Activo"=>"1",
				);
$rec_bateria_prueba=new rec_bateria_prueba;
$rec_bateria_prueba->insertarRegistro($valores,0);

include_once("listar_pruebas.php");
?>