<?php
$con=mysqli_connect("localhost","u939089919_daius","42038123","u939089919_bd");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["Id"];
$query="SELECT libro.IdLibro, libro.Nombre, libro.Descripcion, libro.Anio, materia.Nombre AS Materia, libro.IdMateria, libro.Vendido FROM libro INNER JOIN materia ON libro.IdMateria=materia.IdMateria WHERE IdLibro='$id'";
$result = mysqli_query($con, $query);
$objetos = array();
	while($row = mysqli_fetch_array($result)) 
		
		
		{ 
			$Id=$row['IdLibro'];
			$Nombre=$row['Nombre'];	
			$Descripcion=$row['Descripcion'];
			$Anio=$row['Anio'];			
			$Materia=$row['Materia'];
			$IdMateria=$row['IdMateria'];
			$Vendido=$row['Vendido'];
			$objeto = array('Id'=> $Id, 'Nombre'=> $Nombre, 'Descripcion'=> $Descripcion, 'Anio'=>$Anio, 'Materia'=> $Materia, 'IdMateria'=>$IdMateria,'Vendido'=> $Vendido);	
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode($objeto, JSON_UNESCAPED_UNICODE );
echo $json_string;
?>
