<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_resultados extends bd{
	var $campos_tabla=array(
		"codigo_banco_resultados"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_recluta"=>array("Tipo"=>"int","Tamano"=>"11"),
		"cod_prueba"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"correctas"=>array("Tipo"=>"double","Tamano"=>""),
		"incorrectas"=>array("Tipo"=>"double","Tamano"=>""),
		"total"=>array("Tipo"=>"double","Tamano"=>""),
        "porcentaje"=>array("Tipo"=>"double","Tamano"=>""),
		"cedula"=>array("Tipo"=>"varchar","Tamano"=>"12"),
	);	
}
?>