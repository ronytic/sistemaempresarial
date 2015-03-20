<?php 
include_once("../../login/check.php");
$folder="../../../";
include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;

include_once("../../../estructurabd/rh_empleado.php");
$rh_empleado=new rh_empleado;
$rh_e=$rh_empleado->mostrarTodoRegistro("",0,"paterno,materno,nombre");

include_once("../../../estructurabd/rh_competencia_mas.php");
$rh_competencia_mas=new rh_competencia_mas;
$rh_c_m=$rh_competencia_mas->mostrarTodoRegistro("",0,"descripcion");
?>
<script language="javascript">
$("select[name=cedula_jefe]").change(cambiarjefe);
cambiarjefe();
function cambiarjefe(){
    var cargo=$("select[name=cedula_jefe]>option:selected").attr("rel");
    var cod_cargo=$("select[name=cedula_jefe]>option:selected").attr("rel_cod");
    $("input[name=cargo]").val(cargo);
    $("input[name=cod_cargo]").val(cod_cargo);
    
}
</script>
<h2>Nuevo Grupo de Evaluación</h2>
<form action="grupos de evaluacion/guardar.php" method="post">
    <input type="hidden" name="cod_cargo">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	
        <tr><td width="200">Jefe</td><td><select name="cedula_jefe" required class="form-control">
                        <?php foreach($rh_e as $re){
                            $r_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$re['cod_cargo']."'",0,"descripcion");
                            $r_c=array_shift($r_c);
                         ?>
                        <option value="<?php echo $re['cedula']?>" rel="<?php echo $r_c['descripcion']?>" rel_cod="<?php echo $r_c['cod_cargo']?>"><?php echo $re['paterno']?> <?php echo $re['materno']?> <?php echo $re['nombre']?></option>
                        <?php }?>
        </select></td></tr>
        <tr><td>Cargo</td><td><input type="text" name="cargo" max="3" maxlength="3" autofocus required class="form-control" readonly></td></tr>
        <tr><td>Competencia</td><td><select name="cod_competencia" required class="form-control">
                        <?php foreach($rh_c_m as $rcm){?>
                        <option value="<?php echo $rcm['cod_competencia']?>"><?php echo $rcm['descripcion']?></option>
                        <?php }?>
        </select></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
