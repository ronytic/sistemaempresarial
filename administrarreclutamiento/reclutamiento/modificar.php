<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_reclutamiento.php");
extract($_GET);

$rec_reclutamiento=new rec_reclutamiento;
$condicion="cod_recluta  LIKE '$cod_recluta'";

$rec_cl=$rec_reclutamiento->mostrarTodoRegistro($condicion,0);
$rec_cl=array_shift($rec_cl);

include_once("../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

include_once("../../estructurabd/rec_area.php");
$rec_area=new rec_area;
$rec_a=$rec_area->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

include_once("../../estructurabd/rec_bateria.php");
$rec_bateria=new rec_bateria;
$rec_b=$rec_bateria->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Cargo</h2>
<form action="reclutamiento/actualizar.php" method="post">
	<input type="hidden" name="cod_recluta" value="<?php echo $cod_recluta?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cargo</td><td><select name="cod_cargo" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_c as $rc){
				?>
                <option value="<?php echo $rc['cod_cargo']?>"><?php echo $rc['cod_cargo']?> - <?php echo $rc['descripcion']?></option>
                <?php	
				}?>
            </select>
            </td></tr>
        <tr><td>Área</td><td><select name="cod_area" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_a as $ra){
				?>
                <option value="<?php echo $ra['cod_area']?>"><?php echo $ra['cod_area']?> - <?php echo $ra['descripcion']?></option>
                <?php	
				}?>
            </select>
            </td></tr>
        <tr><td>Bateria</td><td><select name="cod_bateria" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_b as $rb){
				?>
                <option value="<?php echo $rb['cod_bateria']?>"><?php echo $rb['cod_bateria']?> - <?php echo $rb['descripcion']?></option>
                <?php	
				}?>
            </select>
            </td></tr>
        <tr><td>Fecha de Inicio</td><td><input type="date" name="fecha_inicio" required value="<?php echo $rec_cl['fecha_inicio']?>"></td></tr>
        
        <tr><td>Fecha de Limite</td><td><input type="date" name="fecha_limite" required value="<?php echo $rec_cl['fecha_limite']?>"></td></tr>
        
        <tr><td>Prioridad</td><td><select name="prioridad">
        							<option value="A">Alta</option>
        							<option value="M">Media</option>
                                    <option value="B">Baja</option>
                                    </select></td></tr>
        <tr><td>Responsable</td><td><input type="text" name="responsable" required value="<?php echo $rec_cl['responsable']?>"></td></tr>
        <tr><td>Estado</td><td><select name="estado">
        							<option value="A">Activo</option>
        							<option value="C">Cerrado</option>
                                    </select></td></tr>
        <tr><td>Usuario</td><td><input type="text" name="usuario" required value="<?php echo $rec_cl['usuario']?>"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
