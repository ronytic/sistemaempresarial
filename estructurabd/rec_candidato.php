<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_candidato extends bd{
	var $campos_tabla=array(
		"cedula"=>array("Tipo"=>"varchar","Tamano"=>"12","NoNulo"=>true,"Primaria"=>true,"AI"=>false),
		"exp"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		
		"nombre"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"paterno"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"materno"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"fecha_nac"=>array("Tipo"=>"date","Tamano"=>""),
		"ciudad_nac"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"pais_nac"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"direccion"=>array("Tipo"=>"varchar","Tamano"=>"100"),
		"telefono"=>array("Tipo"=>"varchar","Tamano"=>"10"),
		"mail"=>array("Tipo"=>"varchar","Tamano"=>"60"),
		"foto"=>array("Tipo"=>"varchar","Tamano"=>"120"),
		
	);	
}
?>