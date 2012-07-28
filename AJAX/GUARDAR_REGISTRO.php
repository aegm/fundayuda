<?PHP
session_start();
include('../PHP/DB.PHP');
$tipo=$_POST['tipo'];
if ($tipo=='1'){
 $consulta=$db->execute("SELECT * FROM usuario where ID_USUARIO= '".$_REQUEST['cedula']."' AND EMAIL ='".$_REQUEST['email']."'" ) or die ($db->ErrorMsg($db));
	 if(!$consulta->EOF){
     $DATO['repuesta']='No se Pudo almacenar el registro debido a que la cedula o correo ya existe en la base de datos';	 
	 }else{
	 $guardar_registro=$db->execute("INSERT INTO usuario(ENCARGADO, ID_USUARIO, CEDULA_RIF_USR, EMAIL, TELEFONO, EMPRESA, PASSWORD, DIRECCION, TIPO_USR) VALUE ('".$_REQUEST['responsable']."', '".$_REQUEST['cedula']."','".$_REQUEST['rif']."',
									'".$_REQUEST['email']."','".$_REQUEST['telefono']."','".$_REQUEST['nombre_empresa']."','".$_REQUEST['pass']."','".$_REQUEST['direccion']."','".$tipo."')") or die ($db->ErrorMsg($db));
	
	 $DATO['repuesta']='Registro Almacenado';	 
	 }
	
}else{
 $consulta=$db->execute("SELECT * FROM usuario where ID_USUARIO= '".$_REQUEST['cedula']."' AND EMAIL ='".$_REQUEST['email']."'" ) or die ($db->ErrorMsg($db));
	 if(!$consulta->EOF){
     $DATO['repuesta']='No se Pudo almacenar el registro debido a que la cedula o correo ya existe en la base de datos';	 
	 }else{
	 $guardar_registro=$db->execute("INSERT INTO usuario(ENCARGADO, APELLIDO_USR, ID_USUARIO, EMAIL, TELEFONO, PASSWORD, DIRECCION, TIPO_USR) VALUE ('".$_REQUEST['responsable']."','".$_REQUEST['apellido']."','".$_REQUEST['cedula']."',
									'".$_REQUEST['email']."','".$_REQUEST['telefono']."','".$_REQUEST['pass']."','".$_REQUEST['direccion']."','".$tipo."')") or die ($db->ErrorMsg($db));
	
	 $DATO['repuesta']='Registro Almacenado';	 
	 }
 echo json_encode($DATO);
}

?>