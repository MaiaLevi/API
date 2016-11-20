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
$idDivi=$_GET["iddivision"];
$bloque=$_GET["bloque"];
$semana=$_GET["idsemana"];
$query="SELECT iddivision, bloque, idsemana FROM horario WHERE iddivision='$idDivi' AND bloque='$bloque' AND idsemana='$semana'";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)) 
		{
			header('HTTP/1.1 401 Unauthorized', true, 401);
			$boolean=false;
		}
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
