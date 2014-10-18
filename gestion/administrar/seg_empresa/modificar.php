<?php
include_once("../../../estructurabd/seg_empresa.php");
extract($_GET);

$seg_empresa=new seg_empresa;
$condicion="cod_empresa  LIKE '$cod_empresa'";

$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0);
$seg_e=array_shift($seg_e);
?>
<h2>Modificar Registro</h2>
<form action="seg_empresa/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Empresa</td><td><input type="text" name="cod_empresa" max="3" maxlength="3" autofocus required value="<?php echo $seg_e['cod_empresa']?>" readonly></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $seg_e['descripcion']?>"></td></tr>
        <tr><td>Dirección</td><td><input type="text" name="direccion" value="<?php echo $seg_e['direccion']?>"></td></tr>
        <tr><td>Teléfono 1</td><td><input type="text" name="telefono1" value="<?php echo $seg_e['telefono1']?>"></td></tr>
        <tr><td>Teléfono 2</td><td><input type="text" name="telefono2" value="<?php echo $seg_e['telefono2']?>"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
