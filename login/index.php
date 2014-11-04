<?php
session_start();
//print_r($_SESSION);
include_once("../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro("",0,"descripcion");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acceso al Sistema</title>
</head>

<body>
<fieldset>
<legend>Datos de Acceso</legend>
<?php
	if(isset($_GET['incompleto'])){
	?>
	<div class="alert alert-error">
		<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
		Los datos estan incompleto
	</div>
	<?php
	}
	if(isset($_GET['error'])){
	?>
	<div class="alert alert-info">
		<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
		Los datos introducidos son erroneos, intentelo nuevamente
	</div>
	<?php
	}
?>
<form action="login.php" method="post">
	<input type="hidden" name="u" value="<?php echo $_GET['u'];?>">
	<table>
    	<tr><td>Empresa</td><td><select name="cod_empresa" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>"><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
    	<tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
        <tr><td>Contraseña</td><td><input type="password" name="contrasena"></td></tr>
        <tr><td></td><td><input type="submit" name="" value="Ingresar"></td></tr>
    </table>
</form>
</fieldset>
</body>
</html>
