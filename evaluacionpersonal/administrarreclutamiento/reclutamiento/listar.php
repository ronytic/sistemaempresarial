<?php 
include_once("../../login/check.php");
$folder="../../../";
$titulo="Reclutamientos";

include_once("../../../estructurabd/rec_planta_usuario.php");

include_once("../../../estructurabd/rec_planta.php");

$rec_planta=new rec_planta;

if(!isset($rec_planta_usuario)){
	$rec_planta_usuario=new rec_planta_usuario;	
}

$login=$_SESSION['login'];
$condicion="login  LIKE '$login' ";

$rec_p_u=$rec_planta_usuario->mostrarTodoRegistro($condicion,1);
include_once("../../cabecerahtml.php");
?>

<?php
include_once("../../cabecera.php");
?>
<div class="col-sm-offset-4 col-sm-4">
	<div class="widget-box">
    	<div class="widget-header widget-header-flat widget-header-small">
        <h5>Selección de Reclutamiento</h5></div>
        <div class="widget-body">
        	<div class="widget-main">
            	<form action="ingresar.php" method="post">
                    <table class="" style="background-color:#FFFFFF">
                        <thead>
                
                        </thead>
                        <tr>
                            <td>
                                Planta<br>
                            <select name="cod_planta">
                                <?php foreach($rec_p_u as $rpu){
                                    $rp=$rec_planta->mostrarTodoRegistro("cod_planta='".$rpu['cod_planta']."'",0);
                                    print_r($rp);
                                    $rp=array_shift($rp);
                                    
                                ?>
                                <option value="<?php echo $rpu['cod_planta']?>"><?php echo $rp['descripcion']?></option>
                                <?php	
                                }?>
                            </select></td>
                            </tr>
                            <tr>
                            <td>
                            Reclutamiento<br>
                            <select name="cod_recluta" id="respuestaformulario">
                                                    
                                                    </select>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <input type="submit" value="Ingresar" class="btn btn-danger btn-xs">
                           </td>
                        </tr>
                    </table>
                    
                    
                </form>
                
                <div id=""></div>

            </div>
        </div>
    </div>
</div>

<?php include_once("../../pie.php");?>
<script language="javascript">
	$(document).on("ready",function(){
		buscar();	
	});
	$("select[name=cod_planta]").change(buscar);
	function buscar(){
			var cod_planta=$("select[name=cod_planta]").val();
			$.post("busqueda.php",{'cod_planta':cod_planta},function(data){
				$("#respuestaformulario").html(data);
			});
		
	}
</script>