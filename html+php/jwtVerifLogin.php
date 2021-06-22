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
if(isset($_COOKIE['jwt'])){
$jwt = $_COOKIE['jwt'];
}
else{
  header("Location: http://localhost/testingWeb/html+php/index.php");
  exit();
}
setcookie('jwt', '', 1, '/');
//echo $jwt;
setcookie( "jwt", $jwt,time()+3600000,httponly:true);
//setcookie( "hey", "",time()-700, httponly:true );


try{    
  $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
  //print_r($jwt_decodificat);
  //echo "\n\n\n\n";
  $id_utilizator = $jwt_decodificat->data->id;
  $rol = $jwt_decodificat->data->rol;
  if($rol == "teacher4"){
    echo "<script>alert('Asteapta ca administratorul sa iti ofere drepturi de profesor.')</script>";
    header("Location: http://localhost/testingWeb/html+php/JWTf.php");
    exit();
  }
  if($rol == "teacher1" || $rol == "teacher2" || $rol == "teacher3" ){
    header("Location: http://localhost/testingWeb/html+php/Menu-prof.php");
    exit();
  }
  else if($rol == "student"){
    header("Location: http://localhost/testingWeb/html+php/Menu.php");
    exit();
  }
  else if($rol == "admin"){
    header("Location: http://localhost/testingWeb/html+php/MenuAdmin.php");
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