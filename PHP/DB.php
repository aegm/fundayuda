<?PHP
include('CONEXION.PHP');
include('../UTILIDADES/adodb/adodb5/adodb.inc.php');

$db=NewAdoConnection('Mysql');
$db->Connect(sql_host,sql_user,sql_passwd,sql_db)or die('error no puede conectarse');
?>