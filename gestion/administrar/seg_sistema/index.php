<?php 
$folder="../../";

?>
<h2>Nuevo Registro de Seg_Sistema</h2>
<form action="seg_sistema/guardar.php" method="post" enctype="multipart/form-data">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Sistema</td><td><input type="text" name="cod_sistema" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        <!--<tr><td>Dirección</td><td><input type="text" name="direccion"></td></tr>-->
        <tr><td>Imagen 1</td><td><input type="file" name="img_01"></td></tr>
        <tr><td>Imagen 2</td><td><input type="file" name="img_02"></td></tr>
        <tr><td>Imagen 3</td><td><input type="file" name="img_03"></td></tr>
        <tr><td>Imagen 4</td><td><input type="file" name="img_04"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
