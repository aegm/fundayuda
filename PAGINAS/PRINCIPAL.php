<!DOCTYPE HTML>
<html>
<head>
<link href="../CSS/estilo.css" type="text/css" rel="stylesheet">
<link href="../CSS/slider.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Documento sin título</title>
<script src="../UTILIDADES/jquery-ui-1.8.16.custom/js/jquery-1.6.2.min.js"></script>
<script src="../UTILIDADES/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../UTILIDADES/sliderviewer/jquery.easing.1.3.js"></script>
<script src="../UTILIDADES/sliderviewer/jquery.slideviewer.1.2.js"></script>
</head>
<body>
<section class="cuerpo" align="center">
	<header></header>
	<?php include('MENU.PHP') ?>
		<article class="sub_contenido">
        	    <div align="center" style=" margin-left:10%; width:500px; height:240px; margin-top:5px;">
                <div id="galeria" >
                        <ul>
                        <li><img src="../IMAGENES/v19-t21.jpg" alt="my description for this image" width="500" height="240" /></li>
                        <li><img src="../IMAGENES/mano_mano.jpg" alt="my description for this image" width="500" height="240" /></li>
                        <!--eccetera-->
                        </ul>
                </div>
                </div> 
                <br><br>
        </article>
    <footer>
   
    Copyright © 2011.Derechos Reservados.
	</footer>
</section>
</body>
<script type="text/javascript">
$(window).bind("load", function() {
$("div#galeria").slideView()
}); 
</script>
</html>