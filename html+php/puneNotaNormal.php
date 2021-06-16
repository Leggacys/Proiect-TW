<?php

    $conn = mysqli_connect("localhost","root","","api_db");
    if($conn-> connect_error){
            die("Connect failed");
    }


     if(isset($_GET['id'])&&isset($_GET['idstudent'])&&isset($_GET['nota'])&&isset($_GET['curs'])){
        $nota = $_GET['nota'];
        $id_student = $_GET['idstudent'];
        $id_curs = $_GET['curs'];

        /* $sql1 = "SELECT count(id_stud) FROM note WHERE id_curs = '$id_curs'";
        $result1 = $conn -> query($sql1);
        echo "<script>alert('$result1')</script>"; */


        $querySelect1 = "SELECT count(id_stud) as counter1 FROM note WHERE id_curs = '$id_curs' AND id_stud = '$id_student';";
        $result1 = $conn -> query($querySelect1);
        $row1 = $result1 -> fetch_assoc();
        $nb_note=$row1['counter1'];

        $querySelect2 = "SELECT nr_note as counter2 FROM stabileste_note_cursuri WHERE id_curs = '$id_curs';";
        $result2 = $conn -> query($querySelect2);
        $row2 = $result2 -> fetch_assoc();
        $nb_note_max=$row2['counter2'];

        if($nb_note < $nb_note_max){
        $queryInsert = "INSERT INTO note (id_stud, id_curs, valoare) VALUES 
        ('$id_student', '$id_curs', '$nota')";

        $data=mysqli_query($conn,$queryInsert);
        echo $data;
        if($data)
        {
        //echo "Reusit";
        }else {
        echo "Eroare1";
        }
    }
    else{
        http_response_code(400);
    }
    } 

?>  