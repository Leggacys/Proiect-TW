<?php


    function fetch_data(){
        $output = '';
        //$conn = mysqli_connect("localhost", "root", "", "api_db");
        $conn = mysqli_connect("localhost", "root", "", "proiecttw");
        $sql = "SELECT u.id AS id, u.lastname AS lastname, u.firstname AS firstname, u.email AS email, n.valoare AS test1, n.valoare2 AS test2, n.valoare3 AS test3, (n.valoare + n.valoare2 + n.valoare3)/3 AS media  FROM users u JOIN note n ORDER BY lastname ASC ;";
        $result = mysqli_query($conn, $sql);
    
        while($row = mysqli_fetch_array($result)){
            $output .= '<tr>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["lastname"].'</td>
                                <td>'.$row["firstname"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["test1"].'</td>
                                <td>'.$row["test2"].'</td>
                                <td>'.$row["test3"].'</td>
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
      <h3 align="center">Exporta lista de conturi din ClaMa</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
        <tr>  
            <th width="5%">ID</th>  
            <th width="20%">Nume</th>  
            <th width="25%">Prenume</th>  
            <th width="30%">email</th>
            <th width="5%">T1</th>
            <th width="5%">T2</th>
            <th width="5%">T3</th>
            <th width="5%">Media</th>
                 
        </tr>    
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Export PDF - ClaMa</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
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
                                <th width="30%">email</th>
                                <th width="5%">T1</th>
                                <th width="5%">T2</th>
                                <th width="5%">T3</th>
                                <th width="5%">Media</th>    
                          </tr>  
                     <?php  
                     echo fetch_data();  
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

?>