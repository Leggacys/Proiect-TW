<?php

    $con=mysqli_connect('localhost', 'root', '','proiecttw');
    //$con=mysqli_connect('localhost', 'root', 'api_db');
    $fire=mysqli_query($con, "select id, lastname, firstname, email from users");
    $xml = new XMLWriter();
    $xml->openURI("php://output");
    $xml->startDocument();
    header('Content-type: text/xml');
    $xml->setIndent(true);
    $xml->startElement('users');
        while($row=mysqli_fetch_assoc($fire)){
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
            $xml->endElement(); 
        }
    $xml->endElement();
    $xml->flush();
?>