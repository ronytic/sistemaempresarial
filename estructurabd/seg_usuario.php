<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_usuario extends bd{
	var $campos_tabla=array(
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3","NoNulo"=>true,"Primaria"=>false,"AI"=>false),
		"login"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"nombre"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"paterno"  =>array("Tipo"=>"varchar","Tamano"=>"60"),
		"materno"  =>array("Tipo"=>"varchar","Tamano"=>"60"),
		"cod_rol"  =>array("Tipo"=>"varchar","Tamano"=>"5"),
		"fecha_creacion"  =>array("Tipo"=>"date","Tamano"=>""),
		"fecha_expira"  =>array("Tipo"=>"date","Tamano"=>""),
		"pswd"  =>array("Tipo"=>"varchar","Tamano"=>"32"),
	);	
}
?>