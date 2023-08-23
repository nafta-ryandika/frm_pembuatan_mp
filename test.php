<?php
	$month = date("m");
  	$year = date("Y");
  	$incounter = 20;

	$innomc = "RNDMC/".$month.$year."/".sprintf("%07s", $incounter);
	echo($innomc);
?>