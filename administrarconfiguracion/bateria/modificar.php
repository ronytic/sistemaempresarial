<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_bateria.php");
extract($_GET);

$rec_bateria=new rec_bateria;
$condicion="codigo_bateria  LIKE '$codigo_bateria'";

$rec_b=$rec_bateria->mostrarTodoRegistro($condicion,0);
$rec_b=array_shift($rec_b);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;
$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Bateria</h2>
<form action="bateria/actualizar.php" method="post">
	<input type="hidden" name="codigo_bateria" value="<?php echo $codigo_bateria?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_bateria" max="3" maxlength="3" autofocus required value="<?php echo $rec_b['cod_bateria']?>" readonly></td></tr>
        
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_b['descripcion']?>" class="col-xs-12"></td></tr>

        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
<fieldset>
	<legend>Pruebas</legend>
    	<form action="bateria/guardar_prueba.php" method="post" class="formulario">
        <input type="hidden" name="cod_bateria" required value="<?php echo $rec_b['cod_bateria']?>">
        
        <table class="table table-bordered" style="background-color:#FFFFFF">
            <thead>
            <tr><th>Pruebas</th></tr>
            </thead>
            <tr>
                <td>
               	<select name="cod_prueba">
                    <option value="">Seleccionar</option>
                	<?php foreach($rec_p as $rp){
					?>
                    
                    <option value="<?php echo $rp['cod_prueba']?>"><?php echo $rp['cod_prueba']?> - <?php echo $rp['descripcion']?></option>
                    <?php	
					}?>
                </select>
                <br>Orden:<br><input type="number" name="orden" min="0" value="0" class="der">
                <br><br><input type="submit" name="Guardar" value="Agregar" class="btn btn-success"> 
                </td>
                </tr>
        </table>
        
        
    </form>
    <fieldset>
    	<legend>Listado de Pruebas</legend>
        <div id="respuestaformulario">
	    </div>
    </fieldset>
    

</fieldset>

<script language="javascript" type="text/javascript">
	//$(document).on("ready",function(){
		var cod_bateria="<?php echo $rec_b['cod_bateria']?>"
		$.post("bateria/listar_pruebas.php",{'login':'<?php echo $su['login']?>',"cod_bateria":cod_bateria},function(data){
			$("#respuestaformulario").html(data);
		});
		
	//});
</script>