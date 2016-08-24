<?php
$con=mysqli_connect('localhost','u939089919_daius','42038123','u939089919_bd');
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["Id"];
$stmt = $con->prepare("DELETE FROM libro WHERE IdLibro='$id'");
$stmt->execute(); 
$stmt->close();
?>