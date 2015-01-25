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
<div class="col-sm-offset-4 col-sm-4">
<a href="javascript:history.back()" class="btn btn-xs">Volver</a>
<div class="widget-box">
	<div class="widget-header widget-header-flat widget-header-small">
    	<h5>Introduce tu número de Carnet</h5>
    </div>
    <div class="widget-body">
    <div class="widget-main">
    <form action="busqueda_candidato.php" method="post">
        <input type="hidden" name="cod_planta"  value="<?php echo $_POST['cod_planta']?>">
        <input type="hidden" name="cod_recluta"  value="<?php echo $_POST['cod_recluta']?>">
        <table class="table borderless" style="background-color:#FFFFFF">
            
            <tr><td>Carnet:</td><td><input type="text" name="cedula" placeholder="Introduce el Número de Carnet" size="30"></td></tr>
            
            <tr><td></td><td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
        </table>
    </form>
    </div>
    </div>
</div>
</div>
<?php
//print_r($_SESSION);
include_once("../../pie.php");
?>