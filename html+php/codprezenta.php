<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <script>

function delete_cookie(name) {
  document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function logoutFunction() {
  localStorage.removeItem("jwt");
  delete_cookie("jwt");
}

function startsWith($string, $startString) {
  $len = strlen($startString);
  return (substr($string, 0, $len) === $startString);
}
</script>
    <title>Cod prezenta </title>
    <link rel="stylesheet" href="../css/codprezenta.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div class="right_area">
      <a href="index.html" onclick="logoutFunction()" class="logout_btn">Logout</a>
    </div>
  </header>


  <div class="sidebar">
    <img src="../images/CLaMa.svg" class="profile_image" alt="profile image">
    <h3>Cezar Lupu</h3>
    <a href="Menu.html"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
    <a href="clase.html"><i class="fab fa-500px"></i><span>   Clase și cursuri</span></a>
    <a href="upload.php"><i class="fab fa-500px"></i><span>   Încărcare temă</span></a>
    <a href="codprezenta.php"><i class="fab fa-500px"></i><span>   Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">


  <div class="file__upload">
		<div class="header-box">
			<p><i class="fa  fa-calendar fa-2x"></i><span><span>Introducere cod prezenta</span></span></p>			
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
    var ajax = new XMLHttpRequest();
    var url = "jwtVerification.php";
    var async = true;
    var method = "POST";

    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        //var myArr = JSON.parse(this.responseText);
        //alert(this.responseText);
        console.log(this.responseText);
      }
      if (this.readyState == 4 && this.status == 401) {
        //alert(this.responseText);
        //document.getElementById("mesajEroare").innerHTML="Utilizator inexistent sau parola gresita";
      }
    };

    ajax.open(method, url, async);
    var jwt_stocat = window.localStorage.getItem("jwt");
    //alert(jwt_stocat.length);

    function delete_cookie(name) {
      document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }

    function deleteAllCookies() {
      var cookies = document.cookie.split(";");

      for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
      }
    }

    //alert(jwt_stocat);
    if (jwt_stocat == null) {
      alert("JWT-ul nu se mai regaseste. Vei fi delogat din aplicatie!");
      delete_cookie("jwt");
      window.location.replace("http://localhost/testingWeb/html+php/index.html");
    }
    else if (jwt_stocat == "  " || jwt_stocat == "   " || jwt_stocat.length == 847) {
      //678 reprezinta cazul de eroare, in momentul in care numele utilizatorului nu e in baza de date
      //session_destroy();
      alert("Username sau parola gresita!");
      delete_cookie("jwt");
      deleteAllCookies();
      window.localStorage.removeItem("jwt");
      window.location.replace("http://localhost/testingWeb/html+php/index.html");
    }
    else if (jwt_stocat.length > 2900) {
      setTimeout(() => { window.location.replace("http://localhost/testingWeb/html+php/Menu-prof.html"); }, 0.001);
    }
    else {
      //alert(jwt_stocat);
      ajax.setRequestHeader("Authorization", "Bearer " + jwt_stocat);
      ajax.send();
    }
  </script>

  

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
  <script>
  if (getCookie("jwt") == "prof") deleteAllCookies();
</script>
  </html>
