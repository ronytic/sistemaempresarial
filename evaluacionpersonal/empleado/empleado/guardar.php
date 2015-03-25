<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_empleado.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cedula"=>"'$cedula'",
				"nombre"=>"'$nombre'",
				//"paterno"=>"'$paterno'",
                //"materno"=>"'$materno'",
                "cod_cargo"=>"'$cod_cargo'",

				);
$rh_empleado=new rh_empleado;
$rh_empleado->insertarRegistro($valores,0);

header("Location:../?c=empleado");
?>