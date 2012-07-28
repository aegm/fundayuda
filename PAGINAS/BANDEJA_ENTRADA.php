<?php
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
       		<div class="demo">
              <div align="center" id="tabs" style="width:650px; font-size:12px; font-family:Tahoma, Geneva, sans-serif; margin:10px auto auto 50px;">
                        <ul>
                            <li><a href="#tabs-1">Bandeja de Entrada</a></li>
                        </ul>		 
                 <div id="tabs-1">       
                 <div>
					 <?php
                     $consultar=$db->execute("SELECT s.ID_SOLICITUD, s.COD_SOLICITUD, s.OBSERVACIONES, s.MONTO_SOLICITUD, s.FECHA_SOLICITUD, s.STATUS, t.NOMBRE_SOLICITUD, u.ENCARGADO, u.APELLIDO_USR  FROM solicitud s, tipo_solicitud t, usuario u
												where s.COD_SOLICITUD= t.COD_SOLICITUD and s.CEDULA_RIF_USR=u.ID_USUARIO
											  order by  FECHA_SOLICITUD");
                     
                      ?>
                      <table width="600" cellspacing="0" style="border:1px solid;">
                      
                      <tr>
                      	<td>
                        </td>
                        <td style="font-weight:bold; text-align:center;">
                        Fecha de la Solicitud
                        </td>
                        <td style="font-weight:bold; text-align:center;">
                        Nombre del Solicitante
                        </td>
                        <td style="font-weight:bold; text-align:center;">
                        tipo de Solicitud
                        </td>
                        <td style="font-weight:bold; text-align:center;">
                        Monto a Solicitar
                        </td>
                        <td style="font-weight:bold; text-align:center;">
                        status
                        </td>
                      </tr>
                        <?php while(!$consultar->EOF){
						  ?> 
                      <tr class="bandeja" id="bandeja">
                      	<td>
                        <img src="../IMAGENES/Internet_Search.png" width="30" height="30" id="buscar" onClick="javascript:buscar_reg(<?=$consultar->fields['ID_SOLICITUD']?>)" >
                        <input  type="hidden" value="<?=$consultar->fields['ID_SOLICITUD']?>" id="id_solictud">
                        </td>
                        <td>
                        <?=$consultar->fields['FECHA_SOLICITUD']?>
                        </td>
                        <td>
                        <?=$consultar->fields['ENCARGADO'].' '.$consultar->fields['APELLIDO_USR']?>
                        </td>
                        <td>
                        <?=$consultar->fields['NOMBRE_SOLICITUD']?>
                        </td>
                        <td>
                        <?=$consultar->fields['MONTO_SOLICITUD']?>
                        </td>
                        <td>
                        <?=$consultar->fields['STATUS']?>
                        </td>
                             
                      </tr>  
                       <?php $consultar->movenext();}?>       
                      </table>
                    
                      </div>
                      </div>
                      <form id="modificar_sol" name="modificar_sol" >
                 <table align="left" id="solicitar" style="display:; font-size:12px;">
                    <tr>
                    	<td>
                        Tipo de Solicitud
                        <input type="hidden" value="<?=$consultar->fields['COD_SOLICITUD']?>">
                        </td>
                        <td>
                        <select id="tipo_solicitud" name="tipo_solicitud" onfocus="this.blur()" >
                        <option id="opt_tipo" value="0" >Seleccione</option>
							<?PHP
                            
                            $consultar=$db->execute("SELECT COD_SOLICITUD, NOMBRE_SOLICITUD FROM tipo_solicitud");
                            while(!$consultar->EOF){			
                            ?>
						 <option id="opt_tipo" value="<?=$consultar->fields['COD_SOLICITUD']?>"><?=$consultar->fields['NOMBRE_SOLICITUD']?></option>
                        <?php $consultar->movenext(); } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        Observaciones
                        </td>
                        <td colspan="4">
                        <textarea id="observaciones" name="observaciones" rows="3" cols="80" style="resize:none;" readonly></textarea>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        Monto Solicitado
                        </td>
                        <td>
                        <input type="text" id="monto_sol" name="monto_sol" alt="decimal">
                        </td>
                        <td id="monto" >
                        Monto Asignado
                        </td>
                        <td id="monto_asignado" >
                        <input type="number" id="monto_asig" name="monto_asig" >
                        </td>
                    </tr>
                    
                    	
                        <td id="trabajador">
                        Trabajador Social 
                  </td>
                        <td id="trabajador_soc">
                        <input type="text" id="trabajador_social" name="trabajador_social" >
                        </td>
                         <td id="fecha" >
                        Fecha Visita
                  </td>
                        <td id="fecha_visita">
                        <input type="datetime" id="fecha_visita" name="fecha_visita" >
                      </td>
                    </tr>
                    <tr>
                    	<td id="status">
                   		 Status
                        </td>
                      <td id="status_sol">
                       	 <select id="status" name="status">
                         <option id="opt_status" value="Sin Procesar" >Sin Procesar</option>
                         <option id="opt_status" value="En Proceso">En Proceso</option>
                         <option id="opt_status" value="Pago Emitido">Pago Emitido</option>
                         <option id="opt_status" value="Pagado">Pagado</option>
                         </select> 
                        </td>
                        <td id="remetido" >
                        Remitido a 
                        </td>
                        <td id="remitido_por" >
                        <select id="centro_medico" style="width:280px;" >
                        <option value="0">Centro Medico</option>
                        <?php
						$centro=$db->execute("select COD_CENTRO, NOMBRE_CENTRO FROM centro_medico");
						while(!$centro->EOF){
						?>
                         <option value="<?=$centro->fields['COD_CENTRO']?>"><?=utf8_encode($centro->fields['NOMBRE_CENTRO'])?></option>
                        <?php $centro->movenext(); }?>
                        </select>
                        </td>
                       
                     </tr>
                     <tr>
                         <td id="informe">
                         Informe Medico 
                   </td>
                         <td id="informe_medico">
                         <select id="informe" name="informe" >
                         <option id="opt_Informe" value="0">Pendiente</option>
                         <option id="opt_Informe" value="1">Recibido</option>
                         </select> 
                         </td>
                     	
                     </tr>
                     <tr>
                     	<td id="obser">
                        Observaciones Empresa
                   	   </td>
                       <td colspan="3" id="observaciones_empre">
                        <textarea  id="Observacion_empresa" name="Observacion_empresa" rows="3" cols="80" style=" resize:none;"></textarea>
                       </td>
                     </tr>
                    <tr>
                    	<td>
                        <input type="hidden" value="1" id="tipo" name="tipo">
                        <input  type="hidden" value="<?=$consultar->fields['ID_SOLICITUD']?>" id="sol" name="sol"></td>
                    </tr>
                    <tr>
                     	<td>
                        <button id="modificar_solictud">Guardar</button>
          
                        </td>
                    </tr>
                    </table>
                    </form>
                      
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

