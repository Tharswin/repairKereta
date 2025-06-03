<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<?php
require 'fpdf181/fpdf.php';
     class mypdf extends FPDF
      {
         function header()
           {
                          global $title;

                // Arial bold 15
                $this->SetFont('Arial','B',20);
                // Calculate width of title and position
                $w = $this->GetStringWidth($title)+6;
                $this->SetX((210-$w)/2);
                $this->SetTextColor(26,18,183);
                // Title
                $this->Cell($w,9,$title,0,0,'C');
                // Line break
                $this->Ln(14);
              
           }
            function Footer()
                {
                    // Position at 1.5 cm from bottom
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Page number
                    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
                }
      }
       
        $pdf = new mypdf('P','mm','A4');
        $title = 'KEDAI AUTO REPAIR KERETA';
        $pdf->SetTitle($title);
        $pdf->AliasNbpages();
        $pdf->Addpage();
        $pdf->Image('pic/piston.jpg',10,60);
        $pdf->Ln(3);
        $pdf->SetFont('Arial','',16);
        $pdf->SetTextColor(244,66,66);
        $pdf->Cell(40,6,'Barkod',1,0,'C'); 
        $pdf->Cell(40,6,'Nama Produk',1,0,'C'); 
        $pdf->Cell(40,6,'Harga',1,0,'C'); 
        $pdf->Cell(40,6,'Kuantiti',1,0,'C'); 
        $pdf->Cell(40,6,'Penerangan',1,0,'C');
        $pdf->Ln(1); 
        $pdf->SetFont('Arial','',12);
        $con = new PDO('mysql:host=localhost;dbname=spareparts','root','');
        $query = 'SELECT * FROM products';
        $parties = $con->prepare($query);
         $parties->execute();
         if($parties->rowCount()!=0)
            {
                while($row = $parties->fetch())
                     {
                                                 $pdf->Ln(6);
                         $pdf->Cell(40,6,$row['barcode'],1,0,'L');
                         $pdf->Cell(40,6,$row['name'],1,0,'L');
                         $pdf->Cell(40,6,$row['price'],1,0,'L');
                         $pdf->Cell(40,6,$row['qty'],1,0,'L');
                         $pdf->Cell(40,6,$row['description'],1,0,'L');
                        
                     }
            }   
        $pdf->Output(); 
                  
?>
  <?php 
}else {
   header("Location: login.php");
}
 ?>