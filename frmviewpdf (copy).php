<?php

include("../../configuration.php");
include("../../connection.php");
include("../../endec.php");

//Class For Pdf
//require('mysql_report.php');
require('mc_tableMP.php');

//Cek Get Data
if(isset($_POST['nmSQL'])){
  $txtSQL = $_POST['nmSQL'];
}else{
  $txtSQL = "";
}

$image1 = "img/logokmbs.jpg";
$xname = $_SESSION[$domainApp."_myname"];
$xgroup = $_SESSION[$domainApp."_mygroup"];
$imgMP = "img/No_Image_Available.jpg"; // this image is images.
class PDF extends PDF_MC_Table
{
  //Fungsi Untuk Membuat Header
  function Header()
  {
  global $image1,$xname,$xgroup,$brandApp,$getMpno,$getCustomer,$getOrderno,$getDatiss,$getDatpor,$getArticle,$getLast,$getColour,$getNoref,$getDd,$get33,$get33s,$get34,$get34s,$get35,$get35s,$get36,$get36s,$get37,$get37s,$get38,$get38s,$get39,$get39s,$get40,$get40s,$get41,$get41s,$get42,$get42s,$get43,$get43s,$get44,$getTotal,$imgMP;
  $this->SetLeftMargin(10);
  $this->SetFont("arial","B",8);
  $this->Cell(10.25, 7.5, $this->Image($image1, $this->GetX(), $this->GetY(), 10.25,7.5), 0, 0, 'L', false );
  $this->Cell(0,7.5,"PT KARYAMITRA BUDISENTOSA",'',0,'L');
  $this->ln(10);
  $this->SetFont("arial","B",9);
  $this->Cell(0,5,"MATERIAL PREPARATION",'',0,'C');
  $this->ln();
  // total width 190
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"Customer",'LBT',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getCustomer."",'RBT',0,'L');
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"Article",'LBT',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getArticle."",'RBT',0,'L');
  $this->ln();
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"Order NO",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getOrderno."",'RB',0,'L');
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"Last",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getLast."",'RB',0,'L');
  $this->ln();
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"MP No. & Brand",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getMpno." - ".$getCustomer."",'RB',0,'L');
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"Colour",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getColour."",'RB',0,'L');
  $this->ln();
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"Date Issued",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getDatiss."",'RB',0,'L');
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"NO REF",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getNoref."",'RB',0,'L');
  $this->ln();
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"PO Received",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getDatpor."",'RB',0,'L');
  $this->SetFont("arial","B",8);
  $this->Cell(27.5,4,"D / D",'LB',0,'L');
  $this->SetFont("arial","",8);
  $this->Cell(55.5,4,": ".$getDd."",'RB',0,'L');
  $this->SetXY(176,25);
  $this->Cell(24,20,$this->Image($imgMP, $this->GetX()+1, $this->GetY()+1, 22,18),"TB",0,'C');
  $this->ln();
  $this->Cell(9,4,"SIZE","LB",0,'C');
  $this->Cell(7.4,4,"33","LB",0,'C');
  $this->Cell(7.4,4,"33,5","LB",0,'C');
  $this->Cell(7.4,4,"34","LB",0,'C');
  $this->Cell(7.4,4,"34,5","LB",0,'C');
  $this->Cell(7.4,4,"35","LB",0,'C');
  $this->Cell(7.4,4,"35,5","LB",0,'C');
  $this->Cell(7.4,4,"36","LB",0,'C');
  $this->Cell(7.4,4,"36,5","LB",0,'C');
  $this->Cell(7.4,4,"37","LB",0,'C');
  $this->Cell(7.4,4,"37,5","LB",0,'C');
  $this->Cell(7.4,4,"38","LB",0,'C');
  $this->Cell(7.4,4,"38,5","LB",0,'C');
  $this->Cell(7.4,4,"39","LB",0,'C');
  $this->Cell(7.4,4,"39,5","LB",0,'C');
  $this->Cell(7.4,4,"40","LB",0,'C');
  $this->Cell(7.4,4,"40,5","LB",0,'C');
  $this->Cell(7.4,4,"41","LB",0,'C');
  $this->Cell(7.4,4,"41,5","LB",0,'C');
  $this->Cell(7.4,4,"42","LB",0,'C');
  $this->Cell(7.4,4,"42,5","LB",0,'C');
  $this->Cell(7.4,4,"43","LB",0,'C');
  $this->Cell(7.4,4,"43,5","LB",0,'C');
  $this->Cell(7.4,4,"44","LB",0,'C');
  $this->Cell(10.8,4,"TOTAL","RLB",0,'C');
  $this->ln();
  $this->Cell(9,4,"QTY","LB",0,'C');
  $this->Cell(7.4,4,$get33,"LB",0,'C');
  $this->Cell(7.4,4,$get33s,"LB",0,'C');
  $this->Cell(7.4,4,$get34,"LB",0,'C');
  $this->Cell(7.4,4,$get34s,"LB",0,'C');
  $this->Cell(7.4,4,$get35,"LB",0,'C');
  $this->Cell(7.4,4,$get35s,"LB",0,'C');
  $this->Cell(7.4,4,$get36,"LB",0,'C');
  $this->Cell(7.4,4,$get36s,"LB",0,'C');
  $this->Cell(7.4,4,$get37,"LB",0,'C');
  $this->Cell(7.4,4,$get37s,"LB",0,'C');
  $this->Cell(7.4,4,$get38,"LB",0,'C');
  $this->Cell(7.4,4,$get38s,"LB",0,'C');
  $this->Cell(7.4,4,$get39,"LB",0,'C');
  $this->Cell(7.4,4,$get39s,"LB",0,'C');
  $this->Cell(7.4,4,$get40,"LB",0,'C');
  $this->Cell(7.4,4,$get40s,"LB",0,'C');
  $this->Cell(7.4,4,$get41,"LB",0,'C');
  $this->Cell(7.4,4,$get41s,"LB",0,'C');
  $this->Cell(7.4,4,$get42,"LB",0,'C');
  $this->Cell(7.4,4,$get42s,"LB",0,'C');
  $this->Cell(7.4,4,$get43,"LB",0,'C');
  $this->Cell(7.4,4,$get43s,"LB",0,'C');
  $this->Cell(7.4,4,$get44,"LB",0,'C');
  $this->Cell(10.8,4,$getTotal,"RLB",0,'C');
  $this->ln();
  $this->Cell(190,4,"",0,0,'C');
  $this->ln();
  }

  function Footer()
  {
  global $xname,$xgroup,$brandAppvar;
  //Position at "n" cm from bottom
  $this->SetY(-14);
  //Page number
  $today = date("d/m/Y H:i:s");
  $this->SetFont('Arial','',6);
  $this->Cell(0,10,'Tgl Cetak : '.$today .' by '.$xname.' # '.$xgroup,0,0,'L');
  $this->Cell(0,10,'Halaman ke : '.$this->PageNo().'/{nb}',0,0,'R');
  }
}


