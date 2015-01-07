<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_planta_usuario extends bd{
	var $campos_tabla=array(
		"cod_rec_planta_usuario"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_planta"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_usuario"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"login"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"Activo"=>array("Tipo"=>"tinyint","Tamano"=>"1"),
		
	);	
}
?>