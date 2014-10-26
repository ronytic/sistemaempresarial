<?php 
$folder="../../";
include_once("../../login/check.php");

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro($condicion,0,"descripcion");
?>
<h2>Nuevo Registro de Prueba</h2>
<form action="pruebas/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Prueba</td><td><input type="text" name="cod_prueba" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Tipo de Prueba</td><td><select name="cod_tipo" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_t_p as $rtp){
				?>
                <option value="<?php echo $rtp['cod_tipo']?>"><?php echo $rtp['cod_tipo']?> - <?php echo $rtp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
