
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
      function hidediv(){
        document.getElementById("welcomeContainer").style.visibility="hidden";
      }
      setTimeout("hidediv()",5000);
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
    <title>Evidenta persoane </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/utilizatoriInregistrati.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div id="welcomeContainer"> Autentificare reușită</div>
    <div class="right_area">
      <a href="JWTf.php" onclick="logoutFunction()" class="logout_btn">Logout</a>
    </div>
  </header>


  <div class="sidebar">
      <img src="../images/admin.svg" class="profile_image" alt="dummy male photo">
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
        //print_r($jwt_decodificat);
        //echo "\n\n\n\n";
        $id_utilizator = $jwt_decodificat->data->id;
        $nume = $jwt_decodificat->data->lastname;
        $prenume = $jwt_decodificat->data->firstname;
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
    <a href="upload.php"><i class="fab fa-500px"></i><span> Catalog</span></a>
    <a href="codprezenta.php"><i class="fab fa-500px"></i><span> Evidenta teme</span></a>
    <a href="codprezenta.php"><i class="fab fa-500px"></i><span> Lista asteptare profesori</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">
  <h1><span class="blue">&lt;</span>Accepta<span class="blue">&gt;</span> <span class="yellow">Profesori</span></h1>
 <table class="container">
 		<tr>
 			<th>Nume</th>
      <th>Prenume</th>
 			<th>Email</th>
      <th>Rol</th>
      <th>StergeProfesor</th>
      <th>Accepta</th>
 		</tr>
  <?php
  $conn = mysqli_connect("localhost","root","","api_db");
  if($conn-> connect_error){
    die("Connect failed");
  }

  $sql = "SELECT distinct u.id as id, u.email as email, u.firstname as firstname, u.lastname as lastname, u.rol as rolul FROM users u WHERE rol ='teacher2' ORDER BY rolul DESC;";
  $result = $conn -> query($sql);
  if($result  -> num_rows >0)
  {
    while($row = $result -> fetch_assoc()){
      echo "<tr><td>" . $row["lastname"] ."</td><td>" . $row["firstname"] . "</td><td>" . $row["email"] .
      "</td><td>" . $row["rolul"]  . "<td> <a href = 'stergeProfesor.php?rn=$row[id]'> Sterge Profesor</td>" .
      "<td> <a href = 'upgradeProf.php?rn=$row[id]'> Accepta Profesor</td>" . "</tr>";
    }
    echo "</table>";
  }else {
    {
      echo "0 results";
    }
  }
  $conn-> close();
   ?>
 </div>
  </body>

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
