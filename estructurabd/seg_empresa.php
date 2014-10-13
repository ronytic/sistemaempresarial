<?php
class seg_empresa{
	var $campos=array(
		"cod_empresa"=>array("Tipo"=>"varchar","Tamano"=>"3","NoNulo"=>true,"Primaria"=>true,"AI"=>false),
		"descripcion"=>array("Tipo"=>"varchar","Tamano"=>"40"),
		"direccion"  =>array("Tipo"=>"varchar","Tamano"=>"100"),
		"telefono1"  =>array("Tipo"=>"varchar","Tamano"=>"10"),
		"telefono2"  =>array("Tipo"=>"varchar","Tamano"=>"10"),
	);	
}
?>