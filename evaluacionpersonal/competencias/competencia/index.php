<?php 
include_once("../../login/check.php");
$folder="../../../";


include_once("../../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
?>
<h2>Nueva Competencia</h2>
<form action="competencia/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_competencia" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required class="form-control"></td></tr>
        <tr><td>Tipo</td><td><input type="text" name="tipo" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
