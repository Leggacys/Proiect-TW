<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
      function hidediv(){
        document.getElementById("welcomeContainer").style.visibility="hidden";
      }
      setTimeout("hidediv()",1500);
    </script>
    <meta charset="utf-8">
    <title>Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="Menu-prof-Note.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div id="welcomeContainer"> Salut. Ai fost autentificat cu succes in aplicatie!</div>
    <div class="right_area">
      <a href="index.html" class="logout_btn">Logout</a>
    </div>
  </header>


  <div class="sidebar">
    <img src="../images/male.png" class="profile_image" alt="dummy male photo">
    <h4>Profesorul X</h4>
    <a href="#"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
    <a href="Menu-prof-Clase.html"><i class="fab fa-500px"></i><span>   Clase și cursuri</span></a>
    <a href="Menu-prof-AcceptStudents.html"><i class="fab fa-500px"></i><span>   Primește studenți</span></a>
    <a href="Menu-prof-GenereazaCod.html"><i class="fab fa-500px"></i><span>   Generează cod</span></a>
    <a href="Menu-prof-Note.html"><i class="fab fa-500px"></i><span>   Notează studenții</span></a>
    <a href="Menu-prof-Export.html"><i class="fab fa-500px"></i><span>   Descarcă lista de persoane</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
</div>

<div class="content">
  <table class="styled-table">
      <thead>
          <tr>
              <th>Nume</th>
              <th>Prenume</th>
              <th>Nota I</th>
              <th>Nota II</th>
              <th>Nota III</th>
          </tr>
      </thead>
      <tbody>

          <?php
          $conn = mysqli_connect("localhost","root","","info");
          if($conn-> connect_error){
            die("Connect failed");
          }

          $sql = "SELECT * FROM info";
          $result = $conn -> query($sql);
          if($result  -> num_rows >0)
          {
            while($row = $result -> fetch_assoc()){
              echo "<tr><td>" . $row["Nume"] ."</td><td>" . $row["Prenume"] . "</td><td>" . $row["Nota1"] .
              "</td><td>" . $row["Nota2"] .  "</td><td>" . $row["Nota3"]  . "</td></tr>";
            }
            echo "</table>";
          }else {
            {
              echo "0 results";
            }
          }
          $conn-> close();
           ?>
  <nav>
  <ul id="medie">
    <li onclick="myFunction()" >
      Calculeaza Media
      <span></span><span></span><span></span><span></span>
    </li>
  </ul>
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
  </body>
</html>
