<?php
$con=mysqli_connect("ca-cdbr-azure-central-a.cloudapp.net","b926aabc612c57","a843969f","u939089919_bd");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
//$res=$stmt->get_result();
$id=$_GET["IdUsuario"];
$query="SELECT libro.IdLibro, libro.Nombre, libro.Descripcion, libro.Anio, usuario.nombre AS Usuario, usuario.IdUsuario, materia.Nombre AS Materia, 
libro.IdMateria, libro.Vendido FROM libro INNER JOIN materia ON libro.IdMateria=materia.IdMateria INNER JOIN usuario ON libro.IdUsuario=usuario.IdUsuario WHERE libro.IdUsuario='$id'";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
$objetos = array();
	while($row = mysqli_fetch_array($result)) 
		{
			$IdLibro=$row['IdLibro'];
			$Nombre=$row['Nombre'];	
			$Descripcion=$row['Descripcion'];
			$Anio=$row['Anio'];
			$Imagen=$row['Imagen'];	
			$Usuario=$row['Usuario'];
			$IdUsuario=$row['IdUsuario'];
            $NombreMat=$row['Materia'];
			$IdMateria=$row['IdMateria'];
			$Vendido=$row['Vendido'];
			$objeto = array('IdLibro'=> $IdLibro, 'Nombre'=> $Nombre, 'Descripcion'=> $Descripcion,'Anio'=>$Anio, 'Imagen'=> $Imagen, 
			'Usuario'=>$Usuario, 'IdUsuario'=>$IdUsuario,'NombreMat'=> $NombreMat,'IdMateria'=> $IdMateria,'Vendido'=> $Vendido);	
            $objetos[] = $objeto;
			
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode(array('result' => $objetos), JSON_UNESCAPED_UNICODE );
echo $json_string;
?>				