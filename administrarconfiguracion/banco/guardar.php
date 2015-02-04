<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_banco"=>"'$cod_banco'",
				"descripcion"=>"'$descripcion'",
				

				);
$rec_banco=new rec_banco;
$rec_banco->insertarRegistro($valores,0);

header("Location:../?c=banco");
?>