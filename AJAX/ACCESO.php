<?php
session_start();
include('../PHP/DB.php');
$usuario=$_REQUEST['cedula'];
$clave=$_REQUEST['clave'];
	$consultar=$db->execute("SELECT u.ENCARGADO, u.APELLIDO_USR, u.ID_USUARIO, u.CEDULA_RIF_USR, u.EMAIL, U.TIPO_USR  FROM usuario u
							 where u.ID_USUARIO='".$usuario."' AND U.PASSWORD='".$clave."'")or die ($db->ErrorMsg($db));

						 
if(!$consultar->EOF){	
$_SESSION['ENCARGADO']=$consultar->fields['ENCARGADO'];
$_SESSION['APELLIDO']=$consultar->fields['APELLIDO_USR'];
$_SESSION['ID_USUARIO']=$consultar->fields['ID_USUARIO'];
$_SESSION['TIPO_USR']=$consultar->fields['TIPO_USR'];
$_SESSION['CEDULA_RIF_USR']=$consultar->fields['CEDULA_RIF_USR'];
$datos['EMAIL']=$consultar->fields['EMAIL'];;
	$datos['tipo']=$consultar->fields['TIPO_USR'];
	$datos['estatus']=true;
        
}else{
	$datos['estatus']=false;
        $datos['mensaje']="usuario Invalido";
  
}  echo json_encode($datos);
?>