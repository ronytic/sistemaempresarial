<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_serie.php");
$rec_banco_serie=new rec_banco_serie;

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
<table class="table table-bordered">
<thead><tr>
<th>Cédula de Identidad</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>
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
	$(".cambiar").change(cambiar);	
});
function cambiar(){
	var valor=$(this).val();
	var cod=$(this).data("rel");
	switch(valor){
		case '3-0':{izq="3";der="0";izqc="rojo";derc="negro";}break;
		case '0-3':{izq="0";der="3";izqc="negro";derc="rojo";}break;
		case '2-1':{izq="2";der="1";izqc="verde";derc="azul";}break;
		case '1-2':{izq="1";der="2";izqc="azul";derc="verde";}break;
	}
	$("#i"+cod).html(izq).attr("class","sb r "+izqc);
	$("#d"+cod).html(der).attr("class","sb r "+derc);
}
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
<form action="evaluarvalanti.php" method="post" id="formulario">
<input type="hidden" name="cod_prueba" value="<?php echo $cod_prueba?>">
<input type="hidden" name="cod_banco" value="<?php echo $cod_banco?>">

<?php ?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5><?php ?>  <?php ?></h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            <table class="table  table-hover">
            <!--<thead><tr class="centrar"><th width="350"></th><th width="50"></th><th width="100"></th><th width="50"></th><th width="350"></th></tr></thead>-->
            	<tr class="centrar"><td width="350"></td><td width="50"></td><td width="100"></td><td width="50"></td><td width="350"></td></tr>
            	<?php 
				$rec_b=$rec_banco_serie->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and tipo='SER'",0,"orden");
				foreach($rec_b as $rb){?>
                <tr>
                	<td class="bnegro">
					<?php echo "Muestro Dedicación a las Personas que amo"?>
                    </td>
                    <td class="centrar "><h3 class="sb r rojo" id="i<?php echo $rb['codigo_banco_serie']?>">3</h3></td>
                	<td class="centrar" width="40">
						<select name="r[<?php echo $rb['codigo_banco_serie']?>]" class="form-control col-sm-2 cambiar" data-rel="<?php echo $rb['codigo_banco_serie']?>">
                        	<option value="3-0">3-0</option>
                            <option value="0-3">0-3</option>
                            <option value="2-1">2-1</option>
                            <option value="1-2">1-2</option>
                        </select>
					</td>
                     <td class="centrar"><h3 class="sb r negro" id="d<?php echo $rb['codigo_banco_serie']?>">0</h3></td>
                    <td class="bnegro">
					<?php echo "Actuo con Perseverancia"?>
                    </td>
                </tr>
                <?php }?>
            </table>
            
					
			
			</div>
        </div>
    </div>
</div>
<?php ?>
	 <input type="submit" value="Grabar" class="btn btn-danger btn-xm" disabled>
</form>
<?php
include_once("../pie.php");

?>
