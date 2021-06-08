
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php

$conn = mysqli_connect("localhost","root","","studenti");
if($conn-> connect_error){
  die("Connect failed");
}

$numarMatricol=$_GET['numarMatricol'];
$dataBase=$_GET['class'];
$nume=$_GET['nume'];
$prenume=$_GET['prenume'];

$query = "DELETE FROM studenti WHERE NumarMatricol ='$numarMatricol'";

$data=mysqli_query($conn,$query);
if($data)
{
  echo "Sters";
}else {
  echo "Eroare";
}
  $conn-> close();

  $conn = mysqli_connect("localhost","root","","$dataBase");
  if($conn-> connect_error){
    die("Connect failed");
  }
$queryInsert = "INSERT INTO $dataBase (Nume, Prenume, NumarMatricol, Nota1, Nota2, Nota3)
VALUES ('$nume', '$prenume', '$numarMatricol', '0','0','0')";

$data=mysqli_query($conn,$queryInsert);
if($data)
{
  echo "Reusit";
}else {
  echo "Eroare";
}
?>
