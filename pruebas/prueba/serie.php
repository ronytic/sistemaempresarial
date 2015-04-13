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
	left:50px;
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
		$("#formulario").submit();
	}
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
<form action="evaluarserie.php" method="post" id="formulario">
<input type="hidden" name="cod_prueba" value="<?php echo $cod_prueba?>">
<input type="hidden" name="cod_banco" value="<?php echo $cod_banco?>">

<?php ?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5><?php ?>  <?php ?></h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            <table class="table table-bordered table-hover">
            <thead><tr class="centrar"><th width="350">Serie</th><th width="50">Respuesta</th></tr></thead>
            	<?php 
				$rec_b=$rec_banco_serie->mostrarTodoRegistro("cod_empresa='".$cod_empresa."' and tipo='SER'",0,"rand()");
				foreach($rec_b as $rb){?>
                <tr>
                	<td>
					<table class="table table-bordered">
                    
                    	<tr class="centrar tf1">
                        <td width="10%"><?php echo $rb['pregunta']?></td>
                        <td width="10%"><?php echo $rb['pre2']?></td>
                        <td width="10%"><?php echo $rb['pre3']?></td>
                        <td width="10%"><?php echo $rb['pre4']?></td>
                        <?php if($rb['pre5']!=""){?><td width="10%"><?php echo $rb['pre5']?></td><?php }?>
                        <?php if($rb['pre6']!=""){?><td width="10%"><?php echo $rb['pre6']?></td><?php }?>
                        <?php if($rb['pre7']!=""){?><td width="10%"><?php echo $rb['pre7']?></td><?php }?>
                        </tr>
                    </table>
                    </td>
                	<td class="centrar" width="40">
						<input type="text" name="r[<?php echo $rb['codigo_banco_serie']?>]" value="" class="form-control col-sm-2" >
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
	 <input type="submit" value="Grabar" class="btn btn-danger btn-xm">
     </center>
</form>
<?php
include_once("../pie.php");

?>
