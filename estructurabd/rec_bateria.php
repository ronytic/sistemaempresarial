<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_bateria extends bd{
	var $campos_tabla=array(
		"cod_rec_bateria"=>array("Tipo"=>"int","Tamano"=>"3","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_bateria"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		
	);	
}
?>