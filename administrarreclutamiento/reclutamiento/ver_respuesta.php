<?php 
include_once("../../login/check.php");
$folder="../../";
$cedula=$_GET['cedula'];
include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_reclutamiento.php");
$rec_reclutamiento=new rec_reclutamiento;

include_once("../../estructurabd/rec_bateria_prueba.php");
$rec_bateria_prueba=new rec_bateria_prueba;

include_once("../../estructurabd/rec_banco_candidato.php");
$rec_banco_candidato=new rec_banco_candidato;

include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;
include_once("../../estructurabd/rec_banco_candidato.php");
$rec_banco_candidato=new rec_banco_candidato;
include_once("../../estructurabd/rec_banco_resultados.php");
$rec_banco_resultados=new rec_banco_resultados;

include_once("../../estructurabd/rec_banco_clever_respuestas.php");
$rec_banco_clever_respuestas=new rec_banco_clever_respuestas;

include_once("../../estructurabd/rec_banco_serie.php");
$rec_banco_serie=new rec_banco_serie;

include_once("../../estructurabd/rec_banco_serie_respuestas.php");
$rec_banco_serie_respuestas=new rec_banco_serie_respuestas;

$titulo="Resultados de las Pruebas";
$condicion="cedula  LIKE '$cedula'";

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
$rec_c=array_shift($rec_c);

$cod_empresa=$_SESSION['cod_empresa'];
$cod_recluta=$_GET['cod_recluta'];

$rec_r=$rec_reclutamiento->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_recluta='$cod_recluta'",0);
$rec_r=array_shift($rec_r);

$cod_bateria=$rec_r['cod_bateria'];
$rec_b_p=$rec_bateria_prueba->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_bateria='$cod_bateria' and cod_prueba!='CLE'  and cod_prueba!='VAL'",0);
include_once("../../cabecerahtml.php");
?>
<script language="javascript" src="<?php echo $folder?>js/core/plugins/highcharts.js"></script>
<script language="javascript" src="<?php echo $folder?>js/core/plugins/highcharts-more.js"></script>
<script language="javascript" src="<?php echo $folder?>js/core/plugins/exporting.js"></script>
<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<a href="javascript:history.back()" class="btn btn-xs btn-danger">Volver</a>
<table class="table table-bordered table-hover table-striped">

		<thead>
        	<th colspan="1" width="200">Datos del Candidato</th>
        </thead>
        <tr><td><strong>Cédula</strong></td><td><?php echo $rec_c['cedula']?></td></tr>
        <tr><td><strong>Paterno</strong></td><td><?php echo $rec_c['paterno']?></td></tr>
        <tr><td><strong>Materno</strong></td><td><?php echo $rec_c['materno']?></td></tr>
        <tr><td><strong>Nombres</strong></td><td><?php echo $rec_c['nombre']?></td></tr>
        
        <tr><td><strong>Fecha de Nacimiento</strong></td><td><?php echo date("d-m-Y",strtotime($rec_c['fecha_nac']))?></td></tr>
        <tr><td><strong>Ciudad de Nacimiento</strong></td><td><?php echo  $rec_c['ciudad_nac']?></td></tr>
        <tr><td><strong>Pais de Nacimiento</strong></td><td><?php echo $rec_c['pais_nac']?></td></tr>
        <tr><td><strong>Dirección</strong></td><td><?php echo $rec_c['direccion']?></td></tr>
        <tr><td><strong>Teléfono</strong></td><td><?php echo $rec_c['telefono']?></td></tr>
        <tr><td><strong>Correo Electronico</strong></td><td><?php echo $rec_c['mail']?></td></tr>
        <tr><td><strong>Foto</strong></td><td><?php
        	if($rec_c['foto']!=""){
			?><a href="../../imagenes/candidato/<?php echo $rec_c['foto']?>" target="_blank"><img src="../../imagenes/candidato/<?php echo $rec_c['foto']?>" width="150" class="img-polaroid"></a><?php	
			}
		?></td></tr>

