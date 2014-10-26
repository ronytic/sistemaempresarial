<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_permiso extends bd{
	var $campos_tabla=array(
		"cod_permiso"=>array("Tipo"=>"varchar","Tamano"=>"3","NoNulo"=>true,"Primaria"=>true,"AI"=>false),
		"cod_sistema"=>array("Tipo"=>"varchar","Tamano"=>"5"),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"60"),
	);	
}
?>