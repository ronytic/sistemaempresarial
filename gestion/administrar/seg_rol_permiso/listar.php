<?php 
$folder="../../";
include_once("../../../estructurabd/seg_permiso.php");
$seg_permiso=new seg_permiso;
$seg_p=$seg_permiso->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro($condicion,0,"descripcion");

?>
<h2>Búsqueda de Registro</h2>
<form action="seg_rol_permiso/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<thead>
    	<tr><th>Cod_Rol</th><th>Cod_Permiso</th></tr>
        </thead>
        <tr><td><select name="cod_permiso" autofocus >
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_p as $sp){
				?>
                <option value="<?php echo $sp['cod_permiso']?>"><?php echo $sp['cod_permiso']?> - <?php echo $sp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td><td><select name="cod_rol" autofocus >
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_r as $sr){
				?>
                <option value="<?php echo $sr['cod_rol']?>"><?php echo $sr['cod_rol']?> - <?php echo $sr['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td><td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>