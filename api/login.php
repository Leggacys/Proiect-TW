<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");

// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'libs/jwt_params.php';
include_once 'objects/user.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents('php://input'));
//print_r($data);
$user->firstname = $data->firstname;
$user->parola = $data->password;

$interogare = "SELECT id, firstname, lastname, email, parola, rol, username, year, semian, grup FROM users WHERE username=:username";
    $stmt = $db->prepare($interogare);
    $stmt->execute(["username" => $data->firstname]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

if(
    !empty($user->firstname) &&
    !empty($user->parola) && 
    ($row != "   ")
){

   /*  $interogare = "SELECT id, firstname, lastname, email, parola FROM users WHERE firstname=:username";
    $stmt = $db->prepare($interogare);
    $stmt->execute(["username" => $data->firstname]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC); */
    //echo $row;
    $myUser = array(
        "id"=>$row['id'],
        "firstname"=>$row['firstname'],
        "lastname"=>$row['lastname'],
        "email"=>$row['email'],
        "parola"=>$row['parola'],
        "rol"=>$row['rol'],
        "year"=>$row['year'],
        "semian"=>$row['semian'],
        "grup"=>$row['grup'],
        "username"=>$row['username']
    );

    if (password_verify($data->password, $myUser["parola"])){
        $token = array(
            "iss"=>JWT_ISS ,
            "aud"=>JWT_AUD ,
            "iat"=>JWT_IAT ,
            "exp"=>JWT_EXP ,
            "data"=>array(
                "id"=>$myUser["id"],
                "email"=>$myUser["email"],
                "firstname"=>$myUser["firstname"],
                "lastname"=>$row['lastname'],
                "rol"=>$myUser["rol"],
                "year"=>$row['year'],
                "semian"=>$row['semian'],
                "grup"=>$row['grup'],
                "username"=>$row['username']  
            )
            );
            $jwt = JWT::encode($token, JWT_KEY);
            echo $jwt;
    }
    //W$cerere = oci_parse($db, $interogare);

    http_response_code(200);
} else
    {   http_response_code(400);
        echo json_encode(
            ["message"=>"Eroare."]
        );
    }
// set product property values
/* $data->username = $data->username;
$email_exists = $user->emailExists(); */

// check if email exists and if password is correct
?>