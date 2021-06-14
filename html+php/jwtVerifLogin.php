<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");

// files needed to connect to database
include_once '../api/config/database.php';
include_once '../api/objects/user.php';
include_once '../api/libs/jwt_params.php';
include_once '../api/objects/user.php';
include_once '../api/libs/php-jwt-master/src/BeforeValidException.php';
include_once '../api/libs/php-jwt-master/src/ExpiredException.php';
include_once '../api/libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../api/libs/php-jwt-master/src/JWT.php';

use \Firebase\JWT\JWT;
$jwt = $_COOKIE['jwt'];
//echo $jwt;

try{    
  $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
  //print_r($jwt_decodificat);
  //echo "\n\n\n\n";
  $id_utilizator = $jwt_decodificat->data->id;
  $rol = $jwt_decodificat->data->rol;
  if($rol == "teacher"){
    header("Location: http://localhost/testingWeb/html+php/Menu-prof.html");
    exit();
  }
  else if($rol == "student"){
    header("Location: http://localhost/testingWeb/html+php/Menu.html");
    exit();
  }

  //echo $id_utilizator;
  //echo "\n\n\n\n";
  //echo $rol;
  //echo "\n\n\n\n";

}catch (Exception $e){
  //echo json_encode(["message"=>$e->getMessage()]);
  exit();
}


?>