<?php 
include_once("../../login/check.php");
$folder="../../";


include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

include_once("../../estructurabd/rec_banco.php");
$rec_banco=new rec_banco;
$rec_banco->__set("campos",array("cod_banco,count(*) as Cantidad"));
$rec_b=$rec_banco->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' GROUP BY cod_banco",0,"");
?>
<h2>Nueva Prueba</h2>
<form action="pruebas/guardar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_prueba" max="3" maxlength="3" autofocus required></td></tr>
        <tr><td>Tipo de Prueba</td><td><select name="cod_tipo" autofocus required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_t_p as $rtp){
				?>
                <option value="<?php echo $rtp['cod_tipo']?>"><?php echo $rtp['cod_tipo']?> - <?php echo $rtp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Banco de Preguntas</td><td><select name="cod_banco">
                	<?php foreach($rec_b as $rb){
					?>
                    
                    <option value="<?php echo $rb['cod_banco']?>" <?php echo $rec_b['cod_banco']==$rb['cod_banco']?'selected="selected"':'';?>><?php echo $rb['cod_banco']?> - <?php echo $rb['Cantidad']?> Preguntas</option>
                    <?php	
					}?>
                </select></td></tr>    
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required></td></tr>
        <tr><td>Tiempo de la Prueba</td><td><input type="number" name="tiempo" required min="0" max="9999">Minutos</td></tr>
        
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
