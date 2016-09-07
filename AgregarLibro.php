<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','42038123','u939089919_bd');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$libro=json_decode($string,true);
$query = "INSERT INTO libro (Nombre, Descripcion, IdUsuario, Anio, IdMateria, Vendido) VALUES (?, ?, ?, ?, ?, ?)";
$stmt=$con->prepare($query);
echo $query;
$stmt->bind_param(
		'ssiiii',
		$libro["Nombre"],
		$libro["Descripcion"],
		$libro["IdUsuario"],
		$libro["Anio"],
		$libro["IdMateria"],
		$libro["Vendido"]
		);
		$stmt->execute();
		echo 
		$libro["Nombre"].
		$libro["Descripcion"].
		$libro["IdUsuario"].
		$libro["Anio"].
		$libro["IdMateria"].
		$libro["Vendido"];
		//$stmt->bind_result($con, $query);

mysqli_close($con);
?>