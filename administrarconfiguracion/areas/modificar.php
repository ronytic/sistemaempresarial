<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_area.php");
extract($_GET);

$rec_area=new rec_area;
$condicion="codigo_area  LIKE '$codigo_area'";

$rec_a=$rec_area->mostrarTodoRegistro($condicion,0);
$rec_a=array_shift($rec_a);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Área</h2>
<form action="areas/actualizar.php" method="post">
	<input type="hidden" name="codigo_area" value="<?php echo $codigo_area?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_area" max="3" maxlength="3" autofocus required value="<?php echo $rec_a['cod_area']?>" readonly></td></tr>
        
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_a['descripcion']?>"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
