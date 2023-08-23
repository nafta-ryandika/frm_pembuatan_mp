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


if($_POST['txtfield']!='' && $_POST['txtdatamodal'] !=''){

  $like_data = getsearchdata('clcustsku ',$txtfield,$txtdata);

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
                <th align="center">SKU</th>
                <th align="center">Customer</th>
                <th align="center">Season</th>
                <th align="center">Artikel</th>
                <th align="center">Material</th>
                <th align="center">Warna</th>
                <th align="center">...</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqlORDERBY = " order by a.access desc";

              $sql = "select a.kodesku, (select nama from kmcustomer where cust = a.kodecust ) as nmcust, (select nmseason from rpseason where 
                      kdseason = a.kodeseason) as nmseason, a.kodeart, a.nmmaterial, a.nmwarna, a.nmlast  from clcustsku a
                      where 1";

              $sqlCOUNT = "SELECT count(a.kodesku) as jumlah
                          FROM clcustsku a where 1 ".$sqlWHERE."".$sqlORDERBY."";
              // echo($sqlCOUNT);
              $sqlCOUNT = $sqlCOUNT;
              $result_1=mysql_query($sqlCOUNT,$conn);
              $data_1 = mysql_fetch_array($result_1);
              $count=$data_1["jumlah"];

              // mysql_free_result($result);
              // echo($sqlWHERE);
              // $sqlORDER = "ORDER BY cust ASC";
              $sql=$sql.$sqlWHERE.$sqlORDERBY.$sqlLIMIT;
                // echo $sql;
              $result=mysql_query($sql,$conn);
              $jumPage = ceil($count/$txtperpage);

              if($count>0){
                $row = $offset;
                while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
                  $row += 1;
                  $kodesku = trim($data["kodesku"]);
                  $nmcust = trim($data["nmcust"]);
                  $nmseason = trim($data["nmseason"]);
                  $kodeart = trim($data["kodeart"]);
                  $nmmaterial = trim($data["nmmaterial"]);
                  $nmwarna = trim($data["nmwarna"]);
                  ?>

                  <tr onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
                    <td align="center" nowrap><?=$row?></td>
                    <td align="left" nowrap><?=$kodesku?></td>
                    <td align="left" nowrap><?=$nmcust?></td>
                    <td align="center" nowrap><?=$nmseason?></td>
                    <td align="center" nowrap><?=$kodeart?></td>
                    <td align="left" nowrap><?=$nmmaterial?></td>
                    <td align="left" nowrap><?=$nmwarna?></td>
                    <td align="center" nowrap><?php echo "<button id='cmdselect' class='buttonadd' name='nmcmdselect' value='".$kodesku."' onclick=\"select('".$kodesku."','','".$inid."')\" >Select</button>"; ?></td>
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
