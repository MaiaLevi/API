<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');

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
