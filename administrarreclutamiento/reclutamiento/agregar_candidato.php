<?php
include_once("../../login/check.php");

include_once("../../estructurabd/rec_recluta_candidato.php");

extract($_GET);
$fecha_creacion=date("Y-m-d");
$cod_empresa=$_SESSION['cod_empresa'];


$valores=array(
				"cedula"=>"'$cedula'",
				"cod_recluta"=>"'$cod_recluta'",
				"usuario"=>"'".$_SESSION['login']."'",
				);
$rec_recluta_candidato=new rec_recluta_candidato;
$rec_recluta_candidato->insertarRegistro($valores,0);

header("Location:ver.php?cod_recluta=".$cod_recluta);
?>