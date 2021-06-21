<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <script src="../js/jwtVerification.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Class Manager - StudentHomePage.">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu </title>
  <script>

    function delete_cookie(name) {
      document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    function logoutFunction() {
      localStorage.removeItem("jwt");
      delete_cookie("jwt");
    }

  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../css/Menu.css">
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
    <img src="../images/CLaMa.svg" class="profile_image" alt="profile image">
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
        if($rol != "student"){
          header("Location: http://localhost/testingWeb/html+php/Menu-prof.php");
        }
        //print_r($jwt_decodificat);
        //echo "\n\n\n\n";
        $id_utilizator = $jwt_decodificat->data->id;
        $nume = $jwt_decodificat->data->lastname;
        $prenume = $jwt_decodificat->data->firstname;
        $an = $jwt_decodificat->data->year;
        $semian = $jwt_decodificat->data->semian;
        $grupa = $jwt_decodificat->data->grup;
        $mail = $jwt_decodificat->data->email;
        //echo $id_utilizator;
        echo $nume . " ";
        //echo $rol;
        echo $prenume . "\n";
        echo "\r\n";
        echo "<br/>";
        echo $rol;
      
        }catch (Exception $e){
           echo json_encode(["message"=>$e->getMessage()]);
           exit();
       }


      ?>
    </h3>

    <a href="Menu.php"><i class="far fa-user-circle" ></i><span> Profilul meu</span></a>
    <a href="clase.php"><i class="fas fa-pen-alt"></i><span> Clase si cursuri</span></a>
    <a href="codprezenta.php"><i class="fas fa-clipboard-check"></i><span> Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fas fa-book"></i><span> ScholarlyHTML </span></a>
  </div>

  <div class="content">
  
  <h2 class="student_info">

       <?php 
      
      echo "Salut, studentule! Vei regasi mai jos mai multe informatii:";

      ?>
      </h2>

  <h2 class="student_info">

      <?php 
      $conn_noteStud = mysqli_connect("localhost","root","","api_db");
      if($conn_noteStud-> connect_error){
        die("Connect failed");
      }


      $sqlIsBDStudent = "SELECT nume as identificator 
      FROM studenti WHERE id_stud = '$id_utilizator' and id_curs='1';";
      $resultIsBDStudent = $conn_noteStud -> query($sqlIsBDStudent);
      $row2isBDStudent = $resultIsBDStudent -> fetch_assoc();

      $sqlIsRCStudent = "SELECT nume as identificator 
      FROM studenti WHERE id_stud = '$id_utilizator' and id_curs='2';";
      $resultIsRCStudent = $conn_noteStud -> query($sqlIsRCStudent);
      $row2isRCStudent = $resultIsRCStudent -> fetch_assoc();

      $sqlIsTWStudent = "SELECT nume as identificator 
      FROM studenti WHERE id_stud = '$id_utilizator' and id_curs='3';";
      $resultIsTWStudent = $conn_noteStud -> query($sqlIsTWStudent);
      $row2isTWStudent = $resultIsTWStudent -> fetch_assoc();
      
      


      echo "Nume: " .$nume . "</br>";
      echo "Prenume: " .$prenume . "</br>";
      echo "Email: " . $mail . "</br>";
      echo "Numar matricol: " .$id_utilizator . "</br>";
      
      if($row2isBDStudent!=NULL){
      $sqlGetNoteBD = "SELECT GROUP_CONCAT(valoare) as val 
      FROM note WHERE id_stud = '$id_utilizator' and id_curs='1';";
      $resultGetNoteBD = $conn_noteStud -> query($sqlGetNoteBD);
      $row2BD = $resultGetNoteBD -> fetch_assoc();
      echo "Note la Baze de Date: " . $row2BD['val'] . ". ";

      $sqlGetMedieBD = "SELECT medie as media FROM studenti WHERE id_stud = '$id_utilizator' and id_curs='1';";
      $resultGetMedieBD = $conn_noteStud -> query($sqlGetMedieBD);
      $row3BD = $resultGetMedieBD -> fetch_assoc();
      if($row3BD['media'] == '0'){
        echo "Media la Baze de Date: " . "inca nu au fost puse toate notele pentru a se stabili o medie" . ". </br>";
      }
      else{
      echo "Media la Baze de Date: " . $row3RC['media'] . ". </br>";
      }
      }
      else{
        echo "Inca nu esti inregistrat/nu ai fost acceptat la cursul Baze de Date. </br>";
      }

      if($row2isRCStudent!=NULL){
      $sqlGetNoteRC = "SELECT GROUP_CONCAT(valoare) as val 
      FROM note WHERE id_stud = '$id_utilizator' and id_curs='2';";
      $resultGetNoteRC = $conn_noteStud -> query($sqlGetNoteRC);
      $row2RC = $resultGetNoteRC -> fetch_assoc();
      echo "Note la Retele de calculatoare: " . $row2RC['val'] . ". ";

      $sqlGetMedieRC = "SELECT medie as media FROM studenti WHERE id_stud = '$id_utilizator' and id_curs='2';";
      $resultGetMedieRC = $conn_noteStud -> query($sqlGetMedieRC);
      $row3RC = $resultGetMedieRC -> fetch_assoc();
      if($row3RC['media'] == '0'){
        echo "Media la Retele de calculatoare: " . "inca nu au fost puse toate notele pentru a se stabili o medie" . ". </br>";
      }
      else{
      echo "Media la Retele de calculatoare: " . $row3RC['media'] . ". </br>";
      }
    }
      else{
        echo "Inca nu esti inregistrat/nu ai fost acceptat la cursul Retele de calculatoare. </br>";
      }

      if($row2isTWStudent!=NULL){
      $sqlGetNoteTW = "SELECT GROUP_CONCAT(valoare) as val 
      FROM note WHERE id_stud = '$id_utilizator' and id_curs='3';";
      $resultGetNoteTW = $conn_noteStud -> query($sqlGetNoteTW);
      $row2TW = $resultGetNoteTW -> fetch_assoc();
      echo "Note la Tehnologii Web: " . $row2TW['val'] . ". ";

      $sqlGetMedieTW = "SELECT medie as media FROM studenti WHERE id_stud = '$id_utilizator' and id_curs='3';";
      $resultGetMedieTW = $conn_noteStud -> query($sqlGetMedieTW);
      $row3TW = $resultGetMedieTW -> fetch_assoc();
      if($row3TW['media'] == '0'){
        echo "Media la Tehnologii WEB: " . "inca nu au fost puse toate notele pentru a se stabili o medie" . ". </br>";
      }
      else{
      echo "Media la Tehnologii WEB: " . $row3TW['media'] . ". </br>";
      }
      }
      else{
        echo "Inca nu esti inregistrat/nu ai fost acceptat la cursul Tehnologii WEB. </br>";
      }


      $sqlGetNumarTeme = "SELECT count(id_stud) as nrNote 
      FROM uploaded_files WHERE id_stud = '$id_utilizator';";
      $resultGetNumarTeme = $conn_noteStud -> query($sqlGetNumarTeme);
      $row2NrTeme = $resultGetNumarTeme -> fetch_assoc();
      
      $sqlGetNumarTemeNotate = "SELECT count(id_stud) as nrNote2 
      FROM uploaded_files WHERE id_stud = '$id_utilizator' and nota is NULL;";
      $resultGetNumarTemeNotate = $conn_noteStud -> query($sqlGetNumarTemeNotate);
      $row2NrTemeNotate = $resultGetNumarTemeNotate -> fetch_assoc();
      echo "Numar de teme inregistrate: " . $row2NrTeme['nrNote'] . ", dintre care " . $row2NrTemeNotate['nrNote2'] . " nu au fost notate. </br>";


 
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
              echo "Numar matricol : " . $id_utilizator;
            ?></p>
        </div>

        

        <div class="card-footer">
            <p class="count">

            <?php
              echo "Student | FII";
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

    
      ajax.setRequestHeader("Authorization", "Bearer " + jwt_stocat);
      ajax.send();
  </script>
</body>



</html>