<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_area extends bd{
	var $campos_tabla=array(
		"codigo_area"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_area"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		
	);	
}
?>