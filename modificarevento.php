<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','u939089919_daius','42038123','u939089919_bd');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
$stmt = $con->prepare("UPDATE evento  SET IdTipo=?, IdMateria=?, Fecha=?, Descripcion=?, IdUsuario=?
WHERE Id=?");
$stmt->bind_param('iissii',
		$evento["IdTipo"],
		$evento["IdMateria"],
		$evento["Fecha"],
		$evento["Descripcion"],
		$evento["IdUsuario"],
		$evento["Id"]
		);
$stmt->execute(); 
$stmt->close();

?>
