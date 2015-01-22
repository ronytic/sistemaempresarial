<?php 
$folder="../../";
include_once("../../login/check.php");
?>
<h2>Búsqueda de Bancos</h2>
<form action="banco/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Código</th>
            <th>Pregunta</th>
            <!--<th>Dirección</th>-->
        </tr>
        </thead>
        <tr>
        	<td><input type="text" name="cod_banco" max="3" maxlength="3" autofocus></td>
            <td><input type="text" name="pregunta" ></td>
            <td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>