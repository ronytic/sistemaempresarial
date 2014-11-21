<?php
session_start();
//print_r($_SESSION);
$folder="../";
include_once("../estructurabd/seg_empresa.php");
$seg_empresa=new seg_empresa;
$seg_e=$seg_empresa->mostrarTodoRegistro("",0,"descripcion");
?>
<!DOCTYPE html>
<html dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Raul</title>
   

    <link href="css/estilo.css" rel="stylesheet" type="text/css">
   <style type="text/css">
   	select{
		padding:7px;
		margin-right:26px;
		border:0px solid #FFFFFF;
		background:none;
		width:250px;
		outline:none;
	}
   </style>
</head>
<body><div id="preload_images"></div>

<img class="background-image" src="imagenes/fondo.png">

<div id="login-wrapper" style="opacity: 1; visibility: visible;">
    <div id="notify">
        

        <div id="login-status" class="error-notice" style="visibility: hidden">
            <span class="login-status-icon"></span>
            
        </div>
    </div>

    

    <div id="content-container">
        <div id="login-container">
            <div id="login-sub-container">
                <div id="login-sub-header">
<div class="titulo"><img src="imagenes/titulo.png" border="0"></div>
                </div>
                <div id="login-sub">
                    <div id="forms">
             
                        <form id="login_form" action="#" method="post" target="_top">
                        	<div class="input-req-login"><label for="empresa">Empresa</label></div>
                            <div class="input-field-login icon username-container">
                                <select name="cod_empresa" autofocus required>
                                    <option value="">Seleccionar</option>
                                    <?php foreach($seg_e as $se){
                                    ?>
                                    <option value="<?php echo $se['cod_empresa']?>"><?php echo $se['cod_empresa']?> - <?php echo $se['descripcion']?></option>
                                    <?php	
                                    }?>
                                </select>
                            </div>
                            
                            
                            <div class="input-req-login"><label for="user">Nombre de Usuario</label></div>
                            <div class="input-field-login icon username-container">
                                <input name="usuario" id="user" autofocus value="" placeholder="Introduzca su nombre de usuario." class="std_textbox" type="text" tabindex="1" required>
                            </div>
                            <div style="margin-top:30px;" class="input-req-login"><label for="pass">Contraseña</label></div>
                            <div class="input-field-login icon password-container">
                                <input name="contrasena" id="pass" placeholder="Ingrese su contraseña de la cuenta." class="std_textbox" type="password" tabindex="2" required>
                            </div>
                            <div class="controls">
                                <div class="login-btn">
                                    <button name="login" type="submit" id="login_submit" tabindex="3">Acceder</button>
                                  <p>&nbsp;</p>
                                </div>
                                          
                                   
                                                            </div>
                            <div class="clear" id="push"></div>
                        </form>

                    </div>


                </div>

            </div>

        </div>

        <div id="locale-footer" style="display: block;">
            <div class="locale-container">
                <noscript>
                    
                </noscript>
                
            </div>
        </div>
    </div>

</div>

    <div class="copyright"></div>

</body></html>