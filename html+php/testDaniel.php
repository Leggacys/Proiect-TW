<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cod prezenta </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/Menu-prof-GenereazaCod.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  </head>
  <body>

  <header>
    <div class="left_area">
      <h3>Class <span>Manager</span> </h3>
    </div>
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

  <div class="container">
    <div class="header">
      <h2>Genereaza codul pentru prezenta.</h2>
    </div>
    <form class="form" id="form">
      <div class="form-control">
        <label id="COD">Codul pentru prezenta</label>
      </div>
      <button onclick="myFunction()" >Generate code</button>
    </form>
  </div>


</div>
<script>
function myFunction() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
document.getElementById("COD").textContent = text;
}
</script>
  </body>
  </html>
