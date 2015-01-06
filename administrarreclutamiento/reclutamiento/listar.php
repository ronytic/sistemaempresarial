<?php 
include_once("../../login/check.php");
$folder="../../";
$titulo="Reclutamientos";

include_once("../../estructurabd/rec_planta_usuario.php");

include_once("../../estructurabd/rec_planta.php");

$rec_planta=new rec_planta;

if(!isset($rec_planta_usuario)){
	$rec_planta_usuario=new rec_planta_usuario;	
}

$login=$_SESSION['login'];
$condicion="login  LIKE '%$login' ";

$rec_p_u=$rec_planta_usuario->mostrarTodoRegistro($condicion,1);
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<form action="index.php" method="post">
	<table class="" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Planta</th>
            <th>Estado</th>
            <!--<th>Dirección</th>-->
        </tr>
        </thead>
        <tr>
        	<td><select name="cod_planta">
            	<?php foreach($rec_p_u as $rpu){
					$rec_p=$rec_planta->mostrarTodoRegistro("cod_planta='".$rpu['cod_planta']."'",0);
					$rec_p=array_shift($rec_p);
				?>
                <option value="<?php echo $rpu['cod_planta']?>"><?php echo $rpu['cod_planta']?> - <?php echo $rec_p['descripcion']?></option>
                <?php	
				}?>
            </select></td>
            <td>
            <select name="estado">
        							<option value="A">Activo</option>
        							<option value="C">Cerrado</option>
                                    </select>
            </td>
            <td><input type="submit" class="btn btn-danger btn-xs" value="Adicionar"></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>

<?php include_once("../../pie.php");?>
<script language="javascript">
	$(document).on("ready",function(){
		buscar();
	});
	
	$("select[name=cod_planta],select[name=estado]").change(function(e) {
        buscar();
    });
	function buscar(){
		var cod_planta=$("select[name=cod_planta]").val();
		var estado=$("select[name=estado]").val();
		$.post("busqueda.php",{"cod_planta":cod_planta,"estado":estado},function(data){
			$("#respuestaformulario").html(data)
		});
	}
</script>