<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_candidato.php");
extract($_POST);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];
if($_FILES['foto']['name']!=""){
	copy($_FILES['foto']['tmp_name'],"../../imagenes/candidato/".$_FILES['foto']['name']);	
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
				"foto"=>"'".$_FILES['foto']['name']."'",
				);
$rec_candidato=new rec_candidato;
$rec_candidato->insertarRegistro($valores,0);

header("Location:../?c=candidato");
?>