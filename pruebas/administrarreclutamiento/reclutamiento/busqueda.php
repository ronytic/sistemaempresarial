<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rec_reclutamiento.php");
include_once("../../../estructurabd/rec_cargo.php");
extract($_POST);
$cod_empresa=$_SESSION['cod_empresa'];
$rec_reclutamiento=new rec_reclutamiento;
$rec_cargo=new rec_cargo;
$condicion="cod_planta  LIKE '$cod_planta' and cod_empresa  LIKE '%$cod_empresa' and estado='A' ";

$rec_c=$rec_reclutamiento->mostrarTodoRegistro($condicion,0);

$i=0;
foreach($rec_c as $rc){$i++;
$rec_ca=$rec_cargo->mostrarTodoRegistro("cod_cargo='".$rc['cod_cargo']."'",0);
$rec_ca=array_shift($rec_ca);
?>
<option value="<?php echo $rc['cod_recluta']?>"><?php echo $rec_ca['descripcion']?></option>
<?php
}
?> 