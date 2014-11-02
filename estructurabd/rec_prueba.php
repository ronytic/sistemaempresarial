<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_prueba extends bd{
	var $campos_tabla=array(
		"cod_rec_prueba"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_prueba"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_tipo"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		
	);	
}
?>