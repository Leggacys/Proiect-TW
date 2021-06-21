


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
            <th>ID</th>
            <th>Prenume</th>
            <th>Nume</th>
            <th>Note</th>
            <th>Media</th>
            </tr>
            <?php
            
            include_once '../../api/config/database.php';
        include_once '../../api/objects/user.php';
        include_once '../../api/libs/jwt_params.php';
        include_once '../../api/objects/user.php';
        include_once '../../api/libs/php-jwt-master/src/BeforeValidException.php';
        include_once '../../api/libs/php-jwt-master/src/ExpiredException.php';
        include_once '../../api/libs/php-jwt-master/src/SignatureInvalidException.php';
        include_once '../../api/libs/php-jwt-master/src/JWT.php';
        use \Firebase\JWT\JWT;
        if(!isset($_COOKIE["jwt"])){
        //header("Location: http://localhost/testingWeb/html+php/index.php");
        echo "Comportament nepermis! Logati-va ca student ca sa puteti incarca documente.";
        return false;
        } 
        else {$jwt = $_COOKIE['jwt'];}
  
        //echo $jwt;

        try{    
          $jwt_decodificat = JWT::decode($jwt, JWT_KEY, array('HS256'));
          $rol = $jwt_decodificat->data->rol;
        if($rol == "student"){
          header("Location: http://localhost/testingWeb/html+php/Menu.php");
        }
        else if($rol == "admin"){
          header("Location: http://localhost/testingWeb/html+php/MenuAdmin.php");
        }
          //print_r($jwt_decodificat);
          //echo "\n\n\n\n";
          $id_utilizator = $jwt_decodificat->data->id;
          $nume = $jwt_decodificat->data->lastname;
          $prenume = $jwt_decodificat->data->firstname;
          $rol = $jwt_decodificat->data->rol;
          $mail = $jwt_decodificat->data->email;
          //echo $id_utilizator;
          //echo "Profesor ";
         // echo $nume . " ";
          //echo $prenume . " ";
          //echo "<br/> ";
          if($rol == "teacher1"){
            $materiecurs = 1;
          }
          else if($rol == "teacher2"){
               $materiecurs = 2;
          }
          else if($rol == "teacher3"){
               $materiecurs = 3;
          }
            
          }catch (Exception $e){
             echo json_encode(["message"=>$e->getMessage()]);
             exit();
         }
  
        
            $con = mysqli_connect("localhost", "root", "", "api_db");
            $query = "SELECT s.id_stud AS nr_matricol, s.nume AS nume, s.prenume AS prenume, (SELECT GROUP_CONCAT(valoare) as val FROM note n WHERE id_stud = nr_matricol and id_curs='$materiecurs') AS note, s.medie AS media FROM studenti s WHERE id_curs='$materiecurs' ORDER BY nr_matricol;";
            $result = mysqli_query($con,$query);
            $user_arr = array();
            while($row = mysqli_fetch_array($result)){
                $id = $row['nr_matricol'];
                $prenume = $row['nume'];
                $nume = $row['prenume'];
                $email = $row['note'];
                $test1 = $row['media'];
                $user_arr[] = array($id,$prenume,$nume,$email,$test1);
        ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $prenume; ?></td>
            <td><?php echo $nume; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $test1; ?></td>
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