<?php
include_once("../../../estructurabd/seg_rol_permiso.php");
extract($_GET);

include_once("../../../estructurabd/seg_permiso.php");
$seg_permiso=new seg_permiso;
$seg_p=$seg_permiso->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0,"descripcion");

$seg_rol_permiso=new seg_rol_permiso;
$condicion="cod_rp  LIKE '$cod_rp'";

$seg_rp=$seg_rol_permiso->mostrarTodoRegistro($condicion,0);
$srp=array_shift($seg_rp);
?>
<h2>Modificar Registro Rol_Permiso</h2>
<form action="seg_rol_permiso/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Rol</td><td><input type="text" name="cod_rp" max="10" maxlength="10" autofocus required value="<?php echo $srp['cod_rp']?>" readonly></td></tr>
    	<tr><td>Cod_Permiso</td>
        	
        	<td><select name="cod_permiso" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_p as $sp){
				?>
                <option value="<?php echo $sp['cod_permiso']?>" <?php echo $sp['cod_permiso']==$srp['cod_permiso']?'selected="selected"':''?>><?php echo $sp['cod_permiso']?> - <?php echo $sp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Cod_Rol</td>
        	
        	<td><select name="cod_rol" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_r as $sr){
				?>
                <option value="<?php echo $sr['cod_rol']?>" <?php echo $sr['cod_rol']==$srp['cod_rol']?'selected="selected"':''?>><?php echo $sr['cod_rol']?> - <?php echo $sr['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Modificar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
