<?php

include("../../configuration.php");
include("../../connection.php");
include("actsearch.php");

if(isset($_POST['txtpage'])){
  $txtpage = $_POST['txtpage'];
  $showPage = $txtpage;
  $noPage = $txtpage;
}else{
  $txtpage = 1;
  $showPage = $txtpage;
  $noPage = $txtpage;
}
if(isset($_POST['txtperpage'])){
  $txtperpage=$_POST['txtperpage'];
}else{
  $txtperpage=10;
}

$offset = ($txtpage - 1) * $txtperpage;
$sqlLIMIT = " LIMIT $offset, $txtperpage";
$sqlWHERE = " ";

if(isset($_POST['txtfield'])){
  if($_POST['txtfield']!=''){
    $txtfield = $_POST['txtfield'];

    if(isset($_POST['txtparameter'])){
      if ($_POST['txtparameter']!=''){
        $txtparameter = $_POST['txtparameter'];
      }
    }

    if(isset($_POST['txtdata'])){
      if ($_POST['txtdata']!=''){
        $txtdata = $_POST['txtdata'];
      }
    }

    $txtfieldx = explode("|",rtrim($txtfield,'|'));
    $txtparameterx = explode("|",rtrim($txtparameter,'|'));
    $txtdatax = explode("|",rtrim($txtdata,'|'));

    for($a=0;$a<count($txtfieldx);$a++){
      $sqlWHERE .= multisearch('clmphead',$txtfieldx[$a],$txtparameterx[$a],$txtdatax[$a]);
    }
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Form View</title>
</head>

<?php
$xrdm = date("YmdHis");
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css?verion=$xrdm\" />";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/frmstyle.css?version=$xrdm\" />";
?>


<body>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
       <div id="frmisi">
        <table id="myTable" class="tablesorter">
          <thead>
            <tr>
              <th align="center">No.</th>
              <th align="center">...</th>
              <th align="center">No. MP</th>
              <th align="center">Customer</th>
              <th align="center">Date Issued</th>
              <th align="center">Article</th>
              <th align="center">Last</th>
              <th align="center">No. SO</th>
              <th align="center">Colour</th>
              <th align="center">Total Order</th>
              <th align="center">...</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlORDERBY = " order by a.datepor desc";

            $sql = "SELECT 
                     dt1.mpno, DATE_FORMAT(dt1.dateiss,'%d/%m/%Y') AS dateiss, dt1.article, dt1.`last`, dt1.noso, dt1.colour, dt2.rnomc, dt1.tot
                     ,(SELECT b.nama FROM kmcustomer b WHERE b.cust = dt1.cust) AS nama, dt2.rrevisi
                    FROM
                     (
                    SELECT a.cust, a.mpno, a.dateiss, a.article, a.`last`, a.noso, a.colour, a.tot
                    FROM clmphead a where 1 ".$sqlWHERE."".$sqlORDERBY."".$sqlLIMIT."
                    )dt1
                    LEFT JOIN
                     (
                    SELECT c.rnomc, c.rnomp, c.rkdbrgjd, c.rnoso, c.rrevisi
                    FROM clemcmp c
                    )dt2 ON dt1.mpno = dt2.rnomp
                     and dt1.noso = dt2.rnoso
                    WHERE 1";

            $sqlCOUNT = "SELECT count(a.mpno) as jumlah
                         FROM clmphead a where 1 ".$sqlWHERE."".$sqlORDERBY."";

            // $sqlCOUNT = $sqlCOUNT;
            $result_1=mysql_query($sqlCOUNT);
            // $count=mysql_num_rows($result);
            // echo $sqlCOUNT."<br/>";
            $data_1 = mysql_fetch_array($result_1);
            $count = $data_1["jumlah"]; 


            // $sql=$sql.$sqlWHERE.$sqlORDERBY;
            $result=mysql_query($sql);
            // echo $sql;

            // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
            $jumPage = ceil($count/$txtperpage);

            if($count>0){
              $row = $offset;
              while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
                $row += 1;
                ?>
                <tr onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
                  <td align="center" nowrap><?php echo $row; ?></td>
                  <td align="center" nowrap><?php echo "<input id='chk'".$data['mpno']." type='checkbox' name='chk'".$data['mpno']." value='".$data["mpno"].",".$data["rnomc"].",".$data["noso"]."'>"; ?></td>
                  <td align="center" nowrap><?php echo $data["mpno"]; ?></td>
                  <td align="left" nowrap><?php echo $data["nama"]; ?></td>
                  <td align="center" nowrap><?php echo $data["dateiss"]; ?></td>
                  <td align="left" nowrap><?php echo $data["article"]; ?></td>
                  <td align="left" nowrap><?php echo $data["last"]; ?></td>
                  <td align="left" nowrap><?php echo $data["noso"]; ?></td>
                  <td align="left" ><?php echo $data["colour"]; ?></td>
                  <td align="center" nowrap><?php echo (float) $data["tot"]; ?></td>
                  <td>
                    <!-- <button id='cmdViewDetailMP' class='' name='nmcmdViewDetailMP' onclick="showdetail('<?=$data["mpno"]?>')" style="display: block; margin: auto;" >View Detail</button> -->
                    <img id="cmdViewDetailMP" class="" src="img/search.png" onclick="showdetail('<?=$data["mpno"]?>')" style="cursor: pointer; vertical-align: center; margin-right: 5px; margin-left: 5px;" title="View Detail MP">
                  </td>
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
        <td><div align="left"><input id="jumpage" name="nmjmlrow" type="hidden" value="<?php echo $jumPage; ?>">Records: <?php echo ($offset + 1); ?> / <?php echo $row; ?> of <?php echo $count; ?> </div></td>
        <td>
          <div align="right">
            <?php

            echo "Page [ ";

// menampilkan link previous

            if ($txtpage > 1) {$prevpage = $txtpage - 1; echo  "<a href='#' onClick='showpage(".$prevpage.")'>&lt;&lt; Prev</a>";}

// memunculkan nomor halaman dan linknya

            for($page = 1; $page <= $jumPage; $page++)
            {
             if ((($page >= $noPage - 10) && ($page <= $noPage + 10)) || ($page == 1) || ($page == $jumPage))
             {
              if (($showPage == 1) && ($page != 2))  echo "...";
              if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
              if ($page == $noPage) echo " <b>".$page."</b> ";
              else echo " <a href='#!' onClick='showpage(".$page.")'>".$page."</a> ";
              $showPage = $page;
            }

//    echo " <a href='#' onClick='showpage(".$page.")'>".$page."</a> ";

          }

// menampilkan link next

          if ($txtpage < $jumPage) {$nextpage = $txtpage + 1; echo "<a href='#' onClick='showpage(".$nextpage.")'>Next &gt;&gt;</a>";}

          echo " ] ";

          ?>
        </div>
      </td>
    </tr>
  </table>
</td>
</tr>
</table>
<!-- <FORM id="formexport" name="nmformexport" action="export.php" method="post" onsubmit="window.open ('', 'NewFormInfo', 'scrollbars,width=730,height=500')" target="NewFormInfo">
  <input id="txtSQL" name="nmSQL" type="hidden" value="<?php echo $sql; ?>">
</FORM> -->
<?php //echo $sql; ?>
</body>

</html>
<?php
mysql_close($conn);
?>
