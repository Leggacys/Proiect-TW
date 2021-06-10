<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "proiecttw";
//$dbname = "api_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Verific conexiunea la db
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}