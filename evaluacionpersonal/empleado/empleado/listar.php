<?php 
$folder="../../";
include_once("../../login/check.php");
?>
<h2>Búsqueda de Empleados</h2>
<form action="empleado/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Cédula de Identidad</th>
            <th>Nombre</th>
            <th>Paterno</th>
            <th>Materno</th>
            <!--<th>Cargo</th>-->
        </tr>
        </thead>
        <tr>
        	<td><input type="text" name="cedula" max="3" maxlength="3" autofocus></td>
            <td><input type="text" name="nombre" ></td>
            <td><input type="text" name="paterno" ></td>
            <td><input type="text" name="materno" ></td>
            <td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>