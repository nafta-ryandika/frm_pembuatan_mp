<?php
  include("../../configuration.php");
  include("../../connection.php");
  include("../../endec.php");

  if(isset($_POST['intxtmode'])){
    $intxtmode = $_POST['intxtmode'];
  }
  if(isset($_POST['inxgambar'])){
    $inxgambar = $_POST['inxgambar'];
  }
  if(isset($_POST['innomp'])){
    $innomp = strtoupper($_POST['innomp']);
  }
  if(isset($_POST['intglmp'])){
    // $intglmp = strtoupper($_POST['intglmp']);
    $tgl = strtr($_POST['intglmp'], '/', '-');
    $intglmp = strtoupper(htmlspecialchars(date("Y-m-d", strtotime($tgl))));
  }
  if(isset($_POST['innomc'])){
    $innomc = strtoupper($_POST['innomc']);
  }
  if(isset($_POST['intglissuedmp'])){
    // $intglissuedmp = strtoupper($_POST['intglissuedmp']);
    if ($_POST['intglissuedmp']) {
      $tgl = strtr($_POST['intglissuedmp'], '/', '-');
      $intglissuedmp = strtoupper(htmlspecialchars(date("Y-m-d", strtotime($tgl))));
    }
  }
  if(isset($_POST['inkdcust'])){
    $inkdcust = strtoupper($_POST['inkdcust']);
  }
  if(isset($_POST['inkdbrand'])){
    $inkdbrand = strtoupper($_POST['inkdbrand']);
  }
  if(isset($_POST['inartprod'])){
    $inartprod = strtoupper($_POST['inartprod']);
  }
  if(isset($_POST['inartcust'])){
    $inartcust = strtoupper($_POST['inartcust']);
  }
  if(isset($_POST['inwarna'])){
    $inwarna = strtoupper($_POST['inwarna']);
  }
  if(isset($_POST['inshoeheel'])){
    $inshoeheel = strtoupper($_POST['inshoeheel']);
  }
  if(isset($_POST['inshoelast'])){
    $inshoelast = strtoupper($_POST['inshoelast']);
  }
  if(isset($_POST['innoso'])){
    $innoso = strtoupper($_POST['innoso']);
  }
  if(isset($_POST['inkdassort'])){
    $inkdassort = strtoupper($_POST['inkdassort']);
  }
  if(isset($_POST['inkdbrg'])){
    $inkdbrg = strtoupper($_POST['inkdbrg']);
  }
  if(isset($_POST['innopo'])){
    $innopo = strtoupper($_POST['innopo']);
  }
  if(isset($_POST['intglpo'])){
    // $intglpo = strtoupper($_POST['intglpo']);
    $tgl = strtr($_POST['intglpo'], '/', '-');
    $intglpo = strtoupper(htmlspecialchars(date("Y-m-d", strtotime($tgl))));
  }
  if(isset($_POST['indord33'])){
    $indord33 = strtoupper($_POST['indord33']);
  }
  if(isset($_POST['indord34'])){
    $indord34 = strtoupper($_POST['indord34']);
  }
  if(isset($_POST['indord35'])){
    $indord35 = strtoupper($_POST['indord35']);
  }
  if(isset($_POST['indord36'])){
    $indord36 = strtoupper($_POST['indord36']);
  }
  if(isset($_POST['indord37'])){
    $indord37 = strtoupper($_POST['indord37']);
  }
  if(isset($_POST['indord38'])){
    $indord38 = strtoupper($_POST['indord38']);
  }
  if(isset($_POST['indord39'])){
    $indord39 = strtoupper($_POST['indord39']);
  }
  if(isset($_POST['indord40'])){
    $indord40 = strtoupper($_POST['indord40']);
  }
  if(isset($_POST['indord41'])){
    $indord41 = strtoupper($_POST['indord41']);
  }
  if(isset($_POST['indord42'])){
    $indord42 = strtoupper($_POST['indord42']);
  }
  if(isset($_POST['indord43'])){
    $indord43 = strtoupper($_POST['indord43']);
  }
  if(isset($_POST['indord44'])){
    $indord44 = strtoupper($_POST['indord44']);
  }
  if(isset($_POST['indord33s'])){
    $indord33s = strtoupper($_POST['indord33s']);
  }
  if(isset($_POST['indord34s'])){
    $indord34s = strtoupper($_POST['indord34s']);
  }
  if(isset($_POST['indord35s'])){
    $indord35s = strtoupper($_POST['indord35s']);
  }
  if(isset($_POST['indord36s'])){
    $indord36s = strtoupper($_POST['indord36s']);
  }
  if(isset($_POST['indord37s'])){
    $indord37s = strtoupper($_POST['indord37s']);
  }
  if(isset($_POST['indord38s'])){
    $indord38s = strtoupper($_POST['indord38s']);
  }
  if(isset($_POST['indord39s'])){
    $indord39s = strtoupper($_POST['indord39s']);
  }
  if(isset($_POST['indord40s'])){
    $indord40s = strtoupper($_POST['indord40s']);
  }
  if(isset($_POST['indord41s'])){
    $indord41s = strtoupper($_POST['indord41s']);
  }
  if(isset($_POST['indord42s'])){
    $indord42s = strtoupper($_POST['indord42s']);
  }
  if(isset($_POST['indord43s'])){
    $indord43s = strtoupper($_POST['indord43s']);
  }
  if(isset($_POST['indord44s'])){
    $indord44s = strtoupper($_POST['indord44s']);
  }
  if(isset($_POST['intotord'])){
    $intotord = strtoupper($_POST['intotord']);
  }
  if(isset($_POST['incategory'])){
    $incategory = strtoupper($_POST['incategory']);
  }
  if(isset($_POST['intglkirim'])){
    // $intglkirim = strtoupper($_POST['intglkirim']);
    $tgl = strtr($_POST['intglkirim'], '/', '-');
    $intglkirim = strtoupper(htmlspecialchars(date("Y-m-d", strtotime($tgl))));
  }
  if(isset($_POST['inpkj'])){
    $inpkj = strtoupper($_POST['inpkj']);
  }
  if(isset($_POST['insubpkj'])){
    $insubpkj = strtoupper($_POST['insubpkj']);
  }
  if(isset($_POST['inidcomponent'])){
    $inidcomponent = strtoupper($_POST['inidcomponent']);
  }
  if(isset($_POST['incomponent'])){
    $incomponent = strtoupper($_POST['incomponent']);
  }
  if(isset($_POST['inmaterial'])){
    $inmaterial = strtoupper($_POST['inmaterial']);
  }
  if(isset($_POST['insupplier'])){
    $insupplier = strtoupper($_POST['insupplier']);
  }
  // if(isset($_POST['incalctkt'])){
  //   $incalctkt = strtoupper($_POST['incalctkt']);
  // }
  if(isset($_POST['incalcmp'])){
    $incalcmp = strtoupper($_POST['incalcmp']);
  }
  if(isset($_POST['inqty'])){
    $inqty = strtoupper($_POST['inqty']);
  }
  if(isset($_POST['inunit'])){
    $inunit = strtoupper($_POST['inunit']);
  }
  if(isset($_POST['inambil'])){
    $inambil = strtoupper($_POST['inambil']);
  }
  if(isset($_POST['inbackorder'])){
    $inbackorder = strtoupper($_POST['inbackorder']);
  }
  if(isset($_POST['inrspecial'])){
    $inrspecial = strtoupper($_POST['inrspecial']);
  }
  if(isset($_POST['inrket'])){
    $inrket = strtoupper($_POST['inrket']);
  }
  if(isset($_POST['indeletedetail'])){
    $indeletedetail = strtoupper($_POST['indeletedetail']);
  }
  if(isset($_POST['inkodetiket'])){
    $inkodetiket = strtoupper($_POST['inkodetiket']);
  }
  if(isset($_POST['insku'])){
    $insku = strtoupper($_POST['insku']);
  }
  if(isset($_POST['inskux'])){
    $inskux = strtoupper($_POST['inskux']);
  }
  
