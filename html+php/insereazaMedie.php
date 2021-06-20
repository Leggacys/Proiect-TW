<?php

    $conn = mysqli_connect("localhost","root","","api_db");
    if($conn-> connect_error){
            die("Connect failed");
    }


     if(isset($_GET['id'])&&isset($_GET['idstudent'])&&isset($_GET['nota'])){
        $nota = $_GET['nota'];
        $id_student = $_GET['idstudent'];
        $id_curs = $_GET['id'];

        $queryUpdate = "UPDATE studenti SET medie='$nota' WHERE id_stud = '$id_student' AND id_curs = '$id_curs';";
        $data=mysqli_query($conn,$queryUpdate);
        echo $data;
        if($data)
        {
        //echo "Reusit";
        }else {
        echo "Eroare1";
        }

        
    } 

?>  