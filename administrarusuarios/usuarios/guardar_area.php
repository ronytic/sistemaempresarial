<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_area_usuario.php");
extract($_POST);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(
				"cod_usuario"=>"'$cod_usuario'",
				"login"=>"'$login'",
				"cod_area"=>"'$cod_area'",
				);
$rec_area_usuario=new rec_area_usuario;
$rec_area_usuario->insertarRegistro($valores,0);

include_once("listar_area.php");
?>