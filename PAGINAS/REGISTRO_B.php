<!DOCTYPE HTML>
<html>
<head>
<link href="../CSS/estilo.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Documento sin título</title>
</head>
<body>
<section class="cuerpo" align="center">
	<header></header>
	<?php include('MENU.PHP') ?>
		<article class="sub_contenido">
      		<br/>
          
           <!--tabla para el registro del beneficiario de una empresa-->
                <form id="registro_beneficiador" method="post">
                <table id="datos_empresa" align="center"  class="registro">
                    <tr>
                    	<td colspan="6"  class="titulo">
                        Registro de usuario Beneficiador
                        </td>
                    </tr>
                    <tr>
                    	<td >
                        <address>Nombre</address>
                        </td>
                        <td>
                        <input type="text" id="responsable" name="responsable">
                        </td>
                        <td>
                       <address> Cedula</address>
                        </td>
                        <td>
                        <input type="text" id="cedula" name="cedula">
                        </td>
                    </tr>
                    <tr>
                        <td width="71">
                        <address>
                        Apellido
                        </address>
                        </td>
                        <td width="147">
                        <input type="text" id="apellido" name="apellido" >
                        </td>
                        <td width="31">
                        <address>
                        Email
                        </address>
                        </td>
                        <td width="197">
                        <input type="email" id="email" name="email" style="width:190PX;">
                        </td>
                        </tr>
                        <td width="47">
                        <address>
                        Telefono:
                        </address>
                        </td>
                        <td width="149">
                        <input type="text" id="telefono" name="telefono" alt="telefono">
                        </td>
                        <td>
                        <address>
                        Clave
                        </address>
                        </td>
                        <td>
                        <input type="password" id="pass" name="pass" style="border:#F00 1PX solid;">
                        </td>
                    </tr>
                    <tr>
                    	<td>
                    	<address>
                        Dirección:
                        </address>
                        </td>
                        <td colspan="3">
                        <textarea id="direccion" name="direccion" style="width:350px;resize: none;" rows="2"></textarea>
                        </td>
                        <td id="repuesta" style="color:#F00;">
                        
                        </td>
                        <td rowspan="2">
                        <img src="../IMAGENES/usuario.png" width="80" height="80">
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        <input type="button" value="Guardar Registro" id="guardar_registro_B">
                        </td>
                        <td>
                        <input type="hidden" id="tipo" name="tipo" value="2">
                        </td>
                    </tr>
                </table>
            	</form>
                <br>
        </article>
    <footer>
    
    Copyright © 2011.Derechos Reservados.
	</footer>
    <div id="dialog">
    	<div id="contenido_error"></div>
    </div>
</section>
</body>
<?php
include('../FUNCIONES/funciones_jquery.php');
?>
</html>