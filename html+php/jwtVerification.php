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


$database = new Database();
$db = $database->getConnection();
if (isset($_SERVER['HTTP_AUTHORIZATION']))
    {   $JWT_receptionat =  $_SERVER['HTTP_AUTHORIZATION'];
        echo $JWT_receptionat;
        echo "\n\n\n\n";
        
        /* $JWT_receptionat = str_replace('["', '', $JWT_receptionat);
        $JWT_receptionat = str_replace('"]', '', $JWT_receptionat); */
        $JWT_receptionat = json_encode([$JWT_receptionat]);
        //echo $JWT_receptionat."TEST1";
        
        echo $JWT_receptionat;
        echo "\n\n\n\n";
        //console.log($JWT_receptionat); 
        if (preg_match('/\s(\S+)/', $JWT_receptionat, $matches)) {
            $JWT_receptionat = $matches[1];
            echo $JWT_receptionat;
            //echo $JWT_receptionat;  
        }   
    }
    else 
    {
        echo "Eroare: Nu exista token de autorizare in header.";
        // poate ar fi bun un http error code ?
        exit();
    }
    
    //echo $JWT_receptionat;
    echo "\n\n\n\n";
    //echo $jwt_decodificat;
    if (!empty($JWT_receptionat)){
     try{    
     $jwt_decodificat = JWT::decode($JWT_receptionat, JWT_KEY, array('HS256'));
     print_r($jwt_decodificat);
     /* echo "\n\n\n\n";
     $id_utilizator = $jwt_decodificat->data->id;
     $rol = $jwt_decodificat->data->rol;
     echo($id_utilizator);
     echo "\n\n\n\n";
     echo($rol); */


     }catch (Exception $e){
        echo json_encode(["message"=>$e->getMessage()]);
        exit();
    }

    }

    //echo json_encode([$JWT_receptionat]); 




























    /* $id_utilizator = 0;
    $nume_utilizator = 0;
    $prenume_utilizator = 0;
    $email_utilizator = 0;

    if (!empty($JWT_receptionat)){
        try{
            $jwt_decodificat = JWT::decode($JWT_receptionat, JWT_KEY, array('HS256'));
            $id_utilizator = $jwt_decodificat->data->id;
            $nume_utilizator = $jwt_decodificat->data->firstname;
            $prenume_utilizator = $jwt_decodificat->data->lastname;
            $email_utilizator = $jwt_decodificat->data->email; 
            
            print_r($jwt_decodificat);

        }
        catch (Exception $e){
            http_response_code(401);
            echo json_encode(["message"=>$e->getMessage()]);
            exit();
        }
    } else {
        echo json_encode(["message"=>"Authentication failed."]);
        exit();   
    } */
    
?>