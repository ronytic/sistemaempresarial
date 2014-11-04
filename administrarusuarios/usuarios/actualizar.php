<?php
include_once("../../login/check.php");
include_once("../../estructurabd/seg_usuario.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"cod_sistema"=>"'$cod_sistema'",
				"login"=>"'$login'",
				"nombre"=>"'$nombre'",
				"paterno"=>"'$paterno'",
				"materno"=>"'$materno'",
				"cod_rol"=>"'$cod_rol'",
				"pswd"=>"MD5('$pswd')",
				//"fecha_creacion"=>"'$fecha_creacion'",
				"fecha_expira"=>"'$fecha_expira'",
				);
$seg_usuario=new seg_usuario;
$seg_usuario->actualizarRegistro($valores,"cod_usuario='$cod_usuario'");

header("Location:../?c=usuarios");
?>