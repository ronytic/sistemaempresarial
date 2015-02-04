<?php 
include_once("../../login/check.php");
$folder="../../";


include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;
$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
?>
<h2>Nuevo Banco</h2>
<form action="banco/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_banco" max="3" maxlength="3" autofocus required></td></tr>
        
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required size="100"></td></tr>
        
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
