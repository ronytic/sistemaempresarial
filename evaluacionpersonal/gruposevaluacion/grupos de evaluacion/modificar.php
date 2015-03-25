<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rh_grupo_mas.php");
extract($_GET);

$rh_grupo_mas=new rh_grupo_mas;
$condicion="codigo_grupo  LIKE '$codigo_grupo'";

$rh_g=$rh_grupo_mas->mostrarTodoRegistro($condicion,0);
$rh_g=array_shift($rh_g);

include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$rh_g['cod_cargo']."'",0,"descripcion");
$rec_c=array_shift($rec_c);

include_once("../../../estructurabd/rh_empleado.php");
$rh_empleado=new rh_empleado;
$rh_e=$rh_empleado->mostrarTodoRegistro("",0,"paterno,materno,nombre");

include_once("../../../estructurabd/rh_competencia_mas.php");
$rh_competencia_mas=new rh_competencia_mas;
$rh_c_m=$rh_competencia_mas->mostrarTodoRegistro("cod_competencia='".$rh_g['cod_competencia']."'",0,"descripcion");
$_SESSION['cedula_jefe']=$rh_g['cedula_jefe'];
?>
<h2>Datos del Evaluador</h2>
<form action="grupos de evaluacion/actualizar.php" method="post" >
	<input type="hidden" name="codigo_competencia" value="<?php echo $cod_competencia?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	
        <tr><td width="200">Nombre del Evaluador</td><td><select name="cedula_jefe" required class="form-control" disabled>
                        <?php foreach($rh_e as $re){
                            $r_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$re['cod_cargo']."'",0,"descripcion");
                            $r_c=array_shift($r_c);
                         ?>
                        <option value="<?php echo $re['cedula']?>" rel="<?php echo $r_c['descripcion']?>" rel_cod="<?php echo $r_c['cod_cargo']?>" <?php echo $re['cedula']==$rh_g['cedula_jefe']?'selected="selected"':'';?>><?php echo $re['paterno']?> <?php echo $re['materno']?> <?php echo $re['nombre']?></option>
                        <?php }?>
        </select></td></tr>
        <tr><td>Cargo</td><td><input type="text" name="cargo" max="3" maxlength="3" autofocus required class="form-control" readonly value="<?php echo $rec_c['descripcion']?>"></td></tr>
    </table>
<h2>Evaluación</h2>
<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
        
        <tr><td width="200">Competencia</td><td><select name="cod_competencia" required class="form-control" disabled>
                        <?php foreach($rh_c_m as $rcm){?>
                        <option value="<?php echo $rcm['cod_competencia']?>" <?php echo $rcm['cod_competencia']==$rh_g['cod_competencia']?'selected="selected"':'';?>><?php echo $rcm['descripcion']?></option>
                        <?php }?>
        </select></td></tr>
        <tr><td>Tipo</td><td><input type="text" name="tipo" max="3" maxlength="3" autofocus required class="form-control" readonly value="<?php echo $rcm['tipo']?>"></td></tr>
    </table>
    <h2>Personal asignado a evaluación</h2><div class="pull-right">
            <table class="table table-bordered">
                <tr>
                    <td><select name="cedula" required class="form-control">
        
            <option value="">---</option>
                        <?php foreach($rh_e as $re){
                            $r_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$re['cod_cargo']."'",0,"descripcion");
                            $r_c=array_shift($r_c);
                         ?>
                        <option value="<?php echo $re['cedula']?>" rel="<?php echo $r_c['descripcion']?>" rel_cod="<?php echo $r_c['cod_cargo']?>"><?php echo $re['paterno']?> <?php echo $re['materno']?> <?php echo $re['nombre']?></option>
                        <?php }?>
                </select>
                <br>
                
                <input type="button" name="Guardar" value="Añadir Persona" class="btn btn-xs btn-danger" id="anadirpersona">
                </td>
                <td><select></select><br><br><input type="submit" name="Guardar" value="Añadir Persona de un Cargo" class="btn btn-xs btn-danger"></td>
                </tr>
            </table>
            

    
    

     </div>
    <div class="listadoempleados">
    
    </div>
</form>
<script language="javascript">
$("#anadirpersona").click(function(){
    alert("asd");
    var cedula=$("select[name=cedula]").val();
    var cedula_jefe=$("select[name=cedula_jefe]").val();
    
    $.post("grupos de evaluacion/guardarempleados.php",{"cedula":cedula,"cedula_jefe":cedula_jefe},function(data){
        mostrar();    
    })    
});
mostrar();
function mostrar(){
        var cedula_jefe=$("select[name=cedula_jefe]").val();
    $.post("grupos de evaluacion/mostrarempleados.php",{"cedula_jefe":cedula_jefe},function(data){
         $(".listadoempleados").html(data);
    });
}
</script>