<?php
include_once("../../login/check.php");
$folder="../../";
$cod_cargo=$_POST['cod_cargo'];
include_once("../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' and cod_cargo='$cod_cargo'",0,"descripcion");
$rec_c=array_shift($rec_c);


include_once("../../estructurabd/rec_bateria.php");
$rec_bateria=new rec_bateria;
$rec_b=$rec_bateria->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' and cod_bateria='".$rec_c['cod_bateria']."'",0,"descripcion");
?>
<option value="">Seleccionar</option>
            	<?php foreach($rec_b as $rb){
				?>
                <option value="<?php echo $rb['cod_bateria']?>"><?php echo $rb['cod_bateria']?> - <?php echo $rb['descripcion']?></option>
                <?php	
				}?>