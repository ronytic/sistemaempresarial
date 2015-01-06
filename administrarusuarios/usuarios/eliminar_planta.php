<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta_usuario.php");
extract($_GET);
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(
				"Activo"=>"0",
				);
$rec_planta_usuario=new rec_planta_usuario;
$rec_planta_usuario->actualizarRegistro($valores,"cod_rec_planta_usuario=$cod_rec_planta_usuario");

//header("Location:../?c=usuarios");
?>