<?php 
$folder="../../";
include_once("../../login/check.php");
?>
<h2>Nuevo Tipo de Prueba</h2>
<form action="tipo de pruebas/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_tipo" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
