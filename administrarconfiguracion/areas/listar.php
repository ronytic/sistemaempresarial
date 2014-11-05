<?php 
$folder="../../";
include_once("../../login/check.php");
?>
<h2>Búsqueda de Áreas</h2>
<form action="areas/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Código</th>
            <th>Descripción</th>
            <!--<th>Dirección</th>-->
        </tr>
        </thead>
        <tr>
        	<td><input type="text" name="cod_prueba" max="3" maxlength="3" autofocus></td>
            <td><input type="text" name="descripcion" ></td>
            <td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>