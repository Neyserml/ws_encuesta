<?php 

header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");
getDepartaments();
function getDepartaments()
{
   include("conexion.php");
    $cn = Conectarse();
    $query = getQueryRegion();
    $queryDepartaments=getQueryDepart();
    $resultSet = mysqli_query($cn,$query);
    $resultSetAns = mysqli_query($cn,$queryDepartaments);
      $data = array();  
   while ($row1 = mysqli_fetch_array($resultSetAns,MYSQLI_ASSOC)) {
        $data['departaments'][] = $row1;
    }
    $data['success'] = false;
    while ($row = mysqli_fetch_array($resultSet,MYSQLI_ASSOC)) {
        $data['success'] = true;
        $data['region'][] = $row;
    }
    print (json_encode($data));
    CerrarConexion($cn);
}
function getQueryRegion()
{
    $query = "SELECT *from region"  ;
    return $query;
}
function getQueryDepart()
{
    $query = "SELECT *from departament"  ;
    return $query;
}

 ?>