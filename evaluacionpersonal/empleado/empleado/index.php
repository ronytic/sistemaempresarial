<?php 
include_once("../../login/check.php");
$folder="../../../";


include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
?>
<h2>Nuevo Empleado</h2>
<form action="empleado/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cédula de Identidad</td><td><input type="text" name="cedula" max="12" maxlength="12" autofocus required></td></tr>
        <tr><td>Nombres y Apellidos</td><td><input type="text" name="nombre" required class="form-control"></td></tr>
        <?php /*<tr><td>Apellido Paterno</td><td><input type="text" name="paterno" required class="form-control"></td></tr>
        <tr><td>Apellido Materno</td><td><input type="text" name="materno" required class="form-control"></td></tr>*/?>
        <tr><td>Cargo</td><td><select name="cod_cargo">
            <?php foreach($rec_c as $rc){
            ?><option value="<?php echo $rc['cod_cargo']?>"><?php echo $rc['descripcion']?></option><?php    
            }?>
        </select></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
