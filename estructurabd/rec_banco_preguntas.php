<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_banco_preguntas extends bd{
	var $campos_tabla=array(
		"codigo_banco_preguntas"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"cod_banco"=>array("Tipo"=>"varchar","Tamano"=>"3"),
		"nro"=>array("Tipo"=>"int","Tamano"=>"11"),
		"pregunta"=>array("Tipo"=>"varchar","Tamano"=>"100"),
		"opcion1"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		"opcion2"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		"opcion3"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		"opcion4"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		"opcion5"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		
		"correcta"=>array("Tipo"=>"int","Tamano"=>"1"),
		
	);	
}
?>