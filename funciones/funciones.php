<?php
function listarDirectorio($dir){
	$directorio=opendir($dir); 
	$archivos=array();
	while ($archivo = readdir($directorio)){
		if($archivo!="." && $archivo!=".."){
		array_push($archivos,$archivo);
		}
	}
	return $archivos;
}
?>