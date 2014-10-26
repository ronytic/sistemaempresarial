<?php 
$folder="../../";
include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

?>
<h2>Nuevo Registro de Rol</h2>
<form action="seg_rol/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Rol</td><td><input type="text" name="cod_rol" max="10" maxlength="10" autofocus required></td></tr>
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
        <tr><td>Cod_Sistema</td>
        	
        	<td><select name="cod_sistema" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_s as $ss){
				?>
                <option value="<?php echo $ss['cod_sistema']?>"><?php echo $ss['cod_sistema']?> - <?php echo $ss['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
