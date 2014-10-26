<?php
include_once("../../estructurabd/rec_prueba.php");
extract($_GET);

$rec_prueba=new rec_prueba;
$condicion="cod_prueba  LIKE '$cod_prueba'";

$rec_p=$rec_prueba->mostrarTodoRegistro($condicion,0);
$rec_p=array_shift($rec_p);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro($condicion,0,"descripcion");

print_r($rec_t_p);
?>
<h2>Modificar Prueba</h2>
<form action="pruebas/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Prueba</td><td><input type="text" name="cod_prueba" max="3" maxlength="3" autofocus required value="<?php echo $rec_p['cod_prueba']?>" readonly></td></tr>
        
        <tr><td>Tipo de Prueba</td><td><select name="cod_tipo" required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_t_p as $rtp){
				?>
                <option value="<?php echo $rtp['cod_tipo']?>" <?php echo $rtp['cod_tipo']==$rec_p['cod_tipo']?'selected="selected"':''?>><?php echo $rtp['cod_tipo']?> - <?php echo $rtp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_p['descripcion']?>"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
