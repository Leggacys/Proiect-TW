<?php


$server = "localhost";
$dbuser = "root";
$dbpass = "";

$database = "api_db";


$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if(!$conn){
    die("<script>alert('Connection failed!')</script>");
}


$base_url = "http://localhost/TestingWeb/html+php/"; //website url 


?>