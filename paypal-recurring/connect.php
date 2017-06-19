<?php


	if($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='75338139.ngrok.io'){
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "practice";
		define('CANCEL_URL','http://7159f846.ngrok.io/practice/paypal/error.php');
		define('SUCCESS_URL','http://7159f846.ngrok.io/practice/paypal/success.php');
	}
	else{
		$hostname = "localhost";
		$username = "intecons_int2017";
		$password = "Deck141$";
		$database = "intecons_interns2017";
		define('CANCEL_URL','https://www.intecons.in/interns2017/shrikrishna/paypal/error.php');
		define('SUCCESS_URL','https://www.intecons.in/interns2017/shrikrishna/paypal/success.php');
	}

	$conn = mysqli_connect($hostname,$username,$password,$database) or die("Connection error: ".mysqli_error($conn));

	define('PAYPAL_LIVE','https://www.paypal.com/cgi-bin/webscr');
	define('PAYPAL_SANDBOX','https://www.sandbox.paypal.com/cgi-bin/webscr');
	define('MERCHANT_EMAIL','promerchant@intecons.com');

	define('API_VERSION','115.0');
	define('PAYPAL_API_ENDPOINT','https://api-3t.sandbox.paypal.com/nvp');
	define('PAYPAL_API_USERNAME','promerchant_api1.intecons.com');
	define('PAYPAL_API_PASSWORD','T3KSDH2R64B86E7N');
	define('API_SIGN','AFcWxV21C7fd0v3bYYYRCpSSRl31AmQkrIylsZcVpFiAjy43GSHMsthz');


?>