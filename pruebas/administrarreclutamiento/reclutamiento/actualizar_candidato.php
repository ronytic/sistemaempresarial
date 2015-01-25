<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rec_candidato.php");
include_once("../../../estructurabd/rec_recluta_candidato.php");
/*echo "<pre>";
print_r($_SESSION);
print_r($_POST);
echo "</pre>";*/
extract($_POST);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];
if($_FILES['foto']['name']!=""){
	copy($_FILES['foto']['tmp_name'],"../../../imagenes/candidato/".$_FILES['foto']['name']);	
}
$valores=array(
				"cedula"=>"'$cedula'",
				"exp"=>"'$exp'",
				"nombre"=>"'$nombre'",
				"paterno"=>"'$paterno'",
				"materno"=>"'$materno'",
				"fecha_nac"=>"'$fecha_nac'",
				"ciudad_nac"=>"'$ciudad_nac'",
				"pais_nac"=>"'$pais_nac'",
				"direccion"=>"'$direccion'",
				"telefono"=>"'$telefono'",
				"mail"=>"'$mail'",
				
				);
if($_FILES['foto']['name']!=""){
$valores=array_merge($valores,array("foto"=>"'".$_FILES['foto']['name']."'"));
}
$rec_recluta_candidato=new rec_recluta_candidato;

$rec_candidato=new rec_candidato;
$rec_candidato->actualizarRegistro($valores,"cedula='".$cedula_anterior."'");


$valores=array(
				"cedula"=>"'$cedula'",
				"cod_recluta"=>"'$cod_recluta'",
				"usuario"=>"'".$_SESSION['login']."'",
				"activo"=>"'1'"
				);
$_SESSION['cedula']=$cedula;
$_SESSION['cod_planta']=$cod_planta;
$_SESSION['cod_recluta']=$cod_recluta;
$rr=$rec_recluta_candidato->mostrarTodoRegistro("cedula='$cedula' and cod_recluta='$cod_recluta'",0);
if(count($rr)>0){
	header("Location:respuesta.php?r=0");
}else{
	$rec_recluta_candidato->insertarRegistro($valores,0);	
	header("Location:respuesta.php?r=1");

//header("Location:ingresar.php?r=1");
}



?>