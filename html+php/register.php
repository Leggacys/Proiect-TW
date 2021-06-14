<?php
if(isset($_COOKIE["jwt"])){
  header("Location: http://localhost/testingWeb/html+php/Menu.php");
  return false;
  } 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
  <link rel="stylesheet" href="../css/register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../css/styleLoadingScreen.css">
  <!-- am modificat sa se vada iconitele la register -->
  <meta charset="utf-8">
  <title>Register</title>
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

  <div class="container">
    <div class="header">
      <h2> <i class="fa fa-cloud" style="font-size:24px;"></i> Create Account  <i class="fa fa-cloud" style="font-size:24px;"></i> </h2>
    </div>
    <form class="form" id="form">
      <div class="form-control">
        <label>Username</label>
        <input type="text" placeholder="Username" id="username">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message!</small>
      </div>

      <div class="form-control">
        <label>Email</label>
        <input type="email" placeholder="email@email.com" id="email">
        <i class="fas fa-check-circle" aria-hidden="true"></i>
        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
        <small>Error message!</small>
      </div>

      <div class="form-control">
        <label>Firstname</label>
        <input type="text" placeholder="Firstname" id="firstname">
        <i class="fas fa-check-circle" aria-hidden="true"></i>
        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
        <small>Error message!</small>
      </div>

      <div class="form-control">
        <label>Lastname</label>
        <input type="text" placeholder="Lastname" id="lastname">
        <i class="fas fa-check-circle" aria-hidden="true"></i>
        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
        <small>Error message!</small>
      </div>

      <div class="form-control">
        <label>Password</label>
        <input type="password" placeholder="Password" id="password">
        <i class="fas fa-check-circle" aria-hidden="true"></i>
        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
        <small>Error message!</small>
      </div>

      <div class="form-control">
        <label>Password check</label>
        <input type="password" placeholder="Password two" id="password2">
        <i class="fas fa-check-circle" aria-hidden="true"></i>
        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
        <small>Error message!</small>
      </div>
      <p>Choose your role :
        <input type="radio" name="account-type" value="student" id="student" onclick="show();" />
        <label for="student">Student</label>

        <input type="radio" name="account-type" value="teacher" id="teacher" onclick="hide();" />
        <label for="teacher">Teacher</label>
      </p>
      <div id="stud-info" class="hide margin-20">
        <hr />
        <label for="years">Year and group:</label> 

        <select name="year" id="year">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>

        <select name="group_letter" id="semian">
            <?php
                $arr = array('A', 'B', 'E'); 
                foreach ($arr as $letter){
                    echo "<option value=$letter>$letter</option>";
                }
            ?>
        </select>
        <select name="group_number" id="group">
            <?php 
                foreach (range('1', '6') as $letter){
                    echo "<option value=$letter>$letter</option>";
                }
            ?>
        </select>
    </div>
    <br>
      <button>Submit</button>
      <div class="bottomtext">
        Wanna go back to login?
        <br>
        <a href="index.php">Click here!</a>
      </div>
    </form>
  </div>

  <script>
    window.addEventListener('load', function () {
      const loader = document.querySelector(".loading");
      loader.className += " hidden";
    })
  </script>



  <script src="../js/scriptRegister.js"></script>


</body>

<!-- <script>

  var jwt_stocat = window.localStorage.getItem("jwt");
  if(jwt_stocat.length>2900){
    alert("Sunteti deja logat profesore! Veti fi redirectionati la meniul corespunzator!");
    setTimeout(() => {  window.location.replace("http://localhost/testingWeb/html+php/Menu.html"); }, 0.001);
  }
  else if(jwt_stocat.length>0 && jwt_stocat.length<2900){
    alert("Sunteti deja logat studentule! Veti fi redirectionati la meniul corespunzator!");
    setTimeout(() => {  window.location.replace("http://localhost/testingWeb/html+php/Menu.html"); }, 0.001);
  
  }                                                      CE PUTEM SCOATE
  </script> --> 
  <script>
function show() {
    var x = document.getElementById("stud-info");
    x.style.display = "block";
}

function hide() {
    var x = document.getElementById("stud-info");
    x.style.display = "none";
}
</script>

</html>