</table>
<table class="table table-bordered table-hover table-striped">

		<thead>
        	<tr>
        		<th colspan="5" width="200">Resultado de la Prueba</th>
            </tr>
            <tr class="centrar">
        		<th colspan="1" width="50"  class="">N</th><th width="500">Prueba</th><th width="100">Total</th><th width="100">Correctas</th><th width="100">Porcentaje Obtenido</th>
            </tr>
        </thead>
        <?php
		$total=0;
        foreach($rec_b_p as $rbp){$i++;
			$cod_prueba=$rbp['cod_prueba'];
			$rec_p=$rec_prueba->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='".$cod_prueba."'",0);
			$rec_p=array_shift($rec_p);
			
			$rec_b_r=$rec_banco_resultados->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='".$rbp['cod_prueba']."' and cod_recluta='".$cod_recluta."' and cedula='".$cedula."'",0);
            $rec_b_r=array_shift($rec_b_r);
			$cantidadTotal=$rec_b_r['total'];
			$correctas=$rec_b_r['correctas'];
			$porcentaje=$rec_b_r['porcentaje'];
			$total+=$porcentaje;
			?>
            <tr>
            	<td class="centrar"><?php echo  $i?></td>
                <td><?php echo $rec_p['descripcion']?></td>
                <td class="centrar" width="100"><?php echo $cantidadTotal?></td>
                <td class="centrar" width="100"><?php echo $correctas?></td>
                <td class="der" width="150"><?php echo $porcentaje;?> %</td>
                <td>
                <?php if($rec_p['cod_tipo']=="EN3"){?>
                <a href="ver_respuesta_detalle.php?cedula=<?php echo $cedula?>&cod_recluta=<?php echo $cod_recluta?>&cod_prueba=<?php echo $cod_prueba?>" class="btn btn-xs btn-danger">Ver Detalle de Respuestas</a>
                <?php }?>
                </td>
            </tr>
            <?php
		}
			$promedio=$total/$i;
			$promedio=number_format($promedio,2);
		?>
        <tr>
        	<td class="resaltar der" colspan="4">Total</td>
            <td class="resaltar der"><?php echo $promedio?> %</td>
        </tr>
</table>


<?php
//DISC
//D mas
$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (5,10,14,18,32,40,41,48,51,54,57,62,67,72,73,78,84,87,90,93) and cedula='$cedula' and mas='1'",0);
$dmas=count($rec_b_clever_r);


$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (4,11,18,24,25,32,35,40,41,48,51,54,62,67,72,73,78,83,86,90,93) and cedula='$cedula' and menos='1'",0);
$dmenos=count($rec_b_clever_r);
$dtotal=$dmas-$dmenos;
//I mas
$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (1,6,12,15,20,28,29,45,52,55,58,64,65,75,80,81,88,94) and cedula='$cedula' and mas='1'",0);
$imas=count($rec_b_clever_r);


$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (6,12,15,20,28,36,39,42,52,55,64,65,70,75,80,81,88,91,94) and cedula='$cedula' and menos='1'",0);
$imenos=count($rec_b_clever_r);
$itotal=$imas-$imenos;
//S mas
$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (2,7,16,19,21,26,33,38,43,46,49,56,66,70,76,77,82,92,95) and cedula='$cedula' and mas='1'",0);
$smas=count($rec_b_clever_r);


$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (2,7,9,26,30,33,38,43,56,59,63,66,69,76,82,85,92,95) and cedula='$cedula' and menos='1'",0);
$smenos=count($rec_b_clever_r);
$stotal=$smas-$smenos;
//C mas
$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (3,10,13,23,26,34,37,53,61,68,71,74,86,89,96) and cedula='$cedula' and mas='1'",0);
$cmas=count($rec_b_clever_r);


$rec_b_clever_r=$rec_banco_clever_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cod_prueba='CLE' and cod_recluta='$cod_recluta' and codigo_banco_clever IN (3,8,10,13,17,23,31,34,44,47,50,60,71,78,83,96) and cedula='$cedula' and menos='1'",0);
$cmenos=count($rec_b_clever_r);
$ctotal=$cmas-$cmenos;
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th colspan="5" width="200">Resultado de la Prueba Clever</th>
        </tr>
        <tr class="centrar">
        	<th width="50"></th>
            <th colspan="1" width="50"  class="">D</th>
            <th colspan="1" width="50"  class="">I</th>
            <th colspan="1" width="50"  class="">S</th>
            <th colspan="1" width="50"  class="">C</th>
        </tr>
        
    </thead>
    <tr>
    	<td class="resaltar">Mas</td>
        <td class="centrar"><?php echo $dmas;?></td>
        <td class="centrar"><?php echo $imas;?></td>
        <td class="centrar"><?php echo $smas;?></td>
        <td class="centrar"><?php echo $cmas;?></td>
    </tr>
    <tr>
    	<td class="resaltar">Menos</td>
        <td class="centrar"><?php echo $dmenos;?></td>
        <td class="centrar"><?php echo $imenos;?></td>
        <td class="centrar"><?php echo $smenos;?></td>
        <td class="centrar"><?php echo $cmenos;?></td>
    </tr>
    <tr class="success resaltar">
    	<td class="">Total</td>
        <td class="centrar"><?php echo $dtotal;?></td>
        <td class="centrar"><?php echo $itotal;?></td>
        <td class="centrar"><?php echo $stotal;?></td>
        <td class="centrar"><?php echo $ctotal;?></td>
    </tr>
