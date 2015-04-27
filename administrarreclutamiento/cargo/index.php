<?php 
include_once("../../login/check.php");
$folder="../../";


include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
include_once("../../estructurabd/rec_bateria.php");
$rec_bateria=new rec_bateria;
$rec_b=$rec_bateria->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
?>
<h2>Nuevo Cargo</h2>
<form action="cargo/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_cargo" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required class="form-control"></td></tr>
        <tr><td>Bateria</td><td><select name="cod_bateria" class="form-control">
            <option value="">Seleccionar</option>
        <?php foreach($rec_b as $rb){
            ?><option value="<?php echo $rb['cod_bateria']?>"><?php echo $rb['descripcion']?></option><?php    
        }?>
        </select></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
