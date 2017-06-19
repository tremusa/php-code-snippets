<?php

  if($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='1a043b74.ngrok.io'){
    $hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "practice";
  }
  else{
    $hostname = "localhost";
		$username = "intecons_int2017";
		$password = "Deck141$";
		$database = "intecons_interns2017";
  }

  $conn = mysqli_connect($hostname,$username,$password,$database) or die("connection failed");

  define("STRIPE_API_ENDPOINT","https://api.stripe.com");
  // define("STRIPE_LIVE_SEC_KEY","sk_live_NIi8vhBO4gkOu4AwvEux5ph5");
  // define("STRIPE_LIVE_PUB_KEY","pk_live_Es6mtjIQNs7CryAzpVDIQJC1");

  define("STRIPE_TEST_SEC_KEY","sk_test_U1YO6PnsFrd8bCKp3ZxJH3FQ");
  define("STRIPE_TEST_PUB_KEY","pk_test_fMocxGr4zoad9MwM8wGYksg3");

  require_once('stripe/autoload.php');
?>