</table>

<?php
$rec_b_s=$rec_banco_serie->mostrarTodoRegistro("cod_empresa='$cod_empresa' and tipo='SER'",0);
$totalseries=count($rec_b_s);
$rec_b_s_r=$rec_banco_serie_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cedula LIKE '$cedula' and escorrecta='S' and cod_recluta='$cod_recluta' and cod_prueba='SER'",0);
$totalcorrectasseries=count($rec_b_s_r);
$totalporcentajeseries=number_format($totalcorrectasseries*100/$totalseries,2);

$p1=15.6479452054795;
$p2=21.0506849315069;
$p3=17.3534246575342;
$p4=16.6821917808219;
$p5=21.2246575342466;

$d1=4.7033423480048;
$d2=4.44492661852588;
$d3=6.60888710785178;
$d4=5.41200571776265;
$d5=7.19426270463846;

$pd1=12;
$pd2=21;
$pd3=13;
$pd4=24;
$pd5=20;

$pu1=42;
$pu2=50;
$pu3=43;
$pu4=64;
$pu5=48;
 ?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th colspan="6" width="200">Resultado de la Prueba de  Valanti</th>
        </tr>
        <tr>
            <th>Valor</th>
            <th width="150">Verdad</th>
            <th width="150">Rectitud</th>
            <th width="150">Paz</th>
            <th width="150">Amor</th>
            <th width="150">No Violencia</th>
        </tr>
        
    </thead>
    <tr>
    	<td class="resaltar">Promedio Normas nacionales, 1997 (n=730)</td>
        <td class="centrar"><?php echo $p1;?></td>
        <td class="centrar"><?php echo $p2;?></td>
        <td class="centrar"><?php echo $p3;?></td>
        <td class="centrar"><?php echo $p4;?></td>
        <td class="centrar"><?php echo $p5;?></td>
    </tr>
    <tr>
    	<td class="resaltar">Desviación Standar Normas nacionales, 1997 (n=730)</td>
        <td class="centrar"><?php echo $d1;?></td>
        <td class="centrar"><?php echo $d2;?></td>
        <td class="centrar"><?php echo $d3;?></td>
        <td class="centrar"><?php echo $d4;?></td>
        <td class="centrar"><?php echo $d5;?></td>
    </tr>
    <tr class="resaltar">
        <td class="resaltar">Puntajes Directos</td>
        <td class="centrar"><?php echo $pd1;?></td>
        <td class="centrar"><?php echo $pd2;?></td>
        <td class="centrar"><?php echo $pd3;?></td>
        <td class="centrar"><?php echo $pd4;?></td>
        <td class="centrar"><?php echo $pd5;?></td>
    </tr>
    <tr class="resaltar">
        <td class="resaltar">Puntaje Candidato</td>
        <td class="centrar"><?php echo $pu1;?></td>
        <td class="centrar"><?php echo $pu2;?></td>
        <td class="centrar"><?php echo $pu3;?></td>
        <td class="centrar"><?php echo $pu4;?></td>
        <td class="centrar"><?php echo $pu5;?></td>
    </tr>
    <td colspan="6">
        <div class="graficovalanti">
        
        </div>
    </td>
</table>

<?php
$rec_b_s=$rec_banco_serie->mostrarTodoRegistro("cod_empresa='$cod_empresa' and tipo='PER'",0);
$totalseries=count($rec_b_s);
$rec_b_s_r=$rec_banco_serie_respuestas->mostrarTodoRegistro("cod_empresa='$cod_empresa' and cedula LIKE '$cedula' and escorrecta='S' and cod_recluta='$cod_recluta' and cod_prueba='PER'",0);
$totalcorrectasseries=count($rec_b_s_r);
$totalporcentajeseries=number_format($totalcorrectasseries*100/$totalseries,2);
 ?>

<?php include_once("../../pie.php");?>
<script language="javascript">
$(function () {

    $('.graficovalanti').highcharts({

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: 'Valanti',
            x: -80
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['Verdad', 'Rectitud', 'Paz', 'Amor',
                    'No Violencia'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
        },

        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 70,
            layout: 'vertical'
        },

        series: [{
            name: 'Equilibrio',
            data: [50, 50, 50, 50, 50],
            pointPlacement: 'on'
        }, {
            name: '<?php echo $rec_c['paterno']?> <?php echo $rec_c['materno']?> <?php echo $rec_c['nombre']?>',
            data: [<?php echo $pu1?>, <?php echo $pu2?>, <?php echo $pu3?>, <?php echo $pu4?>, <?php echo $pu5?>],
            pointPlacement: 'on'
        }]

    });
});
</script>