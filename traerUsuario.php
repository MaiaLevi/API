<?php
$con=mysqli_connect("ca-cdbr-azure-central-a.cloudapp.net","b926aabc612c57","a843969f","acsm_55ece9aded5c035");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["idusuario"];
$query="SELECT usuario.idusuario, usuario.nombre, usuario.apellido, usuario.mail, usuario.contrasena, usuario.fechanacimiento, usuario.celular, usuario.iddivision FROM usuario INNER JOIN division ON usuario.iddivision=division.Id WHERE idusuario='$id'";
$result = mysqli_query($con, $query);
$objetos = array();
	while($row = mysqli_fetch_array($result)) 
		
		
		{ 
			$idusuario=$row['idusuario'];
			$nombre=$row['nombre'];	
			$apellido=$row['apellido'];
			$mail=$row['mail'];			
			$contrasena=$row['contrasena'];
			$fechanacimiento=$row['fechanacimiento'];
			$celular=$row['celular'];
			$iddivision=$row['iddivision'];
			$objeto = array('idusuario'=> $idusuario, 'nombre'=> $nombre, 'apellido'=> $apellido, 'mail'=>$mail, 'contrasena'=> $contrasena, 'fechanacimiento'=>$fechanacimiento,'celular'=> $celular,'iddivision'=> $iddivision);	
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode($objeto, JSON_UNESCAPED_UNICODE );
echo $json_string;
?>