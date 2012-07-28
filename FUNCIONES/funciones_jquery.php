<link href="../UTILIDADES/jquery-ui-1.8.16.custom/css/sunny/jquery-ui-1.8.16.custom.css" type="text/css" rel="stylesheet">
<script src="../UTILIDADES/jquery-ui-1.8.16.custom/js/jquery-1.6.2.min.js"></script>
<script src="../UTILIDADES/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../UTILIDADES/meio_mask/jquery.meio.mask.js"></script>
<!---------------------Creando el efecto al Login-------------------------------------->
<style type="text/css">
    .toggler { width: 500px; height: 200px; }
    #button { padding: .5em 1em; text-decoration: none; }
    #effect { width: 250px; height: 135px; padding: 0.4em; position: relative; margin:100px 300px 50px 280px; }
    #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
</style>

<script type="text/javascript">
 <!-------------------Funcion para las maskaras--------------->	
$(function(){
			$('input:text').setMask();
			});
		$.mask.masks =  {
		'telefono'     : { mask : '(999) 9999-999' },
		'phone-us'  : { mask : '(999) 9999-9999' },
		'cpf'       : { mask : '999.999.999-99' },
		'cedula'      : { mask : '99999999' },
		'date'      : { mask : '39/19/9999' }, //uk date
		'date-us'   : { mask : '19/39/9999' },
		'rif'       : { mask : 'J-99999999-9',defaultValue : 'J' },
		'time'      : { mask : '29:69' },
		'cc'        : { mask : '9999 9999 9999 9999' }, //credit card mask
		'sd'   : { mask : '999.999.999.999', type : 'reverse' },
		'decimal'   : { mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' },
		'decimal-us'    : { mask : '99.999,999,999,999', type : 'reverse', defaultValue: '000' },
		'signed-decimal'    : { mask : '99,999.999.999.999', type : 'reverse', defaultValue : '+000' },
		'signed-decimal-us' : { mask : '99,999.999.999.999', type : 'reverse', defaultValue : '+000' }
		};
 
 /**********************************Funcion para los Botones**************************************/  	
$(function() {
		$( "#Ingresar" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		$( "#guarda_vehiculo" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		$( "#guardar_registro" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		$( "#guardar_registro_B" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		$( "#guardar_solicitud" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		$( "#atras" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		$( "#modificar_solictud" ).button({
            icons: {
                primary: "ui-icon-gear",
            }
		});
		
		
		
	});

 /**********************************Funcion para efectos del login********************************/    
   jQuery.fx.speeds._default = 1000;
    // confirm o alerta
     /* $(function() {
        $('#dialog').dialog({
         autoOpen: true,
         width: 400,
         buttons: {
             "Ok": function() {
             $(this).dialog("close");
             }/*,
             "Cancel": function() {
             $(this).dialog("close");
             }*/
         /*}	
        })
    });*/
    jQuery(function() {
        var options = {};
        jQuery("#effect").show('bounce',options,500);
    });
    

</script>
<script>
function buscar_reg(id){
		var b_solicutd=id;
		$("#solicitar").css('display','');
		$( "#solicitar" ).dialog({
				autoOpen: true,
				show: "blind",
				hide: "explode",
				width:"700",
				height:"600"
			});
			$.ajax({
						type	: "POST",
						cache	: false,
						dataType: "json",
						url		:"../AJAX/BUSCAR_SOLICITUD.php?id="+b_solicutd,
						data	:b_solicutd,
						success: function(data) {
								$("#observaciones").val(data.OBSERVACIONES);
								$("#tipo_solicitud").val(data.COD_SOLICITUD);	
								$("#monto_sol").val(data.MONTO_SOLICITUD);
								$("#monto_asig").val(data.MONTO_APROBADO);		
								$("#empresa_sub").val(data.CEDULA_RIF_SUB);		
								$("#trabajador_social").val(data.TRABAJADOR_SOCIAL);
								$("#status").val(data.STATUS);	
								$("#fecha_visita").val(data.FECHA_VISITA);
								$("#centro_medico").val(data.MONTO_SOLICITUD);		
								$("#observaciones_empresa").val(data.OBSERVACIONES_SUBCIDIO);	
							
						}
					});	return false;	
	
}


</script>

<script>
$(document).ready(function(){


/***********************************Funcion para el Acceso al sistema*****************************/
$("#Ingresar").click(function(){
		if($("#cedula").val()=='' || $("#clave").val=='') {												
                                            $( "#dialog" ).dialog({
							autoOpen: true,
							width: 300,
							modal: true,
							title: 'Error:',
							show: 'explode',
							dialogClass: 'alert',
							buttons: {
							"Ok": function() {
								$(this).dialog("close");
								}/*,
								"Cancelar": function() {
								$(this).dialog("close");
								}*/
							}
			});
						$('#contenido_error').html('Debes llenar el campo usuario y Clave');return false;
		}else{
				$.ajax({
				type	: "POST",
				cache	: false,
				dataType: "json",
				url		:"../AJAX/ACCESO.php",
				data	:$("#ben").serialize(),
				success: function(data) {
					if(data.estatus){
						if ((data.tipo)=='1'){
						window.location="../PAGINAS/BANDEJA_ENTRADA.PHP";
						}else{
						window.location="../PAGINAS/SOLICITUDES.PHP";
						}
					}else{
					$( "#dialog" ).dialog({
							autoOpen: true,
							width: 300,
							modal: true,
							title: 'Error:',
							show: 'explode',
							dialogClass: 'alert',
							buttons: {
							"Ok": function() {
								$(this).dialog("close");
								}/*,
								"Cancelar": function() {
								$(this).dialog("close");
								}*/
							}
			});
						$('#contenido_error').html(data.mensaje);return false;
					}
				
				}
			});
		}
	});
	$("#guardar_registro").click(function(){
		if($("#cedula").val()=='' || $("#clave").val=='' || $("#responsable").val=='' || $("#rif").val=='J' || $("#email").val=='' || $("#telefono").val=='' || $("#direccion").val=='' || $("#nombre_empresa").val=='' ) {												
				$( "#dialog" ).dialog({
								autoOpen: true,
								width: 300,
								modal: true,
								title: 'Error:',
								show: 'explode',
								dialogClass: 'alert',
								buttons: {
								"Ok": function() {
									$(this).dialog("close");
									}/*,
									"Cancelar": function() {
									$(this).dialog("close");
									}*/
								}
				});
				$('#contenido_error').html('Debes llenar el campo Solicitados');return false;
		}else{
		$.ajax({
				type	: "POST",
				cache	: false,
				dataType: "json",
				url		:"../AJAX/GUARDAR_REGISTRO.php",
				data	:$("#registro_beneficiador").serialize(),
				success: function(data) {
					$( "#dialog" ).dialog({
								autoOpen: true,
								width: 300,
								modal: true,
								title: 'alert:',
								show: 'explode',
								dialogClass: 'alert',
								buttons: {
								"Ok": function() {
										window.location="../PAGINAS/REGISTRO.php";
									$(this).dialog("close");
									}/*,
									"Cancelar": function() {
									$(this).dialog("close");
									}*/
								}
				});
				var repuesta=data.repuesta
				$('#contenido_error').html(repuesta);return false;
				
				}
			});	
		}
	});
	$("#guardar_registro_B").click(function(){
		if($("#cedula").val()=='' || $("#clave").val=='' || $("#responsable").val=='' || $("#apellido").val=='J' || $("#email").val=='' || $("#telefono").val=='' || $("#direccion").val=='' || $("#clave").val=='' ) {												
				$( "#dialog" ).dialog({
								autoOpen: true,
								width: 300,
								modal: true,
								title: 'Error:',
								show: 'explode',
								dialogClass: 'alert',
								buttons: {
								"Ok": function() {
									$(this).dialog("close");
									}/*,
									"Cancelar": function() {
									$(this).dialog("close");
									}*/
								}
				});
				$('#contenido_error').html('Debes llenar el campo Solicitados');return false;
		}else{
		$.ajax({
				type	: "POST",
				cache	: false,
				dataType: "json",
				url		:"../AJAX/GUARDAR_REGISTRO.php",
				data	:$("#registro_beneficiador").serialize(),
				success: function(data) {
					$( "#dialog" ).dialog({
								autoOpen: true,
								width: 300,
								modal: true,
								title: 'alert:',
								show: 'explode',
								dialogClass: 'alert',
								buttons: {
								"Ok": function() {
									$(this).dialog("close");
									window.location="../PAGINAS/REGISTRO_B.php";
									}/*,			location.reload();
									"Cancelar": function() {
									$(this).dialog("close");
									}*/
								}
					});
				var repuesta=data.repuesta
				$('#contenido_error').html(repuesta);return false;
	
				}
				
			});	
		}
	});
	$(function() {
		$( "#tabs" ).tabs({
		   		select: function(event, ui) {
			   
			    }
		});	
});
<!-------------------Funcion para guardar una solicitud--------------->	
	$("#guardar_solicitud").click(function(){	
		if($("#tipo_solicitud").val()=='0' || $("#observaciones").val=='') {
					$( "#dialog" ).dialog({
							autoOpen: true,
							width: 300,
							modal: true,
							title: 'Error:',
							show: 'explode',
							dialogClass: 'alert',
							buttons: {
							"Ok": function() {
								$(this).dialog("close");
								}/*,
								"Cancelar": function() {
								$(this).dialog("close");
								}*/ 
							}
					});
						$('#contenido_error').html('Debes llenar todos los campos Solicitados');return false;
			}else{
				$.ajax({
					type	: "POST",
					cache	: false,
					dataType: "json",
					url		:"../AJAX/GUARDAR_SOLICITUD.php",
					data	:$("#solicitud_ayuda").serialize(),
					success: function(data) {
					location.reload();
					}
				});
			}return false;

	});


	$("#sol").click(function(){
	  		var b_solicutd=$("#solicitud").val();
			$("#observaciones").attr('disabled','disabled'); 
			$("#tipo_solicitud").attr('disabled','disabled'); 
			$("#monto_sol").attr('disabled','disabled');
			$("#monto_sol").attr('disabled','disabled'); 
			$("#monto_sol").attr('disabled','disabled'); 
			$("#monto").css('display','');
			$("#monto_asignado").css('display','');
			$("#monto_asig").attr('disabled','disabled');
			$("#sub").css('display','');
			$("#sub_por").css('display','');
			$("#trabajador").css('display','');
			$("#trabajador_soc").css('display','');   
			$("#status").css('display','');   
			$("#status_sol").css('display','');   
			$("#fecha").css('display',''); 
			$("#fecha_visita").css('display','');   
			$("#informe").css('display','');
			$("#informe_medico").css('display','');
			$("#remetido").css('display','');
			$("#remitido_por").css('display','');
			$("#obser").css('display','');
			$("#observaciones_empre").css('display','');
			$("#guardar_solicitud").css('display','none');
			$("#tabs-2").css('display','none');
			$("#atras").css('display','');
			
		$.ajax({
						type	: "POST",
						cache	: false,
						dataType: "json",
						url		:"../AJAX/BUSCAR_SOLICITUD.php?id="+b_solicutd,
						data	:b_solicutd,
						success: function(data) {
								$("#tabs-1").attr('class','selector ui-tabs-panel ui-widget-content ui-corner-bottom');
								
								$("#observaciones").val(data.OBSERVACIONES);
								$("#tipo_solicitud").val(data.COD_SOLICITUD);	
								$("#monto_sol").val(data.MONTO_SOLICITUD);
								$("#monto_asig").val(data.MONTO_APROBADO);		
								$("#empresa_sub").val(data.CEDULA_RIF_SUB);		
								$("#trabajador_social").val(data.TRABAJADOR_SOCIAL);
								$("#status").val(data.STATUS);	
								$("#fecha_visita").val(data.FECHA_VISITA);
								$("#centro_medico").val(data.MONTO_SOLICITUD);		
								$("#observaciones_empresa").val(data.OBSERVACIONES_SUBCIDIO);		
								
												
										
						
					
							
						}
					});	return false;	
	
	});
/************************************Modificar Solictud**************************************/		
$("#modificar_solictud").click(function(){
				$.ajax({
						type	: "POST",
						cache	: false,
						dataType: "json",
						url		:"../AJAX/MODIFCAR_SOLICITUD.php",
						data	:$("#modificar_sol").serialize(),
						success: function(data) {
						}
				});
});
})

function detalle()
{
   
   $( "#dialog-form" ).dialog({
			autoOpen: true,
			height: 300,
			width: 700,
			modal: true,
			buttons: {
                            
                        }
   });
}

function detalle(id)
{
   $('#form').animate({
    //opacity: 0.25,
    left: '+=50',
    height: 'toggle',
    weight: 'toggle'
  }, 1000, function() {
    // Animation complete.
  });
  
                                $.ajax({
						type	: "POST",
						cache	: false,
						dataType: "json",
						url		:"../AJAX/datos_sol.php?id="+id,
						data	:'',
						success: function(data) {
						}
				});
}
</script>
