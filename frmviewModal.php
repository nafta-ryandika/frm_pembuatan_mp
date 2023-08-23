<?php
include("../../connection.php");
include("../../endec.php");
include("actsearch.php");

if(isset($_POST['innoso'])){
  $innoso = $_POST['innoso'];
}

if(isset($_POST['inkdassort'])){
  $inkdassort = $_POST['inkdassort'];
}

if (isset($_POST['inid'])) {
  $inid = $_POST['inid'];
}

if(isset($_POST['txtpagemodal'])){
  $txtpage = $_POST['txtpagemodal'];
  $showPage = $txtpage;
  $noPage = $txtpage;
}
else{
  $txtpage = 1;
  $showPage = $txtpage;
  $noPage = $txtpage;
}

if(isset($_POST['txtperpagemodal'])){
  $txtperpage=$_POST['txtperpagemodal'];
}
else{
  $txtperpage=15;
}

$offset = ($txtpage - 1) * $txtperpage;
$sqlLIMIT = " LIMIT $offset, $txtperpage";
$sqlWHERE = " ";

if(isset($_POST['txtdatamodal'])){
  if ($_POST['txtdatamodal']!=''){
    $txtdata=$_POST['txtdatamodal'];
  }
}

if(isset($_POST['txtfield'])){
  if ($_POST['txtfield']!=''){
    $txtfield = $_POST['txtfield'];
  }
}


if($_POST['txtfield']!=''){

  $like_data = getsearchdata('kmcustomer ',$txtfield,$txtdata);

  if(rtrim($like_data,'|') != ''){
    $datalike = php_permutasi(explode("|",rtrim($like_data,'|')));

    $arr_like = explode("|",rtrim($datalike,'|'));

    foreach ($arr_like as $value) {
      $where .= " ".$txtfield." like '%".$value."%' or ";
    }

    $sqlWHERE = $sqlWHERE." and (".rtrim($where,' or ')." ) ";

  }else{
    $sqlWHERE = $sqlWHERE." and ".$txtfield." like '%".$txtdata."%' ";
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Form View</title>
</head>

<?php
$xrdm = date("YmdHis");
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css?verion=$xrdm\" />";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/frmstyle.css?version=$xrdm\" />";
?>
<!-- script type="text/javascript" src="js/jquery-latest.js"></script> -->
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myTableModal").tablesorter();
  }
  );
</script>

<body>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <div id="frmisi">
          <table id="myTableModal1" class="tablesorter">
            <thead>
              <tr>
                <th align="center">NO</th>
                <th align="center">Kode Barang</th>
                <th align="center">Nama Barang</th>
                <th align="center">...</th>
              </tr>
            </thead>
            <tbody>
              <?php
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
              )dt2
              ON dt1.slnoso = dt2.dnoso
              LEFT JOIN
              (
                SELECT c.spkdbrg, c.spnmbrg, c.spkdjns
                FROM kmbrgjadi c
              )dt3
              ON dt2.dkdbrg = dt3.spkdbrg 
              WHERE 1 ";

              $sqlCOUNT = "SELECT count(*) AS jumlah FROM 
                          (
                            ".$sql."
                          ) dt";
              // echo($sqlCOUNT);
              $sqlCOUNT = $sqlCOUNT;
              $result_1=mysql_query($sqlCOUNT);
              $data_1 = mysql_fetch_array($result_1);
              $count=$data_1["jumlah"];

              mysql_free_result($result);
              // echo($sqlWHERE);

              $sqlORDER= "order by dt3.spnmbrg asc";
              $sql=$sql.$sqlWHERE.$sqlORDER.$sqlLIMIT;
                // echo $sql;
              $result=mysql_query($sql);
              $jumPage = ceil($count/$txtperpage);

              if($count>0){
                $row = $offset;
                while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
                  $row += 1;
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
                  ?>

                  <tr onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
                    <td align="center" nowrap><?php echo $row; ?></td>
                    <td align="left" nowrap><?php echo $data["spkdbrg"]; ?></td>
                    <td align="left" nowrap><?php echo $data["spnmbrg"]; ?></td>
                    <td align="center" nowrap><?php echo "<button id='cmdselect' class='buttonadd' name='nmcmdselect' value='".$data['cust']."' onclick=\"selectset('".$nopo."','".$tglpo."','".$spkdjns."','".$nmjenis."','".$tglkrm."','".$kdbrg."','".$nmbrg."','".$dord33."','".$dord33s."','".$dord34."','".$dord34s."','".$dord35."','".$dord35s."','".$dord36."','".$dord36s."','".$dord37."','".$dord37s."','".$dord38."','".$dord38s."','".$dord39."','".$dord39s."','".$dord40."','".$dord40s."','".$dord41."','".$dord41s."','".$dord42."','".$dord42s."','".$dord43."','".$dord43s."','".$dord44."','".$dord44s."','".$tot."','".$kdassort."','".$inid."')\" >Select</button>"; ?></td>
                  </tr>

                  <?php
                }
                mysql_free_result($result);
              }
              ?>
            </tbody>
          </table>
        </div>
      </td>
    </tr>

    <tr>
      <td>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0" class="info_fieldset">
          <tr>
            <td>
              <div align="left"><input id="jumpagemodal" name="nmjmlrow" type="hidden" value="<?php echo $jumPage; ?>"/>Records: <?php echo ($offset + 1); ?> / <?php echo $row; ?> of <?php echo $count; ?> 
            </div>
          </td>
          <td>
            <div align="right">
              <?php
              echo "Page [ ";
              if ($txtpage > 1) {
                $prevpage = $txtpage - 1; echo  "<a href='#' onClick='showpage_modal(".$prevpage.")'>&lt;&lt; Prev</a>";
              }

              for($page = 1; $page <= $jumPage; $page++){
                if ((($page >= $noPage - 10) && ($page <= $noPage + 10)) || ($page == 1) || ($page == $jumPage)){
                  if (($showPage == 1) && ($page != 2))  echo "...";
                  if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
                  if ($page == $noPage) echo " <b>".$page."</b> ";
                  else echo " <a href='#!' onClick='showpage_modal(".$page.")'>".$page."</a> ";
                  $showPage = $page;
                }
              }

              if ($txtpage < $jumPage) {$nextpage = $txtpage + 1; echo "<a href='#' onClick='showpage_modal(".$nextpage.")'>Next &gt;&gt;</a>";}

              echo " ] ";
              ?>
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      &nbsp;
    </td>
  </tr>
  <tr>
    <td>
      &nbsp;
    </td>
  </tr>
  <tr>
    <td>
      &nbsp;
    </td>
  </tr>
</table>
</body>

</html>
<?php
mysql_close($conn);
unset($_POST['inid']);
?>
