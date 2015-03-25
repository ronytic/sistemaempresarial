<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_concentracion.php");
$rec_banco_concentracion=new rec_banco_concentracion;

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

table tr td{
    border: 1px skyblue solid;
    text-align: center;
    padding: 2px;
    cursor:pointer;
    margin:2px;
    display: inline-block;
    width: 25px;
    vertical-align: middle;

}
.celeste{
    background-color: skyblue;
}
.l{
    background-color: #BDD0EE;
}

.ocultar{
    display: none;
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
<script type="text/javascript">
	$(document).on("ready",function(){

		$("td").on("click",function(){
			var pos=$(this).attr("for")
			$("#"+pos).click();
			

		})
		$(document).on("change","input[type=checkbox]",function(e){
			var valor=$(this).is(":checked")
			//alert(valor);
			if(valor){
				$(this).parent().addClass("celeste");	

			}else{
				$(this).parent().removeClass("celeste");
			}
		});
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
<form action="evaluarconcentracion.php" method="post" id="formulario">
<input type="hidden" name="cod_prueba" value="<?php echo $cod_prueba?>">
<input type="hidden" name="cod_banco" value="<?php echo $cod_banco?>">

<?php ?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5><?php ?>  <?php ?></h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            <table>
<?php 
$a="A";
$rec_b_c=$rec_banco_concentracion->mostrarTodoRegistro("",0);
foreach($rec_b_c as $rbc){
	?>
	<tr>
    <td class="l"><?php echo $a;$a++;?></td>
	<?php
	for($j=1;$j<=31;$j++){
		?>
		<td for="n_<?php echo $i?>_<?php echo $j;?>" class="cuadro">
		<input type="checkbox" name="" id="n_<?php echo $i?>_<?php echo $j;?>" class="ocultar">
			<?php echo $rbc['campo'.$j]?>	
		</td>
		<?php
	}
	?>
	</tr>
	<?php
}?>
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
