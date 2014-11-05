<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_reclutamiento.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_cargo"=>"'$cod_cargo'",
				"cod_area"=>"'$cod_area'",
				"cod_bateria"=>"'$cod_bateria'",
				"fecha_inicio"=>"'$fecha_inicio'",
				"fecha_limite"=>"'$fecha_limite'",
				"prioridad"=>"'$prioridad'",
				"responsable"=>"'$responsable'",
				"estado"=>"'$estado'",
				"usuario"=>"'$usuario'",

				);
$rec_reclutamiento=new rec_reclutamiento;
$rec_reclutamiento->insertarRegistro($valores,0);

header("Location:../?c=reclutamiento");
?>