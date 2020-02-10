
<?php 

header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");

$json = file_get_contents('php://input');
$params = json_decode($json);
saveSurvey($params->dataopciones,$params->departament);
function saveSurvey($listaDetalle,$iddepartament)
{
    include("conexion.php");
    $cn = Conectarse();
    $data = array();
    foreach($listaDetalle as $detalle){
       $option = $detalle->option;
       $user = $detalle->user;
       $description = $detalle->description;
       $query = "INSERT INTO surveys_answers(o_id,d_id,dni,a_description) VALUES($option,$iddepartament,'$user','$description')";
       $res=mysqli_query($cn,$query);
	  }
  if ($res=== TRUE) {
        $data['success'] = true;
        $data['message'] = "Encuesta guardada correctamente";
	} else {
        $data['success'] = false;
        $data['message'] = "Error al guardar la encuesta";
	}
	   print (json_encode($data));
    CerrarConexion($cn);
}

 ?>