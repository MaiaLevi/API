<?php
$con=mysqli_connect("ca-cdbr-azure-central-a.cloudapp.net","b926aabc612c57","a843969f","acsm_55ece9aded5c035");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
//$res=$stmt->get_result();
$id=$_GET["id"];
$query="SELECT evento.Id, evento.Fecha, evento.Descripcion,evento.IdMateria, materia.Nombre AS Materia, evento.IdTipo, tipo.Nombre AS Tipo, evento.IdUsuario FROM evento INNER JOIN materia ON evento.IdMateria=materia.IdMateria INNER JOIN tipo ON evento.IdTipo=tipo.IdTipo INNER JOIN division ON evento.iddivision=division.iddivision WHERE evento.iddivision='$id' ORDER BY evento.Fecha ASC";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
$objetos = array();
	while($row = mysqli_fetch_array($result)) 
		{ 
			$Id=$row['Id'];
			$Fecha=$row['Fecha'];	
			$Descripcion=$row['Descripcion'];
			$IdMateria=$row['IdMateria'];
			$Materia=$row['Materia'];	
			$IdTipo=$row['IdTipo'];
			$Tipo=$row['Tipo'];
			$IdUsuario=$row['IdUsuario'];
			$objeto = array('Id'=> $Id, 'Fecha'=> $Fecha, 'Descripcion'=> $Descripcion,'IdMateria'=>$IdMateria, 'Materia'=> $Materia, 'IdTipo'=>$IdTipo,'Tipo'=> $Tipo,'IdUsuario'=> $IdUsuario);	
				$objetos[] = $objeto;
			
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode(array('result' => $objetos), JSON_UNESCAPED_UNICODE );
echo $json_string;
?>
	