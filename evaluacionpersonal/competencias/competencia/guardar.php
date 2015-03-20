<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_competencia_mas.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(//"cod_empresa"=>"'$cod_empresa'",
				"cod_competencia"=>"'$cod_competencia'",
				"descripcion"=>"'$descripcion'",
                "tipo"=>"'$tipo'",

				);
$rh_competencia_mas=new rh_competencia_mas;
$rh_competencia_mas->insertarRegistro($valores,0);

header("Location:../?c=competencia");
?>