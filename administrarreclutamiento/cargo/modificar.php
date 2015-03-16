<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_cargo.php");
extract($_GET);

$rec_cargo=new rec_cargo;
$condicion="codigo_cargo  LIKE '$codigo_cargo'";

$rec_c=$rec_cargo->mostrarTodoRegistro($condicion,0);
$rec_c=array_shift($rec_c);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Cargo</h2>
<form action="cargo/actualizar.php" method="post">
	<input type="hidden" name="codigo_cargo" value="<?php echo $codigo_cargo?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_area" max="3" maxlength="3" autofocus required value="<?php echo $rec_c['cod_cargo']?>" readonly></td></tr>
        
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_c['descripcion']?>" class="form-control"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
