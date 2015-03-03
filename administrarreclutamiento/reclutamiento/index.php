<?php 
include_once("../../login/check.php");
$folder="../../";

$login=$_SESSION['login'];
include_once("../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' and codigo_cargo IN(SELECT cod_cargo FROM rec_planta_cargo WHERE cod_empresa='".$_SESSION['cod_empresa']."' and cod_planta='".$_POST['cod_planta']."')",0,"descripcion");

include_once("../../estructurabd/rec_area.php");
$rec_area=new rec_area;
$rec_a=$rec_area->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

include_once("../../estructurabd/rec_planta.php");
$rec_planta=new rec_planta;
$rec_p=$rec_planta->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' and cod_planta IN (SELECT cod_planta FROM rec_planta_usuario WHERE login = '$login')",0,"descripcion");

include_once("../../estructurabd/rec_bateria.php");
$rec_bateria=new rec_bateria;
$rec_b=$rec_bateria->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
$titulo="Nuevo Reclutamiento";
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<h2>Nuevo Reclutamiento</h2>
<form action="guardar.php" method="post">
<input type="hidden" name="cod_planta" value="<?php echo $_POST['cod_planta']?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	
        
        
        <tr><td>Regional</td><td><fieldset disabled><select name="cod_planta" autofocus required disabled>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_p as $rp){
				?>
                <option value="<?php echo $rp['cod_planta']?>" <?php echo $rp['cod_planta']==$_POST['cod_planta']?'selected="selected"':'';?>><?php echo $rp['cod_planta']?> - <?php echo $rp['descripcion']?></option>
                <?php	
				}?>
            </select></fieldset>
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
        <tr><td>Cargo</td><td><select name="cod_cargo" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_c as $rc){
				?>
                <option value="<?php echo $rc['cod_cargo']?>"><?php echo $rc['cod_cargo']?> - <?php echo $rc['descripcion']?></option>
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
        <tr><td>Fecha de Inicio</td><td><input type="date" name="fecha_inicio" required value="<?php echo fecha2Str("",0)?>"></td></tr>
        
        <tr><td>Fecha de Limite</td><td><input type="date" name="fecha_limite" required value="<?php echo fecha2Str("",0)?>"></td></tr>
        
        <tr><td>Prioridad</td><td><select name="prioridad">
        							<option value="A">Alta</option>
        							<option value="M">Media</option>
                                    <option value="B">Baja</option>
                                    </select></td></tr>
        <tr><td>Responsable</td><td><input type="text" name="responsable" required></td></tr>
        <?php /*<tr><td>Estado</td><td><select name="estado">
        							<option value="A">Activo</option>
        							<option value="C">Cerrado</option>
                                    </select></td></tr>*/?>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
