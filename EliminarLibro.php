<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','proyecto');
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["Id"];
$stmt = $con->prepare("DELETE FROM libro WHERE IdLibro='$id'");
$stmt->execute(); 
$stmt->close();
?>