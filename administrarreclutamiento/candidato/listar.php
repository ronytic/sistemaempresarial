<?php 
$folder="../../";
include_once("../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

?>
<h2>Búsqueda de Candidatos</h2>
<form action="candidato/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr><th>Cédula de Identidad</th><th>Nombre</th><th>Paterno</th><th>Materno</th></tr>
        </thead>
        <tr>
        	<td><input type="text" name="cedula"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="paterno"></td>
            <td><input type="text" name="materno"></td>
			<td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>