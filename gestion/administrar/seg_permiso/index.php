<?php 
$folder="../../";
include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");
?>
<h2>Nuevo Registro de Permiso</h2>
<form action="seg_permiso/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Permiso</td><td><input type="text" name="cod_permiso" max="10" maxlength="10" autofocus required></td></tr>
    	<tr><td>Cod_Empresa</td>
        	
        	<td><select name="cod_empresa" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>"><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
