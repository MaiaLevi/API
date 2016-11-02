<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$usuario=json_decode($string,true);
$stmt = $con->prepare("UPDATE usuario SET nombre=?, apellido=?, mail=?, contrasena=?, fechanacimiento=?, celular=?
WHERE idusuario=?");
$stmt->bind_param('sssssii',
		$usuario["nombre"],
		$usuario["apellido"],
		$usuario["mail"],
		$usuario["contrasena"],
		$usuario["fechanacimiento"],
		$usuario["celular"],
		$usuario["idusuario"]
		);
$stmt->execute(); 
$stmt->close();
?>