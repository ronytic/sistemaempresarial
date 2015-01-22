<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_banco.php");
extract($_GET);

$rec_banco=new rec_banco;
$condicion="codigo_banco  LIKE '$codigo_banco'";

$rec_b=$rec_banco->mostrarTodoRegistro($condicion,0);
$rec_b=array_shift($rec_b);

include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;
$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Área</h2>
<form action="banco/actualizar.php" method="post">
	<input type="hidden" name="codigo_banco" value="<?php echo $codigo_banco?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_banco" max="3" maxlength="3" autofocus required value="<?php echo $rec_b['cod_banco']?>"></td></tr>
        <tr><td>Prueba</td><td><select name="cod_prueba">
                	<?php foreach($rec_p as $rp){
					?>
                    
                    <option value="<?php echo $rp['cod_prueba']?>" <?php echo $rec_b['cod_prueba']==$rp['cod_prueba']?'selected="selected"':'';?>><?php echo $rp['cod_prueba']?> - <?php echo $rp['descripcion']?></option>
                    <?php	
					}?>
                </select></td></tr>
        <tr><td>Nro</td><td><input type="text" name="nro" required value="<?php echo $rec_b['nro']?>"></td></tr>
        <tr><td>Pregunta</td><td><input type="text" name="pregunta" required size="100" value="<?php echo $rec_b['pregunta']?>"></td></tr>
        <tr><td>Opción 1</td><td><input type="text" name="opcion1" required size="40" value="<?php echo $rec_b['opcion1']?>"></td></tr>
        <tr><td>Opción 2</td><td><input type="text" name="opcion2" required size="40" value="<?php echo $rec_b['opcion2']?>"></td></tr>
        <tr><td>Opción 3</td><td><input type="text" name="opcion3" size="40" value="<?php echo $rec_b['opcion3']?>"></td></tr>
        <tr><td>Opción 4</td><td><input type="text" name="opcion4" size="40" value="<?php echo $rec_b['opcion4']?>"></td></tr>
        <tr><td>Opción 5</td><td><input type="text" name="opcion5" size="40" value="<?php echo $rec_b['opcion5']?>"></td></tr>
        <tr><td>Respuesta Correcta</td><td><select name="correcta" required>
        	<option value="1" <?php echo $rec_b['correcta']=="1"?'selected="selected"':'';?>>1</option>
        	<option value="2" <?php echo $rec_b['correcta']=="2"?'selected="selected"':'';?>>2</option>
            <option value="3" <?php echo $rec_b['correcta']=="3"?'selected="selected"':'';?>>3</option>
            <option value="4" <?php echo $rec_b['correcta']=="4"?'selected="selected"':'';?>>4</option>
            <option value="5" <?php echo $rec_b['correcta']=="5"?'selected="selected"':'';?>>5</option>
        </select></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
