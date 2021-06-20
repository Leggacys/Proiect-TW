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

  function takeTheGradeFromDropdownMenu(row){
  var nota = document.getElementById(row).value;
  //var text = nota.options[e.selectedIndex].text;
  return nota;
}
function insertIntoDBNormal(row,id_student,curs){
  //alert("salut");
if(row != null){
    var valoare = takeTheGradeFromDropdownMenu(row);
    // alert(valoare);
    // alert(id_temaaa);
    //ajax call
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //console.log(this.responseText);
      location.reload();
    }
    else if (this.readyState == 4 && this.status == 400) {
          alert("Numar de note depasit!");
          location.reload();
      }
    };
    xmlhttp.open("GET", "http://localhost/TestingWeb/html+php/puneNotaNormal.php?id=" + row + "&idstudent=" + id_student + "&nota=" + valoare + "&curs=" + curs, true);
    xmlhttp.send();
return 1;
}
return 0;
}

    </script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/Menu-prof-Note.css">
    <link rel="stylesheet" href="../css/Menu-prof-GenereazaCod.css">
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


      <p size="5px">
        Numar maxim de note
      </p>
      <form class="form" id="form" action="" method="get">
        <input type="text" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" size="5" maxlength="5" type="text" class="Durata"
        placeholder="Nr_note" name="Nr_note" id="Nr_note" />
        <input type="text" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" size="20" maxlength="20" type="text" class="Formula"
        placeholder="Formula" name="Formula" id="Formula" />
      <div class="form-control">
      </div>
      <button id="submit" >Submit</button>

    </form>

    <?php
    error_reporting(0);
    if(isset($_GET['Nr_note'])&&$_GET['Formula']){
    $numar_note = $_GET['Nr_note'];
    $formula=$_GET['Formula'];
    $conn = mysqli_connect("localhost","root","","api_db");
    if($conn-> connect_error){
        die("Connect failed");
    }

    $conn1 = mysqli_connect("localhost","root","","api_db");
    if($conn-> connect_error){
        die("Connect failed");
    }

    if($rol == 'teacher1'){
      $queryInsert = "UPDATE stabileste_note_cursuri SET nr_note = '$numar_note' WHERE id_curs = '1'";
      $queryInsert1 = "UPDATE media_formule SET formula = '$formula' WHERE id_curs = '1'";


      $data=mysqli_query($conn,$queryInsert);
      $data1=mysqli_query($conn,$queryInsert1);
      //echo $data;
      if($data)
      {header("Location: http://localhost/testingWeb/html+php/Menu-prof-Note.php");
        //echo "Reusit";
      }else {
        echo "Eroare1";
      }
      header("Location: http://localhost/testingWeb/html+php/Menu-prof-Note.php");
  }
  else if($rol == 'teacher2'){
    $queryInsert = "UPDATE stabileste_note_cursuri SET nr_note = '$numar_note' WHERE id_curs = '2'";

    $data=mysqli_query($conn,$queryInsert);
    echo $data;
    if($data)
    {header("Location: http://localhost/testingWeb/html+php/Menu-prof-Note.php");
      //echo "Reusit";
    }else {
      echo "Eroare1";
    }
    header("Location: http://localhost/testingWeb/html+php/Menu-prof-Note.php");
}

else if($rol == 'teacher3'){
  $queryInsert = "UPDATE stabileste_note_cursuri SET nr_note = '$numar_note' WHERE id_curs = '3'";

  $data=mysqli_query($conn,$queryInsert);
  echo $data;
  if($data)
  {header("Location: http://localhost/testingWeb/html+php/Menu-prof-Note.php");
    //echo "Reusit";
  }else {
    echo "Eroare1";
  }
  header("Location: http://localhost/testingWeb/html+php/Menu-prof-Note.php");
}
  }
    ?>
    </div>



  <div class="container1">
     <div class="btn">

<?php


$conn = mysqli_connect("localhost","root","","api_db");
if($conn-> connect_error){
  die("Connect failed");
}

$sql2 = "SELECT formula from media_formule  WHERE id_curs='1';";

