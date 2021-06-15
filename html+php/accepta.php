
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

$numarMatricol=$_GET['id'];




$queryInsert = "INSERT INTO note (id_stud, id_curs, valoare, valoare2, valoare3) VALUES ('$numarMatricol', '1', '0','0','0')";

$data=mysqli_query($conn,$queryInsert);
echo $data;
if($data)
{
  //echo "Reusit";
}else {
  echo "Eroare1";
}

$queryInsert2 = "INSERT INTO note (id_stud, id_curs, valoare, valoare2, valoare3)
VALUES ('$numarMatricol', '2', '0','0','0')";

$data2=mysqli_query($conn,$queryInsert2);
if($data2)
{
  //echo "Reusit";
}else {
  echo "Eroare2";
}



$queryInsert3 = "INSERT INTO note (id_stud, id_curs, valoare, valoare2, valoare3)
VALUES ('$numarMatricol', '3', '0','0','0')";

$data3=mysqli_query($conn,$queryInsert3);
if($data3)
{
  //echo "Reusit";
}else {
  echo "Eroare3";
}

 $query = "DELETE FROM users2 WHERE id ='$numarMatricol'";

$data4=mysqli_query($conn,$query);
if($data4)
{
  echo "Sters";
}else {
  echo "Eroare4";
}

header("Refresh:0; url=http://localhost/testingWeb/html+php/Menu-prof-AcceptStudents.php");
?>
