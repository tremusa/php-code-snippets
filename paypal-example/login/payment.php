<?php
	//require_once('includes/connect.php');

	$api_version = '115.0';
	$api_endpoint = 'https://api-3t.sandbox.paypal.com/nvp';
	$api_username = 'promerchant_api1.intecons.com';
	$api_password = 'T3KSDH2R64B86E7N';
	$api_signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AmQkrIylsZcVpFiAjy43GSHMsthz';

	$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
  	$paypal_id='promerchant@intecons.com'; // Business email ID
  	
  	$cust = 'user_101';
	$amount = 100;
	$item = 'item_101';


  // disabled for testing
  //session_destroy();
?>

<html>
<h1> Redirecting to payment </h1>
<body onload="submitForm();">

  <form action="<?php echo $paypal_url; ?>" method="post" name="paypalForm">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?=$item?>">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="custom" value="<?=$cust?>">
    <input type="hidden" name="amount" value="<?=$amount?>">
    <input type="hidden" name="cpp_header_image" value="http://cdn.bulbagarden.net/upload/thumb/0/0d/025Pikachu.png/250px-025Pikachu.png">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://127.0.0.1/test/failure.php">
    <input type="hidden" name="return" value="http://127.0.0.1/test/success.php">
    </form>

</body>
<script>
  function submitForm(){
    document.forms["paypalForm"].submit();
  }
</script>
</html>
