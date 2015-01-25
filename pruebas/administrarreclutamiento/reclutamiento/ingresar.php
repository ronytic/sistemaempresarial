<?php 
include_once("../../login/check.php");
$folder="../../../";

$titulo="Seleccionar Candidato";
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<a href="javascript:history.back()" class="btn btn-xs">Volver</a>
<form action="busqueda_candidato.php" method="post">
	<input type="hidden" name="cod_planta"  value="<?php echo $_POST['cod_planta']?>">
	<input type="hidden" name="cod_recluta"  value="<?php echo $_POST['cod_recluta']?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	
        <tr><td>Carnet:</td><td><input type="text" name="cedula" placeholder="Introduce el Número de Carnet"></td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
<?php
//print_r($_SESSION);
include_once("../../pie.php");
?>