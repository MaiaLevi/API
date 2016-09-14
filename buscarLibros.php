<?php
$con=mysqli_connect("ca-cdbr-azure-central-a.cloudapp.net","b926aabc612c57","a843969f","proyecto");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
//$res=$stmt->get_result();
$Busqueda=$_GET["Busqueda"];
$id=$_GET["id"];
//hacer inner join con usuario asi se muestra quien lo subio
$query="SELECT libro.IdLibro, libro.Nombre, libro.Descripcion, libro.Anio, usuario.nombre AS Usuario, usuario.IdUsuario, materia.Nombre AS Materia, 
libro.IdMateria FROM libro INNER JOIN materia ON libro.IdMateria=materia.IdMateria INNER JOIN usuario ON libro.IdUsuario=usuario.IdUsuario 
WHERE libro.Nombre LIKE '%$Busqueda%' AND libro.Vendido=0 AND libro.IdUsuario NOT IN ('$id')";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$objetos = array();
	while($row = mysqli_fetch_array($result)) 
		{ 
			$IdLibro=$row['IdLibro'];
			$Nombre=$row['Nombre'];	
			$Descripcion=$row['Descripcion'];
			$Anio=$row['Anio'];
			//$Imagen=$row['Imagen'];	
			$Usuario=$row['Usuario'];
			$IdUsuario=$row['IdUsuario'];
			$IdMateria=$row['IdMateria'];
			$Materia=$row['Materia'];
			$objeto = array('IdLibro'=> $IdLibro, 'Nombre'=> $Nombre, 'Descripcion'=> $Descripcion,'Anio'=>$Anio, 'Usuario'=>$Usuario, 'IdUsuario'=>$IdUsuario,'Materia'=> $Materia,'IdMateria'=> $IdMateria);	
			$objetos[] = $objeto;
			
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode(array('result' => $objetos), JSON_UNESCAPED_UNICODE );
echo $json_string;
?>	