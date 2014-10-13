<?php
class seg_sistema{
	var $campos=array(
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