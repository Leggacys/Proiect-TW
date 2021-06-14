<?php

$conn = mysqli_connect("localhost","root","","api_db");
if($conn-> connect_error){
  die("Connect failed");
}

$rollno=$_GET['rn'];
$rolul=$_GET['roulul'];


$query = "DELETE FROM users WHERE id ='$rollno'";

$data=mysqli_query($conn,$query);
if($data)
{
  echo "Sters";
}else {
  echo "Eroare";
}
header("Refresh:0; url=http://localhost/testingWeb/html+php/utilizatoriInregistrati.php");
?>
