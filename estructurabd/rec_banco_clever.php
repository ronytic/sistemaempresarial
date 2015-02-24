<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_clever extends bd{
	var $campos_tabla=array(
		"codigo_banco_clever"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"grupo"=>array("Tipo"=>"int","Tamano"=>"11"),
		"pregunta"=>array("Tipo"=>"varchar","Tamano"=>"100"),
	);	
}
?>