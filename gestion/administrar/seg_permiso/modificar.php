<?php
include_once("../../../estructurabd/seg_permiso.php");
extract($_GET);

include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

$seg_permiso=new seg_permiso;
$condicion="cod_permiso  LIKE '$cod_permiso'";

$seg_p=$seg_permiso->mostrarTodoRegistro($condicion,0);
$sp=array_shift($seg_p);
?>
<h2>Modificar Registro</h2>
<form action="seg_permiso/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Permiso</td><td><input type="text" name="cod_permiso" max="10" maxlength="10" autofocus required value="<?php echo $sp['cod_permiso']?>" readonly></td></tr>
    	<tr><td>Cod_Empresa</td>
        	
        	<td><select name="cod_empresa" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>" <?php echo $sp['cod_empresa']==$se['cod_empresa']?'selected="selected"':''?>><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $sp['descripcion']?>"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Modificar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
