<?php
if(isset($_COOKIE["jwt"])){
  header("Location: http://localhost/testingWeb/html+php/Menu.php");
  return false;
  } 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Class Manager</title>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/styleLoadingScreen.css">
  <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
</head>

<body>
  <div class="loading">
    <div class="obj"></div>
    <div class="obj"></div>
    <div class="obj"></div>
    <div class="obj"></div>
    <div class="obj"></div>
    <div class="obj"></div>
    <div class="obj"></div>
    <div class="obj"></div>
  </div>

  <form action="../html/Menu.html" class="login-form" id="form">
    <h1>Login</h1>
    <div class="txtb">
      <input type="text" placeholder="Username" id="username">
    </div>

    <div class="txtb">

      <input type="password" placeholder="Password" id="parola">

    </div>

    <input type="submit" class="logbtn" value="Login">

    <div class="bottomtext">
      Don't have an account?
      <br>
      
      <a href="../html+php/register.php">Sign Up!</a>
    </div>
    <script>
      window.addEventListener('load', function () {
        const loader = document.querySelector(".loading");
        loader.className += " hidden";
      })
    </script>
  </form>
  <script src="../js/scriptLogin.js"></script>
</body>

<script>

var jwt_stocat = window.localStorage.getItem("jwt");
  if(jwt_stocat != null){
 /* if(jwt_stocat.length>0 && jwt_stocat.length<2900){
  alert("Sunteti deja logat studentule! Veti fi redirectionati la meniul corespunzator!");
  setTimeout(() => {  window.location.replace("http://localhost/testingWeb/html+php/Menu.php"); }, 0.001);
}else{
  alert("Sunteti deja logat profesore! Veti fi redirectionati la meniul corespunzator!");
  setTimeout(() => {  window.location.replace("http://localhost/testingWeb/html+php/Menu.php"); }, 0.001);
} */
  }
</script>

</html>

