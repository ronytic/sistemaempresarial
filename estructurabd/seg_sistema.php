<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_sistema extends bd{
	var $campos_tabla=array(
		"cod_sistema"=>array("Tipo"=>"varchar","Tamano"=>"3","NoNulo"=>true,"Primaria"=>false,"AI"=>false),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"20"),
		"img_01"  =>array("Tipo"=>"varchar","Tamano"=>"150"),
		"img_02"  =>array("Tipo"=>"varchar","Tamano"=>"150"),
		"img_03"  =>array("Tipo"=>"varchar","Tamano"=>"150"),
		"img_04"  =>array("Tipo"=>"varchar","Tamano"=>"150"),
	);	
}
?>