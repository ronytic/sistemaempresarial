<?php 
include_once("../../login/check.php");
$folder="../../";
$titulo="Reclutamientos";

include_once("../../estructurabd/rec_area_usuario.php");

include_once("../../estructurabd/rec_area.php");

$rec_area=new rec_area;

if(!isset($rec_area_usuario)){
	$rec_area_usuario=new rec_area_usuario;	
}

$login=$_SESSION['login'];
$condicion="login  LIKE '%$login' ";

$rec_a_u=$rec_area_usuario->mostrarTodoRegistro($condicion,0);
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<form action="busqueda.php" method="post" class="formulario">
	<table class="" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Area</th>
            <th>Estado</th>
            <!--<th>Dirección</th>-->
        </tr>
        </thead>
        <tr>
        	<td><select name="cod_area">
            	<?php foreach($rec_a_u as $rau){
				?>
                <option value="<?php echo $rau['cod_area']?>"><?php echo $rau['cod_area']?></option>
                <?php	
				}?>
            </select></td>
            <td>
            <select name="estado">
        							<option value="A">Activo</option>
        							<option value="C">Cerrado</option>
                                    </select>
            </td>
            <td><a class="btn btn-danger btn-xs" href="index.php">Adicionar</a></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>

<?php include_once("../../pie.php");?>
<script language="javascript">
	$(document).on("ready",function(){
		$(".formulario").submit();
	});
	$("select[name=cod_area],select[name=estado]").change(function(e) {
        $(".formulario").submit();
    });
</script>