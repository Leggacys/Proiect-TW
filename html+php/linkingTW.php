<?php
    error_reporting(0);
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
        echo $id_utilizator;
        //echo $rol;
        echo $prenume . "\n";
        echo $an . $semian . $grupa;
        echo "\r\n";
        echo $rol;
        echo "\n\n\n";
      
        $conn = mysqli_connect("localhost","root","","api_db");
        if($conn-> connect_error){
            die("Connect failed");
        }
        
        $querySelect = "SELECT distinct u.nume as firstname, u.prenume as lastname, u.id_curs as curs, u.an as an, u.semian as semian, u.grupa as grupa  FROM studentiacceptare u WHERE id_stud='$id_utilizator' AND id_curs='3';";
        $result = $conn -> query($querySelect);
        $row = $result -> fetch_assoc();
        $nume=$row['firstname'];

        $querySelect2 = "SELECT distinct u.nume as firstname, u.prenume as lastname, u.id_curs as curs, u.an as an, u.semian as semian, u.grupa as grupa  FROM studenti u WHERE id_stud='$id_utilizator' AND id_curs='3';";
        $result2 = $conn -> query($querySelect2);
        $row2 = $result2 -> fetch_assoc();
        $nume2=$row2['firstname'];


        if($nume==NULL) {
            if($nume2!=NULL){
                //este deja inscris si acceptat
            header("Location: http://localhost/testingWeb/html+php/statisticaTW.php");
            exit();
            }
            else {
                //este neinscris si se inscrie
                header("Location: http://localhost/testingWeb/html+php/acceptareTW.php");  
                echo "da";
                exit();
            }
        }
            else {
                //este inscris si accepta confirmare de la prof
                header("Location: http://localhost/testingWeb/html+php/clase.php");
                exit();
            }

        

        }catch (Exception $e){
           echo json_encode(["message"=>$e->getMessage()]);
           exit();
       }


?>