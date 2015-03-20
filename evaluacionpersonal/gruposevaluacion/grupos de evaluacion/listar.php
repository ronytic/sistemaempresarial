<?php 
$folder="../../";
include_once("../../login/check.php");


include_once("../../../estructurabd/rh_competencia_mas.php");
$rh_competencia_mas=new rh_competencia_mas;
$rh_c_m=$rh_competencia_mas->mostrarTodoRegistro("",0,"descripcion");

include_once("../../../estructurabd/rec_cargo.php");
$rec_cargo=new rec_cargo;
$rec_c=$rec_cargo->mostrarTodoRegistro("",0,"descripcion");
?>
<h2>Búsqueda de Grupos de Evaluación</h2>
<form action="grupos de evaluacion/busqueda.php" method="post" class="formulario">
	<table class="table table-bordered" style="background-color:#FFFFFF">
    	<thead>
    	<tr>
        	<th>Cargo</th>
            <th>Competencia</th>
            <!--<th>Dirección</th>-->
        </tr>
        </thead>
        <tr>
        	<td><select name="cod_competencia"  class="form-control">
                <option value="">Seleccionar</option>
                        <?php foreach($rh_c_m as $rcm){?>
                        <option value="<?php echo $rcm['cod_competencia']?>"><?php echo $rcm['descripcion']?></option>
                        <?php }?>
        </select></td>
            <td><select name="cod_cargo"  class="form-control">
                <option value="">Seleccionar</option>
                        <?php foreach($rec_c as $rc){?>
                        <option value="<?php echo $rc['cod_cargo']?>"><?php echo $rc['descripcion']?></option>
                        <?php }?>
        </select></td>
            <td><input type="submit" name="Guardar" value="Buscar" class="btn btn-success"></td>
        </tr>
    </table>
	
    
</form>

<div id="respuestaformulario"></div>