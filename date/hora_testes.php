<?php
	$tr = strtotime('+40 week');
	echo "TIME : ".date("l, d/m/Y",$tr);
	echo "<br/>";
	date_default_timezone_set("UTC"); 
	echo "UTC:".date("l, d/m/Y H:i",time()); 
	echo "<br>"; 

	date_default_timezone_set("Europe/Helsinki"); 
	echo "Europe/Helsinki:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Australia/Brisbane"); 
	echo "Australia/Brisbane:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Africa/Luanda"); 
	echo "Africa/Luanda:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Antarctica/McMurdo"); 
	echo "Antarctica/McMurdo".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Arctic/Longyearbyen"); 
	echo "Arctic/Longyearbyen:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Atlantic/Madeira"); 
	echo "Atlantic/Madeira:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Africa/Luanda"); 
	echo "Europe/Helsinki:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Indian/Maldives"); 
	echo "Indian/Maldives:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Pacific/Rarotonga"); 
	echo "Pacific/Rarotonga:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Brazil/DeNoronha"); 
	echo "Brazil/DeNoronha:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Canada/Yukon"); 
	echo "Canada/Yukon:".date("l, d/m/Y H:i",time()); 
	echo "<br>";

	date_default_timezone_set("Chile/EasterIsland"); 
	echo "Chile/EasterIsland:".date("l, d/m/Y H:i",time()); 
	echo "<br>";
?>