<?php
include_once("../../../estructurabd/seg_usuario.php");
extract($_GET);

include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0,"descripcion");

$seg_usuario=new seg_usuario;
$condicion="cod_empresa  LIKE '$cod_empresa'";

$seg_u=$seg_usuario->mostrarTodoRegistro($condicion,0);
$su=array_shift($seg_u);
?>
<h2>Modificar Registro</h2>
<form action="seg_usuario/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Empresa</td><td><select name="cod_empresa" autofocus required disabled>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>" <?php echo $se['cod_empresa']==$su['cod_empresa']?'selected="selected"':''?>><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Cod_Sistema</td><td><select name="cod_sistema" autofocus required disabled>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_s as $ss){
				?>
                <option value="<?php echo $ss['cod_sistema']?>" <?php echo $ss['cod_sistema']==$su['cod_sistema']?'selected="selected"':''?>><?php echo $ss['cod_sistema']?> - <?php echo $ss['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Login</td><td><input type="text" name="login" required value="<?php echo $su['login']?>"></td></tr>
        <tr><td>Nombre</td><td><input type="text" name="nombre" required value="<?php echo $su['nombre']?>"></td></tr>
        
        <tr><td>Paterno</td><td><input type="text" name="paterno" required value="<?php echo $su['paterno']?>"></td></tr>
        <tr><td>Materno</td><td><input type="text" name="materno" required value="<?php echo $su['materno']?>"></td></tr>
    	<tr><td>Cod_Rol</td>
        	
        	<td><select name="cod_rol" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_r as $sr){
				?>
                <option value="<?php echo $sr['cod_rol']?>" <?php echo $sr['cod_rol']==$su['cod_rol']?'selected="selected"':''?>><?php echo $sr['cod_rol']?> - <?php echo $sr['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Contraseña</td><td><input type="text" name="pswd" required value=""></td></tr>
        <tr><td>Fecha de Expiración</td><td><input type="date" name="fecha_expira" required value="<?php echo $su['fecha_expira']?>"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Modificar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
