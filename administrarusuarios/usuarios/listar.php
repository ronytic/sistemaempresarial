<?php 
$folder="../../";
include_once("../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

?>
<h2>Búsqueda de Usuarios</h2>
<form action="usuarios/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr><th>Sistema</th></tr>
        </thead>
        <tr>
            <td><select name="cod_sistema">
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_s as $ss){
				?>
                <option value="<?php echo $ss['cod_sistema']?>"><?php echo $ss['cod_sistema']?> - <?php echo $ss['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td><td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>