$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->Open();
$result=mysql_query($txtSQL, $conn);
while ($data=mysql_fetch_array($result)) {
  $getMpno=$data['mpno'];
  $getCustomer = $data['nama'];
  $getOrderno =$data['noso'];
  $getDatiss = $data['dateiss'];
  $getDatpor = $data['datepor'];
  $getArticle = $data['article'];
  $getLast = $data['last'];
  $getColour = $data['colour'];
  $getNoref = $data['noso'];
  $getDd = $data['dd'];
  $get33 = $data['d33'];
  $get33s = $data['d33s'];
  $get34 = $data['d34'];
  $get34s = $data['d34s'];
  $get35 = $data['d35'];
  $get35s = $data['d35s'];
  $get36 = $data['d36'];
  $get36s = $data['d36s'];
  $get37 = $data['d37'];
  $get37s = $data['d37s'];
  $get38 = $data['d38'];
  $get38s = $data['d38s'];
  $get39 = $data['d39'];
  $get39s = $data['d39s'];
  $get40 = $data['d40'];
  $get40s = $data['d40s'];
  $get41 = $data['d41'];
  $get41s = $data['d41s'];
  $get42 = $data['d42'];
  $get42s = $data['d42s'];
  $get43 = $data['d43'];
  $get43s = $data['d43s'];
  $get44 = $data['d44'];
  $getTotal = round($data['tot'], 4);
  #------------------------  
  $getUser = $data['userby'];
  #set Rspecial and Rket as an array
  $getRspecial = explode("\n", $data['rspecial']);
  $getRket = explode("\n", $data['rket']);
  #_--------------------------------
  $Rspecial = $data['rspecial'];
  $Rket = $data['rket'];
  $pdf->AddPage();
  $pdf->garisluar();
  $pdf->headnya();
  //sql Pekerjaan 
  $sqlSubPkj = "
  SELECT b.ket
  FROM DBKMBS.clmpdet1 a
  INNER JOIN DBKMBS.kmmstpkj b
  ON a.pkj = b.pkj
  WHERE a.mpno = '$getMpno'
  ORDER BY a.nopkj
  ";

  $resultSubPkj = mysql_query($sqlSubPkj);
  $n=1;
  $row=1; #rows for looping material
  $bates=44; #gawe batese
  while ($dataSubPkj=mysql_fetch_array($resultSubPkj)) {
    $pdf->SetFont("Arial","B",8);
    $pdf->Cell(4,4,$n,"LB",0,'R');
    $pdf->Cell(186,4,$dataSubPkj['ket'],"LRB",0,"L");
    $pdf->ln();
    $sqlDetail="
    SELECT 
      b.ket,
      c.nmbrg,
      d.nmsupp,
      a.calc,
      a.qty,
      a.nstn
    FROM DBKMBS.clmpdet2 a
    INNER JOIN DBKMBS.kmmstsubpkj b
    ON a.subpkj = b.subpkj
    INNER JOIN DBKMBS.kmmstbhnbaku c
    ON a.materi = c.kdbrg
    INNER JOIN DBKMBS.kmmstsupp d
    ON a.sup = d.kdsupp
    WHERE a.mpno = '$getMpno' AND a.nopkj = '$n'
    ORDER BY a.nopkj, a.nosubpkj
    ";
    $resultDetail = mysql_query($sqlDetail);
    $sisa=1;
    while ($dataDetail=mysql_fetch_array($resultDetail)) {
      $pdf->SetFont("Arial","",6);
      #loop for new page
      if($row==$bates){
        $pdf->prepapp($getUser,'');
        $pdf->SetFont("Arial","",6);
        $pdf->AddPage();
        $pdf->garisluar();
        $pdf->headnya();
        #---------------------------------
      }elseif($row>$bates){
        $sisa++;
      }
      #-----------------
      $calc = round($dataDetail['calc'],4);
      $qty = round($dataDetail['qty'],4);
      $pdf->isine($dataDetail['ket'],$dataDetail['nmbrg'],$dataDetail['nmsupp'],$calc,$qty,$dataDetail['nstn']);
      $row++;
    }

    $n++;
  }
  if($row>$bates){
    #code here...
  }elseif($row<$bates+1){
    $pdf->prepapp($getUser,'');
    $pdf->AddPage();
    $pdf->garisluar();
  }
  $y = $pdf->GetY();
  $pdf->bawahe($Rspecial,$Rket, $y);
  $pdf->prepapp($getUser,'');
}

$pdf->Output("LaporanMP.pdf",'I');
mysql_close($conn);
?>
