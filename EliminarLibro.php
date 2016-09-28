<?php
$con=mysqli_connect('ca-cdbr-azure-central-a.cloudapp.net','b926aabc612c57','a843969f','acsm_55ece9aded5c035');
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["Id"];
$stmt = $con->prepare("DELETE FROM libro WHERE IdLibro='$id'");
$stmt->execute(); 
$stmt->close();
?>