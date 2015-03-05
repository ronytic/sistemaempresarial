<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_prueba.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
if($cod_tipo=="CLE"){
	$cod_banco="CLE";
}
if($cod_tipo=="SER"){
	$cod_banco="SER";
}
if($cod_tipo=="PER"){
	$cod_banco="PER";
}
if($cod_tipo=="VAL"){
	$cod_banco="VAL";
}

$valores=array("cod_empresa"=>"'$cod_empresa'",
				"cod_prueba"=>"'$cod_prueba'",
				"cod_tipo"=>"'$cod_tipo'",
				"cod_banco"=>"'$cod_banco'",
				"descripcion"=>"'$descripcion'",
				"detalle"=>"'$detalle'",
				"tiempo"=>"'$tiempo'",
				);
if($_FILES['grafico']['name']!=""){
	copy($_FILES['grafico']['tmp_name'],"../../imagenes/pruebas/".$_FILES['grafico']['name']);	
	$valores['grafico']="'".$_FILES['grafico']['name']."'";
}
$rec_prueba=new rec_prueba;
$rec_prueba->insertarRegistro($valores,0);

header("Location:../?c=pruebas");
?>