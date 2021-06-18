<?php
error_reporting(0);
include 'uploadConfig.php';

if(!isset($_COOKIE["jwt"])){
  header("Location: http://localhost/testingWeb/html+php/index.php");
  return false;
  } 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta name="description" content="Class Manager - Statistica BD.">

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
    <title>Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/statisticaBD.css">
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

    <a href="Menu.php"><i class="far fa-user-circle" ></i><span> Profilul meu</span></a>
    <a href="clase.php"><i class="fas fa-pen-alt"></i><span> Clase si cursuri</span></a>
    <a href="codprezenta.php"><i class="fas fa-clipboard-check"></i><span> Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fas fa-book"></i><span> ScholarlyHTML </span></a>
  </div>

  <div class="content">
  <table class="styled-table">
      <thead>
          <tr>
              <th>Nr saptamana</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>

          <?php


include_once '../api/config/database.php';
include_once '../api/objects/user.php';
include_once '../api/libs/jwt_params.php';
include_once '../api/objects/user.php';
include_once '../api/libs/php-jwt-master/src/BeforeValidException.php';
include_once '../api/libs/php-jwt-master/src/ExpiredException.php';
include_once '../api/libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../api/libs/php-jwt-master/src/JWT.php';
//use \Firebase\JWT\JWT;
if(!isset($_COOKIE["jwt"])){
  //window.location.replace("http://localhost/testingWeb/html+php/index.html");
  echo "Comportament nepermis! Logati-va ca student ca sa puteti incarca documente.";
  return false;
} 
else {$jwt = $_COOKIE['jwt'];}

