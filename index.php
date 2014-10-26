<?php
session_start();
$logueado=$_SESSION['logueado'];
$cod_sistema=$_SESSION['cod_sistema'];
if($logueado==0 and $cod_sistema==""){
	header("Location:login/");
}
?>