<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_inst extends bd{
	var $campos_tabla=array(
		"codigo_banco_serie"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"Pre1"=>array("Tipo"=>"varchar","Tamano"=>"80"),
		"Pre2"=>array("Tipo"=>"varchar","Tamano"=>"80"),
		"Pre3"=>array("Tipo"=>"varchar","Tamano"=>"80"),
		"respuesta"=>array("Tipo"=>"varchar","Tamano"=>"20"),
	);	
}
?>