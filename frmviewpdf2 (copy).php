<?php

include("../../configuration.php");
include("../../connection.php");
include("../../endec.php");

//Class For Pdf
require('../../mpdf/mpdf.php');

//Cek Get Data
if(isset($_POST['nmSQL'])){
  $txtSQL = $_POST['nmSQL'];
}else{
  $txtSQL = "";
}

$xname = $_SESSION[$domainApp."_myname"];
$xgroup = $_SESSION[$domainApp."_mygroup"];
date_default_timezone_set("Asia/Bangkok");
$today = date("d/m/Y H:i:s");

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

  if (file_exists('gambar/'.$cust.'-'.$article.'.jpg')) {
    $url = 'gambar/'.$cust.'-'.$article.'.jpg';
  }
  else{
    $url = 'gambar/No_Image_Available.jpg';
  }
}

$header = "
          <table width='100%'>
            <tr>
              <td style='text-align:center;' colspan='3'>
              <b>PT KARYAMITRA BUDISENTOSA</b>
              </td>
            </tr>
            <tr>
              <td style='text-align:left;' width='25%'>Revisi : ".$rrevisi."</td>
              <td style='text-align:center;' width='50%'><b>MATERIAL PREPARATION</b><td/>
              <td style='text-align:right;' width='25%'></td>
            <tr/>
          </table>
          <table width='100%' class='table'>
            <tbody>
              <tr>
                <td align='' style='text-align: left;' width='15%' colspan=''>Customer</td>
                <td align='' width='1%' colspan=''>:</td>
                <td align='' style='text-align: left;' width='24%' colspan='10'>".$customer."</td>
                <td align='' style='text-align: left;' width='15%' colspan=''>Article</td>
                <td align='' width='1%' colspan=''>:</td>
                <td align='' style='text-align: left;' width='24%' colspan='10'>".$article."</td>
                <td align='center' style='text-align: center;' width='20%' rowspan='5' colspan='2'>
                    <img src='".$url."' style='width: 90px; height: 90px;'>
                </td>
              </tr>
              <tr>
                  <td align='' style='text-align: left;' width='15%' colspan=''>Order No</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$orderno."</td>
                  <td align='' style='text-align: left;' width='15%' colspan=''>Last</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$last."</td>
              </tr>
              <tr>
                  <td align='' style='text-align: left;' width='15%' colspan=''>MP No & Brand</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$mpno." - ".$cust."</td>
                  <td align='' style='text-align: left;' width='15%' colspan=''>Colour</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$colour."</td>
              </tr>
              <tr>
                  <td align='' style='text-align: left;' width='15%' colspan=''>Date Issued</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$dateiss."</td>
                  <td align='' style='text-align: left;' width='15%' colspan=''>No Ref</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$article."</td>
              </tr>
              <tr>
                  <td align='' style='text-align: left;' width='15%' colspan=''>PO Received</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$datepor."</td>
                  <td align='' style='text-align: left;' width='15%' colspan=''>D / D</td>
                  <td align='' width='1%' colspan=''>:</td>
                  <td align='' style='text-align: left;' width='24%' colspan='10'>".$dd."</td>
              </tr>
            </tbody>
          </table>
          <table width='100%' class='table'>
              <tr bgcolor='lightgray'>
                <td align='' width='3%'>SIZE</td>
                <td align='center' width='3%'>33</td>
                <td align='center' width='3%'>33.5</td>
                <td align='center' width='3%'>34</td>
                <td align='center' width='3%'>34.5</td>
                <td align='center' width='3%'>35</td>
                <td align='center' width='3%'>35.5</td>
                <td align='center' width='3%'>36</td>
                <td align='center' width='3%'>36.5</td>
                <td align='center' width='3%'>37</td>
                <td align='center' width='3%'>37.5</td>
                <td align='center' width='3%'>38</td>
                <td align='center' width='3%'>38.5</td>
                <td align='center' width='3%'>39</td>
                <td align='center' width='3%'>39.5</td>
                <td align='center' width='3%'>40</td>
                <td align='center' width='3%'>40.5</td>
                <td align='center' width='3%'>41</td>
                <td align='center' width='3%'>41.5</td>
                <td align='center' width='3%'>42</td>
                <td align='center' width='3%'>42.5</td>
                <td align='center' width='3%'>43</td>
                <td align='center' width='3%'>43.5</td>
                <td align='center' width='3%'>44</td>
                <td align='center' width='3%'>TOTAL</td>
              </tr>
              <tr>
                <td align='' width='3%'>QTY</td>
                <td align='center' width='3%'>".$d33."</td>
                <td align='center' width='3%'>".$d33s."</td>
                <td align='center' width='3%'>".$d34."</td>
                <td align='center' width='3%'>".$d34s."</td>
                <td align='center' width='3%'>".$d35."</td>
                <td align='center' width='3%'>".$d35s."</td>
                <td align='center' width='3%'>".$d36."</td>
                <td align='center' width='3%'>".$d36s."</td>
                <td align='center' width='3%'>".$d37."</td>
                <td align='center' width='3%'>".$d37s."</td>
                <td align='center' width='3%'>".$d38."</td>
                <td align='center' width='3%'>".$d38s."</td>
                <td align='center' width='3%'>".$d39."</td>
                <td align='center' width='3%'>".$d39s."</td>
                <td align='center' width='3%'>".$d40."</td>
                <td align='center' width='3%'>".$d40s."</td>
                <td align='center' width='3%'>".$d41."</td>
                <td align='center' width='3%'>".$d41s."</td>
                <td align='center' width='3%'>".$d42."</td>
                <td align='center' width='3%'>".$d42s."</td>
                <td align='center' width='3%'>".$d43."</td>
                <td align='center' width='3%'>".$d43s."</td>
                <td align='center' width='3%'>".$d44."</td>
                <td align='center' width='3%'>".$total."</td>
              </tr>
          </table>
          <table width='100%' class='table'>
            <thead>
              <tr bgcolor='lightgray'>
                <td align='center' width='4%'><b>No</b></td>
                <td align='center' width='15%'><b>Shoe Parts</b></td>
                <td align='center' width='35%'><b>Material Description</b></td>
                <td align='center' width='20%'><b>Supplier</b></td>
                <td align='center' width='9%'><b>Calc</b></td>
                <td align='center' width='9%'><b>Qty</b></td>
                <td align='center' width='5%'><b>Unit</b></td>
              </tr>
            </thead>
          </table>
          ";

