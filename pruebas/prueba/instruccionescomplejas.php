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
            <strong>
            <p>Seleccione en la columna 1 a la altura de cada operación de roscado o bobinado, desde 1500 a
4500 unidades inclusive, programada entre el 15 de Marzo de 1946 y el 10 de Mayo de 1947.</p>
<p>
Seleccione la columna 2 a la altura de cada operación de moldeo y bobinado, hasta 3000 
unidades inclusive programada entre el 15 de Octubre de 1946 y el 20 de Agosto de 1947.</p>
<p>
Seleccione la columna 3 a la altura de cada operación de roscado o moldeo desde 2000 a
5000 unidades inclusive, programada entre el 10 e Febrero de 1946 y el 15 de Junio de 1947.</p>
            </strong>
            <table class="table table-bordered table-striped table-hover">
                <thead><tr class="centrar"><th width="350">Cantidad Programada</th><th width="350">Clase de Operación</th><th width="150">Fecha de Programación</th><th width="70">1</th><th width="70">2</th><th width="70">3</th></tr></thead>
            	<?php 
				$rec_b=$rec_banco_inst->mostrarTodoRegistro("cod_empresa='".$cod_empresa."'",0,"rand()");
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
                        <input type="checkbox" name="r[<?php echo $rb['codigo_inst']?>][1]">
                    </td>
                    <td class="centrar">
                        <input type="checkbox" name="r[<?php echo $rb['codigo_inst']?>][2]">
                    </td>
                    <td class="centrar">
                        <input type="checkbox" name="r[<?php echo $rb['codigo_inst']?>][3]">
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
