<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_inst extends bd{
	var $campos_tabla=array(
		"codigo_banco_serie"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"orden"=>array("Tipo"=>"int","Tamano"=>"11"),
		"pregunta"=>array("Tipo"=>"varchar","Tamano"=>"180"),
		"pre2"=>array("Tipo"=>"varchar","Tamano"=>"100"),
		"pre3"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"pre4"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"pre5"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"respuesta"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"tipo"=>array("Tipo"=>"varchar","Tamano"=>"3"),
	);	
}
?>