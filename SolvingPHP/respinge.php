<?php

$conn = mysqli_connect("localhost","root","","studenti");
if($conn-> connect_error){
  die("Connect failed");
}

$rollno=$_GET['rn'];
$acceptTo=$_GET['rm'];

$query = "DELETE FROM studenti WHERE NumarMatricol ='$rollno'";

$data=mysqli_query($conn,$query);
if($data)
{
  echo "Sters";
}else {
  echo "Eroare";
}

?>
