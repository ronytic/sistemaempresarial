<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco_valanti.php");
$rec_banco_valanti=new rec_banco_valanti;

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
    margin-bottom:10px !important;    
    margin-top:10px !important;
}
</style>
<script language="javascript" type="text/javascript">
$(function(){
	$("#tiempo").countdowntimer({
		minutes : <?php echo $rec_p['tiempo']?>0,
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
		case '---':{izq="-";der="-";izqc="negro";derc="negro";}break;
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
            <strong>Marque 0,1,2 o3 en las casilla del centro según LA IMPORTANCIA que Ud. le da a cada frase en su vida personal
            </strong>
            <table class="table " cellspacing="20">
            <!--<thead><tr class="centrar"><th width="350"></th><th width="50"></th><th width="100"></th><th width="50"></th><th width="350"></th></tr></thead>-->
            	<tr class="centrar"><td width="350"></td><td width="50"></td><td width="100"></td><td width="50"></td><td width="350"></td></tr>
            	<?php 
				$rec_b=$rec_banco_valanti->mostrarTodoRegistro("",0,"nro");
				/*echo "<pre>";
				print_r($rec_b);
				echo "</pre>";*/
				/*$rec_b=array(
							0=>array("codigo_banco_serie"=>1,"oracion1"=>"Muestro Dedicación a las Personas que amo","oracion2"=>"Actuo con Perseverancia"),
							1=>array("codigo_banco_serie"=>2,"oracion1"=>"Soy tolerante ","oracion2"=>"Prefiero actuar con etica"),
							2=>array("codigo_banco_serie"=>3,"oracion1"=>"Al pensar utilizo mi intuición o sexto sentido","oracion2"=>"Me siento una persona digna"),
							3=>array("codigo_banco_serie"=>4,"oracion1"=>"Logro buena concentación mental","oracion2"=>"Perdono las ofensas de cualquier persona"),
							4=>array("codigo_banco_serie"=>5,"oracion1"=>"Normalmente razono mucho","oracion2"=>"Me destaco por el liderazgo en mis acciones"),
							
				
							);*/
                            $i=1;
				foreach($rec_b as $rb){$i++;?>
                <tr>
                    <?php if($i==11){
                    ?>
                    <td colspan="5">
                    <strong>Marque 0,1,2 o 3 en las casilla del centro para la frase mas INACEPTABLE, según su juicio, el puntaje mas alto sera para la frase que indique lo peor</strong>
                    </td>
                    <?php    
                    }else{
 
                    ?>
                	<td class="bnegro fceleste centrar" >
					<?php echo $rb['texto1']?>
                    </td>
                    <td class="centrar "><h3 class="sb r negro" id="i<?php echo $rb['codigo_valanti']?>">-</h3></td>
                	<td class="centrar" width="30">
                    	<center>
						<select name="r[<?php echo $rb['codigo_valanti']?>]" class="form-control col-sm-2 cambiar" style="width:60px;text-align:center" data-rel="<?php echo $rb['codigo_valanti']?>">
                        	<option value="---">---</option>
                        	<option value="3-0">3-0</option>
                            <option value="0-3">0-3</option>
                            <option value="2-1">2-1</option>
                            <option value="1-2">1-2</option>
                        </select>
                        </center>
					</td>
                     <td class="centrar "><h3 class="sb r negro" id="d<?php echo $rb['codigo_valanti']?>">-</h3></td>
                    <td class="bnegro fceleste centrar">
					<?php echo $rb['texto2']?>
                    </td>
                    <?php }?>
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
