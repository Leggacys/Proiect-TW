<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cod prezenta </title>
    <link rel="stylesheet" href="../css/codprezenta.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div class="right_area">
      <a href="index.html" class="logout_btn">Logout</a>
    </div>
  </header>


  <div class="sidebar">
    <img src="../images/Cezar_pROFILE.png" class="profile_image" alt="profile image">
    <h4>Cezar Lupu</h4>
    <a href="Menu.html"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
    <a href="clase.html"><i class="fab fa-500px"></i><span>   Clase și cursuri</span></a>
    <a href="upload.php"><i class="fab fa-500px"></i><span>   Încărcare temă</span></a>
    <a href="codprezenta.php"><i class="fab fa-500px"></i><span>   Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">


  <div class="container">
    <div class="header">
      <h2>Introduceti codul de prezenta.</h2>
    </div>
    <form class="form" id="form">
      <div class="form-control">
        <label>Codul pentru prezenta</label>
        <input type="text" placeholder="Cod" id="cod">
      </div>
      <button id="submit" onclick="myFunction()">Submit</button>
    </form>
  </div>

<script>
function myFunction(){
   var input =document.getElementById("cod").value;
   createCookie("codPrezenta",input,1);
}

function createCookie(cookiName, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = escape(cookiName) + "=" +
        escape(value) + expires + "; path=/";
      console.log(cookiName);
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
}
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    } 
</script>
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
  //window.location.replace("http://localhost/testingWeb/html+php/index.html");
  echo "Comportament nepermis! Logati-va ca student ca sa puteti incarca documente.";
  return false;
} else {$jwt = $_COOKIE['jwt'];}

try{    
  $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
  //print_r($jwt_decodificat);
  //echo "\n\n\n\n";
  $id_utilizator = $jwt_decodificat->data->id;
  $nume = $jwt_decodificat->data->firstname;
  //echo $id_utilizator;
  echo "\n\n\n\n";
  //echo $rol;
  echo "\n\n\n\n";

  }catch (Exception $e){
     echo json_encode(["message"=>$e->getMessage()]);
     exit();
 }


$conn = mysqli_connect("localhost","root","","api_db");
if($conn-> connect_error){
  die("Connect failed");
}

  $cod=$_COOKIE['codPrezenta'];




$queryCheckCode = "SELECT distinct * FROM cursuri c WHERE c.cod_prezenta = '$cod' ";


$data=mysqli_query($conn,$queryCheckCode);

if($data)
{
  $query = "INSERT INTO statistica (id, nume, statusP)
  VALUES ('$id_utilizator', '$nume', 'PREZENT' )";
  $data2=mysqli_query($conn,$query);
  if($data2){
    echo "S";
    setcookie("codCurs", "", time() - 3600);
  }
  else{
    echo "Eroare";
  }

}else {
  echo "Eroare";
}
setcookie("codCurs", "", time() - 3600);
  $conn-> close();

 ?>

</div>
  </body>
  </html>
