<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <table>
    <tr>
      <th>Nume</th>
      <th>Prenume</th>
      <th>NrMatricol</th>
      <th>AcceptTo</th>
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
    echo "<tr><td>". $row["id"] . "</td><td>" . $row["Nume"] ."</td><td>" . $row["Prenume"] . "</td><td>" . $row["Numar Matricol"] .
    "</td><td>" . $row["AcceptTo"] ;
  }
  echo "</table>";
}else {
  {
    echo "0 results";
  }
}
$conn-> close();
 ?>
  </table>

  </body>
</html>
