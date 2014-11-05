<?php
include_once("../../estructurabd/rec_candidato.php");
extract($_GET);




$rec_candidato=new rec_candidato;
$condicion="cedula  LIKE '$cedula'";

$rec_c=$rec_candidato->mostrarTodoRegistro($condicion,0);
$rec_c=array_shift($rec_c);
?>
<h2>Modificar Candidato</h2>
<form action="candidato/actualizar.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
        <tr><td>Cédula</td><td><input type="text" name="cedula" required readonly value="<?php echo $rec_c['cedula']?>"></td></tr>
        <tr><td>Expedido</td><td><input type="text" name="exp" required size="3" maxlength="3" value="<?php echo $rec_c['exp']?>"></td></tr>
        <tr><td>Nombre</td><td><input type="text" name="nombre" required value="<?php echo $rec_c['nombre']?>"></td></tr>
        
        <tr><td>Paterno</td><td><input type="text" name="paterno" required value="<?php echo $rec_c['paterno']?>"></td></tr>
        <tr><td>Materno</td><td><input type="text" name="materno" required value="<?php echo $rec_c['materno']?>"></td></tr>
        <tr><td>Fecha de Nacimiento</td><td><input type="date" name="fecha_nac" required value="<?php echo $rec_c['fecha_nac']?>"></td></tr>
        <tr><td>Ciudad de Nacimiento</td><td><input type="text" name="ciudad_nac" required value="<?php echo $rec_c['ciudad_nac']?>"></td></tr>
        <tr><td>Pais de Nacimiento</td><td><input type="text" name="pais_nac" required value="<?php echo $rec_c['pais_nac']?>"></td></tr>
        <tr><td>Dirección</td><td><input type="text" name="direccion" required value="<?php echo $rec_c['direccion']?>"></td></tr>
        <tr><td>Teléfono</td><td><input type="text" name="telefono" required value="<?php echo $rec_c['telefono']?>"></td></tr>
        <tr><td>Correo Electronico</td><td><input type="email" name="mail" value="<?php echo $rec_c['mail']?>"></td></tr>
        <tr><td>Foto</td><td><input type="file" name="foto" ><br><?php
        	if($rec_c['foto']!=""){
			?><a href="../imagenes/candidato/<?php echo $rec_c['foto']?>" target="_blank"><img src="../imagenes/candidato/<?php echo $rec_c['foto']?>" width="150" class="img-polaroid"></a><?php	
			}
		?></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Modificar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
