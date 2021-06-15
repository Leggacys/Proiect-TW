
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php

$conn = mysqli_connect("localhost","root","","api_db");
if($conn-> connect_error){
  die("Connect failed");
}

$id_stud=$_GET['id'];
$course = $_GET['curs'];


$querySelect = "SELECT distinct u.nume as firstname, u.prenume as lastname, u.id_curs as curs, u.an as an, u.semian as semian, u.grupa as grupa  FROM studentiAcceptare u WHERE id_stud='$id_stud';";

$result = $conn -> query($querySelect);
$row = $result -> fetch_assoc();

$nume=$row['lastname'];
$prenume=$row['firstname'];
$id_curs=$row['curs'];
$an=$row['an'];
$semian=$row['semian'];
$grupa=$row['grupa'];





 

$queryInsert = "INSERT INTO studenti (id_stud, nume, prenume, id_curs, an, semian, grupa) VALUES ('$id_stud', '$nume', '$prenume','$course','$an', '$semian', '$grupa')";

$data=mysqli_query($conn,$queryInsert);
echo $data;
if($data)
{
  //echo "Reusit";
}else {
  echo "Eroare1";
}


 $query = "DELETE FROM studentiacceptare WHERE id_stud ='$id_stud' AND id_curs='$course' ";

$data4=mysqli_query($conn,$query);
if($data4)
{
  echo "Sters";
}else {
  echo "Eroare4";
}

header("Refresh:0; url=http://localhost/testingWeb/html+php/Menu-prof-AcceptStudents.php");
?>
