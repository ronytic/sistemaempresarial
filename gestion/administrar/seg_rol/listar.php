<?php 
$folder="../../";
include_once("../../../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");
?>
<h2>Búsqueda de Registro</h2>
<form action="seg_rol/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<thead>
    	<tr><th>Cod_Empresa</th><th>Cod_Sistema</th><th>Descripción</th></tr>
        </thead>
        <tr><td><select name="cod_empresa" autofocus >
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_e as $se){
				?>
                <option value="<?php echo $se['cod_empresa']?>"><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td>
            <td><select name="cod_sistema"  >
            	<option value="">Seleccionar</option>
            	<?php foreach($seg_s as $ss){
				?>
                <option value="<?php echo $ss['cod_sistema']?>"><?php echo $ss['cod_sistema']?> - <?php echo $ss['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td><td><input type="text" name="descripcion" ></td><td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>