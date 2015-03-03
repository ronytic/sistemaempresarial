<?php 
$folder="../../";
include_once("../../login/check.php");
include_once("../../estructurabd/seg_sistema.php");
$seg_sistema=new seg_sistema;
$seg_s=$seg_sistema->mostrarTodoRegistro($condicion,0,"descripcion");

include_once("../../estructurabd/seg_rol.php");
$seg_rol=new seg_rol;
$seg_r=$seg_rol->mostrarTodoRegistro("cod_empresa='".$_SESSION['cod_empresa']."'",0,"descripcion");
//print_r($_SESSION);
$titulo="Registrar Nuevo Candidato";
include_once("../../cabecerahtml.php");
?>

<?php
//print_r($_SESSION);
include_once("../../cabecera.php");
?>
<h2>Nuevo Candidato</h2>
<form action="guardar_candidato.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="cod_recluta" value="<?php echo $_GET['cod_recluta']?>">
	<table class="table table-bordered table-hover" style="background-color:#FFFFFF">
        <tr><td>Cédula de Identidad</td><td><input type="text" name="cedula" required></td></tr>
        <tr><td>Expedido</td><td><input type="text" name="exp" required size="3" maxlength="3"></td></tr>
        <tr><td>Nombre</td><td><input type="text" name="nombre" required></td></tr>
        
        <tr><td>Apellido Paterno</td><td><input type="text" name="paterno" required></td></tr>
        <tr><td>Apellido Materno</td><td><input type="text" name="materno" required></td></tr>
        <tr><td>Fecha de Nacimiento</td><td><input type="date" name="fecha_nac" required></td></tr>
        <tr><td>Ciudad de Nacimiento</td><td><input type="text" name="ciudad_nac" required></td></tr>
        <tr><td>Pais de Nacimiento</td><td><input type="text" name="pais_nac" required></td></tr>
        <tr><td>Dirección</td><td><input type="text" name="direccion" required></td></tr>
        <tr><td>Teléfono</td><td><input type="text" name="telefono" required></td></tr>
        <tr><td>Correo Electronico</td><td><input type="email" name="mail" ></td></tr>
        <tr><td>Foto</td><td><input type="file" name="foto" ></td></tr>
        <tr><td></td><td><input type="submit" name="Guardar" value="Guardar" class="btn btn-success"></td></tr>
    </table>
	
    
</form>
<?php include_once("../../pie.php");?>
