<?php
session_start();
include_once("../configuracion.php");
include_once("../../funciones/url.php");
foreach($_SESSION as $k=>$v){
//	echo $k."-".$v;
	unset($_SESSION[$k]);
}
unset($_SESSION["cod_sistema"]);
unset($_SESSION["cod_empresa"]);
unset($_SESSION["logueado"]);
unset($_SESSION["hora_ingreso"]);
unset($_SESSION["fecha_ingreso"]);
session_destroy();
header("Location:".url_base().$directory."../../embol/");
?>