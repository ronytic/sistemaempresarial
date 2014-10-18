<?php 
$folder="../../";
include_once("../../../estructurabd/seg_permiso.php");
$seg_permiso=new seg_permiso;
$seg_p=$seg_permiso->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0,"descripcion");
?>
<h2>Nuevo Registro de Rol_Permiso</h2>
<form action="seg_rol_permiso/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<!--<tr><td>Cod_Rol_Permiso</td><td><input type="text" name="cod_rp" max="10" maxlength="10" autofocus required></td></tr>-->
    	<tr><td>Cod_Permiso</td>
        	
        	<td><select name="cod_permiso" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_p as $sp){
				?>
                <option value="<?php echo $sp['cod_permiso']?>"><?php echo $sp['cod_permiso']?> - <?php echo $sp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Cod_Rol</td>
        	
        	<td><select name="cod_rol" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_r as $sr){
				?>
                <option value="<?php echo $sr['cod_rol']?>"><?php echo $sr['cod_rol']?> - <?php echo $sr['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <!--<tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>-->
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
