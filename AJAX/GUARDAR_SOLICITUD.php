<?php
session_start();
include('../PHP/DB.php');
$tipo=$_REQUEST['tipo'];
$tipo_solicitud=$_REQUEST['tipo_solicitud'];
$observaciones=$_REQUEST['observaciones'];
$monto_sol=$_REQUEST['monto_sol'];
$trabajador_social=$_REQUEST['trabajador_social'];
$cedula=$_SESSION['ID_USUARIO'];

$inserta_solicitud=$db->execute("INSERT INTO solicitud (COD_SOLICITUD, OBSERVACIONES, MONTO_SOLICITUD, FECHA_SOLICITUD, STATUS, CEDULA_RIF_USR) 
												 VALUES('".$tipo_solicitud."','".$observaciones."','".$monto_sol."',NOW(),'Sin Procesar','".$cedula."')")or die($db->ErrorMsg($db));



