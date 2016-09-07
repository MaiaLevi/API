<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','u939089919_daius','42038123','u939089919_bd');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
$query = "INSERT INTO evento (IdTipo, IdMateria, Fecha, Descripcion, IdUsuario, iddivision) VALUES (?, ?, ?, ?, ?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'iissii',
		$evento["IdTipo"],
		$evento["IdMateria"],
		$evento["Fecha"],
		$evento["Descripcion"],
		$evento["IdUsuario"],
		$evento["iddivision"]
		);
		$stmt->execute();
		echo 
		$evento["IdTipo"].
		$evento["IdMateria"].
		$evento["Fecha"].
		$evento["Descripcion"].
		$evento["IdUsuario"].
		$evento["iddivision"];
		//$stmt->bind_result($con, $query);

mysqli_close($con);
?>
