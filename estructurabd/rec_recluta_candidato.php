<?php
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."../class/bd.php");
class rec_recluta_candidato extends bd{
	var $campos_tabla=array(
		
		"cod_rec_recluta_candidato"=>array("Tipo"=>"int","Tamano"=>"11","NoNulo"=>true,"Primaria"=>true,"AI"=>true),
		"cod_recluta"=>array("Tipo"=>"varchar","Tamano"=>"3"),	
		"cedula"=>array("Tipo"=>"varchar","Tamano"=>"10"),
		"usuario"=>array("Tipo"=>"varchar","Tamano"=>"20"),
	);	
}
?>