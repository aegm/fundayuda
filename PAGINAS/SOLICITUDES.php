<?PHP
session_start();
include('../PHP/DB.PHP');
?>
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
  <div align="right" class="usuario"><img src="../IMAGENES/user.png" width="16" height="16" style="vertical-align:text-bottom;"><?=$_SESSION['ENCARGADO'].' '.$_SESSION['APELLIDO']?></div>
   <br/>
   <div width="%" class="conten_der">
       <div class="block_head">
           <h3 class="span2"><small>SOLICITUDES</small></h3>
           <div class="iconos" id="lista"></div>
       </div><br>
        <?php
           $consultar=$db->execute("SELECT s.CEDULA_RIF_USR, s.ID_SOLICITUD, s.STATUS, s.FECHA_SOLICITUD, t.NOMBRE_SOLICITUD FROM solicitud s, tipo_solicitud t
										where t.cod_solicitud= s.COD_SOLICITUD AND s.CEDULA_RIF_USR='".$_SESSION['ID_USUARIO']."'") or die ($db->ErrorMsg($db));
       ?>
        <table  class="table table-striped" style="width: 95%; margin-left: 2.5%;font-size: 13px;">
            <tr>
                <th>
                    Id Solicitud
                </th>    
                <th>
                    Tipo de solicitud
                </th>     
                <th>
                    Monto solicitado
                </th>
                <th>
                    Estatus Actual
                </th>    
            </tr>
            <?php
            while(!$consultar->EOF){
                ?> 
            <tr>
                <td><?=$consultar->fields[1]?></td>
                <td><?=$consultar->fields[4]?></td>
                <td><?=$consultar->fields[3]?></td>
                <td><?=$consultar->fields[2]?></td>
                <td onclick="javascript:detalle(<?=$consultar->fields[1]?>)"><i class="icon-white icon-edit"></i></td>
            </tr>
            <?php
            $consultar->movenext();}
            ?>

        </table> 
  
        <div id="form" title="Detalles" class="alert alert-heading span6" style="display: ;">
            <form class="form-horizontal">
                <h3 style="text-align: left;">Datos de la Solicitud</h3>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Cedula / Rif</label>
                            <div class="controls">
                                <input class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Indique la Cedula / Rif…">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Atendida Por:</label>
                            <div class="controls">
                                <input class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Por quien fue atendida">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Estatus</label>
                            <div class="controls">
                                <input class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Estatus Actual">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Observaciones</label>
                            <div class="controls">
                                <textarea class="input-xlarge" id="obs" rows="3" placeholder="Observaciones del beneficiario"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Visitadora Social</label>
                            <div class="controls">
                                <input class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Visitadora Social Asignada">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Fecha de la Visita</label>
                            <div class="controls">
                                <input class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Fecha de la Visita a realizar">
                            </div>
                        </div>     
                     <div style="clear:both;"></div>
                    </form></div>
          </div>     
   </div>       
</article>
  <footer>
    Copyright © 2011.Derechos Reservados.
	</footer>
</section>

</body>
<?php
include('../FUNCIONES/funciones_jquery.php');
?>
</html>



