<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_usuario extends bd{
	var $campos_tabla=array(
		"cod_usuario"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3","NoNulo"=>true,"Primaria"=>false,"AI"=>false),
		"cod_sistema"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"login"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"nombre"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		"paterno"  =>array("Tipo"=>"varchar","Tamano"=>"40"),
		"materno"  =>array("Tipo"=>"varchar","Tamano"=>"40"),
		"cod_rol"  =>array("Tipo"=>"varchar","Tamano"=>"3"),
		"fecha_creacion"  =>array("Tipo"=>"date","Tamano"=>""),
		"fecha_expira"  =>array("Tipo"=>"date","Tamano"=>""),
		"pswd"  =>array("Tipo"=>"varchar","Tamano"=>"40"),
	);	
}
?>