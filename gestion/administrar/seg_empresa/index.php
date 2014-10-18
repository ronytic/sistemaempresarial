<?php 
$folder="../../";

?>
<h2>Nuevo Registro</h2>
<form action="seg_empresa/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Empresa</td><td><input type="text" name="cod_empresa" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        <tr><td>Dirección</td><td><input type="text" name="direccion"></td></tr>
        <tr><td>Teléfono 1</td><td><input type="text" name="telefono1"></td></tr>
        <tr><td>Teléfono 2</td><td><input type="text" name="telefono2"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
