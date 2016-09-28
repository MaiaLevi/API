<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
   
$query = 'SELECT * FROM tipo';
$result = mysqli_query($con, $query);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
	$IdTipo=$row['IdTipo'];
	$Nombre=$row['Nombre'];
	$objeto = array('IdTipo'=> $IdTipo, 'Nombre'=> $Nombre);	
    	$objetos[] = $objeto;
	
}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode(array('result' => $objetos), JSON_UNESCAPED_UNICODE );
echo $json_string;
?>