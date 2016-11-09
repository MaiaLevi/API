<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$libro=json_decode($string,true);
$query = "INSERT INTO usuario (nombre, apellido, mail, fechanacimiento, celular, iddivision) VALUES (?, ?, ?, ?, ?, ?)";
$stmt=$con->prepare($query);
echo $query;
$stmt->bind_param(
		'ssssii',
		$usuario["nombre"],
		$usuario["apellido"],
		$usuario["mail"],
		$usuario["fechanacimiento"],
		$usuario["celular"],
		$usuario["iddivision"]
		);
		$stmt->execute();
		echo 
		$usuario["nombre"].
		$usuario["apellido"].
		$usuario["mail"].
		$usuario["fechanacimiento"].
		$usuario["celular"].
		$usuario["iddivision"];
		//$stmt->bind_result($con, $query);

mysqli_close($con);
?>
