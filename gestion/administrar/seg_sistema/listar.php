<?php 
$folder="../../";

?>
<h2>Búsqueda de Registro</h2>
<form action="seg_sistema/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Cod_Sistema</th>
            <th>Descripción</th>
            <!--<th>Dirección</th>-->
        </tr>
        </thead>
        <tr>
        	<td><input type="text" name="cod_sistema" max="3" maxlength="3" autofocus></td>
            <td><input type="text" name="descripcion" ></td>
            <!--<td><input type="text" name="direccion"></td>-->
            <td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>