<?php 
header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");
getAnswers();
function getAnswers()
{
    include("conexion.php");
    $cn = Conectarse();
    $query = getQueryAnswers();
    $queryOnlyAns=getQueryOnlyAns();
    $resultSet = mysqli_query($cn,$query);
    $resultSetAns = mysqli_query($cn,$queryOnlyAns);
      $data = array();  
   while ($row1 = mysqli_fetch_array($resultSetAns,MYSQLI_ASSOC)) {
        $data['onlyAnswers'][] = $row1;
    }
    $data['success'] = false;
    while ($row = mysqli_fetch_array($resultSet,MYSQLI_ASSOC)) {
        $data['success'] = true;
        $data['answers'][] = $row;
    }
    print (json_encode($data));
    CerrarConexion($cn);
}
function getQueryAnswers()
{
    $query = "SELECT  sq.q_id,sq.q_description,so.o_id,so.o_description
				from surveys_options so
				inner join surveys_questions sq 
				on so.q_id=sq.q_id;"  ;
    return $query;
}
function getQueryOnlyAns()
{
    $query = "SELECT q_id,q_description FROM surveys_questions"  ;
    return $query;
}



 ?>