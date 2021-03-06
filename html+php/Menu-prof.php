<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <script src="../js/jwtVerification.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Class Manager - TeacherHomePage.">

    

    <script>

function delete_cookie(name) {
      document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

      function logoutFunction() {
        localStorage.removeItem("jwt");
      }
  
      function startsWith ($string, $startString)
  {
      $len = strlen($startString);
      return (substr($string, 0, $len) === $startString);
  }
  
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/Menu-prof.css">
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
          $mail = $jwt_decodificat->data->email;
          //echo $id_utilizator;
          echo "Profesor ";
          echo $nume . " ";
          echo $prenume . " ";
          echo "<br /> ";
          if($rol == "teacher1"){
            echo "Baze de date";
          }
          else if($rol == "teacher2"){
            echo "Retele de calculatoare";
          }
          else if($rol == "teacher3"){
            echo "Tehnologii Web";
          }
            
          }catch (Exception $e){
             echo json_encode(["message"=>$e->getMessage()]);
             exit();
         }
  
  
        ?>
      </h3>
      <a href="Menu-prof.php"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
      <a href="PuneNote.php"><i class="fab fa-500px"></i><span>   Vizualizare Teme</span></a>
      <a href="Menu-prof-AcceptStudents.php"><i class="fab fa-500px"></i><span>   Prime??te studen??i</span></a>
      <a href="Menu-prof-GenereazaCod.php"><i class="fab fa-500px"></i><span>   Genereaz?? cod</span></a>
      <a href="Menu-prof-Note.php"><i class="fab fa-500px"></i><span>   Noteaz?? studen??ii</span></a>
      <a href="Menu-prof-Export.php"><i class="fab fa-500px"></i><span>   Descarc?? lista de persoane</span></a>
      <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">


  <h2 class="student_info">
      <?php 
      $conn_noteStud = mysqli_connect("localhost","root","","api_db");
      if($conn_noteStud-> connect_error){
        die("Connect failed");
      }
      
      echo "Salut profesore! Vei regasi mai jos mai multe informatii:<br /><br />";

      echo "Nume: " .$nume . ".<br />";
      echo "Prenume: " .$prenume . ".<br />";
      echo "Email: " . $mail . ".<br />";
      if($rol == "teacher1"){
        $materie = "Baze de Date";
        echo "Materie predata: $materie . <br />"; 

        $conn_noteStud = mysqli_connect("localhost","root","","api_db");
        if($conn_noteStud-> connect_error){
        die("Connect failed");
        }
        
        $sql = "SELECT count(id_stud) as nr_stud 
        FROM studenti WHERE id_curs='1';";
        $resultSql = $conn_noteStud -> query($sql);
        $row2 = $resultSql -> fetch_assoc();

        echo "Numarul de studenti inscrisi la cursul dumneavoastra: " . $row2['nr_stud'] . "<br />";
        
        

      $sqlGetNumarTeme = "SELECT count(id) as nrTeme 
      FROM uploaded_files WHERE course = 'BD';";
      $resultGetNumarTeme = $conn_noteStud -> query($sqlGetNumarTeme);
      $row2NrTeme = $resultGetNumarTeme -> fetch_assoc();
      
      $sqlGetNumarTemeNotate = "SELECT count(id) as nrTeme2 
      FROM uploaded_files WHERE course = 'BD' and nota is NULL;";
      $resultGetNumarTemeNotate = $conn_noteStud -> query($sqlGetNumarTemeNotate);
      $row2NrTemeNotate = $resultGetNumarTemeNotate -> fetch_assoc();

      echo "Numar de teme inregistrate: " . $row2NrTeme['nrTeme'] . ", dintre care " . $row2NrTemeNotate['nrTeme2'] . " nu au fost verificate. <br />";

      }
      else if($rol == "teacher2"){
        $materie = "Retele de calculatoare";
        echo "Materie predata: $materie . <br />"; 
        
        $conn_noteStud = mysqli_connect("localhost","root","","api_db");
        if($conn_noteStud-> connect_error){
        die("Connect failed");
        }
        
        $sql = "SELECT count(id_stud) as nr_stud 
        FROM studenti WHERE id_curs='2';";
        $resultSql = $conn_noteStud -> query($sql);
        $row2 = $resultSql -> fetch_assoc();

        echo "Numarul de studenti inscrisi la cursul dumneavoastra: " . $row2['nr_stud'] . "<br />";
        
        $sqlGetNumarTeme = "SELECT count(id) as nrTeme 
      FROM uploaded_files WHERE course = 'RC';";
      $resultGetNumarTeme = $conn_noteStud -> query($sqlGetNumarTeme);
      $row2NrTeme = $resultGetNumarTeme -> fetch_assoc();
      
      $sqlGetNumarTemeNotate = "SELECT count(id) as nrTeme2 
      FROM uploaded_files WHERE course = 'RC' and nota is NULL;";
      $resultGetNumarTemeNotate = $conn_noteStud -> query($sqlGetNumarTemeNotate);
      $row2NrTemeNotate = $resultGetNumarTemeNotate -> fetch_assoc();

      echo "Numar de teme inregistrate: " . $row2NrTeme['nrTeme'] . ", dintre care " . $row2NrTemeNotate['nrTeme2'] . " nu au fost verificate. <br />";
      }
      else if($rol == "teacher3"){
        $materie = "Tehnologii WEB";
        echo "Materie predata: $materie . <br />"; 
        
        $conn_noteStud = mysqli_connect("localhost","root","","api_db");
        if($conn_noteStud-> connect_error){
        die("Connect failed");
        }
        
        $sql = "SELECT count(id_stud) as nr_stud 
        FROM studenti WHERE id_curs='3';";
        $resultSql = $conn_noteStud -> query($sql);
        $row2 = $resultSql -> fetch_assoc();

        echo "Numarul de studenti inscrisi la cursul dumneavoastra: " . $row2['nr_stud'] . "<br />";
        
        $sqlGetNumarTeme = "SELECT count(id) as nrTeme 
      FROM uploaded_files WHERE course = 'TW';";
      $resultGetNumarTeme = $conn_noteStud -> query($sqlGetNumarTeme);
      $row2NrTeme = $resultGetNumarTeme -> fetch_assoc();
      
      $sqlGetNumarTemeNotate = "SELECT count(id) as nrTeme2 
      FROM uploaded_files WHERE course = 'TW' and nota is NULL;";
      $resultGetNumarTemeNotate = $conn_noteStud -> query($sqlGetNumarTemeNotate);
      $row2NrTemeNotate = $resultGetNumarTemeNotate -> fetch_assoc();

      echo "Numar de teme inregistrate: " . $row2NrTeme['nrTeme'] . ", dintre care " . $row2NrTemeNotate['nrTeme2'] . " nu au fost verificate. <br />";
      }
      else if($rol == "teacher4"){
        echo "Inca nu ai fost acceptat ca profesor la un curs <br />";
        echo "Asteapta raspunsul administratorului";
      }
        
     
      ?>
</h2>

<div class="card">
        <div class="card-header">
            <img src="../images/student.jpg" alt="Profile Image" class="profile-img">
        </div>
        <div class="card-body">
            <p class="name">

            <?php
              echo $nume . " " . $prenume;
            ?>

            </p>
            <a href="#" class="mail">
              
            <?php
              echo $mail;
            ?>

            </a>
            <p class="job"> <?php
              echo "Profesor : " . $materie;
            ?></p>
        </div>
        <div class="card-footer">
            <p class="count">

            <?php
              echo "Profesor | FII";
            ?>

            </p>
        </div>

    </div>
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
      //console.log(this.responseText);
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

  
  //alert(jwt_stocat);
  ajax.setRequestHeader("Authorization","Bearer "+ jwt_stocat);
  ajax.send();

</script>


  </body>

</html>
