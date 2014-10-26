<?php
include_once("../../../estructurabd/seg_sistema.php");
extract($_GET);

$seg_sistema=new seg_sistema;
$condicion="cod_sistema  LIKE '$cod_sistema'";

$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0);
$seg_s=array_shift($seg_s);
?>
<h2>Modificar Registro de Seg_Sistema</h2>
<form action="seg_sistema/actualizar.php" method="post" enctype="multipart/form-data">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Cod_Sistema</td><td><input type="text" name="cod_sistema" max="3" maxlength="3" autofocus required value="<?php echo $seg_s['cod_sistema']?>" readonly></td></tr>
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $seg_s['descripcion']?>"></td></tr>
        <tr><td>Imagen 1</td><td><input type="file" name="img_01"><br><?php
        	if($seg_s['img_01']!=""){
			?><a href="../../imagenes/sistema/<?php echo $seg_s['img_01']?>" target="_blank"><img src="../../imagenes/sistema/<?php echo $seg_s['img_01']?>" width="150"></a><?php	
			}
		?></td></tr>
        <tr><td>Imagen 2</td><td><input type="file" name="img_02"><br><?php
        	if($seg_s['img_02']!=""){
			?><a href="../../imagenes/sistema/<?php echo $seg_s['img_02']?>" target="_blank"><img src="../../imagenes/sistema/<?php echo $seg_s['img_02']?>" width="150"></a><?php	
			}
		?></td></tr>
        <tr><td>Imagen 3</td><td><input type="file" name="img_03"><br><?php
        	if($seg_s['img_03']!=""){
			?><a href="../../imagenes/sistema/<?php echo $seg_s['img_03']?>" target="_blank"><img src="../../imagenes/sistema/<?php echo $seg_s['img_03']?>" width="150"></a><?php	
			}
		?></td></tr>
        <tr><td>Imagen 4</td><td><input type="file" name="img_04"<br><?php
        	if($seg_s['img_04']!=""){
			?><a href="../../imagenes/sistema/<?php echo $seg_s['img_04']?>" target="_blank"><img src="../../imagenes/sistema/<?php echo $seg_s['img_04']?>" width="150"></a><?php	
			}
		?>></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
