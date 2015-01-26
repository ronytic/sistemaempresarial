<?php
include_once("../login/check.php");
$folder="../../";
include_once("../../estructurabd/rec_prueba.php");
$rec_prueba=new rec_prueba;

include_once("../../estructurabd/rec_candidato.php");
$rec_candidato=new rec_candidato;

include_once("../../estructurabd/rec_banco.php");
$rec_banco=new rec_banco;

$cedula=$_SESSION['cedula'];
$cod_planta=$_SESSION['cod_planta'];
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
$rec_b=$rec_banco->mostrarTodoRegistro("cod_banco='".$cod_banco."'",0,"nro");
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
include_once("../cabecera.php");
?>
<table class="table table-bordered">
<thead><tr>
<th>Cédula</th><th>Datos Personales</th>
</tr></thead>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $rec_c['paterno']." ".$rec_c['materno']." ".$rec_c['nombre']?></td>
</tr>
</table>
<form action="evaluar.php" method="post">
<input type="hidden" name="cod_prueba" value="<?php echo $cod_prueba?>">
<input type="hidden" name="cod_banco" value="<?php echo $cod_banco?>">

<?php foreach($rec_b as $rb){?>
<div class="col-sm-12">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5><?php echo $rb['nro']?> - <?php echo $rb['pregunta']?></h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            <table class="table table-bordered">
            	<tr>
                	<?php for($i=1;$i<=5;$i++){?>
                	<td class="centrar" width="250">
                    	<?php 
						if($rb['opcion'.$i]!=""){
							?>
                            <label>
                            <?php
							echo $rb['opcion'.$i];
							?>
                            <br>
                            <input type="radio" name="r[<?php echo $rb['nro']?>]" value="<?php echo $i?>" required>
                            </label>
                            <?php
						}
							?>	
                    </td>
                    <?php }?>
                </tr>
            </table>
            
					
			
			</div>
        </div>
    </div>
</div>
<?php }?>
	 <input type="submit" value="Evaluar Respuestas" class="btn btn-danger btn-xm">
</form>
<?php
include_once("../pie.php");

?>
