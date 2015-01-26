<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_candidato extends bd{
	var $campos_tabla=array(
		"codigo_banco_candidato"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_recluta"=>array("Tipo"=>"int","Tamano"=>"11"),
		"cod_prueba"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_banco"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"nro"=>array("Tipo"=>"int","Tamano"=>"11"),
		"respuesta"=>array("Tipo"=>"int","Tamano"=>"11"),
		"escorrecta"=>array("Tipo"=>"varchar","Tamano"=>"1"),
		"cedula"=>array("Tipo"=>"varchar","Tamano"=>"12"),
	);	
}
?>