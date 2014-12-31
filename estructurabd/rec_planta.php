<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_planta extends bd{
	var $campos_tabla=array(
		"codigo_planta"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_planta"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		
	);	
}
?>