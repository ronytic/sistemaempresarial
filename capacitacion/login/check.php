<?php
session_start();
$dir=dirname(__FILE__).DIRECTORY_SEPARATOR."../../";
define("RAIZ",$dir);
include_once(RAIZ."capacitacion/configuracion.php");
//include_once(RAIZ."rastreo/revisar.php");
if((!isset($_SESSION["logueado"])) && ($_SESSION['cod_sistema']=="" && $_SESSION['cod_empresa']=="")){
	/*print_r($_SESSION);
	var_dump( !(isset($_SESSION["logueado"])));
	echo "Hola";*/
	include_once(RAIZ."funciones/url.php");
	header("Location:".url_base().$directory."login/?u=".$_SERVER['PHP_SELF']);
}else{
	//$idiomaarchivo=$_SESSION['Idioma']!=""?$_SESSION['Idioma']:"es";
	//if(!file_exists(RAIZ."idioma/".$idiomaarchivo.".php")){$idiomaarchivo="es";}
	//include_once(RAIZ."idioma/".$idiomaarchivo.".php");	
	include_once(RAIZ."funciones/funciones.php");	
}
?>