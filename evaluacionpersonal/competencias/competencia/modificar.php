<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_competencia_mas.php");
extract($_GET);

$rh_competencia_mas=new rh_competencia_mas;
$condicion="cod_competencia  LIKE '$cod_competencia'";

$rh_c=$rh_competencia_mas->mostrarTodoRegistro($condicion,0);
$rh_c=array_shift($rh_c);

include_once("../../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

?>
<h2>Modificar Competencia</h2>
<form action="competencia/actualizar.php" method="post">
	<input type="hidden" name="codigo_competencia" value="<?php echo $cod_competencia?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_competencia" max="3" maxlength="3" autofocus required value="<?php echo $rh_c['cod_competencia']?>" readonly></td></tr>
        
            
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rh_c['descripcion']?>" class="form-control"></td></tr>
        <tr><td>Tipo</td><td><input type="text" name="tipo" max="3" maxlength="3" autofocus required value="<?php echo $rh_c['tipo']?>"></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
