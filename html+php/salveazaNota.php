<?php

    $conn = mysqli_connect("localhost","root","","api_db");
    if($conn-> connect_error){
            die("Connect failed");
    }

    $conn2 = mysqli_connect("localhost","root","","api_db");
    if($conn2-> connect_error){
            die("Connect failed");
    }

    $conn3 = mysqli_connect("localhost","root","","api_db");
    if($conn3-> connect_error){
            die("Connect failed");
    }

    $conn4 = mysqli_connect("localhost","root","","api_db");
    if($conn3-> connect_error){
            die("Connect failed");
    }

    $conn5 = mysqli_connect("localhost","root","","api_db");
    if($conn3-> connect_error){
            die("Connect failed");
    }


    if(isset($_GET['id'])&&isset($_GET['idtema'])&&isset($_GET['nota'])){
        $nota = $_GET['nota'];
        $id_tema = $_GET['idtema'];
        

        
        $sql2 = "SELECT course, id_stud from uploaded_files WHERE id='$id_tema';";
        $result2 = $conn2 -> query($sql2);
        $row2 = $result2 -> fetch_assoc();
        $course = $row2['course'];
        $student_id = $row2['id_stud'];

        if($course == 'BD'){


            $querySelect11 = "SELECT count(id_stud) as counter1 FROM note WHERE id_curs = '1' AND id_stud = '$student_id';";
            $result11 = $conn3-> query($querySelect11);
            $row11 = $result11 -> fetch_assoc();
            $nb_note=$row11['counter1'];

            $querySelect22 = "SELECT nr_note as counter2 FROM stabileste_note_cursuri WHERE id_curs = '1';";
            $result22 = $conn3 -> query($querySelect22);
            $row22 = $result22 -> fetch_assoc();
            $nb_note_max=$row22['counter2'];

            if($nb_note < $nb_note_max){
                $queryInsert = "INSERT INTO note (id_stud, id_curs, valoare) VALUES 
                ('$student_id', '1', '$nota')";

                $data=mysqli_query($conn3,$queryInsert);
                echo $data;
                if($data)
                {
                    $sql = "UPDATE uploaded_files SET nota=$nota WHERE id=$id_tema";
                    $result = $conn -> query($sql);
                }else {
                echo "Eroare1";
                }

           }
           else{
            $sql = "UPDATE uploaded_files SET nota='-1' WHERE id=$id_tema";
            $result = $conn -> query($sql);
           }

        }


        else if($course == 'RC'){
            $querySelect11 = "SELECT count(id_stud) as counter1 FROM note WHERE id_curs = '2' AND id_stud = '$student_id';";
            $result11 = $conn4 -> query($querySelect11);
            $row11 = $result11 -> fetch_assoc();
            $nb_note=$row11['counter1'];

            $querySelect22 = "SELECT nr_note as counter2 FROM stabileste_note_cursuri WHERE id_curs = '2';";
            $result22 = $conn4 -> query($querySelect22);
            $row22 = $result22 -> fetch_assoc();
            $nb_note_max=$row22['counter2'];

            if($nb_note < $nb_note_max){
                $queryInsert = "INSERT INTO note (id_stud, id_curs, valoare) VALUES 
                ('$student_id', '2', '$nota')";

                $data=mysqli_query($conn4,$queryInsert);
                echo $data;
                if($data)
                {
                    $sql = "UPDATE uploaded_files SET nota=$nota WHERE id=$id_tema";
                    $result = $conn -> query($sql);
                }else {
                echo "Eroare1";
                }

           }

           else{
            $sql = "UPDATE uploaded_files SET nota='-1' WHERE id=$id_tema";
            $result = $conn -> query($sql);
           }

        
        }
        else if($course == 'TW'){
            $querySelect11 = "SELECT count(id_stud) as counter1 FROM note WHERE id_curs = '3' AND id_stud = '$student_id';";
            $result11 = $conn5 -> query($querySelect11);
            $row11 = $result11 -> fetch_assoc();
            $nb_note=$row11['counter1'];

            $querySelect22 = "SELECT nr_note as counter2 FROM stabileste_note_cursuri WHERE id_curs = '3';";
            $result22 = $conn5 -> query($querySelect22);
            $row22 = $result22 -> fetch_assoc();
            $nb_note_max=$row22['counter2'];

            if($nb_note < $nb_note_max){
                $queryInsert = "INSERT INTO note (id_stud, id_curs, valoare) VALUES 
                ('$student_id', '3', '$nota')";

                $data=mysqli_query($conn5,$queryInsert);
                echo $data;
                if($data)
                {
                    $sql = "UPDATE uploaded_files SET nota=$nota WHERE id=$id_tema";
                    $result = $conn -> query($sql);
                }else {
                echo "Eroare1";
                }

           }

           else{
            $sql = "UPDATE uploaded_files SET nota='-1' WHERE id=$id_tema";
            $result = $conn -> query($sql);
           }
        }

    }

?>  