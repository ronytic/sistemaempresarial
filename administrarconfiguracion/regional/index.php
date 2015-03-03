<?php 
include_once("../../login/check.php");
$folder="../../";


include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
?>
<h2>Nueva Regional</h2>
<form action="regional/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_planta" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