try{    
  $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
  //print_r($jwt_decodificat);
  //echo "\n\n\n\n";
  $id_utilizator = $jwt_decodificat->data->id;
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
    
    $sql = "SELECT distinct nr_saptamana, id_stud FROM coduri_studenti WHERE id_stud = '$id_utilizator' AND id_curs='1' ORDER BY nr_saptamana";
    //$sql = "SELECT id_student, nume, prenume, prezente, nota1, nota2, nota3, (nota1+nota2+nota3)/3 as media, id_curs FROM medie_ascultari WHERE '$id_utilizator' = id_student AND id_curs='3'; ";
    $result = $conn -> query($sql);
    if($result  -> num_rows >0) 
    { $row = $result -> fetch_assoc();

      for($i=1; $i <= 13; $i++){
        if($i == $row['nr_saptamana']){
              echo "<tr><td>".$i."</td><td>PREZENT</td></tr>";
              $row = $result -> fetch_assoc();       
      }else{
              echo "<tr><td>".$i."</td><td>ABSENT</td></tr>";
      }
    }
      
      echo "</table>";
    }else {
      {
        for($i=1; $i <= 13; $i++){
          echo "<tr><td>".$i."</td><td>ABSENT</td></tr>";
        }
      }
    }
    $conn-> close();
      ?>

        <br/><br/><br/><br/>

  <table class="styled-table2">
      <thead>
          <tr>
              <th>Data incarcarii</th>
              <th>Nume tema</th>
              <th>Link catre tema</th>
              <th>Nota</th>
          </tr>
      </thead>
      <tbody>

          <?php


          $conn = mysqli_connect("localhost","root","","api_db");
          if($conn-> connect_error){
            die("Connect failed");
          }

          $sql = "SELECT f.uploaded_at AS data, f.name AS nume_tema, f.new_name AS new_name, CONCAT('http://localhost/TestingWeb/html+php/download.php?id=',f.id) as paths, f.nota AS nota, u.id AS id, f.course as titlu_curs FROM users u JOIN uploaded_files f ON u.id=f.id_stud WHERE '$id_utilizator' = u.id AND f.course='BD'";
          $result = $conn -> query($sql);
          if($result  -> num_rows >0)
          {
            while($row = $result -> fetch_assoc()){
              $querySelect1 = "SELECT count(id_stud) as counter1 FROM note WHERE id_curs = '1' AND id_stud = '$id_utilizator';";
              $result1 = $conn -> query($querySelect1);
              $row1 = $result1 -> fetch_assoc();
              $nb_note=$row1['counter1'];

              $querySelect2 = "SELECT nr_note as counter2 FROM stabileste_note_cursuri WHERE id_curs = '1';";
              $result2 = $conn -> query($querySelect2);
              $row2 = $result2 -> fetch_assoc();
              $nb_note_max=$row2['counter2'];
              echo $nb_note;
              //echo $nb_note_max;
              if($nb_note < $nb_note_max){
                $ok = 1;
            }
            else {
              $ok = 0;
            }

              if($row["nota"] != null){
              $link_to_hw = "uploads/" . $row["new_name"];
                echo "<tr><td>" . $row["data"] ."</td><td>" . $row["nume_tema"] . "</td><td><a href ='" . $link_to_hw . "'>". $row["nume_tema"] . "</a></td><td> " . $row["nota"]  . "</td></tr>";    
              }else{
                $link_to_hw = "uploads/" . $row["new_name"];
                if($ok == 0)
                echo "<tr><td>" . $row["data"] ."</td><td>" . $row["nume_tema"] . "</td><td><a href ='" . $link_to_hw . "'>". $row["nume_tema"] . "</a></td><td> " . "Note destule"  . "</td></tr>";
                else
                echo "<tr><td>" . $row["data"] ."</td><td>" . $row["nume_tema"] . "</td><td><a href ='" . $link_to_hw . "'>". $row["nume_tema"] . "</a></td><td> " . "Not marked yet"  . "</td></tr>";
              }
            }
            echo "</table>";
          }else {
            {
              //echo "0 results";
            }
          }
          $conn-> close();
           ?>

<?php

$link_status = "display: none;";


date_default_timezone_set('UTC');




if(isset($_POST['upload'])){ //if upload button isset or not
  //declaring variables
  $location = "uploads/";
  $file_name = $_FILES["file"]["name"]; //get uploaded file
  $file_new_name = date("Y-m-d-H-i-s") . $file_name; //new and unique name
  $file_temp = $_FILES["file"]["tmp_name"]; //get uploded file temp
  $file_size = $_FILES["file"]["size"]; //get upload file size

  if($file_size > 11000000){ //check if is greater than aprox 10MB
    echo "<script>alert('Whoops! I don't have the permission to upload homework that have the size greater than 10MB.')</script>";
  }else{

  $server = "localhost";
  $dbuser = "root";
  $dbpass = "";

  $database = "api_db";


  $conn = mysqli_connect($server, $dbuser, $dbpass, $database);

  if(!$conn){
      die("<script>alert('Connection failed!')</script>");
  }


  $base_url = "http://localhost/TestingWeb/html+php/"; //website url 



    $sql = "INSERT INTO uploaded_files (name, new_name, course, id_stud)
    VALUES('$file_name', '$file_new_name', 'BD' , '$id_utilizator')";
    $result = mysqli_query($conn, $sql);

    if($result){
      move_uploaded_file($file_temp, $location . $file_new_name);
      echo "<script>alert('File upload succeded')</script>";
      //take data from DB

      $sql = "SELECT id FROM uploaded_files ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);

      if($row = mysqli_fetch_assoc($result)){
        $link = $base_url . "download.php?id=" . $row["id"];
        $link_status = "display: block;";
      }

    }else{
        echo "<script>alert('Please try again')</script>";
    }
 
  }
}
?>

<!--html for upload-->

<div class="file__upload">
		<div class="header-box">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>HW</span> upload</span></p>			
		</div>
		<form action="#" method="POST" enctype="multipart/form-data" class="body-formular">
    <!-- SHARABLE PART-->
    <input type="checkbox" id="link_checkbox">
    <input type="text" value="<?php echo $link; ?>" id="link" readonly >
    <label for="link_checkbox" style="<?php echo $link_status; ?>"> Copiază link </label>

			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
                <br>
					Poți trage fișierul direct aici.
                <br>
                    Îl poți căuta și de <span><strong>aici</strong></span>.
			</label>
      <button name="upload" class="btn">Încarcă</button>
		</form>
	</div>




 </div>


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


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }

</script>


  </body>





</html>
