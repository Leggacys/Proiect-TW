<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
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



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Class Manager - AdminExport.">
    <title>Export </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/catalogAdmin.css">
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
  <img src="../images/admin.svg" class="profile_image" alt="profile image">
  
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
        else if($rol == "teacher1" || $rol == "teacher2" ||  $rol =="teacher3"){
          header("Location: http://localhost/testingWeb/html+php/MenuAdmin.php");
        }
        //print_r($jwt_decodificat);
        //echo "\n\n\n\n";
        $id_utilizator = $jwt_decodificat->data->id;
        $nume = $jwt_decodificat->data->lastname;
        $prenume = $jwt_decodificat->data->firstname;
        $rol = $jwt_decodificat->data->rol;
        //echo $id_utilizator;
        echo $nume . " ";
        //echo $rol;
        echo $prenume . " \n" . "Administrator";
      
        }catch (Exception $e){
           echo json_encode(["message"=>$e->getMessage()]);
           exit();
       }


      ?>
    </h3>
    <a href="MenuAdmin.php"><i class="fab fa-500px"></i><span> Profilul meu</span></a>
    <a href="utilizatoriInregistrati.php"><i class="fab fa-500px"></i><span> Utilizatori inregistrati</span></a>
    <a href="catalogAdmin.php"><i class="fab fa-500px"></i><span> Catalog</span></a>
    <a href="evidentaTeme.php"><i class="fab fa-500px"></i><span> Evidenta teme</span></a>
    <a href="acceptProfi.php"><i class="fab fa-500px"></i><span> Lista asteptare profesori</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
</div>

<div class="content">
<div class="card card-1">
  <h3>
    Export Catalog
    </h3> 
    <div class="container">
      <div class="dropdown">
        <button id ="export" class="dropbtn">Format</button>
        <div class="dropdown-content">
        <a href="#" onclick="XML()">XML</a>
        </div>
      </div>
   </div>
   <nav>
   <ul id="medie">
     
   </ul>
 </nav>

 </div>
      </div>
 <script>
    function PDF(){
   document.getElementById("export").innerHTML = "PDF";
   window.location.replace("http://localhost/testingWeb/html+php/fromSQLtoCSV/toPDF.php");
  exit();
  }
function CSV(){
   document.getElementById("export").innerHTML = "CSV";
   window.location.replace("http://localhost/testingWeb/html+php/fromSQLtoCSV/toCSV.php");
  exit();
  }
function XML(){
   document.getElementById("export").innerHTML = "XML";
   window.location.replace("http://localhost/testingWeb/html+php/XML-stufff/dbxml.php");
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



</script>
  </body>


</html>
