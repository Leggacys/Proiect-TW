<?php 
include "configDB.php";
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="toCSV.css">
</head>
<body>
        <div class="container">
        
        <form method='post' action='descarcaCatalogcsv.php'>
        <input type='submit' value='Export' name='Export'>
        
        <table>
            <tr>
            <th>id</th>
            <th>Prenume</th>
            <th>Nume</th>
            <th>Email</th>
            <th>T1</th>
            <th>T2</th>
            <th>T3</th>
            <th>Media</th>
            </tr>
            <?php 
            $query = "SELECT u.id AS id, u.lastname AS lastname, u.firstname AS firstname, u.email AS email, n.valoare AS test1, n.valoare2 AS test2, n.valoare3 AS test3, (n.valoare + n.valoare2 + n.valoare3)/3 AS media  FROM users u JOIN note n ON u.id=n.id_stud WHERE u.rol='0' ORDER BY lastname ASC ;";
            $result = mysqli_query($con,$query);
            $user_arr = array();
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $prenume = $row['firstname'];
                $nume = $row['lastname'];
                $email = $row['email'];
                $test1 = $row['test1'];
                $test2 = $row['test2'];
                $test3 = $row['test3'];
                $media = $row['media'];
                $user_arr[] = array($id,$prenume,$nume,$email,$test1,$test2,$test3,$media);
        ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $prenume; ?></td>
            <td><?php echo $nume; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $test1; ?></td>
            <td><?php echo $test2; ?></td>
            <td><?php echo $test3; ?></td>
            <td><?php echo $media; ?></td>
            </tr>
        <?php
            }
        ?>
        </table>
        <?php 
            $serialize_user_arr = serialize($user_arr);
        ?>
        <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
        </form>
        </div>
    </body>
</html>