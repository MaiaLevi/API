<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$horario=json_decode($string,true);
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
mysqli_close($con);
?>