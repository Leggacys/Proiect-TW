<?php

include 'uploadConfig.php';

$link = "";
$link_status = "display: none;";


date_default_timezone_set('UTC');

if(isset($_POST['upload'])){ //if upload button isset or not
  //declaring variables
  $space =" ";
  $location = "uploads/";
  $file_name = $_FILES["file"]["name"]; //get uploaded file
  $file_new_name = date("Y-m-d-H-i-s") . $space . $file_name; //new and unique name
  $file_temp = $_FILES["file"]["tmp_name"]; //get uploded file temp
  $file_size = $_FILES["file"]["size"]; //get upload file size

  if($file_size > 11000000){ //check if is greater than aprox 10MB
    echo "<script>alert('Whoops! I don't have the permission to upload homework that have the size greater than 10MB.')</script>";
  }else{

    $sql = "INSERT INTO uploaded_files (name, new_name, course)
            VALUES('$file_name', '$file_new_name', 'unknown')";
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
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" type="image/svg" href="../images/CLaMa.svg">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="upload.css"> 
	<title>Încarcă document</title>
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
    <img src="../images/Cezar_pROFILE.png" class="profile_image" alt="profile image">
    <h4>Cezar Lupu</h4>
    <a href="#"><i class="fab fa-500px"></i><span>   Profilul meu</span></a>
    <a href="clase.html"><i class="fab fa-500px"></i><span>   Clase și cursuri</span></a>
    <a href="upload.html"><i class="fab fa-500px"></i><span>   Încărcare temă</span></a>
    <a href="codprezenta.html"><i class="fab fa-500px"></i><span>   Introducere cod prezenta</span></a>
    <a href="ScholarlyHTML.html"><i class="fab fa-500px"></i><span> ScholarlyHTML </span></a>
  </div>

<div class="content">
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
  </body>
</html>
