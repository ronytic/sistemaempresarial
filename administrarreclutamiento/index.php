<?php
include_once("../login/check.php");
$folder="../";
$titulo="Reclutamientos";
$c=$_GET['c'];
if($c=="reclutamiento"){
	header("Location:reclutamiento/listar.php");
}else{
include_once("../cabecerahtml.php");
include_once("../cabecera.php");



?>

<fieldset>
<legend><?php echo ucwords($c)?></legend>

<a href="<?php echo $c?>/" class="btn btn-sm btn-info cargarajax">Nuevo <?php echo ucwords($c)?></a>
<a href="<?php echo $c?>/listar.php" class="btn btn-sm btn-warning cargarajax">Listar <?php echo ucwords($c)?></a>
<hr>
<div id="respuestaajax"></div>
</fieldset>


<?php
include_once("../pie.php");
}
?>
