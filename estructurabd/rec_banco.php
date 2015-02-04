<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco extends bd{
	var $campos_tabla=array(
		"codigo_banco"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		""=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_banco"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"100"),
	);	
}
?>