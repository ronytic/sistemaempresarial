<?php
include_once("../../../estructurabd/seg_sistema.php");
extract($_POST);
$valores=array(
				"descripcion"=>"'$descripcion'",
				"img_01"=>"'".$_FILES['img_01']['name']."'",
				"img_02"=>"'".$_FILES['img_02']['name']."'",
				"img_03"=>"'".$_FILES['img_03']['name']."'",
				"img_04"=>"'".$_FILES['img_04']['name']."'",

				);
if($_FILES['img_01']['name']!=""){
	copy($_FILES['img_01']['tmp_name'],"../../../imagenes/sistema/".$_FILES['img_01']['name']);	
}
if($_FILES['img_02']['name']!=""){
	copy($_FILES['img_02']['tmp_name'],"../../../imagenes/sistema/".$_FILES['img_02']['name']);	
}
if($_FILES['img_03']['name']!=""){
	copy($_FILES['img_03']['tmp_name'],"../../../imagenes/sistema/".$_FILES['img_03']['name']);	
}
if($_FILES['img_04']['name']!=""){
	copy($_FILES['img_04']['tmp_name'],"../../../imagenes/sistema/".$_FILES['img_04']['name']);	
}
$seg_sistema=new seg_sistema;
$seg_sistema->actualizarRegistro($valores,"cod_sistema='$cod_sistema'");

header("Location:../?c=seg_sistema");
?>