<?php

    $db_msg="";

    function connect_db(){
        $hostname = "localhost";
        $username = "root";
        $password = "";

        try{
            $db = new PDO("mysql:host=localhost;dbname=api_db", 'root', '');      
        }catch(PDOException $e){
            $db = -1;
            $db_msg = "Error at connecting to DB".$e->getMessage();
        } 
        return $db;
    }

    function record_users($uid, $ulastname, $ufirstname, $uemail, $urol){
            $db = connect_db();
            if($db){
                $sql = "INSERT INTO users (id, lastname, firstname, email, rol) VALUES (\"$uid\", \"$ulastname\", \"$ufirstname\", \"$uemail\", \"$urol\");";

                try{
                    echo "<p>".$sql."</p>";
                    $r = $db->query($sql);
                }catch(PDOException $ex){
                    echo "Eroare la scrierea in BD:\n".$ex->getMessage();
                }
            }


    }


?>