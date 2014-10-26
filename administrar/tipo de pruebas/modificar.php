<?php
include_once("../../estructurabd/rec_tipo_prueba.php");
extract($_GET);

$rec_tipo_prueba=new rec_tipo_prueba;
$condicion="cod_rec_tipo_prueba  LIKE '$cod_r_t_p'";

$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro($condicion,0);
$rec_t_p=array_shift($rec_t_p);
?>
<h2>Modificar Tipo de Prueba</h2>
<form action="tipo de pruebas/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Tipo</td><td><input type="text" name="cod_tipo" max="3" maxlength="3" autofocus required value="<?php echo $rec_t_p['cod_tipo']?>" readonly></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_t_p['descripcion']?>"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
