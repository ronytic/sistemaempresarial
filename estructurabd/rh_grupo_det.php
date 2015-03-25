<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rh_grupo_det extends bd{
	var $campos_tabla=array(
		"codigo_det"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cedula_jefe"=>array("Tipo"=>"varchar","Tamano"=>"13"),
		"cedula_empleado"=>array("Tipo"=>"varchar","Tamano"=>"3"),
	);	
}
?>