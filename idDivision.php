<?php
$con=mysqli_connect("localhost","u939089919_daius","42038123","u939089919_bd");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
//$res=$stmt->get_result();
$nombre=$_GET["nombre"];
$query="SELECT iddivision FROM division WHERE division='$nombre'";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)) 
		{ 
			$Id=$row['iddivision'];
			$objeto = array('Id'=> $Id);
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode(array('result' => $objeto), JSON_UNESCAPED_UNICODE );
echo $json_string;
?>
		