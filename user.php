<?php

header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");
$json = file_get_contents('php://input');
$params = json_decode($json);
//if (isset($_GET['usuario'])&&isset($_GET['clave']))
//{
    getIniciarSesion($params->usuario,$params->clave);
//}
function getIniciarSesion($usuario,$clave)
{
    include("conexion.php");
    $cn = Conectarse();

    $query = getQueryIniciarSesion($usuario,$clave);
    $resultSet = mysqli_query($cn,$query);

    $data = array();
    $data['success'] = false;
    while ($row = mysqli_fetch_array($resultSet)) {
        $data['success'] = true;
        $data['data'] = $row;
    }
    print (json_encode($data));
    CerrarConexion($cn);
}
function getQueryIniciarSesion($usuario,$clave)
{
    $query = "SELECT *from user  where dni='$usuario' and password='$clave'"  ;
    return $query;
}