$sql_2 = "SELECT (select b.ket from kmmstpkj b where b.pkj = a.pkj) as ket
          FROM clmpdet1 a
          WHERE a.mpno = '".$mpno."'
          ORDER BY a.nopkj";
$result_2 = mysql_query($sql_2,$conn);
$row_2 = 0;

while($data_2 = mysql_fetch_array($result_2)){
  $row_2++;

$content .=  "
            <table width='100%' class='table'>
              <tr bgcolor='lightgray'>
                <td align='center' width='19%'><b>No MP : ".$mpno."</b></td>
                <td align='center' width='20%'><b>Cust : ".$customer."</b></td>
                <td align='center' width='20%'><b>Art : ".$article."</b></td>
                <td align='center' width='20%'><b>Col : ".$colour."</b></td>
                <td align='center' width='20%'><b>Tot. Order : ".$total."</b></td>
              </tr>
            </table>
            <table width='100%' class='table'>
              <tr>
                <td align='center' width='4%'><b>".$row_2."</b></td>
                <td align='left' style='text-align: left;' width='95%' colspan='6'><b>".$data_2['ket']."</b></td>
              </tr>
            </table>
            <table width='100%' class='table'>
          ";

  $sql_3 = "SELECT 
            a.calc,
            a.qty,
            a.nstn,
            (select b.ket from kmmstsubpkj b where b.subpkj = a.subpkj) as ket,
            (select c.nmbrg from kmmstbhnbaku c where c.kdbrg = a.materi) as nmbrg,
            (select d.nmsupp from kmmstsupp d where d.kdsupp = a.sup) as nmsupp
            FROM clmpdet2 a
            WHERE a.mpno = '".$mpno."' AND a.nopkj = '".$row_2."'
            ORDER BY a.nopkj, a.nosubpkj";
  $result_3 = mysql_query($sql_3,$conn);
  $count_3 = mysql_num_rows($result_3);
  if ($count_3 > 0) {
    while ($data_3 = mysql_fetch_array($result_3)) {
      $content .= "
                  <tr>
                    <td align='' width='4%' ></td>
                    <td align='' width='15%' style='text-align: left;'>".strtoupper($data_3['ket'])."</td>
                    <td align='' width='35%' style='text-align: left;'>".$data_3['nmbrg']."</td>
                    <td align='' width='20%' style='text-align: left;'>".$data_3['nmsupp']."</td>
                    <td align='right' width='9%' >".$data_3['calc']."</td>
                    <td align='right' width='9%' >".$data_3['qty']."</td>
                    <td align='' width='5%' >".$data_3['nstn']."</td>
                  </tr>
                  ";
    }
  }
  else{
    $content .= "
                <tr>
                  <td colspan='6'>&nbsp;</td>
                </tr>
                ";
  }
  
  $content .="</table>";   
}

//$mpdf=new mPDF('1mode','2format kertas','3font size','4font','5margin left','6margin right','7margin top','8margin bottom','9margin header','10margin footer','11orientasi kertas');
$mpdf=new mPDF('','A4','7','Arial','5','5','56.7','10','5','5');

$mpdf->SetHTMLHeader($header);
$stylesheet = file_get_contents('css/table.css');
$mpdf->WriteHTML($stylesheet,1);

$mpdf->WriteHTML($content);
 
//save the file put which location you need folder/filname
$mpdf->Output("phpflow.pdf", 'F');
 
 
//out put in browser below output function
$mpdf->Output();

?>