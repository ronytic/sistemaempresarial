<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class seg_permiso extends bd{
	var $campos_tabla=array(
		"cod_permiso"=>array("Tipo"=>"varchar","Tamano"=>"10","NoNulo"=>true,"Primaria"=>false,"AI"=>false),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"20"),
	);	
}
?>