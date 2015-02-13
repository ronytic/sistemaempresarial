<?php
session_start();
//print_r($_SESSION);
$folder="../";
include_once("../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro("",0,"descripcion");
include_once("../cabecerahtml.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8" />
		<title>.::<?php echo $idioma['AccesoSistema']?> | <?php echo $title;?> | <?php echo $idioma['TituloSistema']?>::.</title>

		<meta name="description" content="Sistema Desarrollado por Ronald Nina Layme">
		<meta name="author" content="Sistema Desarrollado por Ronald Nina Layme">
        
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="<?php echo $folder?>css/core/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $folder?>css/core/font-awesome.min.css" />
		<link rel="shortcut icon" href="../imagenes/logos/<?php echo $LogoIcono?>" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo $folder?>css/core/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo $folder?>css/core/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo $folder?>css/core/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $folder?>css/core/ace-rtl.min.css" />

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo $folder?>js/core/framework/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
        
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo $folder?>css/core/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo $folder?>js/core/adicionales/html5shiv.js"></script>
		<script src="<?php echo $folder?>js/core/adicionales/respond.min.js"></script>
		<![endif]-->
        <script type="text/javascript" language="javascript" src="js/login.js"></script>
        <script language="javascript" type="text/javascript">
			RedirigirLogin=1;
			var AyudaTitulo="<?php echo $idioma['AyudaTitulo']?>";
		</script>
	</head>

<body>
	<div class="main-content">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-1">
				<div class="login-container">
                	<div class="center">
                        <h1>
                            <span class="red">Sistema de Reclutamiento</span>

                        </h1>
                        <h4 class="blue"></h4>
                    </div>
                    <br><br>
					<fieldset style="border:#CBCBCB 1px solid;padding:25px;">
						<legend style="border:#CBCBCB 1px solid;padding:10px;text-align:center">Datos de Acceso</legend>
					<?php
                        if(isset($_GET['incompleto'])){
                        ?>
                        <div class="alert alert-error">
                            <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                            Los datos estan incompleto
                        </div>
                        <?php
                        }
                        if(isset($_GET['error'])){
                        ?>
                        <div class="alert alert-info">
                            <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                            Los datos introducidos son erroneos, intentelo nuevamente
                        </div>
                        <?php
                        }
                    ?>
                    <form action="login.php" method="post">
                        <input type="hidden" name="u" value="<?php echo $_GET['u'];?>">
                        <table>
                            <tr><td>Empresa</td><td><select name="cod_empresa" autofocus required>
                                    <option value="">Seleccionar</option>
                                    <?php foreach($seg_e as $se){
                                    ?>
                                    <option value="<?php echo $se['cod_empresa']?>"><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                                    <?php	
                                    }?>
                                </select>
                                
                                
                                </td></tr>
                            <tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
                            <tr><td>Contraseña</td><td><input type="password" name="contrasena"></td></tr>
                            <tr><td></td><td><input type="submit" name="" value="Ingresar" class="btn btn-success"></td></tr>
                        </table>
                    </form>
                    </fieldset>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
