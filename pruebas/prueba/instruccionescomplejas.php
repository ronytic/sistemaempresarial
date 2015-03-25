<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_inst.php");
$rec_banco_inst=new rec_banco_inst;

$cedula=$_SESSION['cedula'];
$cod_planta=$_SESSION['cod_planta'];
$cod_empresa=$_SESSION['cod_empresa'];
$cod_recluta=$_SESSION['cod_recluta'];
$pruebas=$_SESSION['pruebas'];
$pruebaactual=array_shift($pruebas);
$orden_prueba=array_shift(array_keys($pruebaactual));
$cod_prueba=array_shift($pruebaactual);

$rec_c=$rec_candidato->mostrarTodoRegistro("cedula='$cedula'",0);
$rec_c=array_shift($rec_c);

$rec_p=$rec_prueba->mostrarTodoRegistro("cod_prueba='$cod_prueba'",0);
$rec_p=array_shift($rec_p);
$cod_banco=$rec_p['cod_banco'];

/*
echo "<pre>";
print_r($_SESSION);
print_r($_POST);
print_r($pruebaactual);
print_r($_SESSION);
echo $k;
echo $v;
echo "</pre>";
*/

$titulo="Prueba de ".$rec_p['descripcion'];

include_once("../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/core/plugins/jquery.countdowntimer.min.js"></script>
<?php
include_once("../cabecera.php");
?>
<?php /*
<table class="table table-bordered">
<thead><tr>
<th>Cédula de Identidad</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>*/?>
<style type="text/css">
.cuadrotiempo{
	width:100px;
	position:fixed;
	top:50px;	
	right:50px;
	z-index:1500;
}
.cuadrotiempo:hover{
	opacity:0.5;	
}
.cuadrotiempo .widget-main{
	text-align:right;	
}
.cuadrotiempo h3{
	margin:0px;	
}
</style>
<script language="javascript" type="text/javascript">
$(function(){
	$("#tiempo").countdowntimer({
		minutes : <?php echo $rec_p['tiempo']?>,
		seconds:0,
        size : "lg",
		timeUp : evaluar
	});
	function evaluar(){
		//$("#formulario").submit();
	}
});
$(document).on("ready",function(){
});

</script>
<div class="cuadrotiempo">

        <div class="widget-box">
        <div class="widget-header widget-header-flat widget-header-small">
            <h5>Tiempo</h5></div>
            <div class="widget-body">
                <div class="widget-main resaltar">
                <h3><strong><span id="tiempo"><?php echo $rec_p['tiempo']?></span> </strong> </h3>
                </div>
            </div>
        </div>

</div>
<form action="evaluarinstruccionescomplejas.php" method="post" id="formulario">
<input type="hidden" name="cod_prueba" value="<?php echo $cod_prueba?>">
<input type="hidden" name="cod_banco" value="<?php echo $cod_banco?>">

<?php ?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5><?php ?>  <?php ?></h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            <table class="table table-bordered table-striped table-hover">
                <thead><tr class="centrar"><th width="300">Cantidad Programada</th><th width="300">Clase de Operación</th><th width="150">Fecha de Programación</th><th width="50">1</th><th width="50">2</th><th width="50">3</th></tr></thead>
            	<?php 
				$rec_b=$rec_banco_inst->mostrarTodoRegistro("cod_empresa='".$cod_empresa."'",0,"");
				foreach($rec_b as $rb){?>
                <tr>
                	<td class="  centrar" >
					<?php echo $rb['Pre1']?>
                    </td>
                    <td class="  centrar" >
					<?php echo $rb['Pre2']?>
                    </td>
                    <td class="  centrar" >
					<?php echo $rb['Pre3']?>
                    </td>
                    <td class="centrar">
                        <input type="radio" name="r<?php echo $rb['codigo_inst']?>">
                    </td>
                    <td class="centrar">
                        <input type="radio" name="r<?php echo $rb['codigo_inst']?>">
                    </td>
                    <td class="centrar">
                        <input type="radio" name="r<?php echo $rb['codigo_inst']?>">
                    </td>
                </tr>
                <?php }?>
            </table>
            
					
			
			</div>
        </div>
    </div>
</div>
<?php ?>
	<center>
	 <input type="submit" value="Grabar" class="btn btn-danger btn-xm" >
     </center>
</form>
<?php
include_once("../pie.php");

?>
