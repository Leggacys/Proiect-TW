<?php

include 'uploadConfig.php';
//include 'jwtVerificationUpload.php';


// files needed to connect to database
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
try{    
  $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
  //print_r($jwt_decodificat);
  //echo "\n\n\n\n";
  $id_utilizator = $jwt_decodificat->data->id;
  $rol = $jwt_decodificat->data->rol;

  //echo $id_utilizator;
  echo "\n\n\n\n";
  //echo $rol;
  echo "\n\n\n\n";
  

  }catch (Exception $e){
     echo json_encode(["message"=>$e->getMessage()]);
     exit();
 }


$link = "";
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

    $sql = "INSERT INTO uploaded_files (name, new_name, course, id_stud)
    VALUES('$file_name', '$file_new_name', 'unknown' , '$id_utilizator')";
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="../css/upload.css"> 
	<title>Încarcă document</title>
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
      //use \Firebase\JWT\JWT;
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
    <a href="Menu.php"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
    <a href="clase.php"><i class="fab fa-500px"></i><span>   Clase și cursuri</span></a>
    <a href="upload.php"><i class="fab fa-500px"></i><span>   Încărcare temă</span></a>
    <a href="codprezenta.php"><i class="fab fa-500px"></i><span>   Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content3">
  <div class="file__upload">
		<div class="header-box">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>HW</span> upload</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body-formular">
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

<!-- to avoid resubmission -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>




<script>
  function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

    var ajax = new XMLHttpRequest();
    var url = "jwtVerificationUpload.php";
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
    /* if (jwt_stocat == null) {
      alert("JWT-ul nu se mai regaseste. Vei fi delogat din aplicatie!")
      delete_cookie("jwt");
      window.location.replace("http://localhost/testingWeb/html+php/index.html");
    }
    else if (jwt_stocat == "  " || jwt_stocat == "   " || jwt_stocat.length==847) {
      //678 reprezinta cazul de eroare, in momentul in care numele utilizatorului nu e in baza de date
      alert("Username sau parola gresita!");
      delete_cookie("jwt");
      deleteAllCookies();   
      window.localStorage.removeItem("jwt");
      window.location.replace("http://localhost/testingWeb/html+php/index.html");
    }
    else if (jwt_stocat.length>2900){
      setTimeout(() => {  window.location.replace("http://localhost/testingWeb/html+php/Menu-prof.html"); }, 0.001);
    }
    else{ */
    //alert(jwt_stocat);
    ajax.setRequestHeader("Authorization","Bearer "+ jwt_stocat);
    ajax.send();
   // }
  </script>


  </body>
</html>