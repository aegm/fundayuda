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
					if ((data.respueta)==true){
					document.location='../paginas/PRINCIPAL.php';
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
				$('#contenido_error').html('Datos Invalidos');return false;
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

})
</script>
