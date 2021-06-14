<?php

    $conn = mysqli_connect("localhost","root","","vechi_api_db");
    if($conn-> connect_error){
            die("Connect failed");
    }


    if(isset($_GET['id'])&&isset($_GET['idtema'])&&isset($_GET['nota'])){
        $nota = $_GET['nota'];
        $id_tema = $_GET['idtema'];
        $sql = "UPDATE uploaded_files SET nota=$nota WHERE id=$id_tema";
        $result = $conn -> query($sql);
    }

?>