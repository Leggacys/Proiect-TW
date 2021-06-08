
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
      function hidediv(){
        document.getElementById("welcomeContainer").style.visibility="hidden";
      }
      setTimeout("hidediv()",5000);
    </script>
    <meta charset="utf-8">
    <title>AcceptStudents </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="Menu-prof-AcceptStudents.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
    <div id="welcomeContainer"> Autentificare reușită</div>
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
  <h1><span class="blue">&lt;</span>Request<span class="blue">&gt;</span> <span class="yellow">Table</span></h1>
 <table class="container">
 		<tr>
 			<th>Nume</th>
      <th>Prenume</th>
 			<th>Numar Matricol</th>
      <th>AcceptTo</th>
      <th>Accepta</th>
      <th>Respinge</th>
 		</tr>
  <?php
  $conn = mysqli_connect("localhost","root","","studenti");
  if($conn-> connect_error){
    die("Connect failed");
  }

  $sql = "SELECT * FROM studenti";
  $result = $conn -> query($sql);
  if($result  -> num_rows >0)
  {
    while($row = $result -> fetch_assoc()){
      echo "<tr><td>" . $row["Nume"] ."</td><td>" . $row["Prenume"] . "</td><td>" . $row["NumarMatricol"] .
      "</td><td>" . $row["AcceptTo"] .  "</td><td><a href = 'accepta.php?numarMatricol=$row[NumarMatricol]&
      class=$row[AcceptTo]&nume=$row[Nume]&prenume=$row[Prenume]'> Accepta</td>" . "<td>
      <a href = 'respinge.php?rn=$row[NumarMatricol]'> Respinge</td>" . "</tr>";
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
</html>
