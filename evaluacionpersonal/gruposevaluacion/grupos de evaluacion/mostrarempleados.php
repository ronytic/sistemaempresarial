<?php
include_once("../../login/check.php");

extract($_GET);
include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;

        include_once("../../../estructurabd/rh_empleado.php");
$rh_empleado=new rh_empleado;

$cedula_jefe=$_SESSION['cedula_jefe'];
include_once("../../../estructurabd/rh_grupo_det.php");
$rh_grupo_det=new rh_grupo_det;
$rh_g_det=$rh_grupo_det->mostrarTodoRegistro("cedula_jefe='".$cedula_jefe."'",0,"");

?>
<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
        <thead>
            <tr>
                <th width="50">Nº</th><th>Nombre</th><th>Cargo</th>
            </tr>
            
        </thead>
        <?php
        foreach($rh_g_det as $rgd){$i++;
        

$rh_e=$rh_empleado->mostrarTodoRegistro("cedula='".$rgd['cedula_empleado']."'",0,"nombre");
$rh_e=array_shift($rh_e);
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$rh_e['cod_cargo']."'",0,"descripcion");
$rec_c=array_shift($rec_c);
        ?>
        <tr><td><?php echo $i?></td>
            <td><?php echo $rh_e['nombre']?></td>
            <td><?php echo $rec_c['descripcion']?></td>
        </tr>
        <?php    
        }
        ?>
    </table>