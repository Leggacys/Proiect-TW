<?php

$xml = simplexml_load_file("dbxml.php.xml");

if($xml){
    include_once("db_lib.php");
    foreach($xml as $user){

        echo "<p>Se adauga in tabel: ".$user->id;
        echo ",".$user->lastname;
        echo ",".$user->firstname;
        echo ",".$user->email;
        echo ",".$user->rol."...</p>";

        record_users($user->id,$user->lastname, $user->firstname,$user->email,$user->rol); 

    }

    


    /* echo "---------------------------";
    print_r($xml); */
}

?>