<?php

$conn = mysqli_connect("localhost","root","","api_db");
if($conn-> connect_error){
  die("Connect failed");
}

$rollno=$_GET['rn'];
$course = $_GET['curs'];


$query = "DELETE FROM studentiacceptare WHERE id_stud ='$rollno' AND id_curs='$course'";

$data=mysqli_query($conn,$query);
if($data)
{
  echo "Sters";
}else {
  echo "Eroare";
}
header("Refresh:0; url=http://localhost/testingWeb/html+php/Menu-prof-AcceptStudents.php");
?>
