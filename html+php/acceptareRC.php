<?php
    include_once '../api/config/database.php';
    include_once '../api/objects/user.php';
    include_once '../api/libs/jwt_params.php';
    include_once '../api/objects/user.php';
    include_once '../api/libs/php-jwt-master/src/BeforeValidException.php';
    include_once '../api/libs/php-jwt-master/src/ExpiredException.php';
    include_once '../api/libs/php-jwt-master/src/SignatureInvalidException.php';
    include_once '../api/libs/php-jwt-master/src/JWT.php';
    use \Firebase\JWT\JWT;
    if(!isset($_COOKIE["jwt"])){
    header("Location: http://localhost/testingWeb/html+php/index.php");
    echo "Comportament nepermis! Logati-va ca student ca sa puteti incarca documente.";
    return false;
    } 
    else {$jwt = $_COOKIE['jwt'];}

    echo $jwt;

    try{    
        $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
        $rol = $jwt_decodificat->data->rol;
        if($rol != "student"){
          header("Location: http://localhost/testingWeb/html+php/Menu-prof.php");
        }
        //print_r($jwt_decodificat);
        //echo "\n\n\n\n";
        $id_utilizator = $jwt_decodificat->data->id;
        $nume = $jwt_decodificat->data->lastname;
        $prenume = $jwt_decodificat->data->firstname;
        $rol = $jwt_decodificat->data->rol;
        $an = $jwt_decodificat->data->year;
        $semian = $jwt_decodificat->data->semian;
        $grupa = $jwt_decodificat->data->grup;
        //echo $id_utilizator;
        echo $nume . " ";
        //echo $rol;
        echo $prenume . "\n";
        echo $an . $semian . $grupa;
        echo "\r\n";
        echo $rol;
      
        $conn = mysqli_connect("localhost","root","","api_db");
        if($conn-> connect_error){
            die("Connect failed");
        }
        
        $queryInsert = "INSERT INTO studentiacceptare (id_stud, nume, prenume, id_curs, an, semian, grupa) VALUES ('$id_utilizator', '$nume', '$prenume','2','$an', '$semian', '$grupa')";

        $data=mysqli_query($conn,$queryInsert);

        }catch (Exception $e){
           echo json_encode(["message"=>$e->getMessage()]);
           exit();
       }

       header("Location: http://localhost/testingWeb/html+php/Menu.php");


?>