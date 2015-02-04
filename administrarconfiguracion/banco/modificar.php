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
<h2>Modificar Banco</h2>
<form action="banco/actualizar.php" method="post">
	<input type="hidden" name="codigo_banco" value="<?php echo $codigo_banco?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_banco" max="3" maxlength="3" autofocus required value="<?php echo $rec_b['cod_banco']?>" readonly></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required size="100" value="<?php echo $rec_b['descripcion']?>"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
</form>

<fieldset>
	<legend>Banco de Preguntas</legend>
    	<form action="banco/guardar_pregunta.php" method="post" class="formulario">
        <input type="hidden" name="cod_banco" required value="<?php echo $rec_b['cod_banco']?>">
        
        <table class="table table-bordered" style="background-color:#FFFFFF">
            <thead>
            <tr><th>Nro</th><th>Pregunta</th><th>Respuestas</th><th>Respuesta Correcta</th></tr>
            </thead>
            <tr>
                <td><input type="text" name="nro" required class="col-sm-12"></td>
                <td><input type="text" name="pregunta" required size="100" class="col-sm-12"></td>
                <td>	Opción 1<br><input type="text" name="opcion1" required size="40"  class="col-sm-12"><hr>Opción 2<br><input type="text" name="opcion2" required size="40"  class="col-sm-12"><hr>Opción 3<br><input type="text" name="opcion3"  size="40"  class="col-sm-12"><hr>Opción 4<br><input type="text" name="opcion4"  size="40"  class="col-sm-12"><hr>Opción 5<br><input type="text" name="opcion5"  size="40"  class="col-sm-12"></td>
                <td><select name="correcta" required>
        	<option value="1">1</option>
        	<option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select></td>
                </tr>
			<tr>
            <td colspan="4"><input type="submit" name="Guardar" value="Agregar" class="btn btn-success"></td>
            </tr>
        </table>
        
        
    </form>
    <fieldset>
    	<legend>Listado de Banco de Preguntas</legend>
        <div id="respuestaformulario">
	    </div>
    </fieldset>
    

</fieldset>

<script language="javascript" type="text/javascript">
	//$(document).on("ready",function(){
		
		$.post("banco/listar_preguntas.php",{'cod_banco':'<?php echo $rec_b['cod_banco']?>'},function(data){
			$("#respuestaformulario").html(data);
		});
		
	//});
</script>