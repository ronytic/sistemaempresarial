<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_empresa extends bd{
	var $campos_tabla=array(
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3","NoNulo"=>true,"Primaria"=>true,"AI"=>false),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"telefono1"  =>array("Tipo"=>"varchar","Tamano"=>"10"),
		"telefono2"  =>array("Tipo"=>"varchar","Tamano"=>"10"),
	);	
}
?>