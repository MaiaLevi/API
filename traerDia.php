<?php
$con=mysqli_connect("ca-cdbr-azure-central-a.cloudapp.net","b926aabc612c57","a843969f","acsm_55ece9aded5c035");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
//$res=$stmt->get_result();
$id=$_GET["IdDivision"];
$dia=$_GET["Dia"];
$query="SELECT horario.bloque, materia.Nombre AS Materia, horario.idmateria AS IdMateria FROM horario INNER JOIN materia ON horario.idmateria=materia.IdMateria WHERE horario.iddivision='$id' AND horario.idsemana='$dia' ORDER BY horario.bloque ASC";
//$stmt->bind_result($col1, $col2);
$result = mysqli_query($con, $query);
$objetos = array();
	while($row = mysqli_fetch_array($result)) 
		{ 
			$Bloque=$row['bloque'];
			$Materia=$row['Materia'];
			$IdMateria=$row['IdMateria'];
			$objeto = array('Bloque'=>$Bloque,'Materia'=> $Materia, 'IdMateria'=>$IdMateria);	
			$objetos[] = $objeto;
		}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json;charset=utf-8");
$json_string = json_encode(array('result' => $objetos), JSON_UNESCAPED_UNICODE );
echo $json_string;
?>
		