function checkmp($innomp,$conn){
  $sql = "SELECT mpno FROM clmphead WHERE mpno = '".$innomp."'";
  $result = mysql_query($sql,$conn);
  $numRow = mysql_num_rows($result);

  if($numRow == 0) {
    return 1;
  }
  else{
    return 0;
  }
  mysql_free_result($result);
}

function checkqty($innomc,$innomp,$innoso,$conn){
  $sql = "select a.rnoso, a.rkdbrgjd, a.rassort 
          from clemcmp a 
          where a.rnomc = '".$innomc."' and a.rnomp = '".$innomp."' and a.rnoso = '".$innoso."'";
  $result  = mysql_query($sql,$conn);
  $data = mysql_fetch_array($result);
  $count = mysql_num_rows($result);

  $noso = $data["rnoso"];
  $kdbrg = $data["rkdbrgjd"];
  $assort = $data["rassort"];


  $sql_1 =  "select * from clmpdet3 a where a.mpno = '".$innomp."' and a.kdbrg = '".$kdbrg."' and a.kdassort = '".$assort."'";
  $result_1 = mysql_query($sql_1,$conn);
  $data_1 = mysql_fetch_array($result_1);


  $sql_2 =  "select * from kmsod a where a.dnoso = '".$noso."' and a.dkdbrg = '".$kdbrg."' and a.dkdassort = '".$assort."'";
  $result_2 = mysql_query($sql_2,$conn);
  $data_2 = mysql_fetch_array($result_2);
  $status = 0;
  
  for ($i=32; $i < 44 ; $i++) { 
    if ($data_1[d.$i] != $data_2[dord.$i]) {
      $status = 1;
      break;
    }
    else if ($data_1[d.$i.s] != $data_2[dord.$i.s]) {
      $status = 1;
      break;
    }
  }
  return $status;
}

