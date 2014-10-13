<?php
include_once("../funciones/funciones.php");

$archivosphp=listarDirectorio("../estructurabd");
include_once("../class/bd.php");
$bd=new bd;
foreach($archivosphp as $ap){
	include_once("../estructurabd/".$ap);
	$ap=str_replace(".php","",$ap);
	
	${$ap}=new $ap;
	
	$variablesClase=get_class_vars(get_class(${$ap}));
	$campos=$variablesClase['campos'];
	
	$sqlTabla="CREATE TABLE IF NOT EXISTS $ap(";
	$campostabla=array();
	$camposprimarios=array();
	foreach($campos as $vck=>$vcv){
		array_push($campostabla,"`$vck` ".$vcv['Tipo']."(".$vcv['Tamano'].") ".($vcv['NoNulo']?'NOT NULL':'')." ".($vcv['AI']?'AUTO_INCREMENT':''));	
		if($vcv['Primaria']==true){
			array_push($camposprimarios,"`$vck`");	
		}
	}
	$sqlTabla.=implode(",",$campostabla);
	if(count($camposprimarios)>0){
		$sqlTabla.= ", PRIMARY KEY (".implode(",",$camposprimarios).")";
	}
	
	$sqlTabla.=") ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;";
	/*
	echo "<pre>";
	print_r($variablesClase[campos]);
	echo "</pre>";
	*/
	echo "<pre>";
	$bd->consulta($sqlTabla);
	echo $sqlTabla;
	echo "</pre>";
}
?>