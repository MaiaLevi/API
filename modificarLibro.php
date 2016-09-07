<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','42038123','u939089919_bd');

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$libro=json_decode($string,true);
$stmt = $con->prepare("UPDATE libro SET Nombre=?, Descripcion=?, Anio=?,  IdMateria=?, Vendido=?
WHERE IdLibro=?");
$stmt->bind_param('ssiiii',
		$libro["Nombre"],
		$libro["Descripcion"],
		$libro["Anio"],
		$libro["IdMateria"],
		$libro["Vendido"],
		$libro["IdLibro"]
		);
$stmt->execute(); 
$stmt->close();
?>
