<?php 
$folder="../../";
include_once("../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");
$titulo="Buscar Candidato ya existente";

include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<a href="javascript:history.back()" class="btn btn-xs">Volver</a>
<form action="busqueda_candidato.php" method="post" class="formulario">
	<input type="hidden" name="cod_recluta" value="<?php echo $_GET['cod_recluta']?>">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr><th>Cédula de Identidad</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>
        </thead>
        <tr>
        	<td><input type="text" name="cedula" autofocus></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="paterno"></td>
            <td><input type="text" name="materno"></td>
			<td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success btn-xs"></td></tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>
<?php include_once("../../pie.php");?>