<?php

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




