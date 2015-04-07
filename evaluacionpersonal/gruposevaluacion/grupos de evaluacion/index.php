<?php 
include_once("../../login/check.php");
$folder="../../../";
//print_r($_SESSION);
include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;

include_once("../../../estructurabd/rec_area.php");
$rec_area=new rec_area;

include_once("../../../estructurabd/rh_empleado.php");
$rh_empleado=new rh_empleado;
$rh_e=$rh_empleado->mostrarTodoRegistro("",0,"paterno,materno,nombre");

include_once("../../../estructurabd/rh_competencia_mas.php");
$rh_competencia_mas=new rh_competencia_mas;
$rh_c_m=$rh_competencia_mas->mostrarTodoRegistro("",0,"descripcion");

$cod_planta=$_SESSION['cod_planta'];
$cod_planta="PL2";
$rec_emp=$rh_empleado->mostrarTodoRegistro("cod_regional='$cod_planta' GROUP BY cod_area",0,"");
?>
<script language="javascript">
$("select[name=cedula_jefe]").change(cambiarjefe);
$("select[name=cod_area]").change(mostrarempleados);
cambiarjefe();
function cambiarjefe(){
    var cargo=$("select[name=cedula_jefe]>option:selected").attr("rel");
    var cod_cargo=$("select[name=cedula_jefe]>option:selected").attr("rel_cod");
    $("input[name=cargo]").val(cargo);
    $("input[name=cod_cargo]").val(cod_cargo);
    
}
mostrarempleados();

function mostrarempleados(){
    var cod_area=$("select[name=cod_area]").val();    
    $.post("grupos de evaluacion/mostrarempleadosarea.php",{'cod_area':cod_area},function(data){
        $("select[name=cedula_jefe]").html(data)
    });
}
</script>
<h2>Nuevo Grupo de Evaluación</h2>
<form action="grupos de evaluacion/guardar.php" method="post">
    <input type="hidden" name="cod_cargo">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Area</td><td><select name="cod_area" required class="form-control">
        <option value="">---</option>
                        <?php foreach($rec_emp as $re){
                            $ra=$rec_area->mostrarTodoRegistro("cod_area='".$re['cod_area']."'",0,"descripcion");
                            $ra=array_shift($ra);
                            ?>
                        <option value="<?php echo $ra['cod_area']?>"><?php echo $ra['descripcion']?></option>
                        <?php }?>
        </select></td></tr>
        <tr><td width="200">Evaluador</td><td><select name="cedula_jefe" required class="form-control">

                        
        </select></td></tr>
        <tr><td>Cargo</td><td><input type="text" name="cargo" max="3" maxlength="3" autofocus required class="form-control" readonly></td></tr>
        <tr><td>Competencia</td><td><select name="cod_competencia" required class="form-control">
        <option value="">---</option>
                        <?php foreach($rh_c_m as $rcm){?>
                        <option value="<?php echo $rcm['cod_competencia']?>"><?php echo $rcm['descripcion']?></option>
                        <?php }?>
        </select></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
