<?php
 ob_start();
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

    function fetch_data($materiecurs){
        $output = '';
        $conn = mysqli_connect("localhost", "root", "", "api_db");
        //$conn = mysqli_connect("localhost", "root", "", "proiecttw");
        $sql = "SELECT s.id_stud AS nr_matricol, s.nume AS nume, s.prenume AS prenume, (SELECT GROUP_CONCAT(valoare) as val FROM note n WHERE id_stud = nr_matricol and id_curs='$materiecurs') AS note, s.medie AS media FROM studenti s WHERE s.id_curs='$materiecurs' ORDER BY nr_matricol;";
        $result = mysqli_query($conn, $sql);
    
        while($row = mysqli_fetch_array($result)){
            $output .= '<tr>
                                <td>'.$row["nr_matricol"].'</td>
                                <td>'.$row["nume"].'</td>
                                <td>'.$row["prenume"].'</td>
                                <td>'.$row["note"].'</td>
                                <td>'.$row["media"].'</td>
                        </tr>';
        }
        return $output;
    }

    if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Exportă lista de conturi din ClaMa");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '2', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Exporta lista de studenti din ClaMa</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
        <tr>  
            <th width="5%">ID</th>  
            <th width="20%">Nume</th>  
            <th width="25%">Prenume</th>  
            <th width="30%">Note</th>
            <th width="15%">Media</th>
                 
        </tr>    
      ';  
      $content .= fetch_data($materiecurs);  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);
      ob_end_clean();  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Export PDF - ClaMa</title>            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3>Exportă lista de persoane din Class Manager</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                                <th width="5%">ID</th>  
                                <th width="20%">Nume</th>  
                                <th width="25%">Prenume</th>  
                                <th width="30%">Note</th>
                                <th width="15%">Media</th>  
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
  
                    echo fetch_data($materiecurs);  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Creeaza PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>

