<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rh_competencia_mas extends bd{
	var $campos_tabla=array(
	
		"cod_competencia"=>array("Tipo"=>"varchar","Tamano"=>"3","Primaria"=>true),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"80"),
		"tipo"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
	);	
}
?>