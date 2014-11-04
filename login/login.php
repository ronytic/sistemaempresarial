<?php
session_start();
@set_magic_quotes_runtime(0);
//header("Content-Type: text/html;charset=utf-8");
if(!empty($_POST)){
	
/*	require_once('php-local-browscap.php');
	$navegador=get_browser_local(null,true,"lite_php_browscap.ini",true);
	print_r($navegador);*/

	include_once("../configuracion.php");
	include_once("../estructurabd/seg_usuario.php");
	
	//include_once("../class/logusuario.php");
	$seg_usuario=new seg_usuario;
	//$logusuario=new logusuario;
	
	$url=$_POST['u'];
	if(empty($directory) || $directory==""){
		$u=$url;	
		$direccion="..".$u;
	}else{
		$u=explode($directory,$_POST['u']);
		$direccion="../".$u[1];
	}
	
	
	if(isset($_POST['usuario'],$_POST['contrasena']) && $_POST['usuario']!="" && $_POST['contrasena']!=""){
		
		$usuario=($_POST['usuario']);
		$pass=$_POST['contrasena'];
		$cod_empresa=$_POST['cod_empresa'];
		
//		$usuario=str_replace("ñ","n",$usuario);
		$usuarioAl=str_replace(array("ñ","Ñ"),array("n","N"),$usuario);
		$usuarioAl=strtolower($usuarioAl);
	//	echo $usuarioAl;
	
		$agente=$_SERVER['HTTP_USER_AGENT'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$lenguaje=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$referencia= $_SERVER['HTTP_REFERER'];
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		//$reg=$alumno->loginAlumno($usuario,$pass);
		
		if($usuario!=""){
			//Administrador 1 2 3 4
			$reg=$seg_usuario->loginUsuarios($usuario,$pass,$cod_empresa);
			$reg=array_shift($reg);
			$sw=1;
		}else{
			//echo $sql;
			header("Location:./?u=".$url.'&error=1');		
		}
		//echo $Nivel;
		/**/
		
		//$res=mysql_query($sql);
		//@$reg=mysql_fetch_array($res);
		$cod_sistema=$reg['cod_sistema'];
		$cod_empresa=$reg['cod_empresa'];
		
		if($sw){
			//$Nivel=$reg['Nivel'];
		}
		
		if($reg['can']==1){
			/*$valuesLog=array(
				"CodUsuario"=>$codUsuario,
				"Nivel"=>$Nivel,
				"Url"=>"'$url'",
				"FechaLog"=>"'$fecha'",
				"HoraLog"=>"'$hora'",
				"Agente"=>"'$agente'",
				"Ip"=>"'$ip'",
				"Referencia"=>"'$referencia'",
				"Lenguaje"=>"'$lenguaje'"
			);
			$logusuario->insertarRegistro($valuesLog,0);
			//mysql_query("INSERT INTO logusuarios VALUES(NULL,$codUsuario,$Nivel,'$url','$fecha','$hora','$agente','$ip','$referencia','$lenguaje')");
			*/
			$_SESSION['cod_usuario']=$reg['cod_usuario'];;
			$_SESSION['cod_login']=$reg['cod_login'];
			$_SESSION['nombre']=$reg['nombre'];
			$_SESSION['paterno']=$reg['paterno'];
			$_SESSION['materno']=$reg['materno'];
			$_SESSION['cod_rol']=$reg['cod_rol'];
			
			$_SESSION['cod_sistema']=$cod_sistema;
			$_SESSION['cod_empresa']=$cod_empresa;
			$_SESSION['logueado']=1;
			$_SESSION['hora_ingreso']=date("H:i:s");
			$_SESSION['fecha_ingreso']=date("Y-m-d");
			/*$_SESSION['Idioma']=$reg['Idioma'];
			echo $logusuario->optimizarTablas();*/
			//echo $direccion;
			header("Location:".$direccion);
		}
		else{
			header("Location:./?u=".$url.'&error=1');
		}
	}else{
		header("Location:./?u=".$url.'&incompleto=1');	
	}
}
?>
