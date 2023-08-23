<?php
include("../../connection.php");
include("../../endec.php");
include("actsearch.php");

if (isset($_POST['innomp'])) {
  $innomp = $_POST['innomp'];
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

  $like_data = getsearchdata('clloguser ',$txtfield,$txtdata);

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
                <th align="center">User</th>
                <th align="center">Tanggal</th>
                <th align="center">Komputer</th>
                <th align="center">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqlORDERBY = " ORDER BY lgdate desc";

              $sql = "SELECT lguser, lgdate, lgkomp, lgket FROM clloguser WHERE lgnomp = '".$innomp."' ";

              $sqlCOUNT = "SELECT count(lguser) as jumlah FROM clloguser  WHERE lgnomp = '".$innomp."' ".$sqlORDERBY."";
              // echo($sqlCOUNT);
              $sqlCOUNT = $sqlCOUNT;
              $result_1=mysql_query($sqlCOUNT,$conn);
              $data_1 = mysql_fetch_array($result_1);
              $count=$data_1["jumlah"];

              // mysql_free_result($result);
              // echo($sqlWHERE);
              // $sqlORDER = "ORDER BY cust ASC";
              $sql=$sql.$sqlORDERBY;
                // echo $sql;
              $result=mysql_query($sql,$conn);
              $jumPage = ceil($count/$txtperpage);

              if($count>0){
                $row = $offset;
                while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
                  $row += 1;
                  $lguser = trim($data["lguser"]);
                  $lgdate = trim($data["lgdate"]);
                  $lgkomp = trim($data["lgkomp"]);
                  $lgket = trim($data["lgket"]);
                  ?>

                  <tr onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
                    <td align="center" nowrap><?=$row?></td>
                    <td align="left" nowrap><?=$lguser?></td>
                    <td align="left" nowrap><?=$lgdate?></td>
                    <td align="left" nowrap><?=$lgkomp?></td>
                    <td align="left" nowrap><?=$lgket?></td>
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
