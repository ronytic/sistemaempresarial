<?php 
$folder="../../";
include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");
?>
<h2>Búsqueda de Registro</h2>
<form action="seg_usuario/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<thead>
    	<tr><th>Cod_Empresa</th></tr>
        </thead>
        <tr><td><select name="cod_empresa" autofocus >
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>"><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td><td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>