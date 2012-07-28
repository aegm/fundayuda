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
        	<div>
           		<form id="ben" method="post">
                <table  align="center" class=" ui-corner-all ui-widget-content" id="login" >
                	<tr>
                    	<td colspan="2" align="center" class="ui-widget-header" style="box-shadow:-webkit-box-shadow: 0 0 5px #888;">Acceso</td>
                    </tr>
                    <tr>
                    	<td style="font-weight:bold;">
                        Usuario
                        </td>
                    	<td>
                        <input id="cedula" name="cedula" type="text">
                        </td>
                    </tr>
                    <tr>
                    	<td style="font-weight:bold;">
                        Clave:
                        </td>
                        <td>
                        <input id="clave" name="clave" type="password">
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="center">
                        <input type="button" id="Ingresar" value="Ingresar">
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="center">
                       <?php
					   if ($_GET['tipo']=='1'){ ?>
					   <a href="REGISTRO.php"> Registrar</a>
						<?php }else{ ?>
						 <a href="REGISTRO_B.php"> Registrar</a>
						<?PHP  }?>
                      
                        </td>
                    </tr>
                </table>
                </form>
            </div>
            <div style="clear:both; height:47PX;"></div>
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