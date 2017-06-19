<?php
  require_once('connect.php');

  if(isset($_POST['stripeEmail']) && isset($_POST['stripeToken'])){
    try
    {
      \Stripe\Stripe::setApiKey(STRIPE_TEST_SEC_KEY);
      $customer = \Stripe\Customer::create(array(
        'email' => $_POST['stripeEmail'],
        'source'  => $_POST['stripeToken'],
        'plan' => $_POST['plan']
      ));

      $customer_json = json_decode($customer->__toJSON(),true);


      //echo $customer->__toJSON();

      $cust_id = $customer_json['id'];
      $cust_email = $_POST['stripeEmail'];
      $sub_id = $customer_json['subscriptions']['data'][0]['id'];
      $selected_plan = $customer_json['subscriptions']['data'][0]['items']['data'][0]['plan']['id'];
      $plan_type = $customer_json['subscriptions']['data'][0]['plan']['interval'];
      $currency = $customer_json['subscriptions']['data'][0]['items']['data'][0]['plan']['currency'];
      $default_card = $customer_json['default_source'];
      $start = $customer_json['subscriptions']['data'][0]['current_period_start'];
      $end = $customer_json['subscriptions']['data'][0]['current_period_end'];

      $query = "insert into aa_stripe_users (email,customer_id,token,plan,plan_type,subscription_id,currency,default_card,current_period_start,current_period_end)
      values ('$cust_email','$cust_id','{$_POST['stripeToken']}','$selected_plan','$plan_type','$sub_id','$currency','$default_card',$start,$end);";
      if(!mysqli_query($conn,$query)){
        echo "Error in insert : $query : ".mysqli_error($conn);
      }
      else{
        echo "Success";
      }
      echo " looks good ";
      //echo "<div style='color:red'>(( $cust_id::$cust_email::$selected_plan::$sub_id::$plan_type::$currency::$default_card ))</div>";


      //header('Location: thankyou.html');
      exit;
    }
    catch(Exception $e)
    {

      echo "<br> exception->".$e->getMessage();
      //header('Location:oops.html');
      error_log("unable to sign up customer:" . $_POST['stripeEmail'].
      ", error:" . $e->getMessage());
    }
  }

  echo "No post?";
?>
