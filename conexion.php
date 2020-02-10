<?php
header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");
require_once 'config.php';
function Conectarse()
	{
		 $conn=mysqli_connect(SERVER,USER,PASS);
         mysqli_select_db($conn,DB); 
         $conn->query("SET CHARACTER SET UTF8");
         return $conn;
}
function CerrarConexion($conn){
 mysqli_close($conn);
}
?>




