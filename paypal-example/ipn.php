<?php
	if(isset($_POST)){
		
		$file = fopen('ipn_'.time().'.txt','w');
		$data = var_export($_POST,true);
		fwrite($file, $data);
		fclose($file);

		$file = fopen('get_'.time().'.txt','w');
		$data = var_export($_GET,true);
		fwrite($file, $data);
		fclose($file);
	}
	else{
		$file = fopen('hitdump_'.time().'.txt','w');
		$data = var_export($_GET,true);
		fwrite($file, $data);
		fclose($file);
	}
?>