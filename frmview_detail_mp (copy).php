<?php                                                                          
include("../../connection.php");
include("../../endec.php");

// $mpno = $_POST['inmpno'];
$mpno = 'X18085683';
$sql =  "SELECT dt1.mpno, DATE_FORMAT(dt1.dateiss,'%d/%m/%Y') AS dateiss, DATE_FORMAT(dt1.datepor,'%d/%m/%Y') AS datepor, dt1.article, 
        dt1.`last`, dt1.noso, dt1.colour, DATE_FORMAT(dt1.dd,'%d/%m/%Y') AS dd, dt1.tot, dt2.d33, dt2.d33s, dt2.d34, dt2.d34s, dt2.d35, 
        dt2.d35s, dt2.d36, dt2.d36s, dt2.d37, dt2.d37s, dt2.d38, dt2.d38s, dt2.d39, dt2.d39s, dt2.d40, dt2.d40s, dt2.d41, dt2.d41s, dt2.d42, 
        dt2.d42s, dt2.d43, dt2.d43s, dt2.d44, dt3.nama, dt1.cust, dt4.rspecial, dt4.rket 
        FROM
        (
          SELECT a.cust, a.ordno, a.mpno, a.dateiss, a.datepor, a.article, a.`last`, a.noso, a.colour, 
          a.dd, a.tot
          FROM DBKMBS.clmphead a
          WHERE a.mpno = '".$mpno."'
        )dt1
        LEFT JOIN
        (
          SELECT b.mpno, b.d33, b.d33s, b.d34, b.d34s, b.d35, b.d35s, b.d36, b.d36s, b.d37, b.d37s,
           b.d38, b.d38s, b.d39, b.d39s, b.d40, b.d40s, b.d41, b.d41s, b.d42, b.d42s, b.d43, b.d43s, b.d44
          FROM DBKMBS.clmpdet3 b
          WHERE TRIM(b.mpno) = '".$mpno."'
        )dt2 
        ON dt1.mpno = dt2.mpno
        LEFT JOIN
        (
          SELECT cust, nama 
          FROM kmcustomer c
        )dt3
        ON dt1.cust = dt3.cust
        LEFT JOIN
        (
          SELECT d.rnomp, d.rspecial, d.rket  FROM clemcmp d
        )dt4
        ON dt1.mpno = dt4.rnomp";
// echo $sql;

$result = mysql_query($sql,$conn);
$count = mysql_num_rows($result);

if ($count > 0) {
  while ($data = mysql_fetch_array($result)) {
    $customer  = $data['nama'];
    $article = $data['article'];
    $orderno = $data['noso'];
    $last = $data['last'];
    $mpno = $data['mpno'];
    $cust = $data['cust'];
    $colour = $data['colour'];
    $dateiss = $data['dateiss'];
    $datepor = $data['datepor'];
    $dd = $data['dd'];
    $total = $data['tot'];

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
  }
}
?>

