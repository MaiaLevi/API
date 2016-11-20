<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$horario=json_decode($string,true);
$boolean=true;
$query="SELECT iddivision, bloque, idsemana FROM horario WHERE iddivision=? AND bloque=? AND idsemana=?";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'iii',
		$horario["iddivision"],
		$horario["bloque"],
		$horario["idsemana"]
		);
		$stmt->execute();
//primero hacer select, si devuelve vacio se agrega sino no
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{
	$objeto = array('Respuesta'=> "false");	
	$objetos[] = $objeto;
	$boolean=false;
			
}
$json_string = json_encode(array('result' => $objetos), JSON_UNESCAPED_UNICODE );
echo $json_string;
if ($boolean)
{
$query = "INSERT INTO horario (iddivision, bloque, idsemana, idmateria) VALUES (?, ?, ?, ?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'iiii',
		$horario["iddivision"],
		$horario["bloque"],
		$horario["idsemana"],
		$horario["idmateria"]
		);
		$stmt->execute();
}

mysqli_close($con);
?>
