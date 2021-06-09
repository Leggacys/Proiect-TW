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
            </tr>
            <?php 
            $query = "SELECT id, firstname, lastname, email FROM users ORDER BY id asc";
            $result = mysqli_query($con,$query);
            $user_arr = array();
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $prenume = $row['firstname'];
                $nume = $row['lastname'];
                $email = $row['email'];
                $user_arr[] = array($id,$prenume,$nume,$email);
        ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $prenume; ?></td>
            <td><?php echo $nume; ?></td>
            <td><?php echo $email; ?></td>
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