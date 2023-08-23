<?php
include("../../connection.php");
include("../../endec.php");
include("actsearch.php");

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

  $like_data = getsearchdata('clmphead ',$txtfield,$txtdata);

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
                <th align="center">No.</th>
                <th align="center">No. MP</th>
                <th align="center">Customer</th>
                <th align="center">Date Issued</th>
                <th align="center">Date PO Received</th>
                <th align="center">Article</th>
                <th align="center">Last</th>
                <th align="center">No. SO</th>
                <th align="center">Colour</th>
                <!-- <th align="center">Nama Barang</th> -->
                <th align="center">Total Order</th>
                <th align="center">...</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqlORDERBY = " order by a.datepor desc";

              $sql = "SELECT 
                       dt1.mpno, DATE_FORMAT(dt1.dateiss,'%d/%m/%Y') AS dateiss, DATE_FORMAT(dt1.datepor,'%d/%m/%Y') AS datepor, dt1.article, dt1.`last`, dt1.noso, dt1.colour, dt2.rnomc, dt1.tot
                       ,(SELECT b.nama FROM kmcustomer b WHERE b.cust = dt1.cust) AS nama
                       -- ,(SELECT d.spnmbrg FROM kmbrgjadi d WHERE d.spkdbrg = dt2.rkdbrgjd) AS spnmbrg
                      FROM
                       (
                      SELECT a.cust, a.mpno, a.dateiss, a.datepor, a.article, a.`last`, a.noso, a.colour, a.tot
                      FROM clmphead a where 1 ".$sqlWHERE."".$sqlORDERBY."".$sqlLIMIT."
                      )dt1
                      LEFT JOIN
                       (
                      SELECT c.rnomc, c.rnomp, c.rkdbrgjd, c.rnoso
                      FROM clemcmp c
                      )dt2 ON dt1.mpno = dt2.rnomp
                       and dt1.noso = dt2.rnoso
                      WHERE 1";

              $sqlCOUNT = "SELECT count(a.mpno) as jumlah
                          FROM clmphead a where 1 ".$sqlWHERE."".$sqlORDERBY."";
              // echo($sqlCOUNT);
              $sqlCOUNT = $sqlCOUNT;
              $result_1=mysql_query($sqlCOUNT,$conn);
              $data_1 = mysql_fetch_array($result_1);
              $count=$data_1["jumlah"];

              // mysql_free_result($result);
              // echo($sqlWHERE);

              // $sqlORDER = "ORDER BY cust ASC";
              // $sql=$sql.$sqlWHERE.$sqlLIMIT;
                // echo $sql;
              $result=mysql_query($sql,$conn);
              $jumPage = ceil($count/$txtperpage);

              if($count>0){
                $row = $offset;
                while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
                  $row += 1;
                  $mpno = trim($data["mpno"]);
                  $nama = trim($data["nama"]);
                  $dateiss = trim($data["dateiss"]);
                  $datepor = trim($data["datepor"]);
                  $article = trim($data["article"]);
                  $last = trim($data["last"]);
                  $noso = trim($data["noso"]);
                  $colour = trim($data["colour"]);
                  // $spnmbrg = $data["spnmbrg"]; 
                  $tot = trim($data["tot"]);
                  ?>

                  <tr onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
                    <td align="center" nowrap><?=$row?></td>
                    <td align="center" nowrap><?=$mpno?></td>
                    <td align="left" nowrap><?=$nama?></td>
                    <td align="center" nowrap><?=$dateiss?></td>
                    <td align="center" nowrap><?=$datepor?></td>
                    <td align="center" nowrap><?=$article?></td>
                    <td align="left" nowrap><?=$last?></td>
                    <td align="left" nowrap><?=$noso?></td>
                    <td align="left" ><?=$colour?></td>
                    <!-- <td align="left" ><?=$spnmbrg?></td> -->
                    <td align="center" nowrap><?=$tot?></td>
                    <td align="center" nowrap><?php echo "<button id='cmdselect' class='buttonadd' name='nmcmdselect' value='".$hkdtiket."' onclick=\"select('".$mpno."','".$hkdtiket."','".$inid."')\" >Select</button>"; ?></td>
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
