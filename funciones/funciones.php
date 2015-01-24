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
function capitalizar($texto){
	return ucwords($texto);
}
function mayuscula($texto){
	return mb_strtoupper($texto,"utf8");
}
function minuscula($texto){
	return mb_strtolower($texto,"utf8");
}
function precio($Cantidad,$decimal=2){
	return number_format($Cantidad,$decimal);
}
function fecha2Str($fecha="",$t=1){
	$fecha=$fecha==""?date("Y-m-d"):$fecha;
	if(date("d-m-Y",strtotime($fecha))=='31-12-1969'||date("Y-m-d",strtotime($fecha))=='1969-12-31'){
	return $fecha;}
	if(!empty($fecha) && $fecha!="0000-00-00"){
		if($t==1){
			return date("d-m-Y",strtotime($fecha)."+5day");	
		}else{
			return date("Y-m-d",strtotime($fecha));	
		}
	}else{
		if($t=1 && $fecha=="0000-00-00")
		return "00-00-0000";
		else
		return $fecha;
	}
}
?>