$result = $conn -> query($sql2);
if($result  -> num_rows > 0)
{
  $row = $result -> fetch_assoc();
  $formula = $row['formula'];
  echo '<div class="shop-now" id="formula">'
  . $formula . "</div>";
}

else {
  echo '<div class="shop-now" id="formula">'
  . "Da". "</div>";
}
/*
//  $formula=$row['formula'];

echo "<div class='shop-now'>"
. "Da". "</div>" */
 ?>

        <div class="snowflake-grid to-left">
           <div class="snowflake-item border-bottom border-right">
              <div class="sub-items border-right border-bottom pull-down">
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
           <div class="snowflake-item border-bottom border-left">
              <div
                 class="sub-items border-right border-bottom r-90 pull-down-right"
                 >
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
           <div class="snowflake-item border-top border-right">
              <div class="sub-items border-right border-bottom r-270 pull-right">
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
           <div class="snowflake-item border-top border-left">
              <div class="sub-items border-right border-bottom r-180 pull-left">
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
        </div>
        <div class="snowflake-grid to-right">
           <div class="snowflake-item border-bottom border-right">
              <div class="sub-items border-right border-bottom pull-down">
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
           <div class="snowflake-item border-bottom border-left">
              <div
                 class="sub-items border-right border-bottom r-90 pull-down-right"
                 >
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
           <div class="snowflake-item border-top border-right">
              <div class="sub-items border-right border-bottom r-270 pull-right">
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
           <div class="snowflake-item border-top border-left">
              <div class="sub-items border-right border-bottom r-180 pull-left">
                 <div class="m-w-15 m-h-15 border-right border-bottom m-3"></div>
              </div>
           </div>
        </div>
     </div>
  </div>


  <table class="styled-table" id="myTable">
      <thead>
          <tr>
              <th>Nr matricol</th>
              <th>Nume</th>
              <th>Prenume</th>
              <th>Note curente</th>
              <th>Noteaza</th>
              <th>Submit</th>
              <th>Medie</th>
          </tr>
      </thead>
      <tbody>

          <?php
          $conn = mysqli_connect("localhost","root","","api_db");
          if($conn-> connect_error){
            die("Connect failed");
          }

          //paths = CONCAT('http://localhost/TestingWeb/html+php/download.php?id=',f.id)
          //$sql = "SELECT u.id AS nrmatricol, u.lastname AS nume, u.firstname AS prenume, f.name AS nume_tema, CONCAT('http://localhost/TestingWeb/html+php/download.php?id=',f.id) as paths, f.new_name AS new_name, nota, f.id AS id_tema FROM users u JOIN uploaded_files f ON u.id=f.id_stud WHERE u.rol=0";

          $conn2 = mysqli_connect("localhost","root","","api_db");
          if($conn2-> connect_error){
          die("Connect failed");
          }
          if($rol == "teacher1"){


            $sql = "SELECT s.id_stud as nrmatricol, s.nume as nume, s.prenume as prenume from studenti s WHERE id_curs='1';";
            $result = $conn -> query($sql);
            $counter_row = 1;


            if($result  -> num_rows >0)
          {
            while($row = $result -> fetch_assoc()){

              $id_student = $row['nrmatricol'];
              $id_curs = '1';
              $id_student_curs = $id_student . " " .$id_curs;



              $sqlGetNote = "SELECT GROUP_CONCAT(valoare) as val
              FROM note WHERE id_stud = '$id_student' and id_curs='1';";
              $resultGetNote = $conn2 -> query($sqlGetNote);
              $row2 = $resultGetNote -> fetch_assoc();
              //echo $row['val'];
              //echo $resultGetNote;
              //echo $sqlGetNote;
              //echo $id_student;

                echo "<tr><td id = \"nr_matricol$counter_row\">" . $row["nrmatricol"] ."</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] . "</td><td id = \"Note$counter_row\" >" . $row2['val'] .


                "</td>
                <td align=\"center\">
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
                        </select>"  ."</td><td>" . "<input type=\"submit\" value=\"Submit\" id = \"$counter_row\" onclick=\"insertIntoDBNormal($counter_row, $id_student, $id_curs)\">". "</td><td id =\"medie$counter_row\"> Medie </td><tr>" ;
                    // if(insertIntoDB($ids, $id_tema) == 1){

                    // }
                   $counter_row++;


            }
            echo "</tbody>";
            echo "</table>";
          }else
          {
            {
              echo "0 results";
            }
          }




          echo "<script> function callCulateMedie(noteId,medieId,nr_matricolId)
          {
            //var x = document.getElementById(\"myTable\").rows.length;
            var str_array= document.getElementById(noteId).innerHTML;
            var numberOfP = document.getElementById(\"formula\").innerHTML.split(\"p\").length-1;
            var matricola = document.getElementById(nr_matricolId).innerHTML;
            console.log(numberOfP);
            var rezultatMedie;
            if(numberOfP==5)
              {
                var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               p4=parseInt(rowsYeyo[3]);
               p5=parseInt(rowsYeyo[4]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==4){
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               p4=parseInt(rowsYeyo[3]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==3)
             {
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==2){
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else
             document.getElementById(medieId).innerHTML = \"NA\";
        
        
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              //location.reload();
            }
            else if (this.readyState == 4 && this.status == 400) {
                  alert(\"Numar de note depasit!\");
                  location.reload();
              }
            };
            xmlhttp.open(\"GET\", \"http://localhost/TestingWeb/html+php/insereazaMedie.php?id=\" + \"1\" + \"&idstudent=\" + matricola + \"&nota=\" + rezultatMedie, true);
            xmlhttp.send();
          }
        
          function schimba()
          {
            var oRows = document.getElementById(\"myTable\").getElementsByTagName('tr');
            var iRowCount = (oRows.length-1)/2;
            for(let i=1;i<=iRowCount;i++)
            {
              var note = \"Note\";
              var noteId=note.concat(i);
              var medie = \"medie\";
              var medieId = medie.concat(i);
              var nr_matricol = \"nr_matricol\";
              var nr_matricolId = nr_matricol.concat(i);
              callCulateMedie(noteId,medieId, nr_matricolId);
            }
          } 
          schimba();
          </script>";






          }
          else if($rol == "teacher2"){














































            $sql = "SELECT s.id_stud as nrmatricol, s.nume as nume, s.prenume as prenume from studenti s WHERE id_curs='2';";
            $result = $conn -> query($sql);
            $counter_row = 1;


            if($result  -> num_rows >0)
          {
            while($row = $result -> fetch_assoc()){

              $id_student = $row['nrmatricol'];
              $id_curs = '2';
              $id_student_curs = $id_student . " " .$id_curs;



              $sqlGetNote = "SELECT GROUP_CONCAT(valoare) as val
              FROM note WHERE id_stud = '$id_student' and id_curs='2';";
              $resultGetNote = $conn2 -> query($sqlGetNote);
              $row2 = $resultGetNote -> fetch_assoc();
              //echo $row['val'];
              //echo $resultGetNote;
              //echo $sqlGetNote;
              //echo $id_student;

              echo "<tr><td id = \"nr_matricol$counter_row\">" . $row["nrmatricol"] ."</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] . "</td><td id = \"Note$counter_row\" >" . $row2['val'] .


                "</td>
                <td align=\"center\">
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
                        </select>"  ."</td><td>" . "<input type=\"submit\" value=\"Submit\" id = \"$counter_row\" onclick=\"insertIntoDBNormal($counter_row, $id_student, $id_curs)\">". "</td><td id =\"medie$counter_row\"> Medie </td><tr>" ;
                    // if(insertIntoDB($ids, $id_tema) == 1){

                    // }
                   $counter_row++;


            }
            echo "</tbody>";
            echo "</table>";
          }else
          {
            {
              echo "0 results";
            }
          }





          


          echo "<script> function callCulateMedie(noteId,medieId,nr_matricolId)
          {
            //var x = document.getElementById(\"myTable\").rows.length;
            var str_array= document.getElementById(noteId).innerHTML;
            var numberOfP = document.getElementById(\"formula\").innerHTML.split(\"p\").length-1;
            var matricola = document.getElementById(nr_matricolId).innerHTML;
            console.log(numberOfP);
            var rezultatMedie;
            if(numberOfP==5)
              {
                var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               p4=parseInt(rowsYeyo[3]);
               p5=parseInt(rowsYeyo[4]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==4){
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               p4=parseInt(rowsYeyo[3]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==3)
             {
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==2){
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else
             document.getElementById(medieId).innerHTML = \"NA\";
        
        
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              //location.reload();
            }
            else if (this.readyState == 4 && this.status == 400) {
                  alert(\"Numar de note depasit!\");
                  location.reload();
              }
            };
            xmlhttp.open(\"GET\", \"http://localhost/TestingWeb/html+php/insereazaMedie.php?id=\" + \"2\" + \"&idstudent=\" + matricola + \"&nota=\" + rezultatMedie, true);
            xmlhttp.send();
          }
        
          function schimba()
          {
            var oRows = document.getElementById(\"myTable\").getElementsByTagName('tr');
            var iRowCount = (oRows.length-1)/2;
            for(let i=1;i<=iRowCount;i++)
            {
              var note = \"Note\";
              var noteId=note.concat(i);
              var medie = \"medie\";
              var medieId = medie.concat(i);
              var nr_matricol = \"nr_matricol\";
              var nr_matricolId = nr_matricol.concat(i);
              callCulateMedie(noteId,medieId, nr_matricolId);
            }
          } 
          schimba();
          </script>";


































          }
          else if($rol == "teacher3"){






            $sql = "SELECT s.id_stud as nrmatricol, s.nume as nume, s.prenume as prenume from studenti s WHERE id_curs='3';";
            $result = $conn -> query($sql);
            $counter_row = 1;


            if($result  -> num_rows >0)
          {
            while($row = $result -> fetch_assoc()){

              $id_student = $row['nrmatricol'];
              $id_curs = '3';
              $id_student_curs = $id_student . " " .$id_curs;



              $sqlGetNote = "SELECT GROUP_CONCAT(valoare) as val
              FROM note WHERE id_stud = '$id_student' and id_curs='3';";
              $resultGetNote = $conn2 -> query($sqlGetNote);
              $row2 = $resultGetNote -> fetch_assoc();
              //echo $row['val'];
              //echo $resultGetNote;
              //echo $sqlGetNote;
              //echo $id_student;

              echo "<tr><td id = \"nr_matricol$counter_row\">" . $row["nrmatricol"] ."</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] . "</td><td id = \"Note$counter_row\" >" . $row2['val'] .


                "</td>
                <td align=\"center\">
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
                        </select>"  ."</td><td>" . "<input type=\"submit\" value=\"Submit\" id = \"$counter_row\" onclick=\"insertIntoDBNormal($counter_row, $id_student, $id_curs)\">". "</td><td id =\"medie$counter_row\"> Medie </td><tr>" ;
                    // if(insertIntoDB($ids, $id_tema) == 1){

                    // }
                   $counter_row++;


            }
            echo "</tbody>";
            echo "</table>";
          }else
          {
            {
              echo "0 results";
            }
          }






          echo "<script> function callCulateMedie(noteId,medieId,nr_matricolId)
          {
            //var x = document.getElementById(\"myTable\").rows.length;
            var str_array= document.getElementById(noteId).innerHTML;
            var numberOfP = document.getElementById(\"formula\").innerHTML.split(\"p\").length-1;
            var matricola = document.getElementById(nr_matricolId).innerHTML;
            console.log(numberOfP);
            var rezultatMedie;
            if(numberOfP==5)
              {
                var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               p4=parseInt(rowsYeyo[3]);
               p5=parseInt(rowsYeyo[4]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==4){
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               p4=parseInt(rowsYeyo[3]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==3)
             {
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               p3=parseInt(rowsYeyo[2]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else if(numberOfP==2){
                 var rowsYeyo = str_array.split(',');
               p1=parseInt(rowsYeyo[0]);
               p2=parseInt(rowsYeyo[1]);
               var formula=document.getElementById(\"formula\").innerHTML;
               document.getElementById(medieId).innerHTML = eval(formula);
               rezultatMedie = eval(formula);
             }else
             document.getElementById(medieId).innerHTML = \"NA\";
        
        
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              //location.reload();
            }
            else if (this.readyState == 4 && this.status == 400) {
                  alert(\"Numar de note depasit!\");
                  location.reload();
              }
            };
            xmlhttp.open(\"GET\", \"http://localhost/TestingWeb/html+php/insereazaMedie.php?id=\" + \"3\" + \"&idstudent=\" + matricola + \"&nota=\" + rezultatMedie, true);
            xmlhttp.send();
          }
        
          function schimba()
          {
            var oRows = document.getElementById(\"myTable\").getElementsByTagName('tr');
            var iRowCount = (oRows.length-1)/2;
            for(let i=1;i<=iRowCount;i++)
            {
              var note = \"Note\";
              var noteId=note.concat(i);
              var medie = \"medie\";
              var medieId = medie.concat(i);
              var nr_matricol = \"nr_matricol\";
              var nr_matricolId = nr_matricol.concat(i);
              callCulateMedie(noteId,medieId, nr_matricolId);
            }
          } 
          schimba();
          </script>";

















          }

          $conn-> close();
           ?>

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

/* 
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
   ajax.setRequestHeader("Authorization","Bearer "+ jwt_stocat);
  ajax.send(); 
  } */

  function callCulateMedie(noteId,medieId,nr_matricolId)
  {
    //var x = document.getElementById("myTable").rows.length;
    var str_array= document.getElementById(noteId).innerHTML;
    var numberOfP = document.getElementById("formula").innerHTML.split("p").length-1;
    var matricola = document.getElementById(nr_matricolId).innerHTML;
    console.log(numberOfP);
    var rezultatMedie;
    if(numberOfP==5)
      {
        var rowsYeyo = str_array.split(',');
       p1=parseInt(rowsYeyo[0]);
       p2=parseInt(rowsYeyo[1]);
       p3=parseInt(rowsYeyo[2]);
       p4=parseInt(rowsYeyo[3]);
       p5=parseInt(rowsYeyo[4]);
       var formula=document.getElementById("formula").innerHTML;
       document.getElementById(medieId).innerHTML = eval(formula);
       rezultatMedie = eval(formula);
     }else if(numberOfP==4){
         var rowsYeyo = str_array.split(',');
       p1=parseInt(rowsYeyo[0]);
       p2=parseInt(rowsYeyo[1]);
       p3=parseInt(rowsYeyo[2]);
       p4=parseInt(rowsYeyo[3]);
       var formula=document.getElementById("formula").innerHTML;
       document.getElementById(medieId).innerHTML = eval(formula);
       rezultatMedie = eval(formula);
     }else if(numberOfP==3)
     {
         var rowsYeyo = str_array.split(',');
       p1=parseInt(rowsYeyo[0]);
       p2=parseInt(rowsYeyo[1]);
       p3=parseInt(rowsYeyo[2]);
       var formula=document.getElementById("formula").innerHTML;
       document.getElementById(medieId).innerHTML = eval(formula);
       rezultatMedie = eval(formula);
     }else if(numberOfP==2){
         var rowsYeyo = str_array.split(',');
       p1=parseInt(rowsYeyo[0]);
       p2=parseInt(rowsYeyo[1]);
       var formula=document.getElementById("formula").innerHTML;
       document.getElementById(medieId).innerHTML = eval(formula);
       rezultatMedie = eval(formula);
     }else
     document.getElementById(medieId).innerHTML = "NA";


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      //location.reload();
    }
    else if (this.readyState == 4 && this.status == 400) {
          alert("Numar de note depasit!");
          location.reload();
      }
    };
    xmlhttp.open("GET", "http://localhost/TestingWeb/html+php/insereazaMedie.php?id=" + "1" + "&idstudent=" + matricola + "&nota=" + rezultatMedie, true);
    xmlhttp.send();
  }

  function schimba()
  {
    var oRows = document.getElementById("myTable").getElementsByTagName('tr');
    var iRowCount = (oRows.length-1)/2;
    for(let i=1;i<=iRowCount;i++)
    {
      var note = "Note";
      var noteId=note.concat(i);
      var medie = "medie";
      var medieId = medie.concat(i);
      var nr_matricol = "nr_matricol";
      var nr_matricolId = nr_matricol.concat(i);
      callCulateMedie(noteId,medieId, nr_matricolId);
    }
  }
  //schimba();

  </script>
</html>
