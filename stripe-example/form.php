<?php
  require_once('connect.php');

  \Stripe\Stripe::setApiKey(STRIPE_TEST_SEC_KEY);

  $x = \Stripe\Customer::create(array(
  "description" => "Customer for shri@example.com",
  "email" => "shrikrishna.shanbhag@intecons.com"
  //"source" => "Umm.. whatever" // obtained with Stripe.js
));
  echo $x->{'json'};
  $arr =  (array) $x;
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
?>
