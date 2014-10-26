<?php
include_once("../../../estructurabd/seg_rol.php");
extract($_GET);

include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

$seg_rol=new seg_rol;
$condicion="cod_rol  LIKE '$cod_rol'";

$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0);
$sr=array_shift($seg_r);
?>
<h2>Modificar Registro</h2>
<form action="seg_rol/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Rol</td><td><input type="text" name="cod_rol" max="10" maxlength="10" autofocus required value="<?php echo $sr['cod_rol']?>" readonly></td></tr>
    	<tr><td>Cod_Empresa</td>
        	
        	<td><select name="cod_empresa" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>" <?php echo $sr['cod_empresa']==$se['cod_empresa']?'selected="selected"':''?>><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Cod_Sistema</td>
        	
        	<td><select name="cod_sistema"  required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_s as $ss){
				?>
                <option value="<?php echo $ss['cod_sistema']?>" <?php echo $sr['cod_sistema']==$ss['cod_sistema']?'selected="selected"':''?>><?php echo $ss['cod_sistema']?> - <?php echo $ss['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $sr['descripcion']?>"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Modificar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
