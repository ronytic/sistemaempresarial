<?php
include_once("../../login/check.php");
include_once("../../../estructurabd/rec_candidato.php");
extract($_POST);
$rec_candidato=new rec_candidato;
$cod_empresa=$_SESSION['cod_empresa'];
$condicion="cedula  LIKE '$cedula%' and nombre  LIKE '$nombre%' and paterno  LIKE '$paterno%' and materno  LIKE '$materno%'";

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
$rc=array_shift($rec_c);
$cantidad=count($rc);
if($cantidad>0){
	$Datos="Modificar Datos del Candidato";
	$Boton="Modificar Datos";
	$Archivo="actualizar_candidato.php";
}else{
	$Datos="Nuevo Candidato";
	$Boton="Guardar Candidato";	
	$Archivo="guardar_candidato.php";
}

$folder="../../../";
$titulo="Datos del Candidato";
include_once("../../cabecerahtml.php");
?>
<?php
/*echo "<pre>";
print_r($_SESSION);
print_r($_POST);
echo "</pre>";*/
include_once("../../cabecera.php");
?>
<a href="listar.php" class="btn btn-xs">Volver</a>
<h2><?php echo $Datos?></h2>
<form action="<?php echo $Archivo?>" method="post" enctype="multipart/form-data">

<input type="hidden" name="cedula_anterior"  value="<?php echo $cedula?>">
<input type="hidden" name="cod_planta"  value="<?php echo $_POST['cod_planta']?>">
<input type="hidden" name="cod_recluta"  value="<?php echo $_POST['cod_recluta']?>">
<table class="table table-bordered table-hover">

<tr>
<td width="250">Cédula</td><td><input type="text"  value="<?php echo $rc['cedula']?>" name="cedula"></td>
</tr>
<tr>
<td>Expedido</td><td><input type="text" name="exp" required size="3" maxlength="3" value="<?php echo $rc['exp']?>"></td>
</tr>
<tr>
<td>Nombre</td><td><input type="text"  value="<?php echo $rc['nombre']?>" name="nombre"></td>
</tr>
<tr>
<td>Paterno</td><td><input type="text"  value="<?php echo $rc['paterno']?>" name="paterno"></td>
</tr>
<tr>
<td>Materno</td><td><input type="text"  value="<?php echo $rc['materno']?>" name="materno"></td>
</tr>
<tr>
<td>Fecha de Nacimiento</td><td><input type="date"  value="<?php echo ($rc['fecha_nac'])?>" name="fecha_nac"></td>
</tr>
<tr>
<td>Ciudad de Nacimiento</td><td><input type="text" name="ciudad_nac" required value="<?php echo $rc['ciudad_nac']?>"></td>
</tr>
<tr>
<td>Pais de Nacimiento</td><td><input type="text" name="pais_nac" required value="<?php echo $rc['pais_nac']?>"></td>
</tr>
<tr>
<td>Dirección</td><td><input type="text" name="direccion" required value="<?php echo $rc['direccion']?>"></td>
</tr>
<tr>
<td>Teléfono</td><td><input type="text"  value="<?php echo $rc['telefono']?>" name="telefono"></td>
</tr>
<tr>
<td>Correo Electronico</td><td><input type="text"  value="<?php echo $rc['mail']?>" name="mail"></td>
</tr>
<tr><td>Foto</td><td><input type="file" name="foto" ><br><?php
        	if($rc['foto']!=""){
			?><a href="../../../imagenes/candidato/<?php echo $rc['foto']?>" target="_blank"><img src="../../../imagenes/candidato/<?php echo $rc['foto']?>" width="150" class="img-polaroid"></a><?php	
			}
		?></td></tr>
<tr>
	<td colspan="2"><input type="submit" class="btn btn-danger" value="<?php echo $Boton?>"></td>
</tr>
</table>
</form>
<?php
//print_r($_SESSION);
include_once("../../pie.php");
?>