<?php
$con=mysqli_connect("ca-cdbr-azure-central-a.cloudapp.net","b926aabc612c57","a843969f","u939089919_bd");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
//$res=$stmt->get_result();
$email=$_GET["Mail"];
$query="SELECT usuario.idusuario, usuario.nombre, usuario.contrasena, usuario.iddivision, division.division FROM usuario INNER JOIN division ON usuario.iddivision=division.iddivision WHERE mail='$email' limit 1";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)) 
		{ 
			$IdUsuario=$row['idusuario'];
			$Nombre=$row['nombre'];
			$Contrasena=$row['contrasena'];	
			$IdDivision =$row['iddivision'];
			$Division=$row['division'];	
			//$Contrasena=crypt('$Contrasena','$1$holacomo');
			$objeto = array('IdUsuario'=>$IdUsuario, 'Nombre'=>$Nombre, 'Contrasena'=>$Contrasena, 'IdDivision'=>$IdDivision, 'Division'=>$Division);	
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode($objeto, JSON_UNESCAPED_UNICODE );
echo $json_string;
?>