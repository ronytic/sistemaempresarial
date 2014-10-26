<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_rol_permiso extends bd{
	var $campos_tabla=array(
		
		"cod_rp"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>false,"Primaria"=>true,"AI"=>true),
		"cod_rol"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_sistema"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_permiso"=>array("Tipo"=>"varchar","Tamano"=>"5"),
		"accede"=>array("Tipo"=>"int","Tamano"=>"11"),
	);	
}
?>