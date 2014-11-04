<?php 
$folder="../../";
include_once("../../login/check.php");
include_once("../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
//print_r($_SESSION);
?>
<h2>Nuevo Registro de Usuario</h2>
<form action="usuarios/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
        <tr><td>Sistema</td><td><select name="cod_sistema"  required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_s as $ss){
				?>
                <option value="<?php echo $ss['cod_sistema']?>"><?php echo $ss['cod_sistema']?> - <?php echo $ss['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Login</td><td><input type="text" name="login" required></td></tr>
        <tr><td>Nombre</td><td><input type="text" name="nombre" required></td></tr>
        
        <tr><td>Paterno</td><td><input type="text" name="paterno" required></td></tr>
        <tr><td>Materno</td><td><input type="text" name="materno" required></td></tr>
    	<tr><td>Rol</td>
        	
        	<td><select name="cod_rol" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_r as $sr){
				?>
                <option value="<?php echo $sr['cod_rol']?>"><?php echo $sr['cod_rol']?> - <?php echo $sr['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Contraseña</td><td><input type="text" name="pswd" required></td></tr>
        <tr><td>Fecha de Expiración</td><td><input type="date" name="fecha_expira" required></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
