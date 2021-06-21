<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cod prezenta </title>
    <script>

    function delete_cookie(name) {
      document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    function logoutFunction() {
      localStorage.removeItem("jwt");
      delete_cookie("jwt");
      delete_cookie("prof");
    }

    function startsWith($string, $startString) {
      $len = strlen($startString);
      return (substr($string, 0, $len) === $startString);
    }
  </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/Menu-prof-GenereazaCod.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div class="right_area">
      <a href="JWTf.php" onclick="logoutFunction()" class="logout_btn">Logout</a>
    </div>
  </header>


  <div class="sidebar">
      <img src="../images/male.png" class="profile_image" alt="dummy male photo">
      <h3>
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
  
        //echo $jwt;
  
  
        try{    
          $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
          $rol = $jwt_decodificat->data->rol;
          if($rol == "student"){
            header("Location: http://localhost/testingWeb/html+php/Menu.php");
          }
          else if($rol == "admin"){
            header("Location: http://localhost/testingWeb/html+php/MenuAdmin.php");
          }
          //print_r($jwt_decodificat);
          //echo "\n\n\n\n";
          $id_utilizator = $jwt_decodificat->data->id;
          $nume = $jwt_decodificat->data->lastname;
          $prenume = $jwt_decodificat->data->firstname;
          $rol = $jwt_decodificat->data->rol;
          //echo $id_utilizator;
          echo $rol . " ";
          echo $nume . " ";
          //echo $rol;
          echo $prenume;
        
          }catch (Exception $e){
             echo json_encode(["message"=>$e->getMessage()]);
             exit();
         }
  
  
        ?>
      </h3>
      <a href="Menu-prof.php"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
      <a href="PuneNote.php"><i class="fab fa-500px"></i><span>   Vizualizare Teme</span></a>
      <a href="Menu-prof-AcceptStudents.php"><i class="fab fa-500px"></i><span>   Primește studenți</span></a>
      <a href="Menu-prof-GenereazaCod.php"><i class="fab fa-500px"></i><span>   Generează cod</span></a>
      <a href="Menu-prof-Note.php"><i class="fab fa-500px"></i><span>   Notează studenții</span></a>
      <a href="Menu-prof-Export.php"><i class="fab fa-500px"></i><span>   Descarcă lista de persoane</span></a>
      <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">
<h1><span class="blue">&lt;</span>Genereaza<span class="blue">&gt;</span> <span class="yellow">Cod Prezenta</span></h1>
    <div class="header">
    </div>
    <div class="container">
      <select  id="saptamani">
        <option value="0" >Alege Saptamana</option>
       <option >1</option>
       <option >2</option>
       <option >3</option>
       <option >4</option>
       <option >5</option>
       <option >6</option>
       <option >7</option>
       <option >8</option>
       <option >9</option>
       <option >10</option>
       <option >11</option>
       <option >12</option>
       <option >13</option>
     </select>

      <div class="dropdown">
        <button id ="materii" class="dropbtn">Materii Disponibile</button>
        <div class="dropdown-content">
        <a  onclick="BazeDeDate()">Baze De Date</a>
        <a  onclick="ReteleDeCalculatoare()">Retele</a>
        <a  onclick="TehnologiiWeb()">Tehnologii Web</a>
        </div>
      </div>
      <p size="5px">
        Durata
      </p>
        <input type="text" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" size="5" maxlength="5" type="text" name="field[]" class="Durata"
         id="Durata" />
    <form class="form" id="form">
      <div class="form-control">
        <label id="COD">Codul pentru prezenta</label>
      </div>
      <a href="#"  onclick="myFunction()" >Generate code</a>
    </form>

  </div>

</div>

<script>

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

  /*  function deleteAllCookies() {
      var cookies = document.cookie.split(";");

      for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
      }
    }*/

    var jwt_stocat = window.localStorage.getItem("jwt");

    /* if (jwt_stocat == null) {
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
    } */

function BazeDeDate(){
   document.getElementById("materii").innerHTML = "Baze de Date";
}
function ReteleDeCalculatoare(){
   document.getElementById("materii").innerHTML = "Retele";
}
function TehnologiiWeb(){
   document.getElementById("materii").innerHTML = "Tehnologii Web";
}
function myFunction() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
    document.getElementById("COD").textContent = text;
    var idCurs;
    var durata=document.getElementById("Durata").value;
    var saptamana = document.getElementById("saptamani").value;
    switch (document.getElementById("materii").textContent) {
  case "Baze de Date":
    idCurs = 1;
    break;
  case "Retele":
      idCurs = 2;
    break;
  case "Tehnologii Web":
       idCurs = 3;
    break;
}

console.log(saptamana.value);

var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
      };
      xmlhttp.open("GET", "http://localhost/testingWeb/html+php/insertCode.php?id=" + idCurs + "&cod=" + text + "&durata=" + durata + "&saptamana=" + saptamana, true);
      xmlhttp.send();
  return 1;
}
</script>

  </body>
  </html>
