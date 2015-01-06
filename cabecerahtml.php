<?php

$Titulo="Sistema de Gestión de Reclutamiento";
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8" />
		<title><?php echo $idioma['TituloSistema']?></title>

		<meta name="description" content="Sistema Desarrollado por Ronald Nina Layme">
		<meta name="author" content="Sistema Desarrollado por Ronald Nina Layme">

		<!-- Inicio: Version Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fin: Version Mobile -->
        
        <!-- Inicio: Icono -->
        <link rel="shortcut icon" href="<?php echo $folder;?>imagenes/logos/<?php echo $LogoIcono?>" />
        <!-- Fin: Icono -->
        
		<!-- basic styles -->

		<link href="<?php echo $folder;?>css/core/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $folder;?>css/core/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo $folder;?>css/core/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo $folder;?>css/core/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo $folder;?>css/core/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $folder;?>css/core/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo $folder;?>css/core/ace-skins.min.css" />
        <link id="bootstrap-style" href="<?php echo $folder;?>css/estilo.css" rel="stylesheet">

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo $folder;?>css/core/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="<?php echo $folder;?>js/core/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo $folder;?>js/core/adicionales/html5shiv.js"></script>
		<script src="<?php echo $folder;?>js/core/adicionales/respond.min.js"></script>
		<![endif]-->


	<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo $folder;?>js/core/framework/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
