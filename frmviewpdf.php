<?php

include("../../configuration.php");
include("../../connection.php");
include("../../endec.php");

//Class For Pdf
require('mc_table.php');

//Cek Get Data
if(isset($_POST['nmSQL'])){
  $txtSQL = $_POST['nmSQL'];
}else{
  $txtSQL = "";
}

$xname = $_SESSION[$domainApp."_myname"];
$xgroup = $_SESSION[$domainApp."_mygroup"];

class PDF extends PDF_MC_Table
 {
   //Fungsi Untuk Membuat Header
 function Header()
 {
  global $xname,$xgroup,$brandApp,$customer,$article,$orderno,$last,$mpno,$cust,$colour,$dateiss,$datepor,$dd,$total,$d33,$d34,$d35,$d36,$d37,$d38,$d39,$d40,$d41,$d42,$d43,$d44,$d33s,$d34s,$d35s,$d36s,$d37s,$d38s,$d39s,$d40s,$d41s,$d42s,$d43s,$rspecial,$rket,$rrevisi;

  $this->SetLeftMargin(10);
  $this->SetFont("arial","B",7);
  $this->Cell(0,5,"PT. KARYAMITRA BUDISENTOSA",'',0,'C');
  $this->ln();
  $this->SetFont("arial","B",6);
  $this->Cell(50,5,"REVISI : ".$rrevisi."",'',0,'L');
  $this->Cell(90,5,"MATERIAL PREPARATION",'',0,'C');
  $this->Cell(10,5,"Printed : ",'',0,'L');
  date_default_timezone_set("Asia/Jakarta");
  $today = date("d/m/Y H:i:s");
  $this->Cell(40,5,$today.'  Page : '.$this->PageNo().' of {nb}','',0,'L');
  $this->ln();

  $this->SetFont("arial","B",5);
  $this->Cell(20,4,"Customer",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$customer,'RBT',0,'L');
  $this->Cell(20,4,"Article",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$article,'RBT',0,'L');
  // $url = "gambar/".$cust."-".$article.".jpg";
  if (file_exists("gambar/".$cust."-".$article.".jpg")) {
    $url = "gambar/".$cust."-".$article.".jpg";
  }
  else{
    $url = "gambar/No_Image_Available.jpg";
  }
  $this->Cell(25,4,$this->Image($url, $this->GetX() + 1.5, $this->GetY() + 0.5, 22,19),'RT',0,'L');

  
  // $this->Cell(25, 4, , 0, 0, 'L', false );
  $this->ln();
  $this->SetFont("arial","B",5);
  $this->Cell(20,4,"Order No",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$orderno,'RBT',0,'L');
  $this->Cell(20,4,"Last",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$last,'RBT',0,'L');
  $this->Cell(25,4,'','R',0,'L');
  $this->ln();
  $this->SetFont("arial","B",5);
  $this->Cell(20,4,"MP No. & Brand",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$mpno.' - '.$cust,'RBT',0,'L');
  $this->Cell(20,4,"Colour",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$colour,'RBT',0,'L');
  $this->Cell(25,4,'','R',0,'L');
  $this->ln();
  $this->SetFont("arial","B",5);
  $this->Cell(20,4,"Date Issued",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$dateiss,'RBT',0,'L');
  $this->Cell(20,4,"NO REF",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$article,'RBT',0,'L');
  $this->Cell(25,4,'','R',0,'L');
  $this->ln();
  $this->SetFont("arial","B",5);
  $this->Cell(20,4,"PO Received",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$datepor,'RBT',0,'L');
  $this->Cell(20,4,"D / D",'LBT',0,'L');
  $this->Cell(5,4,":",'BT',0,'C');
  $this->Cell(57.5,4,$dd,'RBT',0,'L');
  $this->Cell(25,4,'','RB',0,'L');
  $this->ln();


  $this->SetFont("arial","B",5);
  $this->Cell(14.5,4,"SIZE",'RLBT',0,'C');
  $this->Cell(7,4,"33",'RLBT',0,'C');
  $this->Cell(7,4,"33,5",'RLBT',0,'C');
  $this->Cell(7,4,"34",'RLBT',0,'C');
  $this->Cell(7,4,"34,5",'RLBT',0,'C');
  $this->Cell(7,4,"35",'RLBT',0,'C');
  $this->Cell(7,4,"35,5",'RLBT',0,'C');
  $this->Cell(7,4,"36",'RLBT',0,'C');
  $this->Cell(7,4,"36,5",'RLBT',0,'C');
  $this->Cell(7,4,"37",'RLBT',0,'C');
  $this->Cell(7,4,"37,5",'RLBT',0,'C');
  $this->Cell(7,4,"38",'RLBT',0,'C');
  $this->Cell(7,4,"38,5",'RLBT',0,'C');
  $this->Cell(7,4,"39",'RLBT',0,'C');
  $this->Cell(7,4,"39,5",'RLBT',0,'C');
  $this->Cell(7,4,"40",'RLBT',0,'C');
  $this->Cell(7,4,"40,5",'RLBT',0,'C');
  $this->Cell(7,4,"41",'RLBT',0,'C');
  $this->Cell(7,4,"41,5",'RLBT',0,'C');
  $this->Cell(7,4,"42",'RLBT',0,'C');
  $this->Cell(7,4,"42,5",'RLBT',0,'C');
  $this->Cell(7,4,"43",'RLBT',0,'C');
  $this->Cell(7,4,"43,5",'RLBT',0,'C');
  $this->Cell(7,4,"44",'RLBT',0,'C');
  $this->Cell(14.5,4,"TOTAL",'RLBT',0,'C');
  $this->ln();

  $this->SetFont("arial","B",5);
  $this->Cell(14.5,4,"QTY",'RLBT',0,'C');
  $this->Cell(7,4,$d33,'RLBT',0,'C');
  $this->Cell(7,4,$d33s,'RLBT',0,'C');
  $this->Cell(7,4,$d34,'RLBT',0,'C');
  $this->Cell(7,4,$d34s,'RLBT',0,'C');
  $this->Cell(7,4,$d35,'RLBT',0,'C');
  $this->Cell(7,4,$d35s,'RLBT',0,'C');
  $this->Cell(7,4,$d36,'RLBT',0,'C');
  $this->Cell(7,4,$d36s,'RLBT',0,'C');
  $this->Cell(7,4,$d37,'RLBT',0,'C');
  $this->Cell(7,4,$d37s,'RLBT',0,'C');
  $this->Cell(7,4,$d38,'RLBT',0,'C');
  $this->Cell(7,4,$d38s,'RLBT',0,'C');
  $this->Cell(7,4,$d39,'RLBT',0,'C');
  $this->Cell(7,4,$d39s,'RLBT',0,'C');
  $this->Cell(7,4,$d40,'RLBT',0,'C');
  $this->Cell(7,4,$d40s,'RLBT',0,'C');
  $this->Cell(7,4,$d41,'RLBT',0,'C');
  $this->Cell(7,4,$d41s,'RLBT',0,'C');
  $this->Cell(7,4,$d42,'RLBT',0,'C');
  $this->Cell(7,4,$d42s,'RLBT',0,'C');
  $this->Cell(7,4,$d43,'RLBT',0,'C');
  $this->Cell(7,4,$d43s,'RLBT',0,'C');
  $this->Cell(7,4,$d44,'RLBT',0,'C');
  $this->Cell(14.5,4,$total,'RLBT',0,'C');
  $this->ln();

  $this->SetFont("arial","B",5);
  $this->Cell(10,4,"No",'RLBT',0,'C');
  $this->Cell(25,4,"Shoe Parts",'RLBT',0,'C');
  $this->Cell(65,4,"Material Description",'RLBT',0,'C');
  $this->Cell(40,4,"Supplier",'RLBT',0,'C');
  $this->Cell(20,4,"Calc",'RLBT',0,'C');
  $this->Cell(20,4,"Qty",'RLBT',0,'C');
  $this->Cell(10,4,"Unit",'RLBT',0,'C');
  $this->ln();
 }

  function Footer()
 {
  global $xname,$xgroup,$brandApp;
 //Position at "n" cm from bottom
 // $this->SetY(-55);
 // //Arial italic 8
 // $this->SetFont('Arial','U',6);
 // $this->Cell(25,5,'Special Instruction : ','LT',0,'L');
 // $this->Cell(165,5,'','RT',0,'L');
 // $this->ln();
 // $this->Cell(25,25,'','LB',0,'L');
 // $this->Cell(165,25,'','RB',0,'L');
 // $this->ln();
 // $this->SetFont('Arial','U',6);
 // $this->Cell(30,5,'Prepared By','RLT',0,'C');
 // $this->Cell(30,5,'Approved By','RLT',0,'C');
 // $this->Cell(130,5,'Keterangan :','RLT',0,'L');
 // $this->ln();
 // $this->Cell(30,10,'','RLB',0,'C');
 // $this->Cell(30,10,'','RLB',0,'C');
 // $this->Cell(130,10,'','RLB',0,'L');
 //Page number
// $this->Cell(0,10,'FM-MCH-008 - 4 Januari 13-01','',0,'L');
 // $this->SetFont('Arial','',6);
 // $today = date("d/m/Y H:i:s");
 // $this->Cell(0,10,'Tgl Cetak : '.$today .' by '.$xname.' # '.$xgroup,0,0,'L');
 // $this->Cell(0,10,'Halaman ke : '.$this->PageNo().'/{nb}',0,0,'R');
 }

 function GetMultiCellHeight($w, $h, $txt, $border=null, $align='J') {
  // Calculate MultiCell with automatic or explicit line breaks height
  // $border is un-used, but I kept it in the parameters to keep the call
  //   to this function consistent with MultiCell()
  $cw = &$this->CurrentFont['cw'];
  if($w==0)
    $w = $this->w-$this->rMargin-$this->x;
  $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
  $s = str_replace("\r",'',$txt);
  $nb = strlen($s);
  if($nb>0 && $s[$nb-1]=="\n")
    $nb--;
  $sep = -1;
  $i = 0;
  $j = 0;
  $l = 0;
  $ns = 0;
  $height = 0;
  while($i<$nb)
  {
    // Get next character
    $c = $s[$i];
    if($c=="\n")
    {
      // Explicit line break
      if($this->ws>0)
      {
        $this->ws = 0;
        $this->_out('0 Tw');
      }
      //Increase Height
      $height += $h;
      $i++;
      $sep = -1;
      $j = $i;
      $l = 0;
      $ns = 0;
      continue;
    }
    if($c==' ')
    {
      $sep = $i;
      $ls = $l;
      $ns++;
    }
    $l += $cw[$c];
    if($l>$wmax)
    {
      // Automatic line break
      if($sep==-1)
      {
        if($i==$j)
          $i++;
        if($this->ws>0)
        {
          $this->ws = 0;
          $this->_out('0 Tw');
        }
        //Increase Height
        $height += $h;
      }
      else
      {
        if($align=='J')
        {
          $this->ws = ($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
          $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
        }
        //Increase Height
        $height += $h;
        $i = $sep+1;
      }
      $sep = -1;
      $j = $i;
      $l = 0;
      $ns = 0;
    }
    else
      $i++;
  }
  // Last chunk
  if($this->ws>0)
  {
    $this->ws = 0;
    $this->_out('0 Tw');
  }
  //Increase Height
  $height += $h;

  return $height;
}

 }

 $pdf=new PDF('P','mm','A4');
 $pdf->AliasNbPages();
 $pdf->Open();


 $result = mysql_query($txtSQL,$conn);

 while ($data = mysql_fetch_array($result)){
  $customer  = trim($data['nama']);
  $article = trim($data['article']);
  $orderno = trim($data['noso']);
  $last = trim($data['last']);
  $mpno = trim($data['mpno']);
  $cust = trim($data['cust']);
  $colour = trim($data['colour']);
  $dateiss = trim($data['dateiss']);
  $datepor = trim($data['datepor']);
  $dd = trim($data['dd']);
  $total = trim($data['tot']);

  $d33 = $data['d33'];
  $d34 = $data['d34'];
  $d35 = $data['d35'];
  $d36 = $data['d36'];
  $d37 = $data['d37'];
  $d38 = $data['d38'];
  $d39 = $data['d39'];
  $d40 = $data['d40'];
  $d41 = $data['d41'];
  $d42 = $data['d42'];
  $d43 = $data['d43'];
  $d44 = $data['d44'];

  $d33s = $data['d33s'];
  $d34s = $data['d34s'];
  $d35s = $data['d35s'];
  $d36s = $data['d36s'];
  $d37s = $data['d37s'];
  $d38s = $data['d38s'];
  $d39s = $data['d39s'];
  $d40s = $data['d40s'];
  $d41s = $data['d41s'];
  $d42s = $data['d42s'];
  $d43s = $data['d43s'];
  // $d44s = $data['d44s'];

  $rspecial = $data['rspecial'];
  $rket = $data['rket'];
  $rrevisi  = $data['rrevisi'];


 $pdf->AddPage();
 // $pdf->SetAutoPageBreak('auto','50');
 $pdf->SetLeftMargin(10);

 $sql2 = "SELECT b.ket
          FROM clmpdet1 a
          JOIN kmmstpkj b ON a.pkj = b.pkj
          WHERE a.mpno = '".$mpno."'
          ORDER BY a.nopkj";
 $result2 = mysql_query($sql2);
 $row = 0;

 while ($data2 = mysql_fetch_array($result2)) {
  $row++;
  $pdf->SetFont('Arial','B','5');
 $pdf->Cell(0,5,
  'No. MP : '.$mpno.'                                       
  Cust : '.$cust.'                                        
  Art : '.$article.'                                        
  Col. : '.$colour.'                                        
  Tot. Order : '.$total.''
  , 'RLBT', 1, 'L');

  $pdf->Cell(10, 5, $row, 1, 'RLTB','C', false);
  $pdf->Cell(180,5,$data2["ket"],'RLTB',1,'L');

  $sql3 = "SELECT 
          b.ket,
          c.nmbrg,
          d.nmsupp,
          a.calc,
          a.qty,
          a.nstn
          FROM clmpdet2 a
          LEFT JOIN kmmstsubpkj b
          ON a.subpkj = b.subpkj
          LEFT JOIN kmmstbhnbaku c
          ON a.materi = c.kdbrg
          LEFT JOIN kmmstsupp d
          ON a.sup = d.kdsupp
          WHERE a.mpno = '".$mpno."' AND a.nopkj = '".$row."'
          ORDER BY a.nopkj, a.nosubpkj";

  $result3 = mysql_query($sql3);
  while ($data3 = mysql_fetch_array($result3)) {
    $pdf->SetFont('Arial','','5');
    $pdf->Cell(10, 5,'', 1, 'RLTB','C', false);
    $pdf->Cell(25, 5, $data3["ket"], 1, 'RLTB','L', false);
    $pdf->Cell(65, 5, $data3["nmbrg"], 1, 'RLTB','L', false);
    $pdf->Cell(40, 5, $data3["nmsupp"], 1, 'RLTB','L', false);
    $pdf->Cell(20, 5, $data3["calc"], 1, 'RLTB','L', false);
    $pdf->Cell(20, 5, $data3["qty"], 1, 'RLTB','L', false);
    $pdf->Cell(10, 5, $data3["nstn"], 1, 'RLTB','L');

    // $x = $pdf->GetX();
    // $y = $pdf->GetY();
    // $pdf->MultiCell(25, 5, $data3["ket"], 1,'L');
    // $pdf->SetXY($x + 25, $y);
    // $pdf->MultiCell(65, 5, $data3["nmbrg"], 1,'L');
    // $pdf->SetXY($x + 90, $y);
    // $pdf->MultiCell(40, 5, $data3["nmsupp"], 1,'L');
    // $pdf->SetXY($x + 130, $y);
    // $pdf->MultiCell(20, 5, $data3["calc"], 1,'L');
    // $pdf->SetXY($x + 150, $y);
    // $pdf->MultiCell(20, 5, $data3["qty"], 1,'L');
    // $pdf->SetXY($x + 170, $y);
    // $pdf->MultiCell(10, 5, $data3["nstn"], 1,'L');
    
    $pdf->Ln();
  }
 }


 
  // if ($dataRow < $countRow) {
  //   // $pdf->AddPage();
  // }

 // $dataRow++;
$h = $pdf->GetMultiCellHeight(170, 4, $rspecial);
$h1 = $pdf->GetMultiCellHeight(170, 4, $rket);

$pdf->SetFont("arial","BU",5);
$pdf->Cell(20,$h,"Special Instruction",'LBT',0,'L');
$pdf->SetFont("arial","",5);
$pdf->MultiCell(170,4,$rspecial,1,'L');
$pdf->SetFont("arial","BU",5);
$pdf->Cell(20,$h1,"Keterangan",'LBT',0,'L');
$pdf->SetFont("arial","",5);
$pdf->MultiCell(170,4,$rket,1,'L');
$pdf->Ln(10);
// $pdf->Cell(130, 5, false);
// $pdf->Cell(30, 5, false);
// $pdf->Cell(30, 5, false);
// $pdf->Ln();
// $pdf->Cell(130, 5, false);
// $pdf->Cell(30, 20,'', 1, '','C', false);
// $pdf->Cell(30, 20,'', 1, '','C', false);

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 130, $y);
$y1 = $pdf->GetY();
$pdf->MultiCell(30,20,'',1,'L');
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Text($x + 133,$y -17,'Prepared By');
$pdf->SetXY($x + 160, $y - 20);
$pdf->MultiCell(30,20,$pdf->Text($x+163,$y-17,'Approved By'),1,'L');
$pdf->Cell(130, 5, false);
$pdf->Cell(30, 5,$_SESSION[$domainApp."_myname"], 1, 'RLB','C', false);
$pdf->Cell(30, 5,'Winarni', 1, 'RLB','C', false);
$pdf->Ln();
}



$pdf->Output("laporan MP.pdf",'I');
?>