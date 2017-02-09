<?php

	$content = file_get_contents("https://www.min-breeder.com/dog1612-00605.html");


	$pos = strpos($content,'<th>状況</th>');
	echo "<h1> $pos </h1>";
	$keystring = substr($content,$pos+42,15);
	echo "<h3> ". htmlspecialchars($keystring)." </h3>";
	if(strstr($keystring,"販売中")!=false){
		echo "<h1> For Sale </h1>";
	}
	else if(strstr($keystring,"商談中")!=false){
		echo "<h1> Negotiation </h1>";
	}
	else if(strstr($keystring,"成約済み")!=false){
		echo "<h1> Sold </h1>";
	}
	else{
		echo "<h1> End of Sale </h1>";
	}
?>