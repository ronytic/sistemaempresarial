<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_grupo_det.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array(
				"cedula_jefe"=>"'$cedula_jefe'",
				"cedula_empleado"=>"'$cedula'",

				);
$rh_grupo_det=new rh_grupo_det;
$rh_grupo_det->insertarRegistro($valores,0);

//header("Location:../?c=grupos de evaluacion");
?>