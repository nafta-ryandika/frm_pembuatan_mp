<?php
	$conn_33 = mysql_connect("172.16.6.33","itpandaan","itpandaan@123", false, 196608);
	if (!$conn_33) die ("Koneksi ke database gagal");

	mysql_select_db("factory",$conn_33) or die ("Database Tidak Diketemukan di Server");
?>