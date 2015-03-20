<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_grupo_mas.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cedula_jefe"=>"'$cedula_jefe'",
				"cod_cargo"=>"'$cod_cargo'",
                "cod_competencia"=>"'$cod_competencia'",

				);
$rh_grupo_mas=new rh_grupo_mas;
$rh_grupo_mas->insertarRegistro($valores,0);

header("Location:../?c=grupos de evaluacion");
?>