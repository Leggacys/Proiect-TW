<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <meta name="description" content="Class Manager - Pune Note Pe Teme Profesor.">
    

<script>

function takeTheGradeFromDropdownMenu(row){
  var nota = document.getElementById(row).value;
  //var text = nota.options[e.selectedIndex].text;
  return nota;
}

function insertIntoDB(row, id_tema){

  if(row != null && id_tema != null){
      var valoare = takeTheGradeFromDropdownMenu(row);
      var id_temaaa = id_tema;
      // alert(valoare);
      // alert(id_temaaa);
      //ajax call
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        //console.log(this.responseText);
        location.reload(); 
      }
      };
      xmlhttp.open("GET", "http://localhost/TestingWeb/html+php/salveazaNota.php?id=" + row + "&idtema=" + id_tema + "&nota=" + valoare, true);
      xmlhttp.send();
  return 1;
  }
  return 0;
}



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
    <title>Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/puneNote.css">
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
      <a href="Menu-prof-AcceptStudents.php"><i class="fab fa-500px"></i><span>   Primește studenți</span></a>
      <a href="Menu-prof-GenereazaCod.php"><i class="fab fa-500px"></i><span>   Generează cod</span></a>
      <a href="Menu-prof-Note.php"><i class="fab fa-500px"></i><span>   Notează studenții</span></a>
      <a href="Menu-prof-Export.php"><i class="fab fa-500px"></i><span>   Descarcă lista de persoane</span></a>
      <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">
<h1><span class="blue">&lt;</span>Vizualizare<span class="blue">&gt;</span> <span class="yellow">Teme</span></h1>
  <table class="styled-table">
      <thead>
          <tr>
              <th>Nr matricol</th>
              <th>Nume</th>
              <th>Prenume</th>
              <th>Tema</th>
              <th>Noteaza</th>
              <th>Submit</th>
          </tr>
      </thead>
      <tbody>

          <?php
          $conn = mysqli_connect("localhost","root","","api_db");
          if($conn-> connect_error){
            die("Connect failed");
          }


          if($rol == "teacher1"){
            $course = "BD";
            $id_curs = 1;
          }
          else if($rol == "teacher2"){
            $course = "RC";
            $id_curs = 2;
          }
          else if($rol == "teacher3"){
            $course = "TW";
            $id_curs = 3;
          }


          //paths = CONCAT('http://localhost/TestingWeb/html+php/download.php?id=',f.id)
          $sql = "SELECT u.id AS nrmatricol, u.lastname AS nume, u.firstname AS prenume, f.name AS nume_tema, CONCAT('http://localhost/TestingWeb/html+php/download.php?id=',f.id) as paths, f.new_name AS new_name, nota, f.id AS id_tema FROM users u JOIN uploaded_files f ON u.id=f.id_stud WHERE u.rol=0 AND course='$course' ORDER BY nota ASC";
          $result = $conn -> query($sql);
          $counter_row = 1;
          if($result  -> num_rows >0)
          {
            while($row = $result -> fetch_assoc()){
              $link_to_hw = "http://localhost/TestingWeb/html+php/uploads/" . $row["new_name"];
              $nota = $row["nota"];
              $id_tema = $row["id_tema"];

              if($nota != 0){
                    echo "<tr><td>" . $row["nrmatricol"] ."</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] .
                    "</td><td><a href ='" . $link_to_hw . "'>". $row["nume_tema"] . "</a></td><td > ". $nota. "</td><td  > ". "Submitted" ."</td></tr>";
                    
                  }
              else{
                ?>


                <?php
                
                $id_student = $row['nrmatricol'];
                $querySelect1 = "SELECT count(id_stud) as counter1 FROM note WHERE id_curs = '$id_curs' AND id_stud = '$id_student';";
                $result1 = $conn -> query($querySelect1);
                $row1 = $result1 -> fetch_assoc();
                $nb_note=$row1['counter1'];

                $querySelect2 = "SELECT nr_note as counter2 FROM stabileste_note_cursuri WHERE id_curs = '$id_curs';";
                $result2 = $conn -> query($querySelect2);
                $row2 = $result2 -> fetch_assoc();
                $nb_note_max=$row2['counter2'];

                if($nb_note < $nb_note_max){

                echo "<tr><td>" . $row["nrmatricol"] ."</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] .
                "</td><td><a href = '" . $link_to_hw . "'>". $row["nume_tema"] . "</a></td >   
                <td >
                   <select id=\"$counter_row\">
                        <option>--</option>        
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                   </select>"  ."</td><td>" . "<input type=\"submit\" value=\"Submit\" onclick=\"insertIntoDB($counter_row, $id_tema)\">". "</td></tr>" ;
                    // if(insertIntoDB($ids, $id_tema) == 1){

                    // }
                   $counter_row++;
                    }
                    else{
                      echo "<tr><td>" . $row["nrmatricol"] ."</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] .
                      "</td><td><a href ='" . $link_to_hw . "'>". $row["nume_tema"] . "</a></td><td > ". '-1'. "</td><td  > ". "Numar maxim de note atins" ."</td></tr>";
                    }
              } 
            }
            echo "</tbody>";
            echo "</table>";
            echo "<br /><br />";
          }else 
          {
            {
              echo "0 results";
            }
          }
          $conn-> close();
           ?>
  <nav>
  
</nav>

 </div>
<script>
function myFunction() {

var rows = document.getElementsByTagName("table")[0].rows;
var firstGrade = rows[rows.length - 1];
var secondGrade = firstGrade.cells[0];
var thirdGrade = secondGrade.innerHTML;
var soum = firstGrade+secondGrade+thirdGrade;
soum=soum/3;
document.getElementById("medie").innerHTML = secondGrade;
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


// if (jwt_stocat == null) {
//     alert("JWT-ul nu se mai regaseste. Vei fi delogat din aplicatie!")
//     window.location.replace("http://localhost/testingWeb/html+php/index.html");
//     delete_cookie("prof");
//   }
//   else if (jwt_stocat == "  " || jwt_stocat == "   " || jwt_stocat.length==847) {
//     //678 reprezinta cazul de eroare, in momentul in care numele utilizatorului nu e in baza de date
//     alert("Username sau parola gresita!")
//     delete_cookie("jwt");
//     deleteAllCookies();
//     window.localStorage.removeItem("jwt");
//     window.location.replace("http://localhost/testingWeb/html+php/index.html");
//   }
//   else{
//   //alert(jwt_stocat);
//   /* ajax.setRequestHeader("Authorization","Bearer "+ jwt_stocat);
//   ajax.send(); */
//   }



  </script>
  </body>

  
</html>