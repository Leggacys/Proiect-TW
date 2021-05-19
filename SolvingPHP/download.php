<?php

include 'uploadConfig.php';

$id = $_GET['id']; // Get id from URL

if (!$id) {
    header("Location: upload.php");
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
			<p><i class="fa fa-cloud-download fa-2x"></i><span><span>HW</span> download</span></p>			
		</div>
 
        <div class="body-downloader">
        <div class="download">
                <?php 
                    
                $sql = "SELECT * FROM uploaded_files WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    if ($row = mysqli_fetch_assoc($result)) {
                ?>
                <a href="uploads/<?php echo $row['new_name']; ?>" download="<?php echo $row['name']; ?>" class="download_link"><?php echo $row['name']; ?></a>
                <?php
                    }
                }
                
                ?>
            </div>
            </div>

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
