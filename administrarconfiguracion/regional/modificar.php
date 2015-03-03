<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_planta.php");
extract($_GET);

$rec_planta=new rec_planta;
$condicion="codigo_planta  LIKE '$codigo_planta'";

$rec_p=$rec_planta->mostrarTodoRegistro($condicion,0);
$rec_p=array_shift($rec_p);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Planta</h2>
<form action="regional/actualizar.php" method="post">
	<input type="hidden" name="codigo_planta" value="<?php echo $codigo_planta?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_area" max="3" maxlength="3" autofocus required value="<?php echo $rec_p['cod_planta']?>" readonly></td></tr>
        
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_p['descripcion']?>"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
