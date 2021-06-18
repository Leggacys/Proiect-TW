<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
      function hidediv(){
        document.getElementById("welcomeContainer").style.visibility="hidden";
      }
      setTimeout("hidediv()",1500);
    </script>
    <script>

      function delete_cookie(name) {
            document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
          }
      
            function logoutFunction() {
              localStorage.removeItem("jwt");
              delete_cookie("prof");
            }
        
            function startsWith ($string, $startString)
        {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
        }
        
          </script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/Menu-prof-Export.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div id="welcomeContainer"> Salut. Ai fost autentificat cu succes in aplicatie!</div>
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
        if($rol != "teacher"){
          header("Location: http://localhost/testingWeb/html+php/Menu.php");
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
<div class="card card-1">
  <h3>
    Previzualizare  Export Catalog
    <div class="container">
      <div class="dropdown">
        <button id ="export" class="dropbtn">Format</button>
        <div class="dropdown-content">
        <a href="#" onclick="PDF()">PDF</a>
        <a href="#" onclick="CSV()">CSV</a>
        <a href="#" onclick="XML()">XML</a>
        </div>
      </div>
  </h3>
   </div>
   <nav>
   <ul id="medie">
     
   </ul>
 </nav>

 </div>

  </body>

  <script>
    function PDF(){
   document.getElementById("export").innerHTML = "PDF";
   window.location.replace("http://localhost/testingWeb/fromSQLtoCSV/toPDF.php");
}
function CSV(){
   document.getElementById("export").innerHTML = "CSV";
   window.location.replace("http://localhost/testingWeb/fromSQLtoCSV/toCSV.php");
}
function XML(){
   document.getElementById("export").innerHTML = "XML";
   window.location.replace("http://localhost/testingWeb/XML-stufff/dbxml.php");
}
  </script>


<script>
  var jwt_stocat = window.localStorage.getItem("jwt");
  //alert(jwt_stocat);

  function delete_cookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

  function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
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

if (jwt_stocat == null) {
    alert("JWT-ul nu se mai regaseste. Vei fi delogat din aplicatie!")
    window.location.replace("http://localhost/testingWeb/html+php/index.html");
    delete_cookie("prof");
  }
  else if (jwt_stocat == "  " || jwt_stocat == "   " || jwt_stocat.length==847) {
    //678 reprezinta cazul de eroare, in momentul in care numele utilizatorului nu e in baza de date
    alert("Username sau parola gresita!")
    delete_cookie("jwt");
    deleteAllCookies();
    window.localStorage.removeItem("jwt");
    window.location.replace("http://localhost/testingWeb/html+php/index.html");
  }
  else{
  //alert(jwt_stocat);
  /* ajax.setRequestHeader("Authorization","Bearer "+ jwt_stocat);
  ajax.send(); */
  }

</script>
</html>