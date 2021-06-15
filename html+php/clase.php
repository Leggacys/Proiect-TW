<?php
if(!isset($_COOKIE["jwt"])){
  header("Location: http://localhost/TestingWeb/html+php/index.php");
  return false;
  } 

?>

<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clase si cursuri</title>
        <script>

            function delete_cookie(name) {
              document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }
        
            function logoutFunction() {
              localStorage.removeItem("jwt");
              delete_cookie("jwt");
            }
        
            function startsWith ($string, $startString)
        {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
        }
        </script>

        <link rel="stylesheet" type="text/css" href="../css/clase.css">
        <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  </head>
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
    <img src="../images/CLaMa.svg" class="profile_image" alt="profile image">
    <h3>
      <?php
      
      include_once './api/config/database.php';
      include_once './api/objects/user.php';
      include_once './api/libs/jwt_params.php';
      include_once './api/objects/user.php';
      include_once './api/libs/php-jwt-master/src/BeforeValidException.php';
      include_once './api/libs/php-jwt-master/src/ExpiredException.php';
      include_once './api/libs/php-jwt-master/src/SignatureInvalidException.php';
      include_once './api/libs/php-jwt-master/src/JWT.php';
      use Firebase\JWT\JWT;

      if(!isset($_COOKIE["jwt"])){
      header("Location: http://localhost/TestingWeb/html+php/index.php");
      echo "Comportament nepermis! Logati-va ca student ca sa puteti incarca documente.";
      return false;
      } 
      else {$jwt = $_COOKIE['jwt'];}

      //echo $jwt;


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
      
        }catch (Exception $e){
           echo json_encode(["message"=>$e->getMessage()]);
           exit();
       }


      ?>
    </h3>

    <a href="Menu.php"><i class="fab fa-500px"></i><span> Profilul meu</span></a>
    <a href="clase.php"><i class="fab fa-500px"></i><span> Clase si cursuri</span></a>
    <a href="upload.php"><i class="fab fa-500px"></i><span> Incarcare tema</span></a>
    <a href="codprezenta.php"><i class="fab fa-500px"></i><span> Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
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
    else { */
      //alert(jwt_stocat);
      ajax.setRequestHeader("Authorization", "Bearer " + jwt_stocat);
      ajax.send();
  //  }
  </script>
  
        
        <div class="mainul">
            <div class="containerClase">
                <div class="boxGrupa" id="BD">
                    <div class="iconCurs"><i class="fa fa-database" aria-hidden="true"></i></div>
                    <div class="content">
                        <h3>
                            <a href="statisticaBD.php">
                            Baze de date
                            </a>
                        </h3>
                        <p>Haideti sa intelegem conceptul de date structurate si sa povestim despre Oracle.</p>
                    </div>
                </div>
                <div class="boxGrupa">
                    <div class="iconCurs" id="TW" ><i class="fa fa-code"></i></div>
                        <div class="content">
                            <h3>
                                <a href="statisticaTW.php">
                            Tehnologii web
                            </a>
                            </h3>
                            <p>Haideti sa ne facem propriul nostru site si sa intelegem ce se intampla in spatele framework-urilor</p>
                    </div>
                </div>
                <div class="boxGrupa">
                    <div class="iconCurs" id="RC"><i class="fa fa-linux"></i></div>
                        <div class="content">
                            <h3>
                                <a href="statisticaRC.php">
                            Retele de calculatoare
                            </a>
                            </h3>
                            <p>Haideti sa ne jucam de-a serverul si de-a clientul, folosindu-ne de sistemul de operare Linux.</p>
                        </div>
                </div>
            </div>
        </div>
        <script>
            if (getCookie("jwt") == "prof") deleteAllCookies();
          </script>
        
    </body>
</html>