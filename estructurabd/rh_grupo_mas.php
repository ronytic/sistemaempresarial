<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rh_grupo_mas extends bd{
	var $campos_tabla=array(
		"codigo_grupo"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cedula_jefe"=>array("Tipo"=>"varchar","Tamano"=>"12"),
		"cod_cargo"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_competencia"=>array("Tipo"=>"varchar","Tamano"=>"3"),
        
		
	);	
}
?>