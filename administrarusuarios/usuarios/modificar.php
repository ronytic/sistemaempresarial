<?php
include_once("../../estructurabd/seg_usuario.php");
extract($_GET);



include_once("../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0,"descripcion");

$seg_usuario=new seg_usuario;
$condicion="cod_usuario  LIKE '$cod_usuario'";

$seg_u=$seg_usuario->mostrarTodoRegistro($condicion,0);
$su=array_shift($seg_u);
?>
<h2>Modificar Usuario</h2>
<form action="usuarios/actualizar.php" method="post">
	<input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
        <tr><td>Login</td><td><input type="text" name="login" required value="<?php echo $su['login']?>"></td></tr>
        <tr><td>Nombre</td><td><input type="text" name="nombre" required value="<?php echo $su['nombre']?>"></td></tr>
        
        <tr><td>Paterno</td><td><input type="text" name="paterno" required value="<?php echo $su['paterno']?>"></td></tr>
        <tr><td>Materno</td><td><input type="text" name="materno" required value="<?php echo $su['materno']?>"></td></tr>
    	<tr><td>Rol</td>
        	
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