<div class="td_viewDetailMP">
  <table width="100%" border="1">
    <thead>
      <tr>
        <td align="center" colspan="26">PT KARYAMITRA BUDISENTOSA</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center" colspan="26">MATERIAL PREPARATION</td>
      </tr>
      <tr>
        <td align="" width="15%" colspan="">Customer</td>
        <td align="" width="1%" colspan="">:</td>
        <td align="" width="34%" colspan="11"><?php echo $customer; ?></td>
        <td align="" width="15%" colspan="">Article</td>
        <td align="" width="1%" colspan="">:</td>
        <td align="" width="34%" colspan="11"><?php echo $article; ?></td>
      </tr>
      <tr>
          <td align="" width="15%" colspan="">Order No</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $orderno; ?></td>
          <td align="" width="15%" colspan="">Last</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $last; ?></td>
      </tr>
      <tr>
          <td align="" width="15%" colspan="">MP No & Brand</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $mpno; ?> - <?php echo $cust; ?></td>
          <td align="" width="15%" colspan="">Colour</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $colour; ?></td>
      </tr>
      <tr>
          <td align="" width="15%" colspan="">Date Issued</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $dateiss; ?></td>
          <td align="" width="15%" colspan="">No Ref</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $article; ?></td>
      </tr>
      <tr>
          <td align="" width="15%" colspan="">PO Received</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $datepor; ?></td>
          <td align="" width="15%" colspan="">D / D</td>
          <td align="" width="1%" colspan="">:</td>
          <td align="" width="34%" colspan="11"><?php echo $dd; ?></td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1">
    <tbody>
      <tr>
        <td align="" width="4%">SIZE</td>
        <td align="center" width="4%">33</td>
        <td align="center" width="4%">33.5</td>
        <td align="center" width="4%">34</td>
        <td align="center" width="4%">34.5</td>
        <td align="center" width="4%">35</td>
        <td align="center" width="4%">35.5</td>
        <td align="center" width="4%">36</td>
        <td align="center" width="4%">36.5</td>
        <td align="center" width="4%">37</td>
        <td align="center" width="4%">37.5</td>
        <td align="center" width="4%">38</td>
        <td align="center" width="4%">38.5</td>
        <td align="center" width="4%">39</td>
        <td align="center" width="4%">39.5</td>
        <td align="center" width="4%">40</td>
        <td align="center" width="4%">40.5</td>
        <td align="center" width="4%">41</td>
        <td align="center" width="4%">41.5</td>
        <td align="center" width="4%">42</td>
        <td align="center" width="4%">42.5</td>
        <td align="center" width="4%">43</td>
        <td align="center" width="4%">43.5</td>
        <td align="center" width="4%">44</td>
        <td align="center" width="4%">TOTAL</td>
      </tr>
      <tr>
        <td align="" width="4%">QTY</td>
        <td align="center" width="4%"><?php echo $d33 ?></td>
        <td align="center" width="4%"><?php echo $d33s; ?></td>
        <td align="center" width="4%"><?php echo $d34; ?></td>
        <td align="center" width="4%"><?php echo $d34s; ?></td>
        <td align="center" width="4%"><?php echo $d35; ?></td>
        <td align="center" width="4%"><?php echo $d35s; ?></td>
        <td align="center" width="4%"><?php echo $d36; ?></td>
        <td align="center" width="4%"><?php echo $d36s; ?></td>
        <td align="center" width="4%"><?php echo $d37; ?></td>
        <td align="center" width="4%"><?php echo $d37s; ?></td>
        <td align="center" width="4%"><?php echo $d38; ?></td>
        <td align="center" width="4%"><?php echo $d38s; ?></td>
        <td align="center" width="4%"><?php echo $d39; ?></td>
        <td align="center" width="4%"><?php echo $d39s; ?></td>
        <td align="center" width="4%"><?php echo $d40; ?></td>
        <td align="center" width="4%"><?php echo $d40s; ?></td>
        <td align="center" width="4%"><?php echo $d41; ?></td>
        <td align="center" width="4%"><?php echo $d41s; ?></td>
        <td align="center" width="4%"><?php echo $d42; ?></td>
        <td align="center" width="4%"><?php echo $d42s; ?></td>
        <td align="center" width="4%"><?php echo $d43; ?></td>
        <td align="center" width="4%"><?php echo $d43s; ?></td>
        <td align="center" width="4%"><?php echo $d44; ?></td>
        <td align="center" width="4%"><?php echo $total; ?></td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1">
    <thead>
      <tr>
        <td align="center" width="5%">No</td>
        <td align="center" width="15%">Shoe Parts</td>
        <td align="center" width="35%">Material Description</td>
        <td align="center" width="20%">Supplier</td>
        <td align="center" width="10%">Calc</td>
        <td align="center" width="10%">Qty</td>
        <td align="center" width="5%">Unit</td>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
      $sql_2 = "SELECT b.ket
              FROM clmpdet1 a
              JOIN kmmstpkj b ON a.pkj = b.pkj
              WHERE a.mpno = '".$mpno."'
              ORDER BY a.nopkj";
      $result_2 = mysql_query($sql_2,$conn);
      $row_2 = 0;
      // echo($sql_2);
      while($data_2 = mysql_fetch_array($result_2)){
        $row_2++;
      ?>
        <table width="100%" border="1">
          <tr>
            <td align="center" width="20%">No MP : <?php echo $mpno; ?></td>
            <td align="center" width="20%">Cust : <?php echo $customer; ?></td>
            <td align="center" width="20%">Art : <?php echo $article; ?></td>
            <td align="center" width="20%">Col : <?php echo $colour; ?></td>
            <td align="center" width="20%">Tot. Order : <?php echo $total; ?></td>
          </tr>
        </table>
        <table width="100%" border="1">
          <tr>
            <td align="center" width="5%"><?php echo $row_2; ?></td>
            <td align="" width="95%" colspan="6"><?php echo $data_2['ket']; ?></td>
          </tr>
        </table>
        <table width="100%" border="1">
          <?php

          $sql_3 = "SELECT 
                    b.ket,
                    c.nmbrg,
                    d.nmsupp,
                    a.calc,
                    a.qty,
                    a.nstn
                    FROM DBKMBS.clmpdet2 a
                    JOIN DBKMBS.kmmstsubpkj b
                    ON a.subpkj = b.subpkj
                    JOIN DBKMBS.kmmstbhnbaku c
                    ON a.materi = c.kdbrg
                    JOIN DBKMBS.kmmstsupp d
                    ON a.sup = d.kdsupp
                    WHERE a.mpno = '".$mpno."' AND a.nopkj = '".$row_2."'
                    ORDER BY a.nopkj, a.nosubpkj";
          $result_3 = mysql_query($sql_3,$conn);
          $count_3 = mysql_num_rows($result_3);
          if ($count_3 > 0) {
            while ($data_3 = mysql_fetch_array($result_3)) {
          ?>
            <tr>
              <td align="" width="5%" ></td>
              <td align="" width="15%" ><?php echo $data_3["ket"]; ?></td>
              <td align="" width="35%" ><?php echo $data_3["nmbrg"]; ?></td>
              <td align="" width="20%" ><?php echo $data_3["nmsupp"]; ?></td>
              <td align="" width="10%" ><?php echo $data_3["calc"]; ?></td>
              <td align="" width="10%" ><?php echo $data_3["qty"]; ?></td>
              <td align="" width="5%" ><?php echo $data_3["nstn"]; ?></td>
            </tr>
          <?php
            }
          }
          else{
          ?>
            <tr>
              <td colspan="6">&nbsp;</td>
            </tr>
          <?php
          }
          ?>
        </table>   
        <?php
        }
        ?>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1">
    <tr>
      <td><b><u>Special Instruction</u></b></td>
      <td><?php echo nl2br($rspecial); ?></td>
    </tr>
    <tr>
      <td><b><u>Keterangan</u></b></td>
      <td><?php echo nl2br($rket); ?></td>
    </tr>
  </table>
</div>