<?php

    //$con=mysqli_connect('localhost', 'root', '','proiecttw');
    $con=mysqli_connect('localhost', 'root','', 'api_db');
    $fire=mysqli_query($con, "select id, lastname, firstname, email, rol from users WHERE rol='student' OR rol='teacher1' OR rol='teacher2' OR rol='teacher3'");
    $xml = new XMLWriter();
    $xml->openURI("php://output");
    $xml->startDocument();
    header('Content-type: text/xml');
    $xml->setIndent(true);
    $xml->startElement('users');
        while($row=mysqli_fetch_assoc($fire)){
            if($row['rol']='teacher1'){
                $rolul = "ProfesorBD";
            }
            else if($row['rol']='teacher2'){
                $rolul = "ProfesorRC";
            }
            else if($row['rol']='teacher3'){
                $rolul = "ProfesorTW";
            }
            else {
                $rolul = "Student";
            }
            $xml->startElement('user');
                $xml->startElement('id');
                $xml->writeRaw($row['id']);
                $xml->endElement();
                $xml->startElement('lastname');
                $xml->writeRaw($row['lastname']);
                $xml->endElement();
                $xml->startElement('firstname');
                $xml->writeRaw($row['firstname']);
                $xml->endElement();
                $xml->startElement('email');
                $xml->writeRaw($row['email']);
                $xml->endElement();
                $xml->startElement('rol');
                $xml->writeRaw($rolul);
                $xml->endElement();
            $xml->endElement(); 
        }
    $xml->endElement();
    $xml->flush();
?>