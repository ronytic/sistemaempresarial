<?php
include_once("../../login/check.php");
include_once("../../estructurabd/rec_prueba.php");
extract($_GET);

$rec_prueba=new rec_prueba;
$condicion="cod_prueba  LIKE '$cod_prueba'";

$rec_p=$rec_prueba->mostrarTodoRegistro($condicion,0);
$rec_p=array_shift($rec_p);

include_once("../../estructurabd/rec_tipo_prueba.php");
$rec_tipo_prueba=new rec_tipo_prueba;
$rec_t_p=$rec_tipo_prueba->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");

include_once("../../estructurabd/rec_banco.php");
$rec_banco=new rec_banco;
$rec_b=$rec_banco->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' ",0,"cod_banco");
include_once("../../estructurabd/rec_banco_preguntas.php");
$rec_banco_preguntas=new rec_banco_preguntas;
?>
<h2>Modificar Prueba</h2>
<form action="pruebas/actualizar.php" method="post">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
    	<tr><td>Código</td><td><input type="text" name="cod_prueba" max="3" maxlength="3" autofocus required value="<?php echo $rec_p['cod_prueba']?>" readonly></td></tr>
        
        <tr><td>Tipo de Prueba</td><td><select name="cod_tipo" required>
            	<option value="">Seleccionar</option>
            	<?php foreach($rec_t_p as $rtp){
				?>
                <option value="<?php echo $rtp['cod_tipo']?>" <?php echo $rtp['cod_tipo']==$rec_p['cod_tipo']?'selected="selected"':''?>><?php echo $rtp['cod_tipo']?> - <?php echo $rtp['descripcion']?></option>
                <?php	
				}?>
            </select>
            
            
            </td></tr>
        <tr><td>Banco de Preguntas</td><td><select name="cod_banco">
                	<?php foreach($rec_b as $rb){
						$rec_b_p=$rec_banco_preguntas->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."' and cod_banco='".$rb['cod_banco']."'",0,"nro");						
					?>
                    
                    <option value="<?php echo $rb['cod_banco']?>" <?php echo $rec_p['cod_banco']==$rb['cod_banco']?'selected="selected"':'';?>><?php echo $rb['cod_banco']?> - <?php echo $rb['descripcion']?> - <?php echo count($rec_b_p)?> Preguntas</option>
                    <?php	
					}?>
                </select></td></tr>        
        <tr><td>Descripción</td><td><input type="text" name="descripcion" required value="<?php echo $rec_p['descripcion']?>"></td></tr>
		<tr><td>Tiempo de la Prueba</td><td><input type="number" name="tiempo" required min="0" max="9999" value="<?php echo $rec_p['tiempo']?>">Minutos</td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
