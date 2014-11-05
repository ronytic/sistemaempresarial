<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_candidato.php");
extract($_POST);
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
				
				);
				if($_FILES['foto']['name']!=""){
				$valores["foto"]="'".$_FILES['foto']['name']."'";
				}
//print_r($valores);
$rec_candidato=new rec_candidato;
$rec_candidato->actualizarRegistro($valores,"cedula='$cedula'");

header("Location:../?c=candidato");
?>