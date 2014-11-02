<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_reclutamiento extends bd{
	var $campos_tabla=array(
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_recluta"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),

		"cod_cargo"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_area"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_bateria"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"fecha_inicio"=>array("Tipo"=>"date","Tamano"=>""),
		"fecha_limite"=>array("Tipo"=>"date","Tamano"=>""),
		"prioridad"=>array("Tipo"=>"varchar","Tamano"=>"1"),
		"responsable"=>array("Tipo"=>"varchar","Tamano"=>"50"),
		"estado"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
	);	
}
?>