if ($intxtmode == 'checkcustomer') {
  $sql = "SELECT cust, nama FROM kmcustomer WHERE cust = '".$inkdcust."'";  
  $result =  mysql_query($sql,$conn);
  $row =  mysql_num_rows($result);

  $sql_1 = "SELECT kdcust FROM clbrand WHERE kdcust = '".$inkdcust."'";
  $result_1 =  mysql_query($sql_1,$conn);
  $row_1 =  mysql_num_rows($result_1);

  if ($row > 0) {
    $data = mysql_fetch_array($result);
     echo "ok|".trim($data["nama"]."|".$row_1);
  }
  else {
    echo "no|";
  }
  mysql_free_result($result);
}
else if ($intxtmode == 'checkbrand') {
  $sql = "SELECT kdbrand, nmbrand, kdcust FROM clbrand WHERE kdcust = '".$inkdcust."' AND kdbrand = '".$inkdbrand."'";  
  $result =  mysql_query($sql,$conn);
  $row =  mysql_num_rows($result);

  if ($row > 0) {
    $data = mysql_fetch_array($result);
     echo "ok|".trim($data["nmbrand"]);
  }
  else {
    echo "no|";
  }
  mysql_free_result($result);
}
elseif ($intxtmode == 'setnmassort') {
  $sql = "SELECT nmassort FROM clsizeassort WHERE kdassort = '".$inkdassort."'";  
  $result =  mysql_query($sql,$conn);
  $row =  mysql_num_rows($result);

  if ($row > 0) {
    $data = mysql_fetch_array($result);
    echo trim($data["nmassort"]);
  }
  mysql_free_result($result);
}
elseif ($intxtmode == 'addsalesorder') {
  $sql="SELECT *, (SELECT d.nmjenis FROM kmjnssepatu d WHERE d.kdjenis = dt3.spkdjns) AS nmjenis
        FROM
        (
          SELECT
          a.slnoso,a.slnopo, DATE_FORMAT(a.sltglpo,'%d/%m/%Y') AS sltglpo,
          DATE_FORMAT(a.sltglkrm,'%d/%m/%Y') AS sltglkrm , a.slkdcust
          FROM kmsoh a 
          WHERE a.slnoso = '".$innoso."'
        )dt1
        LEFT JOIN
        (
          SELECT b.dnoso, b.dkdbrg, b.dartprod, b.dartcust, b.dkdassort,b.dord33, b.dord33s,b.dord34, b.dord34s,b.dord35, b.dord35s
          ,b.dord36, b.dord36s,b.dord37, b.dord37s,b.dord38, b.dord38s,b.dord39, b.dord39s,b.dord40, b.dord40s,b.dord41, b.dord41s
          ,b.dord42, b.dord42s,b.dord43, b.dord43s,b.dord44, b.dord44s, (b.dord33 + b.dord33s + b.dord34 + b.dord34s + b.dord35 + 
          b.dord35s + b.dord36 + b.dord36s + b.dord37 + b.dord37s + b.dord38 + b.dord38s + b.dord39 + b.dord39s + b.dord40 +
          b.dord40s + b.dord41 + b.dord41s + b.dord42 + b.dord42s + b.dord43 + b.dord43s + b.dord44 + b.dord44s) AS tot
          FROM kmsod b 
          WHERE b.dnoso = '".$innoso."'
          AND b.dkdassort = '".$inkdassort."'
          AND b.dkdbrg = '".$inkdbrg."'
        )dt2
        ON dt1.slnoso = dt2.dnoso
        LEFT JOIN
        (
          SELECT c.spkdbrg, c.spnmbrg, c.spkdjns
          FROM kmbrgjadi c
        )dt3
        ON dt2.dkdbrg = dt3.spkdbrg 
        WHERE 1 ";
  $result =  mysql_query($sql,$conn);
  $row =  mysql_num_rows($result);
  // echo($sql);

  if ($row > 0) {
    while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
      $nopo = trim($data["slnopo"]);
      $tglpo = trim($data["sltglpo"]);
      $spkdjns = trim($data["spkdjns"]);
      $nmjenis = trim($data["nmjenis"]);
      $tglkrm = trim($data["sltglkrm"]);
      $kdbrg = trim($data["dkdbrg"]); 
      $nmbrg = trim($data["spnmbrg"]);
      $dord33 = $data["dord33"];
      $dord33s = $data["dord33s"];
      $dord34 = $data["dord34"];
      $dord34s = $data["dord34s"];
      $dord35 = $data["dord35"];
      $dord35s = $data["dord35s"];
      $dord36 = $data["dord36"];
      $dord36s = $data["dord36s"];
      $dord37 = $data["dord37"];
      $dord37s = $data["dord37s"];
      $dord38 = $data["dord38"];
      $dord38s = $data["dord38s"];
      $dord39 = $data["dord39"];
      $dord39s = $data["dord39s"];
      $dord40 = $data["dord40"];
      $dord40s = $data["dord40s"];
      $dord41 = $data["dord41"];
      $dord41s = $data["dord41s"];
      $dord42 = $data["dord42"];
      $dord42s = $data["dord42s"];
      $dord43 = $data["dord43"];
      $dord43s = $data["dord43s"];
      $dord44 = $data["dord44"];
      $dord44s = $data["dord44s"];
      $tot = $data["tot"];
      $kdassort = $data["dkdassort"];
    }

    echo "".$nopo."|".$tglpo."|".$spkdjns."|".$nmjenis."|".$tglkrm."|".$kdbrg."|".$nmbrg."|".$dord33."|".$dord33s."|"
          .$dord34."|".$dord34s."|".$dord35."|".$dord35s."|".$dord36."|".$dord36s."|".$dord37."|".$dord37s."|".$dord38."|"
          .$dord38s."|".$dord39."|".$dord39s."|".$dord40."|".$dord40s."|".$dord41."|".$dord41s."|".$dord42."|".$dord42s."|"
          .$dord43."|".$dord43s."|".$dord44."|".$dord44s."|".$tot."|".$kdassort."";
  }
  else{
    echo 0;
  }
  mysql_free_result($result);
}
elseif ($intxtmode == "saveimage") {
  $extension = strtolower(end(explode(".", $inxgambar)));

  // $new_link = str_replace("temp","gambar",$inxgambar);
  $backup_link = "backup/".$inkdcust."-".$inartprod.".jpg";
  $new_link = "gambar/".$inkdcust."-".$inartprod.".jpg";

  // ftp 
  $connect_ftp = ftp_connect('172.16.6.5');  //connect to server
  $login_ftp = ftp_login($connect_ftp, 'ook2x9', 'momoki');

  if(stripos($inxgambar,"frmTiket") == true){
    copy($inxgambar, $new_link);
  }
  else{
    rename($inxgambar, $new_link);
  }

  if(!copy($new_link, $backup_link)){
    echo($new_link.$backup_link);
  }
  else{
    if($login_ftp){ 
      if(ftp_put($connect_ftp,"foto_sepatu/".$inkdcust."-".$inartprod.".jpg", "gambar/".$inkdcust."-".$inartprod.".jpg", FTP_BINARY)){ 
        echo($new_link); 
      }
    } 
    ftp_close($connect_ftp);
  }
}
elseif ($intxtmode == "deleteimage") {
  if (unlink($inxgambar)) {
    echo("Gambar Berhasil Dihapus");
  }
}
else if ($intxtmode == 'checksetbrand') {
  $sql = "SELECT kdcust FROM clbrand WHERE kdcust = '".$inkdcust."'";  
  $result =  mysql_query($sql,$conn);
  $row =  mysql_num_rows($result);

  if ($row > 0) {
    echo 1;
  }
  else {
    echo 0;
  }
  mysql_free_result($result);
}
elseif ($intxtmode == "add") {
  // cek no mp
  if ((checkmp($innomp,$conn) == 1)) {
  // create mc
  $month = date("m");
  $year = date("Y");

  // get counter number
  $sql_4 = "SELECT ccounter FROM rlcounter WHERE ckode = 'RNDMC' AND cbultah = '".$month.$year."'";
  $result_4 = mysql_query($sql_4,$conn);
  $row_4 = mysql_num_rows($result_4);

  if ($row_4 == 0) {
    $sql_5 = "INSERT INTO rlcounter 
              (
              ckode, cnama, cbultah, ccounter, access, userby, entry, `lock`
              ) 
              VALUES 
              (
              'RNDMC', 'DATA MC RND - MC', '".$month.$year."', 0, now(), '".$_SESSION[$domainApp."_myname"]."', 
              (SELECT curtime()), NULL
              )";
    if (!mysql_query($sql_5,$conn)){
      die('Error (Insert Counter): ' . mysql_error());
    }
    $incounter = 1;
  }
  else{
    $data_4 = mysql_fetch_array($result_4);
    $incounter = ($data_4["ccounter"]) + 1;
  }

  // update counter number
  $sql_9 = "UPDATE rlcounter SET
            ccounter = '".$incounter."',
            access = now(),
            userby = '".$_SESSION[$domainApp."_myname"]."',
            entry = (SELECT curtime())
            WHERE
            ckode = 'RNDMC' AND cbultah = '".$month.$year."'";
  if (!mysql_query($sql_9,$conn)){
    die('Error (Update Counter): ' . mysql_error());
  }

  //create no mc
  $innomc = "RNDMC/".$month.$year."/".sprintf("%07s", $incounter);

  // insert header mc
  $sql_6 = "INSERT INTO clheadmc 
            (
            mcnobukti, mctglissue, mcwarna, mccust, mcbrand, mcartprod, mcartcust, mcskukode, mclast, mcheel, mcrevisi, 
            mcremark1, mcpost, mccetak, mcnomp, access, userby, entry, mcremark2, mcremark3, mctglpost
            ) 
            VALUES 
            (
            '".$innomc."', now(), '".$inwarna."', '".$inkdcust."', '".$inkdbrand."', '".$inartprod."', '".$inartcust."', 
            '".$insku."', '".$inshoelast."', '".$inshoeheel."', 0, '', 1, 0, '".$innomp."', now(), 
            '".$_SESSION[$domainApp."_myname"]."', (SELECT curtime()), '', '', now()
            )";

  if (!mysql_query($sql_6,$conn)){
    die('Error (Insert Header MC): ' . mysql_error());
  }

  // insert detail mc
  $sql_7 = "SELECT pkj FROM kmmstpkj ORDER BY pkj";
  $result_7 = mysql_query($sql_7,$conn);
  $no_8 = 1;

  while ($data_7 = mysql_fetch_array($result_7)) {
    $sql_8 = "INSERT INTO cldetmc 
              (
              mcdnobukti, mcdkerja, mcdkomp, mcdmaterial, mcdluas, mcdsatuan, mcdwarna, mcdbaris, mcdblok, access, userby, 
              entry
              ) 
              VALUES 
              (
              '".$innomc."', '".$data_7["pkj"]."', 'KOMPONEN', '', '', '', '', '".$no_8."', 0, now(), '".$_SESSION[$domainApp."_myname"]."', (SELECT curtime())
              )";
    if (!mysql_query($sql_8,$conn)){
      die('Error (Insert Detail MC): ' . mysql_error());
    }
    $no_8++;
  }

  // update clcustsku
  $sql_13 = "update clcustsku set nomc = '".$innomc."' where kodesku = '".$insku."' and kodecust = '".$inkdcust."'";
  if (!mysql_query($sql_13,$conn)){
    die('Error (Update clcustsku): ' . mysql_error());
  }


  $sql_11 = "SELECT rnomp 
            FROM clemcmp 
            WHERE rnomc = '".$innomc."' AND rnomp = '".$innomp."' AND rnoso = '".$innoso."'";
  $result_11 =  mysql_query($sql_11,$conn);
  $row_11 =  mysql_num_rows($result_11);

  if ($row_11 > 0) {
    echo(0);
  }
  else{
    // simpan header MP di clmphead
    $sql = "INSERT INTO clmphead 
            (cust, ordno, mpno, dateiss, datepor, article, last, noso, colour, category, dd, tot, status, ket)
            VALUES
            (
            '".$inkdcust."',
            NULL,
            '".$innomp."',
            NULL,
            '".$intglpo."',
            '".$inartprod."',
            '".$inshoelast."',
            '".$innoso."',
            '".$inwarna."',
            '".$incategory."',
            '".$intglkirim."',
            '".$intotord."',
            '1',
            '".$inartcust."'
            )
            ";
    if (!mysql_query($sql,$conn)){
      die('Error (Insert Header): ' . mysql_error());
    }

    // simpan detail urutan pekerjaan di clmpdet1
    $sql_1 = "SELECT pkj FROM kmmstpkj ORDER BY pkj";
    $result_1 = mysql_query($sql_1,$conn);
    $no_1 = 1;

    while ($data_1 = mysql_fetch_array($result_1)) {
      $sql_2 = "INSERT INTO clmpdet1 (mpno,nopkj,pkj) VALUES ('".$innomp."','".$no_1."','".$data_1["pkj"]."')";
      if (!mysql_query($sql_2,$conn)){
        die('Error (Insert Detail Pekerjaan): ' . mysql_error());
      }
      $no_1++; 
    }

    // simpan detail order customer di clmpdet3
    $sql_3 = "INSERT INTO clmpdet3 
              (mpno, kdbrg, kdassort, d33, d33s, d34, d34s, d35, d35s, d36, d36s, d37, d37s, d38, d38s, d39, d39s, d40, d40s,
               d41, d41s, d42, d42s, d43, d43s, d44, d44s) 
              VALUES 
              (
              '".$innomp."','".$inkdbrg."', '".$inkdassort."','".$indord33."','".$indord33s."','".$indord34."','".$indord34s."',
              '".$indord35."','".$indord35s."','".$indord36."','".$indord36s."','".$indord37."','".$indord37s."','".$indord38."',
              '".$indord38s."','".$indord39."','".$indord39s."','".$indord40."','".$indord40s."','".$indord41."','".$indord41s."',
              '".$indord42."','".$indord42s."','".$indord43."','".$indord43s."','".$indord44."','".$indord44s."'
              )";
    
    if (!mysql_query($sql_3,$conn)){
      die('Error (Insert Detail Order): ' . mysql_error());
    }

    // simpan link nomp dengan kode tiket
    $sql_12 = "INSERT INTO clmpdet4 
              (xid, nomp, notiket, access, komp, userby) 
              VALUES 
              (
              '','".$innomp."', '".$inkodetiket."',now(),'".$_SESSION[$domainApp."_mygroup"]." # ".$_SESSION[$domainApp."_mylevel"]."','".$_SESSION[$domainApp."_myname"]."'
              )";
    
    if (!mysql_query($sql_12,$conn)){
      die('Error (Insert clmpdet4): ' . mysql_error());
    }

    // simpan nomp & noso di dalam tabel clemcmp
    $sql_10 = "INSERT INTO clemcmp 
              (
              rnomc, rnomp, rnoso, rkdcust, rkdbrand, rartprod, rartcust, rtglmp, rassort, rkdbrgjd,
              rmpzero, rspecial, rket, rtglpost, rpost, rrevisi, access, userby, entry
              ) 
              VALUES 
              (
              '".$innomc."', '".$innomp."', '".$innoso."', '".$inkdcust."', '".$inkdbrand."', '".$inartprod."', '".$inartcust."', 
              now(), '".$inkdassort."', '".$inkdbrg."', 0, '', '', NULL, 0, 0, now(),
               '".$_SESSION[$domainApp."_myname"]."', (SELECT curtime())
              )";

    if (!mysql_query($sql_10,$conn)){
      die('Error (Insert McMp): ' . mysql_error());
    }

    echo("1|".$innomc);
  }
  }
  else{
    echo(0);
  }
}
elseif ($intxtmode == 'removesalesorder') {
  $sql = "DELETE FROM clmpdet3 WHERE mpno = '".$innomp."' AND kdbrg = '".$inkdbrg."' AND kdassort = '".$inkdassort."'";
  if (!mysql_query($sql,$conn)){
    die('Error : ' . mysql_error());
  }
  // echo("Data Sales Order Berhasil Dihapus");
  echo($sql);
}
elseif ($intxtmode == 'adddetail') {
  $inpkj = explode("|",rtrim($inpkj,'|'));
  $insubpkj = explode("|",rtrim($insubpkj,'|'));
  $inidcomponent = explode("|",rtrim($inidcomponent,'|'));
  $incomponent = explode("|",rtrim($incomponent,'|'));
  $inmaterial = explode("|",rtrim($inmaterial,'|'));
  $insupplier = explode("|",rtrim($insupplier,'|'));
  // $incalctkt = explode("|",rtrim($incalctkt,'|'));
  $incalcmp = explode("|",rtrim($incalcmp,'|'));
  $inqty = explode("|",rtrim($inqty,'|'));
  $inunit = explode("|",rtrim($inunit,'|'));
  $inambil = explode("|",rtrim($inambil,'|'));
  $inbackorder = explode("|",rtrim($inbackorder,'|'));

  for ($i=0; $i < count($inpkj); $i++) { 
    if ($incomponent[$i] != "" && $inidcomponent[$i] == "") {
        $month = date("m");
        $year = date("Y");

        // get counter number
        $sql_3 = "SELECT ccounter FROM rlcounter WHERE ckode = 'SBPKJ' AND cbultah = '".$month.$year."'";
        $result_3 = mysql_query($sql_3,$conn);
        $row_3 = mysql_num_rows($result_3);

        if ($row_3 == 0) {
          $sql_4 = "INSERT INTO rlcounter 
                    (
                    ckode, cnama, cbultah, ccounter, access, userby, entry, `lock`
                    ) 
                    VALUES 
                    (
                    'SBPKJ', 'DATA SUBPKJ', '".$month.$year."', 0, now(), '".$_SESSION[$domainApp."_myname"]."', 
                    (SELECT curtime()), NULL
                    )";
          if (!mysql_query($sql_4,$conn)){
            die('Error (Insert Counter): ' . mysql_error());
          }
          $incounter = 1;
        }
        else{
          $data_3 = mysql_fetch_array($result_3);
          $incounter = ($data_3["ccounter"]) + 1;
        }

        // update counter number
        $sql_5 = "UPDATE rlcounter SET
                  ccounter = '".$incounter."',
                  access = now(),
                  userby = '".$_SESSION[$domainApp."_myname"]."',
                  entry = (SELECT curtime())
                  WHERE
                  ckode = 'SBPKJ' AND cbultah = '".$month.$year."'";
        if (!mysql_query($sql_5,$conn)){
          die('Error (Update Counter): ' . mysql_error());
        }

        $inxid = $month.$year.sprintf("%04s", $incounter);

        $sql_6 = "insert into kmmstsubpkj(subpkj,ket,access,komp,userby) values ('".$inxid."','".$incomponent[$i]."',now(),'".$_SESSION[$domainApp."_mygroup"]." # ".$_SESSION[$domainApp."_mylevel"]."','".$_SESSION[$domainApp."_myname"]."')";
        // if (!mysql_query($sql_6,$conn)){
        //   die('Error (Insert kmmstsubpkj): ' . mysql_error());
        // }
        mysql_query($sql_6,$conn);
    }
    else{
        $inxid = $inidcomponent[$i];
    }

    $sql = "INSERT into clmpdet2 
            (
            mpno,nopkj,nosubpkj,subpkj,materi,colour,sup,calc,qty,stn,nstn,ambil,backorder
            ) 
            VALUES 
            (
            '".$innomp."','".$inpkj[$i]."','".$insubpkj[$i]."','".$inxid."','".$inmaterial[$i]."','','".$insupplier[$i]."','".$incalcmp[$i]."','".$inqty[$i]."','','".$inunit[$i]."','','".$inbackorder[$i]."'
            )";
    if (!mysql_query($sql,$conn)){
      die('Error (Insert clmpdet2) : ' . mysql_error());
    }
  }

  $sql_1 = "UPDATE clemcmp SET
            rspecial = '".$inrspecial ."',
            rket = '".$inrket."',
            access = now(),
            userby = '".$_SESSION[$domainApp."_myname"]."',
            entry = (SELECT curtime())
            WHERE rnomc = '".$innomc."' AND rnomp = '".$innomp."' AND rnoso = '".$innoso."'";

  if (!mysql_query($sql_1,$conn)){
    die('Error (Update clemcmp) : ' . mysql_error());
  }

  echo(1);
}
elseif ($intxtmode == 'issuedmp') {
  $sql = "UPDATE clmphead SET
          dateiss = now()
          WHERE mpno = '".$innomp."'
         ";
  if (!mysql_query($sql,$conn)){
    die('Error (update clmphead): ' . mysql_error());
  }

  $sql_1 = "SELECT rtglpost, rrevisi FROM clemcmp WHERE rnomp = '".$innomp."'";
  $result_1 = mysql_query($sql_1,$conn);
  $data_1 = mysql_fetch_array($result_1);
  $issued = $data_1["rtglpost"];
  $revisi = $data_1["rrevisi"];

  if (is_null($issued)) {
    $sql_2 = "UPDATE clemcmp SET
              rtglpost = now(),
              rpost = 1,
              rrevisi = 0
              WHERE rnomp = '".$innomp."'
             ";
  }else{
    $sql_2 = "UPDATE clemcmp SET
              rtglpost = now(),
              rpost = 1,
              rrevisi = '".($revisi + 1)."'
              WHERE rnomp = '".$innomp."'
             ";
  }
  if (!mysql_query($sql_2,$conn)){
    die('Error (update clemcmp) : ' . mysql_error());
  }

  echo("MP '".$innomp."' Berhasil di Issued");
}
elseif($intxtmode=='getedit'){
  // $checkUser = checkUser($inslnoso,$mygroup,$mylevel,$myname,$conn);
  // if ($checkUser == 'OK') {
    $sql = "SELECT *
            FROM
            (
              SELECT a.cust, a.mpno, DATE_FORMAT(a.dateiss, '%d/%m/%Y') AS dateiss, DATE_FORMAT(a.datepor, '%d/%m/%Y') AS datepor,
              a.article, a.`last`, a.noso, a.colour, a.category, DATE_FORMAT(a.dd, '%d/%m/%Y') AS dd
              FROM clmphead a
              WHERE a.mpno = '".$innomp."'
            )dt1
            INNER JOIN
            (
              SELECT b.rnomc, b.rnomp, b.rnoso, b.rkdbrand, b.rartprod, b.rartcust,b.rspecial ,b.rket, DATE_FORMAT(b.rtglmp, '%d/%m/%Y') AS rtglmp
              FROM clemcmp b
              WHERE b.rnomp = '".$innomp."'
            )dt2
            ON dt1.mpno = dt2.rnomp AND dt1.noso = dt2.rnoso
            INNER JOIN
            (
              SELECT mpno, kdbrg, kdassort FROM clmpdet3 c WHERE c.mpno = '".$innomp."'   
            )dt3
            ON dt1.mpno = dt3.mpno
            INNER JOIN
            (
              SELECT d.mcnobukti, d.mcheel FROM clheadmc d
            )dt4
            ON dt2.rnomc = dt4.mcnobukti";

    $result=mysql_query($sql,$conn);
    while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
      echo "<span id='getcust'>".trim($data['cust'])."</span>";
      echo "<span id='getmpno'>".trim($data['mpno'])."</span>";
      echo "<span id='getdateiss'>".trim($data['dateiss'])."</span>";
      echo "<span id='getdatepor'>".trim($data['datepor'])."</span>";
      echo "<span id='getarticle'>".trim($data['article'])."</span>";
      echo "<span id='getlast'>".trim($data['last'])."</span>";
      echo "<span id='getmcheel'>".trim($data['mcheel'])."</span>";
      echo "<span id='getnoso'>".trim($data['noso'])."</span>";
      echo "<span id='getcolour'>".trim($data['colour'])."</span>";
      echo "<span id='getcategory'>".trim($data['category'])."</span>";
      echo "<span id='getdd'>".trim($data['dd'])."</span>";
      echo "<span id='getrnomc'>".trim($data['rnomc'])."</span>";
      echo "<span id='getrkdbrand'>".trim($data['rkdbrand'])."</span>";
      echo "<span id='getrartprod'>".trim($data['rartprod'])."</span>";
      echo "<span id='getrartcust'>".trim($data['rartcust'])."</span>";
      echo "<span id='getrspecial'>".trim($data['rspecial'])."</span>";
      echo "<span id='getrket'>".trim($data['rket'])."</span>";
      echo "<span id='getkdbrg'>".trim($data['kdbrg'])."</span>";
      echo "<span id='getkdassort'>".trim($data['kdassort'])."</span>";
      echo "<span id='getrspecial'>".trim($data['rspecial'])."</span>";
      echo "<span id='getrket'>".trim($data['rket'])."</span>";
      echo "<span id='getrtglmp'>".trim($data['rtglmp'])."</span>";
      // echo "<span id='getd33'>".$data['d33']."</span>";
      // echo "<span id='getd34'>".$data['d34']."</span>";
      // echo "<span id='getd35'>".$data['d35']."</span>";
      // echo "<span id='getd36'>".$data['d36']."</span>";
      // echo "<span id='getd37'>".$data['d37']."</span>";
      // echo "<span id='getd38'>".$data['d38']."</span>";
      // echo "<span id='getd39'>".$data['d39']."</span>";
      // echo "<span id='getd40'>".$data['d40']."</span>";
      // echo "<span id='getd41'>".$data['d41']."</span>";
      // echo "<span id='getd42'>".$data['d42']."</span>";
      // echo "<span id='getd43'>".$data['d43']."</span>";
      // echo "<span id='getd44'>".$data['d44']."</span>";
      // echo "<span id='getd33s'>".$data['d33s']."</span>";
      // echo "<span id='getd34s'>".$data['d34s']."</span>";
      // echo "<span id='getd35s'>".$data['d35s']."</span>";
      // echo "<span id='getd36s'>".$data['d36s']."</span>";
      // echo "<span id='getd37s'>".$data['d37s']."</span>";
      // echo "<span id='getd38s'>".$data['d38s']."</span>";
      // echo "<span id='getd39s'>".$data['d39s']."</span>";
      // echo "<span id='getd40s'>".$data['d40s']."</span>";
      // echo "<span id='getd41s'>".$data['d41s']."</span>";
      // echo "<span id='getd42s'>".$data['d42s']."</span>";
      // echo "<span id='getd43s'>".$data['d43s']."</span>";
      // echo "<span id='getd44s'>".$data['d44s']."</span>";
      $sql_1 = "select kodesku from clcustsku where nomc = '".$data['rnomc']."'";
      $result_1 = mysql_query($sql_1,$conn);
      $data_1 = mysql_fetch_array($result_1);

      echo "<span id='getsku'>".trim($data_1['kodesku'])."</span>";
    }
    mysql_free_result($result);
  // }
  // else{
  //   echo "0|".$checkUser;
  // }
}
else if ($intxtmode=='edit') {
  // update clmphead
  $sql = "UPDATE clmphead SET
          cust = '".$inkdcust."',
          datepor = '".$intglpo."',
          article = '".$inartprod."',
          last = '".$inshoelast."',
          noso = '".$innoso."',
          colour = '".$inwarna."',
          category = '".$incategory."',
          dd = '".$intglkirim."',
          tot = '".$intotord."',
          status = 1,
          ket = '".$inartcust."' 
          WHERE mpno = '".$innomp."'
         ";
  if (!mysql_query($sql,$conn)){
    die('Error (Update clmphead) : ' . mysql_error());
  }

  //update clemcmp
  $sql_1 = "UPDATE clemcmp SET 
            rnoso = '".$innoso."',
            rkdcust = '".$inkdcust."',
            rkdbrand = '".$inkdbrand."',
            rartprod = '".$inartprod."',
            rartcust = '".$inartcust."',
            rtglmp = now(),
            rassort = '".$inkdassort."',
            rkdbrgjd = '".$inkdbrg."',
            access = now(),
            userby = '".$_SESSION[$domainApp."_myname"]."',
            entry = (SELECT curtime()) 
            WHERE rnomc = '".$innomc."' AND rnomp = '".$innomp."'
           ";
  if (!mysql_query($sql_1,$conn)){
    die('Error (Update clemcmp) : ' . mysql_error());
  }

  //delete clmpdet 3
  $sql_2 = " DELETE FROM clmpdet3 WHERE mpno = '".$innomp."'";
  if (!mysql_query($sql_2,$conn)){
    die('Error (Delete clmpdet3) : ' . mysql_error());
  }

  //insert clmpdet 3
  $sql_3 = "INSERT INTO clmpdet3 
            (mpno, kdbrg, kdassort, d33, d33s, d34, d34s, d35, d35s, d36, d36s, d37, d37s, d38, d38s, d39, d39s, d40, d40s,
             d41, d41s, d42, d42s, d43, d43s, d44, d44s) 
            VALUES 
            (
            '".$innomp."','".$inkdbrg."', '".$inkdassort."','".$indord33."','".$indord33s."','".$indord34."','".$indord34s."',
            '".$indord35."','".$indord35s."','".$indord36."','".$indord36s."','".$indord37."','".$indord37s."','".$indord38."',
            '".$indord38s."','".$indord39."','".$indord39s."','".$indord40."','".$indord40s."','".$indord41."','".$indord41s."',
            '".$indord42."','".$indord42s."','".$indord43."','".$indord43s."','".$indord44."','".$indord44s."'
            )";
    
  if (!mysql_query($sql_3,$conn)){
    die('Error (Insert clmpdet3): ' . mysql_error());
  }

  // update clheadmc
  $sql_4 = "UPDATE clheadmc SET
            mcwarna = '".$inwarna."', 
            mccust = '".$inkdcust."', 
            mcbrand = '".$inkdbrand."', 
            mcartprod = '".$inartprod."', 
            mcartcust = '".$inartcust."',
            mcskukode = '".$insku."',
            mclast = '".$inshoelast."', 
            mcheel = '".$inshoeheel."', 
            access = now(), 
            userby = '".$_SESSION[$domainApp."_myname"]."', 
            entry = (SELECT curtime()), 
            mctglpost = now()
            WHERE mcnobukti = '".$innomc."'
            ";
  if (!mysql_query($sql_4,$conn)){
    die('Error (Update clheadmc): ' . mysql_error().$sql_4);
  }

  // update clcustsku
  if($inskux != "" && $insku != $inskux){
    $sql_14 = "update clcustsku set nomc = NULL where kodesku = '".$inskux."' and kodecust = '".$inkdcust."'";
    if (!mysql_query($sql_14,$conn)){
      die('Error (Update clcustsku): ' . mysql_error());
    }
  }


  $sql_13 = "update clcustsku set nomc = '".$innomc."' where kodesku = '".$insku."' and kodecust = '".$inkdcust."'";
  if (!mysql_query($sql_13,$conn)){
    die('Error (Update clcustsku): ' . mysql_error());
  }

  //insert log user
  $sql_5 = "INSERT INTO clloguser 
            (
            lguser,lgdate,lgkomp,lgnomc,lgnoso,lgnomp,lgket)
            VALUES 
            (
            '".$_SESSION[$domainApp."_myname"]."',
            now(),
            '".$_SESSION[$domainApp."_mygroup"]." # ".$_SESSION[$domainApp."_mylevel"]."', 
            '".$innomc."',
            '".$innoso."',
            '".$innomp."',
            'UPDATE DATA HEADER MP'
            )
           ";
  if (!mysql_query($sql_5,$conn)){
    die('Error (Log): ' . mysql_error());
  }

  echo(1);
}
else if ($intxtmode=='delete') {
  $status = 0;
  
  $sql = "SELECT a.ambil, a.backorder FROM clmpdet2 a WHERE a.mpno = '".$innomp."'";
  $result = mysql_query($sql,$conn);

  while ($data = mysql_fetch_array($result)) {
    $ambil = $data["ambil"];
    $backorder = $data["backorder"];
    
    if (($ambil > 0) || ($backorder > 0)) {
      $status = 1;
      break;
    }
  }

  if ($status == 1) {
    echo "MP : ".$innomp." Tidak Bisa Dihapus! Sudah Ada Pengambilan Barang...";
  }
  else{
    // delete clemcmp
    $sql_1 = "DELETE FROM clemcmp WHERE rnomp = '".$innomp."'";
    if (!mysql_query($sql_1,$conn)){
      die('Error (Delete clemcmp): ' . mysql_error());
    }

    //delete detail order
    $sql_2 = "DELETE FROM clmpdet3 WHERE mpno = '".$innomp."'";
    if (!mysql_query($sql_2,$conn)){
      die('Error (Delete clmpdet3): ' . mysql_error());
    }

    //delete detail mp
    $sql_3 = "DELETE FROM clmpdet2 WHERE mpno = '".$innomp."'";
    if (!mysql_query($sql_3,$conn)){
      die('Error (Delete clmpdet2): ' . mysql_error());
    }

    //delete detail pekerjaan
    $sql_4 = "DELETE FROM clmpdet1 WHERE mpno = '".$innomp."'";
    if (!mysql_query($sql_4,$conn)){
      die('Error (Delete clmpdet1): ' . mysql_error());
    }

    //delete header mp
    $sql_5 = "DELETE FROM clmphead WHERE mpno = '".$innomp."'";
    if (!mysql_query($sql_5,$conn)){
      die('Error (Delete clmphead): ' . mysql_error());
    }

    //delete clmpdet4
    $sql_7 = "DELETE FROM clmpdet4 WHERE nomp = '".$innomp."'";
    if (!mysql_query($sql_7,$conn)){
      die('Error (Delete clmpdet4): ' . mysql_error());
    }

    //insert log user
    $sql_6 = "INSERT INTO clloguser 
              (
              lguser,lgdate,lgkomp,lgnomc,lgnoso,lgnomp,lgket)
              VALUES 
              (
              '".$_SESSION[$domainApp."_myname"]."',
              now(),
              '".$_SESSION[$domainApp."_mygroup"]." # ".$_SESSION[$domainApp."_mylevel"]."', 
              '".$innomc."',
              '".$innoso."',
              '".$innomp."',
              'HAPUS DATA MP'
              )
             ";
    if (!mysql_query($sql_6,$conn)){
      die('Error (Log): ' . mysql_error());
    }

    echo "MP : ".$innomp." Berhasil Dihapus";
  }
}
else if ($intxtmode=='editdetail') {
  $inpkj = explode("|",rtrim($inpkj,'|'));
  $insubpkj = explode("|",rtrim($insubpkj,'|'));
  $inidcomponent = explode("|",rtrim($inidcomponent,'|'));
  $incomponent = explode("|",rtrim($incomponent,'|'));
  $inmaterial = explode("|",rtrim($inmaterial,'|'));
  $insupplier = explode("|",rtrim($insupplier,'|'));
  // $incalctkt = explode("|",rtrim($incalctkt,'|'));
  $incalcmp = explode("|",rtrim($incalcmp,'|'));
  $inqty = explode("|",rtrim($inqty,'|'));
  $inunit = explode("|",rtrim($inunit,'|'));
  $inambil = explode("|",rtrim($inambil,'|'));
  $inbackorder = explode("|",rtrim($inbackorder,'|'));

  for ($i=0; $i < count($inpkj); $i++) { 
    $sql = "SELECT a.subpkj,a.materi,a.sup,a.calc,a.qty, a.nstn, a.ambil, a.backorder
            FROM clmpdet2 a 
            WHERE a.mpno = '".$innomp."' AND a.nopkj = '".$inpkj[$i]."' AND a.nosubpkj = '".$insubpkj[$i]."' 
            ";
            // AND a.materi = '".$inmaterial[$i]."'
    $result = mysql_query($sql,$conn);
    $count = mysql_num_rows($result);
    
    if($count > 0){
      $data = mysql_fetch_array($result);

      $subpkj = $data['subpkj'];
      $materi = $data['materi'];
      $sup = $data['sup'];
      $calc = $data['calc'];
      $qty = $data['qty'];
      $nstn = $data['nstn'];
      $ambil = $data['ambil'];
      $backorder = $data['backorder'];

      if (($subpkj != $inidcomponent[$i] || $materi != $inmaterial[$i] || $sup != $insupplier[$i] || $calc != $incalcmp[$i] || $qty != $inqty[$i] || $nstn != $inunit[$i] || $backorder != $inbackorder[$i]) && $ambil <= 0 ){

        $sql_1 = "UPDATE clmpdet2 SET
                  subpkj = '".$inidcomponent[$i]."',
                  materi = '".$inmaterial[$i]."',
                  sup = '".$insupplier[$i]."',
                  calc = '".$incalcmp[$i]."',
                  qty = '".$inqty[$i]."',
                  nstn = '".$inunit[$i]."',
                  backorder = '".$inbackorder[$i]."'
                  WHERE mpno = '".$innomp."' AND nopkj = '".$inpkj[$i]."' AND nosubpkj = '".$insubpkj[$i]."' 
                 ";

        if (!mysql_query($sql_1,$conn)){
          die('Error : (Insert clmpdet2)' . mysql_error());
        }
      }
    }
    else{
      $sql_1 = "INSERT into clmpdet2 
                (
                mpno,nopkj,nosubpkj,subpkj,materi,colour,sup,calc,qty,stn,nstn,ambil,backorder
                ) 
                VALUES 
                (
                '".$innomp."','".$inpkj[$i]."','".$insubpkj[$i]."','".$inidcomponent[$i]."','".$inmaterial[$i]."','','".$insupplier[$i]."','".$incalcmp[$i]."','".$inqty[$i]."','','".$inunit[$i]."','','".$inbackorder[$i]."'
                )";
      if (!mysql_query($sql_1,$conn)){
        die('Error : (Insert clmpdet2)' . mysql_error());
      }
    }
  }

  $sql_2 = "UPDATE clemcmp SET
            rtglmp = now(),
            rspecial = '".$inrspecial ."',
            rket = '".$inrket."',
            access = now(),
            userby = '".$_SESSION[$domainApp."_myname"]."',
            entry = (SELECT curtime())
            WHERE rnomc = '".$innomc."' AND rnomp = '".$innomp."' AND rnoso = '".$innoso."'";

  if (!mysql_query($sql_2,$conn)){
    die('Error : (Update clemcmp)' . mysql_error());
  }

  //delete detail
  $indeletedetail = explode("#", rtrim($indeletedetail,'#'));
  
  for ($j=0; $j < count($indeletedetail) ; $j++) { 
    $removex = explode("|", $indeletedetail[$j]);
    $sql_3 = "DELETE FROM clmpdet2
              WHERE mpno = '".$removex[0]."' AND nopkj = '".$removex[1]."' AND nosubpkj = '".$removex[2]."'";
    if (!mysql_query($sql_3,$conn)){
      die('Error : (Delete clmpdet2)' . mysql_error());
    }
  }

  //insert log user
  $sql_4 = "INSERT INTO clloguser 
            (
            lguser,lgdate,lgkomp,lgnomc,lgnoso,lgnomp,lgket)
            VALUES 
            (
            '".$_SESSION[$domainApp."_myname"]."',
            now(),
            '".$_SESSION[$domainApp."_mygroup"]." # ".$_SESSION[$domainApp."_mylevel"]."', 
            '".$innomc."',
            '".$innoso."',
            '".$innomp."',
            'EDIT DETAIL MP'
            )
           ";
  if (!mysql_query($sql_4,$conn)){
    die('Error (Log): ' . mysql_error());
  }

  echo(1);
}
elseif ($intxtmode == 'checkissued') {
  $sql = "select dateiss from clmphead where mpno  = '".$innomp."'";
  $result = mysql_query($sql,$conn);
  $data = mysql_fetch_array($result);

  if (is_null($data["dateiss"])) {
    echo 0;
  }
  else{
    echo 1;
  }
}
elseif ($intxtmode == 'unissued') {
  // update clmphead
  $sql = "UPDATE clmphead SET
          dateiss = NULL
          WHERE mpno = '".$innomp."'
         ";
  if (!mysql_query($sql,$conn)){
    die('Error (update clmphead): ' . mysql_error());
  }

  // update clemcmp
  $sql_1 = "UPDATE clemcmp SET
            rpost = 0
            WHERE rnomp = '".$innomp."'
            ";
  if (!mysql_query($sql_1,$conn)){
    die('Error (update clmphead): ' . mysql_error());
  }

  //insert log user
  $sql_2 = "INSERT INTO clloguser 
            (
            lguser,lgdate,lgkomp,lgnomc,lgnoso,lgnomp,lgket)
            VALUES 
            (
            '".$_SESSION[$domainApp."_myname"]."',
            now(),
            '".$_SESSION[$domainApp."_mygroup"]." # ".$_SESSION[$domainApp."_mylevel"]."', 
            '".$innomc."',
            '".$innoso."',
            '".$innomp."',
            'BATAL ISSUED MP'
            )
           ";
  if (!mysql_query($sql_2,$conn)){
    die('Error (Log): ' . mysql_error());
  }

  echo("MP '".$innomp."' Berhasil di UnIssued");

}
elseif ($intxtmode == 'checkso'){
  echo(checkqty($innomc,$innomp,$innoso,$conn));
}
mysql_close($conn);
?>