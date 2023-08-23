<?php
include("../../connection.php");

$sql = "SELECT satuan, nmsatuan FROM kmsatuan ORDER BY satuan";
$result = mysql_query($sql,$conn);
echo "<option value=''>-</option>";
	while($data = mysql_fetch_array($result)){
	    echo "<option value='".trim($data['satuan'])."'>".$data['satuan']."</option>";
	}
?>