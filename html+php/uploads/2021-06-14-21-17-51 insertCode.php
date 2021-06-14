<?php

    $conn = mysqli_connect("localhost","root","","api_db");
    if($conn-> connect_error){
            die("Connect failed");
    }

    if(isset($_GET['id'])&&isset($_GET['cod'])&&isset($_GET['durata'])&&isset($_GET['saptamana'])){
        date_default_timezone_set("Europe/Chisinau");
        $time=date('H:i:s');
        $durata = $_GET['durata'];
        $idCurs = $_GET['id'];
        $cod = $_GET['cod'];
        $saptamana=$_GET['saptamana'];
        $sql = "INSERT INTO cursuri (cod_prezenta,insert_date,durata,Id_curs,nr_saptamana)
        VALUES ('$cod','$time','$durata','$idCurs','$saptamana')";
        $result = $conn -> query($sql);
        echo "test";
        echo "$saptamana";
    }

?>
