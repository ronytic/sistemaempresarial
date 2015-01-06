<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta_usuario.php");
extract($_POST);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(
				"cod_usuario"=>"'$cod_usuario'",
				"login"=>"'$login'",
				"cod_planta"=>"'$cod_planta'",
				);
$rec_planta_usuario=new rec_planta_usuario;
$rec_planta_usuario->insertarRegistro($valores,0);

include_once("listar_planta.php");
?>