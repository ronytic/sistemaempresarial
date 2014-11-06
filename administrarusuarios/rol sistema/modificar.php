<?php
include_once("../../login/check.php");
include_once("../../estructurabd/seg_rol.php");
extract($_GET);

$seg_rol=new seg_rol;
$condicion="cod_rol  LIKE '$cod_rol'";

$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0);
$seg_r=array_shift($seg_r);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Cargo</h2>
<form action="rol sistema/actualizar.php" method="post">
	<input type="hidden" name="cod_rol" value="<?php echo $cod_rol?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_area" max="3" maxlength="3" autofocus required value="<?php echo $seg_r['cod_rol']?>" readonly></td></tr>
        
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $seg_r['descripcion']?>" size="40"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
