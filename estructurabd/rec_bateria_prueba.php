<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_bateria_prueba extends bd{
	var $campos_tabla=array(
		"cod_rec_bateria_prueba"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"uid_bateria"=>array("Tipo"=>"int","Tamano"=>"11"),
		
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_bateria"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_prueba"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		
		
	);	
}
?>