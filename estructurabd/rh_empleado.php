<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rh_empleado extends bd{
	var $campos_tabla=array(
		//"cedula"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		
		"cedula"=>array("Tipo"=>"varchar","Tamano"=>"12"),
		"nombre"=>array("Tipo"=>"varchar","Tamano"=>"80"),
		"paterno"=>array("Tipo"=>"varchar","Tamano"=>"80"),
        "materno"=>array("Tipo"=>"varchar","Tamano"=>"80"),
		"cod_cargo"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
	);	
}
?>