<?php
	echo date("N S j/m/Y ");
	echo "<br/>";
	echo date("D/F/Y");
	echo "<br/>";
	echo date("a - G:H:s:u");
	echo "<br/>";
	echo date("l \\t\h\e jS");
	echo "<br/>";
	$tomorrow  = mktime (0, 0, 0, date("m")  , date("d")+1, date("Y"));
	echo $tomorrow;
	echo "<br/>";
	$lastmonth = mktime (0, 0, 0, date("m")-1, date("d"),  date("Y"));
	echo $lastmonth;
	echo "<br/>";
	$nextyear  = mktime (0, 0, 0, date("m"),  date("d"),  date("Y")+1);
	echo $nextyear;

	echo "<br/>";
?>