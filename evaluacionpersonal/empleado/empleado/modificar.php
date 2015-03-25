<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_empleado.php");
extract($_GET);

$rh_empleado=new rh_empleado;
$condicion="cedula  LIKE '$cedula'";

$rh_e=$rh_empleado->mostrarTodoRegistro($condicion,0);
$re=array_shift($rh_e);

include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Cargo</h2>
<form action="empleado/actualizar.php" method="post">
	<input type="hidden" name="cedula" value="<?php echo $cedula?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cédula de Identidad</td><td><input type="text" name="cedula" max="12" maxlength="12" autofocus required value="<?php echo $cedula?>"></td></tr>
        <tr><td>Nombres y Apellidos</td><td><input type="text" name="nombre" required class="form-control" value="<?php echo $re['nombre']?>"></td></tr>
        <?php /*<tr><td>Apellido Paterno</td><td><input type="text" name="paterno" required class="form-control" value="<?php echo $re['paterno']?>"></td></tr>
        <tr><td>Apellido Materno</td><td><input type="text" name="materno" required class="form-control" value="<?php echo $re['materno']?>"></td></tr>*/?>
        <tr><td>Cargo</td><td><select name="cod_cargo">
            <?php foreach($rec_c as $rc){
            ?><option value="<?php echo $rc['cod_cargo']?>" <?php echo $rc['cod_cargo']==$re['cod_cargo']?'selected="selected"':'';?>><?php echo $rc['descripcion']?></option><?php    
            }?>
        </select></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
