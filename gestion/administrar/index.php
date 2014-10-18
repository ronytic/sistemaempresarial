<?php
$folder="../";
$titulo="Administrar Tablas";
$c=$_GET['c'];
include_once("../cabecerahtml.php");
include_once("../cabecera.php");
?>

<fieldset>
<legend><?php echo $c?></legend>

<a href="<?php echo $c?>/" class="btn btn-sm btn-info cargarajax">Nuevo Registro</a>
<a href="<?php echo $c?>/listar.php" class="btn btn-sm btn-warning cargarajax">Listar Registros</a>
<hr>
<div id="respuestaajax"></div>
</fieldset>


<?php
include_once("../pie.php");
?>