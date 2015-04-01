<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_valanti extends bd{
	var $campos_tabla=array(
		"codigo_valanti"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"nro"=>array("Tipo"=>"int","Tamano"=>"11"),
		"texto1"=>array("Tipo"=>"varchar","Tamano"=>"200"),
        "texto2"=>array("Tipo"=>"varchar","Tamano"=>"200"),
	);	
}
?>