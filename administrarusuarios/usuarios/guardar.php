<?php
include_once("../../login/check.php");
include_once("../../estructurabd/seg_usuario.php");
extract($_POST);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];
$cod_sistema=$_SESSION['cod_sistema'];
$valores=array(
				"cod_empresa"=>"'$cod_empresa'",
				"cod_sistema"=>"'$cod_sistema'",
				"login"=>"'$login'",
				"nombre"=>"'$nombre'",
				"paterno"=>"'$paterno'",
				"materno"=>"'$materno'",
				"cod_rol"=>"'$cod_rol'",
				"pswd"=>"MD5('$pswd')",
				"fecha_creacion"=>"'$fecha_creacion'",
				"fecha_expira"=>"'$fecha_expira'",
				);
$seg_usuario=new seg_usuario;
$seg_usuario->insertarRegistro($valores,0);

header("Location:../?c=usuarios");
?>