<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_area_usuario extends bd{
	var $campos_tabla=array(
		"cod_rec_area_usuario"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_area"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_usuario"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"login"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		
		
	);	
}
?>