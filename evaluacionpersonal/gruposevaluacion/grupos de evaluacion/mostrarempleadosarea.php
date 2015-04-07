<?php
include_once("../../login/check.php");

extract($_GET);
include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;

include_once("../../../estructurabd/rh_empleado.php");
$rh_empleado=new rh_empleado;

$cod_planta=$_SESSION['cod_planta'];
$cod_area=$_POST['cod_area'];
$cod_planta="PL2";
$rh_empleado=$rh_empleado->mostrarTodoRegistro("cod_regional='".$cod_planta."' and cod_area='".$cod_area."'",0,"");

?>            <option value="">---</option>
        <?php
        foreach($rh_empleado as $re){$i++;
        $r_c=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$re['cod_cargo']."'",0,"descripcion");
        print_r($r_c);
        $r_c=array_shift($r_c);
        
        ?>
        
            <option value="<?php echo $re['cedula']?>" rel="<?php echo $r_c['descripcion']?>" rel_cod="<?php echo $r_c['cod_cargo']?>"><?php echo $re['paterno']?> <?php echo $re['materno']?> <?php echo $re['nombre']?></option>
        <?php    
        }
        ?>