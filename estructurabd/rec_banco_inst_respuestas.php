<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_inst_respuestas extends bd{
	var $campos_tabla=array(
		"codigo_banco_inst_respuestas"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_recluta"=>array("Tipo"=>"int","Tamano"=>"11"),
		"cod_prueba"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"codigo_inst"=>array("Tipo"=>"int","Tamano"=>"11"),
		"correcta"=>array("Tipo"=>"int","Tamano"=>"11"),
		"cedula"=>array("Tipo"=>"varchar","Tamano"=>"12"),
	);	
}
?>