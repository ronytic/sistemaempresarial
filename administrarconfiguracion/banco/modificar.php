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
    
    <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#nuevo" aria-controls="home" role="tab" data-toggle="tab" class="nuevotab">Nuevo</a></li>
    <li role="presentation"><a href="#modificartab" aria-controls="profile" role="tab" data-toggle="tab" class="modificartab">Modificar</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="nuevo">
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
    </div>
    <div role="tabpanel" class="tab-pane" id="modificartab">
        <form action="banco/actualizar_pregunta.php" method="post" class="formulario">
        <input type="hidden" name="cod_banco" required value="<?php echo $rec_b['cod_banco']?>">
        <input type="hidden" name="codigo_banco_preguntas" required value="">
        <table class="table table-bordered" style="background-color:#FFFFFF">
            <thead>
            <tr><th>Nro</th><th>Pregunta</th><th>Respuestas</th><th>Respuesta Correcta</th></tr>
            </thead>
            <tr>
                <td><input type="text" name="nro" required class="col-sm-12" value=""></td>
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
            <td colspan="4"><input type="submit" name="Modificar" value="Modificar" class="btn btn-success"></td>
            </tr>
        </table>
        </form>
    </div>
  </div>

</div>
    
    
    	
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
    
    $(document).on("click",".modificar",function(e){
        e.preventDefault();
        var valor=$(this).attr("href");
        $.post(valor,"",function(data){
        
            
            $("#modificartab input[name=cod_banco]").attr("value",data.cod_banco);
            $("#modificartab input[name=codigo_banco_preguntas]").attr("value",data.codigo_banco_preguntas);
            
            $("#modificartab input[name=nro]").attr("value",data.nro);
            $("#modificartab input[name=pregunta]").attr("value",data.pregunta);
            $("#modificartab input[name=opcion1]").attr("value",data.opcion1);
            $("#modificartab input[name=opcion2]").attr("value",data.opcion2);
            $("#modificartab input[name=opcion3]").attr("value",data.opcion3);
            $("#modificartab input[name=opcion4]").attr("value",data.opcion4);
            $("#modificartab input[name=opcion5]").attr("value",data.opcion5);
            $("#modificartab select[name=correcta] >option").removeAttr("selected");
            $("#modificartab select[name=correcta] >option[value="+data.correcta+"]").attr("selected","selected");
        $(".modificartab").click();
                $('html, body').animate({scrollTop:$(".modificartab").offset().top}, 'slow');
        },"json")
        
    })
    $(document).on("click","input[name=Modificar]",function(e){
         //$("#modificartab input").attr("value","");
         $(".nuevotab").click();
    })
    $(document).ajaxSuccess(function(event, XMLHttpRequest, ajaxOptions) {
        $(".formulario").reset();
    });
</script>