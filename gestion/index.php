<?php
include_once("cabecerahtml.php");
include_once("cabecera.php");
?>
<form action="crear.php" method="post" class="formulario">
	<input type="submit" value="Crear Tablas" class="btn btn-danger">
</form>
<hr class="separador">
<fieldset>
<legend>Resultado</legend>
<div id="respuestaformulario"></div>
</fieldset>
<?php
include_once("pie.php");
?>