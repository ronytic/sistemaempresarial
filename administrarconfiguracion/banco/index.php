<?php 
include_once("../../login/check.php");
$folder="../../";


include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;
$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
?>
<h2>Nuevo Banco</h2>
<form action="banco/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_banco" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Prueba</td><td><select name="cod_prueba">
                	<?php foreach($rec_p as $rp){
					?>
                    
                    <option value="<?php echo $rp['cod_prueba']?>"><?php echo $rp['cod_prueba']?> - <?php echo $rp['descripcion']?></option>
                    <?php	
					}?>
                </select></td></tr>
        <tr><td>Nro</td><td><input type="text" name="nro" required></td></tr>
        <tr><td>Pregunta</td><td><input type="text" name="pregunta" required size="100"></td></tr>
        <tr><td>Opción 1</td><td><input type="text" name="opcion1" required size="40"></td></tr>
        <tr><td>Opción 2</td><td><input type="text" name="opcion2" required size="40"></td></tr>
        <tr><td>Opción 3</td><td><input type="text" name="opcion3" size="40"></td></tr>
        <tr><td>Opción 4</td><td><input type="text" name="opcion4" size="40"></td></tr>
        <tr><td>Opción 5</td><td><input type="text" name="opcion5" size="40"></td></tr>
        <tr><td>Respuesta Correcta</td><td><select name="correcta" required>
        	<option value="1">1</option>
        	<option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
