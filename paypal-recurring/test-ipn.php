<?php 
	$txt = print_r($_POST,true);
	$file = fopen('log/test.txt', 'a');
	fwrite($file, $txt."\n".time()."\n");
	fclose($file);
?>