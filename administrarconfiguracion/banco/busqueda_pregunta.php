<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco_preguntas.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$codigo_banco_preguntas=$_GET['codigo_banco_preguntas'];
$rec_banco_preguntas=new rec_banco_preguntas;
$condicion="codigo_banco_preguntas  LIKE '$codigo_banco_preguntas' and cod_empresa='$cod_empresa'";
$rec_b_p=$rec_banco_preguntas->mostrarTodoRegistro($condicion,0);
$rec_b_p=array_shift($rec_b_p);
$valores=$rec_b_p;
echo json_encode($valores);